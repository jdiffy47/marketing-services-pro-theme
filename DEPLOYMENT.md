# Deployment Guide for Bluehost

This guide will help you deploy your Marketing Services Pro WordPress theme to your Bluehost server.

## Prerequisites

- Bluehost hosting account
- WordPress installed on your Bluehost server
- Access to cPanel or File Manager
- FTP credentials (optional, for advanced users)

## Step-by-Step Deployment

### 1. Prepare Your Theme Files

First, ensure your theme is ready for deployment:

```bash
# Build the production CSS
npm run build:prod

# Verify the dist/tailwind.css file exists
ls -la dist/
```

### 2. Upload Theme to Bluehost

#### Method A: Using cPanel File Manager

1. **Login to Bluehost cPanel**
   - Go to your Bluehost dashboard
   - Click on "cPanel" or "Advanced"

2. **Navigate to WordPress Themes Directory**
   - Open "File Manager"
   - Navigate to: `public_html/wp-content/themes/`
   - Create a new folder called `marketing-services-pro`

3. **Upload Theme Files**
   - Upload all theme files to the `marketing-services-pro` folder
   - Ensure the file structure matches:
     ```
     marketing-services-pro/
     ├── style.css
     ├── index.php
     ├── header.php
     ├── footer.php
     ├── functions.php
     ├── dist/
     │   └── tailwind.css
     ├── js/
     │   └── main.js
     └── screenshot.png
     ```

#### Method B: Using FTP (Recommended for Large Files)

1. **Get FTP Credentials**
   - In cPanel, go to "FTP Accounts"
   - Note your FTP hostname, username, and password

2. **Connect via FTP Client**
   - Use FileZilla, Cyberduck, or your preferred FTP client
   - Connect to your Bluehost server
   - Navigate to: `/public_html/wp-content/themes/`

3. **Upload Files**
   - Create folder: `marketing-services-pro`
   - Upload all theme files

### 3. Activate the Theme

1. **Login to WordPress Admin**
   - Go to: `yourdomain.com/wp-admin`
   - Login with your WordPress credentials

2. **Activate Theme**
   - Go to: Appearance → Themes
   - Find "Marketing Services Pro"
   - Click "Activate"

### 4. Configure the Theme

1. **Access Customizer**
   - Go to: Appearance → Customize
   - Or click "Customize" from the themes page

2. **Configure Sections**
   - **Hero Section**: Update title, subtitle, and CTA buttons
   - **Services Section**: Modify section title and subtitle
   - **About Section**: Update company information
   - **Contact Section**: Add your contact details

3. **Set Up Navigation**
   - Go to: Appearance → Menus
   - Create a new menu with these items:
     - Services (link to #services)
     - About (link to #about)
     - Contact (link to #contact)
   - Assign to "Primary Menu" location

### 5. Install Required Plugins

#### Contact Form 7 (Recommended)
1. Go to: Plugins → Add New
2. Search for "Contact Form 7"
3. Install and activate
4. Create a contact form and note the shortcode
5. Update the shortcode in `index.php` if needed

#### Other Recommended Plugins
- **Yoast SEO**: For search engine optimization
- **WP Rocket**: For caching and performance
- **Wordfence Security**: For security

### 6. Test Your Site

1. **Check Frontend**
   - Visit your homepage
   - Test responsive design on mobile
   - Verify all links work
   - Test contact form

2. **Check Performance**
   - Use Google PageSpeed Insights
   - Optimize images if needed
   - Enable caching

## Troubleshooting

### Theme Not Appearing
- Verify files are in correct directory
- Check file permissions (should be 644 for files, 755 for folders)
- Clear WordPress cache

### CSS Not Loading
- Ensure `dist/tailwind.css` was uploaded
- Check file permissions
- Clear browser cache

### Contact Form Not Working
- Verify Contact Form 7 is installed
- Check shortcode in `index.php`
- Test form submission

### Mobile Menu Issues
- Check JavaScript console for errors
- Verify `js/main.js` is loading
- Test on different devices

## Performance Optimization

### Enable Caching
1. Install a caching plugin (WP Rocket, W3 Total Cache)
2. Configure page caching
3. Enable minification

### Optimize Images
1. Use WebP format when possible
2. Compress images before uploading
3. Use appropriate image sizes

### Enable CDN
1. In cPanel, enable Cloudflare or similar CDN
2. Configure DNS settings
3. Test site performance

## Security Considerations

1. **Keep WordPress Updated**
   - Regularly update WordPress core
   - Update plugins and themes

2. **Use Strong Passwords**
   - Change default admin password
   - Use two-factor authentication

3. **Regular Backups**
   - Set up automatic backups in cPanel
   - Store backups off-site

## Maintenance

### Regular Updates
- Monitor for theme updates
- Update Tailwind CSS when needed
- Keep plugins current

### Performance Monitoring
- Use Google Analytics
- Monitor page load times
- Check for broken links

### Content Updates
- Keep content fresh and relevant
- Update contact information
- Add new services as needed

## Support Resources

- **Bluehost Support**: 24/7 phone and chat support
- **WordPress Codex**: Official WordPress documentation
- **Tailwind CSS Docs**: Styling and customization
- **Theme Repository**: For bug reports and feature requests

## Next Steps

After successful deployment:

1. **SEO Setup**: Configure meta tags and descriptions
2. **Analytics**: Set up Google Analytics
3. **Backup Strategy**: Implement regular backups
4. **Content Creation**: Add blog posts or case studies
5. **Marketing**: Promote your new site

Your Marketing Services Pro theme is now ready to showcase your services and attract new clients! 