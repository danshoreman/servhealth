<?php get_header(); ?>

<?php if (have_posts()) : while (have_posts()) : the_post(); 
	
	$image_id = get_post_thumbnail_id(); 
	$image_url = wp_get_attachment_image_src($image_id,'full'); 
	
?>

	<section class="panel hero--panel" <?php if($image_url) : ?>data-parallax="scroll" data-image-src="<?php echo $image_url[0]; ?>" <?php endif; ?>>
		<div class="row">
			<div class="small-12 columns">
				<h1><?php the_title(); ?></h1>
				<?php the_content(); ?>
				
				<a href="#more" class="btn-more">Find Out More</a>
			</div>
		</div>
		<img src="<?php echo get_stylesheet_directory_uri(); ?>/library/images/general/angle.png" class="angle" alt="">
	</section>
	
	<section id="more" class="panel intro--panel">
		<div class="row">
			<div class="small-12 columns">
				<h2><?php the_field('intro_title'); ?></h2>
			</div>
		</div>
		
		<div class="row">
			<div class="small-12 medium-6 columns os-animation" data-os-animation="fadeInLeft" data-os-animation-delay="0.2s">
				<?php $img_benefit = wp_get_attachment_image_src(get_field('introduction_image'), 'full'); ?>
				<img src="<?php echo $img_benefit[0]; ?>" class="" alt="<?php echo get_the_title(get_field('introduction_image')); ?>">
			</div>
			<div class="small-12 medium-6 columns text-col os-animation" data-os-animation="fadeInRight" data-os-animation-delay="0.2s">
				<?php the_field('introduction_copy'); ?>
			</div>
		</div>
		
		<div class="row">
			<div class="small-12 columns center">
		
				<?php the_field('introduction_copy_secondary'); ?>
				
				<h3><?php the_field('description_title'); ?></h3>
		
			</div>
		</div>
		
		<div class="panel panel-reasons">
			
			<?php if( have_rows('description_steps') ): ?>

				<div class="row staggered-animation-container01">
					<?php
						$counter = 0;
						while( have_rows('description_steps') ): the_row(); 
						$reason = get_sub_field('reason');
						$counter++;
	
						switch ( $counter ) {
					
							case 1: 
								echo '<div class="small-12 medium-4 columns staggered-animation01" data-os-animation="fadeInUp" data-os-animation-delay="0.2s">';
								break;
					
							case 2: 
								echo '<div class="small-12 medium-4 columns staggered-animation01" data-os-animation="fadeInUp" data-os-animation-delay="0.4s">';
								break;
					
							case 3: 
							 	echo '<div class="small-12 medium-4 columns staggered-animation01" data-os-animation="fadeInUp" data-os-animation-delay="0.6s">';
					
								break;
						}	
						
					?>
					
						<p class="reason reason<?php echo $counter; ?>"><?php echo $reason; ?></p>
					</div>
			
				<?php endwhile; ?>
			
				</div>
			
			<?php endif; ?>
			
		</div>
		
		<div class="row">
			<div class="small-12 columns center">
				
				<?php the_field('description_footer'); ?>
				<a href="#pricing" class="btn btn--pricing">View pricing</a>
				<!--<a href="" class="btn btn--video">Watch the video</a>-->
		
			</div>
		</div>
			
		</div>
		
	</section>
	
	<?php $img_full = wp_get_attachment_image_src(get_field('full_width_image'), 'full');	?>
	<section class="panel panel--full--width" <?php if($img_full) : ?>data-parallax="scroll" data-image-src="<?php echo $img_full[0]; ?>" <?php endif; ?>>
		
	</section>
	
	<section id="features" class="panel panel--features">
		<header class="panel-header center notify">
			<h3><?php the_field('features_title'); ?></h3>
			<?php the_field('features_copy'); ?>
		</header>
		
		<?php 
			$counter = 0;
			if( have_rows('feature') ): ?>

			<?php 
				while( have_rows('feature') ): the_row(); 
		
				$title_feature = get_sub_field('title');
				$desc_feature = get_sub_field('description');
				$img_feature = wp_get_attachment_image_src(get_sub_field('image'), 'panel'); 
				
				?>
		
				<div class="row os-animation" data-os-animation="fadeInUp" data-os-animation-delay="0.2s">
					
					<?php if ($counter % 2 === 0) :?>
					<div class="small-12 medium-6 medium-push-6 columns">
					<?php else: ?>
					<div class="small-12 medium-6 columns">
					<?php endif; ?>
						<img src="<?php echo $img_feature[0]; ?>" alt="<?php echo get_the_title(get_field('introduction_image')); ?>">
					</div>
					<?php if ($counter % 2 === 0) :?>
					<div class="small-12 medium-6 medium-pull-6 columns">
					<?php else: ?>
					<div class="small-12 medium-6 columns">
					<?php endif; ?>
						<div class="block feature--block">
							<h4><?php echo $title_feature; ?></h4>
							<?php echo $desc_feature; ?>
						</div>
					</div>
				</div>
		
			<?php $counter++;
				endwhile; ?>
		
		<?php endif; ?>
		
	</section>
	<section id="pricing" class="panel panel--pricing">
		<h4 class="center"><?php the_field('pricing_title'); ?></h4>
		
		<?php 
			
			if( have_rows('pricing_block') ): ?>

			<div class="row staggered-animation-container02">
		
			<?php 
				$counter = 0;
				
				while( have_rows('pricing_block') ): the_row(); 
		
				$price_title = get_sub_field('price_title');
				$price_text = get_sub_field('text_area');
				?>
				
				<?php
					
					$counter++;

					switch ( $counter ) {
				
						case 1: 
							echo '<div class="small-12 medium-6 large-3 columns staggered-animation02" data-os-animation="fadeInUp" data-os-animation-delay="0.2s">';
							break;
				
						case 2: 
							echo '<div class="small-12 medium-6 large-3 columns staggered-animation02" data-os-animation="fadeInUp" data-os-animation-delay="0.4s">';
							break;
				
						case 3:
							echo '<div class="small-12 medium-6 large-3 columns staggered-animation02" data-os-animation="fadeInUp" data-os-animation-delay="0.6s">';
							break;
				
						case 4: 
						 	echo '<div class="small-12 medium-6 large-3 columns staggered-animation02" data-os-animation="fadeInUp" data-os-animation-delay="0.8s">';
				
							break;
					}	
					
				?>
					
					<div class="block block--pricing block--pricing--free">
						<h6><?php echo $price_title; ?></h6>
						<?php echo $price_text; ?>
					</div>
				</div>
		
			<?php
				endwhile; ?>
		
			</div>
		
		<?php endif; ?>
		</div>
		
		<p class="center disclaimer"><?php the_field('pricing_disclaimer'); ?></p>
		</div>
	</section>
	
	<section class="panel panel--contact">
		<div class="row">
			<div class="small-12 columns">
				<h3 class="center">Contact Us</h3>
				<?php echo do_shortcode('[gravityform id="1" title="false" description="false"]'); ?>
			</div>
		</div>
	</section>
	
<?php endwhile; endif; ?>

<?php get_footer(); ?>
