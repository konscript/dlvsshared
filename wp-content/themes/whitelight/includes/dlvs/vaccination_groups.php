<?php
function vaccination_groups($vaccinations_groups){

    $already_outputted = array();

    $vaccinations_groups_info = array(
        array(
            dlvs_translate("All travellers"),
            dlvs_translate("The following vaccinations are all recommended no matter the duration of stay in the country"),
        ),
        array(
            dlvs_translate("+2 weeks"),
            dlvs_translate("+2 weeks description"),
        ),
        array(
            dlvs_translate("+3 months"),
            dlvs_translate("+3 months description"),
        ),
        array(
            dlvs_translate("+6 months"),
            dlvs_translate("+6 months description"),
        )
    );
?>

<table id="vaccinations_groups">
    <thead>
        <tr>
            <td class="vaccination-list"><span class="vaccination-group" title="<?php echo dlvs_translate("Some recommendations might differ depending on duration of stay in the country. Please contact us if you're in doubt."); ?>"><?php echo dlvs_translate("Vaccination"); ?></span></td>
            <?php foreach($vaccinations_groups as $group_id => $vaccinations):
                if($group_id !== 5):
                    $label = $vaccinations_groups_info[$group_id - 1][0];
                    $tooltip = $vaccinations_groups_info[$group_id - 1][1];
            ?>
                <td class="vaccination-group"><span class="vaccination-group" title="<?=$tooltip?>"><?=$label?></span></td>
            <?php endif; endforeach; ?>
            <td class="vaccination-group">
                <span class="vaccination-group" title="<?php echo dlvs_translate("Explains time in advance of departure to get the vaccination. Please note that some vaccinations require more than one dosis and that the time in that case refers to the first vaccination. There are no problems in getting the vaccinations earlier than the minimum period."); ?>">
                    <?php echo dlvs_translate("When to get vaccinated"); ?>
                </span>
            </td>
        </tr>
    </thead>
    <tbody>
    <?php foreach($vaccinations_groups as $group_id => $vaccinations): ?>
        <?php if(!empty($vaccinations)): ?>
            <?php foreach($vaccinations as $vaccination): ?>
                <?php
                    // make sure every vaccine is only outputted once (somebody may have added a vaccine to multiple groups)
                    if(!in_array($vaccination->ID, $already_outputted)):
                        $already_outputted[] = $vaccination->ID;
                        ?>
                        <tr>
                            <td class="vaccination-name"><a href="<?php echo get_permalink( $vaccination->ID ); ?>"><?php echo $vaccination->post_title; ?></a></td>
                            <?php
                            // output cell with vaccination indicator
                            $checkmark = '<img src="'.get_bloginfo("template_url").'/img/checkmark.png" title="' . dlvs_translate("Recommended") . '"/>';
                            $checkmark_group5 = '<img src="'.get_bloginfo("template_url").'/img/plusmark.png"  title="' . dlvs_translate("Should be considered") . '"/>';

                            $repeat_in_next_group = false;
                            for ( $counter = 1; $counter < count($vaccinations_groups); $counter++) {
                                echo "<td>";

                                // group 1-4
                                if($counter == $group_id || $repeat_in_next_group === true){
                                    $repeat_in_next_group = true;
                                    echo $checkmark;
                                // group 5
                                }elseif($group_id == 5){
                                    echo $checkmark_group5;
                                }else{
                                    echo "-";
                                }
                                echo "</td>";
                            }
                            ?>
                            <td><?php echo(get_post_meta($vaccination->ID,'when_to_get_vaccinated',true)); ?></td>
                        </tr>
                    <?php endif; ?>
            <?php endforeach; ?>
        <?php endif; ?>
    <?php endforeach; ?>
    </tbody>
</table>

<?php
}
?>