<?php
/**
 * System configuration for the s2Member plugin.
 *
 * **WARNING:** This is a system configuration file, please DO NOT EDIT this file directly.
 *   Instead, use the plugin options panel in WordPress to override these settings.
 *
 * Copyright: © 2009-2011
 * {@link http://www.websharks-inc.com/ WebSharks, Inc.}
 * (coded in the USA)
 *
 * Released under the terms of the GNU General Public License.
 * You should have received a copy of the GNU General Public License,
 * along with this software. In the main directory, see: /licensing/
 * If not, see: {@link http://www.gnu.org/licenses/}.
 *
 * @package s2Member
 * @since 3.0
 */
if(realpath(__FILE__) === realpath($_SERVER['SCRIPT_FILENAME']))
	exit('Do not access this file directly.');
/*
Determine the directory.
*/
$GLOBALS['WS_PLUGIN__']['s2member']['c']['dir'] = dirname(dirname(__FILE__));
/*
Determine the base directory name.
*/
$GLOBALS['WS_PLUGIN__']['s2member']['c']['dir_base'] = basename(dirname(dirname(__FILE__)));
/*
Determine the full URL to the directory this plugin resides in.
*/
$GLOBALS['WS_PLUGIN__']['s2member']['c']['dir_url'] = (stripos(__FILE__, WP_CONTENT_DIR) !== 0) ? // Have to assume plugins dir?
	plugins_url('/'.basename(dirname(dirname(__FILE__)))) : // Otherwise, this gives it a chance to live anywhere in the content dir.
	content_url(preg_replace('/^(.*?)\/'.preg_quote(basename(WP_CONTENT_DIR), '/').'/', '', str_replace(DIRECTORY_SEPARATOR, '/', dirname(dirname(__FILE__)))));
/*
Determine full URL to the s2Member-only file that loads WordPress with only s2Member active.
*/
$GLOBALS['WS_PLUGIN__']['s2member']['c']['s2o_url'] = $GLOBALS['WS_PLUGIN__']['s2member']['c']['dir_url'].'/'.preg_replace('/\.php$/', '-o.php', basename($GLOBALS['WS_PLUGIN__']['s2member']['l']));
/*
Determine correct ``plugin_basename()`` here. WordPress has a few issues with its ``plugin_basename()`` function across different platforms.
*/
$GLOBALS['WS_PLUGIN__']['s2member']['c']['plugin_basename'] = basename(dirname($GLOBALS['WS_PLUGIN__']['s2member']['l'])).'/'.basename($GLOBALS['WS_PLUGIN__']['s2member']['l']);
/*
Configure the number of Membership Levels being used with s2Member. This is now possible. All areas of s2Member are now capable of adapting to this.
*/
$GLOBALS['WS_PLUGIN__']['s2member']['c']['levels']     = 4; // Hard coded in at 4 Levels. This can only be extended when/if s2Member Pro is installed.
$GLOBALS['WS_PLUGIN__']['s2member']['c']['min_levels'] = 1; // A lower limit to protect the integrity of the s2Member software application.
$GLOBALS['WS_PLUGIN__']['s2member']['c']['max_levels'] = apply_filters('ws_plugin__s2member_max_levels', 100); // Filterable.
/*
Configure regular expression matches for Membership Access Item Numbers (including those with only Custom Capabilities).
*/
$GLOBALS['WS_PLUGIN__']['s2member']['c']['membership_item_number_w_level_regex']       = '/^([1-9][0-9]*)(?:(?:\:((?:-all\+|\+-all|-all|\+)?[a-z_0-9,\+]*)?)?(?:\:([0-9]+ [A-Z])?)?)?$/';
$GLOBALS['WS_PLUGIN__']['s2member']['c']['membership_item_number_wo_level_regex']      = '/^(\*)(?:(?:\:((?:-all\+|\+-all|-all|\+)?[a-z_0-9,\+]*)?)?(?:\:([0-9]+ [A-Z])?)?)?$/';
$GLOBALS['WS_PLUGIN__']['s2member']['c']['membership_item_number_w_or_wo_level_regex'] = '/^([1-9][0-9]*|\*)(?:(?:\:((?:-all\+|\+-all|-all|\+)?[a-z_0-9,\+]*)?)?(?:\:([0-9]+ [A-Z])?)?)?$/';
/*
Configure regular expression match for Specific Post/Page Access Item Numbers (all elements required here).
*/
$GLOBALS['WS_PLUGIN__']['s2member']['c']['sp_access_item_number_regex'] = '/^(sp)(?:(?:\:([1-9][0-9,]*))(?:\:([1-9][0-9]*)))$/';
/*
Configure multibyte detection order when charset is unknown ( used by calls to `mb_convert_encoding()` ).
*/
$GLOBALS['WS_PLUGIN__']['s2member']['c']['mb_detection_order'] = 'UTF-8, ISO-8859-1, WINDOWS-1252, ASCII, JIS, EUC-JP, SJIS';
/*
Configure an array of file extensions associated with streaming media file types. See: <http://www.spartanicus.utvinternet.ie/streaming.htm> Also see: <http://www.longtailvideo.com/support/jw-player/jw-player-for-flash-v5/12539/supported-video-and-audio-formats>
*/
$GLOBALS['WS_PLUGIN__']['s2member']['c']['streaming_file_extns'] = array_unique(array('avi', 'wav', 'mpa', 'mpeg', 'mpv', 'mps', 'm1v', 'm2v', 'mp4', 'mp3', 'm3u', 'mp4', 'flv', 'f4v', '3gp', '3g2', 'aac', 'm4a', 'webm', 'ogg', 'ogv', 'pls', 'm3u', 'ogm', 'm4u', 'mov', 'qtl', 'mp4', 'asf', 'wmv', 'wvx', 'wma', 'wax', 'ra', 'rm', 'ram'));
/*
Configure directory and .htaccess for files protected by s2Member.
*/
$GLOBALS['WS_PLUGIN__']['s2member']['c']['default_files_dir']      = dirname(dirname(__FILE__)).'-files'.((stripos(PHP_OS, 'win') === 0 && stripos($_SERVER['SERVER_SOFTWARE'], 'apache') === FALSE) ? '/app_data' : '');
$GLOBALS['WS_PLUGIN__']['s2member']['c']['files_dir']              = apply_filters('ws_plugin__s2member_files_dir', $GLOBALS['WS_PLUGIN__']['s2member']['c']['default_files_dir']);
$GLOBALS['WS_PLUGIN__']['s2member']['c']['files_no_gzip_htaccess'] = dirname(__FILE__).'/templates/cfg-files/s2member-files-no-gzip.php';
$GLOBALS['WS_PLUGIN__']['s2member']['c']['files_dir_htaccess']     = dirname(__FILE__).'/templates/cfg-files/s2member-files.php';
/*
Configure the directory for logs protected by s2Member.
*/
$GLOBALS['WS_PLUGIN__']['s2member']['c']['default_logs_dir']  = dirname(dirname(__FILE__)).'-logs'.((stripos(PHP_OS, 'win') === 0 && stripos($_SERVER['SERVER_SOFTWARE'], 'apache') === FALSE) ? '/app_data' : '');
$GLOBALS['WS_PLUGIN__']['s2member']['c']['logs_dir']          = apply_filters('ws_plugin__s2member_logs_dir', $GLOBALS['WS_PLUGIN__']['s2member']['c']['default_logs_dir']);
$GLOBALS['WS_PLUGIN__']['s2member']['c']['logs_dir_htaccess'] = dirname(__FILE__).'/templates/cfg-files/s2member-logs.php';
/*
Configure the global reCaptcha (www.websharks-inc.net / or any domain). These public/private keys work on any installation.
*/
$GLOBALS['WS_PLUGIN__']['s2member']['c']['recaptcha'] = array('public_key' => '6LeCANsSAAAAAIIrlB3FrXe42mr0OSSZpT0pkpFK', 'private_key' => '6LeCANsSAAAAAGBXMIKAirv6G4PmaGa-ORxdD-oZ', 'lang' => _x('en', 's2member-front recaptcha-lang-code', 's2member'));
/*
Configure the right menu options panel for s2Member.
*/
$GLOBALS['WS_PLUGIN__']['s2member']['c']['menu_pages'] = array('updates' => TRUE, 'upsell-pro' => TRUE, 'installation' => FALSE, 'tools' => FALSE, 'kb' => TRUE, 'videos' => TRUE, 'support' => TRUE, 'donations' => TRUE);
/*
Check if s2Member has been configured *should be set after the first config via options panel*.
*/
$GLOBALS['WS_PLUGIN__']['s2member']['c']['configured'] = get_option('ws_plugin__s2member_configured');
/*
This is a special option cache that holds some additional information autoloaded into WordPress.
*/
$GLOBALS['WS_PLUGIN__']['s2member']['c']['cache'] = get_option('ws_plugin__s2member_cache');
/*
Configure checksum time for the syscon.inc.php file.
*/
$GLOBALS['WS_PLUGIN__']['s2member']['c']['checksum'] = filemtime(__FILE__);
/*
Configure an array of pluggable functions handled by s2Member.
*/
$GLOBALS['WS_PLUGIN__']['s2member']['c']['pluggables'] = array();
/*
Configure & validate all of the s2Member options; and set their defaults.
*/
if(!function_exists('ws_plugin__s2member_configure_options_and_their_defaults'))
{
	/**
	 * Configures an options array for the s2Member plugin.
	 *
	 * **WARNING:** This is a system configuration function, please DO NOT EDIT this function directly.
	 *   Instead, use the plugin options panel in WordPress to override these settings.
	 *
	 * @package s2Member
	 * @since 3.0
	 *
	 * @param boolean|array $options Optional. An array of new options, to be merged with the defaults.
	 *
	 * @return array This merged array of options: ``$GLOBALS['WS_PLUGIN__']['s2member']['o']``
	 */
	function ws_plugin__s2member_configure_options_and_their_defaults($options = FALSE)
	{
		global $current_site, $current_blog;

		$default_options['options_checksum'] = '';
		$default_options['options_version']  = '1.0';

		$default_options['gateway_debug_logs']           = '0';
		$default_options['gateway_debug_logs_extensive'] = '0';

		$default_options['lazy_load_css_js']             = '0';
		$default_options['sc_conds_allow_arbitrary_php'] = '0';

		$default_options['sec_encryption_key']         = '';
		$default_options['sec_encryption_key_history'] = array();
		$default_options['s_badge_status_enabled']     = '0';

		$default_options['max_ip_restriction']              = '5';
		$default_options['max_ip_restriction_time']         = '3600';
		$default_options['max_failed_login_attempts']       = '5';
		$default_options['max_simultaneous_logins']         = '0';
		$default_options['max_simultaneous_logins_timeout'] = '30 minutes';

		$default_options['run_uninstall_routines'] = '0';

		$default_options['custom_reg_fields']       = '';
		$default_options['custom_reg_names']        = '1';
		$default_options['custom_reg_display_name'] = 'full';
		$default_options['custom_reg_password']     = '0';

		$default_options['custom_reg_opt_in']       = '1';
		$default_options['custom_reg_opt_in_label'] = _x('Yes, I want to receive updates via email.', 's2member-front', 's2member');

		$default_options['custom_reg_auto_opt_outs']            = array();
		$default_options['custom_reg_auto_opt_out_transitions'] = '0';

		$default_options['custom_reg_fields_4bp']            = array();
		$default_options['custom_reg_force_personal_emails'] = '';

		$default_options['allow_subscribers_in'] = '0';
		$default_options['force_admin_lockouts'] = '0';
		$default_options['filter_wp_query']      = array('all');

		$default_options['default_url_shortener']            = 'tiny_url';
		$default_options['default_custom_str_url_shortener'] = '';

		$default_options['mms_auto_patch']          = '1';
		$default_options['mms_registration_file']   = 'wp-login';
		$default_options['mms_registration_grants'] = 'none';
		for($n = 0, $v = 0; $n <= $GLOBALS['WS_PLUGIN__']['s2member']['c']['levels']; $n++, $v = $v + 5)
			$default_options['mms_registration_blogs_level'.$n] = (string)$v;

		$default_options['login_welcome_page']                  = '';
		$default_options['login_redirection_override']          = '';
		$default_options['login_redirection_always_http']       = '1';
		$default_options['membership_options_page']             = '';
		$default_options['membership_options_page_vars_enable'] = '1';

		$default_options['login_reg_design_enabled'] = '1';

		$default_options['login_reg_background_color']        = 'FFFFFF';
		$default_options['login_reg_background_image']        = $GLOBALS['WS_PLUGIN__']['s2member']['c']['dir_url'].'/images/bg.png';
		$default_options['login_reg_background_image_repeat'] = 'repeat';

		$default_options['login_reg_background_text_color']        = '000000';
		$default_options['login_reg_background_text_shadow_color'] = 'EEEEEE';
		$default_options['login_reg_background_box_shadow_color']  = 'EEEEEE';

		$default_options['login_reg_logo_src']        = $GLOBALS['WS_PLUGIN__']['s2member']['c']['dir_url'].'/images/logo.png';
		$default_options['login_reg_logo_src_width']  = '550';
		$default_options['login_reg_logo_src_height'] = '100';
		$default_options['login_reg_logo_url']        = home_url('/');
		$default_options['login_reg_logo_title']      = get_bloginfo('name');

		$default_options['login_reg_font_size']       = '12px';
		$default_options['login_reg_font_family']     = "'Verdana', 'Arial', sans-serif";
		$default_options['login_reg_font_field_size'] = '18px';

		$default_options['login_reg_footer_backtoblog'] = '0';
		$default_options['login_reg_footer_design']     = '';

		$default_options['reg_email_from_name']    = get_bloginfo('name');
		$default_options['reg_email_from_email']   = get_bloginfo('admin_email');
		$default_options['reg_email_support_link'] = 'mailto:'.get_bloginfo('admin_email');

		$default_options['new_user_emails_enabled'] = '0';

		$default_options['new_user_email_subject'] = sprintf(_x('[%s] Username/Password', 's2member-front', 's2member'), get_bloginfo('name'));
		$default_options['new_user_email_message'] = sprintf(_x("Your Username/Password for:\n%s\n\nUsername: %%%%user_login%%%%\nPassword: %%%%user_pass%%%%\n%%%%wp_login_url%%%%", 's2member-front', 's2member'), get_bloginfo('name'));

		$default_options['new_user_admin_email_recipients'] = get_bloginfo('admin_email');
		$default_options['new_user_admin_email_subject']    = sprintf(_x('[%s] New User Registration', 's2member-front', 's2member'), get_bloginfo('name'));
		$default_options['new_user_admin_email_message']    = sprintf(_x("New User Registration on your site:\n%s\n\nUser ID: %%%%user_id%%%%\nUsername: %%%%user_login%%%%\nEmail: %%%%user_email%%%%\nIP Address: %%%%user_ip%%%%", 's2member-front', 's2member'), get_bloginfo('name'));

		$default_options['paypal_sandbox']        = '0';
		$default_options['paypal_business']       = '';
		$default_options['paypal_merchant_id']    = '';
		$default_options['paypal_api_username']   = '';
		$default_options['paypal_api_password']   = '';
		$default_options['paypal_api_signature']  = '';
		$default_options['paypal_identity_token'] = '';
		$default_options['paypal_btn_encryption'] = '0';

		$default_options['paypal_payflow_api_username'] = '';
		$default_options['paypal_payflow_api_partner']  = 'PayPal';
		$default_options['paypal_payflow_api_vendor']   = '';
		$default_options['paypal_payflow_api_password'] = '';

		$default_options['signup_tracking_codes']       = '';
		$default_options['modification_tracking_codes'] = '';
		$default_options['ccap_tracking_codes']         = '';
		$default_options['sp_tracking_codes']           = '';

		$default_options['signup_email_recipients'] = '"%%full_name%%" <%%payer_email%%>';
		$default_options['signup_email_subject']    = _x('Congratulations! (your membership has been approved)', 's2member-front', 's2member');
		$default_options['signup_email_message']    = sprintf(_x("Thanks %%%%first_name%%%%! Your membership has been approved.\n\nIf you haven't already done so, the next step is to Register a Username.\n\nComplete your registration here:\n%%%%registration_url%%%%\n\nIf you have any trouble, please feel free to contact us.\n\nBest Regards,\n%s", 's2member-front', 's2member'), get_bloginfo('name'));

		$default_options['modification_email_recipients'] = '"%%full_name%%" <%%payer_email%%>';
		$default_options['modification_email_subject']    = _x('Thank you! Your account has been updated.', 's2member-front', 's2member');
		$default_options['modification_email_message']    = sprintf(_x("Thanks %%%%first_name%%%%! Your account now has access to: %%%%item_name%%%%.\n\nIf you have any trouble, please feel free to contact us.\n\nBest Regards,\n%s", 's2member-front', 's2member'), get_bloginfo('name'));

		$default_options['ccap_email_recipients'] = '"%%full_name%%" <%%payer_email%%>';
		$default_options['ccap_email_subject']    = _x('Thank you! Your account has been updated.', 's2member-front', 's2member');
		$default_options['ccap_email_message']    = sprintf(_x("Thanks %%%%first_name%%%%! Your account now has access to: %%%%item_name%%%%.\n\nIf you have any trouble, please feel free to contact us.\n\nBest Regards,\n%s", 's2member-front', 's2member'), get_bloginfo('name'));

		$default_options['sp_email_recipients'] = '"%%full_name%%" <%%payer_email%%>';
		$default_options['sp_email_subject']    = _x('Thank You! (instructions for access)', 's2member-front', 's2member');
		$default_options['sp_email_message']    = sprintf(_x("Thanks %%%%first_name%%%%!\n\n%%%%item_name%%%%\n\nYour order can be retrieved here:\n%%%%sp_access_url%%%%\n(link expires in %%%%sp_access_exp%%%%)\n\nIf you have any trouble, please feel free to contact us.\n\nBest Regards,\n%s", 's2member-front', 's2member'), get_bloginfo('name'));

		$default_options['mailchimp_api_key']       = '';
		$default_options['getresponse_api_key']     = '';
		$default_options['aweber_api_key']          = '';
		$default_options['aweber_internal_api_key'] = '';
		$default_options['aweber_api_type']         = 'api';
		if($GLOBALS['WS_PLUGIN__']['s2member']['c']['configured'])
			$default_options['aweber_api_type'] = 'email';

		for($n = 0; $n <= $GLOBALS['WS_PLUGIN__']['s2member']['c']['levels']; $n++)
			$default_options['level'.$n.'_mailchimp_list_ids'] = '';

		for($n = 0; $n <= $GLOBALS['WS_PLUGIN__']['s2member']['c']['levels']; $n++)
			$default_options['level'.$n.'_getresponse_list_ids'] = '';

		for($n = 0; $n <= $GLOBALS['WS_PLUGIN__']['s2member']['c']['levels']; $n++)
			$default_options['level'.$n.'_aweber_list_ids'] = '';

		$default_options['signup_notification_urls']       = '';
		$default_options['registration_notification_urls'] = '';
		$default_options['payment_notification_urls']      = '';
		$default_options['modification_notification_urls'] = '';
		$default_options['cancellation_notification_urls'] = '';
		$default_options['eot_del_notification_urls']      = '';
		$default_options['ref_rev_notification_urls']      = '';
		$default_options['sp_sale_notification_urls']      = '';
		$default_options['sp_ref_rev_notification_urls']   = '';

		$default_options['signup_notification_recipients']       = '';
		$default_options['registration_notification_recipients'] = '';
		$default_options['payment_notification_recipients']      = '';
		$default_options['modification_notification_recipients'] = '';
		$default_options['cancellation_notification_recipients'] = '';
		$default_options['eot_del_notification_recipients']      = '';
		$default_options['ref_rev_notification_recipients']      = '';
		$default_options['sp_sale_notification_recipients']      = '';
		$default_options['sp_ref_rev_notification_recipients']   = '';

		for($n = 0, $l = array(_x('Free Subscriber', 's2member-front', 's2member'), _x('Bronze Member', 's2member-front', 's2member'), _x('Silver Member', 's2member-front', 's2member'), _x('Gold Member', 's2member-front', 's2member'), _x('Platinum Member', 's2member-front', 's2member')); $n <= $GLOBALS['WS_PLUGIN__']['s2member']['c']['levels']; $n++) $default_options['level'.$n.'_label'] = (!empty($l[$n])) ? $l[$n] : sprintf(_x('Level %s Member', 's2member-front', 's2member'), $n);

		$default_options['apply_label_translations'] = '0';

		for($n = 0; $n <= $GLOBALS['WS_PLUGIN__']['s2member']['c']['levels']; $n++) $default_options['level'.$n.'_file_downloads_allowed'] = '';

		for($n = 0; $n <= $GLOBALS['WS_PLUGIN__']['s2member']['c']['levels']; $n++) $default_options['level'.$n.'_file_downloads_allowed_days'] = '';

		$default_options['file_download_limit_exceeded_page']   = '';
		$default_options['file_download_inline_extensions']     = '';
		$default_options['file_download_stream_extensions']     = '';
		$default_options['file_download_content_encodong_none'] = '0';

		$default_options['amazon_s3_files_bucket']     = '';
		$default_options['amazon_s3_files_access_key'] = '';
		$default_options['amazon_s3_files_secret_key'] = '';

		$default_options['amazon_cf_files_private_key']                = '';
		$default_options['amazon_cf_files_private_key_id']             = '';
		$default_options['amazon_cf_files_distros_access_id']          = '';
		$default_options['amazon_cf_files_distros_s3_access_id']       = '';
		$default_options['amazon_cf_files_distro_downloads_id']        = '';
		$default_options['amazon_cf_files_distro_downloads_cname']     = '';
		$default_options['amazon_cf_files_distro_downloads_dname']     = '';
		$default_options['amazon_cf_files_distro_streaming_id']        = '';
		$default_options['amazon_cf_files_distro_streaming_cname']     = '';
		$default_options['amazon_cf_files_distro_streaming_dname']     = '';
		$default_options['amazon_cf_files_distros_auto_config_status'] = '';

		for($n = 0; $n <= $GLOBALS['WS_PLUGIN__']['s2member']['c']['levels']; $n++)
			$default_options['level'.$n.'_ruris'] = '';
		for($n = 0; $n <= $GLOBALS['WS_PLUGIN__']['s2member']['c']['levels']; $n++)
			$default_options['level'.$n.'_catgs'] = '';
		for($n = 0; $n <= $GLOBALS['WS_PLUGIN__']['s2member']['c']['levels']; $n++)
			$default_options['level'.$n.'_ptags'] = '';
		for($n = 0; $n <= $GLOBALS['WS_PLUGIN__']['s2member']['c']['levels']; $n++)
			$default_options['level'.$n.'_posts'] = '';
		for($n = 0; $n <= $GLOBALS['WS_PLUGIN__']['s2member']['c']['levels']; $n++)
			$default_options['level'.$n.'_pages'] = '';

		$default_options['specific_ids'] = '';

		$default_options['triggers_immediate_eot']  = 'reversals';
		$default_options['membership_eot_behavior'] = 'demote';
		$default_options['eot_time_ext_behavior']   = 'extend';
		$default_options['auto_eot_system_enabled'] = '1';
		$default_options['eots_remove_ccaps']       = '1';
		$default_options['eot_grace_time']          = '86400';

		$default_options['wp_footer_code'] = '';

		$default_options = apply_filters('ws_plugin__s2member_default_options', $default_options);

		unset($n, $v, $l); // Unset/cleanup these working variables from the routines above.
		/*
		Here they are merged. User options will overwrite some or all default values.
		*/
		$GLOBALS['WS_PLUGIN__']['s2member']['o'] = array_merge($default_options, (($options !== FALSE) ? (array)$options : (array)get_option('ws_plugin__s2member_options')));
		/*
		 * Ditch this old option key; no longer in use.
		 */
		if(isset($GLOBALS['WS_PLUGIN__']['s2member']['o']['run_deactivation_routines'])) unset($GLOBALS['WS_PLUGIN__']['s2member']['o']['run_deactivation_routines']);
		/*
		This builds an MD5 checksum for the full array of options. This also includes the config checksum and the current set of default options.
		*/
		$checksum = md5(($checksum_prefix = $GLOBALS['WS_PLUGIN__']['s2member']['c']['checksum'].serialize($default_options)).serialize(array_merge($GLOBALS['WS_PLUGIN__']['s2member']['o'], array('options_checksum' => 0))));
		/*
		Validate each option, possibly reverting back to the default value in some cases. This is only processed when/if the checksum is not up-to-date.
		*/
		if($options !== FALSE || ($GLOBALS['WS_PLUGIN__']['s2member']['o']['options_checksum'] !== $checksum && $GLOBALS['WS_PLUGIN__']['s2member']['o'] !== $default_options))
		{
			foreach($GLOBALS['WS_PLUGIN__']['s2member']['o'] as $key => &$value)
			{
				if(!isset($default_options[$key]) && !preg_match('/^pro_/', $key))
					unset($GLOBALS['WS_PLUGIN__']['s2member']['o'][$key]);

				else if($key === 'options_checksum' && (!is_string($value) || !strlen($value)))
					$value = $default_options[$key];

				else if($key === 'options_version' && (!is_string($value) || !is_numeric($value)))
					$value = $default_options[$key];

				else if(preg_match('/^gateway_debug_logs|gateway_debug_logs_extensive/', $key) && (!is_string($value) || !is_numeric($value)))
					$value = $default_options[$key];

				else if($key === 'lazy_load_css_js' && (!is_string($value) || !is_numeric($value)))
					$value = $default_options[$key];

				else if($key === 'sc_conds_allow_arbitrary_php' && (!is_string($value) || !is_numeric($value)))
					$value = $default_options[$key];

				else if($key === 'sec_encryption_key' && (!is_string($value) || !strlen($value)))
					$value = $default_options[$key];

				else if($key === 'sec_encryption_key_history' && (!is_array($value) || empty($value)))
					$value = $default_options[$key];

				else if($key === 's_badge_status_enabled' && (!is_string($value) || !is_numeric($value)))
					$value = $default_options[$key];

				else if($key === 'max_ip_restriction' && (!is_string($value) || !is_numeric($value) || $value < 0 || $value > 100))
					$value = $default_options[$key];

				else if($key === 'max_ip_restriction_time' && (!is_string($value) || !is_numeric($value) || $value < 300 || $value > 31556926))
					$value = $default_options[$key];

				else if($key === 'max_failed_login_attempts' && (!is_string($value) || !is_numeric($value) || $value < 0 || $value > 100))
					$value = $default_options[$key];

				else if($key === 'max_simultaneous_logins' && (!is_string($value) || !is_numeric($value) || $value < 0))
					$value = $default_options[$key];

				else if($key === 'max_simultaneous_logins_timeout' && (!is_string($value) || !strlen($value)))
					$value = $default_options[$key];

				else if($key === 'run_uninstall_routines' && (!is_string($value) || !is_numeric($value)))
					$value = $default_options[$key];

				else if($key === 'custom_reg_fields' && (!is_string($value) || !strlen($value)))
					$value = $default_options[$key];

				else if(preg_match('/^custom_reg_(?:names|password|opt_in|auto_opt_out_transitions)$/', $key) && (!is_string($value) || !is_numeric($value)))
					$value = $default_options[$key];

				else if($key === 'custom_reg_display_name' && (!is_string($value) || !preg_match('/^(?:full|first|last|login|0)$/', $value)))
					$value = $default_options[$key];

				else if($key === 'custom_reg_opt_in_label' && (!is_string($value) || !strlen($value)))
					$value = $default_options[$key];

				else if($key === 'custom_reg_auto_opt_outs' && (!is_array($value) || empty($value)))
					$value = $default_options[$key];

				else if($key === 'custom_reg_fields_4bp' && (!is_array($value) || empty($value)))
					$value = $default_options[$key];

				else if($key === 'custom_reg_force_personal_emails' && (!is_string($value) || !strlen($value = preg_replace('/\s+/', '', $value))))
					$value = $default_options[$key];

				else if($key === 'allow_subscribers_in' && (!is_string($value) || !is_numeric($value)))
					$value = $default_options[$key];

				else if($key === 'mms_auto_patch' && (!is_string($value) || !is_numeric($value)))
					$value = $default_options[$key];

				else if($key === 'mms_registration_file' && (!is_string($value) || !preg_match('/^(?:wp-login|wp-signup)$/', $value)))
					$value = $default_options[$key];

				else if($key === 'mms_registration_grants' && (!is_string($value) || !preg_match('/^(?:none|user|all)$/', $value)))
					$value = $default_options[$key];

				else if(preg_match('/^mms_registration_blogs_level[0-9]+$/', $key) && (!is_string($value) || !is_numeric($value) || $value < 0))
					$value = $default_options[$key];

				else if($key === 'force_admin_lockouts' && (!is_string($value) || !is_numeric($value)))
					$value = $default_options[$key];

				else if($key === 'filter_wp_query' && !is_array($value) /* This array CAN be empty. */)
					$value = $default_options[$key];

				else if(preg_match('/^default_(?:custom_str_)?url_shortener$/', $key) && (!is_string($value) || !strlen($value)))
					$value = $default_options[$key];

				else if($key === 'login_welcome_page' && (!is_string($value) || !is_numeric($value)))
					$value = $default_options[$key];

				else if($key === 'login_redirection_override' && (!is_string($value) || !strlen($value)))
					$value = $default_options[$key];

				else if($key === 'login_redirection_always_http' && (!is_string($value) || !is_numeric($value)))
					$value = $default_options[$key];

				else if($key === 'membership_options_page' && (!is_string($value) || !is_numeric($value)))
					$value = $default_options[$key];

				else if($key === 'membership_options_page_vars_enable' && (!is_string($value) || !is_numeric($value)))
					$value = $default_options[$key];

				else if($key === 'login_reg_design_enabled' && (!is_string($value) || !is_numeric($value)))
					$value = $default_options[$key];

				else if($key === 'login_reg_background_image' && !is_string($value) /* This is optional. */)
					$value = $default_options[$key];

				else if($key === 'login_reg_background_image_repeat' && (!is_string($value) || !preg_match('/^(?:repeat|repeat-x|repeat-y|no-repeat)$/', $value)))
					$value = $default_options[$key];

				else if(preg_match('/^login_reg_(?:background|logo|font|footer)_/', $key) && !preg_match('/background_image/', $key) && (!is_string($value) || !strlen($value)))
					$value = $default_options[$key];

				else if($key === 'login_reg_footer_backtoblog' && (!is_string($value) || !is_numeric($value)))
					$value = $default_options[$key];

				else if(preg_match('/^reg_email_(?:from_name|from_email|support_link)$/', $key) && (!is_string($value) || !strlen($value)))
					$value = $default_options[$key];

				else if($key === 'new_user_emails_enabled' && (!is_string($value) || !is_numeric($value)))
					$value = $default_options[$key];

				else if(preg_match('/^new_user_email_(?:subject|message)$/', $key) && (!is_string($value) || !strlen($value)))
					$value = $default_options[$key];

				else if(preg_match('/^new_user_admin_email_(?:recipients|subject|message)$/', $key) && (!is_string($value) || !strlen($value)))
					$value = $default_options[$key];

				else if($key === 'paypal_sandbox' && (!is_string($value) || !is_numeric($value)))
					$value = $default_options[$key];

				else if(preg_match('/^paypal_(?:business|merchant_id|api_username|api_password|api_signature|identity_token)$/', $key) && (!is_string($value) || !strlen($value)))
					$value = $default_options[$key];

				else if(preg_match('/^paypal_payflow(?:api_username|api_partner|api_vendor|api_password)$/', $key) && (!is_string($value) || !strlen($value)))
					$value = $default_options[$key];

				else if($key === 'paypal_btn_encryption' && (!is_string($value) || !is_numeric($value)))
					$value = $default_options[$key];

				else if(preg_match('/^(?:signup|modification|ccap|sp)_tracking_codes$/', $key) && (!is_string($value) || !strlen($value)))
					$value = $default_options[$key];

				else if(preg_match('/^(?:signup|modification|ccap|sp)_email_recipients$/', $key) && !is_string($value) /* Can be empty. */)
					$value = $default_options[$key];

				else if(preg_match('/^(?:signup|modification|ccap|sp)_email_(?:subject|message)$/', $key) && (!is_string($value) || !strlen($value)))
					$value = $default_options[$key];

				else if($key === 'aweber_api_type' && (!is_string($value) || !preg_match('/^(?:api|email)$/', $value)))
					$value = $default_options[$key];

				else if(preg_match('/^(?:mailchimp|getresponse|aweber)(?:_internal)?_api_key$/', $key) && (!is_string($value) || !strlen($value)))
					$value = $default_options[$key];

				else if(preg_match('/^level[0-9]+_mailchimp_list_ids$/', $key) && (!is_string($value) || !strlen($value = preg_replace('/['."\r\n\t".']+/', '', $value))))
					$value = $default_options[$key];

				else if(preg_match('/^level[0-9]+_getresponse_list_ids$/', $key) && (!is_string($value) || !strlen($value = preg_replace('/\s+/', '', $value))))
					$value = $default_options[$key];

				else if(preg_match('/^level[0-9]+_aweber_list_ids$/', $key) && (!is_string($value) || !strlen($value = preg_replace('/\s+/', '', $value))))
					$value = $default_options[$key];

				else if(preg_match('/^(?:signup|registration|payment|modification|cancellation|eot_del|ref_rev|sp_sale|sp_ref_rev)_notification_urls$/', $key) && (!is_string($value) || !strlen($value)))
					$value = $default_options[$key];

				else if(preg_match('/^(?:signup|registration|payment|modification|cancellation|eot_del|ref_rev|sp_sale|sp_ref_rev)_notification_recipients$/', $key) && (!is_string($value) || !strlen($value)))
					$value = $default_options[$key];

				else if(preg_match('/^level[0-9]+_label$/', $key) && (!is_string($value) || !strlen($value)))
					$value = $default_options[$key];

				else if($key === 'apply_label_translations' && (!is_string($value) || !is_numeric($value)))
					$value = $default_options[$key];

				else if(preg_match('/^level[0-9]+_file_downloads_allowed$/', $key) && (!is_string($value) || !is_numeric($value) || $value < 0))
					$value = $default_options[$key];

				else if(preg_match('/^level[0-9]+_file_downloads_allowed_days$/', $key) && (!is_string($value) || !is_numeric($value) || $value < 0))
					$value = $default_options[$key];

				else if($key === 'file_download_limit_exceeded_page' && (!is_string($value) || !is_numeric($value)))
					$value = $default_options[$key];

				else if(preg_match('/^file_download_(?:inline|stream)_extensions$/', $key) && (!is_string($value) || !($value = strtolower(preg_replace('/\s+/', '', $value)))))
					$value = $default_options[$key];

				else if(preg_match('/^amazon_(?:s3|cf)_files_/', $key) && (!is_string($value) || !strlen($value)))
					$value = $default_options[$key];

				else if(preg_match('/^level[0-9]+_ruris$/', $key) && (!is_string($value) || !strlen($value)))
					$value = $default_options[$key];

				else if(preg_match('/^level[0-9]+_catgs$/', $key) && (!is_string($value) || !($value = ((strcasecmp($value, 'all') === 0) ? strtolower($value) : trim(preg_replace('/[^0-9,]/', '', $value), ',')))))
					$value = $default_options[$key];

				else if(preg_match('/^level[0-9]+_ptags$/', $key) && (!is_string($value) || !($value = ((strcasecmp($value, 'all') === 0) ? strtolower($value) : trim(preg_replace('/ +/', ' ', trim(preg_replace('/ *, */', ',', $value))), ',')))))
					$value = $default_options[$key];

				else if(preg_match('/^level[0-9]+_posts$/', $key) && (!is_string($value) || !($value = trim( /* Supports `all` or `1,2,3,all-[type]s`. */
							preg_replace('/[^a-z0-9_\-,]/', '', strtolower($value)), ',')))
				) $value = $default_options[$key];

				else if(preg_match('/^level[0-9]+_pages$/', $key) && (!is_string($value) || !($value = ((strcasecmp($value, 'all') === 0) ? strtolower($value) : trim(preg_replace('/[^0-9,]/', '', $value), ',')))))
					$value = $default_options[$key];

				else if($key === 'specific_ids' && (!is_string($value) || !($value = trim(preg_replace('/[^0-9,]/', '', $value), ','))))
					$value = $default_options[$key];

				else if($key === 'triggers_immediate_eot' && (!is_string($value) || !preg_match('/^(?:none|refunds|reversals|refunds,reversals|refunds,partial_refunds,reversals)$/', $value)))
					$value = $default_options[$key];

				else if($key === 'membership_eot_behavior' && (!is_string($value) || !preg_match('/^(?:demote|delete)$/', $value)))
					$value = $default_options[$key];

				else if($key === 'eot_time_ext_behavior' && (!is_string($value) || !preg_match('/^(?:extend|reset)$/', $value)))
					$value = $default_options[$key];

				else if(preg_match('/^(?:auto_eot_system_enabled|eot_grace_time|eots_remove_ccaps)$/', $key) && (!is_string($value) || !is_numeric($value)))
					$value = $default_options[$key];

				else if($key === 'wp_footer_code' && (!is_string($value) || !strlen($value)))
					$value = $default_options[$key];
			}
			if($options !== FALSE && is_string($options['sec_encryption_key']) && strlen($options['sec_encryption_key']) && !in_array($options['sec_encryption_key'], $GLOBALS['WS_PLUGIN__']['s2member']['o']['sec_encryption_key_history']))
			{
				array_unshift($GLOBALS['WS_PLUGIN__']['s2member']['o']['sec_encryption_key_history'], $options['sec_encryption_key']);
				$GLOBALS['WS_PLUGIN__']['s2member']['o']['sec_encryption_key_history'] = array_slice($GLOBALS['WS_PLUGIN__']['s2member']['o']['sec_encryption_key_history'], 0, 10);
			}
			$GLOBALS['WS_PLUGIN__']['s2member']['o'] = apply_filters_ref_array('ws_plugin__s2member_options_before_checksum', array(&$GLOBALS['WS_PLUGIN__']['s2member']['o']));

			$GLOBALS['WS_PLUGIN__']['s2member']['o']['options_checksum'] = md5($checksum_prefix.serialize(array_merge($GLOBALS['WS_PLUGIN__']['s2member']['o'], array('options_checksum' => 0))));
		}
		$GLOBALS['WS_PLUGIN__']['s2member']['o']['custom_reg_opt_in_label'] = _x($GLOBALS['WS_PLUGIN__']['s2member']['o']['custom_reg_opt_in_label'], 's2member-front', 's2member');

		return apply_filters_ref_array('ws_plugin__s2member_options', array(&$GLOBALS['WS_PLUGIN__']['s2member']['o']));
	}
}