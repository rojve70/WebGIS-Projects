<?php 

	include 'init.php';

	$request = htmlspecialchars($_POST['request'], ENT_QUOTES);

	if ($request == 'valves') {
		$valve_id = htmlspecialchars($_POST['valve_id'], ENT_QUOTES);
		$valve_type = htmlspecialchars($_POST['valve_type'], ENT_QUOTES);
		$valve_dma_id = htmlspecialchars($_POST['valve_dma_id'], ENT_QUOTES);
		$valve_diameter = htmlspecialchars($_POST['valve_diameter'], ENT_QUOTES);
		$valve_visibility = htmlspecialchars($_POST['valve_visibility'], ENT_QUOTES);
		$valve_location = htmlspecialchars($_POST['valve_location'], ENT_QUOTES);
		$valve_geometry = $_POST['valve_geometry'];

		$result = $pdo -> query("SELECT *from valves where valve_id= '$valve_id'");

		if ($result->rowCount()>0) {
			echo "ERROR: Valve ID already exists. Please choose a new ID";
		} else {
			$pdo -> query("INSERT INTO valves(valve_id, valve_type, valve_dma_id, valve_diameter, valve_visibility, valve_location, geom) values ('$valve_id', '$valve_type', '$valve_dma_id', '$valve_diameter', '$valve_visibility', '$valve_location', ST_SetSRID(ST_GeomFromGeoJSON('$valve_geometry'),4326)) ");
		}

	}


	if ($request == 'pipelines') {
		$pipeline_id = htmlspecialchars($_POST['pipeline_id'], ENT_QUOTES);
		$pipeline_category = htmlspecialchars($_POST['pipeline_category'], ENT_QUOTES);
		$pipeline_dma_id = htmlspecialchars($_POST['pipeline_dma_id'], ENT_QUOTES);
		$pipeline_diameter = htmlspecialchars($_POST['pipeline_diameter'], ENT_QUOTES);
		$pipeline_method = htmlspecialchars($_POST['pipeline_method'], ENT_QUOTES);
		$pipeline_location = htmlspecialchars($_POST['pipeline_location'], ENT_QUOTES);
		$pipeline_geometry = $_POST['pipeline_geometry'];

		$result = $pdo -> query("SELECT *from pipelines where pipe_id= '$pipeline_id'");

		if ($result->rowCount()>0) {
			echo "ERROR: Pipeline ID already exists. Please choose a new ID";
		} else {
			$sql = $pdo -> query("INSERT INTO pipelines(pipe_id, pipeline_category, pipeline_dma_id, pipeline_diameter, pipeline_method, pipeline_location, geom) VALUES ('$pipeline_id', '$pipeline_category', '$pipeline_dma_id', '$pipeline_diameter', '$pipeline_method', '$pipeline_location', ST_SetSRID(ST_GeomFromGeoJSON('$pipeline_geometry'),4326)) ");
			print_r($sql);
		}

	}

	if ($request == 'buildings') {

		$account_no = htmlspecialchars($_POST['account_no'], ENT_QUOTES);
		$building_category = htmlspecialchars($_POST['building_category'], ENT_QUOTES);
		$building_dma_id = htmlspecialchars($_POST['building_dma_id'], ENT_QUOTES);
		$building_storey = htmlspecialchars($_POST['building_storey'], ENT_QUOTES);
		$building_population = htmlspecialchars($_POST['building_population'], ENT_QUOTES);
		$building_location = htmlspecialchars($_POST['building_location'], ENT_QUOTES);
		$building_geometry = $_POST['building_geometry'];

		$result = $pdo -> query("SELECT *from buildings where account_no= '$account_no'");

		if ($result->rowCount()>0) {
			echo "ERROR: Account no already exists for another building. Please choose a new Account No.";
		} else {
			$sql = $pdo -> query("INSERT INTO buildings(account_no, building_category, building_dma_id, building_storey, building_population, building_location, geom) VALUES ('$account_no', '$building_category', '$building_dma_id', '$building_storey', '$building_population', '$building_location', ST_SetSRID(ST_GeomFromGeoJSON('$building_geometry'), 4326) )");
		}
	}	


 ?>