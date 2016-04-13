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
    'google_service'    => !empty($google_service) ? $google_service : 'lug.ustc.edu.cn',
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
    <h1><?php echo __('Google Font Fix Options'); ?></h1>
    <form method="POST" action="" novalidate="novalidate">
        <h2><?php echo __('Google Service'); ?></h2>
        <table class="form-table">
            <tr>
                <th scope="row">
                    <label for="google-service"><?php echo __('Service Provider'); ?></label>
                </th>
                <td>
                    <select name="google-service" id="google-service">
                    <?php if ( !is_ssl() ): ?>
                        <option value="useso.com"><?php echo __('Qihoo 360 Technology Co. Ltd.'); ?></option>
                    <?php endif; ?>
                        <option value="lug.ustc.edu.cn"><?php echo __('University of Science and Technology of China'); ?></option>
                        <option value="css.network"><?php echo __('CSS.NET'); ?></option>
                    </select>
                </td>
            </tr>
        </table> <!-- .form-table -->
        <h2><?php echo __('Gravatar Service'); ?></h2>
        <table class="form-table">
            <tr>
                <th scope="row">
                    <label for="gravatar-service"><?php echo __('Service Provider'); ?></label>
                </th>
                <td>
                    <select name="gravatar-service" id="gravatar-service">
                        <option value="https://secure.gravatar.com/avatar"><?php echo __('Gravatar Secure Connection'); ?></option>
                        <option value="//cn.gravatar.com/avatar"><?php echo __('Gravatar in China'); ?></option>
                        <option value="//gravatar.css.network/avatar"><?php echo __('CSS.NET'); ?></option>
                        <option value="//cdn.v2ex.com/gravatar"><?php echo __('V2EX'); ?></option>
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
