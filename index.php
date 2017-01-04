<?php require 'header.php'; ?>
    <div class="pure-u-1-1">
    <div class="post">
        <?php previous_posts_link('previous'); ?>
        <?php next_posts_link('next'); ?>
    </div>
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
    <div class="post">
	<h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
    <div class="post-meta"><?php the_date(); ?></div>
    <?php the_content(); ?>
    </div>
<?php endwhile; else: ?>
<p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
<?php endif; ?>
</div>
<?php require 'footer.php'; ?>