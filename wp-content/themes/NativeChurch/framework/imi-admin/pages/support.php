<?php

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

?>

<div class="wrap about-wrap imi-admin-wrap">

	<?php imi_get_admin_tabs('support'); ?>

	<div id="imi-dashboard" class="wrap about-wrap">
		<div class="welcome-content imi-clearfix extra">
			<div class="imi-row">
				<div class="imi-col-sm-6">
					<div class="imi-box doc">
						<div class="imi-box-head">
							<?php esc_html_e('Online Documentation','framework'); ?>
						</div>
						<div class="imi-box-content">
							<p>
							<?php esc_html_e('Our online documentation covers every basic aspect of theme from installation to how to manage your website content. For more questions visit our forum or open a ticket.' , 'framework'); ?>
							</p>
							<div class="imi-button">
								<a href="https://support.imithemes.com/manual/native-church/" target="_blank"><?php esc_html_e('DOCUMENTATION','framework'); ?></a>
							</div>
						</div>
					</div>
				</div>
				<div class="imi-col-sm-6">
					<div class="imi-box support">
						<div class="imi-box-head">
							<?php esc_html_e('Help Center','framework'); ?>
						</div>
						<div class="imi-box-content">
							<p>
							<?php esc_html_e('If you have any questions that documentation doesn\'t cover or any issue please open a support ticket at the help center and we will reply as soon as possible.' , 'framework'); ?>
							</p>
							<div class="imi-button">
								<a href="https://support.imithemes.com/help/" target="_blank"><?php esc_html_e('OPEN A TICKET','framework'); ?></a>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="imi-row">
				<div class="imi-col-sm-6">
					<div class="imi-box support forum">
						<div class="imi-box-head">
							<?php esc_html_e('Community Forums','framework'); ?>
						</div>
						<div class="imi-box-content">
							<p>
							<?php esc_html_e('Our forums are the best place for user to user interactions. Ask another Adore Church user or share your experience with the community to help others.' , 'framework'); ?>
							</p>
							<div class="imi-button">
								<a href="https://support.imithemes.com/forums/forum/wordpress-themes/nativechurch-wp/" target="_blank"><?php esc_html_e('VISIT FORUM','framework'); ?></a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

</div> <!-- end wrap -->