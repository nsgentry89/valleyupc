<?php
/**
 * Tabs navigation.
 *
 * @package Meta Box
 */

?>
<h2 class="nav-tab-wrapper">
	<a href="#getting-started" class="nav-tab nav-tab-active"><?php esc_html_e( 'Getting Started', 'framework' ); ?></a>
	<?php do_action( 'rwmb_about_tabs' ); ?>
	<a href="#extensions" class="nav-tab"><?php esc_html_e( 'Extensions', 'framework' ); ?></a>
	<a href="#support" class="nav-tab"><?php esc_html_e( 'Support', 'framework' ); ?></a>
</h2>
