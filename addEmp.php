<?php 
/** Connection with postgresql **/
/** Connection with mysql **/
//https://stackoverflow.com/questions/6882633/php-get-input-radio-selection-data-and-insert-into-mysql-table
$connection = new PDO("mysql:host=localhost;dbname=empdb", 'root', '');  
/** Preparation and execution of the query **/

if(isset($_POST['submit']))
{
    $Ename= $_POST['ENAME'];
   // $addressRoad= $_POST['addRoad'];
   // $addressCity= $_POST['addCity'];
   $selectionADD = $_POST['selectionAdd'];
    $selectionJob = $_POST['selectionJOB'];
    $HireDate= $_POST['HIREDATE'];
    $Salary= $_POST['SAL'];
    $commision= $_POST['COMM'];
    $selectionDept = $_POST['selectionDEPT'];
    $selectionMgr = $_POST['selectionMGR'];
    $selectioncar = $_POST['selectionCar'];
    if($selectioncar='')
    {
        
    }


    $sql="INSERT into employee (ENAME, MGR, HIREDATE, Salary, Commision, DeptID, JobID, addressID, carID) VALUES 
    ('$Ename', '$selectionMgr' ,'$HireDate', '$Salary', '$commision', '$selectionDept', '$selectionJob', '$selectionADD', '$selectioncar')";
    $resultset = $connection->prepare($sql);
    $resultset->execute();
}
/** Disconnection **/
$connection=null;
?>

<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <title>Adding employee</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    </head>
    <body>
    <form method="post" action="" autocomplete="off">
        <label for="ENAME">Employee Name:</label><br>
        <input type="text" id="ENAME" name="ENAME"><br>
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

            <label for="HIREDATE">Hire date:</label><br>
            <input type="date" id="HIREDATE" name="HIREDATE"><br>

            <label for="SAL">Salary:</label><br>
            <input type="text" id="SAL" name="SAL"><br>

            <label for="COMM">Commsion:</label><br>
            <input type="text" id="COMM" name="COMM"><br>

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

                <label for="car">Do you want to assign the employee a car?</label><br>
            <select name="selectionCar">
            <option value=''>NULL</option>

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

                <input type="submit" name="submit"><br>
    </form>
    </body>
</head>
</html>