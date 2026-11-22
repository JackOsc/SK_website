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

	/* Parallax: knockout fills drift through the letters; bleed images move. */
	var fills = [].slice.call(document.querySelectorAll('[data-parallax-fill]'));
	var layers = [].slice.call(document.querySelectorAll('[data-parallax]'));
	var ticking = false;

	function frame() {
		ticking = false;
		var vh = window.innerHeight;
		if (head) head.classList.toggle('is-scrolled', window.scrollY > 40);
		if (reduce.matches) return;
		fills.forEach(function (el) {
			var r = el.getBoundingClientRect();
			if (r.bottom < 0 || r.top > vh) return;
			var p = (vh - r.top) / (vh + r.height); /* 0 entering, 1 leaving */
			el.style.setProperty('--py', (15 + p * 70).toFixed(2) + '%');
		});
		layers.forEach(function (el) {
			var r = el.parentNode.getBoundingClientRect();
			if (r.bottom < 0 || r.top > vh) return;
			var p = (vh - r.top) / (vh + r.height) - 0.5;
			el.style.transform = 'translate3d(0,' + (p * -18).toFixed(2) + '%,0)';
		});
	}
	function onScroll() {
		if (!ticking) {
			ticking = true;
			window.requestAnimationFrame(frame);
		}
	}
	window.addEventListener('scroll', onScroll, { passive: true });
	window.addEventListener('resize', onScroll);
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
