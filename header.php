<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="https://unpkg.com/purecss@0.6.1/build/pure-min.css" integrity="sha384-CCTZv2q9I9m3UOxRLaJneXrrqKwUNOzZ6NGEUMwHtShDJ+nCoiXJCAgi05KfkLGY" crossorigin="anonymous">
        <script src="https://use.fontawesome.com/b27c5eac40.js"></script>
        <?php wp_head(); ?>
        <?php if(file_exists(__DIR__ . '/piwik_code.php')) { include 'piwik_code.php'; } ?>
    </head>

    <body>
        <div class="pure-g" id="main">

            <div class="pure-u-1-1">
                <div class="header">
                <?php show_random_image(); ?>
                </div>

                <?php require 'navbar.php' ?>
            </div>