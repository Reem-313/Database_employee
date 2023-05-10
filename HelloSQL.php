<!DOCTYPE html>
<html>
    <head>
    <title>SQL HOME Page</title>
        <meta charset="utf-8">
    <meta name = "viewport" content = "width=device-width, initial-scale = 1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    </head>
    <body>
        <style>
            body{
                margin: 25px;
                padding: 25px;
            }
            .container{
                margin: 5px;
                padding: 5px;
            }
            </style>
    <div class="container">
        <button onclick="window.location.href='home.php'" class="btn btn-primary btn-md">GO BACK TO THE PREIVOUS PAGE</button><br>

</div>
        <!-- <h1>Hello there</h1>
        <button onclick="window.location.href='home.php'" class="btn btn-primary btn-md">GO BACK TO THE PREIVOUS PAGE</button><br> -->

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
                        /** Connection with postgresql **/
                        /** Connection with mysql **/
                        //https://stackoverflow.com/questions/6882633/php-get-input-radio-selection-data-and-insert-into-mysql-table
                        $connection = new PDO("mysql:host=localhost;dbname=empdb", 'root', '');  
                        /** Preparation and execution of the query **/           
                            $sql="SELECT * FROM dept";
                                
                                $resultset = $connection->prepare($sql);
                                $resultset->execute();
                                $rows = $resultset->fetchAll(PDO::FETCH_ASSOC);
                                foreach ($rows as $row) {

                                    echo "<tr><td>".$row['DNAME']."</td><td>".$row['Location'] ."</td></tr>";
                                    
                                }                                
                        /** Disconnection **/
                        $connection=null;
                        ?>
                    </tbody>
                </table>
            </div>
            <div class="form-group mx-sm-3 mb-2">
            <button onclick="window.location.href='addDept.php'" class="btn btn-primary btn-md">Click me to add department to sql</button>
            </div>
        </div>
        <div class="container card border-primary mb-3">
            <div class="card-header">EMPLOYEES</div>
            <div class="card-body">
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>

                            <th>Employee Name</th>
                            <th>HireDate</th>
                            <th>Job</th>
                            <th>Salary</th>
                            <th>Commsion</th>
                            <th>Department ID</th>
                            <th>Manager ID</th>
                            <th>Car ID</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        /** Connection with postgresql **/
                        /** Connection with mysql **/
                        $connection = new PDO("mysql:host=localhost;dbname=empdb", 'root', '');  
                        /** Preparation and execution of the query **/
                            $sql="SELECT * FROM employee";
                                
                                $resultset = $connection->prepare($sql);
                                $resultset->execute();
                                $rows = $resultset->fetchAll(PDO::FETCH_ASSOC);
                                foreach ($rows as $row) {
                                        
                                        echo "<tr><td>".$row['ENAME']."</td><td>".$row['HIREDATE'] ."</td><td>".$row['JobID']."</td><td>".$row['Salary']."</td><td>".$row['Commision']."</td><td>".$row['DeptID']."</td><td>".$row['MGR']."</td><td>".$row['carID']."</td></tr>";                                    
                                }                              
                        /** Disconnection **/
                        $connection=null;
                        ?>
                    </tbody>
                </table>
                <div class="form-group mx-sm-3 mb-2">
            <button onclick="window.location.href='addEmp.php'" class="btn btn-primary btn-md">Click me to add employee to sql</button>
            </div>
            </div>
        </div>
        <div class="container card border-primary mb-3">
            <div class="card-header">Query</div>
            <div class="card-body">
                <div class="form-group mx-sm-3 mb-2">
                </div>
                <div class="form-group mx-sm-3 mb-2">
                    <button onclick="window.location.href='sqlquery.php'" class="btn btn-outline-primary btn-lg">Click me to show query 1 in sql</button><br>
                </div>
                <div class="form-group mx-sm-3 mb-2">
                    <button onclick="window.location.href='sqlquery2.php'" class="btn btn-outline-primary btn-lg">Click me to show query 2 in sql</button><br>
                </div>
                <div class="form-group mx-sm-3 mb-2">
                    <button onclick="window.location.href='sqlquery1.php'" class="btn btn-outline-primary btn-lg">Click me to show query 3 in sql</button>
                </div>
            </div>
        </div>

    </body>
</html>