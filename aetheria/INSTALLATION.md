# Aetheria Theme Installation Guide

## Requirements

- WordPress 6.3 or higher
- PHP 7.4 or higher
- Node.js 18+ (for development)

## Installation

### Via WordPress Admin

1. Download the theme ZIP file
2. Go to Appearance > Themes > Add New
3. Click "Upload Theme" and select the ZIP file
4. Activate the theme

### Manual Installation

1. Upload the `aetheria` folder to `/wp-content/themes/`
2. Activate from WordPress admin

## Post-Installation

1. Complete the onboarding wizard (10 steps)
2. Create Primary and Footer menus
3. Set up homepage and blog page
4. Optionally import demo content from `demo/content.xml`

## Development Setup

```bash
npm install
npm run dev  # Development
npm run build  # Production
```

## Custom Post Types

- Portfolio: Showcasing work
- Testimonials: Client feedback

## License

GPL-2.0-or-later
