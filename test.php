<?php

$apiKey = trim(file_get_contents("./config"));
$data =
'{
 "requests": [
  {
   "features": [
    {
     "type": "LABEL_DETECTION"
    }
   ],
   "image": {
    "source": {
     "gcsImageUri": "https://images-na.ssl-images-amazon.com/images/G/01/img15/pet-products/small-tiles/23695_pets_vertical_store_dogs_small_tile_8._CB312176604_.jpg"
    }
   }
  }
 ]
}';

$opts = array('http' =>
  array(
    'method'  => 'POST',
    'header'  => "content-type:  application/json; charset=UTF-8\r\nContent-Length: " . strlen($data) . "\r\n",
    'content' => $data,
    'timeout' => 60
  )
);

$context  = stream_context_create($opts);
$url = "https://vision.googleapis.com/v1/images:annotate?key=$apiKey";
$result = file_get_contents($url, false, $context);
var_dump($result);
