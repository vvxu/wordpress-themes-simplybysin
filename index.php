<?php get_header(); ?>
<main id="site-container" role="main" class="split-layout">
    <aside class="personal-info">
        <div class="aside-search">
            <form role="search" method="get" class="search-form" action="<?php echo esc_url(home_url('/')); ?>">
                <label>
                    <span class="screen-reader-text">搜索：</span>
                    <input type="search" class="search-field" placeholder="搜索..."
                        value="<?php echo get_search_query(); ?>" name="s" />
                </label>
            </form>
        </div>

        <div id="user-info" class="aside card">
            <div
                style="margin-top:10px; overflow: hidden; border-radius: 50%; width: 96px; height: 96px;display: inline-block;">
                <?php
                $author_id = 1;
                $current_user_avatar = get_avatar(1, 96);
                echo $current_user_avatar;
                ?>
            </div>
            <div class="user-info-item">
                <?php
                $author_id = 1;
                $author_nickname = get_the_author_meta('nickname', $author_id);
                echo $author_nickname;
                ?>
            </div>
            <div class="user-info-item">
                <?php
                $author_id = 1;
                $author_description = get_the_author_meta('description', $author_id);
                echo $author_description;
                ?>
            </div>
        </div>
        <div class="aside card">
            <div style="margin-left:5px;">
                <h3>Category</h3>
            </div>
            <div id="category-card">
                <?php
                $categorys = get_categories(array('orderby' => 'count', 'order' => 'DESC', 'number' => '30'));
                foreach ($categorys as $category) {
                    $category_link = get_tag_link($category->term_id);
                    echo '<div class="category-item"><a href="' . $category_link . '">' . $category->name . '</a></div>';
                }
                ?>
            </div>
        </div>
        <div class="aside card">
            <div style="margin-left:5px;">
                <h3>Tags</h3>
            </div>
            <div id="tag-card">
                <?php
                $tags = get_tags(array('orderby' => 'count', 'order' => 'DESC', 'number' => '30'));
                foreach ($tags as $tag) {
                    $tag_link = get_tag_link($tag->term_id);
                    echo '<div class="tag-item"><a href="' . $tag_link . '">' . $tag->name . '</a></div>';
                }
                ?>
            </div>
        </div>

    </aside>
    <main class="main-content">
        <section class="list">
            <?php
            if (have_posts()):
                while (have_posts()):
                    the_post();
                    ?>
                    <article class="item card" id="post-<?php the_ID(); ?>">
                        <header class="entry-header">
                            <h2 class="entry-title"><a href="<?php the_permalink(); ?>">
                                    <?php the_title(); ?>
                                </a></h2>
                        </header>

                        <div class="entry-content">
                            <?php
                            if (is_single() || is_page()) {
                                the_content();
                            } else {
                                $trimmed_content = wp_trim_words(get_the_content(), 200, '...');
                                echo wpautop($trimmed_content);
                            }
                            ?>
                        </div>

                        <div>
                            <?php if (!is_single() && !is_page()) {
                                echo '<div class="read-all"><a href="' . esc_url(get_permalink()) . '"> 阅读全部 </a></div>';
                            } ?>
                        </div>

                        <div class="footer-content">
                            <div class="footer-content-item">
                                <span class="entry-date">
                                    <i class="fas fa-clock" style="margin-right: 3px;"></i>
                                    <?php echo get_the_date(); ?>
                                </span>
                            </div>
                            <div class="footer-content-item">
                                <i class="fas fa-eye" style="margin-right: 3px;"></i>
                                <?php if (function_exists('the_views')) {
                                    the_views();
                                } ?>
                            </div>
                            <div class="footer-content-item">
                                <?php if (function_exists('lotos_likes'))
                                    lotos_likes(); ?>
                            </div>

                        </div>
                    </article>
                    <?php
                endwhile;
            else:
                get_template_part('template-parts/content', 'none');
            endif;
            ?>
        </section>
    </main>

</main>
<?php get_footer(); ?>