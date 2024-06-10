<?php
    $conn  = new PDO('mysql:host=localhost; dbname=Location_Imobilier','Mama','Mama@123@');
  
    
    $id = $_GET['id_client'];
    $x = $conn->prepare('DELETE FROM client where id_client=?');
    $delete = $x->execute([$id]);
    header('location: listerC.php');
    
?>