<?php get_header(); ?>
	
<?php //get_sidebar(); ?>

<?php //get_template_part( 'main' ); ?>

<!-- Start the Loop. -->

<div id="content">

	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

		<div class="post">
		<!-- Display the Title as a link to the Post's permalink. -->
			
			<div class="title-wrap" style="background: url(<?php echo esc_url(the_post_thumbnail_url()); ?>) no-repeat center;">
				<h1 class="entry-title"><?php the_title(); ?></h1>  
			</div>
			
			<div class="entry">
            	<?php the_content(); ?>
        	</div>

        </div>
		
		<?php endwhile; ?>
		<?php endif; ?>
			
	<?php get_footer(); ?>
