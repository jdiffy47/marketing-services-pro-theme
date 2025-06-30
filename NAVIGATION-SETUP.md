# Navigation Menu Setup Guide

After uploading and activating your theme, you'll need to set up the navigation menu to match the pricing-focused structure.

## Step 1: Create the Menu

1. Go to **WordPress Admin → Appearance → Menus**
2. Click "Create a new menu"
3. Name it "Primary Menu"

## Step 2: Add Menu Items

Add these custom links to your menu:

### Website Packages
- **Menu Text**: Website Packages
- **URL**: `#website-packages`
- **CSS Classes**: (leave blank)

### Marketing Packages  
- **Menu Text**: Marketing Packages
- **URL**: `#marketing-packages`
- **CSS Classes**: (leave blank)

### Contact
- **Menu Text**: Get Quote
- **URL**: `#contact`
- **CSS Classes**: (leave blank)

## Step 3: Assign Menu Location

1. In the "Menu Settings" section at the bottom
2. Check "Primary Menu" 
3. Click "Save Menu"

## Step 4: Test Navigation

1. Visit your homepage
2. Click each menu item to ensure smooth scrolling works
3. Test on mobile to ensure mobile menu works

## Alternative: Quick Setup

If you want to add the menu programmatically, you can add this code to your `functions.php` file:

```php
// Auto-create navigation menu
function create_default_menu() {
    $menu_name = 'Primary Menu';
    $menu_exists = wp_get_nav_menu_object($menu_name);
    
    if (!$menu_exists) {
        $menu_id = wp_create_nav_menu($menu_name);
        
        // Add menu items
        wp_update_nav_menu_item($menu_id, 0, array(
            'menu-item-title' => 'Website Packages',
            'menu-item-url' => '#website-packages',
            'menu-item-status' => 'publish',
        ));
        
        wp_update_nav_menu_item($menu_id, 0, array(
            'menu-item-title' => 'Marketing Packages',
            'menu-item-url' => '#marketing-packages',
            'menu-item-status' => 'publish',
        ));
        
        wp_update_nav_menu_item($menu_id, 0, array(
            'menu-item-title' => 'Get Quote',
            'menu-item-url' => '#contact',
            'menu-item-status' => 'publish',
        ));
        
        // Assign to primary menu location
        $locations = get_theme_mod('nav_menu_locations');
        $locations['primary'] = $menu_id;
        set_theme_mod('nav_menu_locations', $locations);
    }
}
add_action('after_switch_theme', 'create_default_menu');
```

## Menu Structure Summary

Your navigation should look like this:

```
Primary Menu
├── Website Packages → #website-packages
├── Marketing Packages → #marketing-packages  
└── Get Quote → #contact
```

This creates a streamlined user experience where visitors can:
1. See website pricing options
2. See marketing package options
3. Easily contact you for a quote

The smooth scrolling JavaScript will automatically handle the anchor links and provide a professional user experience. 