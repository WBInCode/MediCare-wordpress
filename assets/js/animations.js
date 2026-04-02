/**
 * Bellezza — Scroll Reveal Animations
 *
 * IntersectionObserver-based reveal system
 */
(function () {
  'use strict';

  const prefersReducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

  if (prefersReducedMotion) {
    document.querySelectorAll('.reveal-up, .reveal-left, .reveal-right, .reveal-scale').forEach(function (el) {
      el.classList.add('is-visible');
    });
    return;
  }

  // Scroll reveal observer
  const revealObserver = new IntersectionObserver(
    function (entries) {
      entries.forEach(function (entry) {
        if (entry.isIntersecting) {
          entry.target.classList.add('is-visible');
          revealObserver.unobserve(entry.target);
        }
      });
    },
    {
      threshold: 0.15,
      rootMargin: '0px 0px -50px 0px',
    }
  );

  document.querySelectorAll('.reveal-up, .reveal-left, .reveal-right, .reveal-scale, .section-label, .section-divider').forEach(function (el) {
    revealObserver.observe(el);
  });

  // Hero parallax glow (cursor tracking)
  var hero = document.querySelector('.hero');
  if (hero) {
    hero.addEventListener('mousemove', function (e) {
      var rect = hero.getBoundingClientRect();
      var x = e.clientX - rect.left;
      var y = e.clientY - rect.top;
      hero.style.setProperty('--glow-x', x + 'px');
      hero.style.setProperty('--glow-y', y + 'px');

      var afterStyle = hero.querySelector('style');
      if (!afterStyle) {
        afterStyle = document.createElement('style');
        hero.appendChild(afterStyle);
      }
      afterStyle.textContent =
        '.hero::after { left: ' + x + 'px; top: ' + y + 'px; }';
    });
  }
})();
