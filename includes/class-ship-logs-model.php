<?php
/**
 * Manipulate data for working l og
 *
 * Query data for working log
 *
 * @package    Working_Log
 * @subpackage Working_Log/includes
 * @author     Dalton Nyx <quytruong851@gmail.com>
 */
class Ship_Logs_Model implements JsonSerializable {

	private $_properties;

	private $_table = 'ship_logs';

	public function __construct($properties) {
		$this->_properties = $properties;
	}

	public function save() {
		global $wpdb;
		$current_user = wp_get_current_user();
		if($current_user->ID == 0) {
			header('HTTP/1.1 403 Forbidden');
			die();
		}
		
		$result = $wpdb->replace($wpdb->prefix . $this->_table, $this->_properties);
		
		return $result;
	}

	public function delete() {
		global $wpdb;
		$current_user = wp_get_current_user();
		if($current_user->ID == 0) {
			header('HTTP/1.1 403 Forbidden');
			die();
		}
		if(empty($this->_properties['id'])) {
			echo var_dump($this->_properties);
			header('HTTP/1.1 404 Not Found');
			die();	
		}
		$result = $wpdb->delete($wpdb->prefix . $this->_table, array('id' => intval($this->_properties['id'])));
		return $result;
	}

	public function __set($property, $value){
      return $this->_properties[$property] = $value;
    }

    public function __get($property){
      return array_key_exists($property, $this->_properties)
        ? $this->_properties[$property]
        : null
      ;
    }

    public static function instance($id = null) {
		if($id == null) return null;
		global $wpdb;
		$table = $wpdb->prefix . 'ship_logs';
		$object = $wpdb->get_row("SELECT * FROM $table WHERE id = $id", ARRAY_A);
		return new Ship_Log_Model($object);

	}

	public static function get_logs_by($field, $value) {
		global $wpdb;
		$table = $wpdb->prefix . 'ship_logs';
		$objects = $wpdb->get_results("SELECT * FROM $table WHERE $field = $value");
		return $objects;
	}

	public function jsonSerialize() {
		$output = $this->_properties;
		return $output;
	}
}