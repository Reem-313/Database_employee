<?php 
/** Connection with postgresql **/
/** Connection with mysql **/
//https://stackoverflow.com/questions/6882633/php-get-input-radio-selection-data-and-insert-into-mysql-table
$connection = new PDO("mysql:host=localhost;dbname=emloyeedb", 'root', '');  
/** Preparation and execution of the query **/

if(isset($_POST['submit']))
{
    $Ename= $_POST['ENAME'];
    $selectionJob = $_POST['selectionJOB'];
    echo $selectionJob;
    $HireDate= $_POST['HIREDATE'];
    echo $HireDate;
    $Salary= $_POST['SAL'];
    echo $Salary;
    $commision= $_POST['COMM'];
    echo $commision;
    $selectionDept = $_POST['selectionDEPT'];
    echo $selectionDept;

    //$sql="INSERT into Dept (DNAME, LOC) VALUES ('$DeptName', '$location')";
    //$resultset = $connection->prepare($sql);
    //$resultset->execute();
}
/** Disconnection **/
$connection=null;
?>

<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <title>Music School</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    </head>
    <body>
    <form method="post" action="" autocomplete="off">
        <label for="ENAME">Employee Name:</label><br>
        <input type="text" id="ENAME" name="ENAME"><br>
        <label for="JOBID">Employee Job:</label><br>
        <select name="selectionJOB">
            <option value="CLERK">CLERK</option>
            <option value="SALESMAN">SALESMAN</option>
            <option value="MANAGER">MANAGER</option>
            <option value="PRESIDENT">PRESIDENT</option>
            <option value="ANALYST">ANALYST</option>
        </select>

        <?php
        $connection = new PDO("mysql:host=localhost;dbname=emloyeedb", 'root', '');  
            $sql="SELECT ENAME FROM emp";
            $resultset = $connection->prepare($sql);
            $resultset->execute();   
            $row = $resultset->fetch(PDO::FETCH_ASSOC);
            ?>
            <?php foreach ($rows as $row) : ?>

            <select name="selectionMGR">
            <option value="A"><?php echo $row['ENAME']; ?></option>
            </select>
            <?php endforeach; ?>


            <label for="HIREDATE">Hire date:</label><br>
            <input type="date" id="HIREDATE" name="HIREDATE"><br>

            <label for="SAL">Salary:</label><br>
            <input type="text" id="SAL" name="SAL"><br>

            <label for="COMM">Commsion:</label><br>
            <input type="text" id="COMM" name="COMM"><br>

            <label for="dept">Employee Department:</label><br>
            <select name="selectionDEPT"><br>
            <option value="A">A</option>
            <option value="B">B</option>
            <option value="C">C</option>
            </select><br>

                <input type="submit" name="submit"><br>
    </form>
    </body>
</head>
</html>