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
        <style>
            body{
                margin: 25px;
                padding: 25px;
            }
            </style>

        <div class="container card border-primary mb-3">
            <div class="card-header">YOU ARE IN THE HOME PAGE</div>
            <div class="card-body">
                <div class="form-group mx-sm-3 mb-2">
                </div>
                <div class="form-group mx-sm-3 mb-2">
                    <button onclick="window.location.href='HelloSQL.php'"  class="btn btn-outline-primary btn-lg">Click here to work on SQL</button>
                </div>
                <div class="form-group mx-sm-3 mb-2">
                    <button onclick="window.location.href='HelloMongo.php'" class="btn btn-outline-primary btn-lg">Click here to work on mongo</button>
                </div>

            </div>
        </div>

    </body>
</html>