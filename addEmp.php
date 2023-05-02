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

    $selectionMgr = $_POST['selectionMGR'];
    echo $selectionMgr;
    $sql="INSERT into emp (ENAME, JOBID_FK, MGR, HIREDATE, SAL, COMM, DEPTNO_FK) VALUES 
    ('$Ename', SELECT JOBID FROM job WHERE JOBNAME=$selectionJob, SELECT EMPNO FROM emp WHERE ENAME=$selectionMgr ,
    '$HireDate', '$Salary', '$commision', SELECT DEPTNO FROM dept WHERE DNAME=$selectionDept)";
    $resultset = $connection->prepare($sql);
    $resultset->execute();
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
        <br>
        <label for="MGR">select Manager:</label><br>
        <select name="selectionMGR">

        <?php
        $connection = new PDO("mysql:host=localhost;dbname=emloyeedb", 'root', '');  
            $sql="SELECT ENAME FROM emp";
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

            <label for="HIREDATE">Hire date:</label><br>
            <input type="date" id="HIREDATE" name="HIREDATE"><br>

            <label for="SAL">Salary:</label><br>
            <input type="text" id="SAL" name="SAL"><br>

            <label for="COMM">Commsion:</label><br>
            <input type="text" id="COMM" name="COMM"><br>

            <label for="dept">Employee Department:</label><br>
            <select name="selectionDEPT">

            <?php
            $connection = new PDO("mysql:host=localhost;dbname=emloyeedb", 'root', '');  
                $sql="SELECT DNAME FROM dept";
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

                <input type="submit" name="submit"><br>
    </form>
    </body>
</head>
</html>