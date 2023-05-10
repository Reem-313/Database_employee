<?php 
/** Connection with postgresql **/
/** Connection with mysql **/
$connection = new PDO("mysql:host=localhost;dbname=empdb", 'root', '');  
/** Preparation and execution of the query **/

if(isset($_POST['submit']))
{
    $Deptname= $_POST['DeptName'];
    $location= $_POST['location'];
    $sql="INSERT into Dept (DNAME, location) VALUES ('$Deptname', '$location')";
    $resultset = $connection->prepare($sql);
    $resultset->execute();
    header("location: HelloSQL.php");

}
/** Disconnection **/
$connection=null;
?>

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>ADD DEPARTMENT SQL</title>
    <meta charset="utf-8">
    <meta name = "viewport" content = "width=device-width, initial-scale = 1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    </head>
    <body>
    <div class="container card border-primary mb-3">
    <div class="card-header">Adding Department TO SQL Database</div>
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
                    <button onclick="window.location.href='HelloSQL.php'" class="btn btn-primary btn-md">GO BACK TO THE PREIVOUS PAGE</button><br>
                </div>
        </div>
    </div>
    </body>
</head>
</html>

