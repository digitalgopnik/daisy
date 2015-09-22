<?php
	//define Datasources
	$prod = [
		//hier die Daten der Produktivumgebung später
	];
	$maxbook = [
		'host' => 'localhost',
		'username' => 'root',
		'password' => '',
		'database' => 'daisy'
	];

	$ratzbook = [
		'host' => 'localhost',
        'username' => 'root',
        'password' => '',
        'database' => ''
	];
	//$ratzbook = $maxn; //das hier auskommentieren


	//choose the right datasource by hostname
	$datasource = $prod;
	switch(gethostname()) {
		case "RatzBook.local":
			$datasource = $ratzbook;
			break;
		case "MaxBook.local":
			$datasource = $maxbook;
			break;
		// case "max-n.de":
		// 	$datasource = $maxn;
		// 	break;
		// case "pes-prod-hostname?": //dies mit dem richtigen hostname füllen (über ssh "hostname" eingeben)
		// 	$datasource = $prod;
		default:
			$datasource = $prod;
	}

	// array_push(	$config["Datasources"]["default"],
	// 			$datasource);
	foreach($datasource as $key => $value) {
		$config["Datasources"]["default"][$key]=$value;
	}
	//echo json_encode($config);
?>
