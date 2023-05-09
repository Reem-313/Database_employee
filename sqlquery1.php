<?php 
/** Connection with postgresql **/
/** Connection with mysql **/
//https://stackoverflow.com/questions/6882633/php-get-input-radio-selection-data-and-insert-into-mysql-table
$connection = new PDO("mysql:host=localhost;dbname=empdb", 'root', '');  
/** Preparation and execution of the query **/



    $sql="SELECT D.DNAME, count(E.DeptID)
    FROM employee E, dept D
    WHERE E.DeptID = D.DEPTNO
    GROUP BY DeptID";
        
        $resultset = $connection->prepare($sql);
        $resultset->execute();
        $rows = $resultset->fetchAll(PDO::FETCH_ASSOC);
        echo "<table border='1'>";
        echo "<tr><th>Department Name</th><th>Number of Employees</th></tr>";    
        foreach ($rows as $row) {
            echo "<tr><td>".$row['DNAME']."</td><td>".$row['count(E.DeptID)'] ."</td></tr>";
        }
        
        echo "</table>";
        

    
/** Disconnection **/
$connection=null;
?>