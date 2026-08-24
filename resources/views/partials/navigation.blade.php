@php
  wp_nav_menu([
    'theme_location' => 'primary_navigation',
    'container' => 'nav',
    'container_class' => 'dropdown-menu',
    'menu_class' => 'menu-list',
    'fallback_cb' => false,
  ]);
@endphp
