<?php
/*
 * post type: clinic
 * argument: destination
 * NB. Remember to rebuild permalinks after EVERY change
 ***/

// add destination to query vars
function add_query_vars($params) {
    $params[] = "destination_param";
    $params[] = "clinic_param";
    $params[] = "countries_param";
    return $params;
}
add_filter('query_vars', 'add_query_vars');

// flush_rewrite_rules( true );

// add new rewrite rules for clinic single and archive pages
function add_rewrite_rules($rules) {

    // booking with clinic
    $rules += array('booking/clinic/(.+?)/?$' => 'index.php?pagename=booking&clinic_param=$matches[1]');

    // booking with destination
    $rules += array('booking/destination/(.+?)/?$' => 'index.php?pagename=booking&destination_param=$matches[1]');

    // multiple country recommendations
    $rules += array('multiple-countries/countries/(.+?)/?$' => 'index.php?pagename=multiple-countries&countries_param=$matches[1]');


    return $rules;

    // single: ?clinic=london
    // archive page: ?post_type=clinic
    // page: ?pagename=clinic
}
add_filter('rewrite_rules_array', 'add_rewrite_rules');
?>
