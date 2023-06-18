<?php

class database
{
	var $host = "localhost";
	var $pengguna = "root";
	var $kata_kunci = "";
	var $db = array("sokasocks_db","sokasocks_db");
	var $count;

	function __construct($i)
	{
		mysql_connect($this->host, $this->pengguna, $this->kata_kunci);
		mysql_select_db($this->db[$i]);
	}

	function count_DB()
	{
		return $this->count;
	}

	function selectOne($sql)
	{
		$data = mysql_query($sql);
		$hasil = mysql_fetch_array($data);
		return $hasil;
	}

	function selectALL($sql)
	{
		$data = mysql_query($sql);
		while($d = mysql_fetch_array($data)){
			$hasil[] = $d;
		}
		return $hasil;
	}

	function IUD_db($sql)
	{
		return mysql_query($sql);
	}
}
?>