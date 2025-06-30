<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<div id="page" class="site">
    <header id="masthead" class="site-header bg-white shadow-sm sticky top-0 z-50">
        <div class="container-custom">
            <div class="flex items-center justify-between py-4">
                <!-- Logo/Site Title -->
                <div class="flex items-center">
                    <?php if (has_custom_logo()) : ?>
                        <div class="site-logo">
                            <?php the_custom_logo(); ?>
                        </div>
                    <?php else : ?>
                        <h1 class="site-title text-2xl font-bold text-gray-900">
                            <a href="<?php echo esc_url(home_url('/')); ?>" rel="home">
                                <?php bloginfo('name'); ?>
                            </a>
                        </h1>
                    <?php endif; ?>
                </div>

                <!-- Navigation -->
                <nav id="site-navigation" class="main-navigation hidden md:block">
                    <?php
                    wp_nav_menu(array(
                        'theme_location' => 'primary',
                        'menu_id'        => 'primary-menu',
                        'menu_class'     => 'flex space-x-8',
                        'container'      => false,
                        'fallback_cb'    => false,
                        'items_wrap'     => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                        'walker'         => new class extends Walker_Nav_Menu {
                            public function start_el(&$output, $item, $depth = 0, $args = null, $id = 0) {
                                $classes = empty($item->classes) ? array() : (array) $item->classes;
                                $classes[] = 'menu-item-' . $item->ID;
                                
                                $class_names = join(' ', apply_filters('nav_menu_css_class', array_filter($classes), $item, $args));
                                $class_names = $class_names ? ' class="' . esc_attr($class_names) . '"' : '';
                                
                                $id = apply_filters('nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args);
                                $id = $id ? ' id="' . esc_attr($id) . '"' : '';
                                
                                $output .= '<li' . $id . $class_names .'>';
                                
                                $attributes = !empty($item->attr_title) ? ' title="'  . esc_attr($item->attr_title) .'"' : '';
                                $attributes .= !empty($item->target)     ? ' target="' . esc_attr($item->target     ) .'"' : '';
                                $attributes .= !empty($item->xfn)        ? ' rel="'    . esc_attr($item->xfn        ) .'"' : '';
                                $attributes .= !empty($item->url)        ? ' href="'   . esc_attr($item->url        ) .'"' : '';
                                
                                $item_output = $args->before;
                                $item_output .= '<a'. $attributes .' class="text-gray-700 hover:text-blue-600 font-medium transition-colors duration-200">';
                                $item_output .= $args->link_before . apply_filters('the_title', $item->title, $item->ID) . $args->link_after;
                                $item_output .= '</a>';
                                $item_output .= $args->after;
                                
                                $output .= apply_filters('walker_nav_menu_start_el', $item_output, $item, $depth, $args);
                            }
                        }
                    ));
                    ?>
                </nav>

                <!-- Mobile Menu Button -->
                <button class="md:hidden p-2 rounded-md text-gray-700 hover:text-blue-600 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-blue-500" id="mobile-menu-button">
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>
            </div>

            <!-- Mobile Menu -->
            <div class="md:hidden hidden" id="mobile-menu">
                <div class="px-2 pt-2 pb-3 space-y-1 border-t border-gray-200">
                    <?php
                    wp_nav_menu(array(
                        'theme_location' => 'primary',
                        'menu_id'        => 'mobile-primary-menu',
                        'menu_class'     => 'space-y-1',
                        'container'      => false,
                        'fallback_cb'    => false,
                        'items_wrap'     => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                        'walker'         => new class extends Walker_Nav_Menu {
                            public function start_el(&$output, $item, $depth = 0, $args = null, $id = 0) {
                                $classes = empty($item->classes) ? array() : (array) $item->classes;
                                $classes[] = 'menu-item-' . $item->ID;
                                
                                $class_names = join(' ', apply_filters('nav_menu_css_class', array_filter($classes), $item, $args));
                                $class_names = $class_names ? ' class="' . esc_attr($class_names) . '"' : '';
                                
                                $id = apply_filters('nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args);
                                $id = $id ? ' id="' . esc_attr($id) . '"' : '';
                                
                                $output .= '<li' . $id . $class_names .'>';
                                
                                $attributes = !empty($item->attr_title) ? ' title="'  . esc_attr($item->attr_title) .'"' : '';
                                $attributes .= !empty($item->target)     ? ' target="' . esc_attr($item->target     ) .'"' : '';
                                $attributes .= !empty($item->xfn)        ? ' rel="'    . esc_attr($item->xfn        ) .'"' : '';
                                $attributes .= !empty($item->url)        ? ' href="'   . esc_attr($item->url        ) .'"' : '';
                                
                                $item_output = $args->before;
                                $item_output .= '<a'. $attributes .' class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-blue-600 hover:bg-gray-50">';
                                $item_output .= $args->link_before . apply_filters('the_title', $item->title, $item->ID) . $args->link_after;
                                $item_output .= '</a>';
                                $item_output .= $args->after;
                                
                                $output .= apply_filters('walker_nav_menu_start_el', $item_output, $item, $depth, $args);
                            }
                        }
                    ));
                    ?>
                </div>
            </div>
        </div>
    </header>

    <div id="content" class="site-content"> 