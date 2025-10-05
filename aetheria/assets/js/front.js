/**
 * Front-end JavaScript
 *
 * @package Aetheria
 * @since 1.0.0
 */

(function() {
  'use strict';

  // Get theme data
  const aetheriaData = window.aetheriaData || {};

  // Dark mode toggle
  function initDarkMode() {
    if (!aetheriaData.darkMode) return;

    const toggle = document.querySelector('.color-mode-toggle');
    if (!toggle) return;

    const storedTheme = localStorage.getItem('aetheria-color-mode');
    const prefersDark = window.matchMedia('(prefers-color-scheme: dark)').matches;
    const theme = storedTheme || (prefersDark ? 'dark' : 'light');

    document.documentElement.setAttribute('data-theme', theme);

    toggle.addEventListener('click', () => {
      const currentTheme = document.documentElement.getAttribute('data-theme');
      const newTheme = currentTheme === 'dark' ? 'light' : 'dark';
      document.documentElement.setAttribute('data-theme', newTheme);
      localStorage.setItem('aetheria-color-mode', newTheme);
    });
  }

  // Off-canvas navigation
  function initOffCanvas() {
    const toggle = document.querySelector('.nav-toggle');
    const nav = document.querySelector('.offcanvas-nav');
    
    if (!toggle || !nav) return;

    toggle.addEventListener('click', () => {
      const isOpen = toggle.getAttribute('aria-expanded') === 'true';
      toggle.setAttribute('aria-expanded', !isOpen);
      nav.setAttribute('aria-hidden', isOpen);
      document.body.classList.toggle('is-offcanvas-open');

      if (!isOpen) {
        // Trap focus
        const focusableElements = nav.querySelectorAll('a, button, input, [tabindex]:not([tabindex="-1"])');
        if (focusableElements.length) {
          focusableElements[0].focus();
        }
      }
    });

    // Close on escape
    document.addEventListener('keydown', (e) => {
      if (e.key === 'Escape' && toggle.getAttribute('aria-expanded') === 'true') {
        toggle.click();
        toggle.focus();
      }
    });
  }

  // Newsletter form
  function initNewsletter() {
    const forms = document.querySelectorAll('.newsletter-form');

    forms.forEach(form => {
      form.addEventListener('submit', async (e) => {
        e.preventDefault();

        const email = form.querySelector('input[name="email"]').value;
        const consent = form.querySelector('input[name="consent"]').checked;
        const messageEl = form.querySelector('.newsletter__message');

        try {
          const response = await fetch(aetheriaData.restUrl + '/newsletter', {
            method: 'POST',
            headers: {
              'Content-Type': 'application/json',
            },
            body: JSON.stringify({ email, consent }),
          });

          const data = await response.json();

          if (data.success) {
            messageEl.textContent = form.dataset.success || 'Success!';
            messageEl.className = 'newsletter__message newsletter__message--success';
            form.reset();
          } else {
            throw new Error(data.message);
          }
        } catch (error) {
          messageEl.textContent = form.dataset.error || 'An error occurred';
          messageEl.className = 'newsletter__message newsletter__message--error';
        }
      });
    });
  }

  // Initialize all modules
  function init() {
    initDarkMode();
    initOffCanvas();
    initNewsletter();
  }

  // Run on DOM ready
  if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', init);
  } else {
    init();
  }
})();
