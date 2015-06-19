<html>
<body>
<form action="order" method="post">
	<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>" />
	<input name="name" type="text" value="test">
	<input name="submit" type="submit" value="送出">
</form>
</body>
</html>