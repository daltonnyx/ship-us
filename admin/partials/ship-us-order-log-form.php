<div class="form-content" style="max-width:500px;">
<header class="form-header">
    <h3><?php echo $title; ?></h3>
</header>
<form action="/" id="edit-logs-form" method="POST">
    <input name="order_id" type="hidden" value="<?php echo $order_id; ?>" />
    <p>
        <label for="order-status">Trạng thái (VND)</label>
        <br>
        <select class="widefat" name="order_status" id="order-status">
            <option>-- Chọn tình trạng --</option>
            <option value="0">Nhập order</option>
            <option value="1">Đơn hàng đã được mua</option>
            <option value="2">Đơn hàng đang vận chuyển tới kho Mỹ</option>
            <option value="3">Dự kiến giao hàng tại Mỹ</option>
            <option value="4">Dự kiến giao hàng tại VN</option>
            <option value="5">Giao Thành Công hoặc Huỷ Đơn</option>
        </select>
    </p>
    <p>
        <label for="order-note">Ghi chú</label>
        <br>
        <textarea name="note" id="order-note" class="widefat"></textarea>
    </p>
</form>
<div class="form-footer">
        <a href="#" id="save-log" class="button button-primary">Lưu</a>
        <a href="#close" rel="modal:close" id="close-form" class="button">Hủy</a>
    </div>
</div>