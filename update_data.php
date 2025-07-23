<?php 

    include 'init.php';

    $request = htmlspecialchars($_POST['request'], ENT_QUOTES);

    if ($request == 'buildings') {
    	$building_database_id = htmlspecialchars($_POST['building_database_id'], ENT_QUOTES);
    	$account_no_old = htmlspecialchars($_POST['account_no_old'], ENT_QUOTES);
    	$account_no = htmlspecialchars($_POST['account_no'], ENT_QUOTES);
    	$building_category = htmlspecialchars($_POST['building_category'], ENT_QUOTES);
    	$building_storey = htmlspecialchars($_POST['building_storey'], ENT_QUOTES);
    	$building_population = htmlspecialchars($_POST['building_population'], ENT_QUOTES);
    	$building_location = htmlspecialchars($_POST['building_location'], ENT_QUOTES);
    	$building_dma_id = htmlspecialchars($_POST['building_dma_id'], ENT_QUOTES);

    	try {

    		if ($account_no_old != $account_no) {
    			$result = $pdo -> query("SELECT *from buildings where account_no = '$account_no' ");

    			if ($result -> rowCount()>0) {
    				echo "ERROR: Account Number already exists for another building. Please choose a new Account Numnber!";
    			} else {
    				$pdo -> query("UPDATE buildings set account_no = '$account_no', building_category = '$building_category', building_storey = '$building_storey', building_population = '$building_population', building_location = '$building_location', building_dma_id = '$building_dma_id' where building_database_id = '$building_database_id' ");
    			}
    		} else {
    			$pdo -> query("UPDATE buildings set account_no = '$account_no', building_category = '$building_category', building_storey = '$building_storey', building_population = '$building_population', building_location = '$building_location', building_dma_id = '$building_dma_id' where building_database_id = '$building_database_id' ");
    		}

    	} catch(PDOException $e) {
    		echo "ERROR ".$e->getMessage();
    	}
    }

    if ($request == 'pipelines') {
    	$pipeline_database_id = htmlspecialchars($_POST['pipeline_database_id'], ENT_QUOTES);
    	$pipeline_id_old = htmlspecialchars($_POST['pipeline_id_old'], ENT_QUOTES);
    	$pipeline_id = htmlspecialchars($_POST['pipeline_id'], ENT_QUOTES);
    	$pipeline_dma_id = htmlspecialchars($_POST['pipeline_dma_id'], ENT_QUOTES);
    	$pipeline_diameter = htmlspecialchars($_POST['pipeline_diameter'], ENT_QUOTES);
    	$pipeline_location = htmlspecialchars($_POST['pipeline_location'], ENT_QUOTES);
    	$pipeline_category = htmlspecialchars($_POST['pipeline_category'], ENT_QUOTES);
    	$length = htmlspecialchars($_POST['length'], ENT_QUOTES);


    	try {

    		if ($pipeline_id_old != $pipeline_id) {
    			$result = $pdo -> query("SELECT *from pipelines where pipe_id = '$pipeline_id' ");

    			if ($result -> rowCount()>0) {
    				echo "ERROR: Pipeline ID already exists. Please choose a new ID";
    			} else {
    				$pdo -> query("UPDATE pipelines set pipe_id = '$pipeline_id', pipeline_dma_id = '$pipeline_dma_id', pipeline_diameter = '$pipeline_diameter', pipeline_location = '$pipeline_location', pipeline_category='$pipeline_category', length='$length' where pipeline_database_id = '$pipeline_database_id'");
    			}
    		} else {
    			$pdo -> query("UPDATE pipelines set pipe_id = '$pipeline_id', pipeline_dma_id = '$pipeline_dma_id', pipeline_diameter = '$pipeline_diameter', pipeline_location = '$pipeline_location', pipeline_category='$pipeline_category', length='$length' where pipeline_database_id = '$pipeline_database_id'");
    		}

    	} catch(PDOException $e) {
    		echo "ERROR ".$e->getMessage();
    	}
    }

    if ($request == 'valve') {
    	$valve_database_id = htmlspecialchars($_POST['valve_database_id'], ENT_QUOTES);
    	$valve_id_old = htmlspecialchars($_POST['valve_id_old'], ENT_QUOTES);
    	$valve_id = htmlspecialchars($_POST['valve_id'], ENT_QUOTES);
    	$valve_dma_id = htmlspecialchars($_POST['valve_dma_id'], ENT_QUOTES);
    	$valve_type = htmlspecialchars($_POST['valve_type'], ENT_QUOTES);
    	$valve_diameter = htmlspecialchars($_POST['valve_diameter'], ENT_QUOTES);
    	$valve_location = htmlspecialchars($_POST['valve_location'], ENT_QUOTES);
    	$valve_visibility = htmlspecialchars($_POST['valve_visibility'], ENT_QUOTES);


    	try {

    		if ($valve_id_old != $valve_id) {
    			$result = $pdo -> query("SELECT *from valves where valve_id = '$valve_id' ");

    			if ($result -> rowCount()>0) {
    				echo "ERROR: Valve ID already exists. Please choose a new ID";
    			} else {
    				$pdo -> query("UPDATE valves set valve_id = '$valve_id', valve_dma_id = '$valve_dma_id', valve_type = '$valve_type', valve_diameter = '$valve_diameter', valve_location = '$valve_location', valve_visibility = '$valve_visibility' where valve_database_id = '$valve_database_id' ");
    			}
    		} else {
    			$pdo -> query("UPDATE valves set valve_id = '$valve_id', valve_dma_id = '$valve_dma_id', valve_type = '$valve_type', valve_diameter = '$valve_diameter', valve_location = '$valve_location', valve_visibility = '$valve_visibility' where valve_database_id = '$valve_database_id' ");
    		}

    	} catch(PDOException $e) {
    		echo "ERROR ".$e->getMessage();
    	}
    }

 ?>