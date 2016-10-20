<?php	
	function verificaNivelDeAcesso($cargo, $meunivel, $co){					
		
    	if(
    		retornoQueryUmaField( "SELECT nivel FROM cargo_funcionario WHERE id=".$cargo." LIMIT 1;", $co, "nivel") 
    		< 
    		retornoQueryUmaField( "SELECT nivel FROM cargo_funcionario WHERE id=".$meunivel." LIMIT 1;", $co, "nivel")
    	)		
			return false;
		else
			return true;
	}	
?>