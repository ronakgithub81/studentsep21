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
        <h1> Delet demo </h1>
        <?php
            $id1 =(int)$_GET["sid"];
         //   var_dump($id1);
            $dbc = connect($hostname,$username,$password);
            deleleData($dbc,$id1);
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
        function deleleData($dbc,$id1){
            $cmd="Delete from student where StudentID = ".$id1;
            echo "<br>$cmd <br>";
            $stmt =$dbc->prepare($cmd);
            $exeok =$stmt->execute();
            if($exeok)
                echo "<br> Successfully deleted from DB";
            else
                echo "<br> error executing delete query";
        }//end of insert data 
        ?>
        
    </body>
</html>
