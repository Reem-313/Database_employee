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
            <div class="card-header">Total Salaries For Each Department</div>
            <div class="card-body">
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>Department</th>
                            <th>Total Salary</th>

                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        /** Connection with postgresql **/
                        /** Connection with mysql **/
                        $connection = new PDO("mysql:host=localhost;dbname=empdb", 'root', '');
                        /** Preparation and execution of the query **/
                            $sql="SELECT d.DNAME, sum(e.Salary)
                            FROM employee e, dept d
                            WHERE e.DeptID = d.DEPTNO
                            GROUP BY DeptID";
                                $resultset = $connection->prepare($sql);
                                $resultset->execute();
                                $rows = $resultset->fetchAll(PDO::FETCH_ASSOC);
                                foreach($rows as $row)
                                {
                                    echo "<tr>";
                                    echo "<td>".$row['DNAME']."</td>";
                                    echo "<td>".$row['sum(e.Salary)']."</td>";
                                    echo "</tr>";                                }
                                /** Disconnection **/
                        $connection=null;
                        ?>
                    </tbody>
                </table>
            </div>
            <div class="form-group mx-sm-3 mb-2">
                    <button onclick="window.location.href='HelloSQL.php'" class="btn btn-primary btn-md">GO BACK TO THE PREIVOUS PAGE</button><br>
                </div>
        </div>
    </boby>
</html>
