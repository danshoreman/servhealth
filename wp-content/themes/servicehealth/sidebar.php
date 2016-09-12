<div id="main-sidebar" class="sidebar" role="complementary">
	
	<?php if ( is_active_sidebar( 'Main Sidebar' ) ) : ?>
	
		<?php dynamic_sidebar( 'main-sidebar' ); ?>
	
	<?php else : ?>
	
	<div class="no-widgets">
		
		<p><?php _e( 'Please add some widgets.' );  ?></p>
	
	</div>
	
	<?php endif; ?>

</div>

