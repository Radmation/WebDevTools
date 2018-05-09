<section id="testimonials">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div id="testimonial_slider">
                    <ul>
                        <?php
                        $args = array(
                            'post_type' => 'testimonials',
                            'posts_per_page' => -1,
                            'post_status' => 'publish'
                        );

                        // The Query
                        $the_query = new WP_Query($args);

                        // The Loop
                        if ($the_query->have_posts()) {
                            while ($the_query->have_posts()) {
                                $the_query->the_post();

                                $thumb_id = get_post_thumbnail_id();
                                $alt = get_post_meta($thumb_id, '_wp_attachment_image_alt', true);
                                $thumb_url_array = wp_get_attachment_image_src($thumb_id, 'thumbnail-size', true);
                                $thumb_url = $thumb_url_array[0];

                                ?>
                                <li>
                                    <div class="row" style="position: relative;">
                                        <div class="col-sm-4 col-xs-12">
                                            <img src="<?php echo $thumb_url; ?>" alt="<?php echo $alt; ?>" class="img-responsive" >
                                        </div>
                                        <div class="col-sm-8">
                                            <?php the_content(); ?>
                                            <div class="testimonial_details">
                                                <p><strong>- <?php the_title(); ?></strong> Class of <?php the_field('year_graduated'); ?></p>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <?php
                            }
                            /* Restore original Post Data */
                            wp_reset_postdata();
                        } else {
                            // no posts found
                        }
                        ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>