<!DOCTYPE html>
<html>
	<head>
		<title>BC - Magazine</title>
		<!--meta-->
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.2" />
		<meta name="format-detection" content="telephone=no" />
		<meta name="keywords" content="Medic, Medical Center" />
		<meta name="description" content="Responsive Medical Health Template" />
		<!--style-->
		<link href='//fonts.googleapis.com/css?family=Roboto:300,400,700' rel='stylesheet' type='text/css'>
		<link href='//fonts.googleapis.com/css?family=Roboto+Condensed:300,400,700' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" type="text/css" href="style/reset.css">
		<link rel="stylesheet" type="text/css" href="style/superfish.css">
		<link rel="stylesheet" type="text/css" href="style/prettyPhoto.css">
		<link rel="stylesheet" type="text/css" href="style/jquery.qtip.css">
		<link rel="stylesheet" type="text/css" href="style/style.css">
		<link rel="stylesheet" type="text/css" href="style/menu_styles.css">
		<link rel="stylesheet" type="text/css" href="style/animations.css">
		<link rel="stylesheet" type="text/css" href="style/responsive.css">
		<link rel="stylesheet" type="text/css" href="style/odometer-theme-default.css">
		<?php 
		if(isset($_COOKIE["pr_color_skin"]) && ($_COOKIE["pr_color_skin"]=="dark" || $_COOKIE["pr_color_skin"]=="high_contrast"))
		{
			echo '<link rel="stylesheet" type="text/css" href="style/dark_skin.css">';
			if($_COOKIE["pr_color_skin"]=="high_contrast")
				echo '<link rel="stylesheet" type="text/css" href="style/high_contrast_skin.css">';
		}
		?>
		<!--<link rel="stylesheet" type="text/css" href="style/dark_skin.css">-->
		<!--<link rel="stylesheet" type="text/css" href="style/high_contrast_skin.css">-->
		<link rel="shortcut icon" href="images/favicon.ico">
	</head>
	<!--<body class="image_1">
	<body class="image_1 overlay">
	<body class="image_2">
	<body class="image_2 overlay">
	<body class="image_3">
	<body class="image_3 overlay">
	<body class="image_4">
	<body class="image_4 overlay">
	<body class="image_5">
	<body class="image_5 overlay">
	<body class="pattern_1">
	<body class="pattern_2">
	<body class="pattern_3">
	<body class="pattern_4">
	<body class="pattern_5">
	<body class="pattern_6">
	<body class="pattern_7">
	<body class="pattern_8">
	<body class="pattern_9">
	<body class="pattern_10">-->
	<body class="<?php echo (isset($_COOKIE['pr_layout']) && $_COOKIE['pr_layout']=="boxed" ? (isset($_COOKIE['pr_layout_style']) && $_COOKIE['pr_layout_style']!="" ? $_COOKIE['pr_layout_style'] . ' ' . $_COOKIE['pr_image_overlay'] : 'image_1 overlay') : ''); ?>">
		<div class="site_container<?php echo ($_COOKIE['pr_layout']=="boxed" ? ' boxed' : ''); ?>">
			<!--<div class="header_top_bar_container style_2 clearfix">
			<div class="header_top_bar_container style_2 border clearfix">
			<div class="header_top_bar_container style_3 clearfix">
			<div class="header_top_bar_container style_3 border clearfix">
			<div class="header_top_bar_container style_4 clearfix">
			<div class="header_top_bar_container style_4 border clearfix">
			<div class="header_top_bar_container style_5 clearfix">
			<div class="header_top_bar_container style_5 border clearfix"> -->
			<div class="header_top_bar_container clearfix<?php echo (isset($_COOKIE['pr_header_top_bar_container']) ? ' ' . $_COOKIE['pr_header_top_bar_container'] : (isset($_COOKIE['pr_color_skin']) && $_COOKIE['pr_color_skin']=='dark' ? ' style_4' : ($_COOKIE['pr_color_skin']=='high_contrast' ? ' style_5 border' : ''))); ?>">
				<div class="header_top_bar">
					<form class="search">
						<input type="text" name="s" placeholder="Pesquisar..." value="Pesquisar..." class="search_input hint">
						<input type="submit" class="search_submit" value="">
						<input type="hidden" name="page" value="search">
					</form>
					<!--<ul class="social_icons dark clearfix">
					<ul class="social_icons colors clearfix">-->
					<ul class="social_icons clearfix<?php echo (isset($_COOKIE['pr_social_icons']) ? ' ' . $_COOKIE['pr_social_icons'] : ' dark'); ?>">
						<li>
							<a target="_blank" href="http://www.facebook.com/revistabeachclass" class="social_icon facebook" title="facebook">
								&nbsp;
							</a>
						</li>
						<li>
							<a target="_blank" href="https://twitter.com/Beach_Class" class="social_icon twitter" title="twitter">
								&nbsp;
							</a>
						</li>
						<li>
							<a title="" href="http://www.instagram.com/beach_class" class="social_icon instagram">
								&nbsp;
							</a>
						</li>
						<li>
							<a href="mailto:contato@bcmagazine.com.br" class="social_icon mail" title="mail">
								&nbsp;
							</a>
						</li>
						
						<!--<li>
							<a title="" href="http://themeforest.net/user/QuanticaLabs?ref=QuanticaLabs" class="social_icon behance">
								&nbsp;
							</a>
						</li>
						<li>
							<a title="" href="http://themeforest.net/user/QuanticaLabs?ref=QuanticaLabs" class="social_icon bing">
								&nbsp;
							</a>
						</li>
						<li>
							<a title="" href="http://themeforest.net/user/QuanticaLabs?ref=QuanticaLabs" class="social_icon blogger">
								&nbsp;
							</a>
						</li>
						<li>
							<a title="" href="http://themeforest.net/user/QuanticaLabs?ref=QuanticaLabs" class="social_icon deezer">
								&nbsp;
							</a>
						</li>
						<li>
							<a title="" href="http://themeforest.net/user/QuanticaLabs?ref=QuanticaLabs" class="social_icon designfloat">
								&nbsp;
							</a>
						</li>
						<li>
							<a title="" href="http://themeforest.net/user/QuanticaLabs?ref=QuanticaLabs" class="social_icon deviantart">
								&nbsp;
							</a>
						</li>
						<li>
							<a title="" href="http://themeforest.net/user/QuanticaLabs?ref=QuanticaLabs" class="social_icon digg">
								&nbsp;
							</a>
						</li>
						<li>
							<a title="" href="http://themeforest.net/user/QuanticaLabs?ref=QuanticaLabs" class="social_icon dribbble">
								&nbsp;
							</a>
						</li>
						<li>
							<a title="" href="http://themeforest.net/user/QuanticaLabs?ref=QuanticaLabs" class="social_icon flickr">
								&nbsp;
							</a>
						</li>
						<li>
							<a title="" href="http://themeforest.net/user/QuanticaLabs?ref=QuanticaLabs" class="social_icon form">
								&nbsp;
							</a>
						</li>
						<li>
							<a title="" href="http://themeforest.net/user/QuanticaLabs?ref=QuanticaLabs" class="social_icon forrst">
								&nbsp;
							</a>
						</li>
						<li>
							<a title="" href="http://themeforest.net/user/QuanticaLabs?ref=QuanticaLabs" class="social_icon foursquare">
								&nbsp;
							</a>
						</li>
						<li>
							<a title="" href="http://themeforest.net/user/QuanticaLabs?ref=QuanticaLabs" class="social_icon friendfeed">
								&nbsp;
							</a>
						</li>
						<li>
							<a title="" href="http://themeforest.net/user/QuanticaLabs?ref=QuanticaLabs" class="social_icon googleplus">
								&nbsp;
							</a>
						</li>						
						<li>
							<a title="" href="http://themeforest.net/user/QuanticaLabs?ref=QuanticaLabs" class="social_icon linkedin">
								&nbsp;
							</a>
						</li>
						<li>
							<a title="" href="http://themeforest.net/user/QuanticaLabs?ref=QuanticaLabs" class="social_icon mobile">
								&nbsp;
							</a>
						</li>
						<li>
							<a title="" href="http://themeforest.net/user/QuanticaLabs?ref=QuanticaLabs" class="social_icon myspace">
								&nbsp;
							</a>
						</li>
						<li>
							<a title="" href="http://themeforest.net/user/QuanticaLabs?ref=QuanticaLabs" class="social_icon picasa">
								&nbsp;
							</a>
						</li>
						<li>
							<a title="" href="http://themeforest.net/user/QuanticaLabs?ref=QuanticaLabs" class="social_icon pinterest">
								&nbsp;
							</a>
						</li>
						<li>
							<a title="" href="http://themeforest.net/user/QuanticaLabs?ref=QuanticaLabs" class="social_icon reddit">
								&nbsp;
							</a>
						</li>
						<li>
							<a title="" href="http://themeforest.net/user/QuanticaLabs?ref=QuanticaLabs" class="social_icon rss">
								&nbsp;
							</a>
						</li>
						<li>
							<a title="" href="http://themeforest.net/user/QuanticaLabs?ref=QuanticaLabs" class="social_icon skype">
								&nbsp;
							</a>
						</li>
						<li>
							<a title="" href="http://themeforest.net/user/QuanticaLabs?ref=QuanticaLabs" class="social_icon soundcloud">
								&nbsp;
							</a>
						</li>
						<li>
							<a title="" href="http://themeforest.net/user/QuanticaLabs?ref=QuanticaLabs" class="social_icon spotify">
								&nbsp;
							</a>
						</li>
						<li>
							<a title="" href="http://themeforest.net/user/QuanticaLabs?ref=QuanticaLabs" class="social_icon stumbleupon">
								&nbsp;
							</a>
						</li>
						<li>
							<a title="" href="http://themeforest.net/user/QuanticaLabs?ref=QuanticaLabs" class="social_icon technorati">
								&nbsp;
							</a>
						</li>
						<li>
							<a title="" href="http://themeforest.net/user/QuanticaLabs?ref=QuanticaLabs" class="social_icon tumblr">
								&nbsp;
							</a>
						</li>
						<li>
							<a title="" href="http://themeforest.net/user/QuanticaLabs?ref=QuanticaLabs" class="social_icon vimeo">
								&nbsp;
							</a>
						</li>
						<li>
							<a title="" href="http://themeforest.net/user/QuanticaLabs?ref=QuanticaLabs" class="social_icon wykop">
								&nbsp;
							</a>
						</li>
						<li>
							<a title="" href="http://themeforest.net/user/QuanticaLabs?ref=QuanticaLabs" class="social_icon xing">
								&nbsp;
							</a>
						</li>
						<li>
							<a title="" href="http://themeforest.net/user/QuanticaLabs?ref=QuanticaLabs" class="social_icon youtube">
								&nbsp;
							</a>
						</li>-->
					</ul>
					<div class="latest_news_scrolling_list_container">
						<ul>
							<li class="category">Últimas Notícias</li>
							<li class="left"><a href="#"></a></li>
							<li class="right"><a href="#"></a></li>
							<li class="posts">
								<ul class="latest_news_scrolling_list">
									<?php
										require_once "admin/config/conecta_paralelo_2.php";
										require_once "admin/public/util/funcoes.php";
										$sql = mysql_query("SELECT * FROM ultimas_noticias", $conexao);
										if(mysql_num_rows($sql) > 0)
											while($linha = mysql_fetch_array($sql)){
									?>
									<li>
										<a target="_blank" href="click-bcmdigital.php?t=<?php echo base64_encode('un');?>&i=<?php echo base64_encode($linha['id']);?>&link=<?php echo base64_encode($linha['ds_link']);?>"><?php echo $linha['titulo_noticia'];?></a>
									</li>
									<?php
											}
									?>
								</ul>
							</li>
						</ul>
					</div>
				</div>
			</div>
			<!--<div class="header_container small">
			<div class="header_container style_2">
			<div class="header_container style_2 small">
			<div class="header_container style_3">
			<div class="header_container style_3 small">-->
			<div class="header_container<?php echo (isset($_COOKIE['pr_header_container']) ? ' ' . $_COOKIE['pr_header_container'] : (isset($_COOKIE['pr_color_skin']) && $_COOKIE['pr_color_skin']=='dark' ? ' style_2' : ($_COOKIE['pr_color_skin']=='high_contrast' ? ' style_3' : ''))); ?>">
				<div class="header clearfix">
					<div class="logo">
						<h1><a href="?page=home" title="Pressroom">Beach Class</a></h1>
						<h4>Magazine</h4>
					</div>
					<div class="placeholder">728 x 90</div>
				</div>
			</div>
			<!-- <div class="menu_container style_2 clearfix">
			<div class="menu_container style_3 clearfix">
			<div class="menu_container style_... clearfix">
			<div class="menu_container style_10 clearfix">
			<div class="menu_container sticky clearfix">-->
			<div class="menu_container clearfix<?php echo (isset($_COOKIE['pr_menu_container']) ? ' ' . $_COOKIE['pr_menu_container'] : ''); echo (isset($_COOKIE['pr_menu_type']) ? ' ' . $_COOKIE['pr_menu_type'] : '');?>">
				<?php
				require_once('menu.php');
				?>
			</div>