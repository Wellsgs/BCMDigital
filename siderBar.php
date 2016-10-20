<?php

        $sql_maisVistos = "SELECT art.id, art.ds_titulo, seg.nm_segmento, art.dt_artigo, art.nr_visualizacoes "
                        . "FROM artigos as art "
                        . "JOIN segmentos as seg ON art.segmento_id = seg.id "                        
                        . "ORDER BY art.nr_visualizacoes DESC LIMIT 5";
        
                
        
        $maisVistos = mysql_query($sql_maisVistos, $conexao);    
        
        

?>





<div class="column column_1_3">	
    
<!--    <div>        
        <a href="click-bcmdigital.php?t=<?php echo base64_encode('ar');?>&idArtigo=<?php echo base64_encode($maisVisto['id']);?>" title="<?php echo $maisVisto['ds_titulo']?>">
            <img src='admin/datafiles/anuncios/bcmdigital.gif' width="330px" height="110px" alt='img'>
        </a> 
        <br><br>
        <a href="click-bcmdigital.php?t=<?php echo base64_encode('ar');?>&idArtigo=<?php echo base64_encode($maisVisto['id']);?>" title="<?php echo $maisVisto['ds_titulo']?>">
            <img src='admin/datafiles/anuncios/bcmdigital.gif' width="330px" height="295px" alt='img'>
        </a>        
    </div>-->
    
    <br>
    <iframe src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2Fbcmdigital%2F&tabs&width=330&height=200&small_header=true&adapt_container_width=true&hide_cover=false&show_facepile=true&appId" width="330" height="150" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true"></iframe>
    <br><br>
    
<!--    <a href="click-bcmdigital.php?t=<?php echo base64_encode('ar');?>&idArtigo=<?php echo base64_encode($maisVisto['id']);?>" title="<?php echo $maisVisto['ds_titulo']?>">
        <img src='admin/datafiles/anuncios/bcmdigital.gif' width="330px" height="110px" alt='img'>
    </a> -->
        <h4 class="box_header page_margin_top_section">top autores</h4>
        
       <ul class="authors rating clearfix">
                <li class="author">
                        <a class="thumb" href="?page=author" title="Debora Hilton">
                                <img src='images/samples/Team_100x100/image_01.jpg' alt='img'>
                                <span class="number animated_element" data-value="100"></span>
                        </a>
                        <div class="details">
                                <h5><a href="?page=author" title="Debora Hilton">Debora Hilton</a></h5>
                                <h6>EDITOR</h6>
                        </div>
                </li>
                <li class="author">
                        <a class="thumb" href="?page=author" title="Anna Shubina">
                                <img src='images/samples/Team_100x100/image_02.jpg' alt='img'>
                                <span class="number animated_element" data-value="100"></span>
                        </a>
                        <div class="details">
                                <h5><a href="?page=author" title="Anna Shubina">Anna Shubina</a></h5>
                                <h6>EDITOR</h6>
                        </div>
                </li>
                <li class="author">
                        <a class="thumb" href="?page=author" title="Liam Holden">
                                <img src='images/samples/Team_100x100/image_03.jpg' alt='img'>
                                <span class="number animated_element" data-value="100"></span>
                        </a>
                        <div class="details">
                                <h5><a href="?page=author" title="Liam Holden">Liam Holden</a></h5>
                                <h6>PUBLISHER</h6>
                        </div>
                </li>
                <li class="author">
                        <a class="thumb" href="?page=author" title="Heather Dale">
                                <img src='images/samples/Team_100x100/image_04.jpg' alt='img'>
                                <span class="number animated_element" data-value="100"></span>
                        </a>
                        <div class="details">
                                <h5><a href="?page=author" title="Heather Dale">Heather Dale</a></h5>
                                <h6>ILLUSTRATOR</h6>
                        </div>
                </li>
        </ul>-->
        <h4 class="box_header page_margin_top_section">Mais Lidos</h4>
        <div class="vertical_carousel_container clearfix ">
                <ul class="blog small vertical_carousel autoplay-1 scroll-1 navigation-1 easing-easeInOutQuint duration-750 column column_1_2">

                    <?php
                        while($maisVisto = mysql_fetch_array($maisVistos)){

                        $caminho = "admin/datafiles/artigos/".$maisVisto['id']; 
                        if(!is_dir($caminho)){
                            $arquivo = "admin/datafiles/artigos/noImage.png";
                        }else{                                                        
                            $arquivo = PegaImagemPasta($caminho); 
                        }
                    ?>     
                    <li class="post ">
                        <a href="click-bcmdigital.php?t=<?php echo base64_encode('ar');?>&idArtigo=<?php echo base64_encode($maisVisto['id']);?>" title="<?php echo $maisVisto['ds_titulo']?>"class="column_1_2" >
                            <img src='<?php echo $arquivo?>' width="100px" height="70px" alt='img'>
                        </a>
                        <div class="post_content column_1_2">
                            <h5>
                                <a href="click-bcmdigital.php?t=<?php echo base64_encode('ar');?>&idArtigo=<?php echo base64_encode($maisVisto['id']);?>" title="<?php echo $maisVisto['ds_titulo']?>"><?php echo $maisVisto['ds_titulo']?></a>
                            </h5>
                            <ul class="post_details simple">
                                <li class="category"><a href="?page=category&amp;cat=health" title="<?php echo $maisVisto['nm_segmento']?>"><?php echo $maisVisto['nm_segmento']?></a></li>
                                <li class="date">
                                        <?php echo ConverteData($maisVisto['dt_artigo'])?>
                                </li>
                            </ul>
                        </div>
                    </li>                        
                    <?php } ?>
                </ul>
            </div>
            <br><br>
            <h4 class="box_header page_margin_top_section">Categories</h4>
            <ul class="taxonomies columns clearfix page_margin_top">
                    <li>
                            <a href="?page=category&amp;cat=world" title="WORLD">WORLD</a>
                    </li>
                    <li>
                            <a href="?page=category&amp;cat=health" title="HEALTH">HEALTH</a>
                    </li>
                    <li>
                            <a href="?page=category&amp;cat=sports" title="SPORTS">SPORTS</a>
                    </li>
                    <li>
                            <a href="?page=category&amp;cat=science" title="SCIENCE">SCIENCE</a>
                    </li>
                    <li>
                            <a href="?page=category&amp;cat=lifestyle" title="LIFESTYLE">LIFESTYLE</a>
                    </li>
            </ul>
            <h4 class="box_header page_margin_top_section">Tags</h4>
            <ul class="taxonomies clearfix page_margin_top">
                    <li>
                            <a href="#" title="Business">BUSINESS</a>
                    </li>
                    <li>
                            <a href="#" title="Education">EDUCATION</a>
                    </li>
                    <li>
                            <a href="#" title="Family">FAMILY</a>
                    </li>
                    <li>
                            <a href="#" title="Film">FILM</a>
                    </li>
                    <li>
                            <a href="#" title="Food">FOOD</a>
                    </li>
                    <li>
                            <a href="#" title="Garden">GARDEN</a>
                    </li>
                    <li>
                            <a href="#" title="People">PEOPLE</a>
                    </li>
                    <li>
                            <a href="#" title="Sport">SPORT</a>
                    </li>
            </ul>
<!--                <a href="click-bcmdigital.php?t=<?php echo base64_encode('ar');?>&idArtigo=<?php echo base64_encode($maisVisto['id']);?>" title="<?php echo $maisVisto['ds_titulo']?>">
                    <img src='admin/datafiles/anuncios/bcmdigital.gif' width="330px" height="110px" alt='img'>
                </a> 
                 <a href="click-bcmdigital.php?t=<?php echo base64_encode('ar');?>&idArtigo=<?php echo base64_encode($maisVisto['id']);?>" title="<?php echo $maisVisto['ds_titulo']?>">
                    <img src='admin/datafiles/anuncios/bcmdigital.gif' width="330px" height="110px" alt='img'>
                </a> -->
            </div>
        </div>
        
</div>