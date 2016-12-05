<?php get_header(); ?>

	<div class="row">
	
		<div class="small-12 medium-8 columns" role="main">

				<?php if (is_category()) { ?>
					
					<h1 class="archive-title">
					
						<span><?php _e( 'Posts Categorized:' ); ?></span> <?php single_cat_title(); ?>
					
					</h1>

				<?php } elseif (is_tag()) { ?>
					
					<h1 class="archive-title">
					
						<span><?php _e( 'Posts Tagged:' ); ?></span> <?php single_tag_title(); ?>
					
					</h1>

				<?php } elseif (is_author()) {
					global $post;
					$author_id = $post->post_author;
				?>
				
				<h1 class="archive-title"><span><?php _e( 'Posts By:' ); ?></span> <?php the_author_meta('display_name', $author_id); ?></h1>
					
				<?php } elseif (is_day()) { ?>
					
				<h1 class="archive-title"><span><?php _e( 'Daily Archives:' ); ?></span> <?php the_time('l, F j, Y'); ?></h1>

				<?php } elseif (is_month()) { ?>
				
				<h1 class="archive-title"><span><?php _e( 'Monthly Archives:' ); ?></span> <?php the_time('F Y'); ?></h1>

				<?php } elseif (is_year()) { ?>
				
				<h1 class="archive-title"><span><?php _e( 'Yearly Archives:' ); ?></span> <?php the_time('Y'); ?></h1>
				
				<?php } ?>

				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

				<article id="post-<?php the_ID(); ?>" <?php post_class( 'archive-result' ); ?> role="article">

					<header class="article-header">

						<h2 class="result-title"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
						
						<p class="byline vcard"><?php
							printf(__( 'Posted' ) . ' <time class="updated" datetime="%1$s" pubdate>%2$s</time> ' . __('by' ) . ' <span class="author">%3$s</span> <span class="amp">&</span> ' . __('filed under') .  ' %4$s.', get_the_time('Y-m-j'), get_the_time(__( 'F jS, Y' )), get_the_author_link( get_the_author_meta( 'ID' ) ), get_the_category_list(', '));
						?></p>

					</header>

					<section class="article-footer">

						<?php the_post_thumbnail( 'thumbnail' ); ?>

						<?php the_excerpt(); ?>

					</section>

				</article>

				<?php endwhile; ?>

				<?php else : ?>

				<article class="post-not-found">
				
					<header class="not-found-header">
						
						<h1><?php _e( 'Nothing Found!' ); ?></h1>
					
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
