<?php
/*
Plugin Name: Custom Login
Description: Plugin personalizado para personalizar o formulário de login.
Version: 1.0
Author: @fabricciomb
*/

// Adiciona as configurações de personalização no painel de administração
function custom_login_settings() {
    add_menu_page('Custom Login', 'Custom Login', 'manage_options', 'custom-login-settings', 'custom_login_settings_page');
}
add_action('admin_menu', 'custom_login_settings');

// Adiciona as configurações no banco de dados
function custom_login_register_settings() {
    $settings_fields = array(
        'login_bg_color',
        'login_form_position',
        'login_bg_image',
        'login_bg_repeat',
        'login_bg_position',
        'login_logo',
        'login_logo_link',
        'login_logo_size',
        'login_padding'
    );

    foreach ($settings_fields as $field) {
        register_setting('custom-login-settings', $field, ['sanitize_callback' => 'sanitize_text_field']);
    }
}
add_action('admin_init', 'custom_login_register_settings');

// Adiciona a função para personalizar o estilo do formulário de login
function custom_login_styles() {
    echo '<style id="custom-login-styles">';

    $login_bg_color = get_option('login_bg_color', '#f5f5f5');
    $login_form_position = get_option('login_form_position', 'relative');
    $login_bg_image = get_option('login_bg_image', '');
    $login_bg_repeat = get_option('login_bg_repeat', 'no-repeat');
    $login_bg_position = get_option('login_bg_position', 'center center');
    $login_logo = get_option('login_logo', '');
    $login_logo_link = get_option('login_logo_link', '');
    $login_logo_size = get_option('login_logo_size', '');
    $login_padding = get_option('login_padding', '20px');

    echo 'body.login {
        background-color: ' . esc_attr($login_bg_color) . ';
        background-image: url(' . esc_url($login_bg_image) . ');
        background-repeat: ' . esc_attr($login_bg_repeat) . ';
        background-position: ' . esc_attr($login_bg_position) . ';
    }';

    if (!empty($login_logo)) {
        echo '#login h1 a {
            background-image: url(' . esc_url($login_logo) . ') !important;
            height: ' . esc_attr($login_logo_size) . ' !important;
            width: ' . esc_attr($login_logo_size) . ' !important;
            background-size: contain !important;
        }';
    }

	echo 'div#login {
		padding-left: ' . esc_attr($login_padding) . '!important;
		padding-right: ' . esc_attr($login_padding) . '!important;
		padding-top: ' . esc_attr($login_padding) . ' !important;
		padding-bottom: ' . esc_attr($login_padding) . ' !important;
		float: ' . esc_attr($login_form_position) . ' !important;
	}';

    echo '</style>';
}
add_action('login_head', 'custom_login_styles');

// Adiciona a página de configurações personalizadas
function custom_login_settings_page() {
    ?>
    <div class="wrap">
        <h1>Custom Login Settings</h1>
        <form method="post" action="options.php">
            <?php
            settings_fields('custom-login-settings');
            do_settings_sections('custom-login-settings');
            ?>
            <table class="form-table">
                <tr valign="top">
                    <th scope="row">Background Color</th>
                    <td>
                        <input type="color" name="login_bg_color" value="<?php echo esc_attr(get_option('login_bg_color', '#f5f5f5')); ?>" />
                    </td>
                </tr>
                <tr valign="top">
                    <th scope="row">Form Position</th>
                    <td>
                        <select name="login_form_position">
                            <option value="left" <?php selected(get_option('login_form_position', 'left'), 'left!important'); ?>>Left</option>
                            <option value="center" <?php selected(get_option('login_form_position', 'center'), 'center!important'); ?>>Center</option>
                            <option value="right" <?php selected(get_option('login_form_position', 'right'), 'right!important'); ?>>Right</option>
                        </select>
                    </td>
                </tr>
                <tr valign="top">
                    <th scope="row">Form Padding y</th>
                    <td>
                        <input type="text" name="login_padding" value="<?php echo esc_attr(get_option('login_padding', '20px')); ?>" />
                        <p class="description">Enter the padding for the login form (e.g., '20px' or 'auto').</p>
                    </td>
                </tr>
                <tr valign="top">
                    <th scope="row">Background Image</th>
                    <td>
                        <input type="text" name="login_bg_image" value="<?php echo esc_attr(get_option('login_bg_image', '')); ?>" />
                        <p class="description">URL image background.</p>
                    </td>
                </tr>
                <tr valign="top">
                    <th scope="row">Background Repeat</th>
                    <td>
                        <select name="login_bg_repeat">
                            <option value="no-repeat" <?php selected(get_option('login_bg_repeat', 'no-repeat'), 'no-repeat'); ?>>No Repeat</option>
                            <option value="repeat" <?php selected(get_option('login_bg_repeat', 'no-repeat'), 'repeat'); ?>>Repeat</option>
                            <option value="repeat-x" <?php selected(get_option('login_bg_repeat', 'no-repeat'), 'repeat-x'); ?>>Repeat X</option>
                            <option value="repeat-y" <?php selected(get_option('login_bg_repeat', 'no-repeat'), 'repeat-y'); ?>>Repeat Y</option>
                        </select>
                    </td>
                </tr>
                <tr valign="top">
                    <th scope="row">Background Position</th>
                    <td>
                        <select name="login_bg_position">
                            <option value="left top" <?php selected(get_option('login_bg_position', 'center center'), 'left top'); ?>>Left Top</option>
                            <option value="left center" <?php selected(get_option('login_bg_position', 'center center'), 'left center'); ?>>Left Center</option>
                            <option value="left bottom" <?php selected(get_option('login_bg_position', 'center center'), 'left bottom'); ?>>Left Bottom</option>
                            <option value="center top" <?php selected(get_option('login_bg_position', 'center center'), 'center top'); ?>>Center Top</option>
                            <option value="center center" <?php selected(get_option('login_bg_position', 'center center'), 'center center'); ?>>Center Center</option>
                            <option value="center bottom" <?php selected(get_option('login_bg_position', 'center center'), 'center bottom'); ?>>Center Bottom</option>
                            <option value="right top" <?php selected(get_option('login_bg_position', 'center center'), 'right top'); ?>>Right Top</option>
                            <option value="right center" <?php selected(get_option('login_bg_position', 'center center'), 'right center'); ?>>Right Center</option>
                            <option value="right bottom" <?php selected(get_option('login_bg_position', 'center center'), 'right bottom'); ?>>Right Bottom</option>
                        </select>
                    </td>
                </tr>
                <tr valign="top">
                    <th scope="row">Logo image</th>
                    <td>
                        <input type="text" name="login_logo" value="<?php echo esc_attr(get_option('login_logo', '')); ?>" />
                        <p class="description">Insert Logo image URL</p>
                    </td>
                </tr>
                <tr valign="top">
                    <th scope="row">Logo url</th>
                    <td>
                        <input type="text" name="login_logo_link" value="<?php echo esc_attr(get_option('login_logo_link', '')); ?>" />
                        <p class="description">Logo url</p>
                    </td>
                </tr>
                <tr valign="top">
                    <th scope="row">Logo Size</th>
                    <td>
                        <input type="text" name="login_logo_size" value="<?php echo esc_attr(get_option('login_logo_size', '')); ?>" />
                        <p class="description">Size logo (e.g., '100px' or 'auto').</p>
                    </td>
                </tr>
            </table>
            <?php submit_button(); ?>
        </form>
    </div>
    <?php
}
