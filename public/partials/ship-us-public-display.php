<?php

/**
 * Provide a public-facing view for the plugin
 *
 * This file is used to markup the public-facing aspects of the plugin.
 *
 * @link       https://github.com/daltonnyx/
 * @since      1.0.0
 *
 * @package    Ship_Us
 * @subpackage Ship_Us/public/partials
 */
?>

<!-- This file should primarily consist of HTML with a little bit of PHP. -->
<form  method="GET">
    <div class="form-row">
        <div class="form-group col-12">
            <label for="search-order">TRA CỨU VẬN ĐƠN</label>
            <input type="text" placeholder="Nhập mã vận đơn để tra cứu" value="<?php echo $_GET['order_no'] ?>" name="order_no" />
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-12">
            <button type="submit"  class="btn btn-primary"><i class="fas fa-search"></i> Tra cứu đơn</button>
        </div>
    </div>
</form>
<?php if(isset($order)) : ?>
<div class="order-detail">
<table class="table">
<tbody>
<tr>
    <th>Tên khách hàng</th>
    <td><?php echo $order->full_name; ?></td>
</tr>
<tr>
    <th>Số điện thoại</th>
    <td><?php echo $order->sdt; ?></td>
</tr>
<tr>
    <th>Mã order</th>
    <td><?php echo $order->ma_order; ?></td>
</tr>
<tr>
    <th>Sản phẩm</th>
    <td><a href="<?php echo $order->product_link; ?>" target="_blank"><?php echo $order->product_link; ?></a></td>
</tr>
<tr>
    <th>Ngày order</th>
    <td><?php echo DateTime::createFromFormat('Y-m-d H:i:s', $order->ngay_order)->format('d-m-Y'); ?></td>
</tr>
<tr>
    <th>Địa chỉ nhận</th>
    <td><?php echo $order->dia_chi_nhan; ?></td>
</tr>
<tr>
    <th>Số lượng</th>
    <td><?php echo $order->quantity; ?></td>
</tr>
<tr>
    <th>Giá (USD)</th>
    <td><?php echo $order->price; ?></td>
</tr>
<tr>
    <th>Trọng lượng (g)</th>
    <td><?php echo $order->actual_weight; ?></td>
</tr>
<tr>
    <th>Thành tiền (VND)</th>
    <td><?php echo $order->total_value; ?></td>
</tr>
<tr>
    <th>Order Number</th>
    <td><?php echo $order->order_number; ?></td>
</tr>
<tr>
    <th>Courier</th>
    <td><?php echo $order->courier; ?></td>
</tr>
<tr>
    <th>Tracking Number</th>
    <td><?php echo $order->tracking_number; ?></td>
</tr>
<tr>
    <th>Ngày giao tới US</th>
    <td><?php echo DateTime::createFromFormat('Y-m-d H:i:s', $order->delivery_us_date)->format('d-m-Y'); ?></td>
</tr>
<tr>
    <th>Ngày giao tới VN</th>
    <td><?php echo DateTime::createFromFormat('Y-m-d H:i:s', $order->delivery_vn_date)->format('d-m-Y'); ?></td>
</tr>
<tr>
    <th>Chi tiết</th>
    <td>
        <ul class="logs-detail">
            <?php foreach($logs as $log) : ?>
                <li class="log">
                    <b>Ngày cập nhật: <?php echo DateTime::createFromFormat('Y-m-d H:i:s', $log->date_changed)->format('d-m-Y H:i:s'); ?></b><br/>
                    <span class="action"><?php switch ($log->order_status) {
                        case '1':
                            echo 'Đơn hàng đã được mua';
                            break;
                        case '2':
                            echo 'Đơn hàng đang vận chuyển tới kho Mỹ';
                            break;
                        case '3':
                            echo 'Dự kiến giao hàng tại Mỹ';
                            break;
                        case '4':
                            echo 'Dự kiến giao hàng tại VN';
                            break;
                        case '5':
                            echo 'Giao Thành Công hoặc Huỷ Đơn';
                            break;
                        default:
                            echo 'Nhập order';
                            break;
                    } ?></span>
                    <p class="note"><i><?php echo $log->note; ?></i></p>
                </li>
            <?php endforeach; ?>
        </ul>
    </td>
</tr>
</tbody>
</table>
</div>
<?php endif; ?>