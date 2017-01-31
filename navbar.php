<?php
// $menu = wp_nav_menu([
//     'name' => 'theme-slug',
//     'container_class' => 'pure-menu pure-menu-horizontal',
//     'menu_class' => 'pure-menu-list',
//     'echo' => false
// ]);
// $replace1 = str_replace('menu-item', 'pure-menu-item', $menu);
// $replace2 = str_replace('a href', 'a class="pure-menu-link" href', $replace1);
// echo $replace2;
?>
<div class="navbar-fixed">
  <nav class="white" role="navigation">
    <div class="nav-wrapper container">
      <a id="logo-container" href="#" class="brand-logo">Logo</a>
      <ul class="right hide-on-med-and-down">
        <li><a href="#">Navbar Link</a></li>
      </ul>

      <ul id="nav-mobile" class="side-nav">
        <li><a href="#">Navbar Link</a></li>
      </ul>
      <a href="#" data-activates="nav-mobile" class="button-collapse"><i class="material-icons">menu</i></a>
    </div>
  </nav>
</div>