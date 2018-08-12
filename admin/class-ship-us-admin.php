<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://github.com/daltonnyx/
 * @since      1.0.0
 *
 * @package    Ship_Us
 * @subpackage Ship_Us/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Ship_Us
 * @subpackage Ship_Us/admin
 * @author     Dalton Nyx <quytruong851@gmail.com>
 */
class Ship_Us_Admin {

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

	/**
	 * Register the stylesheets for the admin area.
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

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/ship-us-admin.css', array(), $this->version, 'all' );
		wp_enqueue_style( 'jquerydatatable',  plugin_dir_url( __FILE__ ) . 'css/jquery.dataTables.min.css' );
		wp_enqueue_style( 'jquerydatatable-select', 'https://cdn.datatables.net/select/1.2.7/css/select.dataTables.min.css' );
		wp_enqueue_style( 'jquery-modal', 'https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.css' );
		wp_enqueue_style( 'datepicker', plugin_dir_url( __FILE__ ) . 'css/datepicker.min.css');
	}

	/**
	 * Register the JavaScript for the admin area.
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

		
		wp_enqueue_script( 'jquerydatatable-js', plugin_dir_url(__FILE__) . 'js/jquery.dataTables.min.js', array('jquery'), '1.10.19', true );
		wp_enqueue_script( 'datetime-js',  plugin_dir_url(__FILE__) . 'js/datepicker.min.js', array('jquery'), '1.0', true );
		wp_enqueue_script('jquery-datatable-select', 'https://cdn.datatables.net/select/1.2.7/js/dataTables.select.min.js', array('jquery'), '1.2.7', true);
		wp_enqueue_script('jquery-simple-modal', 'https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.js', array('jquery'), '0.9.1', true);
		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/ship-us-admin.js', array( 'jquery' ), $this->version, true );
	}

	public function register_admin_menu() {
		add_menu_page( 'Manage Shipping Orders', 'Manage Orders', 'manage_options', 'shipus/manage-orders.php', array($this, 'render_admin_page'), 'dashicons-tickets', 9  );
	}

	public function render_admin_page() {
		include_once dirname(__FILE__)."/partials/ship-us-admin-display.php";
	}

	public function call_new_order() {
		$title = "Order mới";
		include_once dirname(__FILE__). "/partials/ship-us-edit-order-form.php";
		wp_die();
	}

	public function call_edit_order() {
		$order = json_decode(str_replace("\\", "", $_POST['order']));
		$title = 'Chỉnh sửa order ' . $order->ma_order;
		include_once dirname(__FILE__). "/partials/ship-us-edit-order-form.php";
		wp_die();
	}

	public function call_list_orders() {
		Ship_Order_Service::list();
	}

	public function call_save_order() {
		parse_str($_POST['data'],$data);
		Ship_Order_Service::create($data);
		if(!empty($data['_id'])) {

		}
		else {

		}
	}
	public function call_edit_order_log() {
		$title = 'Cập nhật trạng thái order';
		$order_id = $_POST['order_id'];
		include_once dirname(__FILE__) . "/partials/ship-us-order-log-form.php";
		wp_die();
	}

	public function call_edit_save_log() {
		parse_str($_POST['data'],$data);
		Ship_Logs_Service::create($data);
	}

	public function call_delete_order() {
		$order_id = $_POST['order_id'];
		Ship_Order_Service::delete($order_id);
	}
}
