 <?php 
 try {
     $conn = new PDO("mysql:host = localhost; dbname=manga_db","root","");
 } catch (PDOException $e) {
   die("". $e->getMessage());
 }
