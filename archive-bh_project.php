<?php require 'header.php'; ?>
<div class="pure-g" id="main">
    <div class="post">
        <?php previous_posts_link('previous'); ?>
        <?php next_posts_link('next'); ?>
    </div>
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
    <?php $repo_url = get_post_meta($post->ID, 'repository_url', true); ?>
    <div class="post">
    <h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
    <div class="post-meta">
        <div><?php the_date(); ?></div>
        <div><i class="fa fa-globe"></i> <a target="_blank" href="<?php echo $repo_url; ?>"><?php echo $repo_url; ?></a></div>
    </div>
    <?php the_content(); ?>
    </div>
<?php endwhile; else: ?>
<p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
<?php endif; ?>
</div>
<?php require 'footer.php'; ?>