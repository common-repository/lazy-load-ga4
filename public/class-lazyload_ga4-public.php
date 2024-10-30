<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://jorcus.com/
 * @since      1.0.0
 *
 * @package    LAZYLOAD_ga4
 * @subpackage LAZYLOAD_ga4/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    LAZYLOAD_ga4
 * @subpackage LAZYLOAD_ga4/public
 * @author     Jorcus <support@jorcus.com>
 */
class LAZYLOAD_ga4_Public {

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
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {
		$this->plugin_name = $plugin_name;
		$this->version = $version;
	}


	/**
	 * Register the JavaScript for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {
		if (get_option('ga4_id')){
			add_action('wp_footer', 'ga4_script'); 
		}
		
		function ga4_script() { 
			?>
			<script type="text/javascript">
				!function(){let e=0;function t(){var e,t,n,o,a;e=window,t=document,a="script",e[n="ga4"]=e[n]||function(){(e[n].q=e[n].q||[]).push(arguments)},(o=t.createElement(a)).async=1,o.src="https://www.googletagmanager.com/gtag/js?id=<?php echo esc_attr( get_option('ga4_id') ); ?>",(a=t.getElementsByTagName(a)[0]).parentNode.insertBefore(o,a)}document.addEventListener("mousemove",function(){1==++e&&t()}),window.onscroll=function(){1==++e&&t()},setTimeout(function(){0==e&&t()},5e3)}();
			</script>

			<script>
				window.dataLayer = window.dataLayer || [];
				function gtag(){dataLayer.push(arguments);}
				gtag('js', new Date());

				gtag('config', '<?php echo esc_attr( get_option('ga4_id') ); ?>');
			</script>
			<?php
			;
		}
	}

}