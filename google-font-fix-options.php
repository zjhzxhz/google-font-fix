<?php
add_action('admin_menu', 'gff_option_admin_menu');
function gff_option_admin_menu() {
    add_options_page(
        'Google Font Fix Options',
        'Google Font Fix',
        'manage_options',
        'google-font-fix',
        'gff_option_page'
    );
}

add_action('init', 'gff_load_plugin_textdomain');
function gff_load_plugin_textdomain() {
    $domain = 'google-font-fix';
    $locale = apply_filters( 'plugin_locale', get_locale(), $domain );
    
    load_textdomain($domain, trailingslashit( WP_LANG_DIR ) . $domain . '/' . $domain . '-' . $locale . '.mo');
    load_plugin_textdomain($domain, FALSE, basename(dirname( __FILE__ )) . '/languages/');
}

/*
 * User Settings.
 */
$google_service     = get_option('google_service');
$gravatar_service   = get_option('gravatar_service');

/*
 * Variables
 * Assignments are for default value - change on admin page.
 */
$gff_options = array(
    'google_service'    => !empty($google_service) ? $google_service : 'cat.net',
    'gravatar_service'  => !empty($gravatar_service) ? $gravatar_service : 'https://secure.gravatar.com/avatar',
);

/*
 * Option Page
 */
function gff_option_page() {
    global $gff_options;

    $google_service     = $_POST['google-service'];
    $gravatar_service   = $_POST['gravatar-service'];
    if ( isset($google_service) ) {
        update_option('google_service', $google_service);
        $gff_options['google_service'] = $google_service;
    }
    if ( isset($gravatar_service) ) {
        update_option('gravatar_service', $gravatar_service);
        $gff_options['gravatar_service'] = $gravatar_service;
    }
?>
<div class="wrap">
    <h1><?php echo __('Google Font Fix Options', 'google-font-fix'); ?></h1>
    <form method="POST" action="" novalidate="novalidate">
        <h2><?php echo __('Google Service'); ?></h2>
        <table class="form-table">
            <tr>
                <th scope="row">
                    <label for="google-service"><?php echo __('Service Provider', 'google-font-fix'); ?></label>
                </th>
                <td>
                    <select name="google-service" id="google-service">
                        <option value="proxy.ustclug.org"><?php echo __('University of Science and Technology of China', 'google-font-fix'); ?></option>
                        <option value="loli.net"><?php echo __('Simple Images Hosting', 'google-font-fix'); ?></option>
                    </select>
                </td>
            </tr>
        </table> <!-- .form-table -->
        <h2><?php echo __('Gravatar Service'); ?></h2>
        <table class="form-table">
            <tr>
                <th scope="row">
                    <label for="gravatar-service"><?php echo __('Service Provider', 'google-font-fix'); ?></label>
                </th>
                <td>
                    <select name="gravatar-service" id="gravatar-service">
                        <option value="//cn.gravatar.com/avatar"><?php echo __('Gravatar in China', 'google-font-fix'); ?></option>
                        <option value="//gravatar.loli.net/avatar"><?php echo __('Simple Images Hosting', 'google-font-fix'); ?></option>
                    </select>
                </td>
            </tr>
        </table> <!-- .form-table -->
        <?php submit_button(); ?>
    </form>
</div> <!-- .wrap -->
<script type="text/javascript">
    (function($) {
        $(function() {
            $('#google-service').val('<?php echo $gff_options['google_service']; ?>');
            $('#gravatar-service').val('<?php echo $gff_options['gravatar_service']; ?>');
        });
    })(jQuery);
</script>
<?php
}
