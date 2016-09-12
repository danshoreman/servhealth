<?php get_header(); ?>

	<div class="row">
	
		<div class="small-12 medium-8 columns" role="main">

			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> role="article">
				
				<?php if ( has_post_thumbnail()) : ?>
						
					<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" class="post-thumbnail">
					
						<?php the_post_thumbnail(); ?>
					
					</a>
				
				<?php endif; ?>

				<header class="article-header">

					<h1 itemprop="headline"><?php the_title(); ?></h1>

				</header>

				<section class="entry-content" itemprop="articleBody">
					
					<?php the_content(); ?>

				</section>

				<?php comments_template(); ?>

			</article>

			<?php endwhile; else : ?>

			<article class="post-not-found">
			
				<header class="not-found-header">
					
					<h2><?php _e( 'Nothing Found!' ); ?></h2>
				
				</header>
				
				<section class="not-found-content">
					
					<p><?php _e( 'Please check what you are looking for.' ); ?></p>
				
				</section>
			
			</article>

			<?php endif; ?>

		</div>

		<div class="small-12 medium-4 columns">
		
			<?php get_sidebar(); ?>
			
		</div>

	</div>

<?php get_footer(); ?>
