<?php
require_once("contact_form/config.php");
?>
<div class="page">
	<div class="page_header clearfix page_margin_top">
		<div class="page_header_left">
			<h1 class="page_title">Contato</h1>
		</div>
		<div class="page_header_right">
			<ul class="bread_crumb">
				<li>
					<a title="Home" href="?page=home">
						Home
					</a>
				</li>
				<li class="separator icon_small_arrow right_gray">
					&nbsp;
				</li>
				<li>
					Contato
				</li>
			</ul>
		</div>
	</div>
	<div class="page_layout clearfix">
		<div class="divider_block clearfix">
			<hr class="divider first">
			<hr class="divider subheader_arrow">
			<hr class="divider last">
		</div>
		<div class="row page_margin_top">
			<div class="column column_2_3">
				<div class="row">
					<div class="contact_map" id="map">
					</div>
				</div>
				<div class="row page_margin_top_section">
					<div class="column column_1_2 border_top">
						<ul class="page_margin_top">
							<li class="item_content clearfix">
								<span class="features_icon envelope animated_element animation-scale"></span>
								<div class="text">
									<h3>Postal Address</h3>
									<p>PressRoom Ltd.<br>33 Farlane Street<br>25-100 Kelior East, Australia</p>
								</div>
							</li>
						</ul>
					</div>
					<div class="column column_1_2 border_top">
						<ul class="page_margin_top">
							<li class="item_content clearfix">
								<span class="features_icon mobile animated_element animation-scale"></span>
								<div class="text">
									<h3>Phone and E-mail</h3>
									<p>Phone: 1-800-64-38<br>Fax: 1-800-64-39<br>E-mail: <a href="mailto:pressroom@mail.com" title="pressroom@mail.com">pressroom@mail.com</a></p>
								</div>
							</li>
						</ul>
					</div>
				</div>
				<div class="row page_margin_top_section">
					<h4 class="box_header">
						Drop Us a Line
					</h4>
					<p class="padding_top_30">Maecenas mauris elementum, est morbi interdum cursus at elite imperdiet libero. Proin odios dapibus integer an nulla augue pharetra cursus. Nunc convallis cras at nunc non est lobortis laoreet. Cursus at elite imperdiet libero etos: Monday-Friday: 8 am - 6 pm, Saturday: 8 am - 3 pm.</p>
					<form class="contact_form margin_top_15" id="contact_form" method="post" action="contact_form/contact_form.php">
						<fieldset class="column column_1_3">
							<div class="block">
								<input class="text_input" name="name" type="text" value="<?php echo _def_name; ?>" placeholder="<?php echo _def_name; ?>">
							</div>
						</fieldset>
						<fieldset class="column column_1_3">
							<div class="block">
								<input class="text_input" name="email" type="text" value="<?php echo _def_email; ?>" placeholder="<?php echo _def_email; ?>">
							</div>
						</fieldset>
						<fieldset class="column column_1_3">
							<div class="block">
								<input class="text_input" name="subject" type="text" value="<?php echo _def_subject; ?>" placeholder="<?php echo _def_subject; ?>">
							</div>
						</fieldset>
						<fieldset>
							<div class="block">
								<textarea name="message" placeholder="<?php echo _def_message; ?>"><?php echo _def_message; ?></textarea>
							</div>
						</fieldset>
						<fieldset>
							<input type="hidden" name="action" value="contact_form" />
							<input type="submit" name="submit" value="SEND MESSAGE" class="more active">
						</fieldset>
					</form>
				</div>
			</div>
			<div class="column column_1_3">
				<h4 class="box_header">Latest Posts</h4>
				<div class="vertical_carousel_container clearfix">
					<ul class="blog small vertical_carousel autoplay-1 scroll-1 navigation-1 easing-easeInOutQuint duration-750">
						<li class="post">
							<a href="?page=post_gallery" title="Study Linking Illnes and Salt Leaves Researchers Doubtful">
								<span class="icon small gallery"></span>
								<img src='images/samples/100x100/image_06.jpg' alt='img'>
							</a>
							<div class="post_content">
								<h5>
									<a href="?page=post_gallery" title="Study Linking Illnes and Salt Leaves Researchers Doubtful">Study Linking Illnes and Salt Leaves Researchers Doubtful</a>
								</h5>
								<ul class="post_details simple">
									<li class="category"><a href="?page=category&amp;cat=health" title="HEALTH">HEALTH</a></li>
									<li class="date">
										10:11 PM, Feb 02
									</li>
								</ul>
							</div>
						</li>
						<li class="post">
							<a href="?page=post" title="Syrian Civilians Trapped For Months Continue To Be Evacuated">
								<img src='images/samples/100x100/image_12.jpg' alt='img'>
							</a>
							<div class="post_content">
								<h5>
									<a href="?page=post" title="Syrian Civilians Trapped For Months Continue To Be Evacuated">Syrian Civilians Trapped For Months Continue To Be Evacuated</a>
								</h5>
								<ul class="post_details simple">
									<li class="category"><a href="?page=category&amp;cat=world" title="WORLD">WORLD</a></li>
									<li class="date">
										10:11 PM, Feb 02
									</li>
								</ul>
							</div>
						</li>
						<li class="post">
							<a href="?page=post_small_image" title="Built on Brotherhood, Club Lives Up to Name">
								<img src='images/samples/100x100/image_02.jpg' alt='img'>
							</a>
							<div class="post_content">
								<h5>
									<a href="?page=post_small_image" title="Built on Brotherhood, Club Lives Up to Name">Built on Brotherhood, Club Lives Up to Name</a>
								</h5>
								<ul class="post_details simple">
									<li class="category"><a href="?page=category&amp;cat=sports" title="SPORTS">SPORTS</a></li>
									<li class="date">
										10:11 PM, Feb 02
									</li>
								</ul>
							</div>
						</li>
						<li class="post">
							<a href="?page=post" title="Nuclear Fusion Closer to Becoming a Reality">
								<img src='images/samples/100x100/image_13.jpg' alt='img'>
							</a>
							<div class="post_content">
								<h5>
									<a href="?page=post" title="Nuclear Fusion Closer to Becoming a Reality">Nuclear Fusion Closer to Becoming a Reality</a>
								</h5>
								<ul class="post_details simple">
									<li class="category"><a href="?page=category&amp;cat=science" title="SCIENCE">SCIENCE</a></li>
									<li class="date">
										10:11 PM, Feb 02
									</li>
								</ul>
							</div>
						</li>
					</ul>
				</div>
				<h4 class="box_header page_margin_top_section">Top Authors</h4>
				<ul class="authors rating clearfix">
					<li class="author">
						<a class="thumb" href="?page=author" title="Debora Hilton">
							<img src='images/samples/Team_100x100/image_01.jpg' alt='img'>
							<span class="number animated_element" data-value="34"></span>
						</a>
						<div class="details">
							<h5><a href="?page=author" title="Debora Hilton">Debora Hilton</a></h5>
							<h6>EDITOR</h6>
						</div>
					</li>
					<li class="author">
						<a class="thumb" href="?page=author" title="Anna Shubina">
							<img src='images/samples/Team_100x100/image_02.jpg' alt='img'>
							<span class="number animated_element" data-value="25"></span>
						</a>
						<div class="details">
							<h5><a href="?page=author" title="Anna Shubina">Anna Shubina</a></h5>
							<h6>EDITOR</h6>
						</div>
					</li>
					<li class="author">
						<a class="thumb" href="?page=author" title="Liam Holden">
							<img src='images/samples/Team_100x100/image_03.jpg' alt='img'>
							<span class="number animated_element" data-value="9"></span>
						</a>
						<div class="details">
							<h5><a href="?page=author" title="Liam Holden">Liam Holden</a></h5>
							<h6>PUBLISHER</h6>
						</div>
					</li>
					<li class="author">
						<a class="thumb" href="?page=author" title="Heather Dale">
							<img src='images/samples/Team_100x100/image_04.jpg' alt='img'>
							<span class="number animated_element" data-value="2"></span>
						</a>
						<div class="details">
							<h5><a href="?page=author" title="Heather Dale">Heather Dale</a></h5>
							<h6>ILLUSTRATOR</h6>
						</div>
					</li>
				</ul>
			</div>
		</div>
	</div>
</div>