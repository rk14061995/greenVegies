<?php

$getdata = http_build_query(
array(
    'app_id' => '84vAQ9EjzfMfNKouKeB1',
    'app_code' => '6xRmnAWLRtmjmhDusj6Mbw',
  'product'=>'forecast_astronomy',
'name'=>$_POST['get_city'],


    // 'jsoncallback'=>'myCallbackFunction'
 )
);

$opts = array('http' =>
 array(
  'header' => "Content-Type: application/x-www-form-urlencoded\r\n".
                    "Content-Length: ".strlen($getdata)."\r\n".
                    "User-Agent:MyAgent/1.0\r\n",
    'method'  => 'GET',
    'content' => $getdata
)
);

$context  = stream_context_create($opts);    
 $result = file_get_contents('https://weather.api.here.com/weather/1.0/report.json?'.$getdata, false, $context);
die($result);
?>