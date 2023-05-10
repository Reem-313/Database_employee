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
            <div class="card-header">Employed As A Manager, Have A Salary Of Over 2000 And Do Have A Company Car</div>
            <div class="card-body">
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Job</th>
                            <th>SALARY</th>
                            <th>Address</th>
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
                                "Job"=>"MANAGER",
                                "Salary"=>['$gte'=>"2000"],
                                "car"=>['$ne'=>null]
                            ]
                        );
                        foreach ($result as $document) {
                            echo "<tr><td>".$document['ENAME']."</td><td>".$document['Job'] ."</td><td>".$document['Salary'] ."</td><td>".$document['address'] ."</td></tr>";
                        }
                    ?>
                    </tbody>
                </table>
            </div>
            <div class="form-group mx-sm-3 mb-2">
                    <button onclick="window.location.href='HelloMongo.php'" class="btn btn-primary btn-md">GO BACK TO THE PREIVOUS PAGE</button><br>
                </div>
        </div>
    </boby>
</html>
