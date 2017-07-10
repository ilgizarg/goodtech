<?php

require_once('../db/settings.php');
/* db settings*/

$allowed = array("name","phone","email","quest","budget","product","referer"); // allowed fields
/* end settings */


if(!isset($_POST) && empty($_POST['data'])) {
	die ('no data');
}else {
	$data = $_POST;
	// check phone number
	if(isset($data['phone'])&&!empty($data['phone'])){
		$phonenumb = preg_replace('/[^0-9]/', '', $data['phone']);
		if (!preg_match('/^8([0-9]{7,10})/', $phonenumb)){
			unset($data['phone']);
			die(json_encode(array('message' => 'ERROR phone')));
		}
	}
}

//connetc db
$pdo = new PDO($dsn, $user, $pass, $opt);
$set = '';

foreach ($allowed as $field) {
 	if (isset($data[$field])) {
 	  $set.="`".str_replace("`","``",$field)."`". "=:$field, ";
    }
}
$set = substr($set, 0, -2); 

$sql = "INSERT INTO fio  SET ".$set;
$stm = $pdo->prepare($sql);
$stm->execute($data);

if($stm==TRUE){
	echo  true;
}else{
	echo false;
}

?>