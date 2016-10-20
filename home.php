<?php

        $sql_ultArtigo1 = "SELECT art.id as idArt, art.ds_titulo, seg.nm_segmento, seg.id as idSeg "
                        . "FROM artigos as art "
                        . "JOIN segmentos as seg ON art.segmento_id = seg.id "
                        . "ORDER BY art.id DESC LIMIT 1";
        
        $ultArtigo1 = mysql_fetch_assoc(mysql_query($sql_ultArtigo1, $conexao)); 
        
        $sql_ultArtigo2 = "SELECT art.id as idArt, art.ds_titulo, seg.nm_segmento, seg.id as idSeg "
                        . "FROM artigos as art "
                        . "JOIN segmentos as seg ON art.segmento_id = seg.id "
                        . "ORDER BY art.id DESC LIMIT 1,1";
        
        $ultArtigo2 = mysql_fetch_assoc(mysql_query($sql_ultArtigo2, $conexao)); 
        
        $sql_ultArtigo3 = "SELECT art.id as idArt, art.ds_titulo, seg.nm_segmento, seg.id as idSeg "
                        . "FROM artigos as art "
                        . "JOIN segmentos as seg ON art.segmento_id = seg.id "
                        . "ORDER BY art.id DESC LIMIT 2,1";
        
       $ultArtigo3 = mysql_fetch_assoc(mysql_query($sql_ultArtigo3, $conexao)); 
        
        $sql_ultArtigo4 = "SELECT art.id as idArt, art.ds_titulo, seg.nm_segmento, seg.id as idSeg "
                        . "FROM artigos as art "
                        . "JOIN segmentos as seg ON art.segmento_id = seg.id "
                        . "ORDER BY art.id DESC LIMIT 3,1";
        
       $ultArtigo4 = mysql_fetch_assoc(mysql_query($sql_ultArtigo4, $conexao));     
    
    
    
?>


<div class="page">
	<div class="page_layout page_margin_top clearfix">
		<div class="row">
			<div class="column column_1_1">
            			<div class="blog_grid">
					<div class="grid_view">
						<div class="row">
							<div class="column">                                                            
								<div class="post big">
                                                                    <?php    
                                                                        $caminho = "admin/datafiles/artigos/".$ultArtigo1['idArt'].""; 
                                                                        if(!is_dir($caminho)){
                                                                            $arquivo = "admin/datafiles/artigos/noImage.png";
                                                                        }else{                                                        
                                                                            $arquivo = PegaImagemPasta($caminho); 
                                                                        }
                                                                    ?>
                                                                        <a href="click-bcmdigital.php?t=<?php echo base64_encode('ar');?>&idArtigo=<?php echo base64_encode($ultArtigo1['idArt']);?>" title="<?php echo $ultArtigo1['ds_titulo']?>">
                                                                            <img src='<?php echo $arquivo?>' width="524px" height="524px" alt='img'>
                                                                        </a>
                                                                        <div class="slider_content_box">
                                                                                <ul class="post_details simple">
                                                                                        <li class="category"><a title="<?php echo $ultArtigo1['nm_segmento']?>" href="?page=editorias&seg=<?php echo base64_encode($ultArtigo1['idSeg']) ?>"><?php echo $ultArtigo1['nm_segmento']?></a></li>
                                                                                </ul>
                                                                                <h2><a href="click-bcmdigital.php?t=<?php echo base64_encode('ar');?>&idArtigo=<?php echo base64_encode($ultArtigo1['idArt']);?>" title="<?php echo $ultArtigo1['ds_titulo']?>"><?php echo $ultArtigo1['ds_titulo']?></a></h2>
                                                                        </div>
                                           
								</div>
							</div>
							<div class="column">
								<div class="row">
									<div class="post medium">
                                                                    <?php    
                                                                        $caminho = "admin/datafiles/artigos/".$ultArtigo2['idArt'].""; 
                                                                        if(!is_dir($caminho)){
                                                                            $arquivo = "admin/datafiles/artigos/noImage.png";
                                                                        }else{                                                        
                                                                            $arquivo = PegaImagemPasta($caminho); 
                                                                        }
                                                                    ?>
                                                                        <a href="click-bcmdigital.php?t=<?php echo base64_encode('ar');?>&idArtigo=<?php echo base64_encode($ultArtigo2['idArt']);?>" title="<?php echo $ultArtigo2['ds_titulo']?>">
                                                                            <img src='<?php echo $arquivo?>' width="524px" height="261px" alt='img'>
                                                                        </a>
                                                                        <div class="slider_content_box">
                                                                                <ul class="post_details simple">
                                                                                        <li class="category"><a title="<?php echo $ultArtigo2['nm_segmento']?>" href="?page=editorias&seg=<?php echo base64_encode($ultArtigo1['idSeg']) ?>"><?php echo $ultArtigo2['nm_segmento']?></a></li>
                                                                                </ul>
                                                                                <h2><a href="click-bcmdigital.php?t=<?php echo base64_encode('ar');?>&idArtigo=<?php echo base64_encode($ultArtigo2['idArt']);?>" title="<?php echo $ultArtigo2['ds_titulo']?>"><?php echo $ultArtigo2['ds_titulo']?></a></h2>
                                                                        </div>
                                           
								</div>
								</div>
								<div class="row">
									<div class="post small">
                                                                            <?php    
                                                                                $caminho = "admin/datafiles/artigos/".$ultArtigo3['idArt'].""; 
                                                                                if(!is_dir($caminho)){
                                                                                    $arquivo = "admin/datafiles/artigos/noImage.png";
                                                                                }else{                                                        
                                                                                    $arquivo = PegaImagemPasta($caminho); 
                                                                                }
                                                                            ?>
                                                                                <a href="click-bcmdigital.php?t=<?php echo base64_encode('ar');?>&idArtigo=<?php echo base64_encode($ultArtigo3['idArt']);?>" title="<?php echo $ultArtigo3['ds_titulo']?>">
                                                                                    <img src='<?php echo $arquivo?>' width="261px" height="261px" alt='img'>
                                                                                </a>
                                                                                <div class="slider_content_box">
                                                                                        <ul class="post_details simple">
                                                                                                <li class="category"><a title="<?php echo $ultArtigo3['nm_segmento']?>" href="?page=editorias&seg=<?php echo base64_encode($ultArtigo1['idSeg']) ?>"><?php echo $ultArtigo1['nm_segmento']?></a></li>
                                                                                        </ul>
                                                                                        <h2><a href="click-bcmdigital.php?t=<?php echo base64_encode('ar');?>&idArtigo=<?php echo base64_encode($ultArtigo3['idArt']);?>" title="<?php echo $ultArtigo3['ds_titulo']?>"><?php echo $ultArtigo1['ds_titulo']?></a></h2>
                                                                                </div>

                                                                        </div>
									<div class="post small">
                                                                            <?php    
                                                                                $caminho = "admin/datafiles/artigos/".$ultArtigo4['idArt'].""; 
                                                                                if(!is_dir($caminho)){
                                                                                    $arquivo = "admin/datafiles/artigos/noImage.png";
                                                                                }else{                                                        
                                                                                    $arquivo = PegaImagemPasta($caminho); 
                                                                                }
                                                                            ?>
                                                                                <a href="click-bcmdigital.php?t=<?php echo base64_encode('ar');?>&idArtigo=<?php echo base64_encode($ultArtigo4['idArt']);?>" title="<?php echo $ultArtigo4['ds_titulo']?>">
                                                                                    <img src='<?php echo $arquivo?>' width="261px" height="261px" alt='img'>
                                                                                </a>
                                                                                <div class="slider_content_box">
                                                                                        <ul class="post_details simple">
                                                                                                <li class="category"><a title="<?php echo $ultArtigo4['nm_segmento']?>" href="?page=editorias&seg=<?php echo base64_encode($ultArtigo4['idSeg']) ?>"><?php echo $ultArtigo4['nm_segmento']?></a></li>
                                                                                        </ul>
                                                                                        <h2><a href="click-bcmdigital.php?t=<?php echo base64_encode('ar');?>&idArtigo=<?php echo base64_encode($ultArtigo4['idArt']);?>" title="<?php echo $ultArtigo4['ds_titulo']?>"><?php echo $ultArtigo4['ds_titulo']?></a></h2>
                                                                                </div>

                                                                        </div>
								</div>
							</div>
						</div>
					</div>
					<div class="slider_view">
						<ul class="small_slider id-small_slider">
                                                    <?php    
                                                        $caminho = "admin/datafiles/artigos/".$ultArtigo1['idArt'].""; 
                                                        if(!is_dir($caminho)){
                                                            $arquivo = "admin/datafiles/artigos/noImage.png";
                                                        }else{                                                        
                                                            $arquivo = PegaImagemPasta($caminho); 
                                                        }
                                                    ?>	
                                                        <li class="slide">
								<a href="click-bcmdigital.php?t=<?php echo base64_encode('ar');?>&idArtigo=<?php echo base64_encode($ultArtigo1['idArt']);?>" title="<?php echo $ultArtigo1['ds_titulo']?>">
									<img src='<?php echo $arquivo?>' alt='img'>
								</a>
								<div class="slider_content_box">
									<ul class="post_details simple">
										<li class="category"><a title="<?php echo $ultArtigo1['nm_segmento']?>" href="?page=editorias&seg=<?php echo base64_encode($ultArtigo1['idSeg']) ?>"><?php echo $ultArtigo1['nm_segmento']?></a></li>
									</ul>
									<h2><a href="click-bcmdigital.php?t=<?php echo base64_encode('ar');?>&idArtigo=<?php echo base64_encode($ultArtigo1['idArt']);?>"  title="<?php echo $ultArtigo1['ds_titulo']?>"><?php echo $ultArtigo1['ds_titulo']?></a></h2>
								</div>
							</li>
                                                        <?php    
                                                        $caminho = "admin/datafiles/artigos/".$ultArtigo2['idArt'].""; 
                                                        if(!is_dir($caminho)){
                                                            $arquivo = "admin/datafiles/artigos/noImage.png";
                                                        }else{                                                        
                                                            $arquivo = PegaImagemPasta($caminho); 
                                                        }
                                                    ?>	
                                                        <li class="slide">
								<a href="click-bcmdigital.php?t=<?php echo base64_encode('ar');?>&idArtigo=<?php echo base64_encode($ultArtigo2['idArt']);?>" title="<?php echo $ultArtigo2['ds_titulo']?>">
									<img src='<?php echo $arquivo?>' alt='img'>
								</a>
								<div class="slider_content_box">
									<ul class="post_details simple">
										<li class="category"><a title="<?php echo $ultArtigo2['nm_segmento']?>" href="?page=editorias&seg=<?php echo base64_encode($ultArtigo2['idSeg']) ?>"><?php echo $ultArtigo2['nm_segmento']?></a></li>
									</ul>
									<h2><a href="click-bcmdigital.php?t=<?php echo base64_encode('ar');?>&idArtigo=<?php echo base64_encode($ultArtigo2['idArt']);?>"  title="<?php echo $ultArtigo2['ds_titulo']?>"><?php echo $ultArtigo2['ds_titulo']?></a></h2>
								</div>
							</li>
                                                        <?php    
                                                        $caminho = "admin/datafiles/artigos/".$ultArtigo3['idArt'].""; 
                                                        if(!is_dir($caminho)){
                                                            $arquivo = "admin/datafiles/artigos/noImage.png";
                                                        }else{                                                        
                                                            $arquivo = PegaImagemPasta($caminho); 
                                                        }
                                                    ?>	
                                                        <li class="slide">
								<a href="click-bcmdigital.php?t=<?php echo base64_encode('ar');?>&idArtigo=<?php echo base64_encode($ultArtigo3['idArt']);?>" title="<?php echo $ultArtigo3['ds_titulo']?>">
									<img src='<?php echo $arquivo?>' alt='img'>
								</a>
								<div class="slider_content_box">
									<ul class="post_details simple">
										<li class="category"><a title="<?php echo $ultArtigo3['nm_segmento']?>" href="?page=editorias&seg=<?php echo base64_encode($ultArtigo3['idSeg']) ?>"><?php echo $ultArtigo3['nm_segmento']?></a></li>
									</ul>
									<h2><a href="click-bcmdigital.php?t=<?php echo base64_encode('ar');?>&idArtigo=<?php echo base64_encode($ultArtigo3['idArt']);?>"  title="<?php echo $ultArtigo3['ds_titulo']?>"><?php echo $ultArtigo3['ds_titulo']?></a></h2>
								</div>
							</li>
                                                        <?php    
                                                        $caminho = "admin/datafiles/artigos/".$ultArtigo4['idArt'].""; 
                                                        if(!is_dir($caminho)){
                                                            $arquivo = "admin/datafiles/artigos/noImage.png";
                                                        }else{                                                        
                                                            $arquivo = PegaImagemPasta($caminho); 
                                                        }
                                                    ?>	
                                                        <li class="slide">
								<a href="click-bcmdigital.php?t=<?php echo base64_encode('ar');?>&idArtigo=<?php echo base64_encode($ultArtigo4['idArt']);?>" title="<?php echo $ultArtigo4['ds_titulo']?>">
									<img src='<?php echo $arquivo?>' alt='img'>
								</a>
								<div class="slider_content_box">
									<ul class="post_details simple">
										<li class="category"><a title="<?php echo $ultArtigo4['nm_segmento']?>" href="?page=editorias&seg=<?php echo base64_encode($ultArtigo4['idSeg']) ?>"><?php echo $ultArtigo4['nm_segmento']?></a></li>
									</ul>
									<h2><a href="click-bcmdigital.php?t=<?php echo base64_encode('ar');?>&idArtigo=<?php echo base64_encode($ultArtigo4['idArt']);?>"  title="<?php echo $ultArtigo4['ds_titulo']?>"><?php echo $ultArtigo4['ds_titulo']?></a></h2>
								</div>
							</li>

						</ul>
						<div id="small_slider" class='slider_posts_list_container small'>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- BANNER TARJA-->
		<?php
    		$sql_2  = mysql_query("SELECT b.id, b.ds_link FROM banner_tarja b INNER JOIN semanas s ON b.semana_id = s.id WHERE '".date("Y-m-d")."' BETWEEN date(s.dt_inicio) AND date(s.dt_fim) LIMIT 1;", $conexao);
    		if(mysql_num_rows($sql_2) > 0){
    			$linha_2 = mysql_fetch_array($sql_2);	
    			$caminho = "admin/datafiles/banner_tarja/".$linha_2['id'].""; 
            	$arquivo = PegaImagemPasta($caminho);
    	?>
		<div class="row page_margin_top">
	        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">	        	
	          	<a target="_blank" href="click-bcmdigital.php?t=<?php echo base64_encode('bt');?>&i=<?php echo base64_encode($linha_2['id']);?>&link=<?php echo base64_encode($linha_2['ds_link']);?>"><img src='<?php echo $arquivo;?>' alt='' class="img-responsive"></a>	          	
	        </div>
		</div>
		<?php }?>
		<!-- END BANNER TARJA-->		
		
		<!-- LISTA DAS EDITORIAS-->		
		<?php
			$segmento = array(
			    "Domingo" => "Variedades",
			    "Segunda-Feira" => "Business",
			    "Terça-Feira" => "Arq & Construção|Decoração",
			    "Quarta-Feira" => "Estilo",
			    "Quinta-Feira" => "Motors",
			    "Sexta-Feira" => "Saúde & Beleza|Turismo",
			    "Sábado" => "Sabores",
			);			
			
			//$dia_semana = diasemana(date("Y-m-d"));
			$sql_segmentos = mysql_query("SELECT * FROM segmentos ORDER BY nm_segmento = '".$segmento[$dia_semana]."' DESC", $conexao);

			$contador_banner_fixo = 0;
			$contador_segmenta    = 0;

			while($result = mysql_fetch_array($sql_segmentos)){ //inicio while segmentos
		?>
		<!-- END LISTA DAS EDITORIAS-->

		<!-- SECAO SEGMENTOS-->
		<div class="row page_margin_top_section">
			<div class="column column_2_3">
				<h4 class="box_header"><?php echo $result['nm_segmento']?></h4>
				<div class="row">
					<ul class="blog medium">
						<?php 
							$condicao = '';
							$cont    = 0;
							$sql_artigos = mysql_query("SELECT art.id, art.ds_titulo, seg.nm_segmento, art.dt_artigo FROM artigos as art JOIN segmentos as seg ON art.segmento_id = seg.id WHERE art.segmento_id = ".$result['id']." ORDER BY art.id DESC LIMIT 3",$conexao);
							while($result_2 = mysql_fetch_array($sql_artigos)){ //inicio while artigos
								$caminho = "admin/datafiles/artigos/".$result_2['id']; 
                                                            if(!is_dir($caminho)){
                                                                $arquivo = "admin/datafiles/artigos/noImage.png";
                                                            }else{                                                        
                                                                $arquivo = PegaImagemPasta($caminho); 
                                                            }

                                                            if ($cont == 0) {
									$condicao .= " art.id <> ".$result_2['id'];
									$cont++;
								}else{
									$condicao .= " AND art.id <> " .$result_2['id'];	
								}
						?>
						<li class="post">
							<a href="click-bcmdigital.php?t=<?php echo base64_encode('ar');?>&idArtigo=<?php echo base64_encode($result_2['id']);?>" title="<?php echo $result_2['ds_titulo']?>">
								<img src="<?php echo $arquivo?>" width="210" height="154" alt='img'>
							</a>
							<h5><a href="click-bcmdigital.php?t=<?php echo base64_encode('ar');?>&idArtigo=<?php echo base64_encode($result_2['id']);?>" title="<?php echo $result_2['ds_titulo']?>"><?php echo substr($result_2['ds_titulo'], 0, 25)?></a></h5>
							<ul class="post_details simple">
								<li class="category"><a href="javascript:;" title="<?php echo strtoupper($result_2['nm_segmento']);?>"><?php echo strtoupper($result_2['nm_segmento']);?></a></li>
								<li class="date">
									<?php echo ConverteData($result_2['dt_artigo']);?>
								</li>
							</ul>
						</li>
						<?php 
							}//fim while artigos
						?>
					</ul>
				</div>
			</div>
			<div class="column column_1_3">
				<h4 class="box_header">Destaque</h4>
				<ul class="blog medium">
					<?php 
						$sql_destaque = mysql_query("SELECT * FROM anuncios a INNER JOIN semanas s ON a.semana_id = s.id WHERE '".date("Y-m-d")."' BETWEEN date(s.dt_inicio) AND date(s.dt_fim) AND a.segmento_id = ".$result['id']." LIMIT 1", $conexao);
						if(mysql_num_rows($sql_destaque) > 0){// if se tiver anuncio no artigo
							$result_3 = mysql_fetch_array($sql_destaque);
							$caminho = "admin/datafiles/artigos/".$result_3['id']; 
                            if(!is_dir($caminho)){
                                $arquivo = "admin/datafiles/artigos/noImage.png";
                            }else{                                                        
                                $arquivo = PegaImagemPasta($caminho); 
                            }
							if ($result_3['artigo_id'] == "") {?>
								<li class="post">
									<a href="?page=artigo&id=<?php echo $result_3['id']?>" title="<?php echo $result_3['ds_titulo']?>">
										<img src="<?php echo $arquivo?>" width="210" height="154" alt='img'>
									</a>
									<h5><a href="?page=artigo&id=<?php echo $result_3['id']?>" title="<?php echo $result_3['ds_titulo']?>"><?php echo substr($result_3['ds_titulo'], 0, 25)?></a></h5>
									<ul class="post_details simple">
										<li class="category"><a href="javascript:;" title="<?php echo strtoupper($result_3['nm_segmento']);?>"><?php echo strtoupper($result_3['nm_segmento']);?></a></li>
										<li class="date">
											<?php echo ConverteData($result_3['dt_artigo']);?>
										</li>
									</ul>
								</li>
							
							<?php }else{ ?>
								<li class="post">
									<a href="?page=artigo&id=<?php echo $result_3['id']?>" title="<?php echo $result_3['ds_titulo']?>">
										<img src="<?php echo $arquivo?>" width="210" height="154" alt='img'>
									</a>
									<h5><a href="?page=artigo&id=<?php echo $result_3['id']?>" title="<?php echo $result_3['ds_titulo']?>"><?php echo substr($result_3['ds_titulo'], 0, 25)?></a></h5>
									<ul class="post_details simple">
										<li class="category"><a href="javascript:;" title="<?php echo strtoupper($result_3['nm_segmento']);?>"><?php echo strtoupper($result_3['nm_segmento']);?></a></li>
										<li class="date">
											<?php echo ConverteData($result_3['dt_artigo']);?>
										</li>
									</ul>
								</li>
							
							<?php }
														
					?>
					
					<?php 
						}else{// if se nao tiver anuncio no artigo
							$sql_artigo = mysql_query("SELECT art.id, art.ds_titulo, seg.nm_segmento, art.dt_artigo FROM artigos as art JOIN segmentos as seg ON art.segmento_id = seg.id WHERE art.segmento_id = ".$result['id']." AND (".$condicao.") ORDER BY art.id DESC LIMIT 1", $conexao);
							if(mysql_num_rows($sql_artigo) > 0){// if se nao tiver anuncio no artigo mostra o artigo apenas
								$result_4 = mysql_fetch_array($sql_artigo);
								$caminho = "admin/datafiles/artigos/".$result_4['id']; 
                                if(!is_dir($caminho)){
                                    $arquivo = "admin/datafiles/artigos/noImage.png";
                                }else{                                                        
                                    $arquivo = PegaImagemPasta($caminho); 
                                }

					?>
					<li class="post">
						<a href="?page=artigo&id=<?php echo $result_4['id']?>" title="<?php echo $result_4['ds_titulo']?>">
							<img src="<?php echo $arquivo?>" width="210" height="154" alt='img'>
						</a>
						<h5><a href="?page=artigo&id=<?php echo $result_4['id']?>" title="<?php echo $result_4['ds_titulo']?>"><?php echo substr($result_4['ds_titulo'], 0, 25)?></a></h5>
						<ul class="post_details simple">
							<li class="category"><a href="javascript:;" title="<?php echo strtoupper($result_4['nm_segmento']);?>"><?php echo strtoupper($result_4['nm_segmento']);?></a></li>
							<li class="date">
								<?php echo ConverteData($result_4['dt_artigo']);?>
							</li>
						</ul>
					</li>
					<?php
							}//fim if se nao tiver anuncio no artigo mostra o artigo  
						}
					?>
				</ul>				
			</div>
		</div>
		<!-- END SECAO MOTORS-->		
		

		<!-- BANNER FIXO-->
		<?php
			if ($contador_banner_fixo == 0 && $contador_segmenta == 4) { //inicio if contador_banner_fixo
					
	    		$sql_3  = mysql_query("SELECT b.id, b.ds_link FROM banner_fixo b INNER JOIN semanas s ON b.semana_id = s.id WHERE '".date("Y-m-d")."' BETWEEN date(s.dt_inicio) AND date(s.dt_fim) LIMIT 1;", $conexao);
	    		if(mysql_num_rows($sql_3) > 0){
	    			$linha_3 = mysql_fetch_array($sql_3);	
	    			$caminho = "admin/datafiles/banner_fixo/".$linha_3['id'].""; 
	            	$arquivo = PegaImagemPasta($caminho);
            
    	?>
		<div class="row page_margin_top">			
          	<a target="_blank" href="click-bcmdigital.php?t=<?php echo base64_encode('bf');?>&i=<?php echo base64_encode($linha_3['id']);?>&link=<?php echo base64_encode($linha_3['ds_link']);?>">
        	<!--parallax 2 -->
			<section class="text-center" style="background: url(<?php echo $arquivo;?>) no-repeat bottom center fixed; color:#fff; background-size:cover;">
			     <!--h1 class="">Banner Fixo</h1-->
			    <p class="lead"></p>
			</section>
			</a>
			<!--/parallax 2-->
		</div>
		<?php 
				}
				$contador_banner_fixo++;
			}//fim if contador_banner_fixo	
		?>
		<!-- END BANNER FIXO-->		

		<?php
				$contador_segmenta++;
			}//fim while segmentos
		?>
		
	</div>
</div>