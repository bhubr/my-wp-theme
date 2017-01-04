<?php require 'header.php'; ?>
    <div class="pure-u-1-1">
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
    <div class="post">
  <h1><?php the_title(); ?></h1>
    <?php the_content(); ?>
    <?php comments_template(); ?>
    </div>
<?php endwhile; else: ?>
<p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
<?php endif; ?>
</div>
<?php require 'footer.php'; ?>