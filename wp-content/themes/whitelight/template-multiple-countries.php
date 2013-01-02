<?php /* Template Name: Multiple countries */ ?>

<?php get_header(); ?>

<script type="text/javascript">

var multipleCountries = {
    countries: [],
    chosenCountries: [],
    render: function(){
        var self = this;

        jQuery( "#country-recommendation" ).autocomplete({
            source: self.countries,
            minLength: 0,

            select: function(event, ui) {

                // loading spinner
                jQuery( "#loading-dialog" ).dialog({
                    modal: true,
                    width: 50,
                    height: 120,
                    resizable: false
                });

                // add country to list
                self.chosenCountries.push(ui.item.country_id);

                // update window
                var url = jQuery('base').attr('href') + '/multiple-countries/countries/' + self.chosenCountries.join();
                window.location.href = url;
                return false;
            },
        }).focus(function(){
            jQuery(this).autocomplete( "search", "" );
        });
    }
};

<?php

    // get list of all countries
    $all_countries = array();
    $get_countries = getCountries();
    foreach($get_countries as $country){
        $country_name = $country->post_title;
        $country_id = $country->ID;
        $all_countries[] = array("label"=> $country_name, "country_id"=> $country_id);
    }

    // get chosen countries from url parameters
    $chosen_countries_param = $wp_query->query_vars['countries_param'];
    if($chosen_countries_param === NULL){
        $chosen_countries = array();
    }else{
        $chosen_countries = explode(",", $chosen_countries_param);
    }

?>

jQuery(function($) {

    // set countries and render
    multipleCountries.chosenCountries = <?php echo json_encode($chosen_countries); ?>;
    multipleCountries.countries = <?php echo json_encode($all_countries); ?>;
    multipleCountries.render();

});



</script>

<div id="loading-dialog" title="Vent venligst" style="display:none;text-align: center;">
    <img src="<?php bloginfo('template_directory'); ?>/img/loading.gif">
</div>
<div id="content">
    <div class="page col-full">
        <section id="main" class="col-left">
            <div class="post country col-full">
                <header><h1><?php the_title(); ?></h1></header>

                <?php if($_GET["gclid"]) { ?>
                    <div class="dlvs-general-info">
                        <?php dynamic_sidebar( 'vaccination-information' ); ?>
                    </div>
                <?php } ?>

                <div>
                    <label for="country-recommendation">Vælg et land af gangen: </label>
                    <input id="country-recommendation" />
                </div>

                <?php
                    // vaccinations for groups
                    $vaccinations_groups = array();
                    $vaccinations_groups[1] = array();
                    $vaccinations_groups[2] = array();
                    $vaccinations_groups[3] = array();
                    $vaccinations_groups[4] = array();
                    $vaccinations_groups[5] = array();

                    foreach($chosen_countries as $country){

                        // build vaccination groups
                        $group_1 = get_field('group_1', $country);
                        if(is_array($group_1)){
                            $vaccinations_groups[1] = array_merge($vaccinations_groups[1], $group_1);
                        }

                        $group_2 = get_field('group_2', $country);
                        if(is_array($group_2)){
                            $vaccinations_groups[2] = array_merge($vaccinations_groups[2], $group_2);
                        }

                        $group_3 = get_field('group_3', $country);
                        if(is_array($group_3)){
                            $vaccinations_groups[3] = array_merge($vaccinations_groups[3], $group_3);
                        }

                        $group_4 = get_field('group_4', $country);
                        if(is_array($group_4)){
                            $vaccinations_groups[4] = array_merge($vaccinations_groups[4], $group_4);
                        }

                        $group_5 = get_field('group_5', $country);
                        if(is_array($group_5)){
                            $vaccinations_groups[5] = array_merge($vaccinations_groups[5], $group_5);
                        }
                    }
                    ?>

                    <div id="chosen_countries_info">
                        <?php
                        // get info of chosen countries
                        foreach($chosen_countries as $index => $country_id){
                            $country_name = get_the_title($country_id);
                            $country_flag = get_field('flag', $country_id);

                            // remove current country from list
                            $chosen_countries_minus_current = $chosen_countries;
                            array_splice($chosen_countries_minus_current, $index, 1);

                            if(count($chosen_countries_minus_current) > 0) {
                                $remove_link = get_bloginfo('url') . '/multiple-countries/countries/' . implode(",",$chosen_countries_minus_current);
                            }else{
                                $remove_link = get_bloginfo('url') . '/multiple-countries/';
                            }
                            echo
                                '<div class="chosen_country" title="' . $country_name . '">
                                    <h3>' . $country_name . '</h3>
                                    <img height="50" src="' . $country_flag . '">
                                    <p><a href="' . $remove_link . '">Fjern</a></p>
                                </div>
                            ';

                        }
                        ?>
                    </div>


                    <?php if(count($chosen_countries) > 0 ): ?>
                        <?php vaccination_groups($vaccinations_groups); ?>

                        <div class="dlvs-disclaimer-info">
                            <?php dynamic_sidebar( 'vaccination-disclaimer' ); ?>
                        </div>

                        <div id="legend">
                            <h3>Symbolforklaring</h3>
                            <table>
                                <tr><td class="symbol"><img src="<?php echo get_bloginfo("template_url"); ?>/img/checkmark.png"/></td><td>Anbefalet</td></tr>
                                <tr><td class="symbol"><span class="question-mark-circle">?</span></td><td> Bør overvejes</td></tr>
                            </table>
                        </div>
                    <?php endif; ?>



            </div>
        </section>
    </div>
</div>

<?php get_footer(); ?>