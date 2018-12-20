//Creates the Custom tabs filter and adds The two tabs defined below. Can be extended for more tabs if needed

add_filter( 'woocommerce_product_tabs', 'sleepy_woo_new_product_tab' );
function sleepy_woo_new_product_tab( $tabs ) {

	// Add the new tab conditionally if the field is populated

	if ( have_rows( 'add_product_attachment' ) ){

		$tabs['download_tab'] = array(
			'title'       => __( 'Product Downloads', 'text-domain' ),
			'priority'    => 50,
			'callback'    => 'sleepy_woo_download_product_tab_content'
		);

    }


    if ( have_rows( 'add_video' ) ){
	    $tabs['video_tab'] = array(
		    'title'       => __( 'Product Video', 'text-domain' ),
		    'priority'    => 60,
		    'callback'    => 'sleepy_woo_video_product_tab_content'
	    );
    }

	return $tabs;
}

function sleepy_woo_download_product_tab_content() {
	// The new tab content

	echo '<h2>Product Downloads</h2>'; ?>
	<?php if ( have_rows( 'add_product_attachment' ) ) : ?>
		<?php while ( have_rows( 'add_product_attachment' ) ) : the_row(); ?>
			<?php $product_attachement = get_sub_field( 'product_attachement' ); ?>
			<?php if ( $product_attachement ) { ?>
				<a href="<?php echo $product_attachement['url']; ?>"><?php echo $product_attachement['filename']; ?></a>
			<?php } ?>
		<?php endwhile; ?>
	<?php else : ?>
		<p>No Additional Downloads Available.</p>
	<?php endif; ?>

	<?php

} function sleepy_woo_video_product_tab_content() {
	// The new tab content



	echo '<h2>Product Video</h2>'; ?>

	<?php if ( have_rows( 'add_video' ) ) : ?>
		<?php while ( have_rows( 'add_video' ) ) : the_row(); ?>
			<?php the_sub_field( 'product_video' ); ?>
		<?php endwhile; ?>
	<?php else : ?>
		<?php // no rows found ?>
	<?php endif; ?>
    <?php
}
