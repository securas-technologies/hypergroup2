<?php
/*
 * The file is included from /templates/meta-box-loaded-assets/_asset-script-single-row.php
*/

if (! isset($data)) {
	exit; // no direct access
}
?>
<!-- [wpacu_lite] -->
<?php if (isset($data['row']['obj']->src) && $data['row']['obj']->src !== '') { ?>
    <div class="wpacu-script-attributes-area wpacu-lite wpacu-only-when-kept-loaded">
        <div>If kept loaded, set the following attributes: <em><a class="go-pro-link-no-style" href="<?php echo apply_filters('wpacu_go_pro_affiliate_link', WPACU_PLUGIN_GO_PRO_URL); ?>">* <?php _e('Pro version', 'wp-asset-clean-up'); ?></a></em></div>
        <ul class="wpacu-script-attributes-settings wpacu-first">
            <li><a class="go-pro-link-no-style" href="<?php echo apply_filters('wpacu_go_pro_affiliate_link', WPACU_PLUGIN_GO_PRO_URL); ?>"><span class="wpacu-tooltip wpacu-larger"><?php echo str_replace('the premium', 'the<br />premium', wp_kses(__('This feature is available in the premium version of the plugin.',
				            'wp-asset-clean-up' ), array('br' => array()))); ?><br /> <?php _e('Click here to upgrade to Pro', 'wp-asset-clean-up'); ?>!</span><img width="20" height="20" src="<?php echo esc_url(WPACU_PLUGIN_URL); ?>/assets/icons/icon-lock.svg" valign="top" alt="" /></a>&nbsp; <strong>async</strong> &#10230;</li>
            <li><label><input disabled="disabled" type="checkbox" value="on_this_page" /><?php _e('on this page', 'wp-asset-clean-up'); ?></label></li>
            <li><label><input disabled="disabled" type="checkbox" value="everywhere" /><?php _e('everywhere', 'wp-asset-clean-up'); ?></label></li>
        </ul>
        <ul class="wpacu-script-attributes-settings">
            <li><a class="go-pro-link-no-style" href="<?php echo apply_filters('wpacu_go_pro_affiliate_link', WPACU_PLUGIN_GO_PRO_URL); ?>"><span class="wpacu-tooltip wpacu-larger"><?php echo str_replace('the premium', 'the<br />premium', wp_kses(__('This feature is available in the premium version of the plugin.',
				            'wp-asset-clean-up' ), array('br' => array()))); ?><br /> <?php _e('Click here to upgrade to Pro', 'wp-asset-clean-up'); ?>!</span><img width="20" height="20" src="<?php echo esc_url(WPACU_PLUGIN_URL); ?>/assets/icons/icon-lock.svg" valign="top" alt="" /></a>&nbsp; <strong>defer</strong> &#10230;</li>
            <li><label><input disabled="disabled" type="checkbox" value="on_this_page" /><?php _e('on this page', 'wp-asset-clean-up'); ?></label></li>
            <li><label><input disabled="disabled" type="checkbox" value="everywhere" /><?php _e('everywhere', 'wp-asset-clean-up'); ?></label></li>
        </ul>
        <div class="wpacu_clearfix"></div>
    </div>

    <?php
    $childHandles = isset($data['all_deps']['parent_to_child']['scripts'][$data['row']['obj']->handle]) ? $data['all_deps']['parent_to_child']['scripts'][$data['row']['obj']->handle] : array();

    $handleAllStatuses = array();

    if (! empty($childHandles)) {
	    $handleAllStatuses[] = 'is_parent';
    }

    if (isset($data['row']['obj']->deps) && ! empty($data['row']['obj']->deps)) {
	    $handleAllStatuses[] = 'is_child';
    }

    if (empty($handleAllStatuses)) {
	    $handleAllStatuses[] = 'is_independent';
    }

    $showMatchMediaFeature = false;

    // Is "independent" or has "parents" (is "child") with nothing under it (no "children")
    if (in_array('is_independent', $handleAllStatuses) || (in_array('is_child', $handleAllStatuses) && (! in_array('is_parent', $handleAllStatuses)))) {
	    $showMatchMediaFeature = true;
    }

    // "extra" is fine, "after" and "before" are more tricky to accept (at least at this time)
    $wpacuHasExtraInline = ($data['row']['extra_before_js'] || $data['row']['extra_after_js']);

    if ($showMatchMediaFeature && ! $wpacuHasExtraInline) {
    ?>
    <div class="wpacu-only-when-kept-loaded">
        <div style="margin: 0 0 15px;">
            <?php
            $wpacuDataForId = 'wpacu_handle_media_query_load_script_'.$data['row']['obj']->handle;
            ?>

            If kept loaded, make the browser download the file&nbsp;
                <select data-handle="<?php echo esc_attr($data['row']['obj']->handle); ?>"
                        data-wpacu-input="media-query-select"
                        name="<?php echo WPACU_FORM_ASSETS_POST_KEY; ?>[scripts][<?php echo esc_attr($data['row']['obj']->handle); ?>][media_query_load][enable]"
                    class="wpacu-screen-size-load wpacu-for-script">
                <option selected="selected" value="">on any screen size (default)</option>
                <option disabled="disabled" value="1">if the media query is matched (Pro)</option>
            </select>
            <div style="display: inline-block; vertical-align: middle; margin-left: -2px;"><a class="go-pro-link-no-style wpacu-media-query-load-requires-pro-popup" href="<?php echo apply_filters('wpacu_go_pro_affiliate_link', WPACU_PLUGIN_GO_PRO_URL.'?utm_source=manage_asset&utm_medium=media_query_load_js'); ?>"><span
                            class="wpacu-tooltip wpacu-larger" style="left: -26px;"><?php echo str_replace('the premium', 'the<br />premium', wp_kses(__('This feature is available in the premium version of the plugin.',
					        'wp-asset-clean-up' ), array('br' => array()))); ?><br/> <?php _e( 'Click here to upgrade to Pro',
					        'wp-asset-clean-up' ); ?>!</span> <img width="20" height="20" src="<?php echo esc_url(WPACU_PLUGIN_URL); ?>/assets/icons/icon-lock.svg" valign="top" alt="" /></a></div>
            <div class="wpacu-helper-area" style="vertical-align: middle; margin-left: 2px;"><a style="text-decoration: none; color: inherit;" target="_blank" href="https://assetcleanup.com/docs/?p=1023"><span class="dashicons dashicons-editor-help"></span></a></div>
        </div>
    </div>
    <?php
	}
	?>
    <div class="wpacu_clearfix"></div>
<!-- [/wpacu_lite] -->
<?php
}
