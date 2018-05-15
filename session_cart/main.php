<!DOCTYPE html>
<meta charset="utf-8" />
<?php

$itemID = $_GET[input];

session_start();

$already_exist = 0;

/* there was no session */
if(!$_SESSION["itemID"][0]){
	$_SESSION["itemID"][0] = $itemID;
}

/* session already exists */
else{

	$cart_len = count($_SESSION["itemID"]);

	/* duplication check */
	for($i=0; $i < $cart_len; $i++){

		if($_SESSION["itemID"][$i] == $itemID){
			$already_exist = 1;

			echo "already exist<br>";
		}
	}


	/* if no duplication  insert to cart */
	if($already_exist != 1){
		$_SESSION["itemID"][$cart_len] = $itemID;
	}
}


/* make session arrays length global */
global $cart_len;

for($i=0; $i<$cart_len; $i++){
	print "<br>cart List: ";
	print $_SESSION["itemID"][$i];

}



?>