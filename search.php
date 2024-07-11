<?php 
/**
 * The template for displaying search results pages
 *
 * For more info: https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 */
 	
get_header(); ?>
<section id="search-results">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<h1 class="archive-title"><?php _e( 'Search Results for:', 'jointswp' ); ?> <?php echo esc_attr(get_search_query()); ?></h1>

				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			 
					<div class="sr-post">
						<h2><a href="<?php the_permalink();?>"><?php the_title();?></a></h2>
					</div>
					<!-- /.sr-post -->
				    
				<?php endwhile; ?>	

					<?php joints_page_navi(); ?>
					
				<?php else : ?>
				
					<h2>No Results found for <?php echo esc_attr(get_search_query()); ?>.</h2>
						
			    <?php endif; ?>
			</div>
			<!-- /.col-12 -->
		</div>
		<!-- /.row -->
	</div>
	<!-- /.container -->
</section>
<!-- /#search-results -->

<?php get_footer(); ?>
