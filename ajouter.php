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
    <form action=""  method="get" align="center">
        <br><br>
        <label for="nom" > Code CIN : </label>
        <input type="text" placeholder="Tapez votre Code CIN" id="name" name="cin"><br><br>
        <label for="prenom" > Nom : </label>
        <input type="text" placeholder="Tapez votre Nom " name="nom"><br><br>
        <label for="pet"> Prenom : </label>
        <input type="text" placeholder="Tapez votre Prenom " name="prenom"><br><br>
        <label for="pet"> Age : </label>
        <input type="text" placeholder="Votre Age" name="age"><br><br>
        <label for="pet"> Email : </label>
        <input type="text" placeholder="Enter your email" name="email"><br><br>
        <label for="pet"> Password :  </label>
        <input type="text" placeholder="***********" name="pw"><br><br>


        

        <input type="submit" id="button" value=" Ajouter ">
        
    </form>

    <?php

        
        if (isset($_GET['cin']) && isset($_GET['nom']) && isset($_GET['prenom'])&& isset($_GET['age'])&& isset($_GET['email'])&& isset($_GET['pw'])) {
                $cin = $_GET['cin'];
                $nom = $_GET['nom'];
                $prenom = $_GET['prenom'];
                $age = $_GET['age'];
                $email = $_GET['email'];
                $pw = $_GET['pw'];
        }
        
        $conn  = new PDO('mysql:host=localhost; dbname=location_imobilier','##***','*****');

        if(!empty($cin) && !empty($nom) && !empty($prenom) && !empty($age) && !empty($email) && !empty($pw)){
            $x = $conn->prepare('INSERT INTO client VALUES (Null,?,?,?,?,?,?)');
            $add = $x->execute([$cin,$nom,$prenom,$age,$email,$pw]);
            header('location:listerC.php');
        }

        


        
    ?>
</body>
</html>
