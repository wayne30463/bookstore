<html>
	<body>
		<?php $thispage="order"; include "menubar.php"; ?>
	    <div class="container">
	        <div id="show">
				<div class="list-group" style="margin-top: 20px auto;">
					<a class="list-group-item">
						<h4 class="list-group-item-heading" style="font-size:20px">
							<label style="align:left;">訂單編號:XXXXX</label>
							<div style="position: absolute;right: 5px;top: 5px;">
						    	<button type="button" class="btn btn-success">檢視</button>
						    	<button type="button" class="btn btn-danger">刪除</button>
							</div>
						</h4>
						<div style="cursor:pointer;">
							<table style="font-size:20px;width:100%">
								<tr style="width:100%">
									<td style="width:50%"><label>下單日期:XXXX-XX-XX</label></td>
									<td style="width:50%"><label>出版社:XXXX公司</label></td>
								</tr>
								<tr style="width:100%">
									<td style="width:50%"><label>合計:XXXX本</label></td>
									<td style="width:50%"><label>總金額:XXXX元</label></td>
								</tr>
							</table>
						</div>
					</a>
				</div>
				<div class="list-group" style="margin-top: 20px auto;">
				  <a href="#" class="list-group-item"><!--active-->
				    <h4 class="list-group-item-heading" style="height:20px">
				    	<div style="position: absolute;right: 5px;top: 5px">
							<button type="button" class="btn btn-info"  data-toggle="modal" ng-click="addBtn_Clk()">新增訂單</button>
				    	</div>
				    </h4>
				  </a>
				</div>
	        </div>
	    </div>
	</body>
</html>