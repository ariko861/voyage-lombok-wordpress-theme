<?php get_header(); ?>


<div id="content" role="main">
 
	<?php 
	$c = $wp_query->get_queried_object();
	$categories=get_categories(
    	array( 'parent' => $c->cat_ID )
	);?>

	<!-- AFFICHAGE DU TITRE DE LA CATEGORIE DANS L'IMAGE DE LA CATEGORIE EN HEADER -->
	<div class="title-wrap" style="background: url(<?php echo z_taxonomy_image_url($c->term_id); ?>) no-repeat center;">
		<h1 class="entry-title"><?php echo $c->cat_name; ?></h1>  
	</div>

	<!-- AFFICHAGE DE LA DESCRIPTION DE LA CATEGORIE S'IL Y EN A UNE -->
	<?php if ( !empty($c->description) ) {?>
		<div class="entry">
			<p><?php echo $c->description; ?></p>
		</div>
	<?php } ?>

	<!--AFFICHAGE DU FILTRE PAR SOUS CATEGORIES-->
	<?php if ( count($categories) > 0 ) {?>
		<p class="cat-filter-title"><?php pll_e('Filtrer les résultats'); ?></p>
		<p class="center"><?php pll_e('Pour affiner votre recherche, cliquez sur les images ci-dessous et sélectionnez une ou plusieurs catégories') ?></p>

		<div class="cat_display">
			<?php foreach ($categories as $cat) : ?>
				<div class="cat_filter category-filter-<?php echo $cat->cat_ID; ?> active">
					<div class="background"><i class="fa fa-eye-slash"></i></div>
						<?php z_taxonomy_image($cat->term_id); ?>
						<h2 class="img-filter-title"><?php echo $cat->cat_name; ?></h2>
					</div>
			<?php endforeach; ?>
		</div>
	<?php } ?>
	
	

	<?php
	// Check if there are any posts to display
	if ( have_posts() ) : 
	// The Loop
	while ( have_posts() ) : the_post(); 
	?>
	<?php $category = get_the_category();?>
	<div class="sub-post<?php foreach ( $category as $categ ) : echo " subcategory-".$categ->cat_ID; endforeach;?>">
		<?php the_post_thumbnail(); ?>
		<div class="sub-post-summary">
			<h2 class="sub-post-title"> <a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
			<p><?php the_content(); ?></p>
		</div>

		<div class="clearfix"></div> 

	</div>
		
	<?php endwhile; 
 
	else: 
	?>
		<div class="sub-post-none">
			<div class="entry">
				<p><?php pll_e('Veuillez nous excuser, aucun post ne correspond à votre recherche'); ?></p>
			</div>
		</div>
 
	<?php endif; ?>

	<?php get_footer(); ?>
