<?php

require_once('../db/settings.php');

if(!isset($_POST) || empty($_POST['search'])) {
 	die ('no data');
 }else {
 	$name = $_POST['search'];
	
 }


$pdo = new PDO($dsn, $user, $pass, $opt);

$stm  = $pdo->prepare("SELECT name FROM fio WHERE MATCH (name) AGAINST (?) BETWeeN 1.2 and 2.2 ");
$stm->execute(array($name));
$data = $stm->fetchAll();

// Levenshtein algorithm
function distance($source, $dest) {
    if ($source == $dest) return 0;

    $slen = strlen($source);
    $dlen = strlen($dest);

    if ($slen == 0) {
        return $dlen;
    } else if ($dlen == 0) {
        return $slen;
    }

    $dist = range(0, $dlen);

    for ($i = 0; $i < $slen; $i++) {
        $_dist = array($i + 1);
        $char = $source{$i};
        for ($j = 0; $j < $dlen; $j++) {
            $cost = $char == $dest{$j} ? 0 : 1;
            $_dist[$j + 1] = min(
                $dist[$j + 1] + 1,   // deletion
                $_dist[$j] + 1,      // insertion
                $dist[$j] + $cost    // substitution
            );
        }
        $dist = $_dist;
    }
    return $dist[$j];
}

 foreach ($data as $key => $value) {
 	$dist= distance($name, $value['name']) ;
 	$levenshtein=levenshtein($name, $value['name']);
 	if ($dist > 5 || $levenshtein > 5){
 	    unset($data[$key]);
 	}
 }

 echo json_encode($data);
?>