<?php
require_once __dir__ . '/vendor/autoload.php';
$con = new MongoDB\Client("mongodb://localhost:27017");
$db = $con->EMPDB;
$collection = $db->EMPLOYEE;
$result = $collection->find(
    [
        "Dept.DNAME"=>"ACCOUNTING",
        "HIREDATE"=>[
            '$gte'=> "1981-06-01",
            '$lt'=> "1982-06-01"
        ]
    ]
);

    foreach($result as $person){
        echo $person['ENAME']."<br>";
        echo $person['HIREDATE']."<br>";
        echo $person['Salary']."<br>";
    }




?>