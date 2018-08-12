<?php 


/**
* 
*/
class Ship_Logs_Service 
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

		wp_die();
	}

	public static function create($data) {
        $instance = new Ship_Logs_Model($data);
        $instance->date_changed = date('Y-m-d H:i:s');
        $instance->save();
        echo '{"status": "success", "message": "Created 1 Logs"}';
		wp_die();
	}

	public static function delete() {
		
		wp_die();
	}

	public static function update() {

	}

	public static function detail() {

	}
}