<?php require 'header.php'; ?>
    <div class="pure-u-1-1">
    <div class="post">
        <?php previous_posts_link('previous'); ?>
        <?php next_posts_link('next'); ?>
    </div>
</div>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

  <div id="index-banner" class="parallax-container">
    <div class="section no-pad-bot">
      <div class="container">
        <br><br>
        <h1 class="header center deep-purple-text text-darken-2"><?php the_title(); ?></h1>
        <div class="row center">
          <h5 class="header col s12">Développement web full-stack en JavaScript et PHP</h5>
        </div>
        <div class="row center">
          <a href="http://materializecss.com/getting-started.html" id="download-button" class="btn-large waves-effect waves-light deep-purple darken-4">Get Started</a>
        </div>
        <br><br>

      </div>
    </div>
    <div class="parallax"><?php show_random_image(); ?></div>
  </div>


  <div class="container">
    <div class="section">

      <!--   Icon Section   -->
      <div class="row">
        <div class="col s12 m12">
            
                <div class="post">
                <?php the_content(); ?>
                </div>

        </div>

      </div>

    </div>
  </div>

<?php endwhile; else: ?>
<p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
<?php endif; ?>


  <div class="parallax-container valign-wrapper">
    <div class="section no-pad-bot">
      <div class="container">
        <div class="row center">
          <h5 class="header col s12 light">A modern responsive front-end framework based on Material Design</h5>
        </div>
      </div>
    </div>
    <div class="parallax"><img src="<?php echo get_template_directory_uri(); ?>/images/materialize/background3.jpg" alt="Unsplashed background img 3"></div>
  </div>

  <div class="container">
    <div class="section">

      <!--   Icon Section   -->
      <div class="row">

<?php
$posts = get_posts([
    'post_type'      => 'post',
    'status'         => 'published',
    'posts_per_page' => 3
]);
// var_dump($posts);
if( !empty($posts) ):

    foreach($posts as $article):
?>
 <div class="col s12 m4">
    
    <div class="card">
      <div class="card-image">
        <img src="<?php echo get_template_directory_uri(); ?>/images/placeholder-350x150.png">
      </div>
      <div class="card-stacked">
        <div class="card-content">
          <h5 class="header"><?php echo $article->post_title; ?></h5>
          <p><?php echo get_the_excerpt($article); ?></p>
        </div>
        <div class="card-action">
          <a href="#">This is a link</a>
        </div>
      </div>
    </div>
  </div>
<?php
    endforeach;
endif;
?>
</div></div></div>
<?php require 'footer.php'; ?>