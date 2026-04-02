/**
 * Bellezza — Main JavaScript
 *
 * Header scroll, mobile menu, FAQ accordion,
 * before/after slider, testimonials carousel
 */
(function () {
  'use strict';

  /* ---------------------------------------------------------------
     Header Scroll
     --------------------------------------------------------------- */
  var header = document.getElementById('masthead');
  if (header) {
    var onScroll = function () {
      header.classList.toggle('is-scrolled', window.scrollY > 60);
    };
    window.addEventListener('scroll', onScroll, { passive: true });
    onScroll();
  }

  /* ---------------------------------------------------------------
     Mobile Menu
     --------------------------------------------------------------- */
  var menuToggle = document.querySelector('.menu-toggle');
  var nav = document.querySelector('.main-navigation');

  if (menuToggle && nav) {
    // Create overlay
    var overlay = document.createElement('div');
    overlay.className = 'menu-overlay';
    overlay.setAttribute('aria-hidden', 'true');
    document.body.appendChild(overlay);

    var toggleMenu = function () {
      var expanded = menuToggle.getAttribute('aria-expanded') === 'true';
      menuToggle.setAttribute('aria-expanded', String(!expanded));
      nav.classList.toggle('is-open');
      overlay.classList.toggle('is-active');
      document.body.style.overflow = expanded ? '' : 'hidden';
    };

    menuToggle.addEventListener('click', toggleMenu);
    overlay.addEventListener('click', toggleMenu);

    // Close on nav link click (one-page scroll)
    nav.querySelectorAll('a').forEach(function (link) {
      link.addEventListener('click', function () {
        if (nav.classList.contains('is-open')) {
          toggleMenu();
        }
      });
    });

    // Close on Escape
    document.addEventListener('keydown', function (e) {
      if (e.key === 'Escape' && nav.classList.contains('is-open')) {
        toggleMenu();
        menuToggle.focus();
      }
    });
  }

  /* ---------------------------------------------------------------
     FAQ Accordion
     --------------------------------------------------------------- */
  document.querySelectorAll('.faq-item__question').forEach(function (btn) {
    btn.addEventListener('click', function () {
      var expanded = btn.getAttribute('aria-expanded') === 'true';
      var answer = document.getElementById(btn.getAttribute('aria-controls'));
      if (!answer) return;

      // Close other items
      btn.closest('.faq-list').querySelectorAll('.faq-item__question').forEach(function (otherBtn) {
        if (otherBtn !== btn) {
          otherBtn.setAttribute('aria-expanded', 'false');
          var otherAnswer = document.getElementById(otherBtn.getAttribute('aria-controls'));
          if (otherAnswer) otherAnswer.hidden = true;
        }
      });

      btn.setAttribute('aria-expanded', String(!expanded));
      answer.hidden = expanded;
    });
  });

  /* ---------------------------------------------------------------
     Before/After Slider
     --------------------------------------------------------------- */
  document.querySelectorAll('[data-ba-slider]').forEach(function (slider) {
    var handle = slider.querySelector('.ba-slider__handle');
    var before = slider.querySelector('.ba-slider__before');
    if (!handle || !before) return;

    var isDragging = false;

    var updatePosition = function (x) {
      var rect = slider.getBoundingClientRect();
      var pos = Math.max(0, Math.min(1, (x - rect.left) / rect.width));
      var percent = pos * 100;
      before.style.clipPath = 'inset(0 ' + (100 - percent) + '% 0 0)';
      handle.style.left = percent + '%';
      handle.setAttribute('aria-valuenow', Math.round(percent));
    };

    var onMove = function (e) {
      if (!isDragging) return;
      e.preventDefault();
      var clientX = e.touches ? e.touches[0].clientX : e.clientX;
      updatePosition(clientX);
    };

    var onEnd = function () {
      isDragging = false;
      document.removeEventListener('mousemove', onMove);
      document.removeEventListener('mouseup', onEnd);
      document.removeEventListener('touchmove', onMove);
      document.removeEventListener('touchend', onEnd);
    };

    var onStart = function (e) {
      isDragging = true;
      var clientX = e.touches ? e.touches[0].clientX : e.clientX;
      updatePosition(clientX);
      document.addEventListener('mousemove', onMove, { passive: false });
      document.addEventListener('mouseup', onEnd);
      document.addEventListener('touchmove', onMove, { passive: false });
      document.addEventListener('touchend', onEnd);
    };

    slider.addEventListener('mousedown', onStart);
    slider.addEventListener('touchstart', onStart, { passive: true });

    // Keyboard support
    handle.addEventListener('keydown', function (e) {
      var current = parseInt(handle.getAttribute('aria-valuenow'), 10) || 50;
      if (e.key === 'ArrowLeft' || e.key === 'ArrowDown') {
        e.preventDefault();
        current = Math.max(0, current - 2);
      } else if (e.key === 'ArrowRight' || e.key === 'ArrowUp') {
        e.preventDefault();
        current = Math.min(100, current + 2);
      } else {
        return;
      }
      before.style.clipPath = 'inset(0 ' + (100 - current) + '% 0 0)';
      handle.style.left = current + '%';
      handle.setAttribute('aria-valuenow', current);
    });
  });

  /* ---------------------------------------------------------------
     Testimonials Carousel
     --------------------------------------------------------------- */
  var track = document.querySelector('[data-testimonials-track]');
  var prevBtn = document.querySelector('[data-testimonials-prev]');
  var nextBtn = document.querySelector('[data-testimonials-next]');
  var dotsContainer = document.querySelector('[data-testimonials-dots]');

  if (track && prevBtn && nextBtn && dotsContainer) {
    var cards = track.querySelectorAll('.testimonial-card');
    var currentIndex = 0;
    var itemsPerView = 3;

    var getItemsPerView = function () {
      if (window.innerWidth <= 782) return 1;
      if (window.innerWidth <= 1080) return 2;
      return 3;
    };

    var totalSlides = function () {
      return Math.max(1, cards.length - itemsPerView + 1);
    };

    var updateDots = function () {
      dotsContainer.innerHTML = '';
      for (var i = 0; i < totalSlides(); i++) {
        var dot = document.createElement('button');
        dot.className = 'dot' + (i === currentIndex ? ' is-active' : '');
        dot.setAttribute('aria-label', 'Go to slide ' + (i + 1));
        dot.dataset.index = i;
        dotsContainer.appendChild(dot);
      }
    };

    var goTo = function (index) {
      currentIndex = Math.max(0, Math.min(index, totalSlides() - 1));
      var card = cards[0];
      if (!card) return;
      var gap = parseFloat(getComputedStyle(track).gap) || 0;
      var cardWidth = card.offsetWidth + gap;
      track.style.transform = 'translateX(-' + (currentIndex * cardWidth) + 'px)';
      updateDots();
    };

    prevBtn.addEventListener('click', function () { goTo(currentIndex - 1); });
    nextBtn.addEventListener('click', function () { goTo(currentIndex + 1); });
    dotsContainer.addEventListener('click', function (e) {
      var dot = e.target.closest('.dot');
      if (dot) goTo(parseInt(dot.dataset.index, 10));
    });

    window.addEventListener('resize', function () {
      var newPerView = getItemsPerView();
      if (newPerView !== itemsPerView) {
        itemsPerView = newPerView;
        goTo(Math.min(currentIndex, totalSlides() - 1));
      }
    });

    itemsPerView = getItemsPerView();
    updateDots();
  }

  /* ---------------------------------------------------------------
     Smooth Scroll for Anchor Links
     --------------------------------------------------------------- */
  document.querySelectorAll('a[href^="#"]').forEach(function (link) {
    link.addEventListener('click', function (e) {
      var targetId = link.getAttribute('href');
      if (targetId === '#') return;
      var target = document.querySelector(targetId);
      if (!target) return;
      e.preventDefault();
      var headerOffset = header ? header.offsetHeight : 0;
      var top = target.getBoundingClientRect().top + window.scrollY - headerOffset;
      window.scrollTo({ top: top, behavior: 'smooth' });
    });
  });
})();
