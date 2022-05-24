<?php get_header(); ?>



<?php //get_sidebar(); ?>


<!-- Start the Loop. -->
<div id="content">

	<div id="mainheader">
		<img id="image-slide" src="<?php echo get_theme_mod('background_image_1'); ?>"/>
	</div>

	<?php
		$i = 1;
		$javascript_data = array();
		while ( $i <= 5 ) {

		if (get_theme_mod('background_image_'.$i)  != null) {
			array_push($javascript_data, get_theme_mod('background_image_'.$i));
		}
		$i++;
	}
	?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
	<div class="post">
	 	<div class="entry">
	 		<?php the_content(); ?>
	 	</div>
 	</div> <!-- closes the first div box -->
<?php wp_reset_postdata(); ?>


<!-- DISPLAY DES POSTS PREFERES-->

<?php if ( get_theme_mod('bandeau_post') == 1 ){

	echo '<div class="featured">';
	echo '<h2>';
	pll_e('Nos coups de coeur');
	echo '</h2>';
	$args = array(
		'category' => get_theme_mod('bandeau_post_cat'),
	);
	$posts_array = get_posts( $args );
	
	foreach ($posts_array as $p) : 
	$i = get_the_post_thumbnail($p->ID);  
	setup_postdata($p); ?>
		<a href="<?php echo get_permalink($p); ?>">
		<div class="featured_post">
			<?php echo $i ?>
		 	<div class="featured_text"><h3><?php echo $p->post_title; ?></h3><?php the_excerpt(); ?></div>
	 	</div>
	 	</a>
	<?php wp_reset_postdata();
	 endforeach; 
	echo '</div>';
	
} 
?>


 	<!-- DEBUT DU DISPLAY DES 6 IMAGES CIRCULAIRES-->
 	
<?php if ( get_theme_mod('circular_images') == 1 ){ ?>

<div class="cat_display">
<h2><?php pll_e('Nous proposons')?></h2>
<?php 
$i = 1;

while ( $i <=6 ) {
	if (get_theme_mod('circular_image_'.$i)  != null) {
	 
?>
	<div class="cat_link">
		<div class="img-link-container">
			<a class="img-link" href="<?php echo get_option( 'siteurl' ).get_theme_mod('link_image_'.$i); ?>"></a>
			<img src="<?php echo get_theme_mod('circular_image_'.$i); ?>" />
		</div>
		<h3 class="img-link-title"><?php echo get_theme_mod('title_image_'.$i); ?></h3>
	</div>

<?php 
	}
	$i++;
}
?>
</div>

<?php } ?>


<!-- Stop The Loop (but note the "else:" - see next line). -->

<?php endwhile; else : ?>


 	<!-- The very first "if" tested to see if there were any Posts to -->
 	<!-- display.  This "else" part tells what do if there weren't any. -->
 	<p><?php pll_e('Veuillez nous excuser, aucun post ne correspond à votre recherche'); ?></p>


 	<!-- REALLY stop The Loop. -->
 <?php endif; ?>
 	


<?php //get_template_part( 'main' ); ?>

<?php // if ( is_front_page() ) {
	wp_localize_script( 'my_custom_javascript', 'js_data', $javascript_data );
//}?>

<?php get_footer(); ?>

