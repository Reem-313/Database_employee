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
            <div class="card-header">Employees That Work In Accounting, And Were Hired Between 1st June 1981 And 1st June 1982</div>
            <div class="card-body">
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>HIRE DATE</th>
                            <th>SALARY</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        require_once __dir__ . '/vendor/autoload.php';
                        $con = new MongoDB\Client("mongodb://localhost:27017");
                        $db = $con->EMPDB;
                        $collection = $db->EMPLOYEE;
                        $result = $collection->find(
                            [
                                "Dept.DNAME"=>"ACCOUNTING",
                                "HIREDATE"=>[
                                    '$gte'=> "1981-06-01",
                                    '$lt'=> "1982-06-01"
                                ]
                            ]
                        );
                        foreach ($result as $document) {
                            echo "<tr><td>".$document['ENAME']."</td><td>".$document['HIREDATE'] ."</td><td>".$document['Salary'] ."</td></tr>";
                        }
                    ?>
                    </tbody>
                </table>
            </div>
        </div>
    </boby>
</html>
