<div class="list-group" style="margin-top: 20px auto;">
	<a class="list-group-item">
		<h4 class="list-group-item-heading" style="font-size:20px">
			<label style="align:left;">訂單編號:<?php echo $no; ?></label>
			<div style="position: absolute;right: 5px;top: 5px;">
		    	<button type="button" class="btn btn-default" onclick="viewBtn(<?php echo $no; ?>)">檢視</button>
		    	<?php
		    		if(!$arrive)
		    			echo "<button type='button' class='btn btn-danger' onclick='deleteBtn(".$no.")'>刪除</button>";
					else
						echo "<button type='button' class='btn btn-success'>已入庫</button>";
				?>
			</div>
		</h4>
		<div style="cursor:pointer;">
			<table style="font-size:20px;width:100%">
				<tr style="width:100%">
					<td style="width:50%"><label>下單日期:<?php echo $date; ?></label></td>
					<td style="width:50%"><label>出版社:<?php echo $publish; ?></label></td>
				</tr>
				<tr style="width:100%">
					<td style="width:50%"><label>合計:<?php echo $books; ?>本</label></td>
					<td style="width:50%"><label>總金額:<?php echo $cost; ?>元</label></td>
				</tr>
			</table>
		</div>
	</a>
</div>