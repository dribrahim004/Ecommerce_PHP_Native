<?php

error_reporting (0);

include('lib/class/database.php');



$module=$_GET['module'];

$act=$_GET['act'];



//Register -----------------------------------------------------------------------------------------------------------------------------------

if ($module=='register' AND $act=='add'){

	include('lib/class/autoNumber.php');

 	

	$email = $_POST['email'];

	$kata_kunci = $_POST['password'];

	$password_again = $_POST['password_again'];

	$nama_lengkap = $_POST['nama_lengkap'];
	
	$nomor_tlp = trim($_POST['nomor_tlp']);

	session_start();



	if($_SESSION['code']==$_POST['captcha']){



		if (!empty($email) AND !empty($kata_kunci) AND !empty($nama_lengkap) AND ($kata_kunci == $password_again) AND (!empty($nomor_tlp) AND is_numeric($nomor_tlp))  ){

			

			$db = new database(0);

			$sql = "SELECT * FROM member WHERE email='$email'";

			$dataP = $db->selectOne($sql);



			if ($dataP['email'] == ""){



				$auto_number = new autoNumber("MB". date("ym"),"",4);

				$db = new database(0);

				$sql = "SELECT * FROM member 

						WHERE SUBSTRING(id_member,1,6) = 'MB". date("ym") ."'

						ORDER BY id_member DESC";

				$data = $db->selectOne($sql);



				$id_member = $auto_number->getId($data['id_member']);



				if ($id_member != ""){



					$sql = "INSERT INTO member (id_member, tgl_input, email, kata_kunci, status, nama_lengkap, nomor_tlp)

													VALUES

												 ('". $id_member . "',now(),'". $email . "','". md5($kata_kunci) ."','Verifikasi','". $nama_lengkap ."','". $nomor_tlp ."')";

					//echo $sql;

					if ($db->IUD_db($sql)){

		

						$id = md5($id_member);
						
						$message = "Silahkan klik link di bawah ini untuk memverifikasi account sokasocks.com ada di http://sokasocks.com/index.php?page=verifikasi&id=$id terima kasih sudah membuat acoount di sokasocks.com";
						
						$message = "
                            <!doctype html>
                            <html xmlns='http://www.w3.org/1999/xhtml'>
                             <head>
                              <meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />
                              <meta name='viewport' content='initial-scale=1.0' />
                              <meta name='format-detection' content='telephone=no' />
                              <title></title>
                              <style type='text/css'>
                             	body {
                            		width: 100%;
                            		margin: 0;
                            		padding: 0;
                            		-webkit-font-smoothing: antialiased;
                            	}
                            	@media only screen and (max-width: 600px) {
                            		table[class='table-row'] {
                            			float: none !important;
                            			width: 98% !important;
                            			padding-left: 20px !important;
                            			padding-right: 20px !important;
                            		}
                            		table[class='table-row-fixed'] {
                            			float: none !important;
                            			width: 98% !important;
                            		}
                            		table[class='table-col'], table[class='table-col-border'] {
                            			float: none !important;
                            			width: 100% !important;
                            			padding-left: 0 !important;
                            			padding-right: 0 !important;
                            			table-layout: fixed;
                            		}
                            		td[class='table-col-td'] {
                            			width: 100% !important;
                            		}
                            		table[class='table-col-border'] + table[class='table-col-border'] {
                            			padding-top: 12px;
                            			margin-top: 12px;
                            			border-top: 1px solid #E8E8E8;
                            		}
                            		table[class='table-col'] + table[class='table-col'] {
                            			margin-top: 15px;
                            		}
                            		td[class='table-row-td'] {
                            			padding-left: 0 !important;
                            			padding-right: 0 !important;
                            		}
                            		table[class='navbar-row'] , td[class='navbar-row-td'] {
                            			width: 100% !important;
                            		}
                            		img {
                            			max-width: 100% !important;
                            			display: inline !important;
                            		}
                            		img[class='pull-right'] {
                            			float: right;
                            			margin-left: 11px;
                                        max-width: 125px !important;
                            			padding-bottom: 0 !important;
                            		}
                            		img[class='pull-left'] {
                            			float: left;
                            			margin-right: 11px;
                            			max-width: 125px !important;
                            			padding-bottom: 0 !important;
                            		}
                            		table[class='table-space'], table[class='header-row'] {
                            			float: none !important;
                            			width: 98% !important;
                            		}
                            		td[class='header-row-td'] {
                            			width: 100% !important;
                            		}
                            	}
                            	@media only screen and (max-width: 480px) {
                            		table[class='table-row'] {
                            			padding-left: 16px !important;
                            			padding-right: 16px !important;
                            		}
                            	}
                            	@media only screen and (max-width: 320px) {
                            		table[class='table-row'] {
                            			padding-left: 12px !important;
                            			padding-right: 12px !important;
                            		}
                            	}
                            	@media only screen and (max-width: 458px) {
                            		td[class='table-td-wrap'] {
                            			width: 100% !important;
                            		}
                            	}
                              </style>
                             </head>
                             <body style='font-family: Arial, sans-serif; font-size:13px; color: #444444; min-height: 200px;' bgcolor='#E4E6E9' leftmargin='0' topmargin='0' marginheight='0' marginwidth='0'>
                             <table width='100%' height='100%' bgcolor='#E4E6E9' cellspacing='0' cellpadding='0' border='0'>
                             <tr><td width='100%' align='center' valign='top' bgcolor='#E4E6E9' style='background-color:#E4E6E9; min-height: 200px;'>
                            <table><tr><td class='table-td-wrap' align='center' width='458'><table class='table-space' height='18' style='height: 18px; font-size: 0px; line-height: 0; width: 450px; background-color: #e4e6e9;' width='450' bgcolor='#E4E6E9' cellspacing='0' cellpadding='0' border='0'><tbody><tr><td class='table-space-td' valign='middle' height='18' style='height: 18px; width: 450px; background-color: #e4e6e9;' width='450' bgcolor='#E4E6E9' align='left'>&nbsp;</td></tr></tbody></table>
                            <table class='table-space' height='8' style='height: 8px; font-size: 0px; line-height: 0; width: 450px; background-color: #ffffff;' width='450' bgcolor='#FFFFFF' cellspacing='0' cellpadding='0' border='0'><tbody><tr><td class='table-space-td' valign='middle' height='8' style='height: 8px; width: 450px; background-color: #ffffff;' width='450' bgcolor='#FFFFFF' align='left'>&nbsp;</td></tr></tbody></table>
                            
                            <table class='table-row' width='450' bgcolor='#FFFFFF' style='table-layout: fixed; background-color: #ffffff;' cellspacing='0' cellpadding='0' border='0'><tbody><tr><td class='table-row-td' style='font-family: Arial, sans-serif; line-height: 19px; color: #444444; font-size: 13px; font-weight: normal; padding-left: 36px; padding-right: 36px;' valign='top' align='left'>
                              <table class='table-col' align='left' width='378' cellspacing='0' cellpadding='0' border='0' style='table-layout: fixed;'><tbody><tr><td class='table-col-td' width='378' style='font-family: Arial, sans-serif; line-height: 19px; color: #444444; font-size: 13px; font-weight: normal; width: 378px;' valign='top' align='left'>
                                <table class='header-row' width='378' cellspacing='0' cellpadding='0' border='0' style='table-layout: fixed;'><tbody><tr><td class='header-row-td' width='378' style='font-family: Arial, sans-serif; font-weight: normal; line-height: 19px; color: #478fca; margin: 0px; font-size: 18px; padding-bottom: 10px; padding-top: 15px;' valign='top' align='left'>Terima Kasih Sudah Mendaftar ke Sokasocks.com</td></tr></tbody></table>
                                <div style='font-family: Arial, sans-serif; line-height: 20px; color: #444444; font-size: 13px;'>
                                  Silahkan klik link di bawah ini untuk memverifikasi account
                                </div>
                              </td></tr></tbody></table>
                            </td></tr></tbody></table>
                                
                            <table class='table-space' height='12' style='height: 12px; font-size: 0px; line-height: 0; width: 450px; background-color: #ffffff;' width='450' bgcolor='#FFFFFF' cellspacing='0' cellpadding='0' border='0'><tbody><tr><td class='table-space-td' valign='middle' height='12' style='height: 12px; width: 450px; background-color: #ffffff;' width='450' bgcolor='#FFFFFF' align='left'>&nbsp;</td></tr></tbody></table>
                            <table class='table-space' height='12' style='height: 12px; font-size: 0px; line-height: 0; width: 450px; background-color: #ffffff;' width='450' bgcolor='#FFFFFF' cellspacing='0' cellpadding='0' border='0'><tbody><tr><td class='table-space-td' valign='middle' height='12' style='height: 12px; width: 450px; padding-left: 16px; padding-right: 16px; background-color: #ffffff;' width='450' bgcolor='#FFFFFF' align='center'>&nbsp;<table bgcolor='#E8E8E8' height='0' width='100%' cellspacing='0' cellpadding='0' border='0'><tbody><tr><td bgcolor='#E8E8E8' height='1' width='100%' style='height: 1px; font-size:0;' valign='top' align='left'>&nbsp;</td></tr></tbody></table></td></tr></tbody></table>
                            <table class='table-space' height='16' style='height: 16px; font-size: 0px; line-height: 0; width: 450px; background-color: #ffffff;' width='450' bgcolor='#FFFFFF' cellspacing='0' cellpadding='0' border='0'><tbody><tr><td class='table-space-td' valign='middle' height='16' style='height: 16px; width: 450px; background-color: #ffffff;' width='450' bgcolor='#FFFFFF' align='left'>&nbsp;</td></tr></tbody></table>
                            
                            <table class='table-row' width='450' bgcolor='#FFFFFF' style='table-layout: fixed; background-color: #ffffff;' cellspacing='0' cellpadding='0' border='0'><tbody><tr><td class='table-row-td' style='font-family: Arial, sans-serif; line-height: 19px; color: #444444; font-size: 13px; font-weight: normal; padding-left: 36px; padding-right: 36px;' valign='top' align='left'>
                              <table class='table-col' align='left' width='378' cellspacing='0' cellpadding='0' border='0' style='table-layout: fixed;'><tbody><tr><td class='table-col-td' width='378' style='font-family: Arial, sans-serif; line-height: 19px; color: #444444; font-size: 13px; font-weight: normal; width: 378px;' valign='top' align='left'>
                                <div style='font-family: Arial, sans-serif; line-height: 19px; color: #444444; font-size: 13px; text-align: center;'>
                                  <a href='http://sokasocks.com/index.php?page=verifikasi&id=$id' style='color: #ffffff; text-decoration: none; margin: 0px; text-align: center; vertical-align: baseline; border: 4px solid #6fb3e0; padding: 4px 9px; font-size: 15px; line-height: 21px; background-color: #6fb3e0;'>&nbsp; Konfirmasi &nbsp;</a>
                                </div>
                                <table class='table-space' height='16' style='height: 16px; font-size: 0px; line-height: 0; width: 378px; background-color: #ffffff;' width='378' bgcolor='#FFFFFF' cellspacing='0' cellpadding='0' border='0'><tbody><tr><td class='table-space-td' valign='middle' height='16' style='height: 16px; width: 378px; background-color: #ffffff;' width='378' bgcolor='#FFFFFF' align='left'>&nbsp;</td></tr></tbody></table>
                              </td></tr></tbody></table>
                            </td></tr></tbody></table>
                            
                            <table class='table-space' height='6' style='height: 6px; font-size: 0px; line-height: 0; width: 450px; background-color: #ffffff;' width='450' bgcolor='#FFFFFF' cellspacing='0' cellpadding='0' border='0'><tbody><tr><td class='table-space-td' valign='middle' height='6' style='height: 6px; width: 450px; background-color: #ffffff;' width='450' bgcolor='#FFFFFF' align='left'>&nbsp;</td></tr></tbody></table>
                            
                            <table class='table-row-fixed' width='450' bgcolor='#FFFFFF' style='table-layout: fixed; background-color: #ffffff;' cellspacing='0' cellpadding='0' border='0'><tbody><tr><td class='table-row-fixed-td' style='font-family: Arial, sans-serif; line-height: 19px; color: #444444; font-size: 13px; font-weight: normal; padding-left: 1px; padding-right: 1px;' valign='top' align='left'>
                              <table class='table-col' align='left' width='448' cellspacing='0' cellpadding='0' border='0' style='table-layout: fixed;'><tbody><tr><td class='table-col-td' width='448' style='font-family: Arial, sans-serif; line-height: 19px; color: #444444; font-size: 13px; font-weight: normal;' valign='top' align='left'>
                                <table width='100%' cellspacing='0' cellpadding='0' border='0' style='table-layout: fixed;'><tbody><tr><td width='100%' align='center' bgcolor='#f5f5f5' style='font-family: Arial, sans-serif; line-height: 24px; color: #bbbbbb; font-size: 13px; font-weight: normal; text-align: center; padding: 9px; border-width: 1px 0px 0px; border-style: solid; border-color: #e3e3e3; background-color: #f5f5f5;' valign='top'>
                                  <a href='http://sokasocks.com/' style='color: #428bca; text-decoration: none; background-color: transparent;'>it's My Socks</a>
                                  <br>
                                  <a href='https://twitter.com/soka_id' style='color: #478fca; text-decoration: none; background-color: transparent;'>twitter</a>
                                  .
                                  <a href='https://www.facebook.com/SokaIndonesia/' style='color: #5b7a91; text-decoration: none; background-color: transparent;'>facebook</a>
                                  .
                                  <a href='https://www.instagram.com/soka_indonesia/' style='color: #dd5a43; text-decoration: none; background-color: transparent;'>Instagram</a>
                                </td></tr></tbody></table>
                              </td></tr></tbody></table>
                            </td></tr></tbody></table>
                            <table class='table-space' height='1' style='height: 1px; font-size: 0px; line-height: 0; width: 450px; background-color: #ffffff;' width='450' bgcolor='#FFFFFF' cellspacing='0' cellpadding='0' border='0'><tbody><tr><td class='table-space-td' valign='middle' height='1' style='height: 1px; width: 450px; background-color: #ffffff;' width='450' bgcolor='#FFFFFF' align='left'>&nbsp;</td></tr></tbody></table>
                            <table class='table-space' height='36' style='height: 36px; font-size: 0px; line-height: 0; width: 450px; background-color: #e4e6e9;' width='450' bgcolor='#E4E6E9' cellspacing='0' cellpadding='0' border='0'><tbody><tr><td class='table-space-td' valign='middle' height='36' style='height: 36px; width: 450px; background-color: #e4e6e9;' width='450' bgcolor='#E4E6E9' align='left'>&nbsp;</td></tr></tbody></table></td></tr></table>
                            </td></tr>
                             </table>
                            </body>
                            </html>";

						//include "classes/class.phpmailer.php";
						include('lib/class/email/class.phpmailer.php');
						/*
						$mail = new PHPMailer; 
						$mail->IsSMTP();
						$mail->SMTPSecure = 'ssl'; 
						$mail->Host = "sokasocks.com"; //host masing2 provider email
						$mail->SMTPDebug = 1;
						$mail->Port = 465;
						$mail->SMTPAuth = true;
						$mail->Username = "info@sokasocks.com"; //user email
						$mail->Password = "password"; //password email 
						$mail->SetFrom("info@sokasocks.com","Soka Info"); //set email pengirim
						$mail->Subject = "Verifikasi Account Sokasocks.com"; //subyek email
						$mail->AddAddress($email,$nama_lengkap);  //tujuan email
						$mail->MsgHTML($message);

						if( $mail->Send() ) {
							header('location:index.php?page=register-sukses');
						}else{
							header('location:index.php?page=register&pesan=gagal_email');
						}
						*/
						header('location:index.php?page=register-sukses');

					}else{

						//gagal tambah
						header('location:index.php?page=register-sukses&pesan=gagal');

					}



				}else{

					//gagal tambah

					header('location:index.php?page=register-sukses&pesan=gagal_id');

				}



			}else{

				//gagal tambah

				header('location:index.php?page=register-sukses&pesan=email_sama');

			}



		}else{

			//jika filed kosong

			header('location:index.php?page=register-sukses&pesan=kosong');

		}



	}else{

		//jika filed captcha

		header('location:index.php?page=register-sukses&pesan=captcha');

	}

//Login -----------------------------------------------------------------------------------------------------------------------------------

}elseif ($module=='login' AND $act=='validasi'){

		session_start();



		$email=$_POST['email'];

		$password=md5($_POST['password']);



		if (!empty($email) AND !empty($password)){

			

			$db = new database(0);

			$sql = "SELECT * FROM member WHERE email='$email' AND kata_kunci='$password'";

			$data = $db->selectOne($sql);	
			
			//echo $sql;
			
			if ($data['status']=='Aktif'){

    			if ($data['email']==$email && $data['kata_kunci']==$password && !empty($email) && !empty($password)){
    
    				$_SESSION['hak_login']="done";
    
    				$_SESSION['id_member']=$data['id_member'];
    
    				$_SESSION['nama_lengkap']=$data['nama_lengkap'];
    
    				$_SESSION['email']=$data['email'];
    
    				$_SESSION['status']=$data['status'];
    
    				$_SESSION['enkrip']=md5($data['id_member']);
    
    
    
    				header('location:index.php?page=login-sukses');
    
    			}else{
    
    				//salah username dan password
    
    				header('location:index.php?pesan=gagal_login');
    
    			} 
			
			}else{

				//belum verifikasi

				header('location:index.php?pesan=belum_verifikasi');

			} 

		}else{

			// jika kode captcha salah

			header('location:index.php?pesan=kosong');

		}

//Lupa Password -----------------------------------------------------------------------------------------------------------------------------------

}elseif ($module=='lupa_password' AND $act=='validasi'){



		$email=$_POST['email'];



		if (!empty($email)){

			

			$db = new database(0);

			$sql = "SELECT * FROM member WHERE email='$email' AND status='Aktif'";

			$data = $db->selectOne($sql);	

			$nama_lengkap = $data['nama_lengkap'];

			//echo $sql;

			if ($data['email']==$email && !empty($email)){

				$id=md5($data['id_member']);

				//$message = "Silahkan klik link di bawah ini untuk mengganti password account soka.id ada di http://sokasocks.com/index.php?page=form-lupa-password&id=$id";
				
				$message = "
                            <!doctype html>
                            <html xmlns='http://www.w3.org/1999/xhtml'>
                             <head>
                              <meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />
                              <meta name='viewport' content='initial-scale=1.0' />
                              <meta name='format-detection' content='telephone=no' />
                              <title></title>
                              <style type='text/css'>
                             	body {
                            		width: 100%;
                            		margin: 0;
                            		padding: 0;
                            		-webkit-font-smoothing: antialiased;
                            	}
                            	@media only screen and (max-width: 600px) {
                            		table[class='table-row'] {
                            			float: none !important;
                            			width: 98% !important;
                            			padding-left: 20px !important;
                            			padding-right: 20px !important;
                            		}
                            		table[class='table-row-fixed'] {
                            			float: none !important;
                            			width: 98% !important;
                            		}
                            		table[class='table-col'], table[class='table-col-border'] {
                            			float: none !important;
                            			width: 100% !important;
                            			padding-left: 0 !important;
                            			padding-right: 0 !important;
                            			table-layout: fixed;
                            		}
                            		td[class='table-col-td'] {
                            			width: 100% !important;
                            		}
                            		table[class='table-col-border'] + table[class='table-col-border'] {
                            			padding-top: 12px;
                            			margin-top: 12px;
                            			border-top: 1px solid #E8E8E8;
                            		}
                            		table[class='table-col'] + table[class='table-col'] {
                            			margin-top: 15px;
                            		}
                            		td[class='table-row-td'] {
                            			padding-left: 0 !important;
                            			padding-right: 0 !important;
                            		}
                            		table[class='navbar-row'] , td[class='navbar-row-td'] {
                            			width: 100% !important;
                            		}
                            		img {
                            			max-width: 100% !important;
                            			display: inline !important;
                            		}
                            		img[class='pull-right'] {
                            			float: right;
                            			margin-left: 11px;
                                        max-width: 125px !important;
                            			padding-bottom: 0 !important;
                            		}
                            		img[class='pull-left'] {
                            			float: left;
                            			margin-right: 11px;
                            			max-width: 125px !important;
                            			padding-bottom: 0 !important;
                            		}
                            		table[class='table-space'], table[class='header-row'] {
                            			float: none !important;
                            			width: 98% !important;
                            		}
                            		td[class='header-row-td'] {
                            			width: 100% !important;
                            		}
                            	}
                            	@media only screen and (max-width: 480px) {
                            		table[class='table-row'] {
                            			padding-left: 16px !important;
                            			padding-right: 16px !important;
                            		}
                            	}
                            	@media only screen and (max-width: 320px) {
                            		table[class='table-row'] {
                            			padding-left: 12px !important;
                            			padding-right: 12px !important;
                            		}
                            	}
                            	@media only screen and (max-width: 458px) {
                            		td[class='table-td-wrap'] {
                            			width: 100% !important;
                            		}
                            	}
                              </style>
                             </head>
                             <body style='font-family: Arial, sans-serif; font-size:13px; color: #444444; min-height: 200px;' bgcolor='#E4E6E9' leftmargin='0' topmargin='0' marginheight='0' marginwidth='0'>
                             <table width='100%' height='100%' bgcolor='#E4E6E9' cellspacing='0' cellpadding='0' border='0'>
                             <tr><td width='100%' align='center' valign='top' bgcolor='#E4E6E9' style='background-color:#E4E6E9; min-height: 200px;'>
                            <table><tr><td class='table-td-wrap' align='center' width='458'><table class='table-space' height='18' style='height: 18px; font-size: 0px; line-height: 0; width: 450px; background-color: #e4e6e9;' width='450' bgcolor='#E4E6E9' cellspacing='0' cellpadding='0' border='0'><tbody><tr><td class='table-space-td' valign='middle' height='18' style='height: 18px; width: 450px; background-color: #e4e6e9;' width='450' bgcolor='#E4E6E9' align='left'>&nbsp;</td></tr></tbody></table>
                            <table class='table-space' height='8' style='height: 8px; font-size: 0px; line-height: 0; width: 450px; background-color: #ffffff;' width='450' bgcolor='#FFFFFF' cellspacing='0' cellpadding='0' border='0'><tbody><tr><td class='table-space-td' valign='middle' height='8' style='height: 8px; width: 450px; background-color: #ffffff;' width='450' bgcolor='#FFFFFF' align='left'>&nbsp;</td></tr></tbody></table>
                            
                            <table class='table-row' width='450' bgcolor='#FFFFFF' style='table-layout: fixed; background-color: #ffffff;' cellspacing='0' cellpadding='0' border='0'><tbody><tr><td class='table-row-td' style='font-family: Arial, sans-serif; line-height: 19px; color: #444444; font-size: 13px; font-weight: normal; padding-left: 36px; padding-right: 36px;' valign='top' align='left'>
                              <table class='table-col' align='left' width='378' cellspacing='0' cellpadding='0' border='0' style='table-layout: fixed;'><tbody><tr><td class='table-col-td' width='378' style='font-family: Arial, sans-serif; line-height: 19px; color: #444444; font-size: 13px; font-weight: normal; width: 378px;' valign='top' align='left'>
                                <table class='header-row' width='378' cellspacing='0' cellpadding='0' border='0' style='table-layout: fixed;'><tbody><tr><td class='header-row-td' width='378' style='font-family: Arial, sans-serif; font-weight: normal; line-height: 19px; color: #478fca; margin: 0px; font-size: 18px; padding-bottom: 10px; padding-top: 15px;' valign='top' align='left'>Lupa Password Account Sokasocks.com</td></tr></tbody></table>
                                <div style='font-family: Arial, sans-serif; line-height: 20px; color: #444444; font-size: 13px;'>
                                  Silahkan klik link di bawah ini untuk mengganti password account Sokasocks.com
                                </div>
                              </td></tr></tbody></table>
                            </td></tr></tbody></table>
                                
                            <table class='table-space' height='12' style='height: 12px; font-size: 0px; line-height: 0; width: 450px; background-color: #ffffff;' width='450' bgcolor='#FFFFFF' cellspacing='0' cellpadding='0' border='0'><tbody><tr><td class='table-space-td' valign='middle' height='12' style='height: 12px; width: 450px; background-color: #ffffff;' width='450' bgcolor='#FFFFFF' align='left'>&nbsp;</td></tr></tbody></table>
                            <table class='table-space' height='12' style='height: 12px; font-size: 0px; line-height: 0; width: 450px; background-color: #ffffff;' width='450' bgcolor='#FFFFFF' cellspacing='0' cellpadding='0' border='0'><tbody><tr><td class='table-space-td' valign='middle' height='12' style='height: 12px; width: 450px; padding-left: 16px; padding-right: 16px; background-color: #ffffff;' width='450' bgcolor='#FFFFFF' align='center'>&nbsp;<table bgcolor='#E8E8E8' height='0' width='100%' cellspacing='0' cellpadding='0' border='0'><tbody><tr><td bgcolor='#E8E8E8' height='1' width='100%' style='height: 1px; font-size:0;' valign='top' align='left'>&nbsp;</td></tr></tbody></table></td></tr></tbody></table>
                            <table class='table-space' height='16' style='height: 16px; font-size: 0px; line-height: 0; width: 450px; background-color: #ffffff;' width='450' bgcolor='#FFFFFF' cellspacing='0' cellpadding='0' border='0'><tbody><tr><td class='table-space-td' valign='middle' height='16' style='height: 16px; width: 450px; background-color: #ffffff;' width='450' bgcolor='#FFFFFF' align='left'>&nbsp;</td></tr></tbody></table>
                            
                            <table class='table-row' width='450' bgcolor='#FFFFFF' style='table-layout: fixed; background-color: #ffffff;' cellspacing='0' cellpadding='0' border='0'><tbody><tr><td class='table-row-td' style='font-family: Arial, sans-serif; line-height: 19px; color: #444444; font-size: 13px; font-weight: normal; padding-left: 36px; padding-right: 36px;' valign='top' align='left'>
                              <table class='table-col' align='left' width='378' cellspacing='0' cellpadding='0' border='0' style='table-layout: fixed;'><tbody><tr><td class='table-col-td' width='378' style='font-family: Arial, sans-serif; line-height: 19px; color: #444444; font-size: 13px; font-weight: normal; width: 378px;' valign='top' align='left'>
                                <div style='font-family: Arial, sans-serif; line-height: 19px; color: #444444; font-size: 13px; text-align: center;'>
                                  <a href='http://sokasocks.com/index.php?page=form-lupa-password&id=$id' style='color: #ffffff; text-decoration: none; margin: 0px; text-align: center; vertical-align: baseline; border: 4px solid #6fb3e0; padding: 4px 9px; font-size: 15px; line-height: 21px; background-color: #6fb3e0;'>&nbsp; Reset Password &nbsp;</a>
                                </div>
                                <table class='table-space' height='16' style='height: 16px; font-size: 0px; line-height: 0; width: 378px; background-color: #ffffff;' width='378' bgcolor='#FFFFFF' cellspacing='0' cellpadding='0' border='0'><tbody><tr><td class='table-space-td' valign='middle' height='16' style='height: 16px; width: 378px; background-color: #ffffff;' width='378' bgcolor='#FFFFFF' align='left'>&nbsp;</td></tr></tbody></table>
                              </td></tr></tbody></table>
                            </td></tr></tbody></table>
                            
                            <table class='table-space' height='6' style='height: 6px; font-size: 0px; line-height: 0; width: 450px; background-color: #ffffff;' width='450' bgcolor='#FFFFFF' cellspacing='0' cellpadding='0' border='0'><tbody><tr><td class='table-space-td' valign='middle' height='6' style='height: 6px; width: 450px; background-color: #ffffff;' width='450' bgcolor='#FFFFFF' align='left'>&nbsp;</td></tr></tbody></table>
                            
                            <table class='table-row-fixed' width='450' bgcolor='#FFFFFF' style='table-layout: fixed; background-color: #ffffff;' cellspacing='0' cellpadding='0' border='0'><tbody><tr><td class='table-row-fixed-td' style='font-family: Arial, sans-serif; line-height: 19px; color: #444444; font-size: 13px; font-weight: normal; padding-left: 1px; padding-right: 1px;' valign='top' align='left'>
                              <table class='table-col' align='left' width='448' cellspacing='0' cellpadding='0' border='0' style='table-layout: fixed;'><tbody><tr><td class='table-col-td' width='448' style='font-family: Arial, sans-serif; line-height: 19px; color: #444444; font-size: 13px; font-weight: normal;' valign='top' align='left'>
                                <table width='100%' cellspacing='0' cellpadding='0' border='0' style='table-layout: fixed;'><tbody><tr><td width='100%' align='center' bgcolor='#f5f5f5' style='font-family: Arial, sans-serif; line-height: 24px; color: #bbbbbb; font-size: 13px; font-weight: normal; text-align: center; padding: 9px; border-width: 1px 0px 0px; border-style: solid; border-color: #e3e3e3; background-color: #f5f5f5;' valign='top'>
                                  <a href='http://sokasocks.com/' style='color: #428bca; text-decoration: none; background-color: transparent;'>it's My Socks</a>
                                  <br>
                                  <a href='https://twitter.com/soka_id' style='color: #478fca; text-decoration: none; background-color: transparent;'>twitter</a>
                                  .
                                  <a href='https://www.facebook.com/SokaIndonesia/' style='color: #5b7a91; text-decoration: none; background-color: transparent;'>facebook</a>
                                  .
                                  <a href='https://www.instagram.com/soka_indonesia/' style='color: #dd5a43; text-decoration: none; background-color: transparent;'>Instagram</a>
                                </td></tr></tbody></table>
                              </td></tr></tbody></table>
                            </td></tr></tbody></table>
                            <table class='table-space' height='1' style='height: 1px; font-size: 0px; line-height: 0; width: 450px; background-color: #ffffff;' width='450' bgcolor='#FFFFFF' cellspacing='0' cellpadding='0' border='0'><tbody><tr><td class='table-space-td' valign='middle' height='1' style='height: 1px; width: 450px; background-color: #ffffff;' width='450' bgcolor='#FFFFFF' align='left'>&nbsp;</td></tr></tbody></table>
                            <table class='table-space' height='36' style='height: 36px; font-size: 0px; line-height: 0; width: 450px; background-color: #e4e6e9;' width='450' bgcolor='#E4E6E9' cellspacing='0' cellpadding='0' border='0'><tbody><tr><td class='table-space-td' valign='middle' height='36' style='height: 36px; width: 450px; background-color: #e4e6e9;' width='450' bgcolor='#E4E6E9' align='left'>&nbsp;</td></tr></tbody></table></td></tr></table>
                            </td></tr>
                             </table>
                            </body>
                            </html>";

				include('lib/class/email/class.phpmailer.php');

				$mail = new PHPMailer; 
				$mail->IsSMTP();
				$mail->SMTPSecure = 'ssl'; 
				$mail->Host = "sokasocks.com"; //host masing2 provider email
				$mail->SMTPDebug = 1;
				$mail->Port = 465;
				$mail->SMTPAuth = true;
				$mail->Username = "info@sokasocks.com"; //user email
				$mail->Password = "kaoskakiinfo75"; //password email 
				$mail->SetFrom("info@sokasocks.com","Soka Info"); //set email pengirim
				$mail->Subject = "Lupa Password Account Sokasocks.com"; //subyek email
				$mail->AddAddress($email,$nama_lengkap);  //tujuan email
				$mail->MsgHTML($message);

				if( $mail->Send() ) {
					header('location:index.php?page=lupa-password-sukses');
				}else{
					header('location:index.php?page=lupa-password-sukses&pesan=gagal_email');
				}

			}else{

				//salah username dan password

				header('location:index.php?page=lupa-password-sukses&pesan=gagal');

			} 

		}else{

			// jika kode captcha salah

			header('location:index.php?page=lupa-password-sukses&pesan=kosong');

		}

//Form Lupa Password -----------------------------------------------------------------------------------------------------------------------------------

}elseif ($module=='ganti_password' AND $act=='edit'){



		$id=$_POST['id'];

		$password=$_POST['password'];

		$password_again=$_POST['password_again'];



		$password_enkrip=md5($_POST['password']);



		if (!empty($password) AND !empty($password_again)){



			if ($password == $password_again){

			

				$db = new database(0);

				$sql = "SELECT * FROM member WHERE md5(id_member)='$id' AND status='Aktif'";

				$data = $db->selectOne($sql);	



				//echo $sql;

				if ($data['id_member'] != ""){



					$sql = "UPDATE member SET kata_kunci = '$password_enkrip' WHERE md5(id_member)='$id'";



					//echo $sql;

					if ($db->IUD_db($sql)){

						//berhasil

						header('location:index.php?page=form-lupa-password-sukses');

					}else{

						//gagal

						header('location:index.php?page=form-lupa-password-sukses&pesan=gagal');

					}

				}else{

					//salah username dan password

					header('location:index.php?page=form-lupa-password-sukses&pesan=email_tdk_ada');

				} 



			}else{

				// jika kode captcha salah

				header('location:index.php?page=form-lupa-password&id='. $id . '&pesan=pass_tdk_sama');

			}



		}else{

			// jika kode captcha salah

			header('location:index.php?page=form-lupa-password-sukses&pesan=kosong');

		}

//Form Personal Data -----------------------------------------------------------------------------------------------------------------------------------

}elseif ($module=='profile' AND $act=='edit'){

	$id=$_POST['id'];

	$nama_lengkap=$_POST['nama_lengkap'];

	$tgl_lahir = date('Y-m-d',strtotime(trim($_POST['tgl_lahir'])));

	$jk=$_POST['jk'];

	$nomor_tlp=$_POST['nomor_tlp'];

	$sql = "UPDATE member SET   nama_lengkap='". $nama_lengkap ."',

								tgl_lahir='". $tgl_lahir ."', 

								jk='". $jk ."',

								nomor_tlp='". $nomor_tlp ."'

				WHERE md5(id_member) = '". $id ."'";



	//echo $sql;

	$db = new database(0);

	if ($db->IUD_db($sql)){

		//berhasil tambah

		header('location:index.php?page=profile&pesan=berhasil_edit');

	}else{

		//gagal tambah

		header('location:index.php?page=profile&pesan=gagal&id='. $id);

	}

//Alamat -----------------------------------------------------------------------------------------------------------------------------------

}elseif ($module=='alamat' AND $act=='add'){

	include('lib/class/autoNumber.php');

	$id_member = $_POST['id'];
	
	$alamat_sebagi = $_POST['alamat_sebagi'];
	$nama_penerima = $_POST['nama_penerima'];
	$alamat = $_POST['alamat'];
	$kode_pos = $_POST['kode_pos'];

	$provinsi = $_POST['provinsi'];
	$provinsi_explode = explode("|",$provinsi);
	$id_provinsi = $provinsi_explode[0];
	$nama_provinsi = $provinsi_explode[1];

	$kota = $_POST['kota'];
	$kota_explode = explode("|",$kota);
	$id_kota = $kota_explode[0];
	$nama_kota = $kota_explode[1];

	$kec = $_POST['kec'];
	$kec_explode = explode("|",$kec);
	$id_kec = $kec_explode[0];
	$nama_kec = $kec_explode[1];

	if (!empty($alamat_sebagi) AND !empty($nama_penerima) AND !empty($alamat) AND !empty($kode_pos) AND !empty($provinsi) AND !empty($kota) AND !empty($kec)){


		$db = new database(0);
		
		$sql = "SELECT * FROM member 

				WHERE md5(id_member) = '$id_member'";

		$data_member = $db->selectOne($sql);

		$id_member = $data_member['id_member'];

		if ($id_member != ""){

			$auto_number = new autoNumber("AL". date("ym"),"",2);

			$sql = "SELECT * FROM alamat 

					WHERE SUBSTRING(id_alamat,1,6) = 'AL". date("ym") ."'

					ORDER BY id_alamat DESC";

			$data = $db->selectOne($sql);

			$id_alamat = $auto_number->getId($data['id_alamat']);

			if ($id_alamat != ""){

				$sql = "INSERT INTO alamat (id_alamat, id_member, alamat_sebagi, nama_penerima, alamat, kode_pos, provinsi, nama_provinsi, kota, nama_kota, kec, nama_kec, status)

											VALUES

										   ('". $id_alamat . "','". $id_member . "','". $alamat_sebagi . "','". $nama_penerima . "','". $alamat . "',
										   	'". $kode_pos . "','". $id_provinsi . "','". $nama_provinsi . "','". $id_kota . "','". $nama_kota . "',
										   	'". $id_kec . "','". $nama_kec . "','none')";

				//echo $sql;

				if ($db->IUD_db($sql)){

					//berhasil

					header('location:index.php?page=address');

				}else{

					//gagal tambah

					header('location:index.php?page=new_address&pesan=gagal');

				}

			}else{

				//gagal tambah

				header('location:index.php?page=new_address&pesan=gagal_id');

			}

		}else{
			//gagal id member
			header('location:index.php?page=new_address&pesan=gagal_idmember');			
		}

	}else{

		//jika filed kosong

		header('location:index.php?page=new_address&pesan=kosong');

	}
}elseif ($module=='alamat' AND $act=='edit'){
	
	$id = $_POST['id'];
	
	$db = new database(0);
	
    $sql = "SELECT id_alamat FROM alamat WHERE md5(id_alamat) ='". $id ."'";
    $data_alamat = $db->selectOne($sql);
    $id_alamat = $data_alamat['id_alamat'];
	
	$alamat_sebagi = $_POST['alamat_sebagi'];
	$nama_penerima = $_POST['nama_penerima'];
	$alamat = $_POST['alamat'];
	$kode_pos = $_POST['kode_pos'];

	$provinsi = $_POST['provinsi'];
	$provinsi_explode = explode("|",$provinsi);
	$id_provinsi = $provinsi_explode[0];
	$nama_provinsi = $provinsi_explode[1];

	$kota = $_POST['kota'];
	$kota_explode = explode("|",$kota);
	$id_kota = $kota_explode[0];
	$nama_kota = $kota_explode[1];

	$kec = $_POST['kec'];
	$kec_explode = explode("|",$kec);
	$id_kec = $kec_explode[0];
	$nama_kec = $kec_explode[1];
		
	$sql = "UPDATE alamat SET alamat_sebagi='". $alamat_sebagi ."', 
	                          nama_penerima='". $nama_penerima ."', 
	                          alamat='". $alamat ."' ";
	                          
	if ($id_provinsi != ""){
	    $sql = $sql .", provinsi='". $id_provinsi ."', nama_provinsi='". $nama_provinsi ."'";
	}
	
	if ($id_kota != ""){
	    $sql = $sql .", kota='". $id_kota ."', nama_kota='". $nama_kota ."'";
	}
	
	if ($id_kec != ""){
	    $sql = $sql .", kec='". $id_kec ."', nama_kec='". $nama_kec ."'";
	}
	                          
    $sql = $sql .", kode_pos='". $kode_pos ."' WHERE id_alamat ='". $id_alamat ."'";
    
	//echo $sql;
	
	if ($db->IUD_db($sql)){
	    //berhasil edit
    	header('location:index.php?page=address&pesan=berhasil_set&id='. $id);
	}else{
		//gagal edit
		header('location:index.php?page=edit_address&pesan=gagal&id='. $id);
	}
}elseif ($module=='alamat' AND $act=='set'){
	$db = new database(0);
	
	$sql = "SELECT * FROM alamat 
            WHERE md5(id_alamat) = '". $_GET['id'] ."'";

	$data_member = $db->selectOne($sql);
	$id_member = $data_member['id_member'];
		
	$sql = "UPDATE alamat SET status='none' WHERE id_member ='". $id_member ."'";

	//echo $sql;
	if ($db->IUD_db($sql)){
    	$sql = "UPDATE alamat SET status='set' WHERE md5(id_alamat) ='". $_GET['id'] ."'";
    
    	//echo $sql;
    	if ($db->IUD_db($sql)){
    		//berhasil tambah
    		header('location:index.php?page=address&pesan=berhasil_set');
    	}else{
    		//gagal tambah
    		header('location:index.php?page=address&pesan=gagal_2');
    	}
	}else{
		//gagal tambah
		header('location:index.php?page=address&pesan=gagal');
	}
}elseif ($module=='alamat' AND $act=='hapus'){
	$db = new database(0);
	$sql = "DELETE FROM alamat WHERE md5(id_alamat) ='". $_GET['id'] ."'";

	//echo $sql;
	if ($db->IUD_db($sql)){
		//berhasil tambah
		header('location:index.php?page=address&pesan=berhasil_hapus');
	}else{
		//gagal tambah
		header('location:index.php?page=address&pesan=gagal');
	}
}elseif ($module=='alamat' AND $act=='set_shipping'){
	$db = new database(0);
	
	$sql = "SELECT * FROM alamat 
            WHERE md5(id_alamat) = '". $_GET['id'] ."'";

	$data_member = $db->selectOne($sql);
	$id_member = $data_member['id_member'];
		
	$sql = "UPDATE alamat SET status='none' WHERE id_member ='". $id_member ."'";

	//echo $sql;
	if ($db->IUD_db($sql)){
    	$sql = "UPDATE alamat SET status='set' WHERE md5(id_alamat) ='". $_GET['id'] ."'";
    
    	//echo $sql;
    	if ($db->IUD_db($sql)){
    		//berhasil tambah
    		header('location:index.php?page=shipping&id='. $_GET['id2'] .'&pesan=berhasil_set_alamat');
    	}else{
    		//gagal tambah
    		header('location:index.php?page=shipping&pesan=gagal_alamat_2');
    	}
	}else{
		//gagal tambah
		header('location:index.php?page=shipping&pesan=gagal_alamat');
	}
}elseif ($module=='bayar' AND $act=='konfirmasi'){
    $no_tagihan = $_POST['no_transaksi'];
    $no_rek_pesan = $_POST['no_rek'];
    $id_bank_tmp = $_POST['bank'];
    
    $db = new database(0);
    $sql = "SELECT * FROM bank 
            WHERE md5(id_bank) = '". $id_bank_tmp ."'";

	$data_bank = $db->selectOne($sql);
	
	$id_bank = $data_bank['id_bank'];
	$no_rek_bank = $data_bank['no_rek'];
	$nama_bank = $data_bank['nama_bank'];
	$atas_nama_bank = $data_bank['atas_nama'];
	
	$transfer_sebesar = $_POST['transfer_sebesar'];
	$email = $_POST['email'];
	
	$bukti = $_POST['bukti'];
	$file_tmp_1 = $_FILES['bukti']['tmp_name'];
	$file_ext_1 = strtolower(end(explode('.',$_FILES['bukti']['name']))); 
	if ($file_ext_1 == "jpg"){
	    $nama_file_1 = $no_tagihan ."-". date('ym') ."". $file_ext_1;
	}
	
	$sql = "SELECT * FROM po 
            WHERE no_tagihan = '". $no_tagihan ."' AND status_po = 'metode-pembayaran'";
	$data_po = $db->selectOne($sql);
	$tmp_po = $data_po['no_tagihan'];
	
	if ($tmp_po == $no_tagihan){
	
    	if (!empty($no_tagihan) AND !empty($no_rek_pesan) AND !empty($id_bank) AND !empty($no_rek_bank) AND !empty($nama_bank) AND !empty($atas_nama_bank)
    	        AND !empty($transfer_sebesar) AND !empty($email) ){
    	            
    	    if ($file_ext_1 == "jpg"){
    	    
            	$sql = "INSERT INTO konfirmasi_bayar (tgl_input, no_tagihan, no_rek_pesan, id_bank, no_rek, nama_bank, atas_nama, transfer_sebesar, email, bukti)
            			VALUES
            			(now(),'". $no_tagihan . "','". $no_rek_pesan . "','". $id_bank . "','". $no_rek_bank . "','". $nama_bank . "',
            			 '". $atas_nama_bank . "','". $transfer_sebesar . "','". $email . "','". $nama_file_1 . "')";
            
            	//echo $sql;
            	if ($db->IUD_db($sql)){
            	    
            	    if ($file_ext_1 != ""){
            	        move_uploaded_file($file_tmp_1,"images/konfirmasi_bayar/".$nama_file_1."");
                    }
                        
            		//berhasil
                    header('location:index.php?page=confirm-payment-berhasil');
            	}else{
            		//gagal tambah
                    header('location:index.php?page=confirm-payment&pesan=gagal');
            	}
        	
        	}else{
        	    header('location:index.php?page=confirm-payment&pesan=gagal_bukti');
        	}
        	
    	}else{
        	//gagal tambah
            header('location:index.php?page=confirm-payment&pesan=kosong');
        }
    
	}else{
    	//gagal tambah
        header('location:index.php?page=confirm-payment&pesan=no_transkasi');
    }
}elseif ($module=='payment' AND $act=='metode_bayar'){
    include('lib/class/autoNumber.php');
    
    $id = $_POST['id'];
	$id_p = $_POST['id_p'];
	$bank = $_POST['bank'];
    
    //echo $bank;
	if ( !empty($id) AND !empty($id_p) AND !empty($bank) AND ($bank != "undefined")  ){

		$db = new database(0);
		
		$sql = "SELECT * FROM po WHERE md5(id_po)='$id_p'";
		$data_po = $db->selectOne($sql);
		$id_po = $data_po['id_po'];
		$total_pembayaran = $data_po['total_pembayaran'];
		
		$sql = "SELECT * FROM bank WHERE md5(id_bank)='$bank'";
		$data_bank = $db->selectOne($sql);
		$id_bank = $data_bank['id_bank'];
		$nama_bank = $data_bank['nama_bank'];
		$no_rek_bank = $data_bank['no_rek'];
		$atas_nama = $data_bank['atas_nama'];
		
		$tgl = str_pad(date("dm"), 4);
		$str_no_tagihan = substr($total_pembayaran, -3) ."". $tgl;
		
		$auto_number = new autoNumber("". $str_no_tagihan ."","",2);
		$sql = "SELECT * FROM po 
				WHERE SUBSTRING(no_tagihan,1,6) = '". $str_no_tagihan ."'
				ORDER BY no_tagihan DESC";
		$data = $db->selectOne($sql);
		$no_tagihan = $auto_number->getId($data['no_tagihan']);

		$sql = "UPDATE po SET status_po = 'metode-pembayaran',
		                      tgl_input = now(),
		                      no_tagihan = '". $no_tagihan . "',
		                      id_bank = '". $id_bank . "',
		                      nama_bank = '". $nama_bank . "',
		                      no_rek_bank = '". $no_rek_bank . "',
		                      atas_nama = '". $atas_nama . "'
		        WHERE id_po = '". $id_po ."'";
		
		//echo $sql;
		if ($db->IUD_db($sql)){
			//berhasil
			//echo json_encode("berhasil"); 
			header('location:index.php?page=payment&id='. $id_p .'');
		}else{
			//gagal tambah
			//echo json_encode("gagal"); 
			header('location:index.php?page=metode-payment&id='. $id_p .'&pesan=gagal');
		}
	}else{
		//echo json_encode("gagal");
		//echo"<script>location.href='/'</script>";
		header('location:index.php?page=metode-payment&id='. $id_p .'&pesan=kosong');
	}
}elseif ($module=='transaksi' AND $act=='batal'){
	$db = new database(0);
	$sql = "DELETE FROM d_po WHERE md5(id_po) ='". $_GET['id'] ."'";

	//echo $sql;
	if ($db->IUD_db($sql)){
	    
	    $sql = "UPDATE po SET status_po = 'batal-member' WHERE md5(id_po) = '". $_GET['id'] ."'";
		
		//echo $sql;
		if ($db->IUD_db($sql)){
			//berhasil
		    header('location:index.php?page=transaksi&pesan=berhasil_batal');
		}else{
			//gagal tambah
		    header('location:index.php?page=transaksi&pesan=gagal_update');
		}
	}else{
		//gagal tambah
		header('location:index.php?page=transaksi&pesan=gagal');
	}
}elseif ($module=='newsletter' AND $act=='add'){
	include('lib/class/autoNumber.php');
 
	$auto_number = new autoNumber("NL". date("ym"),"",2);
	$db = new database(0);
	$sql = "SELECT * FROM newsletter 
			WHERE SUBSTRING(id_newsletter,1,6) = 'NL". date("ym") ."'
			ORDER BY id_newsletter DESC";
	$data = $db->selectOne($sql);

	$id_newsletter = $auto_number->getId($data['id_newsletter']);

	$email = $_POST['email'];

	if (!empty($id_newsletter) AND !empty($email) ){
	    
	    $sql = "SELECT email FROM newsletter 
		        WHERE email = '". $email ."'";
    	$data_cek = $db->selectOne($sql);
		
		if ($data_cek['email'] != $email){
    		$sql = "INSERT INTO newsletter (id_newsletter, tgl_input, email)
    										VALUES
    									 ('". $id_newsletter . "', now(), '". $email ."')";
    		//echo $sql;
    		if ($db->IUD_db($sql)){
    			//berhasil tambah
    			header('location:index.php?pesan=berhasil_nl');
    		}else{
    			//gagal tambah
    			header('location:index.php?pesan=gagal_nl');
    		}
		}else{
		    header('location:index.php?pesan=sudah_ada_nl');
		}
	}else{
		//jika filed kosong
		header('location:index.php?pesan=kosong_nl');
	}
}elseif ($module=='wishlist' AND $act=='hapus'){
	$db = new database(0);
	$sql = "DELETE FROM wishlist WHERE md5(id_member) ='". $_GET['id'] ."' AND md5(id_produk) ='". $_GET['id2'] ."'";

	//echo $sql;
	if ($db->IUD_db($sql)){
		//berhasil
		header('location:index.php?page=wishlist&pesan=berhasil_ws');
	}else{
		//gagal tambah
		header('location:index.php?page=wishlist&pesan=gagal_ws');
	}
}elseif ($module=='retur' AND $act=='add'){
	$nama = $_POST['nama'];
	$no_tagihan = $_POST['id_order'];
	$jenis_retur = $_POST['jenis_retur'];
	$ket = $_POST['ket'];

	$gambar_1 = $_POST['gambar_1'];
	$file_tmp_1 = $_FILES['gambar_1']['tmp_name'];
	$file_ext_1 = strtolower(end(explode('.',$_FILES['gambar_1']['name']))); 

	if (!empty($nama) AND !empty($no_tagihan) AND !empty($jenis_retur) AND !empty($ket) AND (($file_ext_1 == "jpg") || ($file_ext_1 == "png")) ){
	    
	    include('lib/class/autoNumber.php');
	    $auto_number = new autoNumber("RT". date("ym"),"",2);

		$db = new database(0);
		$sql = "SELECT * FROM retur 
                WHERE SUBSTRING(id_retur,1,6) = 'RT". date("ym") ."'
                ORDER BY id_retur DESC";
		$data = $db->selectOne($sql);
		$id_retur = $auto_number->getId($data['id_retur']);
		$nama_file_1 = $id_retur ."-". date('ym') ."-01.". $file_ext_1;
		
    	$sql = "INSERT INTO retur (id_retur, nama, no_tagihan, jenis_retur, ket, gambar_bukti) 
    								VALUES 
    		    ('". $id_retur ."','". $nama ."','". $no_tagihan ."','". $jenis_retur ."','". $ket ."','". $nama_file_1 ."')";
		
		//echo $sql;
		if ($db->IUD_db($sql)){

			move_uploaded_file($file_tmp_1,"images/bukti_retur/".$nama_file_1."");

			//berhasil tambah
			header('location:index.php?page=form-return-berhasil');
		}else{
			//gagal tambah
			header('location:index.php?page=form-return&pesan=gagal');
		}
	}else{
		//jika filed kosong
		header('location:index.php?page=form-return&pesan=kosong');
	}
}elseif ($module=='kontak_kami' AND $act=='add'){
	$nama = $_POST['nama'];
	$email = $_POST['email'];
	$no_hp = $_POST['no_hp'];
	$subjek = $_POST['subjek'];
	$pesan = $_POST['pesan'];

	if (!empty($nama) AND !empty($email) AND !empty($no_hp) AND !empty($subjek) AND !empty($pesan) ){
	    
	    include('lib/class/autoNumber.php');
	    $auto_number = new autoNumber("KK". date("ym"),"",2);

		$db = new database(0);
		$sql = "SELECT * FROM kontak_kami 
                WHERE SUBSTRING(id_pesan_kk,1,6) = 'KK". date("ym") ."'
                ORDER BY id_pesan_kk DESC";
		$data = $db->selectOne($sql);
		$id_pesan_kk = $auto_number->getId($data['id_pesan_kk']);
		
    	$sql = "INSERT INTO kontak_kami (id_pesan_kk, nama, email, no_hp, subjek, pesan) 
    								VALUES 
    		    ('". $id_pesan_kk ."','". $nama ."','". $email ."','". $no_hp ."','". $subjek ."','". $pesan ."')";
		
		//echo $sql;
		if ($db->IUD_db($sql)){

			//berhasil tambah
			header('location:index.php?page=contact-berhasil');
		}else{
			//gagal tambah
			header('location:index.php?page=contact&pesan=gagal');
		}
	}else{
		//jika filed kosong
		header('location:index.php?page=contact&pesan=kosong');
	}
}