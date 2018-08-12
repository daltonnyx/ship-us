<div class="form-content" style="max-width:900px;">
<header class="form-header">
    <h3><?php echo $title; ?></h3>
</header>
<form action="/" id="edit-order-form" method="POST">
    <input name="id" type="hidden" value="<?php echo $order->id; ?>" />
    <input name="ma_order" type="hidden" value="<?php echo $order->ma_order; ?>" />
    <div class="width-50">
        <p>
            <label for="customer-name">Tên khách hàng</label>
            <br>
            <input class="widefat" type="text" name="full_name" id="customer-name" value="<?php echo $order->full_name; ?>" size="30">
        </p>
        <p>
            <label for="customer-number">Số điện thoại</label>
            <br>
            <input class="widefat" type="text" name="sdt" id="customer-number" value="<?php echo $order->sdt; ?>" size="30">
        </p>
        <p>
            <label for="product-link">Link sản phẩm</label>
            <br>
            <input class="widefat" type="text" name="product_link" id="product-link" value="<?php echo $order->product_link; ?>" size="30">
        </p>
        <p>
            <label for="order-date">Ngày order</label>
            <br>
            <input class="widefat" type="text" data-toggle="datepicker" name="ngay_order" id="order-date" value="<?php if(isset($order)) echo DateTime::createFromFormat('Y-m-d H:i:s', $order->ngay_order)->format('d-m-Y'); ?>" size="30">
        </p>
        <p>
            <label for="order-address">Địa chỉ nhận hàng</label>
            <br>
            <input class="widefat" type="text" name="dia_chi_nhan" id="order-address" value="<?php echo $order->dia_chi_nhan; ?>" size="30">
        </p>
    </div>
    <div class="width-50">
        <p>
            <span class="col col-3">
                <label for="quantity">Số lượng</label>
                <br>
                <input class="widefat" type="number" min="0" name="quantity" id="quantity" value="<?php echo $order->quantity; ?>" size="30">
            </span>
            <span class="col col-3">
                <label for="price">Giá (USD)</label>
                <br>
                <input class="widefat" type="number" min="0" name="price" id="price" value="<?php echo $order->price; ?>" size="30">
            </span>
            <span class="col col-3">
                <label for="weight">Trọng lượng (g)</label>
                <br>
                <input class="widefat" type="number" min="0" name="actual_weight" id="weight" value="<?php echo $order->weight; ?>" size="30">
            </span>
        </p>
        <p>
            <label for="actual-price">Giá về VN (VND)</label>
            <br>
            <input class="widefat" type="number" min="0" step="1000"  name="total_value" id="actual-price" value="<?php echo $order->total_value; ?>" size="30">
        </p>
        <p>
            <span class="col col-3">
                <label for="order-number">Order Number</label>
                <br>
                <input class="widefat" type="text" min="0" step="1000"  name="order_number" value="<?php echo $order->order_number; ?>" id="order-number" size="30">
            </span>
            <span class="col col-3">
                <label for="courier">Courier</label>
                <br>
                <input class="widefat" type="text" min="0" step="1000"  name="courier" value="<?php echo $order->courier; ?>" id="courier" size="30">
            </span>
            <span class="col col-3">
                <label for="tracking-number">Tracking Number</label>
                <br>
                <input class="widefat" type="text" min="0" step="1000"  name="tracking_number" value="<?php echo $order->tracking_number; ?>" id="tracking-number" size="30">
            </span>
        </p>
        <p>
            <label for="delivery-us-date">Est. Delivery Date US</label>
            <br>
            <input class="widefat" type="text" data-toggle="datepicker" min="0" step="1000"  name="delivery_us_date" value="<?php if(isset($order)) echo DateTime::createFromFormat('Y-m-d H:i:s', $order->delivery_us_date)->format('d-m-Y'); ?>" id="delivery-us-date" size="30">
        </p>
        <p>
            <label for="delivery-vn-date">Est. Delivery Date VN</label>
            <br>
            <input class="widefat" type="text" data-toggle="datepicker" min="0" step="1000"  name="delivery_vn_date" value="<?php if(isset($order)) echo DateTime::createFromFormat('Y-m-d H:i:s', $order->delivery_vn_date)->format('d-m-Y'); ?>" id="delivery-vn-date" size="30">
        </p>
        <p>
        </p>
    </div>
    <div class="form-footer">
        <a href="#" id="save-form" class="button button-primary">Lưu</a>
        <a href="#close" rel="modal:close" id="close-form" class="button">Hủy</a>
    </div>
</form>
</div>