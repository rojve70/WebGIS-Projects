<?php 

    include 'init.php';

    $request = htmlspecialchars($_POST['request'], ENT_QUOTES);

    if ($request == 'buildings') {
    	$building_database_id = htmlspecialchars($_POST['building_database_id'], ENT_QUOTES);

    	try {

    		$pdo -> query("DELETE from buildings where building_database_id= '$building_database_id' ");

    	} catch(PDOException $e) {
    		echo "ERROR ".$e->getMessage();
    	}
    }

    if ($request == 'pipelines') {
    	$pipeline_database_id = htmlspecialchars($_POST['pipeline_database_id'], ENT_QUOTES);

    	try {

    		$pdo -> query("DELETE from pipelines where pipeline_database_id= '$pipeline_database_id' ");

    	} catch(PDOException $e) {
    		echo "ERROR ".$e->getMessage();
    	}
    }

    if ($request == 'valve') {
    	$valve_database_id = htmlspecialchars($_POST['valve_database_id'], ENT_QUOTES);

    	try {

    		$pdo -> query("DELETE from valves where valve_database_id= '$valve_database_id' ");

    	} catch(PDOException $e) {
    		echo "ERROR ".$e->getMessage();
    	}
    }

 ?>