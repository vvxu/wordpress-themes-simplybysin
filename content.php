<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">
    <header class="read-header">
        <?php the_title('<h2 class="entry-title">', '</h2>'); ?>
    </header><!-- .entry-header -->

    <div class="read-content">
        <?php the_content(); ?>
    </div><!-- .entry-content -->
</article><!-- #post-<?php the_ID(); ?> -->