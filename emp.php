<?php
require_once __dir__ . '/vendor/autoload.php';
$con = new MongoDB\Client("mongodb://localhost:27017");
$db = $con->EMPDB;
$collection = $db->EMPLOYEE;

if(isset($_POST['submit']))
{
    $Ename= $_POST['ENAME'];
    $HireDate= $_POST['HIREDATE'];
    $Salary= $_POST['SAL'];
    $selectionADD = $_POST['selectionAdd'];
    $selectionDept = $_POST['selectionDEPT'];
    $selectionMgr = $_POST['selectionMGR'];
    $selectioncar = $_POST['selectionCar'];
    $selectionJob = $_POST['selectionJOB'];
    $commision= $_POST['COMM'];
    $connection = new PDO("mysql:host=localhost;dbname=empdb", 'root', '');  
    $sql="SELECT * FROM `dept` WHERE DNAME ='$selectionDept'";
    $resultset = $connection->prepare($sql);
    $resultset->execute();   
    $rows = $resultset->fetchAll(PDO::FETCH_ASSOC);
    foreach($rows as $row)
    {
        $deptname=$row['DNAME'];
        $deptlocation=$row['Location'];

    }

    if(empty($commision)){
        $commision=null;
    }


    if($selectioncar='null')
    {
        $dept= (object)array("DNAME" => $deptname, "Location" => $deptlocation);
        $document = array( 
            "ENAME" => $Ename, 
            "MGR" => $selectionMgr, 
            "HIREDATE" => $HireDate,
            "Salary" => $Salary,
            "Commision" => $commision,
            "Dept"=> $dept,
            "Job"=>$selectionJob,
            "address" => $selectionADD,
            "car"=> NULL
     );
    }
    else
    {
        $sql="SELECT * FROM `car` WHERE CarID ='$selectioncar'";
        $resultset = $connection->prepare($sql);
        $resultset->execute();   
        $row = $resultset->fetchAll(PDO::FETCH_ASSOC);
        foreach($row as $rows)
        {
            $carmake=$rows['carMake'];
            $carmodel=$rows['carModel'];
            $carcolor=$rows['carColor'];
            $dept= (object)array("DNAME" => $deptname, "Location" => $deptlocation);
            $car= (object)array("carMake"=>$carmake, "carModel"=>$carmodel, "carColor"=>$carcolor);
            $document = array( 
                "ENAME" => $Ename, 
                "MGR" => $selectionMgr, 
                "HIREDATE" => $HireDate,
                "Salary" => $Salary,
                "Commision" => $commision,
                "Dept"=> $dept,
                "Job"=>$selectionJob,
                "address" => $selectionADD,
                "car"=> $car
         );
        }
    } 
 $collection->insertOne($document);
 header("location: HelloMongo.php");

}
?>

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
        <title>Adding employee</title>
        <meta charset="utf-8">
        <meta name = "viewport" content = "width=device-width, initial-scale = 1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    </head>
    <body>
    <div class="container card border-primary mb-3">
    <div class="card-header">Adding Employee TO Mongo Database</div>
    <div class="card-body">
            <form method="post" action="" autocomplete="off">
                <div class="form-group mx-sm-3 mb-2">
                    <label for="ENAME">Employee Name:</label><br>
                    <input type="text" id="ENAME" name="ENAME"><br>
                </div>
                <div class="form-group mx-sm-3 mb-2">
                    <label>Employee Address:</label><br>
                    <select name="selectionAdd">
                    <?php
                    $connection = new PDO("mysql:host=localhost;dbname=empdb", 'root', '');  
                        $sql="SELECT * FROM address";
                        $resultset = $connection->prepare($sql);
                        $resultset->execute();   
                        $rows = $resultset->fetchAll(PDO::FETCH_ASSOC);
                        foreach($rows as $row)
                        {
                            ?>
                            <option><?php echo $row['City']; ?></option>
                            <?php

                        }
                        ?>
                        </select>
                    <br>
                </div>
                <div class="form-group mx-sm-3 mb-2">
                    <label for="JOBID">Employee Job:</label><br>
                    <select name="selectionJOB">
                    <?php
                    $connection = new PDO("mysql:host=localhost;dbname=empdb", 'root', '');  
                        $sql="SELECT * FROM job";
                        $resultset = $connection->prepare($sql);
                        $resultset->execute();   
                        $rows = $resultset->fetchAll(PDO::FETCH_ASSOC);
                        foreach($rows as $row)
                        {
                            ?>
                            <option><?php echo $row['JOBTitle']; ?></option>
                            <?php

                        }
                        ?>
                        </select>
                    <br>
                </div>
                <div class="form-group mx-sm-3 mb-2">
                    <label for="MGR">select Manager:</label><br>
                    <select name="selectionMGR">
                    <?php
                    $connection = new PDO("mysql:host=localhost;dbname=empdb", 'root', '');  
                        $sql="SELECT * FROM employee";
                        $resultset = $connection->prepare($sql);
                        $resultset->execute();   
                        $rows = $resultset->fetchAll(PDO::FETCH_ASSOC);
                        foreach($rows as $row)
                        {
                            ?>
                            <option><?php echo $row['ENAME']; ?></option>
                            <?php

                        }
                        ?>
                        </select>
                        <br>
                </div>
                <div class="form-group mx-sm-3 mb-2">
                        <label for="HIREDATE">Hire date:</label><br>
                        <input type="date" id="HIREDATE" name="HIREDATE"><br>
                </div>
                <div class="form-group mx-sm-3 mb-2">
                        <label for="SAL">Salary:</label><br>
                        <input type="number" id="SAL" name="SAL"><br>
                </div>
                <div class="form-group mx-sm-3 mb-2">
                        <label for="COMM">Commsion:</label><br>
                        <input type="number" id="COMM" name="COMM"><br>
                </div>
                <div class="form-group mx-sm-3 mb-2">
                        <label for="dept">Employee Department:</label><br>
                        <select name="selectionDEPT">
                        <?php
                        $connection = new PDO("mysql:host=localhost;dbname=empdb", 'root', '');  
                            $sql="SELECT * FROM dept";
                            $resultset = $connection->prepare($sql);
                            $resultset->execute();   
                            $rows = $resultset->fetchAll(PDO::FETCH_ASSOC);
                            foreach($rows as $row)
                            {
                                ?>
                                <option><?php echo $row['DNAME']; ?></option>
                                <?php
                            }
                            ?>
                            </select>
                            <br>
                </div>
                <div class="form-group mx-sm-3 mb-2">
                    <label for="car">Do you want to assign the employee a car?</label><br>
                    <select name="selectionCar">
                    <option value='null'>NULL</option>
                        <?php
                        $connection = new PDO("mysql:host=localhost;dbname=empdb", 'root', '');  
                            $sql="SELECT * FROM car";
                            $resultset = $connection->prepare($sql);
                            $resultset->execute();   
                            $rows = $resultset->fetchAll(PDO::FETCH_ASSOC);
                            foreach($rows as $row)
                            {
                                ?>
                                <option value="<?php echo $row['CarID']; ?>"> <?php echo $row['carMake']; ?> <?php echo $row['carModel']; ?></option>
                                <?php
                            }
                            ?>
                            </select>
                        <br>
                </div>
                <div class="form-group mx-sm-3 mb-2">
                    <input type="submit" name="submit" class="btn btn-primary btn-md"><br>
                    <button onclick="window.location.href='HelloMongo.php'" class="btn btn-primary btn-md">GO BACK TO THE PREIVOUS PAGE</button><br>

                </div>
            </form>
        </div>
    </div>
    </body>
</head>
</html>
