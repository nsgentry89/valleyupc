<?php
$includes = get_template_directory() . '/framework/imi-admin/';

/*Connect Envato market plugin.*/
if(!class_exists('Envato_Market')) {
	require_once($includes . 'envato-market/envato-market.php');
}

require_once $includes . 'imi-admin.php';
require_once $includes . 'theme-setup.php';