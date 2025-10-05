# Changelog

All notable changes to the Aetheria theme will be documented in this file.

## [1.0.0] - 2024-01-15

### Added
- Initial release with full FSE support
- 13 custom blocks (Hero, Feature Grid, Testimonial Slider, Portfolio Query, Stats, Logo Cloud, Accordion, Tabs, Timeline, Newsletter, CTA Band, Masonry Gallery, Video Lightbox)
- Portfolio and Testimonial custom post types
- Onboarding wizard with 10 steps
- 3 style variations (Serif Editorial, Monochrome, Soft Dark)
- Dark mode support with user toggle
- Performance optimizations (critical CSS, lazy loading, asset optimization)
- REST API endpoints for newsletter and search
- Related content algorithm with scoring and time decay
- Schema.org structured data generation
- Full accessibility compliance (WCAG 2.1 AA)
- Internationalization and RTL support
- WooCommerce basic integration

### Performance
- Critical CSS under 9KB
- Total initial CSS under 55KB
- Initial JS under 65KB
- LCP target: ≤ 2.0s
- CLS target: ≤ 0.05

### Security
- Nonce-protected REST endpoints
- Rate limiting on newsletter endpoint
- Security headers (X-Frame-Options, X-Content-Type-Options, etc.)
- Input sanitization and output escaping throughout
- File upload validation

### Accessibility
- ARIA landmarks and labels
- Keyboard navigation support for all interactive components
- Focus management in modals and off-canvas navigation
- Skip links
- Color contrast compliance
- Screen reader announcements for dynamic content
