<html>
	<body>
		<?php include "menubar.php"; ?>
	    <form id="order" action="<?php echo URL::to('order'); ?>" method="POST">
	    <div class="container">
    		<input type="hidden" name="_method" value="PATCH">
    		<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
			<div class="list-group" style="margin-top: 20px auto;">
			  <a class="list-group-item"><!--active-->
			    <h4 class="list-group-item-heading">
			    	新增訂單
			    </h4>
			  </a>
			</div>
    		<div class="input-group input-group-lg">
  				<span class="input-group-addon" id="sizing-addon1">下單日期</span>
  				<input type="text" class="form-control" name="date" value="<?php echo $order->date;?>" placeholder="YYYY-MM-DD" aria-describedby="sizing-addon1">
			</div>
			<br/>
    		<div class="input-group input-group-lg">
  				<span class="input-group-addon" id="sizing-addon1">出版社</span>
  				<input type="text" class="form-control" name="publish" value="<?php echo $order->publish;?>" aria-describedby="sizing-addon1">
			</div>
			<br/>
	        <div id="show">
  				<table class="table table-bordered table-striped">
  					<thead>
  						<td></td>
  						<td>種類</td>
  						<td>ISBN</td>
  						<td>書名</td>
  						<td>作者</td>
  						<td>定價</td>
  						<td>數量</td>
  					</thead>
  					<tbody>
  					<?php 
  						foreach ($orderbooks as $key => $value) {
  							# code...
							$kind = $value->kind;
							$isbn = $value->isbn;
							$name = $value->name;
							$autor = $value->autor;
							$price = $value->price;
							$among = $value->among;
	        				include("orderCreator.BookItem.php"); 
  						}
							$kind = 0;
							$isbn = "";
							$name = "";
							$autor = "";
							$price = 0;
							$among = 0;
	        				include("orderCreator.BookItem.php"); 
	        		?>
	        		</tbody>
				</table>
				<div class="list-group" style="margin-top: 20px auto;">
				  <a href="#" class="list-group-item"><!--active-->
				    <h4 class="list-group-item-heading" style="height:20px">
				    	<div style="position: absolute;right: 5px;top: 5px">
							<button type="button" class="btn btn-success" onclick="addBookBtn()">加入新書</button>
							<button type="button" class="btn btn-danger" onclick="delBookBtn()">刪除勾選</button>
							<button type="button" class="btn btn-info" onclick="storeBtn(<?php echo $order->id;?>)">儲存</button>
							<button type="button" class="btn btn-warning" onclick="cancelBtn()">取消</button>
				    	</div>
				    </h4>
				  </a>
				</div>
	        </div>
	    </div>
	</form>
	</body>
	<script>
	var temp_row = $("tbody > tr:last").clone();
	function delBookBtn(){
		$("tbody").find("tr").each(
			function(){
				if($(this).find("input[type='checkbox']").prop("checked") == true)
					$(this).remove();
			});
	}
	function addBookBtn(id){
		$("tbody").append(temp_row.clone());
	}
	function storeBtn(id){
		$("input[name='_method']").val("PATCH");
		$("#order").attr("action", "<?php echo URL::to('order'); ?>/"+id);
		$("#order").submit();
	}
	function cancelBtn(){
		window.location = '<?php echo URL::to('order'); ?>';
	}
	</script>
</html>