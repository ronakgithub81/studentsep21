<?php
    require("connect.php");
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <h1> Insert demo </h1>
        <?php
            $sname =$_GET["sname"];
            $scity =$_GET["scity"];
            $sgrade =$_GET["sgrade"];
            $array1=array($sname,$scity,$sgrade);
            $dbc = connect($hostname,$username,$password);
            insertData($dbc,$array1);
        ?>
        <?php
        //define functions
        function connect($hname,$uname,$pswd){
            try {
                $dbcn= new PDO ($hname,$uname,$pswd);
                echo "<h2> Connection successfull";
                return $dbcn;
            } catch (PDOException $e) {
                echo "<br> Connection error : ".$e->getMessage();                        
            }            
        }//end of connect function
        function insertData($dbc,$array1){
            $cmd="insert into Student(StudentName,StudentCity,StudentGrade)"
                    . "values (?,?,?)";
            echo "<br>$cmd <br>";
            $stmt =$dbc->prepare($cmd);
            $exeok =$stmt->execute($array1);
            if($exeok)
                echo "<br> Successfully inserted to DB";
            else
                echo "<br> error executing delete query";
        }//end of insert data 
        ?>
        
    </body>
</html>
