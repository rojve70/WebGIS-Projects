<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>First Webmap</title>

	<link rel="stylesheet" href="style.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.7.0/leaflet.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="source/jquery-ui.min.css">
	<link rel="stylesheet" href="plugins/sidebar/leaflet-sidebar.css">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/leaflet-easybutton@2/src/easy-button.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
	<link rel="stylesheet" href="https://ppete2.github.io/Leaflet.PolylineMeasure/Leaflet.PolylineMeasure.css">
	<link rel="stylesheet" href="plugins/mouseposition/L.Control.MousePosition.css">
	<link rel="stylesheet" href="https://unpkg.com/@geoman-io/leaflet-geoman-free@latest/dist/leaflet-geoman.css"/>
	<link rel="stylesheet" href="plugins/minimap/Control.MiniMap.css">
	<link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.22.2/dist/sweetalert2.min.css" rel="stylesheet">



	<script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.7.0/leaflet.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.7.0/leaflet-src.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.js"></script>
	<script src="source/jquery-ui.min.js"></script>
	<script src="plugins/sidebar/leaflet-sidebar.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/leaflet-easybutton@2/src/easy-button.js"></script>
	<script src="https://ppete2.github.io/Leaflet.PolylineMeasure/Leaflet.PolylineMeasure.js"></script>
	<script src="plugins/mouseposition/L.Control.MousePosition.js"></script>
	<script src="https://unpkg.com/@geoman-io/leaflet-geoman-free@latest/dist/leaflet-geoman.js"></script>
	<script src="plugins/minimap/Control.MiniMap.js"></script>
	<script src="plugins/ajax/leaflet.ajax.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.22.2/dist/sweetalert2.all.min.js"></script>

	

    <style>
        .bold {
            font-weight: bold;
            font-size: 16px;
        }

        .errorMsg {
            padding: 0;
            text-align: center;
            background-color: darksalmon;
        }

        .new_feature {
            display: none;
        }

        .successMsg {
            text-align: center;
            background-color: #a9dfbf;
            font-weight: bold;
        }

    </style>

</head>
<body>

    <div id="sidebar" class="sidebar collapsed">
        <!-- Nav tabs -->
        <div class="sidebar-tabs">
            <ul role="tablist">
                <li><a href="#home" role="tab"><i class="fa fa-home"></i></a></li>
                <li><a href="#valve" role="tab"><i class="fa fa-puzzle-piece"></i></a></li>
                <li><a href="#pipeline" role="tab"><i class="fa fa-sliders"></i></a></li>
                <li><a href="#building" role="tab"><i class="fa fa-building"></i></a></li>
               
            </ul>
        </div>

        <!-- Tab panes -->
        <div class="sidebar-content">
            <div class="sidebar-pane" id="home">
                <h1 class="sidebar-header">
                    Home
                    <span class="sidebar-close"><i class="fa fa-caret-left"></i></span>
                </h1>

                <div id="divhome" class="col-xs-12">
                    <div class="col-xs-12" style="height: 10px;"></div>
                    
                    <div class="col-xs-12">
                        <p class="text-center bold">Filter an Area</p>
                    </div>

                    <div class="col-xs-12 erroeMsg" id="home_error"></div>

                    <div class="col-xs-12" style="height: 10px;"></div>

                    <div class="form-group">
                        <div class="col-xs-6">
                            <input type="text" id="dma_id" class="form-control" placeholder="DMA ID">
                        </div>
                        <div class="col-xs-6">
                            <button id="filter_dma" class="btn btn primary-btn block">Filter Area</button>                   
                        </div>               
                    </div>
                    <div class="col-xs-12" id="home_information">
                        
                    </div>

                </div>
                
            </div>
            <div class="sidebar-pane" id="valve">
                <h1 class="sidebar-header">
                    Valves
                    <span class="sidebar-close"><i class="fa fa-caret-left"></i></span>
                </h1>

                <div id="divValve" class="col-xs-12">

                    <div class="col-xs-12" style="height: 10px;"></div>
                    
                    <div class="col-xs-12">
                        <p class="text-center bold">Valve Information</p>
                    </div>

                    <div class="col-xs-12 erroeMsg" id="valve_error"></div>

                    <div class="col-xs-12" style="height: 10px;"></div>

                    <div class="form-group">
                        <div class="col-xs-6">
                            <input type="text" id="valve_id" class="form-control" placeholder="Valve ID">
                        </div>
                        <div class="col-xs-6">
                            <button id="findValve" class="btn btn primary-btn block">Find Valve</button>                   
                        </div>               
                    </div>

                    <div class="col-xs-12" style="height: 15px;"></div>

                    <div class="col-xs-12" id="valve_information">
                        
                    </div>

                </div>

                <div class="col-xs-12" style="height: 10px;"></div>

                <div id="newValve" class="col-xs-12">

                    <div class="col-xs-12" style="height: 10px;"></div>
                    
                    <div class="col-xs-8">
                        <button type="button" class="btn btn-info btn-block" id="btn_valve_form">Insert New Valve</button>
                    </div>
                    <div class="col-xs-4">
                        <button type="button" class="btn btn-success btn-block" id="btn_valve_refresh">Refresh</button>
                    </div>

                    <div class="col-xs-12" style="height: 10px;"></div>

                    <div id="new_valve_information" class="col-xs-12 new_feature">
                        
                        <label class="control-lebel col-sm-4" for="valve_id_new">Valve ID</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="valve_id_new" id="valve_id_new">
                        </div>

                        <div class="col-xs-12" style="height: 15px;"></div>

                        <label class="control-lebel col-sm-4" for="valve_type">Valve Type</label>
                        <div class="col-sm-8">
                            <select class="form-control" name="valve_type" id="valve_type">
                                <option value=""></option>
                                <option value="Gate valve">Gate Valve</option>
                                <option value="Washout Valve">Washout Valve</option>
                                <option value="Air Release Valve">Air Release Valve</option>                              
                            </select>
                        </div>

                        <div class="col-xs-12" style="height: 15px;"></div>

                        <label class="control-lebel col-sm-4" for="valve_dma_id">DMA ID</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="valve_dma_id" id="valve_dma_id">
                        </div>

                        <div class="col-xs-12" style="height: 15px;"></div>

                        <label class="control-lebel col-sm-4" for="valve_diameter">Diameter (mm)</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="valve_diameter" id="valve_diameter">
                        </div>

                        <div class="col-xs-12" style="height: 15px;"></div>

                        <label class="control-lebel col-sm-4" for="valve_visibility">Visibility</label>
                        <div class="col-sm-8">
                            <select class="form-control" name="valve_visibility" id="valve_visibility">
                                <option value=""></option>
                                <option value="Visible">Visible</option>
                                <option value="Invisible">Invisible</option>
                            </select>
                        </div>

                        <div class="col-xs-12" style="height: 15px;"></div>

                        <label class="control-lebel col-sm-4" for="valve_location">Location</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="valve_location" id="valve_location">
                        </div>

                        <div class="col-xs-12" style="height: 15px;"></div>

                        <label class="control-lebel col-sm-4" for="valve_geometry">Geometry</label>
                        <div class="col-sm-8">
                            <textarea name="valve_geometry" id="valve_geometry" disabled></textarea>
                        </div>

                        <div class="col-xs-12" style="height: 15px;"></div>

                        <div class="col-sm-6">
                            <button type="button" class="btn btn-danger btn-block" id="btn_valve_cancel">Cancel</button>
                        </div>

                        <div class="col-sm-6">
                            <button type="button" class="btn btn-success btn-block" id="btn_valve_insert">Insert Valve</button>
                        </div>
                  </div>

                </div>  

                <div class="col-xs-12" style="height: 15px;"></div>
                <div id="valve_status" class="col-xs-12 successMsg"></div>
              
            </div>

            <div class="sidebar-pane" id="pipeline">
                <h1 class="sidebar-header">
                    Pipelines
                    <span class="sidebar-close"><i class="fa fa-caret-left"></i></span>
                </h1>

                <div id="divPipeline" class="col-xs-12">

                    <div class="col-xs-12" style="height: 10px;"></div>
                    
                    <div class="col-xs-12">
                        <p class="text-center bold">Pipeline Information</p>
                    </div>

                    <div class="col-xs-12 erroeMsg" id="pipeline_error"></div>

                    <div class="col-xs-12" style="height: 10px;"></div>

                    <div class="form-group">
                        <div class="col-xs-6">
                            <input type="text" id="pipeline_id" class="form-control" placeholder="Pipeline ID">
                        </div>
                        <div class="col-xs-6">
                            <button id="findPipeline" class="btn btn primary-btn block">Find Pipeline</button>                   
                        </div>               
                    </div>


                    <div class="col-xs-12" id="pipeline_information">
                        
                    </div>

                </div>

                <div class="col-xs-12" style="height: 10px;"></div>

                <div id="newPipelene" class="col-xs-12">

                    <div class="col-xs-12" style="height: 10px;"></div>
                    
                    <div class="col-xs-8">
                        <button type="button" class="btn btn-info btn-block" id="btn_pipeline_form">Insert New Pipeline</button>
                    </div>
                    <div class="col-xs-4">
                        <button type="button" class="btn btn-success btn-block" id="btn_pipeline_refresh">Refresh</button>
                    </div>

                    <div class="col-xs-12" style="height: 10px;"></div>

                    <div id="new_pipeline_information" class="col-xs-12 new_feature">
                        
                        <label class="control-label col-sm-4" for="new_pipeline_id">Pipe ID</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="new_pipeline_id" id="new_pipeline_id">
                        </div>

                        <div class="col-xs-12" style="height: 15px;"></div>

                        <label class="control-lebel col-sm-4" for="pipeline_category">Category</label>
                        <div class="col-sm-8">
                            <select class="form-control" name="pipeline_category" id="pipeline_category">
                                <option value=""></option>
                                <option value="Distribution Pipeline">Distribution Pipeline</option>
                                <option value="Reticulation Pipeline">Reticulation Pipeline</option>
                                <option value="Transmission Pipeline">Transmission Pipeline</option>
                            </select>
                        </div>

                        <div class="col-xs-12" style="height: 15px;"></div>

                        <label class="control-lebel col-sm-4" for="pipeline_dma_id">DMA ID</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="pipeline_dma_id" id="pipeline_dma_id">
                        </div>

                        <div class="col-xs-12" style="height: 15px;"></div>

                        <label class="control-lebel col-sm-4" for="pipeline_diameter">Diameter (mm)</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="pipeline_diameter" id="pipeline_diameter">
                        </div>

                        <div class="col-xs-12" style="height: 15px;"></div>

                        <label class="control-lebel col-sm-4" for="pipeline_method">Construction Method</label>
                        <div class="col-sm-8">
                            <select class="form-control" name="pipeline_method" id="pipeline_method">
                                <option value=""></option>
                                <option value="OT">OT</option>
                                <option value="HDD">HDD</option>
                            </select>
                        </div>

                        <div class="col-xs-12" style="height: 15px;"></div>

                        <label class="control-lebel col-sm-4" for="pipeline_location">Location</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="pipeline_location" id="pipeline_location">
                        </div>

                        <div class="col-xs-12" style="height: 15px;"></div>

                        <label class="control-lebel col-sm-4" for="pipeline_geometry">Geometry</label>
                        <div class="col-sm-8">
                            <textarea name="pipeline_geometry" id="pipeline_geometry" disabled></textarea>
                        </div>

                        <div class="col-xs-12" style="height: 15px;"></div>

                        <div class="col-sm-6">
                            <button type="button" class="btn btn-danger btn-block" id="btn_pipeline_cancel">Cancel</button>
                        </div>

                        <div class="col-sm-6">
                            <button type="button" class="btn btn-success btn-block" id="btn_pipeline_insert">Insert Pipeline</button>
                        </div>
                    </div>

                </div> 

                <div class="col-xs-12" style="height: 15px;"></div>
                <div id="pipeline_status" class="col-xs-12 successMsg"></div>

            </div>

            <div class="sidebar-pane" id="building">
                <h1 class="sidebar-header">
                    Buildings
                    <span class="sidebar-close"><i class="fa fa-caret-left"></i></span>
                </h1>

                <div id="divBuilding" class="col-xs-12">

                    <div class="col-xs-12" style="height: 10px;"></div>
                    
                    <div class="col-xs-12">
                        <p class="text-center bold">Building Information</p>
                    </div>

                    <div class="col-xs-12 erroeMsg" id="building_error"></div>

                    <div class="col-xs-12" style="height: 10px;"></div>

                    <div class="form-group">
                        <div class="col-xs-6">
                            <input type="text" id="building_id" class="form-control" placeholder="Building Account Number">
                        </div>
                        <div class="col-xs-6">
                            <button id="findBuilding" class="btn btn primary-btn block">Find Building</button>                   
                        </div>               
                    </div>

                    <div class="col-xs-12" style="height: 15px;"></div>

                </div>

                <div class="col-xs-12" style="height: 10px;"></div>

                <div id="newBuilding" class="col-xs-12">

                    <div class="col-xs-12" style="height: 10px;"></div>
                    
                    <div class="col-xs-8">
                        <button type="button" class="btn btn-info btn-block" id="btn_building_form">Insert New Building</button>
                    </div>
                    <div class="col-xs-4">
                        <button type="button" class="btn-success btn-block" id="btn_building_refresh">Refresh</button>
                    </div>

                    <div class="col-xs-12" style="height: 10px;"></div>

                    <div id="new_building_information" class="col-xs-12 new_feature">
                        
                        <label class="control-lebel col-sm-4" for="new_building_id">Building ID</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="new_building_id" id="new_building_id">
                        </div>

                        <div class="col-xs-12" style="height: 15px;"></div>

                        <label class="control-lebel col-sm-4" for="building_category">Category</label>
                        <div class="col-sm-8">
                            <select class="form-control" name="building_category" id="building_category">
                                <option value=""></option>
                                <option value="Building">Building</option>
                                <option value="Tin Shed">Tin Shed</option>
                                <option value="Under Construction">Under Construction</option>
                                <option value="semi paka">semi paka</option>
                                <option value="Open Plot">Open Plot</option>
                            </select>
                        </div>

                        <div class="col-xs-12" style="height: 15px;"></div>

                        <label class="control-lebel col-sm-4" for="building_dma_id">DMA ID</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="building_dma_id" id="building_dma_id">
                        </div>

                        <div class="col-xs-12" style="height: 15px;"></div>

                        <label class="control-lebel col-sm-4" for="building_storey">Storey</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="building_storey" id="building_storey">
                        </div>

                        <div class="col-xs-12" style="height: 15px;"></div>

                        <label class="control-lebel col-sm-4" for="building_population">Population</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="building_population" id="building_population">
                        </div>

                        <div class="col-xs-12" style="height: 15px;"></div>

                        <label class="control-lebel col-sm-4" for="building_location">Location</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="building_location" id="building_location">
                        </div>

                        <div class="col-xs-12" style="height: 15px;"></div>

                        <label class="control-lebel col-sm-4" for="building_geometry">Geometry</label>
                        <div class="col-sm-8">
                            <textarea name="building_geometry" id="building_geometry" disabled></textarea>
                        </div>

                        <div class="col-xs-12" style="height: 15px;"></div>

                        <div class="col-sm-6">
                            <button type="button" class="btn btn-danger btn-block" id="btn_building_cancel">Cancel</button>
                        </div>

                        <div class="col-sm-6">
                            <button type="button" class="btn btn-success btn-block" id="btn_building_insert">Insert Building</button>
                        </div>
                    </div>

                </div>   


                <div class="col-xs-12" style="height: 15px;"></div>
                <div id="building_status" class="col-xs-12 successMsg"></div>
                
            </div>
           
        </div>

    </div>


	<div id="mapdiv" class="col-md-12"></div>

	<script>

        // Global_variable

		var mymap;
		var baseLayers;
		var overlays
        var lyrSearch;

        var layerValves;
        var layerPipelines;
        var layerBuildings;
        var raster_data;

        var valves_array = [];
        var pipelines_array = [];
        var buildings_array = [];

        var dma_id;


		
        // initialize the map on the "map" div with a given center and zoom
        mymap = L.map('mapdiv', {
            center: [23.8052, 90.4601],
            zoom: 12,
            attributionControl: false,
            zoomControl: false
        });

        // Add base layer

        var GoogleStreets = L.tileLayer('http://{s}.google.com/vt/lyrs=m&x={x}&y={y}&z={z}', {
            maxZoom: 23,
            subdomains:['mt0','mt1','mt2','mt3']
        });

        var OpenStreetMap = L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png?', {maxZoom:23});

        var CartoDB_Positron = L.tileLayer('https://{s}.basemaps.cartocdn.com/light_all/{z}/{x}/{y}{r}.png', {maxZoom: 23});

        var Esri_WorldImagery = L.tileLayer('https://server.arcgisonline.com/ArcGIS/rest/services/World_Imagery/MapServer/tile/{z}/{y}/{x}', {maxZoom: 23});

        var Esri_WorldImagery_Minimap = L.tileLayer('https://server.arcgisonline.com/ArcGIS/rest/services/World_Imagery/MapServer/tile/{z}/{y}/{x}', {maxZoom: 23});

        var OpenTopoMap = L.tileLayer('https://{s}.tile.opentopomap.org/{z}/{x}/{y}.png', {maxZoom: 23});

        GoogleStreets.addTo(mymap);  


        //SIDEBAR

        var sidebar = L.control.sidebar('sidebar', {
            position: 'left'
        });

        mymap.addControl(sidebar); 

        //EASY BUTTON

        //L.easyButton('glyphicon-transfer', function(){
            //sidebar.toggle();

        //}).addTo(mymap); 

        

        //ZOOM CONTROL

        L.control.zoom({position:'topright'}).addTo(mymap);

        //LAYER CONTROL

        baseLayers = {
            "Google Streets": GoogleStreets,
            "OSM": OpenStreetMap,
            "CartoDB Positron": CartoDB_Positron,
            "Esri Imagery": Esri_WorldImagery, 
            "Open Topo Map": OpenTopoMap

        };

        var control_layers = L.control.layers(baseLayers, overlays).addTo(mymap);

        //POLYLINE MEASURE

        L.control.polylineMeasure({position:'topright'}).addTo(mymap);

        //MOUSE POSITION

        L.control.mousePosition({position:'bottomright'}).addTo(mymap);

        //DRAW CONTROL OR **GEOMAN DOCUMENTATION

        mymap.pm.addControls({  
          position: 'topright',
          drawMarker: true,
          drawPolygon: true,
          drawPolyline: true,  
          drawCircleMarker: false,
          rotateMode: false,
          drawCircle: false,
          drawText: false,
          drawRectangle: false,
          editMode: false,
          dragMode: false,
          cutPolygon: false,
          removalMode: true
        }); 
        
        // listen to vertexes being added to currently drawn layer (called workingLayer)
        mymap.on("pm:create", function(e){
        	//console.log(e);
            var jsn = e.layer.toGeoJSON().geometry;
            //console.log(jsn);
            var jsn_modified;

            if (e.shape == 'Marker') {

                if (confirm("Are you sure you want to add this new Valve?")) {
                    jsn_modified = {type:'Point', coordinates: jsn.coordinates};
                    $("#valve_geometry").val(JSON.stringify(jsn_modified));
                }
            }

            if (e.shape == 'Line') {

                if (confirm("Are you sure you want to add this new Pipeline?")) {
                    jsn_modified = {type:'MultiLineString', coordinates: [jsn.coordinates]};
                    $("#pipeline_geometry").val(JSON.stringify(jsn_modified));
                }               
            }
            
            if (e.shape == 'Polygon') {

                if (confirm("Are you sure you want to add this new Building?")) {
                    jsn_modified = {type:'MultiPolygon', coordinates: [jsn.coordinates]};
                    $("#building_geometry").val(JSON.stringify(jsn_modified));
                }               
            }

        });

        //MINIMAP

        var miniMap = new L.Control.MiniMap(Esri_WorldImagery_Minimap, {
        	position:'bottomright',
        	height:150,
        	width:150
        }).addTo(mymap);

        //SCALE

        L.control.scale({position:'bottomright', maxWidth:'200', imperial:false}).addTo(mymap);

        
        //DATA LOADING OPEARTIONS/AJAX

        //HOME

        $("#filter_dma").click(function() {
            dma_id = $("#dma_id").val();
            
            if (!dma_id) {
                $("#home_error").html("Provide a DMA ID first!");
            } else {
                // dma_id will be considered parameter of this function
                load_valves(dma_id);
                load_pipelines(dma_id); 
                load_buildings(dma_id);
                load_rasterdata(dma_id);
            }
        });

        

        //VALUE

        //var valves = L.geoJSON.ajax('data/valve_105_geojson.geojson', {pointToLayer: style_valves}).addTo(mymap);


        //valves.on('data:loaded', function() {
            
            
        //});*********This portion is out later

        //NEW VALVE

        function load_valves(dma_id) {
            $.ajax({
                url: 'load_data.php',
                data: {table: 'valves', dma_id:dma_id},
                type: 'POST',
                success: function(response) {
                    if (response.trim().substr(0,5)=='ERROR') {
                        console.log(response);
                    } else {
                        var jsnValve = JSON.parse(response);

                        if (layerValves) {
                            layerValves.remove();
                            control_layers.removeLayer(layerValves);
                        }

                        layerValves = L.geoJSON(jsnValve, {pointToLayer: style_valves}).addTo(mymap);
                        control_layers.addOverlay(layerValves, "Valves_105");
                        mymap.fitBounds(layerValves.getBounds());

                    }
                },
                error: function(xhr, status, error) {
                    console.log("ERROR: "+error);
                }
            });
        }

        function refresh_valves(dma_id) {
            $.ajax({
                url: 'load_data.php',
                data: {table: 'valves', dma_id:dma_id},
                type: 'POST',
                success: function(response) {
                    if (response.trim().substr(0,5)=='ERROR') {
                        console.log(response);
                    } else {
                        var jsnValve = JSON.parse(response);

                        if (layerValves) {
                            layerValves.remove();
                            control_layers.removeLayer(layerValves);
                        }

                        layerValves = L.geoJSON(jsnValve, {pointToLayer: style_valves}).addTo(mymap);
                        control_layers.addOverlay(layerValves, "Valves_105");

                    }
                },
                error: function(xhr, status, error) {
                    console.log("ERROR: "+error);
                }
            });
        }

        $("#valve_id").autocomplete({
            source: valves_array
        });

//************************************************************
        //var valves = L.geoJSON.ajax('data/valve_105_geojson.geojson', {
            //pointToLayer: style_valves,
            //onEachFeature: function (feature, layer) {
                //valves_array.push(feature.properties.valve_id);
            //}
        //}).addTo(mymap);

        //valves.on('data:loaded', function () {
            //mymap.fitBounds(valves.getBounds());
            //$("#valve_id").autocomplete({
                source: valves_array
            //});
        //});
//*************************************************************

        function style_valves(json, latlng) {
            var att = json.properties
            var color;
            var fill_color;
            var radius = 5;
            var fill_opacity = 1;

            valves_array.push(att.valve_id);

            //return L.marker(latlng);

            switch (att.valve_type) {
                case 'Air Release Valve':
                    color = '#e74c3c';
                    fill_color = '#e74c3c';
                    break;
                case 'Gate Valve':
                    color = '#9b59b6';
                    fill_color = '#9b59b6';
                    break;
                case 'Washout Valve':
                    color = '#f4d03f';
                    fill_color = '#f4d03f';
                    break;
                default:
                    color = '#1c2833';
                    fill_color = '#1c2833';
                    break;


            }


            //STYLING POINT FEATURE AND TOOLTIP

            var style = {radius:radius, color:color, fillColor:fill_color, fillOpacity:fill_opacity};

            return L.circleMarker(latlng, style).bindTooltip("Valve_ID: "+att.valve_id+"<br>Valve_Type: "+att.valve_type+"<br>Diameter (mm): "+att.valve_diameter+"<br>Location: "+att.valve_location+"<br>Valve DMA ID: "+att.valve_dma_id+"<br>Visibility: "+att.valve_visibility).bindPopup(

                `<div class="popup-container">

                    <input type="hidden" name="valve_database_id" class="updateValve" value='${att.valve_database_id}'>
                    <input type="hidden" name="valve_id_old" class="updateValve" value='${att.valve_id}'>

                    <div class="popup-form-group">

                        <label for="control-lebel popup-lebel">Valve ID</label>
                        <input type="text" class="form-control popup-input text-center updateValve" value='${att.valve_id}' name="valve_id">
                        
                    </div>
                    <div class="popup-form-group">

                        <label for="control-lebel popup-lebel">DMA ID</label>
                        <input type="number" class="form-control popup-input text-center updateValve" value='${att.valve_dma_id}' name="valve_dma_id">
                        
                    </div>
                    <div class="popup-form-group">

                        <label for="control-lebel popup-lebel">Type</label>
                        <input type="text" class="form-control popup-input text-center updateValve" value='${att.valve_type}' name="valve_type">
                        
                    </div>
                    <div class="popup-form-group">

                        <label for="control-lebel popup-lebel">Diameter (mm)</label>
                        <input type="number" class="form-control popup-input text-center updateValve" value='${att.valve_diameter}' name="valve_diameter">
                        
                    </div>
                    <div class="popup-form-group">

                        <label for="control-lebel popup-lebel">Visibility</label> 
                        <input type="text" class="form-control popup-input text-center updateValve" value='${att.valve_visibility}' name="valve_visibility">
                        
                    </div>
                    <div class="popup-form-group">

                        <label for="control-lebel popup-lebel">Location</label>
                        <input type="text" class="form-control popup-input text-center updateValve" value='${att.valve_location}' name="valve_location">
                        
                    </div>
                    <div class="popup-button-group">
                        
                        <button type="submit" class="btn btn-success popup-button" onclick='updateValve()'>Update</button>
                        <button type="submit" class="btn btn-danger popup-button" onclick='deleteValve()'>Delete</button>

                    </div>
                    
                </div>`);
        }

// sweet alert for Valve

        function updateValve(){
            var jsn = returnFormData('updateValve');
            jsn.request = "valve";

            Swal.fire({
                title: "Do you want to save the changes?",
                showDenyButton: true,
                showCancelButton: true,
                confirmButtonText: "Save",
                denyButtonText: `Don't save`
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url:'update_data.php',
                        data: jsn,
                        type:'POST',
                        success:function(response){
                            Swal.fire("Saved!", "", "success");
                            refresh_valves(dma_id);
                        },
                        error:function(error){
                            console.log("ERROR: "+error);
                        }
                    });
                   
                } else if (result.isDenied) {
                    Swal.fire("Changes are not saved", "", "info");
                }
            });
            
        }

        function deleteValve() {
            var jsn = returnFormData('updateValve');
            jsn.request = "valve";

            Swal.fire({
                title: "Do you want to delete this Valve?",
                showDenyButton: true,
                showCancelButton: true,
                confirmButtonText: "delete",
                denyButtonText: `Don't delete`
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url:'delete_data.php',
                        data: jsn,
                        type:'POST',
                        success:function(response){
                            Swal.fire("Deleted!", "", "success");
                            refresh_valves(dma_id);
                        },
                        error:function(error){
                            console.log("ERROR: "+error);
                        }
                    });
                   
                } else if (result.isDenied) {
                    Swal.fire("Valve Not Deleted", "", "info");
                }
            });
        }


        // $("#findValve").click(function() {
        //     var valve_id = $("#valve_id").val();
        //     console.log(valve_id);

        //     var lyr = returnLayerByAttribute(valves, "valve_id", valve_id);
        

        //     if (lyr) {
        //         //console.log(lyr);
        //         var att = lyr.feature.properties;
        //         //console.log(lyr.getLatLng())
        //         if (lyrSearch) {
        //             lyrSearch.remove();
        //         }

        //         lyrsearch = L.circle(lyr.getLatLng(), {radius:10, color:'red', weight:10, opacity:0.6, fillOpacity:0.3}).addTo(mymap);

        //         mymap.setView(lyr.getLatLng(), 21);

        //         valves.bringToFront()

        //         $("#valve_information").html("Valve Type: "+att.type+"<br>DMA ID: "+att.dma_id+"<br>Diameter (mm): "+att.diameter+"<br>Turn Status: "+att.turn+"<br>Visibility: "+att.visibility+"<br>Location: "+att.location);

        //     } else {
        //         $("#valve_error").html("Valve not found!");
        //     }

        // });

// *********Converting the response into map elements****************

        $("#findValve").click(function() {
            var valve_id = $("#valve_id").val();

            returnLayerByAttribute("valves", "valve_id", valve_id, function(lyr) {
                if (lyr) {
                    //console.log(lyr);
                    var att = lyr.feature.properties;
                    //console.log(lyr.getLatLng())
                    if (lyrSearch) {
                        lyrSearch.remove();
                    }

                    lyrsearch = L.circle(lyr.getLatLng(), {radius:15, color:'red', weight:10, opacity:0.6, fillOpacity:0.3}).addTo(mymap);

                    mymap.setView(lyr.getLatLng(), 21);

                    layerValves.bringToFront()

                    $("#valve_information").html("Valve Type: "+att.valve_type+"<br>DMA ID: "+att.valve_dma_id+"<br>Diameter (mm): "+att.valve_diameter+"<br>Remarks : "+att.valve_remarks+"<br>Visibility: "+att.valve_visibility+"<br>Location: "+att.valve_location);

                } else {
                        $("#valve_error").html("Valve not found!");
                }

            });

        });

        $("#btn_valve_form").click(function() {
            $("#new_valve_information").show();
        });

        $("#btn_valve_cancel").click(function() {
            $("#new_valve_information").hide();
        });

        $("#btn_valve_insert").click(function() {
            var valve_type = $("#valve_type").val();
            var valve_id = $("#valve_id_new").val();
            var valve_dma_id = $("#valve_dma_id").val();
            var valve_diameter = $("#valve_diameter").val();
            var valve_visibility = $("#valve_visibility").val();
            var valve_location = $("#valve_location").val();
            var valve_geometry = $("#valve_geometry").val();

            if (valve_id == "" || valve_type == "" || valve_dma_id == "" || valve_geometry == "") {
                $("#valve_status").html("Please fill up all the fields");
            } else {
                $.ajax({

                    url: 'insert_data.php',
                    data: {valve_type:valve_type, valve_id: valve_id, valve_dma_id: valve_dma_id, valve_diameter: valve_diameter, valve_visibility: valve_visibility, valve_location: valve_location, valve_geometry: valve_geometry, request:'valves'},
                    type: 'POST',
                    /*contentType: 'application/x-www-form-urlencoded; charset=UTF-8',*/
                    success: function(response){
                        if (response.trim().substr(0,5)=='ERROR') {
                            console.log(response);
                            $("#valve_status").html(response);
                        } else {
                            $("#valve_status").html("Valve inserted Successfuly!");
                            refresh_valves(dma_id);

                            $("#valve_type").val("");
                            $("#valve_id_new").val("");
                            $("#valve_dma_id").val("");
                            $("#valve_diameter").val("");
                            $("#valve_visibility").val("");
                            $("#valve_location").val("");
                            $("#valve_geometry").val("");
                        }
                    },

                    error: function(xhr, status, error) {
                        $("#valve_status").html(error);
                    } 
                });
            }

        });

        $("#btn_valve_refresh").click(function() {
            refresh_valves(dma_id);
        });


        //PIPELINES

        //var pipelines = L.geoJSON.ajax('data/pipeline_105_geojson.geojson', {style:style_pipelines, onEachFeature: process_pipelines}).addTo(mymap);       


        function load_pipelines(dma_id) {

            $.ajax({
                url: 'load_data.php',
                data: {table: 'pipelines', dma_id:dma_id},
                type: 'POST',
                success: function(response) {
                    if (response.trim().substr(0,5)=='ERROR') {
                        console.log(response);
                    } else {
                        var jsnPipeline = JSON.parse(response);

                        if (layerPipelines) {
                            layerPipelines.remove();
                            control_layers.removeLayer(layerPipelines);
                        }

                        layerPipelines = L.geoJSON(jsnPipeline, {style:style_pipelines, onEachFeature: process_pipelines}).addTo(mymap);
                        control_layers.addOverlay(layerPipelines, "Pipelines_105");
                        
                    }
                },
                error: function(xhr, status, error) {
                    console.log("ERROR: "+error);
                }
            });

        }

        $("#pipeline_id").autocomplete({
            source: pipelines_array
        });

        function style_pipelines(json) {

            var att = json.properties;

            switch (att.pipeline_category) {
                case 'Distribution Pipeline':
                    color = '#52be80';
                    break;
                case 'Reticulation Pipeline':
                    color = '#9b59b6';
                    break;
                case 'Transmission Pipeline':
                    color = '#f4d03f';
                    break;        
                default:
                    color = '#1c2833';
                    break;
                    
            }

            return {color:color};
        }

        function process_pipelines(json, lyr) {

            //console.log(json);
            //console.log(lyr);

            var att = json.properties;

            pipelines_array.push(att.pipe_id);

            lyr.bindTooltip("Pipe ID: "+att.pipe_id+"<br>Diameter: "+att.pipeline_diameter+" mm"+"<br>Category: "+att.pipeline_category+"<br>Pipeline DMA ID: "+att.pipeline_dma_id+"<br>Location: "+att.pipeline_location+"<br>Length: "+att.length+" m").bindPopup(

                `<div class="popup-container">

                    <input type="hidden" name="pipeline_database_id" class="updatePipeline" value='${att.pipeline_database_id}'>
                    <input type="hidden" name="pipeline_id_old" class="updatePipeline" value='${att.pipe_id}'>

                    <div class="popup-form-group">

                        <label for="control-lebel popup-lebel">Pipe ID</label>
                        <input type="text" class="form-control popup-input text-center updatePipeline" value='${att.pipe_id}' name="pipeline_id">
                        
                    </div>
                    <div class="popup-form-group">

                        <label for="control-lebel popup-lebel">DMA ID</label>
                        <input type="text" class="form-control popup-input text-center updatePipeline" value='${att.pipeline_dma_id}'name="pipeline_dma_id">
                        
                    </div>
                    <div class="popup-form-group">

                        <label for="control-lebel popup-lebel">Category</label>
                        <input type="text" class="form-control popup-input text-center updatePipeline" value='${att.pipeline_category}' name="pipeline_category">
                        
                    </div>
                    <div class="popup-form-group">

                        <label for="control-lebel popup-lebel">Diameter (mm)</label>
                        <input type="number" class="form-control popup-input text-center updatePipeline" value='${att.pipeline_diameter}' name="pipeline_diameter">
                        
                    </div>
                    <div class="popup-form-group">

                        <label for="control-lebel popup-lebel">Length</label> 
                        <input type="number" step="any" class="form-control popup-input text-center updatePipeline" value='${att.length}' name="length">
                        
                    </div>
                    <div class="popup-form-group">

                        <label for="control-lebel popup-lebel">Location</label>
                        <input type="text" class="form-control popup-input text-center updatePipeline" value='${att.pipeline_location}' name="pipeline_location">
                        
                    </div>
                    <div class="popup-button-group">
                        
                        <button type="submit" class="btn btn-success popup-button" onclick='updatePipeline()'>Update</button>
                        <button type="submit" class="btn btn-danger popup-button" onclick='deletePipeline()'>Delete</button>

                    </div>
                    
                </div>)`);
            
        }

// sweet alert for Pipeline

        function updatePipeline(){
            var jsn = returnFormData('updatePipeline');
            jsn.request = "pipelines";

            Swal.fire({
                title: "Do you want to save the changes?",
                showDenyButton: true,
                showCancelButton: true,
                confirmButtonText: "Save",
                denyButtonText: `Don't save`
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url:'update_data.php',
                        data: jsn,
                        type:'POST',
                        success:function(response){
                            Swal.fire("Saved!", "", "success");
                            load_pipelines(dma_id);
                        },
                        error:function(error){
                            console.log("ERROR: "+error);
                        }
                    });
                   
                } else if (result.isDenied) {
                    Swal.fire("Changes are not saved", "", "info");
                }
            });
            
        }

        function deletePipeline() {
            var jsn = returnFormData('updatePipeline');
            jsn.request = "pipelines";

            Swal.fire({
                title: "Do you want to delete this Pipeline?",
                showDenyButton: true,
                showCancelButton: true,
                confirmButtonText: "delete",
                denyButtonText: `Don't delete`
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url:'delete_data.php',
                        data: jsn,
                        type:'POST',
                        success:function(response){
                            Swal.fire("Deleted!", "", "success");
                            load_pipelines(dma_id);
                        },
                        error:function(error){
                            console.log("ERROR: "+error);
                        }
                    });
                   
                } else if (result.isDenied) {
                    Swal.fire("Pipeline Not Deleted", "", "info");
                }
            });
        }



        $("#findPipeline").click(function() {
            var pipeline_id = $("#pipeline_id").val();

            returnLayerByAttribute("pipelines", "pipe_id", pipeline_id, function(lyr) {

                if (lyr) {
                
                    var att = lyr.feature.properties;
                
                    if (lyrSearch) {
                    lyrSearch.remove();
                    }

                    //'lyrsearch' portion is circle method used for point feature. So it is not used here.

                    lyrSearch = L.geoJSON(lyr.toGeoJSON(), {
                    style: { color: 'red', weight: 10, opacity: 0.5 }
                    }).addTo(mymap);
;

                    mymap.fitBounds(lyr.getBounds());

                    layerPipelines.bringToFront()

                    $("#pipeline_information").html("Category: "+att.pipeline_category+"<br>DMA ID: "+att.pipeline_dma_id+"<br>Material: "+att.pipeline_material+"<br>Length: "+att.length+"<br>Location: "+att.pipeline_location+"<br>Construction Method: "+att.pipeline_method);

                } else {

                $("#pipeline_error").html("Pipeline not found!");

                }


            });
        

        });

        $("#btn_pipeline_form").click(function() {
            $("#new_pipeline_information").show();
        });

        $("#btn_pipeline_cancel").click(function() {
            $("#new_pipeline_information").hide();
        });

        $("#btn_pipeline_insert").click(function() {
            var pipeline_id = $("#new_pipeline_id").val();
            var pipeline_category = $("#pipeline_category").val();
            var pipeline_dma_id = $("#pipeline_dma_id").val();
            var pipeline_diameter = $("#pipeline_diameter").val();
            var pipeline_method = $("#pipeline_method").val();
            var pipeline_location = $("#pipeline_location").val();
            var pipeline_geometry = $("#pipeline_geometry").val();

            if (pipeline_id == "" || pipeline_category == "" || pipeline_dma_id == "" || pipeline_geometry == "") {
                $("#pipeline_status").html("Please fill up all the fields");
            } else {
                $.ajax({

                    url: 'insert_data.php',
                    data: {pipeline_id:pipeline_id, pipeline_category:pipeline_category, pipeline_dma_id:pipeline_dma_id, pipeline_diameter:pipeline_diameter, pipeline_method:pipeline_method, pipeline_location:pipeline_location, pipeline_geometry:pipeline_geometry, request:'pipelines'},
                    type: 'POST',
                    /*contentType: 'application/x-www-form-urlencoded; charset=UTF-8',*/
                    success: function(response){
                        if (response.trim().substr(0,5)=='ERROR') {
                            console.log(response);
                            $("#pipeline_status").html(response);
                        } else {
                            $("#pipeline_status").html("Pipeline Inserted Successfuly!");
                            load_pipelines(dma_id);

                            $("#new_pipeline_id").val("");
                            $("#pipeline_category").val("");
                            $("#pipeline_dma_id").val("");
                            $("#pipeline_diameter").val("");
                            $("#pipeline_method").val("");
                            $("#pipeline_location").val("");
                            $("#pipeline_geometry").val("");
                        }

                    },

                    error: function(xhr, status, error) {
                        $("#pipeline_status").html(error);
                    }

                });

            } 

        });

        $("#btn_pipeline_refresh").click(function() {
            load_pipelines(dma_id);
        });



        //BUILDINGS

        //var buildings = L.geoJSON.ajax('data/BLD_105_geojson.geojson', {style:style_buildingss, onEachFeature: process_buildings}).addTo(mymap);

        
        function load_buildings(dma_id) {

            $.ajax({
                url: 'load_data.php',
                data: {table: 'buildings', dma_id:dma_id},
                type: 'POST',
                success: function(response) {
                    if (response.trim().substr(0,5)=='ERROR') {
                        console.log(response);
                    } else {
                        var jsnBuilding = JSON.parse(response);

                        if (layerBuildings) {
                            layerBuildings.remove();
                            control_layers.removeLayer(layerBuildings);
                        }

                        layerBuildings = L.geoJSON(jsnBuilding, {style:style_buildingss, onEachFeature: process_buildings}).addTo(mymap);
                        control_layers.addOverlay(layerBuildings, "Buildings_105");
                    }
                },
                error: function(xhr, status, error) {
                    console.log("ERROR: "+error);
                }
            });
        }

        $("#buildings_array").autocomplete({
            source: buildings_array
        });


        function style_buildingss(json) {

            var att = json.properties;
            var storey = att.building_storey;
            var color;
            var fill_color;
            var fill_opacity = 1;

            switch (att.building_category) {
                case 'Building':
                    if (storey >= 10) {
                        color = '#7b241c';
                        fill_color = '#7b241c';
                    } else if (storey >= 8) {
                        color = '#a93226';
                        fill_color = '#a93226';
                    } else if (storey >= 5) {
                        color = '#d98880';
                        fill_color = '#d98880'
                    } else if (storey >= 3) {
                        color = '#f5b7b1';
                        fill_color = '#f5b7b1';
                    } else {
                        color = '#fdedec';
                        fill_color = '#fdedec';
                    }
                    break;
                case 'Tin Shed':
                    color = '#F08080';
                    fill_color = '#F08080';
                    fill_opacity = 0.8;
                    break;
                case 'Open Plot':
                    color = '#FFA07A';
                    fill_color = '#FFA07A';
                    break; 
                default:
                    color = 'black';
                    fill_color = 'black';
                    break;
            }

            return {color:color, fillColor:fill_color, fillOpacity:fill_opacity};
        }

        function process_buildings(json, lyr) {

            var att = json.properties

            buildings_array.push(att.account_no);

            lyr.bindTooltip("Category: "+att.building_category+"<br>Storey: "+att.building_storey+"<br>Building DMA ID: "+att.building_dma_id+"<br>Account Number: "+att.account_no+"<br>Location: "+att.building_location+"<br>Population: "+att.building_population).bindPopup(

                `<div class="popup-container">

                    <input type="hidden" name="building_database_id" class="updateBuilding" value='${att.building_database_id}'>
                    <input type="hidden" name="account_no_old" class="updateBuilding" value='${att.account_no}'>

                    <div class="popup-form-group">

                        <label for="control-lebel popup-lebel">Account No.</label>
                        <input type="text" class="form-control popup-input text-center updateBuilding" value='${att.account_no}' name="account_no">
                        
                    </div>
                    <div class="popup-form-group">

                        <label for="control-lebel popup-lebel">DMA ID</label>
                        <input type="text" class="form-control popup-input text-center updateBuilding" value='${att.building_dma_id}' name="building_dma_id">
                        
                    </div>
                    <div class="popup-form-group">

                        <label for="control-lebel popup-lebel">Category</label>
                        <input type="text" class="form-control popup-input text-center updateBuilding" value='${att.building_category}' name="building_category">
                        
                    </div>
                    <div class="popup-form-group">

                        <label for="control-lebel popup-lebel">Storey</label>
                        <input type="number" class="form-control popup-input text-center updateBuilding" value='${att.building_storey}' name="building_storey">
                        
                    </div>
                    <div class="popup-form-group">

                        <label for="control-lebel popup-lebel">Population</label> 
                        <input type="number" class="form-control popup-input text-center updateBuilding" value='${att.building_population}' name="building_population">
                        
                    </div>
                    <div class="popup-form-group">

                        <label for="control-lebel popup-lebel">Location</label>
                        <input type="text" class="form-control popup-input text-center updateBuilding" value='${att.building_location}' name="building_location">
                        
                    </div>
                    <div class="popup-button-group">
                        
                        <button type="submit" class="btn btn-success popup-button" onclick='updateBuilding()'>Update</button>
                        <button type="submit" class="btn btn-danger popup-button" onclick='deleteBuilding()'>Delete</button>

                    </div>

                </div>`);
        }

// Sweet alert in updateBuilding

        function updateBuilding(){
            var jsn = returnFormData('updateBuilding');
            jsn.request = "buildings";

            Swal.fire({
                title: "Do you want to save the changes?",
                showDenyButton: true,
                showCancelButton: true,
                confirmButtonText: "Save",
                denyButtonText: `Don't save`
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url:'update_data.php',
                        data: jsn,
                        type:'POST',
                        success:function(response){
                            Swal.fire("Saved!", "", "success");
                            load_buildings(dma_id);
                        },
                        error:function(error){
                            console.log("ERROR: "+error);
                        }
                    });
                   
                } else if (result.isDenied) {
                    Swal.fire("Changes are not saved", "", "info");
                }
            });
            
        }

        function deleteBuilding() {
            var jsn = returnFormData('updateBuilding');
            jsn.request = "buildings";

            Swal.fire({
                title: "Do you want to delete this Building?",
                showDenyButton: true,
                showCancelButton: true,
                confirmButtonText: "delete",
                denyButtonText: `Don't delete`
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url:'delete_data.php',
                        data: jsn,
                        type:'POST',
                        success:function(response){
                            Swal.fire("Deleted!", "", "success");
                            load_buildings(dma_id);
                        },
                        error:function(error){
                            console.log("ERROR: "+error);
                        }
                    });
                   
                } else if (result.isDenied) {
                    Swal.fire("Building Not Deleted", "", "info");
                }
            });
        }


        $("#findBuilding").click(function() {
            var account_no = $("#building_id").val();

            returnLayerByAttribute("buildings", "account_no", account_no, function(lyr) {

               if (lyr) {
                
                    var att = lyr.feature.properties;
                
                    if (lyrSearch) {
                        lyrSearch.remove();
                    }

                    //'lyrsearch' portion is circle method used for point feature. So it is not used here.

                    lyrSearch = L.geoJSON(lyr.toGeoJSON(), {
                        style: { color: 'red', weight: 10, opacity: 1, fillOpacity: 0 }
                    }).addTo(mymap);

                    mymap.fitBounds(lyr.getBounds());


                    $("#building_information").html("Category: "+att.building_category+"<br>DMA ID: "+att.building_dma_id+"<br>Storey: "+att.building_storey+"<br>Population: "+att.building_population+"<br>Location: "+att.building_location);

                } else {
                    $("#building_error").html("Building not found!");
                } 

            });
              

        });

        $("#btn_building_form").click(function() {
            $("#new_building_information").show();
        });

        $("#btn_building_cancel").click(function() {
            $("#new_building_information").hide();
        });

        $("#btn_building_insert").click(function() {
            var account_no = $("#new_building_id").val();
            var building_category = $("#building_category").val();
            var building_dma_id = $("#building_dma_id").val();
            var building_storey = $("#building_storey").val();
            var building_population = $("#building_population").val();
            var building_location = $("#building_location").val();
            var building_geometry = $("#building_geometry").val();

            if (account_no == "" || building_category == "" || building_dma_id == "" || building_population == "" || building_location == "" || building_geometry == "") {
                $("#building_status").html("Please fill up all the fields");
            } else {
                $.ajax({

                    url: 'insert_data.php',
                    data: {account_no:account_no, building_category:building_category, building_dma_id:building_dma_id, building_storey:building_storey, building_population:building_population, building_location:building_location, building_geometry:building_geometry, request:'buildings'},

                    type: 'POST',
                    success: function(response){
                        if (response.trim().substr(0,5)=='ERROR') {
                            console.log(response);
                            $("#building_status").html(response);
                        } else {
                            $("#building_status").html("Building Inserted Successfuly!");
                            load_buildings(dma_id);

                            $("#new_building_id").val("");
                            $("#building_category").val("");
                            $("#building_dma_id").val("");
                            $("#building_storey").val("");
                            $("#building_population").val("");
                            $("#building_location").val("");
                            $("#building_geometry").val("");
                        }

                    },

                    error: function(xhr, status, error) {
                        $("#building_status").html(error);
                    }

                });

            } 

        });

        $("#btn_building_refresh").click(function() {
            load_buildings(dma_id);
        });

        // RASTER DATA

        function load_rasterdata(dma_id){
            var path = 'raster_data/' + dma_id + '/{z}/{x}/{y}.png';
            console.log("Loading raster path:", path);
            
            if (raster_data){
                raster_data.remove();
                control_layers.removeLayer(raster_data);
            }

            raster_data = L.tileLayer(path, {tms:1, opacity:1, attribution:"", maxZoom:22});
            control_layers.addOverlay(raster_data, "Drone Image");
        }


        //GENERAL FUNCTION

        /*function returnLayerByAttribute(layer, attribute_name, attribute_value) {

            var all_layers = layer.getLayers();

            for (i=0; i<all_layers.length; i++) {
                var retained_value = all_layers[i].feature.properties[attribute_name];
                if (retained_value == attribute_value) {
                    return all_layers[i];
                }

            }

            return false
        }

        //Querying and Displaying Point Features*/

        function returnLayerByAttribute(table, field, value, callback) {
            $.ajax({
                url:'find_data.php',
                data: {table:table, field:field, value:value},
                type: 'POST',
                success: function(response) {
                    if (response.trim().substr(0,5)=='ERROR') {
                        console.log(response);
                    } else {
                        var jsn = JSON.parse(response);
                        //console.log(jsn);
                        var layer = L.geoJSON(jsn);
                        //console.log(layer);
                        var layers = layer.getLayers();
                        //console.log(layers);

                        if (layers.length>0) {
                            //console.log(layers[0]);
                            callback(layers[0]);
                        } else {
                            callback(false);
                        }
                    }

                },
                error: function(xhr, status, error) {
                    console.log("ERROR: "+error);
                }
            });
        };


        function returnFormData(inpClass) {
            var objFormData = {};

            $("."+inpClass).each(function(){
                objFormData[this.name] = this.value;
            });

            return objFormData;
        }


	</script>
	
</body>
</html>
