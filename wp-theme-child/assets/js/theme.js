/* Norlandascup theme JS. Unified from the 4 Claude Design HTML files. */
(function () {
	'use strict';

	function ready(fn) {
		if (document.readyState !== 'loading') {
			fn();
		} else {
			document.addEventListener('DOMContentLoaded', fn);
		}
	}

	ready(function () {

		// Mobile drawer open/close
		var drawer = document.getElementById('drawer');
		var openBtn = document.querySelector('[data-drawer-open]');
		var closeBtn = document.querySelector('[data-drawer-close]');
		if (drawer) {
			if (openBtn) {
				openBtn.addEventListener('click', function () {
					drawer.classList.add('open');
					drawer.setAttribute('aria-hidden', 'false');
				});
			}
			if (closeBtn) {
				closeBtn.addEventListener('click', function () {
					drawer.classList.remove('open');
					drawer.setAttribute('aria-hidden', 'true');
				});
			}
			// Close drawer on any nav link click
			drawer.querySelectorAll('a').forEach(function (a) {
				a.addEventListener('click', function () {
					drawer.classList.remove('open');
					drawer.setAttribute('aria-hidden', 'true');
				});
			});
		}

		// Fade-in on scroll (only when JS is on, .fx elements)
		if ('IntersectionObserver' in window) {
			var io = new IntersectionObserver(function (entries) {
				entries.forEach(function (e) {
					if (e.isIntersecting) {
						e.target.classList.add('in');
						io.unobserve(e.target);
					}
				});
			}, { threshold: 0.14, rootMargin: '0px 0px -40px 0px' });
			document.querySelectorAll('.fx').forEach(function (el) {
				io.observe(el);
			});
		} else {
			document.querySelectorAll('.fx').forEach(function (el) {
				el.classList.add('in');
			});
		}

		// Home chip filter (.filters .chip), purely visual on the home for now
		document.querySelectorAll('.filters .chip').forEach(function (c) {
			c.addEventListener('click', function () {
				document.querySelectorAll('.filters .chip').forEach(function (x) { x.classList.remove('active'); });
				c.classList.add('active');
			});
		});

		// Magazine page filter (.magfilter .mf-chip) with article hide/show
		var grid = document.getElementById('magGrid');
		var chips = document.querySelectorAll('.mf-chip');
		var countEl = document.getElementById('mfCount');
		var titleEl = document.getElementById('gridTitle');
		if (grid && chips.length) {
			var cards = grid.querySelectorAll('.acard');
			var labels = {
				all: 'Tous les articles',
				regates: 'Régates',
				spots: 'Spots',
				materiel: 'Matériel',
				meteo: 'Météo',
				portraits: 'Portraits'
			};
			chips.forEach(function (ch) {
				ch.addEventListener('click', function () {
					chips.forEach(function (x) { x.classList.remove('active'); });
					ch.classList.add('active');
					var f = ch.dataset.f;
					var n = 0;
					cards.forEach(function (c) {
						var show = (f === 'all' || c.dataset.rub === f);
						c.classList.toggle('hide', !show);
						if (show) n++;
					});
					if (countEl) countEl.textContent = (f === 'all' ? cards.length : n);
					if (titleEl) titleEl.textContent = (f === 'all' ? labels.all : labels[f] || labels.all);
				});
			});
		}
	});
})();
