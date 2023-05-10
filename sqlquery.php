
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
            <div class="card-header">All Employees</div>
            <div class="card-body">
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>HIRE DATE</th>
                            <th>SALARY</th>
                            <th>JOB TITLE</th>
                        </tr>
                    </thead>
                    <tbody>
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
                                foreach($rows as $row)
                                {
                                    echo "<tr><td>".$row['ENAME']."</td><td>".$row['Max(HireDate)'] ."</td><td>".$row['JOBTitle'] ."</td><td>".$row['Salary'] ."</td><td>".$row['MGR'] ."</td><td>".$row['DNAME'] ."</td><td>".$row['carMake'] ."</td><td>".$row['carModel'] ."</td></tr>";
                                }
                                /** Disconnection **/
                        $connection=null;
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </boby>
</html>
