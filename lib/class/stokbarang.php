<?php

require_once ('database.php'); 

class stokbarang extends database
{
	var $number_db;
	var $id_produk;

	function __construct($_number_db, $_id_produk)
	{
		$this->number_db = $_number_db;
		$this->id_produk = $_id_produk;

		mysql_connect($this->host, $this->pengguna, $this->kata_kunci);
		mysql_select_db($this->db[$this->number_db]);
	}

	function stokawal()
	{
		$sql = "SELECT IFNULL(sum(stok_produk_web),0) as jumlahawal 
				FROM produk 
				WHERE id_produk='$this->id_produk'";
		$data = $this->selectOne($sql);

		return $data['jumlahawal'];
	}

	function po()
	{
		$sql = "SELECT IFNULL(sum(d_po.qty),0) as jumlahpo 
				FROM d_po
				WHERE d_po.id_produk='$this->id_produk'";
		$data = $this->selectOne($sql);

		return $data['jumlahpo'];
	}

	function hitungstok()
	{
		return ( $this->stokawal() - $this->po() );
	}
}
?>