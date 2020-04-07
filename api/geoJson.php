<?php
# https://stackoverflow.com/questions/31885031/formatting-json-to-geojson-via-php
include "db.php";

$date = date('d-m-Y h:i:s a', time());

$sql = "SELECT * FROM `provider`";

$result = $mysqli->query($sql);

$data = array(); //setting up an empty PHP array for the data to go into

if($result) {
  while ($row = mysqli_fetch_assoc($result))
  {
    $data[] = $row;
  }
}

$jsonData =json_encode($data);
$original_data = json_decode($jsonData, true);
$features = array();
foreach($original_data as $key => $value) {
    $features[] = array(
        "type" => $value["feat_type"],
        "geometry" => array(
          "type" => $value["geo_type"], 
          "coordinates" => array(
              $value["geo_coords_lng"],
              $value["geo_coords_lat"]
          ),
      ),
        "properties" => array(
            "id" => $value["id_provider"],
            "addr" => array(
              "city" => $value["prop_city"],
              "country" => $value["prop_country"],
              "neighborhood" => $value["prop_neighborhood"],
              "number" => $value["prop_number"],
              "postcode" => $value["prop_postcode"],
              "state" => $value["prop_state"],
              "street" => $value["prop_street"]
            ),
            "address" => $value["prop_address"],
            "available" => $value["prop_available"],
            "category" => $value["prop_category"],
            "name" => $value["prop_name"],
            "phone" => $value["prop_cell_phone"],
            "cpf" => $value["prop_cpf"],
            "email" => $value["prop_email"],
            "datetime" => $value["added_datetime"]
        )
    );
}

$new_data = array(
    "copyright" => "(c) 2020 Meu Bairro",
    "type" => "FeatureCollection",
    "timestamp" => "{$date}",
    "features" => $features,
);

/*
  $final_data = json_encode($new_data, JSON_PRETTY_PRINT);
  print_r($final_data);
*/

echo json_encode($new_data)

?>