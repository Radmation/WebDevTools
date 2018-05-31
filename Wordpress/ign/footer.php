<footer>
    <section class="blue">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 text-center">
                    <ul class="list-inline">
                        <?php if( get_field('facebook_link', 'option') ) :?>
                            <li><a href="<?php get_field('facebook_link', 'option'); ?>" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                        <?php endif; ?>
                        <?php if( get_field('twitter_link', 'option') ) :?>
                            <li><a href="<?php get_field('twitter_link', 'option'); ?>" target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                        <?php endif; ?>
                        <?php if( get_field('pinterest_link', 'option') ) :?>
                            <li><a href="<?php get_field('pinterest_link', 'option'); ?>" target="_blank"><i class="fa fa-pinterest-p" aria-hidden="true"></i></a></li>
                        <?php endif; ?>
                        <?php if( get_field('instagram_link', 'option') ) :?>
                            <li><a href="<?php get_field('instagram_link', 'option'); ?>" target="_blank"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <section class="gray">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12 text-center">
                    <div class="footer_content">
                        <img class="logo" src="<?php echo get_field('bppe_logo', 'option')['url']; ?>">
                        <img class="logo" src="<?php echo get_field('accsc_logo', 'option')['url']; ?>">
                        <?php echo get_field('footer_copy', 'option'); ?>
                    </div>
                </div>
            </div>

        </div>
    </section>
</footer>


<!-- /container -->
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="<?php bloginfo('template_directory');?>/vendor/jquery/jquery-3.2.1.min.js"><\/script>')</script>

<?php wp_footer(); ?>
</body>
</html>
