


<!DOCTYPE html>
<html>
    <head>
    <title>MONGO HOME Page</title>
    <meta charset="utf-8">
    <meta name = "viewport" content = "width=device-width, initial-scale = 1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    </head>
    <body>
        <div class="container card border-primary mb-3">
        <div class="card-header">How Many People Work In Each Department?</div>
            <div class="card-body">
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>Department</th>
                            <th>Number of employees</th>
                        </tr>
                    </thead>
                    <tbody>
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
                                foreach($rows as $row)
                                {
                                    echo "<tr><td>".$row['DNAME']."</td><td>".$row['count(E.DeptID)'] ."</td></tr>";
                                }
                        /** Disconnection **/
                        $connection=null;
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </body>
</html>
