<html>
	<body>
		<?php include "menubar.php"; ?>
	    <form id="book" action="<?php echo URL::to('book'); ?>" method="POST">
	    <div class="container">
    		<input type="hidden" name="_method" value="GET">
    		<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
    		<input type="hidden" name="_searchKey" value="<?php echo $searchKey; ?>">
	        <div id="show">
			    <div class="input-group">
			      <div class="input-group-btn">
			        <?php
						$keys = array( 
										"isbn" => "ISBN", 
										"name" => "書名", 
										"autor" => "作者"
									); 
			        ?>
			        <button id="searchKey" type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo $keys[$searchKey]; ?></button>
			        <ul class="dropdown-menu">
			          <li><a href="#" onclick="select('isbn','ISBN')">ISBN</a></li>
			          <li><a href="#" onclick="select('name','書名')">書名</a></li>
			          <li><a href="#" onclick="select('autor','作者')">作者</a></li>
			        </ul>
			      </div><!-- /btn-group -->
			      <input type="text" name="searchValue" class="form-control" aria-label="Text input with dropdown button" value="<?php echo $searchValue; ?>">
			      <div class="input-group-btn">
			        <button type="button" class="btn btn-default" aria-haspopup="true" aria-expanded="false" onclick="search()">GO</button>
			        
			      </div><!-- /btn-group -->
			    </div><!-- /input-group -->
				<br/>
  				<table class="table table-bordered table-striped">
  					<thead>
  						<td></td>
  						<td>ISBN</td>
  						<td>書名</td>
  						<td>作者</td>
  						<td>庫存</td>
  					</thead>
  					<tbody>
				        <?php
				        foreach ($books as $book) {
				        	echo "<tr>";
		    				echo "<td class='col-md-1'><button type='button' class='btn btn-default' onclick='rent(&#039;".$book->isbn."&#039;)'>借</button></td>";
				        	echo "<td class='col-md-2'>".$book->isbn."</td>";
				        	echo "<td class='col-md-5'>".$book->name."</td>";
				        	echo "<td class='col-md-2'>".$book->autor."</td>";
				        	echo "<td class='col-md-1'>".$book->count."</td>";
				        	echo "</tr>";
				        }
						?>
					</tbody>
				</table>
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
	function rent(isbn){
	    var person = prompt("請輸入顧客編號", "");
	    if (person != null) {
	        $.post("<?php echo URL::to('book'); ?>/"+isbn, 
	        	{ 
	        		_token: "<?php echo csrf_token(); ?>", 
	        		cid: person,
	        		_method: "PUT" 
	        	},
			   	function(data){
			     	alert(data);
			     	if(data === "借閱成功！")
						window.location = '<?php echo URL::to('book'); ?>';
			   });
		}/*
		$("input[name='_method']").val("GET");
		$("#order").attr("action", "<?php echo URL::to('order'); ?>/"+id);
		$("#order").submit();*/
		//window.location = '/order/' + id + '/edit';
	}
	function createBtn(id){
		window.location = '<?php echo URL::to('order'); ?>/create';
	}
	function select(key,msg){
		$("#searchKey").text(msg);
		$("input[name='_searchKey']").val(key);
	}
	function search(){
		$("input[name='_method']").val("PATCH");
		$("#book").attr("action", "<?php echo URL::to('book'); ?>/0");
		$("#book").submit();
	}
	</script>
</html>