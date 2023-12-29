<?php
/*
Plugin Name: Custom Dashboard
Description: Plugin personalizado criado por iFabra Expert WP.
Version: 1.0
Author: @fabricciomb
*/

// Adiciona as configurações de personalização no painel de administração
function custom_dashboard_login_settings() {
    add_menu_page('Admin Custom', 'Admin Custom', 'manage_options', 'custom-dashboard-login-settings', 'custom_dashboard_login_settings_page');
}
add_action('admin_menu', 'custom_dashboard_login_settings');

// Adiciona as configurações no banco de dados
function custom_dashboard_login_register_settings() {
    $settings_fields = array(
        'dashboard_color',
        'dashboard_text_color',
        'adminmenu_button_color',
        'adminmenu_bg_color',
        'adminmenu_text_color',
        'adminmenu_link_color',
        'adminmenu_link_hover_color',
        'adminmenu_link_focus_color',
        'adminmenu_li_color',
        'adminsubmenu_bg_color',
        'adminsubmenu_text_color',
        'adminsubmenu_link_color',
        'adminsubmenu_link_hover_color',
        'adminsubmenu_link_focus_color',
        'wpadminbar_bg_color',
        'wpadminbar_link_color',
        'wpadminbar_link_hover_color',
        'wpadminbar_link_focus_color',
        'wpadminbar_submenu_bg_color',
        'adminmenu_separator_bg_color', 
    );

    foreach ($settings_fields as $field) {
        register_setting('custom-dashboard-login-settings', $field, ['sanitize_callback' => 'sanitize_hex_color']);
    }
}
add_action('admin_init', 'custom_dashboard_login_register_settings');

// Adiciona a função para personalizar o estilo do menu admin e do admin bar
function custom_dashboard_bg() {
    echo '<style id="custom-dashboard-styles">';

    $dashboard_color = get_option('dashboard_color', '#eaeaea');
    $dashboard_text_color = get_option('dashboard_text_color', '#333');
    $adminmenu_button_color = get_option('adminmenu_button_color', '#ffffff');
    $adminmenu_bg_color = get_option('adminmenu_bg_color', '#333');
    $adminmenu_text_color = get_option('adminmenu_text_color', '#555');
    $dashboard_color = get_option('dashboard_color', '#eaeaea');
    $dashboard_text_color = get_option('dashboard_text_color', '#333');
    $adminmenu_bg_color = get_option('adminmenu_bg_color', '#333');
    $adminmenu_text_color = get_option('adminmenu_text_color', '#555');
    $adminmenu_link_color = get_option('adminmenu_link_color', '#777');
    $adminmenu_link_hover_color = get_option('adminmenu_link_hover_color', '#999');
    $adminmenu_link_focus_color = get_option('adminmenu_link_focus_color', '#bbb');
    $adminmenu_li_color = get_option('adminmenu_li_color', '#666');
    $adminsubmenu_bg_color = get_option('adminsubmenu_bg_color', '#444');
    $adminsubmenu_text_color = get_option('adminsubmenu_text_color', '#666');
    $adminsubmenu_link_color = get_option('adminsubmenu_link_color', '#888');
    $adminsubmenu_link_hover_color = get_option('adminsubmenu_link_hover_color', '#aaa');
    $adminsubmenu_link_focus_color = get_option('adminsubmenu_link_focus_color', '#ccc');
    $wpadminbar_bg_color = get_option('wpadminbar_bg_color', '#333');
    $wpadminbar_link_color = get_option('wpadminbar_link_color', '#777');
    $wpadminbar_link_hover_color = get_option('wpadminbar_link_hover_color', '#999');
    $wpadminbar_link_focus_color = get_option('wpadminbar_link_focus_color', '#bbb');
    $wpadminbar_submenu_bg_color = get_option('wpadminbar_submenu_bg_color', '#333');
    $adminmenu_separator_bg_color = get_option('adminmenu_separator_bg_color', '#666');
		echo '#adminmenu li.wp-menu-separator {
			background-color: ' . esc_attr($adminmenu_separator_bg_color) . ' !important;
		}';
    echo '<style>
        body {
            background-color: ' . esc_attr($dashboard_color) . ';
        }
        input#submit {
            background: ' . esc_attr($adminmenu_button_color) . '!important;
			border: none!important;
        }
        #adminmenu li a,
        #adminmenu .wp-submenu a {
            color: ' . esc_attr($adminmenu_link_color) . ';
        }

        #adminmenu li a:hover,
        #adminmenu .wp-submenu a:hover {
            background-color: ' . esc_attr($adminmenu_link_hover_color) . ';
        }

        #adminmenu li a:focus,
        #adminmenu .wp-submenu a:focus {
            background-color: ' . esc_attr($adminmenu_link_focus_color) . ';
        }

        #adminmenu li.wp-menu-separator {
            background-color: ' . esc_attr($adminmenu_separator_bg_color) . ' !important;
        }

        #adminmenu li.menu-top:hover,
        #adminmenu li.menu-top:focus,
        #adminmenu li.menu-top a:focus,
        #adminmenu li.menu-top a:hover {
            color: ' . esc_attr($adminmenu_text_color) . ';
            background-color: ' . esc_attr($adminmenu_link_color) . ';
        }

        #wpwrap {
        }
        #adminmenuback,
        #adminmenuwrap,
        #adminmenu,
        #adminmenu .wp-submenu,
        #adminmenu .wp-submenu-wrap {
            background-color: ' . esc_attr($adminmenu_bg_color) . ';
        }
        #adminmenu li.menu-top,
        #adminmenu li.wp-menu-separator,
        #adminmenu li.menu-top:hover,
        #adminmenu li.menu-top:focus,
        #adminmenu li.menu-top a:focus,
        #adminmenu li.menu-top a:hover {
            color: ' . esc_attr($adminmenu_text_color) . ';
            background-color: ' . esc_attr($adminmenu_link_color) . ';
        }
        #adminmenu li.menu-top,
        #adminmenu li.menu-top:hover,
        #adminmenu li.menu-top:focus,
        #adminmenu li.menu-top a:focus,
        #adminmenu li.menu-top a:hover {
            background-color: ' . esc_attr($adminmenu_li_color) . '; /* Nova propriedade para o background do li no admin menu */
        }
        #adminmenu a, #adminmenu a::before,
        #adminmenu div.wp-menu-image:before {
            color: ' . esc_attr($adminmenu_link_color) . ';
        }
        #adminmenu li.menu-top:hover,
        #adminmenu li.menu-top:focus,
        #adminmenu li.menu-top a:focus,
        #adminmenu li.menu-top a:hover {
            background-color: ' . esc_attr($adminmenu_link_hover_color) . ';
        }
		#adminmenu .wp-has-current-submenu .wp-submenu .wp-submenu-head, #adminmenu .wp-menu-arrow, #adminmenu .wp-menu-arrow div, #adminmenu li.current a.menu-top, #adminmenu li.wp-has-current-submenu a.wp-has-current-submenu {
            background: ' . esc_attr($adminmenu_link_focus_color) . '!important;
        }
        #adminmenu .wp-submenu {
            background-color: ' . esc_attr($adminsubmenu_bg_color) . ';
        }
        #adminmenu .wp-submenu a,
        #adminmenu .wp-submenu a:hover,
        #adminmenu .wp-submenu a:focus,
		{
            color: ' . esc_attr($adminsubmenu_text_color) . ';
            background-color: ' . esc_attr($adminsubmenu_link_color) . ';
        }
        #adminmenu .wp-submenu a:hover,
        #adminmenu .wp-submenu a:focus {
            background-color: ' . esc_attr($adminsubmenu_link_hover_color) . ';
        }
        #adminmenu .wp-submenu a:focus {
            background-color: ' . esc_attr($adminsubmenu_link_focus_color) . ';
        }
        #wpcontent, #wpcontent h1, #wpcontent h2, #wpcontent h3, .wrap th,.inside, .welcome-panel-column-container,.handle-actions.hide-if-no-js {
            background: ' . esc_attr($dashboard_color) . '!important;
            color: ' . esc_attr($dashboard_text_color) . ';
			margin-top: 0px!important;
			padding-top: 10px!important;
        }
        .wrap {
            background-color: ' . esc_attr($dashboard_color) . ';
            color: ' . esc_attr($dashboard_text_color) . ';
        }
        /* Estilos para elementos input na página de configurações */
        .wrap input[type="color"] {
            width: 50px; /* Ajuste conforme necessário */
        }
        /* Estilos específicos para o Admin Bar */
        #wpadminbar {
            background-color: ' . esc_attr($wpadminbar_bg_color) . ' !important;
        }
        #wpadminbar a,  #wpadminbar span, #wpadminbar span::before {
            color: ' . esc_attr($wpadminbar_link_color) . ' !important;
        }
        #wpadminbar a:hover,a.ab-item:hover {
            background: ' . esc_attr($wpadminbar_link_hover_color) . ' !important;
        }
        #wpadminbar :focus {
            color: ' . esc_attr($wpadminbar_link_focus_color) . ' !important;
        }
        #wpadminbar #wp-admin-bar-site-name .ab-item:before,
        #wpadminbar #wp-admin-bar-my-account .ab-item:before {
            color: ' . esc_attr($wpadminbar_link_color) . ' !important;
        }
        #wpadminbar .ab-sub-wrapper {
            background-color: ' . esc_attr($wpadminbar_submenu_bg_color) . ' !important; /* Nova propriedade para o background do submenu no admin bar */
        }


    </style>';
}
add_action('admin_head', 'custom_dashboard_bg');

// Adiciona a página de configurações personalizadas
function custom_dashboard_login_settings_page() {
    ?>
    <div class="wrap">
        <h1>Admin Custom Settings</h1>
        <form method="post" action="options.php">
            <?php
            settings_fields('custom-dashboard-login-settings');
            do_settings_sections('custom-dashboard-login-settings');
            ?>
            <table class="form-table">
                <tr valign="top">
                    <th scope="row">Dashboard</th>
                    <td><em>Dashboard Settings</em></td>
                </tr>
				<tr valign="top">
					<th scope="row">Menu Button Color</th>
					<td><input type="color" name="adminmenu_button_color" value="<?php echo esc_attr(get_option('adminmenu_button_color', '#ffffff')); ?>" /></td>
				</tr>
                <tr valign="top">
                    <th scope="row">Background Color</th>
                    <td>
                        <input type="color" name="dashboard_color" value="<?php echo esc_attr(get_option('dashboard_color', '#eaeaea')); ?>" />
                    </td>
                </tr>
                <tr valign="top">
                    <th scope="row">Text Color</th>
                    <td><input type="color" name="dashboard_text_color" value="<?php echo esc_attr(get_option('dashboard_text_color', '#333')); ?>" /></td>
                </tr>
                <tr valign="top">
                    <th scope="row">Menu Admin</th>
                    <td><em>Menu Admin Settings</em></td>
                </tr>
                <tr valign="top">
                    <th scope="row">Menu Background</th>
                    <td><input type="color" name="adminmenu_bg_color" value="<?php echo esc_attr(get_option('adminmenu_bg_color', '#333')); ?>" /></td>
                </tr>
                <tr valign="top">
                    <th scope="row">Menu li Background</th>
                    <td><input type="color" name="adminmenu_li_color" value="<?php echo esc_attr(get_option('adminmenu_li_color', '#666')); ?>" /></td>
                </tr>
                <tr valign="top">
                    <th scope="row">Separator Background Color</th>
                    <td><input type="color" name="adminmenu_separator_bg_color" value="<?php echo esc_attr(get_option('adminmenu_separator_bg_color', '#666')); ?>" /></td>
                </tr>
                <tr valign="top">
                    <th scope="row">Menu li a</th>
                    <td><input type="color" name="adminmenu_link_color" value="<?php echo esc_attr(get_option('adminmenu_link_color', '#777')); ?>" /></td>
                </tr>
                <tr valign="top">
                    <th scope="row">Menu li a:hover Color</th>
                    <td><input type="color" name="adminmenu_text_color" value="<?php echo esc_attr(get_option('adminmenu_text_color', '#555')); ?>" /></td>
                </tr>
                <tr valign="top">
                    <th scope="row">Menu li a:hover Background</th>
                    <td><input type="color" name="adminmenu_link_hover_color" value="<?php echo esc_attr(get_option('adminmenu_link_hover_color', '#999')); ?>" /></td>
                </tr>
                <tr valign="top">
                    <th scope="row">Menu li a:active Background</th>
                    <td><input type="color" name="adminmenu_link_focus_color" value="<?php echo esc_attr(get_option('adminmenu_link_focus_color', '#bbb')); ?>" /></td>
                </tr>
                <tr valign="top">
                    <th scope="row">Sub menu admin menu</th>
                    <td><em>Sub menu admin menu Settings</em></td>
                </tr>
                <tr valign="top">
                    <th scope="row">Submenu Background Color</th>
                    <td><input type="color" name="adminsubmenu_bg_color" value="<?php echo esc_attr(get_option('adminsubmenu_bg_color', '#444')); ?>" /></td>
                </tr>
                <tr valign="top">
                    <th scope="row">Submenu Text Color</th>
                    <td><input type="color" name="adminsubmenu_text_color" value="<?php echo esc_attr(get_option('adminsubmenu_text_color', '#666')); ?>" /></td>
                </tr>
                <tr valign="top">
                    <th scope="row">Submenu Link Color</th>
                    <td>                        <input type="color" name="adminsubmenu_link_color" value="<?php echo esc_attr(get_option('adminsubmenu_link_color', '#888')); ?>" />
                    </td>
                </tr>
                <tr valign="top">
                    <th scope="row">Submenu Link Hover Color</th>
                    <td><input type="color" name="adminsubmenu_link_hover_color" value="<?php echo esc_attr(get_option('adminsubmenu_link_hover_color', '#aaa')); ?>" /></td>
                </tr>
                <tr valign="top">
                    <th scope="row">SubMenu Link Focus Color</th>
                    <td><input type="color" name="adminsubmenu_link_focus_color" value="<?php echo esc_attr(get_option('adminsubmenu_link_focus_color', '#ccc')); ?>" /></td>
                </tr>
                <tr valign="top">
                    <th scope="row">Admin Bar</th>
                    <td><em>Admin Bar Settings</em></td>
                </tr>
                <tr valign="top">
                    <th scope="row">Admin Bar Background </th>
                    <td><input type="color" name="wpadminbar_bg_color" value="<?php echo esc_attr(get_option('wpadminbar_bg_color', '#333')); ?>" /></td>
                </tr>
                <tr valign="top">
                    <th scope="row">Admin Bar li a</th>
                    <td><input type="color" name="wpadminbar_link_color" value="<?php echo esc_attr(get_option('wpadminbar_link_color', '#777')); ?>" /></td>
                </tr>
                <tr valign="top">
                    <th scope="row">Admin Bar li a:hover li</th>
                    <td><input type="color" name="wpadminbar_link_hover_color" value="<?php echo esc_attr(get_option('wpadminbar_link_hover_color', '#999')); ?>" /></td>
                </tr>
				<tr valign="top">
                    <th scope="row">Admin Bar submenu</th>
                    <td><em>Custom code Settings</em></td>
                </tr>
                <tr valign="top">
                    <th scope="row">Admin Bar Submenu Background</th>
                    <td><input type="color" name="wpadminbar_submenu_bg_color" value="<?php echo esc_attr(get_option('wpadminbar_submenu_bg_color', '#333')); ?>" /></td>
                </tr>
                <tr valign="top">
                    <th scope="row">Admin Bar Link Focus Color</th>
                    <td><input type="color" name="wpadminbar_link_focus_color" value="<?php echo esc_attr(get_option('wpadminbar_link_focus_color', '#bbb')); ?>" /></td>
                </tr>
            </table>
			
            <?php submit_button(); ?>
        </form>
    </div>
    <?php
}