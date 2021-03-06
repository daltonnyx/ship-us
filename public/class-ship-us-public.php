<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://github.com/daltonnyx/
 * @since      1.0.0
 *
 * @package    Ship_Us
 * @subpackage Ship_Us/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Ship_Us
 * @subpackage Ship_Us/public
 * @author     Dalton Nyx <quytruong851@gmail.com>
 */
class Ship_Us_Public {

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
		add_shortcode('order_search', array($this, 'render_search_box'));
		add_shortcode('order_check_price', array($this, 'render_order_check_price'));
	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Ship_Us_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Ship_Us_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/ship-us-public.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Ship_Us_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Ship_Us_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/ship-us-public.js', array( 'jquery' ), $this->version, false );

	}

	public function render_search_box() {
		ob_start();
		if(isset($_GET['order_no'])) {
			$order = Ship_Order_Model::get_order_by('ma_order', $_GET['order_no']);
			$logs = Ship_Logs_Model::get_logs_by('order_id', $order->id);
		}
		include_once dirname(__FILE__) . '/partials/ship-us-public-display.php';
		return ob_get_clean();
	}

	public function render_order_check_price() {
		ob_start();
		include_once dirname(__FILE__) . '/partials/ship-us-order-check.php';
		return ob_get_clean();
	}

}
