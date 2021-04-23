<?php

class autoNumber
{
	var $auto = 1;
	var $strKode = "";
	var $pemisah = 0;
	var $jmlNol = 0;
	
	function __construct($_strKode, $_pemisah,$_jmlNol)
	{
		$this->strKode = $_strKode;
		$this->pemisah = $_pemisah;
		$this->jmlNol = $_jmlNol;
	}

	function getId($kode){

		if (empty($kode)){
			$hasil = $this->strKode ."". $this->pemisah ."". str_pad($this->auto,$this->jmlNol,"0",STR_PAD_LEFT);
		}else{
			$this->auto = substr($kode, (strlen($this->strKode) + strlen($this->pemisah)), strlen($kode));
			$this->auto = $this->auto + 1;
			$hasil = $this->strKode ."". $this->pemisah ."". str_pad($this->auto,$this->jmlNol,"0",STR_PAD_LEFT);
		}
		
		return $hasil;
	}

	function getId_sub_klasifikasi($kode){

		if (empty($kode)){
			$hasil = $this->strKode ."". $this->pemisah ."". str_pad(($this->auto*10),$this->jmlNol,"0",STR_PAD_RIGHT);
		}else{
			$this->auto = substr($kode, 1, -1);
			$this->auto = $this->auto + 1;
			$hasil = str_pad((($this->strKode ."00")+($this->auto*10)),$this->jmlNol,"0",STR_PAD_RIGHT);
			//$hasil = $this->strKode ."". $this->pemisah ."". str_pad(($this->auto*10),$this->jmlNol,"0",STR_PAD_RIGHT);
		}
		
		return $hasil;
	}

	function getId_sub_sub_klasifikasi($kode){

		if (empty($kode)){
			$hasil =  $this->strKode + $this->auto;
		}else{
			$hasil =  $kode + $this->auto;
		}
		
		return $hasil;
	}

	function getId_akun($kode){

		if (empty($kode)){
			$hasil = $this->strKode ."". $this->pemisah ."". str_pad(($this->auto),$this->jmlNol,"0",STR_PAD_LEFT);
		}else{
			$this->auto = substr($kode, 4);
			$this->auto = $this->auto + 1;
			$hasil = $this->strKode ."". $this->pemisah ."". str_pad(($this->auto),$this->jmlNol,"0",STR_PAD_LEFT);
		}
		
		return $hasil;
	}
}
?>