<?php 
/** Connection with postgresql **/
/** Connection with mysql **/
//https://stackoverflow.com/questions/6882633/php-get-input-radio-selection-data-and-insert-into-mysql-table
$connection = new PDO("mysql:host=localhost;dbname=empdb", 'root', '');  
/** Preparation and execution of the query **/

if(isset($_POST['submit']))
{
    $Ename= $_POST['ENAME'];
    $selectionADD = $_POST['selectionAdd'];
    $selectionJob = $_POST['selectionJOB'];
    $HireDate= $_POST['HIREDATE'];
    $Salary= $_POST['SAL'];
    $commision= $_POST['COMM'];
    $selectionDept = $_POST['selectionDEPT'];
    $selectionMgr = $_POST['selectionMGR'];
    $selectioncar = $_POST['selectionCar'];   
    if(empty($commision)){
        $commision=NULL;
    }
    if($selectioncar='null')
    {
        $sql="INSERT into employee (ENAME, MGR, HIREDATE, Salary, Commision, DeptID, JobID, addressID, carID) VALUES 
        ('$Ename', '$selectionMgr' ,'$HireDate', '$Salary', '$commision', '$selectionDept', '$selectionJob', '$selectionADD', NULL)";
        $resultset = $connection->prepare($sql);
        $resultset->execute();
        
        header("location: HelloSQL.php");
    
    }
    else
    {
        $sql="INSERT into employee (ENAME, MGR, HIREDATE, Salary, Commision, DeptID, JobID, addressID, carID) VALUES 
        ('$Ename', '$selectionMgr' ,'$HireDate', '$Salary', '$commision', '$selectionDept', '$selectionJob', '$selectionADD', '$selectioncar')";
        $resultset = $connection->prepare($sql);
        $resultset->execute();
        header("location: HelloSQL.php");
    
    }


}
/** Disconnection **/
$connection=null;
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
    <div class="card-header">Adding Employee TO SQL Database</div>
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
                    <option value="<?php echo $row['addressID']; ?>"><?php echo $row['City']; ?></option>
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
                    <option value="<?php echo $row['JOBID']; ?>"><?php echo $row['JOBTitle']; ?></option>
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
                    <option value="<?php echo $row['EmployeeID']; ?>"><?php echo $row['ENAME']; ?></option>
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
            <input type="text" id="SAL" name="SAL"><br>
            </div>
            <div class="form-group mx-sm-3 mb-2">

            <label for="COMM">Commision:</label><br>
            <input type="text" id="COMM" name="COMM"><br>
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
                    <option value="<?php echo $row['DEPTNO']; ?>"><?php echo $row['DNAME']; ?></option>
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
                <input type="submit" name="submit" class="btn btn-primary btn-md">
            </div>
    </form>
    <div class="form-group mx-sm-3 mb-2">
                    <button onclick="window.location.href='HelloSQL.php'" class="btn btn-primary btn-md">GO BACK TO THE PREIVOUS PAGE</button><br>
                </div>
    </div>
    </div>
    </body>
</head>
</html