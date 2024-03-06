<?php //Front Page Banner
if (!function_exists('newsint_front_page_banner_section_can')) :
    /**
     *
     * @since Newsint
     *
     */
    function newsint_front_page_banner_section_can()
    {
        if (is_front_page() || is_home()) {
         

            $main_banner_section_background_image = newsup_get_option('main_banner_section_background_image');
            $main_banner_section_background_image_url = wp_get_attachment_image_src($main_banner_section_background_image, 'full');
        if(!empty($main_banner_section_background_image)){ ?>
        <section class="mg-fea-area over" style="background-image:url('<?php echo esc_url($main_banner_section_background_image_url[0]); ?>');">
        <?php }else{ ?>
        <section class="mg-fea-area">
        <?php  } ?>
            <div class="overlay">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col"><?php dynamic_sidebar( 'front-page-canvas-sidebar' ); ?></div>
                    </div>
                </div>
            </div>
        </section>
        <?php }
    }
endif;
add_action('newsint_action_front_page_main_section_2', 'newsint_front_page_banner_section_can', 40);


//Front Page Banner
if (!function_exists('newsint_front_page_banner_section')) :
    /**
     *
     * @since Newsbit
     *
     */
    function newsint_front_page_banner_section()
    {
        if (is_front_page() || is_home()) {
        $newsup_enable_main_slider = newsup_get_option('show_main_news_section');
        $select_vertical_slider_news_category = newsup_get_option('select_vertical_slider_news_category');
        $vertical_slider_number_of_slides = newsup_get_option('vertical_slider_number_of_slides');
        $all_posts_vertical = newsup_get_posts($vertical_slider_number_of_slides, $select_vertical_slider_news_category);
        if ($newsup_enable_main_slider):  

            $main_banner_section_background_image = newsup_get_option('main_banner_section_background_image');
            $main_banner_section_background_image_url = wp_get_attachment_image_src($main_banner_section_background_image, 'full');
        if(!empty($main_banner_section_background_image)){ ?>
             <section class="mg-fea-area over" style="background-image:url('<?php echo esc_url($main_banner_section_background_image_url[0]); ?>');">
        <?php }else{ ?>
            <section class="mg-fea-area">
        <?php  } ?>
            <div class="overlay">
                <div class="container-fluid">
                    <div class="row">
                        
                        <div class="col-md-12 col-sm-6">
                            <div id="homemain"class="homemain owl-carousel mr-bot60 pd-r-10"> 
                                <?php newsup_get_block('list', 'banner'); ?>
                            </div>
                        </div> 
                    </div>
                </div>
            </div>
        </section>
        <!--==/ Home Slider ==-->
        <?php endif; ?>
        <!-- end slider-section -->
        <?php }
    }
endif;
add_action('newsint_action_front_page_main_section_1', 'newsint_front_page_banner_section', 40);