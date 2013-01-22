<html>
<head>
	<title>Facebook login</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<style>
	body
	{
		font-family: Arial;
		font-size: 13px;
		font-weight: 700;
	}
	</style>
</head>
<body>
	<div>
		<?php if(!$fb_data['me']): 
		//YOU'VE TO OUTPUT THIS loginUrl. OTHERWISE YOU CAN'T LOGIN! Did you think where you want to send the user after login?
		//Yes? So change the $config['fbPostLoginRedirect'] at config/facebook.php
		?>
			<a href="<?=$fb_data['loginUrl']?>"><img src="imgs/login_btn.png" /></a>
		<?php endif;?>
	</div>
</body>
</html>