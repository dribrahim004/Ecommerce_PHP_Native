<?php

function getRealIP()
{
  if (!empty($_SERVER['HTTP_CLIENT_IP'])) //CHEK IP YANG DISHARE DARI INTERNET  
  {
    $ip=$_SERVER['HTTP_CLIENT_IP'];
  }
  elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) //UNTUK CEK IP DARI PROXY  
  {
    $ip=$_SERVER['HTTP_X_FORWARDED_FOR'];
  }
  else
  {
    $ip=$_SERVER['REMOTE_ADDR'];
  }
  return $ip;
}

function getClientIP()
{
if (isset($_SERVER))
{
    if (isset($_SERVER["HTTP_X_FORWARDED_FOR"]))
        return $_SERVER["HTTP_X_FORWARDED_FOR"];

    if (isset($_SERVER["HTTP_CLIENT_IP"]))
        return $_SERVER["HTTP_CLIENT_IP"];

    return $_SERVER["REMOTE_ADDR"];
}

if (getenv('HTTP_X_FORWARDED_FOR'))
    return getenv('HTTP_X_FORWARDED_FOR');

if (getenv('HTTP_CLIENT_IP'))
    return getenv('HTTP_CLIENT_IP');

return getenv('REMOTE_ADDR');
}

echo "<p><b>Fungsi Dengan getRealIP</b> : ".getRealIP()."<p>";
echo "<p><b>Fungsi Dengan getClientIP</b> : ".getClientIP()."<p>";
echo "<h3>UNTUK MENGETAHUI NILAI DARI ARRAY $_SERVER</h3>";
echo "<pre>  ";
print_r($_SERVER);
echo "</pre>";

?>