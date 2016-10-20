<nav>
<ul class="sf-menu">
	<li class="<?php echo ($_GET["page"]=="" || $_GET["page"]=="home" ? " selected" : ""); ?>">
		<a href="?page=home" title="HOME">
			HOME
		</a>
	</li>
	<li class="<?php echo ($_GET["page"]=="quem-somos" ? " selected" : ""); ?>">
            <a href="index.php?page=editorias&seg=<?php echo base64_encode("1") ?>" title="MOTORS">
			MOTORS
		</a>
	</li>
	<li class="<?php echo ($_GET["page"]=="newsletter" ? " selected" : ""); ?>">
		<a href="?page=editorias&seg=<?php echo base64_encode("2") ?>" title="SABORES">
			SABORES
		</a>
	</li>
	<li class="<?php echo ($_GET["page"]=="anuncie" ? " selected" : ""); ?>">
		<a href="?page=editorias&seg=<?php echo base64_encode("3") ?>" title="SAÚDE & BELEZA">
			SAÚDE & BELEZA
		</a>
	</li>
	<li class="<?php echo ($_GET["page"]=="agenda" ? " selected" : ""); ?>">
		<a href="?page=editorias&seg=<?php echo base64_encode("4") ?>" title="TURISMO">
			TURISMO
		</a>
	</li>
	<li class="<?php echo ($_GET["page"]=="contato" ? " selected" : ""); ?>">
		<a href="?page=editorias&seg=<?php echo base64_encode("5") ?>" title="ESTILO">
			ESTILO
		</a>
	</li>
	<li class="<?php echo ($_GET["page"]=="contato" ? " selected" : ""); ?>">
		<a href="?page=editorias&seg=<?php echo base64_encode("6") ?>" title="DECORAÇÃO">
			DECORAÇÃO
		</a>
	</li>
	<li class="<?php echo ($_GET["page"]=="contato" ? " selected" : ""); ?>">
		<a href="?page=editorias&seg=<?php echo base64_encode("7") ?>" title="BUSINESS">
			BUSINESS
		</a>
	</li>
	<li class="<?php echo ($_GET["page"]=="contato" ? " selected" : ""); ?>">
		<a href="?page=editorias&seg=<?php echo base64_encode("8") ?>" title="ARQ & CONSTRUÇÃO">
			ARQ & CONSTRUÇÃO
		</a>
	</li>
	<li class="<?php echo ($_GET["page"]=="contato" ? " selected" : ""); ?>">
		<a href="?page=editorias&seg=<?php echo base64_encode("9") ?>" title="VARIEDADES">
			VARIEDADES
		</a>
	</li>
</ul>
</nav>
<div class="mobile_menu_container">
	<a href="#" class="mobile-menu-switch">
		<span class="line"></span>
		<span class="line"></span>
		<span class="line"></span>
	</a>
	<div class="mobile-menu-divider"></div>
	<nav>
	<ul class="mobile-menu">
		<li class="submenu<?php echo ($_GET["page"]=="" || $_GET["page"]=="home" ? " selected" : ""); ?>">
			<a href="?page=home" title="HOME">
				HOME
			</a>			
		</li>
		<li class="submenu<?php echo ($_GET["page"]=="" || $_GET["page"]=="home" ? " selected" : ""); ?>">
			<a href="?page=editorias&seg=<?php echo base64_encode("1") ?>" title="MOTORS">
				MOTORS
			</a>			
		</li>
		<li class="submenu<?php echo ($_GET["page"]=="" || $_GET["page"]=="home" ? " selected" : ""); ?>">
			<a href="?page=editorias&seg=<?php echo base64_encode("2") ?>" title="SABORES">
				SABORES
			</a>			
		</li>
		<li class="submenu<?php echo ($_GET["page"]=="" || $_GET["page"]=="home" ? " selected" : ""); ?>">
			<a href="?page=editorias&seg=<?php echo base64_encode("3") ?>" title="SAÚDE & BELEZA">
				SAÚDE & BELEZA
			</a>			
		</li>
		<li class="submenu<?php echo ($_GET["page"]=="" || $_GET["page"]=="home" ? " selected" : ""); ?>">
			<a href="?page=editorias&seg=<?php echo base64_encode("4") ?>" title="TURISMO">
				TURISMO
			</a>			
		</li>
		<li class="submenu<?php echo ($_GET["page"]=="" || $_GET["page"]=="home" ? " selected" : ""); ?>">
			<a href="?page=editorias&seg=<?php echo base64_encode("5") ?>" title="ESTILO">
				ESTILO
			</a>			
		</li>
		<li class="submenu<?php echo ($_GET["page"]=="" || $_GET["page"]=="home" ? " selected" : ""); ?>">
			<a href="?page=editorias&seg=<?php echo base64_encode("6") ?>" title="DECORAÇÃO">
				DECORAÇÃO
			</a>			
		</li>
		<li class="submenu<?php echo ($_GET["page"]=="" || $_GET["page"]=="home" ? " selected" : ""); ?>">
			<a href="?page=editorias&seg=<?php echo base64_encode("7") ?>" title="BUSINESS">
				BUSINESS
			</a>			
		</li>
		<li class="submenu<?php echo ($_GET["page"]=="" || $_GET["page"]=="home" ? " selected" : ""); ?>">
			<a href="?page=editorias&seg=<?php echo base64_encode("8") ?>" title="ARQ & CONSTRUÇÃO">
				ARQ & CONSTRUÇÃO
			</a>			
		</li>
		<li class="submenu<?php echo ($_GET["page"]=="" || $_GET["page"]=="home" ? " selected" : ""); ?>">
			<a href="?page=editorias&seg=<?php echo base64_encode("9") ?>" title="VARIEDADES">
				VARIEDADES
			</a>			
		</li>
	</ul>
	</nav>
</div>