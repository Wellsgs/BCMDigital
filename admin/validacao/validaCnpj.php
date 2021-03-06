<?php
	function validaCnpj($cnpj) {
		$cnpj = preg_replace ("@[./-]@", "", $cnpj);
		if (strlen ($cnpj) <> 14 or !is_numeric ($cnpj)){
			return 0;
		}
		$j = 5;
		$k = 6;
		$soma1 = "";
		$soma2 = "";

		for ($i = 0; $i < 13; $i++){
			$j = $j == 1 ? 9 : $j;
			$k = $k == 1 ? 9 : $k;
			$soma2 += ($cnpj{$i} * $k);
				if ($i < 12){ 
					$soma1 += ($cnpj{$i} * $j); 
				} 
			$k--;
			$j--; 
		} 

		$digito1 = $soma1 % 11 < 2 ? 0 : 11 - $soma1 % 11;
		$digito2 = $soma2 % 11 < 2 ? 0 : 11 - $soma2 % 11; 
		return (($cnpj{12} == $digito1) and ($cnpj{13} == $digito2));
	}	
?>