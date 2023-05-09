<?php
require_once __dir__ . '/vendor/autoload.php';
$con = new MongoDB\Client("mongodb://localhost:27017");
$db = $con->EMPDB;
$collection = $db->EMPLOYEE;
$result = $collection->find(
    [
        "Job"=>"MANAGER",
        "Salary"=>['$gte'=>"2000"],
        "car"=>['$ne'=>null]
    ]
);

    foreach($result as $person){
        echo $person['ENAME']."<br>";
        echo $person['Salary']."<br>";
    }




?>