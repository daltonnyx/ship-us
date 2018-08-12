<?php

/**
 * Fired during plugin activation
 *
 * @link       https://github.com/daltonnyx/
 * @since      1.0.0
 *
 * @package    Ship_Us
 * @subpackage Ship_Us/includes
 */

/**
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @since      1.0.0
 * @package    Ship_Us
 * @subpackage Ship_Us/includes
 * @author     Dalton Nyx <quytruong851@gmail.com>
 */
class Ship_Us_Activator {

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */
	public static function activate() {
		global $wpdb;
		$charset = $wpdb->get_charset_collate();
		require_once( ABSPATH . 'wp-admin/includes/upgrade.php');
		$ship_orders = $wpdb->prefix . "ship_orders";
		$create_ship_orders = "CREATE TABLE $ship_orders(
			id bigint(20) UNSIGNED AUTO_INCREMENT,
			ma_order varchar(50) NOT NULL,
			full_name varchar(255) DEFAULT '' NULL,
			sdt varchar(12) NOT NULL,
			dia_chi varchar(150) DEFAULT '' NULL,
			phuong_xa varchar(100) NULL,
			quan_huyen varchar(100) NULL,
			tinh_thanh varchar(100) NULL,
			product_link varchar(255) NOT NULL,
			mo_ta text NULL, 
			quantity int(10) UNSIGNED DEFAULT 1 NOT NULL,
			price float(7,2) UNSIGNED DEFAULT 0 NOT NULL,
			actual_weight float(11,2) UNSIGNED DEFAULT 0 NOT NULL,
			total_value float(15,2) UNSIGNED DEFAULT 0 NOT NULL,
			ngay_order datetime DEFAULT '2018-01-01 00:00:00' NULL,
			dia_chi_nhan varchar(255) NOT NULL,
			order_number varchar(100) NULL,
			courier varchar(150) NULL,
			tracking_number varchar(100) NULL,
			delivery_us_date datetime NULL,
			delivery_vn_date datetime NULL,
			PRIMARY KEY  (id)
		) $charset;";	
		dbDelta($create_ship_orders);

		$ship_logs = $wpdb->prefix . "ship_logs";
		$create_ship_logs = "CREATE TABLE $ship_logs(
			id bigint(20) UNSIGNED AUTO_INCREMENT,
			order_id bigint(20) UNSIGNED NOT NULL,
			order_status tinyint DEFAULT 0 NOT NULL,
			date_changed datetime NOT NULL,
			note text NULL,
			PRIMARY KEY  (id)
		) $charset;";
		dbDelta($create_ship_logs);

	}

}
