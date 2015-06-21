<tr>
	<td><input type="checkbox" aria-label="..."></td>
	<td class="col-md-1">
	      <select name="kind[]" class="form-control" >
	        <option value="1" <?php echo ($kind==1)?"selected":"" ?>>租</option>
	        <option value="2" <?php echo ($kind==2)?"selected":"" ?>>賣</option>
	      </select>
	</td>
	<td><input type="text" class="form-control" name="isbn[]" value="<?php echo $isbn; ?>"></td>
	<td><input type="text" class="form-control" name="name[]" value="<?php echo $name; ?>"></td>
	<td><input type="text" class="form-control" name="autor[]" value="<?php echo $autor; ?>"></td>
	<td><input type="text" class="form-control" name="price[]" value="<?php echo $price; ?>"></td>
	<td><input type="text" class="form-control" name="among[]" value="<?php echo $among; ?>"></td>
</tr>