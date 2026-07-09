<?php

$id = $_GET['id'];


$ch = curl_init();


curl_setopt(
    $ch,
    CURLOPT_URL,
    "http://localhost:8080/Sistem-Info-Kepegawaian/backend/api/index.php?route=divisi&id=".$id
);


curl_setopt(
    $ch,
    CURLOPT_CUSTOMREQUEST,
    "DELETE"
);


curl_setopt(
    $ch,
    CURLOPT_RETURNTRANSFER,
    true
);


$response = curl_exec($ch);


curl_close($ch);



$result = json_decode($response, true);



echo "<script>
alert('".$result['message']."');
window.location='index.php?page=divisi';
</script>";

exit;