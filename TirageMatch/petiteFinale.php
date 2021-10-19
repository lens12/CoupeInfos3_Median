<?php session_start();
function Option()
{
    for ($i=0; $i < 9; $i++) { 
        echo "<option value=$i> $i </option>";
    }

}
// $equipe1=rand(0,5);
// $equipe2=rand(0,5);  
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/index.css">
    <title>Petite Finale</title>
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
        margin-top: 195px;
        margin-right: 10px;
        /* margin-left: 210px; */
        width: 900px;
}

   #bt_s{
    height: 30px;
    width: 17%;
    border-radius: 10px;
    margin-top: 10px;
    border-color: white;
    background: none;
    color: white;
    background-color: rgba(2, 2, 141, 0.692);
   }
   h4{
       color :cornsilk;
   }

   #G{
    font-family: cursive;
    color: red;
    font-size: 20px;}

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
        <th  id="G">Troisième place</th>
        <th>Affiche</th>
        <th>Play</th>
        <th id="S">Score</th>
    </tr>

    <tr>
        <!-- preparation du match 15  -->
        <td>Match 15</td>
        <td><?=$_SESSION['finale1']['nom1']." vs ".$_SESSION['finale1']['nom2']?></td>
        <td>
            <!-- preparation du button jouer  -->
        <form action="" method="post">
        <select name="equipe1"> <?= Option() ?> </select>
                                    -
                            <select name="equipe2"> <?= Option() ?> </select>
            <input type="submit" name="match15" value="Jouer" id="pf">
        </form>
        <?php if(isset($_POST['match15']) &&  $_SESSION['finale1']['etat']){ 
                $_SESSION['finale1']['pfscoreEQuipe1A']=$_POST['equipe1'];
                $_SESSION['finale1']['pfscoreEQuipe2B']=$_POST['equipe2'];
            }

            if($_SESSION['finale1']['pfscoreEQuipe1A'] > $_SESSION['finale1']['pfscoreEQuipe2B'] || 
                $_SESSION['finale1']['pfscoreEQuipe1A'] < $_SESSION['finale1']['pfscoreEQuipe2B'] ){
                $_SESSION['finale1']['etat']=false;
                            // condition tant que le match est null 

while(  $_SESSION['finale1']['pfscoreEQuipe1A']== $_SESSION['finale1']['pfscoreEQuipe2B'] ) {   
    $_SESSION['finale1']['pfscoreEQuipe1A']=$_POST['equipe1'];
    $_SESSION['finale1']['pfscoreEQuipe2B']=$_POST['equipe2'];
}
        ?>
        
        <script>
            document.querySelector('#pf').disabled="disabled";
        </script>

      <?php } ?>

        </td>
        <td>
            <button><?=$_SESSION['finale1']['pfscoreEQuipe1A']?></button> : <button><?=$_SESSION['finale1']['pfscoreEQuipe2B']?></button>
        </td>
    </tr>
</table>
</div>
<h4>
    <?php 
    // condition si le premier equipe gagne 

    if($_SESSION['finale1']['pfscoreEQuipe1A'] > $_SESSION['finale1']['pfscoreEQuipe2B'])
    {
        $_SESSION['finale1']["champion"]=$_SESSION['finale1']['nom1'];
    }
    else
    {
        $_SESSION['finale1']["champion"]=$_SESSION['finale1']['nom2'];
        print "<center>";

    }
    
    if(isset($_POST['match15']))
  
    { ?></h4>
    <center>
        <form action="Finale.php" method="post">
          <button type="submit" id="bt_s"> Finale</button>
       </form>
     
   <?php } ?>
   <marquee behavior="" direction="left">C' EST LA PETITE FINAL DU TOURNOI COUPE 3<SUP>eme</SUP> INFOS  </marquee>
   </center>
</body>
</html>