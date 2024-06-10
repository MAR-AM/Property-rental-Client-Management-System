<?php

        $conn  = new PDO('mysql:host=localhost; dbname=Location_Imobilier','Mama','Mama@123@');
        $data = []; 

        $id = $_GET['id_client'];
        $stmt = $conn->prepare("SELECT * FROM client WHERE id_client = ?");
        $stmt->execute([$id]);
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            $id = $_POST['id_client'];
            $cin = $_POST['cin'];
            $nom = $_POST['nom'];
            $prenom = $_POST['prenom'];
            $age = $_POST['age'];
            $email = $_POST['email'];
            $pw = $_POST['pw'];
        
            $stmt = $conn->prepare('UPDATE client SET cin=?, nom=?, prenom=?, age=?, email=?, PW=? WHERE id_client=?');
            $stmt->execute([$cin, $nom, $prenom, $age, $email, $pw, $id]);
            header('location:listerC.php');
            
        } 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body{
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: white;
        }
        form{
            margin-top: 2%;
            border: solid 1px;
            border-radius: 10px;
            box-shadow: 0 2px 10px 0 rgba(0, 0, 0, 0.701);
            width: 450px;
            height: 495px;
        }
        label {
            display: inline-block;
            color: #1a1818;
            font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
            font-size: large;
            width: 100px;
            
        }
        input{
              width: 252px;
              height: 39px;
              background-color: rgb(89, 176, 202);
              border: solid 1px #f5f5f57f ;
              border-radius: 12px;
              margin-top: 5px;  
              color: purple;
              font-family:Arial, Helvetica, sans-serif;
              font-size: medium;
              font-weight: bold;
              
        }
        #button {
            width: 252px;
            height: 34px;
            border: solid 1px aqua;
            border-radius: 12px;
            background-color: rgb(0, 157, 255);
            box-shadow: 2px 2px 10px 1px aqua;
            font-weight: bolder;
            cursor: pointer;
        }
        #button a{
            text-decoration: none;
            color: black;
        }
        
  </style>
</head>
<body>
    <form action=""  method="post" align="center">
        <br><br>
        <?php foreach ($data as $i):?>

        <div style="display:none">
            <label for="nom" > Id : </label>
            <input type="text" placeholder=" Tapez votre id " value="<?php echo $i['id_client'] ?>" name="id_client"><br><br>
        </div>
        <label for="nom" > Code CIN : </label>
        <input type="text" placeholder="Tapez votre Code CIN" value="<?php echo $i['cin'] ?>"  name="cin"><br><br>
        
        <label for="prenom" > Nom : </label>
        <input type="text" placeholder="Tapez votre Nom " value="<?php echo $i['nom'] ?>" name="nom"><br><br>
        <label for="pet"> Prenom : </label>
        <input type="text" placeholder="Tapez votre Prenom " value="<?php echo $i['prenom'] ?>" name="prenom"><br><br>
        <label for="pet"> Age : </label>
        <input type="text" placeholder="Votre Age" value="<?php echo $i['age'] ?>" name="age"><br><br>
        <label for="pet"> Email : </label>
        <input type="text" placeholder="Enter your email" value="<?php echo $i['email'] ?>" name="email"><br><br>
        <label for="pet"> Password :  </label>
        <input type="text" placeholder="***********" name="pw" value="<?php echo $i['PW'] ?>" ><br><br>
        <?php endforeach; ?>

        <input type="submit" id="button" value=" Modifier ">
        
    </form>

</body>
</html>