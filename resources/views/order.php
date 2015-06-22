<html>
	<body>
		<?php include "menubar.php"; ?>
	    <form id="order" action="/order" method="POST">
	    <div class="container">
    		<input type="hidden" name="_method" value="PUT">
    		<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
	        <div id="show">
	        <?php
	        foreach ($orders as $order) {
	        	$arrive = $order->arrive;
	        	$no = $order->id;
	        	$cost = $order->cost;
	        	$books = $order->books;
	        	$publish = $order->publish;
	        	$date = $order->date;
	        	include("order.OrderItem.php");
	        }
			?>
				<div class="list-group" style="margin-top: 20px auto;">
				  <a href="#" class="list-group-item"><!--active-->
				    <h4 class="list-group-item-heading" style="height:20px">
				    	<div style="position: absolute;right: 5px;top: 5px">
							<button type="button" class="btn btn-info" onclick="createBtn()">新增訂單</button>
				    	</div>
				    </h4>
				  </a>
				</div>
	        </div>
	    </div>
	</form>
	</body>
	<script>
	function deleteBtn(id){
		$("input[name='_method']").val("DELETE");
		$("#order").attr("action", "<?php echo URL::to('order'); ?>/"+id);
		$("#order").submit();
	}
	function viewBtn(id){
		$("input[name='_method']").val("GET");
		$("#order").attr("action", "<?php echo URL::to('order'); ?>/"+id);
		$("#order").submit();
		//window.location = '/order/' + id + '/edit';
	}
	function createBtn(id){
		window.location = '<?php echo URL::to('order'); ?>/create';
	}
	</script>
</html>