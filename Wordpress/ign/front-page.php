<?php get_header(); // header.php ?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>




<?php endwhile;
else : ?>
    <p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
<?php endif; ?>


<?php get_footer(); // footer.php ?>


