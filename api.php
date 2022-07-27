<?php

$curl = curl_init();

curl_setopt_array($curl, [
  CURLOPT_URL => "https://devpdc-api.pengadaan.com/vendor/keuangan",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "GET",
  CURLOPT_POSTFIELDS => "",
  CURLOPT_HTTPHEADER => [
    "Authorization: Bearer eyJhbGciOiJIUzUxMiJ9.eyJzdWIiOiI4YzY3ZDI1MC1mMjY5LTQwZDItYjU4Yy0wNGJjMmRkNzQ0NTUiLCJpYXQiOjE2NTgyMzg1NTEsImV4cCI6MTY1ODI0MjE1MSwianRpIjoiNzQiLCJ0eXBlIjoxLCJpc3MiOiJwZW5nYWRhYW4tYXBpIn0.Ifv-NuC4CEZJKgVgqN0jIHaKyl-AmSmRecsGrt5d3T9LrS6p4WJFcpgaiuigL9-UURQ3x8T40hExLY8qzMn_Vg"
  ],
]);

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
} else {
  echo $response;
}
?>
