<?php 

   include 'init.php';

   $table = htmlspecialchars($_POST['table'], ENT_QUOTES);
   $dma_id = htmlspecialchars($_POST['dma_id'], ENT_QUOTES);

   //→ Both are PHP functions*********************************************

   //json_encode()
   //→ PHP variable (array or object) to JSON (JavaScript Object Notation)

   //json_decode()
   //→ JSON (JavaScript Object Notation) to PHP variable (array or object)

   //*********************************************************************

   //*************Create Feature Collection*******************************

   if ($table == 'valves') {
      $dma_id_field = "valve_dma_id";
   }
   if ($table == 'pipelines') {
      $dma_id_field = "pipeline_dma_id";
   }
   if ($table == 'buildings') {
      $dma_id_field = "building_dma_id";
   }

   try {

   	  $result = $pdo -> query("SELECT *, ST_AsGeoJSON(geom) as geojson from {$table} where {$dma_id_field} = '$dma_id' ");
   	  $features = [];

   	   foreach ($result as $row) {
   	      unset($row['geom']);
   	    	$geometry = json_decode($row['geojson']); 
   	    	
   	    	unset($row['geojson']);               

   	    	$feature = ["type"=>"Feature", "geometry"=>$geometry, "properties"=>$row];
   	    	//print_r($feature);
   	    	array_push($features, $feature);
   	    	
   	   }
   	    //*********Develop FeatureCollection*****************

   	   $featureCollection = ["type"=>"FeatureCollection", "features"=>$features];
   	   echo json_encode($featureCollection);



   } catch(PDOException $e) {
   	 echo "ERROR ".$e->getMessage();

   }

   // include 'init.php';

   // $table = htmlspecialchars($_POST['table'], ENT_QUOTES);
   // $dma_id = isset($_POST['dma_id']) ? htmlspecialchars($_POST['dma_id'], ENT_QUOTES) : null;

   // // Determine which DMA field to use based on table
   // if ($table == 'valves') {
   //     $dma_id_field = "valve_dma_id";
   // } elseif ($table == 'pipelines') {
   //     $dma_id_field = "pipeline_dma_id";
   // } elseif ($table == 'buildings') {
   //     $dma_id_field = "building_dma_id";
   // } else {
   //     echo "ERROR: Unknown table.";
   //     exit();
   // }

   // try {
   //     $query = "SELECT *, ST_AsGeoJSON(geom) as geojson FROM {$table}";
   //     if ($dma_id) {
   //         $query .= " WHERE {$dma_id_field} = '$dma_id'";
   //     }

   //     $result = $pdo->query($query);
   //     $features = [];

   //     foreach ($result as $row) {
   //         unset($row['geom']);
   //         $geometry = json_decode($row['geojson']); 
   //         unset($row['geojson']);               
   //         $feature = ["type" => "Feature", "geometry" => $geometry, "properties" => $row];
   //         array_push($features, $feature);
   //     }

   //     $featureCollection = ["type" => "FeatureCollection", "features" => $features];
   //     echo json_encode($featureCollection);

   // } catch (PDOException $e) {
   //     echo "ERROR " . $e->getMessage();
   // }

?> 

