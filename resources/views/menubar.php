<html>
 	<meta charset="UTF-8" />
	<script type="text/javascript" src="../public/js/jquery.min.js"></script>
	<script src="../public/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="../public/css/bootstrap.min.css">
	<link rel="stylesheet" href="../public/css/bootstrap-theme.min.css">
	<!-- menu bar -->
	<nav class="navbar navbar-default container" role="navigation">
		<div class="collapse navbar-collapse">
			<ul class="nav navbar-nav">
				<?php
				if(!isset($thispage))
					$thispage = "";
				$links = array( 
								"首頁" => ".", 
								"訂書" => "order", 
								"租書" => "rent", 
								"賣書" => "3"
							); 
				foreach ($links as $title => $link){
					echo "<li ".(($thispage==$link)?"class='active'":"")."><a href=".$link.">".$title."</a></li>";
				}
			  	?>
			</ul>
		</div>
	</nav>
</html>