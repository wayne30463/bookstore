<html>
	<body>
		<?php include "menubar.php"; ?>
	    <form id="order" action="/order" method="POST">
	    <div class="container">
    		<input type="hidden" name="_method" value="
	function deleteBtn(id){
		$("input[name='_method']").val("DELETE");
		$("#order").attr("action", "order/"+id);
		$("#order").submit();
	}">
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
  				<input type="text" class="form-control" value="<?php echo $order->date;?>" placeholder="YYYY-MM-DD" aria-describedby="sizing-addon1" readonly>
			</div>
			<br/>
    		<div class="input-group input-group-lg">
  				<span class="input-group-addon" id="sizing-addon1">出版社</span>
  				<input type="text" class="form-control" value="<?php echo $order->publish;?>" aria-describedby="sizing-addon1" readonly>
			</div>
			<br/>
	        <div id="show">
  				<table class="table table-bordered table-striped">
  					<thead>
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
  							echo "<tr>";
	        				echo "<td>".$value->kind."</td>"; 
	        				echo "<td>".$value->isbn."</td>"; 
	        				echo "<td>".$value->name."</td>"; 
	        				echo "<td>".$value->autor."</td>"; 
	        				echo "<td>".$value->price."</td>"; 
	        				echo "<td>".$value->among."</td>"; 
	        				echo "</tr>";
  						}
	        		?>
	        		</tbody>
				</table>
				<div class="list-group" style="margin-top: 20px auto;">
				  <a href="#" class="list-group-item"><!--active-->
				    <h4 class="list-group-item-heading" style="height:20px">
				    	<div style="position: absolute;right: 5px;top: 5px">
							<?php 
								if(!$order->arrive) {
									echo "<button type='button' class='btn btn-warning' onclick='editBtn()'>修改</button>";
									echo "<button type='button' class='btn btn-primary' onclick='arriveBtn(".$order->id.")'>入庫</button>";
								}
								else
									echo "<button type='button' class='btn btn-success'>已入庫</button>";
								echo "<button type='button' class='btn btn-default' onclick='cancelBtn()'>返回</button>";
							?>
				    	</div>
				    </h4>
				  </a>
				</div>
	        </div>
	    </div>
	</form>
	</body>
	<script>
	function editBtn(){
		window.location = '/order/<?php echo $order->id;?>/edit';
	}
	function cancelBtn(){
		window.location = '/order';
	}
	function arriveBtn(id){
		$("input[name='_method']").val("PUT");
		$("#order").attr("action", "/order/"+id);
		$("#order").submit();
	}
	</script>
</html>
</html>