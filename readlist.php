<?php
/*
Template Name: 归档时间轴
*/
?>

<?php get_header(); ?>

    <div class="page-information-card-container"></div>

<?php get_sidebar(); ?>

    <div id="primary" class="content-area">
        <main id="main" class="site-main" role="main">
            <article class="post post-full card bg-white shadow-sm border-0">
                <?php
                // 创建一个新的 WP_Query 实例来查询所有文章
                $custom_query = new WP_Query( array(
                    'category_name' => '读书', // 替换 'timeline' 为你的分类别名
                    'posts_per_page' => -1, // 设置为 -1 以获取所有文章
                ) );

                // 检查查询是否有文章
                if ( $custom_query->have_posts() ) :
                    // 创建一个数组来存储按年份和月份分组的文章
                    $grouped_posts = array();

                    // 处理查询到的文章
                    while ( $custom_query->have_posts() ) :
                        $custom_query->the_post();

                        // 获取文章的年份和月份
                        $year = get_the_date('Y');
                        $month = get_the_date('m');

                        // 将文章添加到对应的年份和月份组中
                        $grouped_posts[$year][$month][] = $post;
                    endwhile;

                    // 遍历分组的文章并展示
                    foreach ($grouped_posts as $year => $months) {
                        foreach ($months as $month => $posts) {
                            foreach ($posts as $post) {
                                setup_postdata($post);
                                get_template_part( 'template-parts/content', 'readlist' );

                            }
                        }
                    }

                    // 重置全局 $post 变量
                    wp_reset_postdata();
                else :
                    echo '<p>没有找到文章。</p>';
                endif;
                ?>
            </article>
        </main><!-- #main -->
    </div><!-- #primary -->

<?php get_footer(); ?>