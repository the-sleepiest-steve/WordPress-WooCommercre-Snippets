<?php

// Removes cod or cash on delivery method from all views unless the user is an administrator role

function disable_cod( $available_gateways ) {

    //check whether the available payment gateways have Cash on delivery and user is not logged in or he is a user with role customer
    if ( isset($available_gateways['cod']) && !current_user_can('administrator') && !current_user_can('support') ) {

        //remove the cash on delivery payment gateway from the available gateways.

        unset($available_gateways['cod']);
    }
    return $available_gateways;
}

add_filter('woocommerce_available_payment_gateways', 'disable_cod', 99, 1);
