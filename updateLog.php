<?php
function get_client_ip() {
    $ip_address = '';
    if (!empty($_SERVER['HTTP_CLIENT_IP']))   
	{
		$ip_address = $_SERVER['HTTP_CLIENT_IP'];
	}
	//whether ip is from proxy
	elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))  
	{
		$ip_address = $_SERVER['HTTP_X_FORWARDED_FOR'];
	}
	//whether ip is from remote address
	else
	{
		$ip_address = $_SERVER['REMOTE_ADDR'];
	}
    return $ip_address;
}

$fp = fopen("count.txt", "r"); 
$count = fread($fp, 1024); 
if($count!=""){
	$data=$count+1;
}else{
	$data="1";
}
$myfile = fopen("count.txt", "w") or die("Unable to open file!");
fwrite($myfile, $data);
fclose($myfile);



$ip = get_client_ip(); 

$log=$data."------------------IP Address------------".$ip."\n";
$file = fopen("log.txt", "a");
fwrite($file, $log);
fclose($file);
?>