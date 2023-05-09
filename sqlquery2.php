<?php 
/** Connection with postgresql **/
/** Connection with mysql **/
//https://stackoverflow.com/questions/6882633/php-get-input-radio-selection-data-and-insert-into-mysql-table
$connection = new PDO("mysql:host=localhost;dbname=empdb", 'root', '');  
/** Preparation and execution of the query **/



    $sql="SELECT ENAME, Salary, Commision, carID
    FROM employee
    WHERE Salary > 1000 AND Commision > 0 AND carID IS NOT NULL
    GROUP BY ENAME";
        
        $resultset = $connection->prepare($sql);
        $resultset->execute();
        $rows = $resultset->fetchAll(PDO::FETCH_ASSOC);
        echo "<table border='1'>";
        echo "<tr><th>Employee Name</th><th>Salary</th><th>Commision</th><th>Car ID</th></tr>";
        foreach ($rows as $row) {
            echo "<tr><td>".$row['ENAME']."</td><td>".$row['Salary'] ."</td><td>".$row['Commision'] ."</td><td>".$row['carID'] ."</td></tr>";
        }
        echo "</table>";
        
        

    
/** Disconnection **/
$connection=null;
?>