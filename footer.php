			<div class="footer_container">
				<div class="footer clearfix">
					<div class="row">
						<!--div class="column column_1_3">
							<h4 class="box_header">Endereço</h4>
							<p class="padding_top_bottom_25"></p>
							<div class="row">
								<div class="column column_1_2">
									<h5>BCM Digital</h5>
									<p>
										Rua Tal<br>
										220 Santos,<br>
										São Paulo/SP
									</p>
								</div>
								<div class="column column_1_2">
									<h5>Contato</h5>
									<p>
										Telefone: (XX) XXXX-XXXX<br>
										Email: contato@bcmdigital.com.br
									</p>
								</div>
							</div>							
						</div-->
						<div class="column column_2_3">
							<h4 class="box_header">Últimos Artigos</h4>
							<div class="horizontal_carousel_container small clearfix">
								<ul class="blog horizontal_carousel autoplay-1 scroll-1 visible-3 navigation-1 easing-easeInOutQuint duration-750">
									<?php 
										$sql_ultArtigos = "SELECT art.id, art.ds_titulo, seg.nm_segmento, art.dt_artigo FROM artigos as art JOIN segmentos as seg ON art.segmento_id = seg.id ORDER BY art.id DESC LIMIT 5";
										$ultArtigos = mysql_query($sql_ultArtigos,$conexao);
										while($ultArtigo = mysql_fetch_array($ultArtigos)){     
                                            $caminho = "admin/datafiles/artigos/".$ultArtigo['id']; 
                                            if(!is_dir($caminho)){
                                                $arquivo = "admin/datafiles/artigos/noImage.png";
                                            }else{                                                        
                                                $arquivo = PegaImagemPasta($caminho); 
                                            }
									?>
									<li class="post">
										<a href="?page=artigo&id=<?php echo $ultArtigo['id']?>" title="<?php echo $ultArtigo['ds_titulo']?>">
											<span class="icon small gallery"></span>
											<img src="<?php echo $arquivo?>" width="210" height="154" alt='img'>
										</a>
										<div class="post_content">
											<h5>
												<a href="?page=artigo&id=<?php echo $ultArtigo['id']?>" title="<?php echo $ultArtigo['ds_titulo']?>"><?php echo substr($ultArtigo['ds_titulo'], 0, 25)?></a>
											</h5>
											<ul class="post_details simple">
												<li class="category"><a href="?page=category&amp;cat=health" title="<?php echo strtoupper($ultArtigo['nm_segmento']);?>"><?php echo strtoupper($ultArtigo['nm_segmento']);?></a></li>
												<li class="date">
													<?php echo ConverteData($ultArtigo['dt_artigo']);?>
												</li>
											</ul>
										</div>
									</li>
									<?php 
										}
									?>
								</ul>
							</div>
						</div>						
						<div class="column column_1_3">
							<h4 class="box_header">Siga-nos</h4>
							<div class="clearfix">
								<ul class="social_icons dark page_margin_top clearfix">
								<li>
									<a target="_blank" title="" href="http://www.facebook.com/revistabeachclass" class="social_icon facebook">
										&nbsp;
									</a>
								</li>
								<li>
									<a target="_blank" title="" href="https://twitter.com/Beach_Class" class="social_icon twitter">
										&nbsp;
									</a>
								</li>
								<li>
									<a title="" href="http://www.instagram.com/beach_class" class="social_icon instagram">
										&nbsp;
									</a>
								</li>								
							</ul>
							</div>
						</div>						
					</div>
					<div class="row page_margin_top_section">
						<div class="column column_3_4">
							<ul class="footer_menu">
								<li>
									<h4><a href="javascript:;" title="World">AGENDA</a></h4>
								</li>
								<li>
									<h4><a href="?page=quem-somos" title="Health">QUEM SOMOS</a></h4>
								</li>
								<li>
									<h4><a href="?page=anuncie" title="Sports">ANUNCIE</a></h4>
								</li>
								<li>
									<h4><a href="?page=newletter" title="Science">NEWLETTER</a></h4>
								</li>
								<li>
									<h4><a href="?page=contato" title="Lifestyle">CONTATO</a></h4>
								</li>
							</ul>
						</div>
						<div class="column column_1_4">
							<a class="scroll_top" href="#top" title="Ir para o Topo">Topo</a>
						</div>
					</div>
					<div class="row copyright_row">
						<div class="column column_2_3">
							© Copyright <a href="http://bcmagazine.com.br" title="Beach Class" target="_blank">Beach Class</a> - Desenvolvido por: <a href="http://lemonlabs.com.br" title="Lemon Labs" target="_blank">Lemon Labs</a> 
						</div>
						<!--div class="column column_1_3">
							<ul class="footer_menu">
								<li>
									<h6><a href="?page=quem-somos" title="Quem Somos">Quem Somos</a></h6>
								</li>
								<li>
									<h6><a href="?page=contato" title="Contato">Contato</a></h6>
								</li>
							</ul>
						</div-->
					</div>
				</div>
			</div>
		</div>
		<div class="background_overlay"></div>
		<!--js-->
		<script type="text/javascript" src="js/jquery-1.11.1.min.js"></script>
		<script type="text/javascript" src="js/jquery-migrate-1.2.1.min.js"></script>
		<script type="text/javascript" src="js/jquery.ba-bbq.min.js"></script>
		<script type="text/javascript" src="js/jquery-ui-1.11.1.custom.min.js"></script>
		<script type="text/javascript" src="js/jquery.easing.1.3.js"></script>
		<script type="text/javascript" src="js/jquery.carouFredSel-6.2.1-packed.js"></script>
		<script type="text/javascript" src="js/jquery.touchSwipe.min.js"></script>
		<script type="text/javascript" src="js/jquery.transit.min.js"></script>
		<script type="text/javascript" src="js/jquery.sliderControl.js"></script>
		<script type="text/javascript" src="js/jquery.timeago.js"></script>
		<script type="text/javascript" src="js/jquery.hint.js"></script>
		<script type="text/javascript" src="js/jquery.prettyPhoto.js"></script>
		<script type="text/javascript" src="js/jquery.qtip.min.js"></script>
		<script type="text/javascript" src="js/jquery.blockUI.js"></script>
		<script type="text/javascript" src="//maps.google.com/maps/api/js?sensor=false"></script>
		<script type="text/javascript" src="js/main.js"></script>
		<script type="text/javascript" src="js/odometer.min.js"></script>
		<?php
		//require_once("style_selector/style_selector.php");
		if(isset($_COOKIE["pr_color_skin"]) && $_COOKIE["pr_color_skin"]=="high_contrast")
		{
		?>
		<div class="font_selector">
			<a href="#" class="increase" title="Increase font size"></a>
			<a href="#" class="decrease" title="Decrease font size"></a>
		</div>
		<?php
		}
		?>
	</body>
</html>