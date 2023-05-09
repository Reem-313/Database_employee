<?php 
/** Connection with postgresql **/
/** Connection with mysql **/
//https://stackoverflow.com/questions/6882633/php-get-input-radio-selection-data-and-insert-into-mysql-table
$connection = new PDO("mysql:host=localhost;dbname=empdb", 'root', '');  
/** Preparation and execution of the query **/



    $sql="SELECT e.ENAME, Max(HireDate), j.JOBTitle, e.Salary, e.MGR, d.DNAME, c.carMake, c.carModel
    FROM employee e, dept d, car c, job j
    WHERE e.DeptID = d.DEPTNO AND e.CarID = c.CarID AND e.JobID = j.JOBID
    GROUP BY e.HireDate";
        
        $resultset = $connection->prepare($sql);
        $resultset->execute();
        $rows = $resultset->fetchAll(PDO::FETCH_ASSOC);
        echo "<table border='1'>";
        echo "<tr><th>Employee Name</th><th>Hire Date</th><th>Job Title</th><th>Salary</th><th>Manager ID</th><th>Department Name</th><th>Car Make</th><th>Car Model</th></tr>";
        foreach ($rows as $row) {
            echo "<tr><td>".$row['ENAME']."</td><td>".$row['Max(HireDate)'] ."</td><td>".$row['JOBTitle'] ."</td><td>".$row['Salary'] ."</td><td>".$row['MGR'] ."</td><td>".$row['DNAME'] ."</td><td>".$row['carMake'] ."</td><td>".$row['carModel'] ."</td></tr>";
        }
    echo "</table>";
        

    
/** Disconnection **/
$connection=null;
?>