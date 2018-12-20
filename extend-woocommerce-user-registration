<?php

/**
*
*Example of how to require and exend the the WooCommerce User Registration fields with custom fields or in this case custom user roles.
*
*/

function sleepy_WC_extra_registration_fields() {

?>
    <p class="form-row form-row-first">
    
        <label for="reg_role"> <?php _e( 'Add Your Association', 'woocommerce' ); ?> </label>
        
        <select class="input-text" name="role" id="reg_role">
        
            <option <?php if ( ! empty( $_POST['role'] ) && $_POST['role'] == 'american_academe_of_orofacial_pain') esc_attr_e( 'selected' ); ?> value="american_academe_of_orofacial_pain"> American Academe Of Orofacial Pain &nbsp;</option>
          
        </select>
    </p>

	<?php
}

add_action( 'woocommerce_register_form', 'sleepy_WC_extra_registration_fields');


/* To validate WooCommerce registration form custom fields.  */

function sleepy_WC_validate_reg_form_fields($username, $email, $validation_errors) {

	if (isset($_POST['role']) && empty($_POST['role']) ) {
  
		$validation_errors->add('role_error', __('Choose Your Association Or Choose No Affiliation', 'woocommerce'));
    
	}

	return $validation_errors;
}

add_action('woocommerce_register_post', 'sleepy_WC_validate_reg_form_fields', 10, 3);


/* To save WooCommerce registration form custom fields. */

function sleepy_WC_save_registration_form_fields($customer_id) {

//Role field

	if (isset($_POST['role'])) {
  
		update_user_meta($customer_id, 'role', sanitize_text_field($_POST['role']));
    
	}

}

add_action('woocommerce_created_customer', 'sleepy_WC_save_registration_form_fields');
