<!DOCTYPE html>
<html>
    <head>
    <title>HOME Page</title>
        <meta charset="utf-8">
    <meta name = "viewport" content = "width=device-width, initial-scale = 1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    </head>
    <body>
        <h1>Hello there</h1>
        <div class="container card border-primary mb-3">
            <div class="card-header">DEPARTMENTS</div>
            <div class="card-body">
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>Department Name</th>
                            <th>Department Location</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        require_once __dir__ . '/vendor/autoload.php';
                        $con = new MongoDB\Client("mongodb://localhost:27017");
                        $db = $con->EMPDB;
                        $collection = $db->Departments;
                        $cursor = $collection->find();
                        foreach ($cursor as $document) {
                            echo "<tr><td>".$document['DNAME']."</td><td>".$document['Location'] ."</td></tr>";
                        }

                        ?>
                    </tbody>
                </table>
            </div>
            <div class="form-group mx-sm-3 mb-2">
            <button onclick="window.location.href='addDept.php'">Click me to add department to sql</button>
            </div>
        </div>
        <div class="container card border-primary mb-3">
            <div class="card-header">EMPLOYEES</div>
            <div class="card-body">
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>

                            <th>Employee Name</th>
                            <th>Hire Date</th>
                            <th>Job</th>
                            <th>Salary</th>
                            <th>Commsion</th>
                            <th>Address</th>
                            <th>car</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        require_once __dir__ . '/vendor/autoload.php';
                        $con = new MongoDB\Client("mongodb://localhost:27017");
                        $db = $con->EMPDB;
                        $collection = $db->EMPLOYEE;
                        $cursor = $collection->find();
                        foreach ($cursor as $document) {
                            echo "<tr><td>".$document['ENAME']."</td><td>".$document['HIREDATE'] ."</td><td>".$document['Job']."</td><td>".$document['Salary']."</td><td>".$document['Commision']."</td><td>".$document['address']."</td></tr>";
                        }


                        ?>
                    </tbody>
                </table>
            </div>
            <div class="form-group mx-sm-3 mb-2">
            </div>

        </div>
        <button onclick="window.location.href='emp.php'">Click me to add employee to mongo</button>
        <button onclick="window.location.href='addDeptMongo.php'">Click me to add department to mongo</button>
        <button onclick="window.location.href='query1.php'">Click me to show query 1</button>
        <button onclick="window.location.href='query2.php'">Click me to show query 2</button>


    </body>
</html>