<?php 
/** Connection with postgresql **/
/** Connection with mysql **/
$connection = new PDO("mysql:host=localhost;dbname=empdb", 'root', '');  
/** Preparation and execution of the query **/

if(isset($_POST['submit']))
{
    $Deptname= $_POST['DeptName'];
    $location= $_POST['location'];
    $sql="INSERT into Dept (DNAME, location) VALUES ('$Deptname', '$location')";
    $resultset = $connection->prepare($sql);
    $resultset->execute();
}
/** Disconnection **/
$connection=null;
?>

<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <title>Music School</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    </head>
    <body>
    <form method="post" action="" autocomplete="off">
        <label for="DeptName">Department:</label><br>
        <input type="text" id="DeptName" name="DeptName" required value=""><br>
        <label for="location">Location:</label><br>
        <input type="text" id="location" name="location" required value=""><br>
        <input type="submit" name="submit"><br>
    </form>
    </body>
</head>
</html>

