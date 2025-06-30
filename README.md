# Marketing Services Pro - WordPress Theme

A modern, responsive WordPress theme built with Tailwind CSS for marketing and website design services. This single-page theme is perfect for showcasing your digital marketing, web design, and branding services.

## Features

- 🎨 **Modern Design**: Clean, professional design with gradient backgrounds and smooth animations
- 📱 **Fully Responsive**: Optimized for all devices and screen sizes
- ⚡ **Fast Performance**: Built with Tailwind CSS for optimal loading speeds
- 🛠️ **Customizable**: Easy to customize through WordPress Customizer
- 📧 **Contact Form Ready**: Integrated with Contact Form 7
- 🔍 **SEO Optimized**: Clean code structure and semantic HTML
- 🎯 **Single Page Layout**: Perfect for service-based businesses

## Sections Included

1. **Hero Section** - Eye-catching introduction with call-to-action buttons
2. **Services Section** - Showcase your main services with icons and descriptions
3. **About Section** - Company information with statistics and process overview
4. **Contact Section** - Contact information and form integration

## Installation

### Prerequisites

- WordPress 5.0 or higher
- PHP 7.4 or higher
- Node.js and npm (for development)

### Setup Instructions

1. **Upload Theme Files**
   ```bash
   # Copy all theme files to your WordPress themes directory
   wp-content/themes/marketing-services-pro/
   ```

2. **Install Dependencies**
   ```bash
   # Navigate to theme directory
   cd wp-content/themes/marketing-services-pro/
   
   # Install npm dependencies
   npm install
   ```

3. **Build Tailwind CSS**
   ```bash
   # For development (with watch mode)
   npm run dev
   
   # For production (minified)
   npm run build:prod
   ```

4. **Activate Theme**
   - Go to WordPress Admin → Appearance → Themes
   - Activate "Marketing Services Pro"

5. **Configure Theme**
   - Go to WordPress Admin → Appearance → Customize
   - Configure your content in the following sections:
     - Hero Section
     - Services Section
     - About Section
     - Contact Section

## Customization

### WordPress Customizer Options

The theme includes extensive customization options through the WordPress Customizer:

- **Hero Section**: Title, subtitle, and CTA button text
- **Services Section**: Section title and subtitle
- **About Section**: Title and content
- **Contact Section**: Title, subtitle, email, phone, and address

### Custom CSS

You can add custom CSS through the WordPress Customizer or by editing the `src/input.css` file and rebuilding.

### Adding Custom Content

To add custom content sections, edit the `index.php` file and add your HTML with Tailwind CSS classes.

## File Structure

```
marketing-services-pro/
├── style.css                 # Main theme stylesheet
├── index.php                 # Main template file
├── header.php                # Header template
├── footer.php                # Footer template
├── functions.php             # Theme functions
├── package.json              # NPM dependencies
├── tailwind.config.js        # Tailwind CSS configuration
├── src/
│   └── input.css             # Source CSS for Tailwind
├── dist/
│   └── tailwind.css          # Compiled CSS (generated)
└── js/
    └── main.js               # Custom JavaScript
```

## Development

### Building for Development

```bash
npm run dev
```

This will watch for changes in your PHP files and automatically rebuild the CSS.

### Building for Production

```bash
npm run build:prod
```

This creates a minified version of the CSS for production use.

### Customizing Tailwind

Edit `tailwind.config.js` to:
- Add custom colors
- Modify spacing
- Add custom animations
- Include additional plugins

## Browser Support

- Chrome (latest)
- Firefox (latest)
- Safari (latest)
- Edge (latest)
- Internet Explorer 11+

## Performance Tips

1. **Optimize Images**: Use WebP format and appropriate sizes
2. **Minimize Plugins**: Only use necessary WordPress plugins
3. **Caching**: Enable WordPress caching plugins
4. **CDN**: Use a content delivery network for faster loading

## Troubleshooting

### CSS Not Loading
- Ensure you've run `npm run build:prod`
- Check that the `dist/tailwind.css` file exists
- Verify file permissions

### Customizer Changes Not Showing
- Clear your browser cache
- Check if you're viewing the correct page
- Ensure the theme is activated

### Mobile Menu Not Working
- Check that `js/main.js` is being loaded
- Verify there are no JavaScript errors in the console

## Support

For support and questions:
- Check the WordPress Codex for general WordPress questions
- Review Tailwind CSS documentation for styling questions
- Create an issue in the theme repository

## License

This theme is licensed under the GPL v2 or later.

## Credits

- Built with [Tailwind CSS](https://tailwindcss.com/)
- Icons from [Heroicons](https://heroicons.com/)
- Font: [Inter](https://rsms.me/inter/)

## Changelog

### Version 1.0.0
- Initial release
- Single page layout
- Responsive design
- WordPress Customizer integration
- Tailwind CSS integration 