<?php 
// demarer la variable session 
session_start();
function Option()
{
    for ($i=0; $i < 9; $i++) { 
        echo "<option value=$i> $i </option>";
    }

}

// pour diriger vers la page d'acceuil aprel la final 
if (isset($_POST['voir_liste'])) {
    // session_destroy();
    // $_SESSION = array();
    header("Location:pageGagnant.php");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/index.css">
    <title>Document</title>
</head>
<style>
   body{
      background-image: url(img/IMGBack.jpg);
    background-size: cover;
   }
   #table{
       margin-top: 200px;
       color: white;
       font: 1.4em sans-serif;
   }

   th{
    background-color: rgba(0, 0, 0, 0.197);
    font-family: cursive;
   }

   marquee{
        color: #5180b4;
        font-size: 90px;
        margin-top: 220px;
        margin-left: -6px;
        width: 900px;
}

   #bt_s{
    height: 30px;
    width: 17%;
    /* margin-top: -300px; */
    border-radius: 10px;
    border-color: white;
    background: none;
    color: white;
    background-color: rgba(2, 2, 141, 0.692);
   }

   

   p{
       color:cornsilk;
   }
   #S{
    color: yellow;
  }

  @media (max-width:900px) {
    body{
      background-image: url(img/back222.jpg);
    }
    #bt_s{
    border-color: black;
    color: black;
    background-color: yellow;
   }
  
  }

  @media (max-width:1280px) {
   marquee{
      display: none;
    }
  }

</style>
<body>
<div id="table">
    <table style="margin:5% auto 5% auto">
        <tr>
            <th  id="G" >Finale</th>
            <th>Affiche</th>
            <th>Jouer</th>
            <th id="S">Score</th>
        </tr>
<!-- preparation pour le Match 16  -->
        <tr>
            <td>Match 16</td>
            <td><?= $_SESSION['finale2']['nom1'] . " vs " . $_SESSION['finale2']['nom2'] ?></td>
            <td>
                <form action="" method="post">
                <select name="equipe1"> <?= Option() ?> </select>
                                    -
                            <select name="equipe2"> <?= Option() ?> </select>
                    <input type="submit" name="match16" value="jouer" id="f">
                </form>
                <?php 
                if (isset($_POST['match16']) &&  $_SESSION['finale2']['etat']) {
                    $_SESSION['finale2']['gfScoreEquipe1'] = $_POST['equipe1'];
                    $_SESSION['finale2']['gfScoreEquipe2'] = $_POST['equipe2'];
                }
// condition si equipe 1 ou equipe 2 gagne 
                if (
                    $_SESSION['finale2']['gfScoreEquipe1'] > $_SESSION['finale2']['gfScoreEquipe2'] ||
                    $_SESSION['finale2']['gfScoreEquipe1'] < $_SESSION['finale2']['gfScoreEquipe2']
                ) {
                    $_SESSION['finale2']['etat'] = false;

                    // condition tant que le match est null 

while( $_SESSION['finale2']['gfScoreEquipe1']== $_SESSION['finale2']['gfScoreEquipe2'] ) {   
    $_SESSION['finale2']['gfScoreEquipe1'] = $_POST['equipe1'];
    $_SESSION['finale2']['gfScoreEquipe2'] = $$_SESSION['finale2']['gfScoreEquipe1'] = $_POST['equipe2'];
}
                ?>
                    <script>
                        document.querySelector('#f').disabled = "disabled";
                    </script>
                <?php } 
                
            ?>
            </td>
            <td><button><?= $_SESSION['finale2']['gfScoreEquipe1'] ?></button> : <button><?= $_SESSION['finale2']['gfScoreEquipe2'] ?></button></td>
        </tr>
    </table>
</div>
<!-- boutou recommencer -->
<?php
 if(isset($_POST['match16']))
 { ?>
<center>
<form action="" method="post">
            <a href="pageGagnant.php">
                <input type="submit" name="voir_liste" value="Voir Liste" id="bt_s">
            </a>
       
        </center>
        <?php }
                 ?>
    <?php
    if ($_SESSION['finale2']['gfScoreEquipe1'] > $_SESSION['finale2']['gfScoreEquipe2']) {
        $_SESSION['finale2']["champion"] = $_SESSION['finale2']['nom1'];
        
    } else {
        $_SESSION['finale2']["champion"] = $_SESSION['finale2']['nom2'];
    }
    
    if ($_SESSION['finale2']["champion"] != "") {
      
         ?><center>
             
             <!-- partie text Felicitation  -->
       
             <marquee behavior="" direction="left">
                  <?= " La Grande Final " 
                //   . $_SESSION['finale2']["champion"] ?> 
                  </marquee>
       <!-- fin ......................  -->
       </form>
        </center>
    <?php }
     ?>



</body>

</html>