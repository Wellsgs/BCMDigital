<?php
    
    //Pega dados do autor
    $codigo_autor = base64_decode($_GET['id']);
    $sqlAutor = "SELECT * FROM autores WHERE id = ".$codigo_autor.";";    
    $resp = mysql_query($sqlAutor, $conexao);
    $autor = mysql_fetch_array($resp);
    
    //Pega foto do autor
    $caminho = "admin/datafiles/autores/".$codigo_autor; 
    $foto = PegaImagemPasta($caminho);
    
    //Pega Redes sociais do autor
    $redes = mysql_query(   "SELECT  rsa.id_rede_social, rsa.ds_link, rs.nm_rede_social ". 
                            "FROM rede_social_autor as rsa ".
                            "JOIN redes_sociais AS rs on rs.id = rsa.id_rede_social ".
                            "WHERE id_autor =".$codigo_autor.";", $conexao);
       
    $resp = mysql_query($sqlAutor, $conexao);
    $autor = mysql_fetch_array($resp);
    

?>

<div class="page">
	<div class="page_header clearfix page_margin_top">
		<div class="page_header_left">
			<h1 class="page_title"><?php echo $autor['nm_autor']?></h1>
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
					<a title="Authors" href="?page=authors">
						Authors
					</a>
				</li>
				<li class="separator icon_small_arrow right_gray">
					&nbsp;
				</li>
				<li>
					Heather Dale
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
					<ul class="authors_list rating">
						<li class="author clearfix">
							<div class="avatar_block">
                                                            <a href="<?php echo $foto?>" class="prettyPhoto" title="<?php echo $autor['nm_autor']?>">
                                                                <img src='<?php echo $foto?>' alt='<?php echo $autor['nm_autor']?>' >
								</a>
								<div class="details clearfix">
									<ul class="columns">
										<li class="column">
											<span class="number animated_element" data-value="34"></span>
											<h5>Artigos</h5>
										</li>
										<li class="column">
											<span class="number animated_element" data-value="24 231"></span>
											<h5>Views</h5>
										</li>
									</ul>
								</div>
							</div>
							<div class="content">
								<ul class="social_icons clearfix">
                                                                    <?php 
                                                                        $sql = "Select * FROM rede_social_autor as rsa ".
                                                                                "JOIN redes_sociais AS rs on rs.id = rsa.id_rede_social ".
                                                                                "WHERE id_autor = ".$codigo_autor;                                    
                                                                         $redes = mysql_query($sql, $conexao);
                                                                         while($rede = mysql_fetch_array($redes)){
                                                                             if($rede['nm_rede_social'] == 'Facebook'){                                                                          
                                                                                 echo   "<li>".
                                                                                            "<a target='_blank' title='Facebook' href=".$rede['ds_link']." class='social_icon facebook'>".
                                                                                                " &nbsp;".
                                                                                            "</a>".
                                                                                        "</li>";
                                                                             }
                                                                              if($rede['nm_rede_social'] == 'Twitter'){                                                                          
                                                                                 echo   "<li>".
                                                                                            "<a target='_blank' title='Twitter' href=".$rede['ds_link']." class='social_icon twitter'>".
                                                                                                " &nbsp;".
                                                                                            "</a>".
                                                                                        "</li>";
                                                                             }
                                                                              if($rede['nm_rede_social'] == 'Instagram'){                                                                          
                                                                                 echo   "<li>".
                                                                                            "<a target='_blank' title='Instagram' href=".$rede['ds_link']." class='social_icon instagram'>".
                                                                                                " &nbsp;".
                                                                                            "</a>".
                                                                                        "</li>";
                                                                             }
                                                                             
                                                                         }

                                                                     ?> 
								</ul>
								<h6>EDITOR</h6>
								<h2><?php echo $autor['nm_autor']?></h2>
								<p><?php echo $autor['ds_sobre']?></p>
								<blockquote class="simple">
									<?php echo $autor['ds_frase']?>
									<span class="author">&#8212;&nbsp;&nbsp;<?php echo $autor['ds_frase_autor']?></span>
								</blockquote>
							</div>
						</li>
					</ul>
					<h4 class="box_header page_margin_top_section">Posts By Deborah Hilton (34)</h4>
					<div class="row">
						<ul class="blog column column_1_2">
							<li class="post">
								<a href="?page=post" title="Nuclear Fusion Closer to Becoming a Reality">
									<img src='images/samples/330x242/image_01.jpg' alt='img'>
								</a>
								<h2 class="with_number">
									<a href="?page=post" title="Nuclear Fusion Closer to Becoming a Reality">Nuclear Fusion Closer to Becoming a Reality</a>
									<a class="comments_number" href="?page=post#comments_list" title="2 comments">2<span class="arrow_comments"></span></a>
								</h2>
								<ul class="post_details">
									<li class="category"><a href="?page=category&amp;cat=world" title="WORLD">WORLD</a></li>
									<li class="date">
										10:11 PM, Feb 02
									</li>
								</ul>
								<p>Maecenas mauris elementum, est morbi interdum cursus at elite imperdiet libero. Proin odios dapibus integer an nulla augue pharetra cursus.</p>
								<a class="read_more" href="?page=post" title="Read more"><span class="arrow"></span><span>READ MORE</span></a>
							</li>
							<li class="post">
								<a href="?page=post_small_image" title="High Altitudes May Aid Weight Control">
									<img src='images/samples/330x242/image_02.jpg' alt='img'>
								</a>
								<h2 class="with_number">
									<a href="?page=post_small_image" title="High Altitudes May Aid Weight Control">High Altitudes May Aid Weight Control</a>
									<a class="comments_number" href="?page=post_small_image#comments_list" title="2 comments">2<span class="arrow_comments"></span></a>
								</h2>
								<ul class="post_details">
									<li class="category"><a href="?page=category&amp;cat=health" title="HEALTH">HEALTH</a></li>
									<li class="date">
										10:11 PM, Feb 02
									</li>
								</ul>
								<p>Maecenas mauris elementum, est morbi interdum cursus at elite imperdiet libero. Proin odios dapibus integer an nulla augue pharetra cursus.</p>
								<a class="read_more" href="?page=post_small_image" title="Read more"><span class="arrow"></span><span>READ MORE</span></a>
							</li>
						</ul>
						<ul class="blog column column_1_2">
							<li class="post">
								<a href="?page=post_quote" title="Built on Brotherhood, Club Lives Up to Name">
									<img src='images/samples/330x242/image_04.jpg' alt='img'>
								</a>
								<h2 class="with_number">
									<a href="?page=post_quote" title="Built on Brotherhood, Club Lives Up to Name">Built on Brotherhood, Club Lives Up to Name</a>
									<a class="comments_number" href="?page=post_quote#comments_list" title="2 comments">2<span class="arrow_comments"></span></a>
								</h2>
								<ul class="post_details">
									<li class="category"><a href="?page=category&amp;cat=science" title="SCIENCE">SCIENCE</a></li>
									<li class="date">
										10:11 PM, Feb 02
									</li>
								</ul>
								<p>Maecenas mauris elementum, est morbi interdum cursus at elite imperdiet libero. Proin odios dapibus integer an nulla augue pharetra cursus.</p>
								<a class="read_more" href="?page=post_quote" title="Read more"><span class="arrow"></span><span>READ MORE</span></a>
							</li>
							<li class="post">
								<a href="?page=post_video" title="Struggling Nuremberg Sack Coach Verbeek">
									<span class="icon video"></span>
									<img src='images/samples/330x242/image_03.jpg' alt='img'>
								</a>
								<h2 class="with_number">
									<a href="?page=post_video" title="Struggling Nuremberg Sack Coach Verbeek">Struggling Nuremberg Sack Coach Verbeek</a>
									<a class="comments_number" href="?page=post_video#comments_list" title="2 comments">2<span class="arrow_comments"></span></a>
								</h2>
								<ul class="post_details">
									<li class="category"><a href="?page=category&amp;cat=sports" title="SPORTS">SPORTS</a></li>
									<li class="date">
										10:11 PM, Feb 02
									</li>
								</ul>
								<p>Maecenas mauris elementum, est morbi interdum cursus at elite imperdiet libero. Proin odios dapibus integer an nulla augue pharetra cursus.</p>
								<a class="read_more" href="?page=post_video" title="Read more"><span class="arrow"></span><span>READ MORE</span></a>
							</li>
						</ul>
					</div>
					<ul class="pagination clearfix page_margin_top_section">
						<li class="left">
							<a href="#" title="">&nbsp;</a>
						</li>
						<li class="selected">
							<a href="#" title="">
								1
							</a>
						</li>
						<li>
							<a href="#" title="">
								2
							</a>
						</li>
						<li>
							<a href="#" title="">
								3
							</a>
						</li>
						<li class="right">
							<a href="#" title="">&nbsp;</a>
						</li>
					</ul>
				</div>
			</div>
                        <?php include 'siderBar.php';?>
<!--			<div class="column column_1_3">
				<div class="tabs no_scroll clearfix">
					<ul class="tabs_navigation clearfix">
						<li>
							<a href="#sidebar-most-read" title="Most Read">
								Most Read
							</a>
							<span></span>
						</li>
						<li>
							<a href="#sidebar-most-commented" title="Commented">
								Commented
							</a>
							<span></span>
						</li>
					</ul>
                                    
                                    
                                    
					<div id="sidebar-most-read">
						<ul class="blog rating page_margin_top clearfix">
							<li class="post">
								<a href="?page=post_small_image" title="Nuclear Fusion Closer to Becoming a Reality">
									<img src='images/samples/510x187/image_12.jpg' alt='img'>
								</a>
								<div class="post_content">
									<span class="number animated_element" data-value="6 257"></span>
									<h5><a href="?page=post_small_image" title="New Painkiller Rekindles Addiction Concerns">New Painkiller Rekindles Addiction Concerns</a></h5>
									<ul class="post_details simple">
										<li class="category"><a href="?page=category&amp;cat=health" title="HEALTH">HEALTH</a></li>
									</ul>
								</div>
							</li>
							<li class="post">
								<div class="post_content">
									<span class="number animated_element" data-value="5 062"></span>
									<h5><a href="?page=post_small_image" title="New Painkiller Rekindles Addiction Concerns">New Painkiller Rekindles Addiction Concerns</a></h5>
									<ul class="post_details simple">
										<li class="category"><a href="?page=category&amp;cat=world" title="WORLD">WORLD</a></li>
									</ul>
								</div>
							</li>
							<li class="post">
								<div class="post_content">
									<span class="number animated_element" data-value="4 778"></span>
									<h5><a href="?page=post" title="Seeking the Right Chemistry, Drug Makers Hunt for Mergers">Seeking the Right Chemistry, Drug Makers Hunt for Mergers</a></h5>
									<ul class="post_details simple">
										<li class="category"><a href="?page=category&amp;cat=sports" title="SPORTS">SPORTS</a></li>
									</ul>
								</div>
							</li>
							<li class="post">
								<div class="post_content">
									<span class="number animated_element" data-value="754"></span>
									<h5><a href="?page=post" title="Study Linking Illnes and Salt Leaves Researchers Doubtful">Study Linking Illnes and Salt Leaves Researchers Doubtful</a></h5>
									<ul class="post_details simple">
										<li class="category"><a href="?page=category&amp;cat=science" title="SCIENCE">SCIENCE</a></li>
									</ul>
								</div>
							</li>
							<li class="post">
								<div class="post_content">
									<span class="number animated_element" data-value="52"></span>
									<h5><a href="?page=post" title="Syrian Civilians Trapped for Months Continue to be Evacuated">Syrian Civilians Trapped for Months Continue to be Evacuated</a></h5>
									<ul class="post_details simple">
										<li class="category"><a href="?page=category&amp;cat=science" title="SCIENCE">SCIENCE</a></li>
									</ul>
								</div>
							</li>
						</ul>
						<a class="more page_margin_top" href="#">SHOW MORE</a>
					</div>
					<div id="sidebar-most-commented">
						<ul class="blog rating page_margin_top clearfix">
							<li class="post">
								<a href="?page=post" title="Nuclear Fusion Closer to Becoming a Reality">
									<img src='images/samples/510x187/image_02.jpg' alt='img'>
								</a>
								<div class="post_content">
									<span class="number animated_element" data-value="70"></span>
									<h5><a href="?page=post" title="New Painkiller Rekindles Addiction Concerns">New Painkiller Rekindles Addiction Concerns</a></h5>
									<ul class="post_details simple">
										<li class="category"><a href="?page=category&amp;cat=health" title="HEALTH">HEALTH</a></li>
									</ul>
								</div>
							</li>
							<li class="post">
								<div class="post_content">
									<span class="number animated_element" data-value="62"></span>
									<h5><a href="?page=post" title="New Painkiller Rekindles Addiction Concerns">New Painkiller Rekindles Addiction Concerns</a></h5>
									<ul class="post_details simple">
										<li class="category"><a href="?page=category&amp;cat=world" title="WORLD">WORLD</a></li>
									</ul>
								</div>
							</li>
							<li class="post">
								<div class="post_content">
									<span class="number animated_element" data-value="30"></span>
									<h5><a href="?page=post_quote_2" title="Seeking the Right Chemistry, Drug Makers Hunt for Mergers">Seeking the Right Chemistry, Drug Makers Hunt for Mergers</a></h5>
									<ul class="post_details simple">
										<li class="category"><a href="?page=category&amp;cat=sports" title="SPORTS">SPORTS</a></li>
									</ul>
								</div>
							</li>
							<li class="post">
								<div class="post_content">
									<span class="number animated_element" data-value="25"></span>
									<h5><a href="?page=post" title="Study Linking Illnes and Salt Leaves Researchers Doubtful">Study Linking Illnes and Salt Leaves Researchers Doubtful</a></h5>
									<ul class="post_details simple">
										<li class="category"><a href="?page=category&amp;cat=science" title="SCIENCE">SCIENCE</a></li>
									</ul>
								</div>
							</li>
							<li class="post">
								<div class="post_content">
									<span class="number animated_element" data-value="4"></span>
									<h5><a href="?page=post" title="Syrian Civilians Trapped for Months Continue to be Evacuated">Syrian Civilians Trapped for Months Continue to be Evacuated</a></h5>
									<ul class="post_details simple">
										<li class="category"><a href="?page=category&amp;cat=science" title="SCIENCE">SCIENCE</a></li>
									</ul>
								</div>
							</li>
						</ul>
						<a class="more page_margin_top" href="#">SHOW MORE</a>
					</div>
				</div>
				<h4 class="box_header page_margin_top_section">Latest Posts</h4>
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
							<a href="?page=post_small_image" title="Syrian Civilians Trapped For Months Continue To Be Evacuated">
								<img src='images/samples/100x100/image_12.jpg' alt='img'>
							</a>
							<div class="post_content">
								<h5>
									<a href="?page=post_small_image" title="Syrian Civilians Trapped For Months Continue To Be Evacuated">Syrian Civilians Trapped For Months Continue To Be Evacuated</a>
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
							<a href="?page=post" title="Built on Brotherhood, Club Lives Up to Name">
								<img src='images/samples/100x100/image_02.jpg' alt='img'>
							</a>
							<div class="post_content">
								<h5>
									<a href="?page=post" title="Built on Brotherhood, Club Lives Up to Name">Built on Brotherhood, Club Lives Up to Name</a>
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
			</div>-->
		</div>
	</div>
</div>