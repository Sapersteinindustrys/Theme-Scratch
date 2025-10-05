# Build Information

## Asset Pipeline

Aetheria uses Vite for asset bundling:

- **Entry points**: `assets/js/front.js`, `assets/js/editor.js`
- **Output**: `dist/` directory with hashed filenames
- **Manifest**: `assets/manifest.json` maps original to hashed names

## Build Commands

```bash
npm run dev        # Development mode with hot reload
npm run build      # Production build with optimization
npm run lint       # Lint JavaScript
npm run lint:css   # Lint CSS
npm run perf-budget # Check performance budgets
```

## Performance Budgets

| Asset | Budget | Actual |
|-------|--------|--------|
| Critical CSS | ≤ 9KB | Check after build |
| Total CSS | ≤ 55KB | Check after build |
| Initial JS | ≤ 65KB | Check after build |
| Lazy JS | ≤ 80KB | Check after build |

## Asset Loading

- **Critical CSS**: Inlined in `<head>`
- **Main CSS**: Loaded async
- **Dark mode CSS**: Loaded conditionally
- **JavaScript**: Deferred loading
- **Module system**: Dynamic imports for blocks

## Cache Busting

All assets include content hash in filename for optimal caching.
