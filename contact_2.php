<?php
require_once("contact_form/config.php");
?>
<div class="page">
	<div class="page_header clearfix page_margin_top">
		<div class="page_header_left">
			<h1 class="page_title">Contact Us</h1>
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
					Contact Us
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
			<div class="column column_1_2">
				<img class="responsive pr_preload" src='images/samples/510x374/image_08.jpg' alt='img'>
			</div>
			<div class="column column_1_2">
				<h1 class="about_title">We Would Love To</h1>
				<h2 class="about_subtitle">Hear From You</h2>
				<h3 class="page_margin_top">Politicians have looked weak in the face of such natural disaster, with many facing criticism from local.</h3>
				<p class="text padding_top_0 page_margin_top">Politicians have looked weak in the face of such natural disaster, with many facing criticism from local residents for doing little more than turning up as “flood tourists” at the site of disasters, incapable of helping those in crisis and only there for a photo.</p>
			</div>
		</div>
		<div class="row page_margin_top_section">
			<div class="column column_1_3">
				<div class="row">
					<h4 class="box_header">On The Map</h4>
					<p class="padding_top_30">Maecenas mauris elementum, est morbi interdum cursus at elite imperdiet libero. Proin odios nulla. Ligula etos magna.</p>
					<div class="contact_map margin_top_15" id="map">
					</div>
				</div>
			</div>
			<div class="column column_1_3">
				<div class="row">
					<h4 class="box_header">Contact Information</h4>
					<ul class="page_margin_top">
						<li class="item_content clearfix">
							<span class="features_icon envelope animated_element animation-scale"></span>
							<div class="text">
								<h3>Postal Address</h3>
								<p>PressRoom Ltd.<br>33 Farlane Street<br>25-100 Kelior East, Australia</p>
							</div>
						</li>
						<li class="item_content border_top clearfix">
							<span class="features_icon mobile animated_element animation-scale"></span>
							<div class="text">
								<h3>Phone and E-mail</h3>
								<p>Phone: 1-800-64-38<br>Fax: 1-800-64-39<br>E-mail: <a href="mailto:pressroom@mail.com" title="pressroom@mail.com">pressroom@mail.com</a></p>
							</div>
						</li>
						<li class="item_content border_top clearfix">
							<span class="features_icon clock animated_element animation-scale"></span>
							<div class="text">
								<h3>Business Hours</h3>
								<p>Monday-Friday: 8 am - 6 pm<br>Saturday: 8 am - 3 pm</p>
							</div>
						</li>
					</ul>
				</div>
			</div>
			<div class="column column_1_3">
				<div class="row">
					<h4 class="box_header">
						Drop Us a Line
					</h4>
					<p class="padding_top_30">Maecenas mauris elementum, est morbi interdum cursus at elite imperdiet libero. Proin odios dapibus integer an nulla augue.</p>
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
		</div>
	</div>
</div>