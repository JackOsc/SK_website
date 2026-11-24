/* Slow Karma: menu, header state, parallax, click-to-load players, the magic painting. */
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
	/* The magic painting (homepage Dynamite artwork). Everything is drawn in
	   the artwork's own 1400px space and scaled to fit. Scroll position
	   drives the story (stars wake, fuses catch and burn down); scroll speed
	   drives the snake (tail flick, tongue, light sliding over its scales)
	   and blows the incense smoke. Kept low-key on purpose (v1.9): the
	   movement is the point, the glow is just a hint. v1.10 adds more small
	   movements: the clock bell, the paper crane, the candle
	   flames and the pig's wink. */
	(function () {
		var root = document.querySelector('[data-magic]');
		if (!root || reduce.matches) return;
		var cvs = root.querySelector('[data-magic-fx]');
		var ctx = cvs && cvs.getContext && cvs.getContext('2d');
		if (!ctx) return;
		var watch = root.closest('[data-gilt]') || root;
		var tail = root.querySelector('[data-magic-tail]');
		var tip = root.querySelector('[data-magic-tip]');
		var tongue = root.querySelector('[data-magic-tongue]');
		var piece = {};
		root.querySelectorAll('[data-magic-piece]').forEach(function (el) {
			piece[el.getAttribute('data-magic-piece')] = el;
		});
		function move(name, css) {
			if (piece[name]) piece[name].style.transform = css;
		}
		function load(src) {
			var im = new Image();
			im.decoding = 'async';
			im.src = src;
			return im;
		}
		var light = load(cvs.getAttribute('data-light'));
		var skin = load(cvs.getAttribute('data-skin'));
		var off = document.createElement('canvas');
		var octx = off.getContext('2d');
		var W = 0, S = 1;
		var lite = coarse.matches;

		function size() {
			var dpr = Math.min(window.devicePixelRatio || 1, lite ? 1.5 : 2);
			W = Math.max(1, Math.round(root.offsetWidth * dpr));
			cvs.width = cvs.height = off.width = off.height = W;
			S = W / 1400;
		}

		function smooth(a, b, x) {
			var t = Math.min(1, Math.max(0, (x - a) / (b - a)));
			return t * t * (3 - 2 * t);
		}
		function rnd(a, b) {
			return a + Math.random() * (b - a);
		}

		/* A soft round sprite for smoke and glows. */
		var puff = document.createElement('canvas');
		puff.width = puff.height = 64;
		(function () {
			var p = puff.getContext('2d');
			var g = p.createRadialGradient(32, 32, 0, 32, 32, 32);
			g.addColorStop(0, 'rgba(255,255,255,1)');
			g.addColorStop(0.4, 'rgba(255,255,255,0.45)');
			g.addColorStop(1, 'rgba(255,255,255,0)');
			p.fillStyle = g;
			p.fillRect(0, 0, 64, 64);
		})();

		/* Fuses, traced from the free end to where they enter the stick. */
		function trace(pts) {
			var out = [], len = 0, i, t, p0, p1, p2, p3;
			for (i = 0; i < pts.length - 1; i++) {
				p0 = pts[Math.max(0, i - 1)]; p1 = pts[i]; p2 = pts[i + 1]; p3 = pts[Math.min(pts.length - 1, i + 2)];
				for (t = 0; t < 1; t += 0.125) {
					var t2 = t * t, t3 = t2 * t;
					out.push([
						0.5 * (2 * p1[0] + (-p0[0] + p2[0]) * t + (2 * p0[0] - 5 * p1[0] + 4 * p2[0] - p3[0]) * t2 + (-p0[0] + 3 * p1[0] - 3 * p2[0] + p3[0]) * t3),
						0.5 * (2 * p1[1] + (-p0[1] + p2[1]) * t + (2 * p0[1] - 5 * p1[1] + 4 * p2[1] - p3[1]) * t2 + (-p0[1] + 3 * p1[1] - 3 * p2[1] + p3[1]) * t3)
					]);
				}
			}
			out.push(pts[pts.length - 1]);
			out[0].push(0);
			for (i = 1; i < out.length; i++) {
				len += Math.hypot(out[i][0] - out[i - 1][0], out[i][1] - out[i - 1][1]);
				out[i].push(len);
			}
			return { pts: out, len: len };
		}
		var fuses = [
			{ path: trace([[304, 658], [298, 636], [291, 619], [286, 600], [285, 585], [290, 567], [304, 551], [328, 544], [352, 547], [368, 556], [377, 563]]), from: 0.3, to: 0.6, w: 20, done: false },
			{ path: trace([[600, 570], [588, 552], [578, 535], [563, 520], [543, 512], [522, 516], [507, 528], [499, 545], [497, 564]]), from: 0.38, to: 0.68, w: 19, done: false }
		];
		function pointAt(path, d) {
			var p = path.pts, i;
			for (i = 1; i < p.length; i++) {
				if (p[i][2] >= d) {
					var k = (d - p[i - 1][2]) / ((p[i][2] - p[i - 1][2]) || 1);
					return [p[i - 1][0] + (p[i][0] - p[i - 1][0]) * k, p[i - 1][1] + (p[i][1] - p[i - 1][1]) * k];
				}
			}
			return p[p.length - 1];
		}
		function strokeTo(c, path, d) {
			var p = path.pts, i;
			c.beginPath();
			c.moveTo(p[0][0] * S, p[0][1] * S);
			for (i = 1; i < p.length && p[i][2] <= d; i++) c.lineTo(p[i][0] * S, p[i][1] * S);
			var e = pointAt(path, d);
			c.lineTo(e[0] * S, e[1] * S);
			c.stroke();
		}

		/* Stars in the burst above the snake: x, y, size. */
		var stars = [
			776, 52, 50, 490, 86, 38, 646, 90, 16, 514, 106, 17, 620, 118, 37, 872, 119, 30, 848, 136, 16, 728, 152, 31,
			976, 160, 39, 551, 184, 51, 398, 184, 32, 1000, 180, 16, 647, 216, 45, 826, 206, 16, 800, 234, 37, 926, 252, 51,
			466, 242, 30, 442, 258, 17, 1026, 289, 44, 716, 293, 38, 896, 287, 17, 740, 312, 16, 352, 338, 51, 860, 322, 12,
			841, 333, 32, 580, 347, 18, 949, 362, 30, 592, 376, 44, 458, 368, 16, 926, 379, 16, 1026, 398, 45, 432, 396, 37,
			524, 430, 45, 909, 452, 51, 363, 486, 33, 1078, 494, 44
		];
		var twinkle = [];
		for (var si = 0; si < stars.length; si += 3) twinkle.push({ x: stars[si], y: stars[si + 1], s: stars[si + 2], ph: rnd(0, 6.28), sp: rnd(0.7, 1.6) });
		/* The snake's body in the order it runs: neck, the loop on the right,
		   then the left side down to the bag. Gaps are where it is hidden. */
		var body = [
			trace([[612, 440], [660, 400], [720, 388], [785, 405], [812, 445], [790, 488], [745, 520], [705, 560], [690, 610], [700, 640]]),
			trace([[1045, 650], [1090, 612], [1160, 612], [1205, 660], [1200, 735], [1150, 785], [1080, 780], [1045, 740]]),
			trace([[372, 665], [320, 655], [275, 690], [262, 750], [275, 810], [285, 850]])
		];
		var GAP = 140;
		var bodyLen = body.reduce(function (n, b) { return n + b.len + GAP; }, 0);
		var glint = 0, stir = 0;
		function onBody(d) {
			d = ((d % bodyLen) + bodyLen) % bodyLen;
			for (var b = 0; b < body.length; b++) {
				if (d < body[b].len) return pointAt(body[b], d);
				d -= body[b].len + GAP;
				if (d < 0) return null;
			}
			return null;
		}
		function masked(mask, paint, colour, alpha) {
			octx.globalCompositeOperation = 'source-over';
			octx.globalAlpha = 1;
			octx.clearRect(0, 0, W, W);
			paint();
			octx.globalAlpha = 1;
			octx.globalCompositeOperation = 'destination-in';
			octx.drawImage(mask, 0, 0, W, W);
			octx.globalCompositeOperation = 'source-in';
			octx.fillStyle = colour;
			octx.fillRect(0, 0, W, W);
			ctx.globalCompositeOperation = 'lighter';
			ctx.globalAlpha = alpha;
			ctx.drawImage(off, 0, 0);
			ctx.globalAlpha = 1;
		}
		var flames = [[683, 1132], [770, 1188], [667, 1222]];
		var embers = [[1133, 914], [1193, 972], [1093, 1041]];

		var sparks = [], smoke = [];
		var t = 0, last = 0, lastY = window.scrollY, vel = 0, boost = 0;
		var a1 = 0, v1 = 0, a2 = 0, v2 = 0;
		var lick = -1, nextLick = 3;
		var ring = -1, nextRing = 4;
		var wink = -1, nextWink = 6;
		var EYE = [283, 989];
		var running = false;

		function burst(x, y) {
			for (var i = 0; i < (lite ? 10 : 18); i++) {
				var ang = rnd(0, 6.28), sp = rnd(80, 260);
				sparks.push({ x: x, y: y, vx: Math.cos(ang) * sp, vy: Math.sin(ang) * sp - 60, life: rnd(0.4, 0.8), age: 0, g: 200, gold: true });
			}
			boost = 0.5;
		}

		function step(now) {
			if (!running) return;
			window.requestAnimationFrame(step);
			var dt = Math.min(0.05, (now - (last || now)) / 1000);
			last = now;
			t += dt;
			if (root.offsetWidth * Math.min(window.devicePixelRatio || 1, lite ? 1.5 : 2) - W > 2) size();

			var vh = window.innerHeight;
			var r = watch.getBoundingClientRect();
			var p = (vh - r.top) / (vh + r.height);
			var y = window.scrollY;
			var rawV = dt > 0 ? (y - lastY) / dt : 0;
			lastY = y;
			vel += (rawV - vel) * Math.min(1, dt * 10);
			var awake = smooth(0.06, 0.3, p);
			boost = Math.max(0, boost - dt * 0.7);

			/* Tail: a spring chasing the scroll, the tip following through. */
			var target = Math.max(-13, Math.min(13, -vel * 0.012)) + Math.sin(t * 0.9) * 2.5 * awake;
			v1 += ((target - a1) * 70 - v1 * 7) * dt;
			a1 += v1 * dt;
			v2 += ((a1 * 1.1 - a2) * 45 - v2 * 4.5) * dt;
			a2 += v2 * dt;
			tail.style.transform = 'rotate(' + a1.toFixed(2) + 'deg)';
			tip.style.transform = 'rotate(' + Math.max(-18, Math.min(18, a2)).toFixed(2) + 'deg)';

			/* Tongue: flicks when the page moves quickly, and now and then. */
			nextLick -= dt;
			if (lick < 0 && awake > 0.5 && (nextLick <= 0 || Math.abs(vel) > 1100)) {
				lick = 0;
				nextLick = rnd(4, 8);
			}
			if (lick >= 0) {
				lick += dt;
				var k = lick / 0.5;
				if (k >= 1) {
					lick = -1;
					tongue.style.transform = '';
				} else {
					var sc = 1 - 0.85 * Math.abs(Math.sin(k * Math.PI * 2));
					tongue.style.transform = 'rotate(' + (Math.sin(k * 25) * 5).toFixed(1) + 'deg) scale(' + sc.toFixed(3) + ')';
				}
			}

			/* Small lives of their own, all kept to a few degrees. */

			/* Alarm clock bell: a short rattle now and then, and when a fuse goes. */
			nextRing -= dt;
			if (ring < 0 && awake > 0.5 && nextRing <= 0) {
				ring = 0;
				nextRing = rnd(7, 12);
			}
			if (ring >= 0) {
				ring += dt;
				var rk = ring / 0.7;
				if (rk >= 1) {
					ring = -1;
					move('bell', '');
				} else {
					var amp = 2.6 * Math.sqrt(1 - rk);
					move('bell', 'rotate(' + (Math.sin(ring * 90) * amp).toFixed(2) + 'deg) translateY(' + (-Math.abs(Math.sin(ring * 45)) * 0.06).toFixed(3) + '%)');
				}
			}

			/* Paper crane: a slow rock on the wingtip that rests on the dynamite. */
			move('crane', 'rotate(' + ((Math.sin(t * 0.75) * 0.9 + Math.sin(t * 0.31) * 0.4) * (0.4 + 0.6 * awake) + Math.max(-1, Math.min(1, vel * 0.0006))).toFixed(2) + 'deg)');

			/* Candle flames: stretch and lean from the wick. */
			['flame1', 'flame2'].forEach(function (n, i) {
				var a = Math.sin(t * 7.1 + i * 2) * 0.6 + Math.sin(t * 13.7 + i) * 0.4;
				var b = Math.sin(t * 5.3 + i * 3) * 0.5 + Math.sin(t * 17.9 + i * 5) * 0.5;
				move(n, 'skewX(' + (a * 4 * awake).toFixed(2) + 'deg) scaleY(' + (1 + b * 0.07 * awake).toFixed(3) + ')');
			});

			/* The pig on the Maya packet winks now and then. */
			nextWink -= dt;
			if (wink < 0 && awake > 0.5 && nextWink <= 0) {
				wink = 0;
				nextWink = rnd(8, 14);
			}
			if (wink >= 0) {
				wink += dt;
				if (wink > 0.6) wink = -1;
			}

			ctx.setTransform(1, 0, 0, 1, 0, 0);
			ctx.globalCompositeOperation = 'source-over';
			ctx.clearRect(0, 0, W, W);
			ctx.lineCap = ctx.lineJoin = 'round';

			/* Fuses burn from the free end down to the stick. */
			fuses.forEach(function (f) {
				var b = smooth(f.from, f.to, p);
				if (b >= 0.999 && !f.done) {
					f.done = true;
					ring = 0;
					var end = f.path.pts[f.path.pts.length - 1];
					burst(end[0], end[1]);
				} else if (b < 0.9) {
					f.done = false;
				}
				if (b <= 0) return;
				var d = b * f.path.len;
				ctx.globalCompositeOperation = 'source-over';
				ctx.strokeStyle = '#0a0a0a';
				ctx.lineWidth = f.w * S;
				ctx.setLineDash([]);
				strokeTo(ctx, f.path, d);
				ctx.strokeStyle = 'rgba(150, 110, 80, 0.4)';
				ctx.lineWidth = 2 * S;
				ctx.setLineDash([1.5 * S, 6 * S]);
				strokeTo(ctx, f.path, Math.max(0, d - 8));
				ctx.setLineDash([]);
				if (b >= 0.999) return;
				var h = pointAt(f.path, d);
				var fl = 0.75 + Math.random() * 0.5;
				ctx.globalCompositeOperation = 'lighter';
				ctx.globalAlpha = 0.28 * fl;
				ctx.drawImage(puff, (h[0] - 20 * fl) * S, (h[1] - 20 * fl) * S, 40 * fl * S, 40 * fl * S);
				ctx.globalAlpha = 1;
				ctx.fillStyle = 'rgba(255, 196, 120, 0.9)';
				ctx.beginPath();
				ctx.arc(h[0] * S, h[1] * S, 3 * fl * S, 0, 6.283);
				ctx.fill();
				for (var n = 0; n < (lite ? 1 : 2); n++) {
					var ang = rnd(0, 6.28), sp = rnd(60, 220);
					sparks.push({ x: h[0], y: h[1], vx: Math.cos(ang) * sp, vy: Math.sin(ang) * sp - 60, life: rnd(0.15, 0.45), age: 0, g: 380 });
				}
			});

			/* Sparks */
			ctx.globalCompositeOperation = 'lighter';
			ctx.lineWidth = 1.3 * S;
			for (var i = sparks.length - 1; i >= 0; i--) {
				var s = sparks[i];
				s.age += dt;
				if (s.age > s.life) {
					sparks.splice(i, 1);
					continue;
				}
				var px = s.x, py = s.y;
				s.vx *= 1 - dt * (s.gold ? 1.6 : 0.5);
				s.vy = s.vy * (1 - dt * (s.gold ? 1.6 : 0.5)) + s.g * dt;
				s.x += s.vx * dt;
				s.y += s.vy * dt;
				var life = 1 - s.age / s.life;
				ctx.strokeStyle = 'rgba(255, 180, 100,' + (life * (s.gold ? 0.6 : 0.8)).toFixed(2) + ')';
				ctx.beginPath();
				ctx.moveTo(px * S, py * S);
				ctx.lineTo(s.x * S, s.y * S);
				ctx.stroke();
			}

			/* Incense smoke, pushed sideways by the scroll. */
			if (awake > 0.05 && smoke.length < (lite ? 50 : 90)) {
				embers.forEach(function (e) {
					if (Math.random() < dt * 10 * awake) smoke.push({ x: e[0] + rnd(-2, 2), y: e[1] - 4, vx: rnd(-3, 3), vy: rnd(-26, -16), age: 0, life: rnd(3.5, 5.5), seed: rnd(0, 6.28) });
				});
			}
			ctx.globalCompositeOperation = 'source-over';
			for (i = smoke.length - 1; i >= 0; i--) {
				var m = smoke[i];
				m.age += dt;
				if (m.age > m.life) {
					smoke.splice(i, 1);
					continue;
				}
				var q = m.age / m.life;
				m.vx += (Math.sin(t * 1.4 + m.seed + m.y * 0.03) * 10 + vel * 0.025) * dt;
				m.vx *= 1 - dt * 0.8;
				m.x += m.vx * dt;
				m.y += m.vy * dt;
				var rad = 3 + q * 22;
				ctx.globalAlpha = Math.min(1, m.age * 3) * (1 - q) * 0.18 * awake;
				ctx.drawImage(puff, (m.x - rad) * S, (m.y - rad) * S, rad * 2 * S, rad * 2 * S);
			}
			ctx.globalAlpha = 1;

			/* Light through the linework: a slow ripple out along the rays,
			   stars that brighten and dim, the flames and the incense ends. */
			if (light.complete && light.naturalWidth) {
				masked(light, function () {
					var wake = 0.2 + 0.8 * awake;
					twinkle.forEach(function (st) {
						var b = Math.pow(0.5 + 0.5 * Math.sin(t * st.sp * 1.6 + st.ph + p * 6), 4) * wake + boost * 0.4;
						if (b < 0.04) return;
						octx.globalAlpha = Math.min(1, b);
						var z = st.s * 1.1;
						octx.drawImage(puff, (st.x - z) * S, (st.y - z) * S, z * 2 * S, z * 2 * S);
					});
					var ring = ((t % 6) / 3) * 560 + 40;
					if (ring < 600) {
						var g = octx.createRadialGradient(705 * S, 500 * S, Math.max(0, ring - 90) * S, 705 * S, 500 * S, (ring + 30) * S);
						g.addColorStop(0, 'rgba(255,255,255,0)');
						g.addColorStop(0.75, 'rgba(255,255,255,' + (0.5 * awake).toFixed(2) + ')');
						g.addColorStop(1, 'rgba(255,255,255,0)');
						octx.globalAlpha = 1;
						octx.fillStyle = g;
						octx.fillRect(0, 0, W, 520 * S);
					}
					flames.forEach(function (f) {
						octx.globalAlpha = (0.6 + 0.4 * Math.random()) * awake;
						octx.drawImage(puff, (f[0] - 26) * S, (f[1] - 30) * S, 52 * S, 60 * S);
					});
					embers.forEach(function (e, n) {
						octx.globalAlpha = (0.6 + 0.4 * Math.sin(t * 2 + n * 2)) * awake;
						octx.drawImage(puff, (e[0] - 16) * S, (e[1] - 16) * S, 32 * S, 32 * S);
					});
				}, 'rgb(240, 160, 90)', 0.45);
			}

			/* A sheen sliding along the snake's scales. It idles slowly and
			   runs faster, and catches more light, while the page moves. */
			stir += (Math.min(1, Math.abs(vel) / 1400) - stir) * Math.min(1, dt * (Math.abs(vel) > 50 ? 4 : 1.2));
			glint += dt * (90 + stir * 520);
			if (skin.complete && skin.naturalWidth && awake > 0.02) {
				masked(skin, function () {
					[0, bodyLen / 2].forEach(function (o) {
						var at = onBody(glint + o);
						if (!at) return;
						octx.globalAlpha = 1;
						octx.drawImage(puff, (at[0] - 60) * S, (at[1] - 60) * S, 120 * S, 120 * S);
					});
				}, 'rgb(255, 196, 130)', (0.22 + 0.5 * stir) * awake);
			}

			/* Soft halos: candle light and the incense ends. */
			ctx.globalCompositeOperation = 'lighter';
			flames.forEach(function (f) {
				var fl = 0.8 + 0.2 * Math.sin(t * 11 + f[0]) * Math.sin(t * 6.3 + f[1]) + Math.random() * 0.06;
				ctx.globalAlpha = 0.12 * awake * fl;
				ctx.drawImage(puff, (f[0] - 55 * fl) * S, (f[1] - 60 * fl) * S, 110 * fl * S, 120 * fl * S);
			});
			embers.forEach(function (e, n) {
				ctx.globalAlpha = (0.18 + 0.1 * Math.sin(t * 2 + n * 2)) * awake;
				ctx.drawImage(puff, (e[0] - 10) * S, (e[1] - 10) * S, 20 * S, 20 * S);
			});

			/* Star glints: a small, faint cross of light on one star at a time. */
			ctx.lineWidth = 1.1 * S;
			ctx.strokeStyle = 'rgb(255, 205, 150)';
			twinkle.forEach(function (st) {
				if (st.s < 30) return;
				var b = Math.pow(0.5 + 0.5 * Math.sin(t * st.sp * 1.6 + st.ph + p * 6), 12) * awake;
				if (b < 0.05) return;
				var z = st.s * (0.45 + 0.35 * b);
				ctx.globalAlpha = b * 0.3;
				ctx.drawImage(puff, (st.x - z * 0.6) * S, (st.y - z * 0.6) * S, z * 1.2 * S, z * 1.2 * S);
				ctx.globalAlpha = b * 0.45;
				ctx.beginPath();
				ctx.moveTo((st.x - z) * S, st.y * S);
				ctx.lineTo((st.x + z) * S, st.y * S);
				ctx.moveTo(st.x * S, (st.y - z) * S);
				ctx.lineTo(st.x * S, (st.y + z) * S);
				ctx.stroke();
			});
			ctx.globalAlpha = 1;
			ctx.globalCompositeOperation = 'source-over';

			/* Wink: the lid comes down over the pig's eye and back up. */
			if (wink >= 0) {
				var shut = Math.min(1, Math.sin(Math.PI * Math.min(1, wink / 0.6)) * 1.8);
				ctx.fillStyle = '#0a0a0a';
				ctx.beginPath();
				ctx.ellipse(EYE[0] * S, EYE[1] * S, 6.5 * S, 7.5 * S, 0, 0, 6.283);
				ctx.fill();
				ctx.fillStyle = ctx.strokeStyle = 'rgb(221, 129, 66)';
				if (shut < 0.75) {
					ctx.beginPath();
					ctx.ellipse(EYE[0] * S, (EYE[1] + 2.5 * shut) * S, 4.5 * S, Math.max(0.5, 5.5 * (1 - shut)) * S, 0, 0, 6.283);
					ctx.fill();
				} else {
					ctx.lineWidth = 2.6 * S;
					ctx.beginPath();
					ctx.moveTo((EYE[0] - 5.5) * S, (EYE[1] + 1) * S);
					ctx.quadraticCurveTo(EYE[0] * S, (EYE[1] + 5) * S, (EYE[0] + 5.5) * S, (EYE[1] + 1) * S);
					ctx.stroke();
				}
			}
		}

		function start() {
			if (running) return;
			running = true;
			last = 0;
			lastY = window.scrollY;
			window.requestAnimationFrame(step);
		}
		function stop() {
			running = false;
		}
		size();
		if ('IntersectionObserver' in window) {
			var seen = false;
			new IntersectionObserver(function (entries) {
				seen = entries[0].isIntersecting;
				if (seen && !document.hidden) start(); else stop();
			}, { rootMargin: '100px 0px' }).observe(watch);
			document.addEventListener('visibilitychange', function () {
				if (document.hidden) stop(); else if (seen) start();
			});
		} else {
			start();
		}
		window.addEventListener('resize', size);
	})();
})();
