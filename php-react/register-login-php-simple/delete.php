<?php
header("Access-Control-Allow-Orgin: *");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: POST");
header("Content-Type:application/json;charset=UTF-8");
header("Access-Control-Allow-Headers: Content-type, Access-Control-Allow-Headers, Authorization,X-Requested-With
");




$data = json_decode(file_get_contents("php://input"));

//print_r($data);


$first_name = $data->first_name;
$last_name = $data->last_name;


$email = $data->Email;

$password = $data->Password;


$con = mysqli_connect("localhost:3308", "root", "");

mysqli_select_db($con, "react-login");

$sql = "insert into register( first_name, last_name, email, password)
values( '$first_name', '$last_name ','$email' , '$password ')";


$result = mysqli_query($con, $sql);
if ($result) {
    $respone['data'] = array('status' => 'valid');

    echo json_encode($response);

}

else{
    $respone['data'] = array('status' => 'invalid');

    echo json_encode($response);

}
?>