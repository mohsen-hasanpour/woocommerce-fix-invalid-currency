<?php

// ============ Woocommerce fix Price currency =======================================//
add_filter('woocommerce_structured_data_product_offer', function ($data, $product) {
    if (isset($data['priceCurrency']) && $data['priceCurrency'] === 'IRT') {
        $data['priceCurrency'] = 'IRR';
        $data['price'] = $data['price'] * 10;
    }
    return $data;
}, 999, 2);


// ============ Woocommerce fix Price currency (if have RankMath ) ====================//
add_filter('rank_math/json_ld', function ($data, $json_ld) {
    if (isset($data['richSnippet']['offers'])) {
        if (isset($data['richSnippet']['offers']['priceCurrency']) && $data['richSnippet']['offers']['priceCurrency'] === 'IRT') {
            $data['richSnippet']['offers']['priceCurrency'] = 'IRR';
            $data['richSnippet']['offers']['price'] = (float) $data['richSnippet']['offers']['price'] * 10;
        }
    }
    return $data;
}, 999, 2);