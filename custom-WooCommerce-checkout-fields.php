<?php
//* Add select field to the checkout page

add_action('woocommerce_before_order_notes', 'watsons_add_select_checkout_field');

function watsons_add_select_checkout_field( $checkout ) {

	echo '<h2>'.__('How Did You Hear About Us?').'</h2>';
  
	woocommerce_form_field( 'hearabout', array(
  
		'type'          => 'select',
		'class'         => array( 'wps-drop' ),
		'label'         => __( 'Options' ),
		'options'       => array(
			'forum'		=> __( 'Forum', 'wps' ),
			'hot_vw'	=> __( 'Hot VW', 'wps' ),
			'magazine'	=> __( 'Magazine', 'wps' ),
			'search_engine' 	=> __( 'Search Engine', 'wps' ),
			'street_rodder' 	=> __( 'Street Rodder', 'wps' ),
			'streetscene' 	=> __( 'StreetScene', 'wps' ),
			'the_samba' 	=> __( 'The Samba', 'wps' ),
			'word_of_mouth' 	=> __( 'Word of Mouth', 'wps' ),
			'other' 	=> __( 'Other', 'wps' )

		)
    
	),
  
		$checkout->get_value( 'daypart' ));
    
}

//* Update the order meta with field value

add_action('woocommerce_checkout_update_order_meta', 'watsons_select_checkout_field_update_order_meta');

function watsons_select_checkout_field_update_order_meta( $order_id ) {

	if ($_POST['hearabout']) update_post_meta( $order_id, 'hearabout', esc_attr($_POST['hearabout']));
  
}


//* Display field value on the order edition page

add_action( 'woocommerce_admin_order_data_after_billing_address', 'wps_select_checkout_field_display_admin_order_meta', 10, 1 );
function wps_select_checkout_field_display_admin_order_meta($order){

	echo '<p><strong>'.__('How Did You Hear About Us?').':</strong> ' . get_post_meta( $order->id, 'hearabout', true ) . '</p>';
  
}

//* Add selection field value to emails

add_filter('woocommerce_email_order_meta_keys', 'wps_select_order_meta_keys');

function wps_select_order_meta_keys( $keys ) {

	$keys['Hearabout:'] = 'hearabout';
  
	return $keys;

}
