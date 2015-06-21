<html>
 	<meta charset="UTF-8" />
	<script type="text/javascript" src="<?php echo asset('js/jquery.min.js'); ?>"></script>
	<script src="<?php echo asset('js/bootstrap.min.js'); ?>"></script>
	<link rel="stylesheet" href="<?php echo asset('css/bootstrap.min.css'); ?>">
	<link rel="stylesheet" href="<?php echo asset('css/bootstrap-theme.min.css'); ?>">
	<!-- menu bar -->
	<nav class="navbar navbar-default container" role="navigation">
		<div class="collapse navbar-collapse">
			<ul class="nav navbar-nav">
				<?php
				if(!isset($tag))
					$tag = "";
				$links = array( 
								"首頁" => ".", 
								"訂書" => "order", 
								"租書" => "rent", 
								"賣書" => "3"
							); 
				foreach ($links as $title => $link){
					echo "<li ".(($tag==$link)?"class='active'":"")."><a href=/".$link.">".$title."</a></li>";
				}
			  	?>
			</ul>
		</div>
	</nav>
</html>