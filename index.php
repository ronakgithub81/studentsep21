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
        <?php
         try {
             $dbconn = new PDO($hostname,$username,$password);
             echo "successfully connected to database <br><br>";
         } catch (PDOException $e) {
             echo "Connection error ".$e."<br><br>";
         }
       /*  $command1="insert into Student(StudentName,StudentCity,StudentGrade)"
                    ."values ('john','Hamilton','D')";
         $stmt1 =$dbconn->prepare($command1);
         $exeOk =$stmt1 ->execute();
         if($exeOk)
                echo "inserting into table is successfull";
         else
             echo "inserting into table failed ";*/
         $command = "select * From Student";
         $stmt = $dbconn->prepare($command);
         $exeOk = $stmt->execute();
         if($exeOk){
             while($row =$stmt->fetch()){
                 //if the table is not empty then $stmt->fetch() 
                 //will return the array of query results
                 echo " student id is : ".$row["StudentID"]. 
                      "  Name is:  ".$row["StudentName"].
                     " city is:  " .$row["StudentCity"]. 
                      " Student Grade : ".$row["StudentGrade"]."<br>";
             }//end of while
         }
         else{
             echo "error executing query";
         }
        ?>
    </body>
</html>
