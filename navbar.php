<?php
$menu = wp_nav_menu([
    'name' => 'theme-slug',
    'container_class' => 'pure-menu pure-menu-horizontal',
    'menu_class' => 'pure-menu-list',
    'echo' => false
]);
$replace1 = str_replace('menu-item', 'pure-menu-item', $menu);
$replace2 = str_replace('a href', 'a class="pure-menu-link" href', $replace1);
echo $replace2;
?>
