<?php

/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       https://github.com/daltonnyx/
 * @since      1.0.0
 *
 * @package    Ship_Us
 * @subpackage Ship_Us/admin/partials
 */
?>

<!-- This file should primarily consist of HTML with a little bit of PHP. -->
<div class="wrap">
    <header class="page-header">
        <h2>Quản lý Order</h2>
    </header>
    <div class="container">
        <div class="toolbox">
            <ul>
                <li class="link-item"><a href="#" id="add-order" class="button button-primary">Thêm mới</a></li>
                <li class="link-item"><a href="#" id="update-status" class="button">Cập nhật trạng thái</a></li>
                <li class="link-item"><a href="#" id="edit-order" class="button">Sửa</a></li>
                <li class="link-item"><a href="#" id="remove-order" class="button">Xóa</a></li>
            </ul>
        </div>
        <div class="list-orders">
            <table id="orders-table" class="display">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Mã Order</th>
                        <th>Tên khách hàng</th>
                        <th>Sđt</th>
                        <th>Ngày order</th>
                        <th>Sản phẩm</th>
                        <th>Số lượng</th>
                        <th>Giá (USD)</th>
                        <th>Khối lượng</th>
                        <th>Thành tiền</th>
                        <th>Địa chỉ giao hàng</th>
                        <th>Tình trạng</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
</div>