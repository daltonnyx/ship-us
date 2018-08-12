<?php 


/**
* 
*/
class Ship_Order_Service 
{
	public function __construct()
	{
       
	}

	public static function list() {
		$current_user = wp_get_current_user();
		header("Content-Type: application/json;");
		if($current_user->ID == 0) {
			echo '{"data": []}';
			wp_die();
		}

        global $wpdb;
		$order = $wpdb->prefix .  'ship_orders';
		$log = $wpdb->prefix . 'ship_logs';
        $sql = "SELECT a.*, MAX(b.order_status) as order_status FROM $order a
				LEFT JOIN $log b on a.id = b.order_id
				GROUP BY a.id 
		;";
        $result = $wpdb->get_results($sql);
        echo '{"data": ' . json_encode($result) . '}';
		wp_die();
	}

	public static function create($data) {
		$instance = new Ship_Order_Model($data);
		if(!isset($data['id'])) {
			$instance->ma_order = $instance->sdt .  mt_rand(100000,999999);
		}
		$instance->ngay_order = DateTime::createFromFormat('d-m-Y', $data['ngay_order'])->format('Y-m-d');
		$instance->delivery_us_date = DateTime::createFromFormat('d-m-Y', $data['delivery_us_date'])->format('Y-m-d');
		$instance->delivery_vn_date = DateTime::createFromFormat('d-m-Y', $data['delivery_vn_date'])->format('Y-m-d');
		$instance->save();
		global $wpdb;
		$order_new_id = $wpdb->insert_id;
		$log = new Ship_Logs_Model(array(
			'order_id' => $order_new_id,
			'order_status' => 0,
		));
		$log->save();
        echo '{"status": "success", "message": "Created 1 order"}';
		wp_die();
	}

	public static function delete($order_id) {
		global $wpdb;
		$ship_logs = $wpdb->prefix . 'ship_logs';
		$wpdb->delete( $ship_logs, array('order_id' => $order_id), array('%d'));
		$order = Ship_Order_Model::instance($order_id);
		$order->delete();
		wp_die();
	}

	public static function update() {

	}

	public static function detail() {

	}
}