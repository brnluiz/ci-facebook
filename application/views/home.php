<html>
<head>
	<title>Facebook test</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<style>
	body
	{
		font-family: Arial;
		font-size: 13px;
		font-weight: 700;
	}
	#var_dump{
		color: #444;
		background: #eee;
		width: 90%;
		margin: 0 auto;
		display: block;
		padding: 5px 10px;
		overflow-x: scroll;
		margin-top: 25px;
		font-weight: 300;
	}
	#var_dump p{
		color: #222;
		padding-top: 0;
		font-weight: 700;
	}
	#var_dump li{list-style: none}
	</style>
</head>
<body>
	<div>
		<!--<img src="https://graph.facebook.com/<?php echo $fb_data['uid']; ?>/picture" alt="" class="pic" />-->
		<span>Hi <?php echo $fb_data['me']['name']; ?>, <a href="index.php/home/logout">logout</a></span>
		<div id="var_dump">
			<p>Debug:</p>
			<?php
			//A more pretier var_dump
			function pp($arr){
				$retStr = '<ul>';
				if (is_array($arr))
				{
					foreach ($arr as $key=>$val){
						if (is_array($val))
							$retStr .= '<li>' . $key . ' => ' . pp($val) . '</li>';
						else
							$retStr .= '<li>' . $key . ' => ' . $val . '</li>';
					}
				}
				$retStr .= '</ul>';
				return $retStr;
			}
			echo pp($fb_data);
			?>
		</div>
	</div>
</body>
</html>