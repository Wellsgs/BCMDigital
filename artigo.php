<?php
    if(isset($_GET['id'])){
        
//        $sql =  "SELECT * FROM artigos AS art "
//               ."JOIN autores AS aut ON art.autor_id = aut.id "
//               ."JOIN segmentos as seg on art.segmento_id = seg.id"
//               ."WHERE art.id = ".$_GET['id']; 
//        
        $sql =  "SELECT * FROM artigos as art "
               ."JOIN autores as aut on art.autor_id = aut.id "
               ."JOIN segmentos as seg on art.segmento_id = seg.id "
               ."Where art.id = ".$_GET['id'];
        
        $artigo = mysql_fetch_array(mysql_query($sql, $conexao));
                
        $sql_ultArtigos = "SELECT art.id, art.ds_titulo, seg.nm_segmento, art.dt_artigo "
                        . "FROM artigos as art "
                        . "JOIN segmentos as seg ON art.segmento_id = seg.id "
                        . "WHERE seg.id = ".$artigo['segmento_id']." "
                        . "ORDER BY art.id DESC LIMIT 5";
        
        $ultArtigos = mysql_query($sql_ultArtigos, $conexao);   
                
    }

?>
<div class="page">
        <div class="page_layout page_margin_top clearfix">
                <div class="post single column column_1_1">
                    <h1 class="post_title" >
                            <?php echo $artigo['ds_titulo'];?>                                                  
                    </h1>
                    <ul class="post_details clearfix">
                            <li class="detail category">Editoria: <a href="?page=category&amp;cat=health" title="<?php echo $artigo['nm_segmento'];?>"><?php echo $artigo['nm_segmento'];?></a></li>
                            <li class="detail date"> <?php echo ConverteData($artigo['dt_artigo']);?></li>
                            <li class="detail author">Por <a href="?page=autor&id=<?php echo $artigo['id'];?>" title="<?php echo $artigo['nm_autor'];?>"><?php echo $artigo['nm_autor'];?></a></li>
<!--                        <li class="detail views"><?php echo $artigo['nr_visualizacoes'];?> Views</li>
                            <li class="detail comments"><a href="#comments_list" class="scroll_to_comments" title="6 Comments">6 Comments</a></li>-->
                    </ul>
                    <?php    
                        $caminho = "admin/datafiles/artigos/".$_GET['id'].""; 
                        if(!is_dir($caminho)){
                            $arquivo = "admin/datafiles/artigos/noImage.png";
                        }else{                                                        
                            $arquivo = PegaImagemPasta($caminho); 
                        }
                    ?>
                    <a href="<?php echo $arquivo;?>" class="post_image page_margin_top prettyPhoto nounderline " title="<?php echo $artigo['ds_titulo'];?>">
                        <img src='<?php echo $arquivo;?>' width="1050" height="500" alt='<?php echo $artigo['nm_artigo'];?>'>
                        <blockquote class="column_1_1 " style="width: 1010px" >
                                    <?php echo $artigo['ds_titulo'];?>
                                    <span class="author">&#8212;&nbsp;&nbsp;Julia Slingo, ETF</span>
                            </blockquote>
                    </a>
                    <div class="sentence">
                            <span class="text">Britons are never more comfortable than when talking about the weather.</span>
                            <span class="author">John Smith, Flickr</span>
                    </div>
            </div>
		<div class="row page_margin_top">
			<div class="column column_2_3">
				<div class="row">
					<div class="post single column_2_3">
						<div class="post_content page_margin_top_section clearfix">
							<div class="content_box">
								<?php echo $artigo['ds_artigo'];?>
							</div>
							<div class="author_box animated_element">
								<div class="author">
                                                                    <?php    
                                                                        $caminho = "admin/datafiles/autores/".$artigo['autor_id']; 
                                                                        if(!is_dir($caminho)){
                                                                            $arquivo = "admin/datafiles/autores/user.jpg";
                                                                        }else{                                                        
                                                                            $arquivo = PegaImagemPasta($caminho); 
                                                                        }
                                                                    ?>
									<a title="<?php echo $artigo['nm_autor'];?>" href="?page=author" class="thumb">
                                                                            <img alt="img" src="<?php echo $arquivo;?>" width="100px" height="100px">
									</a>
									<div class="details">
										<h5><a title="<?php echo $artigo['nm_autor'];?>" href="?page=author"><?php echo $artigo['nm_autor'];?></a></h5>
										<a href="?page=autor&id=<?php echo base64_encode($artigo['autor_id']);?>" class="more highlight margin_top_15">PERFIL</a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
                            <hr class="divider page_margin_top">
                            <div class="row page_margin_top">
                                <div class="column_2_3">
                                    <div class="horizontal_carousel_container small">
					<ul class="blog horizontal_carousel autoplay-1 scroll-1 visible-3 navigation-1 easing-easeInOutQuint duration-750">
						<?php
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
                                                            <img src='<?php echo $arquivo?>' width="200" height="80" alt='img'>
							</a>
                                                    <h5><a href="?page=artigo&id=<?php echo $ultArtigo['id']?>" title="<?php echo $ultArtigo['ds_titulo']?>"><?php echo substr($ultArtigo['ds_titulo'], 0, 25)?></a></h5>
							<ul class="post_details simple"><?php echo substr($ultArtigo['ds_titulo'], 0, 10)?>
                                                            <li class="category"><a href="?page=category&amp;cat=health" title="HEALTH"><?php echo strtoupper($ultArtigo['nm_segmento'])?></a></li>
								<li class="date">
									<?php echo ConverteData($ultArtigo['dt_artigo'])?>
								</li>
							</ul>
						</li>
                                                <?php       
                                                    }
                                                
                                                ?>

					</ul>
				</div>
			</div>
		</div>
		<hr class="divider page_margin_top">
                
				<div class="row page_margin_top">
					<div class="share_box clearfix">
						<label>Compartilhar:</label>
						<ul class="social_icons clearfix">
							<li>
								<a target="_blank" title="" href="http://facebook.com/QuanticaLabs" class="social_icon facebook">
									&nbsp;
								</a>
							</li>
							<li>
								<a target="_blank" title="" href="https://twitter.com/QuanticaLabs" class="social_icon twitter">
									&nbsp;
								</a>
							</li>							
							<li>
								<a title="" href="#" class="social_icon instagram">
									&nbsp;
								</a>
							</li>							
						</ul>
					</div>
				</div>

                                <div id="fb-root"></div>
                                <script>(function(d, s, id) {
                                  var js, fjs = d.getElementsByTagName(s)[0];
                                  if (d.getElementById(id)) return;
                                  js = d.createElement(s); js.id = id;
                                  js.src = "//connect.facebook.net/pt_BR/sdk.js#xfbml=1&version=v2.7";
                                  fjs.parentNode.insertBefore(js, fjs);
                                }(document, 'script', 'facebook-jssdk'));</script>
                                <div class="fb-comments" data-href="http://localhost/bcmdigital.com.br/index.php?page=artigo" data-width="690" data-numposts="5"></div>

			</div>
                    <?php include "siderBar.php"?>
		</div>
	</div>
</div>
    
