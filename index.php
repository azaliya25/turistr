<?php
    $href = isset($_SERVER['REDIRECT_URL']) ? rtrim($_SERVER['REDIRECT_URL'], "/") : '/';

    if ($href == '/catalog') {
        include_once('Src   /pages/catalog.php');
    } else if ($href == '/') {
        include_once('src/pages/index.php');
    } else if ($href == '/admin') {
        include_once('src/pages/admin.php');
    } else if ($href == '/login') {
        include_once('src/pages/login.php');
    } else if ($href == '/register') {
        include_once('src/pages/register.php');
    } else if ($href == '/tour') {
        include_once('src/pages/tour.php');
    } else if ($href == '/profile') {
        include_once('src/pages/profile.php');
    } else if ($href == '/ordering') {
        include_once('src/pages/ordering.php');
    }
     else {
       include_once('./pages/404.php');
    }
?>
