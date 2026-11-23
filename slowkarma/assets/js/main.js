/* Slow Karma: menu, header state, parallax, click-to-load players. */
(function () {
	'use strict';

	var body = document.body;
	var reduce = window.matchMedia('(prefers-reduced-motion: reduce)');

	/* Menu */
	var toggle = document.querySelector('[data-menu-toggle]');
	var menu = document.querySelector('[data-menu]');
	function setMenu(open) {
		toggle.setAttribute('aria-expanded', open ? 'true' : 'false');
		toggle.querySelector('.menu-toggle__label').textContent = open ? 'Close' : 'Menu';
		menu.hidden = !open;
		body.classList.toggle('menu-open', open);
		if (open) {
			var first = menu.querySelector('a');
			if (first) first.focus();
		}
	}
	if (toggle && menu) {
		toggle.addEventListener('click', function () {
			setMenu(toggle.getAttribute('aria-expanded') !== 'true');
		});
		document.addEventListener('keydown', function (e) {
			if (e.key === 'Escape' && !menu.hidden) {
				setMenu(false);
				toggle.focus();
			}
		});
		menu.addEventListener('click', function (e) {
			if (e.target.closest('a')) setMenu(false);
		});
	}

	/* Header background once the page scrolls */
	var head = document.querySelector('[data-masthead]');

	/* Parallax: knockout fills drift through the letters, full-bleed
	   photos move, mosaic columns drift, reels slide sideways. */
	var fills = [].slice.call(document.querySelectorAll('[data-parallax-fill]'));
	var layers = [].slice.call(document.querySelectorAll('[data-parallax]'));
	var cols = [].slice.call(document.querySelectorAll('[data-drift]'));
	var reels = [].slice.call(document.querySelectorAll('[data-reel]'));
	var gilts = [].slice.call(document.querySelectorAll('[data-gilt]'));
	var coarse = window.matchMedia('(pointer: coarse), (max-width: 899px)');
	var ticking = false;

	function sizeReels() {
		reels.forEach(function (reel) {
			var track = reel.querySelector('[data-reel-track]');
			var native = reduce.matches || coarse.matches;
			reel.classList.toggle('reel--native', native);
			if (native) {
				reel.style.height = '';
				return;
			}
			var extra = Math.max(0, track.scrollWidth - window.innerWidth);
			reel.style.height = (window.innerHeight + extra) + 'px';
			reel._extra = extra;
		});
	}

	function frame() {
		ticking = false;
		var vh = window.innerHeight;
		if (head) head.classList.toggle('is-scrolled', window.scrollY > 40);
		if (reduce.matches) return;
		fills.forEach(function (el) {
			var r = el.getBoundingClientRect();
			if (r.bottom < 0 || r.top > vh) return;
			var p = (vh - r.top) / (vh + r.height);
			el.style.setProperty('--py', (15 + p * 70).toFixed(2) + '%');
		});
		layers.forEach(function (el) {
			var r = el.parentNode.getBoundingClientRect();
			if (r.bottom < 0 || r.top > vh) return;
			var p = (vh - r.top) / (vh + r.height) - 0.5;
			el.style.transform = 'translate3d(0,' + (p * -18).toFixed(2) + '%,0)';
		});
		cols.forEach(function (el) {
			var d = parseFloat(el.getAttribute('data-drift')) || 0;
			el.style.transform = 'translate3d(0,' + (window.scrollY * d).toFixed(1) + 'px,0)';
		});
		gilts.forEach(function (el) {
			var r = el.getBoundingClientRect();
			if (r.bottom < 0 || r.top > vh) return;
			// -0.5 as it enters at the bottom, 0 centred, 0.5 leaving at the top.
			var p = (vh - r.top) / (vh + r.height) - 0.5;
			el.style.setProperty('--tx', (p * -14).toFixed(2) + 'deg');
			el.style.setProperty('--ty', (p * 7).toFixed(2) + 'deg');
			el.style.setProperty('--lift', (p * -40).toFixed(1) + 'px');
			el.style.setProperty('--glare', (100 - (p + 0.5) * 100).toFixed(1) + '%');
		});
		reels.forEach(function (reel) {
			if (reel.classList.contains('reel--native') || !reel._extra) return;
			var r = reel.getBoundingClientRect();
			var span = reel.offsetHeight - vh;
			var p = span > 0 ? Math.min(1, Math.max(0, -r.top / span)) : 0;
			reel.querySelector('[data-reel-track]').style.transform = 'translate3d(' + (-p * reel._extra).toFixed(1) + 'px,0,0)';
		});
	}
	function onScroll() {
		if (!ticking) {
			ticking = true;
			window.requestAnimationFrame(frame);
		}
	}
	window.addEventListener('scroll', onScroll, { passive: true });
	window.addEventListener('resize', function () {
		sizeReels();
		onScroll();
	});
	window.addEventListener('load', function () {
		sizeReels();
		frame();
	});
	sizeReels();
	frame();

	/* Players load nothing third-party until asked. */
	document.addEventListener('click', function (e) {
		var btn = e.target.closest('.player__play, .player__load');
		if (!btn) return;
		var player = btn.closest('.player');
		var frameEl = document.createElement('iframe');
		var title = player.getAttribute('data-title') || '';
		frameEl.title = title;
		frameEl.loading = 'lazy';
		if (player.hasAttribute('data-yt')) {
			frameEl.src = 'https://www.youtube-nocookie.com/embed/' + encodeURIComponent(player.getAttribute('data-yt')) + '?autoplay=1&rel=0&modestbranding=1';
			frameEl.allow = 'accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share';
			frameEl.allowFullscreen = true;
		} else {
			frameEl.src = player.getAttribute('data-src');
			frameEl.allow = 'autoplay; clipboard-write; encrypted-media; fullscreen; picture-in-picture';
			frameEl.height = player.getAttribute('data-height') || 352;
			frameEl.width = '100%';
		}
		player.appendChild(frameEl);
		player.classList.add('is-loaded');
		frameEl.focus();
	});
})();
