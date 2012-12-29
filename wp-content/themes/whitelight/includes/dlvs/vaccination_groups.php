<?php
function vaccination_groups($vaccinations_groups){

    $already_outputted = array();

    $vaccinations_groups_info = array(
        array(
            dlvs_translate("All travelers"),
            dlvs_translate("All travelers description"),
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
            <td class="vaccination-list">Vaccination</td>
            <?php foreach($vaccinations_groups_info as $info):
                $label = $info[0];
                $tooltip = $info[1];
            ?>
            <td class="vaccination-group"><span class="vaccination-group" title="<?=$tooltip?>"><?=$label?></span></td>

            <?php endforeach; ?>
        </tr>
    </thead>
    <tbody>
    <?php foreach($vaccinations_groups as $group_id => $group): ?>
        <?php if(!empty($group)): ?>
            <?php foreach($group as $vaccination): ?>
                <?php
                    // make sure every vaccine is only outputted once (somebody may have added a vaccine to multiple groups)
                    if(!in_array($vaccination->ID, $already_outputted)):
                        $already_outputted[] = $vaccination->ID;
                        ?>
                        <tr>
                            <td class="vaccination-name"><a href="<?php echo get_permalink( $vaccination->ID ); ?>"><?php echo $vaccination->post_title; ?></a></td>
                            <?php
                            // output cell with vaccination indicator
                            $checkmark = '<img src="'.get_bloginfo("template_url").'/img/checkmark.png"/>';
                            $checkmark_group5 = '<span class="question-mark-circle">?</span>';

                            $repeat_in_next_group = false;
                            for ( $counter = 1; $counter <= 4; $counter++) {
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
                        </tr>
                    <?php endif; ?>
            <?php endforeach; ?>
        <?php endif; ?>
    <?php endforeach; ?>
    </tbody>
</table>

<div id="legend">
    <h3>Symbolforklaring</h3>
    <table>
        <tr><td class="symbol"><img src="<?php echo get_bloginfo("template_url"); ?>/img/checkmark.png"/></td><td>Vaccinationen er nødvendig</td></tr>
        <tr><td class="symbol"><span class="question-mark-circle">?</span></td><td> Vaccinationen bør overvejes</td></tr>
    </table>
</div>

<?php
}
?>