<?php
	function getNominal($rupiah)
	{
		$rupiah = str_replace("Rp ","",$rupiah);
		$rupiah = str_replace(".","",$rupiah);
	
		if ($rupiah == ""){
			$rupiah = 0;
		}

		return $rupiah;
	}

	function getMoney_double_js($rupiah)
	{
		$rupiah = str_replace(",",".",$rupiah);
	
		if ($rupiah == ""){
			$rupiah = 0;
		}

		return $rupiah;
	}

	function getMoney_double($rupiah)
	{
		$rupiah = str_replace("Rp ","",$rupiah);
		$rupiah = str_replace(".","",$rupiah);
		$rupiah = str_replace(",",".",$rupiah);
	
		if ($rupiah == ""){
			$rupiah = 0;
		}

		return $rupiah;
	}
?>