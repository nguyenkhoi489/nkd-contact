<?php

$allicon = get_option('config_setting_list');
if ($allicon) {
    echo "<div class=\"nkd-contact-plugin mobile_custom_icon_plg " . get_option('config_setting_postion') . "\" " . (get_option('config_setting_center') == 'yes' ? "style=\"top: 50% !important;bottom: unset !important;transform:translate(0,-50%);-webkit-transform:translate(0,-50%)\"" : "") . ">";
    echo '<div class="relative">';
    foreach ($allicon as $key => $item) {
        echo RenderViewIcon($item);
    }
    
    echo "</div>";
    if (get_option('config_setting_group_icon_mobile_enable') == 'on') { ?>
        <div class="icon_group_parent">
            <button type="button">
                <img class="icon_call_service" src="<?= Plugin_URI . 'image/customer-service.png' ?>" alt="">
                <img class="icon_close_service" src="<?= Plugin_URI . 'image/close.png' ?>" alt="">
            </button>
        </div>
<?php }
    echo "</div>";
}
?>