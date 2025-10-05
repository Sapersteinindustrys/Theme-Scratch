# Testing Guide

## Manual Testing Checklist

### Blocks
- [ ] Test all 13 custom blocks in editor
- [ ] Verify block attributes save correctly
- [ ] Check block rendering on frontend

### Custom Post Types
- [ ] Create portfolio items
- [ ] Create testimonials
- [ ] Verify taxonomies work

### Performance
- [ ] Run Lighthouse audit (target: 90+ performance score)
- [ ] Check LCP < 2.0s
- [ ] Verify CLS < 0.05

### Accessibility
- [ ] Keyboard navigation works
- [ ] Screen reader compatibility
- [ ] Color contrast passes WCAG 2.1 AA

### Responsive Design
- [ ] Test on mobile (320px+)
- [ ] Test on tablet (768px+)
- [ ] Test on desktop (1024px+)

### Browser Compatibility
- [ ] Chrome
- [ ] Firefox
- [ ] Safari
- [ ] Edge

## Automated Testing

```bash
npm run lint        # JavaScript linting
npm run lint:css    # CSS linting
npm run perf-budget # Performance budgets
```
