<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://jorcus.com/
 * @since      1.0.0
 *
 * @package    LAZYLOAD_ga4
 * @subpackage LAZYLOAD_ga4/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    LAZYLOAD_ga4
 * @subpackage LAZYLOAD_ga4/admin
 * @author     Jorcus <support@jorcus.com>
 */
class LAZYLOAD_ga4_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}
}

function lazyload_ga4_add_settings_page() {
    add_options_page('Lazy Load GA4', 'Lazy Load GA4', 'manage_options', 'lazyload-ga4-plugin', 'lazyload_ga4_plugin_settings_page');
}
add_action('admin_menu', 'lazyload_ga4_add_settings_page');


// Register WP_OPTIONS
function register_lazyload_ga4_settings() { 
    register_setting('lazyload_ga4_options', 'ga4_id');
}
add_action('admin_init', 'register_lazyload_ga4_settings');


function lazyload_ga4_plugin_settings_page() {
?>
    <h1>Lazy Load GA4 by <a target="_blank" title="Jorcus - Best Place for remote workers and digital nomads" href="https://jorcus.com/">Jorcus</a></h1>
	<h2>Welcome to Lazy Load GA4 Plugin Settings Page</h2>
	<p>Before you can start using our plugin to place Google Analytics 4 script, we need to take a few more steps.</p>
	<h2>Instructions</h2>
	<ol>
        <li>If you don't already have an Google Analytics 4 account, create an account <a target="_blank" title="Google Analytics 4" href="https://analytics.google.com/analytics/web/">here</a>.</li>
        <li>Once you logged into your account & created your GA4. Click on "Admin" -> "Data Streams" -> "Your GA4 (Web)" ->  "MEASUREMENT ID".</li>
        <li>Copy the "MEASUREMENT ID" from the URL, copy and paste into the input box below.</li>
    </ol>

    <form action="options.php" method="post">
			<?php
				settings_fields('lazyload_ga4_options');
				do_settings_sections('lazyload_ga4_options');
			?>
		<table class="form-table">
			<tr valign="top">
			<th scope="row">Google Analytics 4 MEASUREMENT ID:</th>
			<td><input type="text" name="ga4_id" placeholder="YOUR GA4 MEASUREMENT ID" value="<?php echo esc_attr( get_option('ga4_id') ); ?>" /></td>
			</tr>
		</table>
		<span>Note: Leave it blank to disable Google Analytics 4.</span>
		<?php submit_button(); ?>
    </form>

	<h3>Love the Plugin?</h3>
	<ol>
		<li>Leave a <a href="https://wordpress.org/support/plugin/lazy-load-ga4/reviews/#new-post"><b>5 STARS - ⭐⭐⭐⭐⭐ Review</b></a> to us!
        <li>You can always <a href="https://jorcus.com/product/buy-me-a-coffee/">buy me a coffee!</a></li>
		<li>Thanks for your support, please consider hiring us to maintain your WP site through our <a href="https://jorcus.com/product/wp-care-plans/">WP Care Plans</a>.</li>
		<li>Hope you enjoyed the plugin!</li>
    </ol>
    <?php
}	
?>