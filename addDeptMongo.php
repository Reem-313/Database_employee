<?php 
require_once __dir__ . '/vendor/autoload.php';
$con = new MongoDB\Client("mongodb://localhost:27017");
$db = $con->EMPDB;
$collection = $db->Departments;

if(isset($_POST['submit']))
{
    $Dname= $_POST['DeptName'];
    $loc= $_POST['location'];

    $document = array( 
        "DNAME" => $Dname, 
        "Location" => $loc, 

 );
 $collection->insertOne($document);
 header("location: HelloMongo.php");


}

?>

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>ADD DEPARTMENT MONGO</title>
    <meta charset="utf-8">
    <meta name = "viewport" content = "width=device-width, initial-scale = 1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    </head>
    <body>
        <h1>MONGO DEPARTMENTS</h1>#
        <div class="container card border-primary mb-3">
        <div class="card-header">Adding Department TO MONGO Database</div>
        <div class="card-body">
            <form method="post" action="" autocomplete="off">
            <div class="form-group mx-sm-3 mb-2">

                <label for="DeptName">Department:</label><br>
                <input type="text" id="DeptName" name="DeptName" required value=""><br>
            </div>
            <div class="form-group mx-sm-3 mb-2">
                <label for="location">Location:</label><br>
                <input type="text" id="location" name="location" required value=""><br>
            </div>
            <div class="form-group mx-sm-3 mb-2">
                <input type="submit" name="submit" class="btn btn-primary btn-md"><br>
            </div>
            </form>
            <div class="form-group mx-sm-3 mb-2">
                    <button onclick="window.location.href='HelloMongo.php'" class="btn btn-primary btn-md">GO BACK TO THE PREIVOUS PAGE</button><br>
                </div>
        </div>
    </body>
</head>
</html>