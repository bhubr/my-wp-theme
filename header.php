<!DOCTYPE html>
<html>
    <head>
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link href="<?php echo get_template_directory_uri(); ?>/css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
        <?php wp_head(); ?>
        <?php if(file_exists(__DIR__ . '/piwik_code.php')) { include 'piwik_code.php'; } ?>
    </head>

    <body>
        <?php require 'navbar.php' ?>
