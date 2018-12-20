<?php

// Display Price For Variable Product With Same Variations Prices Adding Fix to show individual variants price even when they have the same price as all other variants.
// This overrides default woocommerce functionality

add_filter('woocommerce_available_variation', function ($value, $object = null, $variation = null) {

    if ($value['price_html'] == '') {
    
        $value['price_html'] = '<span class="price">' . $variation->get_price_html() . '</span>';
        
    }
    
    return $value;
    
}, 10, 3);
