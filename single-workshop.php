<?php
/**
 * The template for displaying single posts and pages.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since Twenty Twenty 1.0
 */

get_header();
?>

<main id="site-content" role="main">

	<?php if ( have_posts() ):  while ( have_posts() ): the_post(); ?>

        <article <?php post_class(); ?> id="post-<?php the_ID(); ?>">
            <?php the_content() ?>
        <article>

	<?php endwhile; endif;?>

</main><!-- #site-content -->

<?php 
    // TODO: Remove this if it's not TwentyTwenty has parent
    get_template_part( 'template-parts/footer-menus-widgets' );
?>

<?php get_footer(); ?>
