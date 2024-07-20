<?php
// 获取文章的年份和月份
$year = get_the_date('Y');
$month = get_the_date('m');
$day = get_the_date('d');
?>
<div class="argon-timeline archive-timeline">
    <div class="argon-timeline-node">
        <h2 class="argon-timeline-time archive-timeline-year" id="header-id-1"><?php echo $year; ?>
        </h2>
        <div class="argon-timeline-card card bg-gradient-secondary archive-timeline-title"></div>
    </div>
    <div class="argon-timeline-node">
        <h3 class="argon-timeline-time archive-timeline-month first-month-of-year" id="header-id-2"><?php echo $month; ?></h3>
        <div class="argon-timeline-card card bg-gradient-secondary archive-timeline-title"></div>
    </div>
    <div class="argon-timeline-node">
        <div class="argon-timeline-time"><?php echo $month.'-'.$day ?></div>
        <div class="argon-timeline-card card bg-gradient-secondary archive-timeline-title">
            <div style='display: flex;'>
                <a href='<?php the_permalink(); ?>' style="width:200px">
                <?php
                $thumbnail_url = argon_get_post_thumbnail();
                if (get_option('argon_enable_lazyload') != 'false'){
                    echo "<img class='post-thumbnail lazyload' src='data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAABBJREFUeNpi+P//PwNAgAEACPwC/tuiTRYAAAAASUVORK5CYII=' data-original='" . $thumbnail_url . "' alt='thumbnail' style='opacity: 0; width: auto; height: 100px; object-fit: contain; flex-shrink: 0;'></img>";
                }else{
                    echo "<img class='post-thumbnail' src='" . $thumbnail_url . "' style='width: auto; height: 100px; object-fit: contain; flex-shrink: 0;'></img>";
                }
                ?>
                </a>
                <div style='width:calc(100% - 200px );text-align: center;'>
                    <a href='<?php the_permalink(); ?>' style='flex-grow: 1;font-size: 25px'><?php the_title(); ?></a>
                    <div style="text-align: left;margin-top: 1em;position: relative">
                        <p style="text-indent: 2em;padding-left: 2em;">
                            <?php echo wp_trim_words(get_the_content('...'), 300); ?>
                        </p>
                        <div style="text-align: right;position: absolute;right: 0;bottom: 0">
                            <a href='<?php the_permalink(); ?>' style='flex-grow: 1'>
                                查看全文
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



