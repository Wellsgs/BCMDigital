<link rel="stylesheet" type="text/css" href="style_selector/style_selector.css">
<script type="text/javascript" src="style_selector/style_selector.js"></script>
<div class="style_selector<?php echo (isset($_COOKIE['pr_style_selector']) ? ' ' . $_COOKIE['pr_style_selector'] : ' opened'); ?>">
	<div class="style_selector_icon">
		&nbsp;
	</div>
	<div class="style_selector_content">
		<h4>Style Selector</h4>
		<ul>
			<li class="style_selector_header hide_on_mobile"<?php if(isset($_COOKIE['pr_color_skin']) && $_COOKIE['pr_color_skin']=="high_contrast") echo " style='display: none;'";?>>
				<label>Header Style</label>
				<select name="header_style">
					<option value="style_1"<?php echo (!isset($_COOKIE['pr_header_style']) || $_COOKIE['pr_header_style']=="style_1" ? ' selected="selected"' : ''); ?>>Style 1</option>
					<option value="style_2"<?php echo (isset($_COOKIE['pr_header_style']) && $_COOKIE['pr_header_style']=="style_2" ? ' selected="selected"' : ''); ?>>Style 2</option>
					<option value="style_3"<?php echo (isset($_COOKIE['pr_header_style']) && $_COOKIE['pr_header_style']=="style_3" ? ' selected="selected"' : ''); ?>>Style 3</option>
					<option value="style_4"<?php echo (isset($_COOKIE['pr_header_style']) && $_COOKIE['pr_header_style']=="style_4" ? ' selected="selected"' : ''); ?>>Style 4</option>
					<option value="style_5"<?php echo (isset($_COOKIE['pr_header_style']) && $_COOKIE['pr_header_style']=="style_5" ? ' selected="selected"' : ''); ?>>Style 5</option>
					<option value="style_6"<?php echo (isset($_COOKIE['pr_header_style']) && $_COOKIE['pr_header_style']=="style_6" ? ' selected="selected"' : ''); ?>>Style 6</option>
					<option value="style_7"<?php echo (isset($_COOKIE['pr_header_style']) && $_COOKIE['pr_header_style']=="style_7" ? ' selected="selected"' : ''); ?>>Style 7</option>
					<option value="style_8"<?php echo (isset($_COOKIE['pr_header_style']) && $_COOKIE['pr_header_style']=="style_8" ? ' selected="selected"' : ''); ?>>Style 8</option>
					<option value="style_9"<?php echo (isset($_COOKIE['pr_header_style']) && $_COOKIE['pr_header_style']=="style_9" ? ' selected="selected"' : ''); ?>>Style 9</option>
					<option value="style_10"<?php echo (isset($_COOKIE['pr_header_style']) && $_COOKIE['pr_header_style']=="style_10" ? ' selected="selected"' : ''); ?>>Style 10</option>
					<option value="style_11"<?php echo (isset($_COOKIE['pr_header_style']) && $_COOKIE['pr_header_style']=="style_11" ? ' selected="selected"' : ''); ?>>Style 11</option>
					<option value="style_12"<?php echo (isset($_COOKIE['pr_header_style']) && $_COOKIE['pr_header_style']=="style_12" ? ' selected="selected"' : ''); ?>>Style 12</option>
					<option value="style_13"<?php echo (isset($_COOKIE['pr_header_style']) && $_COOKIE['pr_header_style']=="style_13" ? ' selected="selected"' : ''); ?>>Style 13</option>
					<option value="style_14"<?php echo (isset($_COOKIE['pr_header_style']) && $_COOKIE['pr_header_style']=="style_14" ? ' selected="selected"' : ''); ?>>Style 14</option>
					<option value="style_15"<?php echo (isset($_COOKIE['pr_header_style']) && $_COOKIE['pr_header_style']=="style_15" ? ' selected="selected"' : ''); ?>>Style 15</option>
					<option value="style_high_contrast"<?php echo (isset($_COOKIE['pr_header_style']) && $_COOKIE['pr_header_style']=="style_high_contrast" ? ' selected="selected"' : ''); ?>>Style high contrast</option>
				</select>
			</li>
			<li class="hide_on_mobile">
				<label>Menu Type</label>
				<select name="menu_type">
					<option value="default"<?php echo (!isset($_COOKIE['pr_menu_type']) || $_COOKIE['pr_menu_type']=="default" ? ' selected="selected"' : ''); ?>>Default</option>
					<option value="sticky"<?php echo (isset($_COOKIE['pr_menu_type']) && $_COOKIE['pr_menu_type']=="sticky" ? ' selected="selected"' : ''); ?>>Sticky</option>
				</select>
			</li>
			<li class="hide_on_mobile">
				<label>Layout Style</label>
				<select name="layout_style">
					<option value="wide"<?php echo (!isset($_COOKIE['pr_layout']) || $_COOKIE['pr_layout']=="" ? ' selected="selected"' : ''); ?>>Wide</option>
					<option value="boxed"<?php echo ($_COOKIE['pr_layout']=="boxed" ? ' selected="selected"' : ''); ?>>Boxed</option>
				</select>
			</li>
			<li>
				<label>Color Skin</label>
				<select name="color_skin">
					<option value="light"<?php echo (!isset($_COOKIE['pr_color_skin']) || $_COOKIE['pr_color_skin']=="light" ? ' selected="selected"' : ''); ?>>Light</option>
					<option value="dark"<?php echo (isset($_COOKIE['pr_color_skin']) && $_COOKIE['pr_color_skin']=="dark" ? ' selected="selected"' : ''); ?>>Dark</option>
					<option value="high_contrast"<?php echo (isset($_COOKIE['pr_color_skin']) && $_COOKIE['pr_color_skin']=="high_contrast" ? ' selected="selected"' : ''); ?>>Hight Contrast</option>
				</select>
			</li>
			<li class="clearfix hide_on_mobile">
				<label>Boxed Layout Pattern</label>
				<ul class="layout_chooser">
					<li<?php echo (isset($_COOKIE['pr_layout_style']) && $_COOKIE['pr_layout_style']=='pattern_1' ? ' class="selected"' : ''); ?>>
						<a href="#" class="pattern_1">
							<span class="tick"></span>
						</a>
					</li>
					<li<?php echo (isset($_COOKIE['pr_layout_style']) && $_COOKIE['pr_layout_style']=='pattern_2' ? ' class="selected"' : ''); ?>>
						<a href="#" class="pattern_2">
							<span class="tick"></span>
						</a>
					</li>
					<li<?php echo (isset($_COOKIE['pr_layout_style']) && $_COOKIE['pr_layout_style']=='pattern_3' ? ' class="selected"' : ''); ?>>
						<a href="#" class="pattern_3">
							<span class="tick"></span>
						</a>
					</li>
					<li<?php echo (isset($_COOKIE['pr_layout_style']) && $_COOKIE['pr_layout_style']=='pattern_4' ? ' class="selected"' : ''); ?>>
						<a href="#" class="pattern_4">
							<span class="tick"></span>
						</a>
					</li>
					<li<?php echo (isset($_COOKIE['pr_layout_style']) && $_COOKIE['pr_layout_style']=='pattern_5' ? ' class="selected"' : ''); ?>>
						<a href="#" class="pattern_5">
							<span class="tick"></span>
						</a>
					</li>
					<li class="first<?php echo (isset($_COOKIE['pr_layout_style']) && $_COOKIE['pr_layout_style']=='pattern_6' ? ' selected' : ''); ?>">
						<a href="#" class="pattern_6">
							<span class="tick"></span>
						</a>
					</li>
					<li<?php echo (isset($_COOKIE['pr_layout_style']) && $_COOKIE['pr_layout_style']=='pattern_7' ? ' class="selected"' : ''); ?>>
						<a href="#" class="pattern_7">
							<span class="tick"></span>
						</a>
					</li>
					<li<?php echo (isset($_COOKIE['pr_layout_style']) && $_COOKIE['pr_layout_style']=='pattern_8' ? ' class="selected"' : ''); ?>>
						<a href="#" class="pattern_8">
							<span class="tick"></span>
						</a>
					</li>
					<li<?php echo (isset($_COOKIE['pr_layout_style']) && $_COOKIE['pr_layout_style']=='pattern_9' ? ' class="selected"' : ''); ?>>
						<a href="#" class="pattern_9">
							<span class="tick"></span>
						</a>
					</li>
					<li<?php echo (isset($_COOKIE['pr_layout_style']) && $_COOKIE['pr_layout_style']=='pattern_10' ? ' class="selected"' : ''); ?>>
						<a href="#" class="pattern_10">
							<span class="tick"></span>
						</a>
					</li>
				</ul>
			</li>
			<li class="clearfix hide_on_mobile">
				<label>Boxed Layout Image</label>
				<ul class="layout_chooser">
					<li<?php echo (!isset($_COOKIE['pr_layout_style']) || (isset($_COOKIE['pr_layout_style']) && $_COOKIE['pr_layout_style']=='image_1') ? ' class="selected"' : ''); ?>>
						<a href="#" class="image_1">
							<span class="tick"></span>
						</a>
					</li>
					<li<?php echo (isset($_COOKIE['pr_layout_style']) && $_COOKIE['pr_layout_style']=='image_2' ? ' class="selected"' : ''); ?>>
						<a href="#" class="image_2">
							<span class="tick"></span>
						</a>
					</li>
					<li<?php echo (isset($_COOKIE['pr_layout_style']) && $_COOKIE['pr_layout_style']=='image_3' ? ' class="selected"' : ''); ?>>
						<a href="#" class="image_3">
							<span class="tick"></span>
						</a>
					</li>
					<li<?php echo (isset($_COOKIE['pr_layout_style']) && $_COOKIE['pr_layout_style']=='image_4' ? ' class="selected"' : ''); ?>>
						<a href="#" class="image_4">
							<span class="tick"></span>
						</a>
					</li>
					<li<?php echo (isset($_COOKIE['pr_layout_style']) && $_COOKIE['pr_layout_style']=='image_5' ? ' class="selected"' : ''); ?>>
						<a href="#" class="image_5">
							<span class="tick"></span>
						</a>
					</li>
					<li class="first">
						<input type="checkbox"<?php echo ((isset($_COOKIE['pr_image_overlay']) && $_COOKIE['pr_image_overlay']=='overlay') || !isset($_COOKIE['pr_image_overlay']) ? ' checked="checked"' : ''); ?> id="overlay"><label class="overlay_label" for="overlay">overlay</label>
					</li>
				</ul>
			</li>
		</ul>
	</div>
</div>
