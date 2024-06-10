<?php 
        $conn  = new PDO('mysql:host=localhost; dbname=Location_Imobilier','*****','*****');

        // $requete = "SELECT * FROM client";
        $resultat = $conn->query("SELECT * FROM client");
    
        $data = $resultat ->fetchAll(PDO::FETCH_ASSOC);
        
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .container{
            display :flex;
            align-items:center;
            justify-content: center;
        }
        table{
            margin-top:100px;
            width: 950px;
            height:300px
        }
        td{
            border-bottom: solid 1px grey;
            text-align:center;
            padding:1px;
        }
        th{
            border-bottom: solid 2px black;
            padding: 10px;
        }
        button{
            width: 90px;
            height:30px;
            background-color:skyblue;
            border:solid 1px skyblue;
            border-radius:10px;
            text-decoration:none;
        }
        span{
            width: 200px;
            height:25px;
            border:solid 1px white;
            border-radius:10px 4px;
            padding:5px 25px;
        }
        .a{

            font-weight:bold;
            background-color:green;
            margin-top:60px;
            width: 130px;
            height:40px;
            float:right;

        }
    </style>
</head>
<body>
    <div class="container">
        <table  cellspacing="0" >
            <tr>
                <!-- <th>Id client </th> -->
                <th> CIN </th>
                <th> NOM </th>
                <th> PRENOM </th>
                <th> Age </th>
                <th> EMAIL </th>
                <th> Password </th>
                <th> Operation </th>
            </tr>
        <?php foreach ($data as $i):  ?>
            <tr>
                <!-- <td><?php echo $i['id_client'] ?></td> -->
                <td><?php echo $i['cin'] ?></td>
                <td><?php echo $i['nom'] ?></td>
                <td><?php echo $i['prenom'] ?></td>
                <td >
                    <span>
                        <?php
                            if ($i['age'] <= 20){
                                        echo '<span style="background-color:greenyellow">'.$i['age'];
                            } 
                            elseif ($i['age'] > 20 & $i['age'] <= 30){
                                echo '<span style="background-color:#fefe64">'.$i['age'];
                            } 
                            else{
                                echo '<span style="background-color:#ff5e5e">'.$i['age'];
                            }
                        ?>
                    </span>
                </td>
                <td><?php echo $i['email'] ?></td>
                <td><?php echo $i['PW'] ?></td>
                <td>
                <button><a href="modify.php?id_client=<?php echo $i['id_client']?>" class="#button" style="color:purple;text-decoration:none;">Modifier</a></button>  

                <button><a href="supprimer.php?id_client=<?php echo $i['id_client']?>" class="#button" style="color:red;text-decoration:none;">Supprimer</a></button>   
                </td>

            </tr>
            <?php endforeach; ?>
        </table>

    </div><br>

<button class="a"><a href="ajouter.php" style="text-decoration:none;color:white;">Ajouter</a></button><br>



</body>
</html>
