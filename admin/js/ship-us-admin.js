(function( $ ) {

	/**
	 * All of the code for your admin-facing JavaScript source
	 * should reside in this file.
	 *
	 * Note: It has been assumed you will write jQuery code here, so the
	 * $ function reference has been prepared for usage within the scope
	 * of this function.
	 *
	 * This enables you to define handlers, for when the DOM is ready:
	 *
	 * $(function() {
	 *
	 * });
	 *
	 * When the window is loaded:
	 *
	 * $( window ).load(function() {
	 *
	 * });
	 *
	 * ...and/or other possibilities.
	 *
	 * Ideally, it is not considered best practise to attach more than a
	 * single DOM-ready or window-load handler for a particular page.
	 * Although scripts in the WordPress core, Plugins and Themes may be
	 * practising this, we should strive to set a better example in our own work.
	 */

	  window.$orderTable = $('#orders-table').DataTable({
		select: true,
		ajax: {
			url: ajaxurl,
			data: {
				action: 'list_orders',
			},

		},
		columns: [
			{
				data: "id",
				render: function ( data, type, row, meta ) {
					return meta.row + 1;
				}
			},
			
			{ data: "ma_order" },
			{ data: "full_name" },
			{ data: "sdt" },
			{ data: "ngay_order" },
			{ data: "product_link" },
			{ data: "quantity" },
			{ data: "price" },
			{ data: "actual_weight" },
			{ data: "total_value" },
			{ data: "dia_chi_nhan" },
			{ 
				data: "order_status",
				render: function( data, type, row, meta) {
					var caption = '';
					data = parseInt(data);
					switch (data) {
						case 1:
							caption = 'Đơn hàng đã được mua';
							break;
						case 2:
							caption = 'Đơn hàng đang vận chuyển tới kho Mỹ';
							break;
						case 3:
							caption = 'Dự kiến giao hàng tại Mỹ';
							break;
						case 4: 
							caption = 'Dự kiến giao hàng tại VN';
							break;
						case 5:
							caption = 'Giao Thành Công hoặc Huỷ Đơn';
							break;
						default:
							caption = 'Nhập order';
							break;
					}
					return caption;
				}
			},
			{
				data: "order_number",
				visible: false,
			},
			{
				data: "courier",
				visible: false,
			},
			{
				data: "tracking_number",
				visible: false,
			},
			{
				data: "delivery_us_date",
				visible: false,
			},
			{
				data: "delivery_vn_date",
				visible: false,
			}

		]
	 });

	 

	 $("#add-order").on("click", function(e){
		e.preventDefault();
		this.blur();
		$.post(ajaxurl, {'action': 'new_order'}, function(response) {
			$(response).appendTo('body').modal({fadeDuration: 200});
			$('[data-toggle="datepicker"]').datepicker({format: 'dd/mm/yyyy'});
		});
	 });
	 $("body").on("click", "#save-form", function(e) {
		e.preventDefault();
		$.post(ajaxurl, {'action': 'save_order', data: $("#edit-order-form").serialize()}, function(response) {
			window.location.reload();
		});
	 });
	 $('.modal').on('modal:after-close', function(e) {
		$(this).remove();
	 });

	 $("#update-status").on("click", function(e) {
		e.preventDefault();
		this.blur();
		var selected_row = window.$orderTable.row({ selected: true }).data();
		if(selected_row == undefined) {
			alert("Xin chọn 1 order");
			return;
		}
		$.post(ajaxurl, {'action': 'order_logs', 'order_id': selected_row.id}, function(response) {
			$(response).appendTo('body').modal({fadeDuration: 200});
			$('[data-toggle="datepicker"]').datepicker({format: 'dd/mm/yyyy'});
		});
	 });

	 $("#edit-order").on("click", function(e) {
		e.preventDefault();
		this.blur();
		var selected_row = window.$orderTable.row({ selected: true }).data();
		if(selected_row == undefined) {
			alert("Xin chọn 1 order");
			return;
		}
		
		$.post(ajaxurl, {'action': 'edit_order', 'order': JSON.stringify(selected_row)}, function(response) {
			$(response).appendTo('body').modal({fadeDuration: 200});
			$('[data-toggle="datepicker"]').datepicker({format: 'dd-mm-yyyy'});
		});
	 });

	 $('body').on("click", "#save-log", function(e) {
		e.preventDefault();
		$.post(ajaxurl, {'action': 'save_logs', data: $("#edit-logs-form").serialize()}, function(response) {
			window.location.reload();
		});
	 });

	 $("#remove-order").on("click",function(e) {
		e.preventDefault();
		this.blur();
		var selected_row = window.$orderTable.row({ selected: true }).data();
		if(selected_row == undefined) {
			alert("Xin chọn 1 order");
			return;
		}
		if(window.confirm("Bạn có muốn xóa order này không?")) {
			$.post(ajaxurl, {'action': 'remove_order', order_id: selected_row.id},function(response) {
				window.location.reload();
			});
		}
	 });

})( jQuery );
