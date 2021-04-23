<?php

class date
{
	var $bulan = array("Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember");
	var $hari = array("Minggu","Senin","Selasa","Rabu","Kamis","Jumat","Sabtu");
	
	
	function __construct()
	{

	}

	function getALL()
	{
		return $this->hari;
	}

	function getHari($id)
	{
		return $this->hari[$id];
	}

}
?>