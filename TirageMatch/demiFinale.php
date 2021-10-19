   <?php 
   session_start(); 
   function Option()
   {
       for ($i=0; $i < 9; $i++) { 
           echo "<option value=$i> $i </option>";
       }
   
   }
   
  //  condition pour non match null 

//    while($equipe1==$equipe2 ) {   
//     $equipe2=rand(0,8);
//     $equipe1=rand(0,9);
// }
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
       margin-top: 140px;
       color: white;
       font: 1.2em sans-serif;
       margin-right: 40px;
   }
   th{
    background-color: rgba(0, 0, 0, 0.197);
    font-family: cursive;
   }

   td{
     text-align: right;
   }
  #bt_s{
    height: 30px;
    width: 17%;
    border-radius: 10px;
    margin-top: 20px;
    /* margin-left: 450px; */
    border-color: white;
    background: none;
    color: white;
    background-color: rgba(2, 2, 141, 0.692);
  }

  #G{
    font-family: cursive;
    color: red;
    font-size: 20px;
  }

  marquee{
    position: absolute;
        color: #5180b4;
        font-size: 90px;
        margin-top: 190px;
        margin-left: 225px;
        width: 900px;
}

  #S{
    color: yellow;
  }

  h1{
    color: cornsilk;
    font-family: cursive;
  }
  @media (max-width:900px) {
    body{
      background-image: url(img/back222.jpg);
    }
    marquee{
      display: none;
    }
  
  }
  @media (max-width:1280px) {
   marquee{
      display: none;
    }
  }

</style>

<body>
  <center>
    <h1>Demi Final</h1>
  <div id="table"> 
   <table cellpadding="10px" >
   <tr>
   <th  id="G">Demi-Finale</th>
   <th>Affiche</th>
   <th>Jouer</th>
   <th id="S">Score</th>
   </tr>
   <!-- espace de jeu pour le match 13  -->
   <tr>
   <td>Match 13</td>
   <td><?=$_SESSION['groupeA'][0]["nomEquipe"]." VS ".$_SESSION['groupeB'][1]["nomEquipe"] ?></td>
   <td>
     <!-- creer un form pour le button Jouer  -->
   <form action="" method="post">
   <select name="equipe1"> <?= Option() ?> </select>
                                    -
                            <select name="equipe2"> <?= Option() ?> </select>
    <input type="submit" name="match13" value="Jouer" id="dfm1" >
    </form>
    <!-- condition pour le match 13  -->
    <?php if(isset($_POST['match13']) && ($_SESSION['dFInfo']['etat1'])){
      $_SESSION['dFInfo']['dfscoreEQuipe1A'] =$_POST['equipe1'];
      $_SESSION['dFInfo']['dfscoreEQuipe2B']=$_POST['equipe2'];
       $_SESSION['dFInfo']['etat1']=false; 
    }

// condition si le match est null 


// ............................... 
    if($_SESSION['dFInfo']['etat1']==false){
   ?>
   </td>
    <td>
      <!-- sricpt pour  desactiver le bouton jouer  -->
      <script>
        document.querySelector('#dfm1').disabled="disabled";
      </script>

     <button><?=$_SESSION['dFInfo']['dfscoreEQuipe1A']?></button>:<button><?=$_SESSION['dFInfo']['dfscoreEQuipe2B']?></button>
     <?php } ?>
    </td>
  
   </tr>
   <tr>

     <!-- liste instructions pour le Match 14   -->

   <td>Match 14</td>
   <td><?=$_SESSION['groupeB'][0]["nomEquipe"]." vs ".$_SESSION['groupeA'][1]["nomEquipe"] ?></td>
   <td>

     <!-- creer un form pour le button Jouer  -->
   <form action="" method="post">
   <select name="equipe1"> <?= Option() ?> </select>
                                    -
                            <select name="equipe2"> <?= Option() ?> </select>
   <input type="submit" name="match14" value="Jouer" <?php if($_SESSION['dFInfo']['etat1']){ ?> disabled="disabled" <?php  }
   ?> id="dfm2">
    </form>
    <?php if(isset($_POST['match14']) && ($_SESSION['dFInfo']['etat2'])){
      $_SESSION['dFInfo']['dfscoreEQuipe1B'] =$_POST['equipe1'];
      $_SESSION['dFInfo']['dfscoreEQuipe2A']=$_POST['equipe2'];
       $_SESSION['dFInfo']['etat2']=false; 
    }
    if($_SESSION['dFInfo']['etat2']==false){
   ?>
   </td>
      <td>
        <!-- desactiver le button jouer apres  -->
      <script>
        document.querySelector('#dfm2').disabled="disabled";
      </script>
      <!-- espace pour lles scores  -->
     <button><?=$_SESSION['dFInfo']['dfscoreEQuipe1B']?></button>:<button><?=$_SESSION['dFInfo']['dfscoreEQuipe2A']?></button>
     <?php } ?>
     </td>
   </tr>
   </table>
  </div>
  </center>
  <!-- condition si score dfscoreEQuipe1A est supperieur au dfscoreEQuipe2B  -->
   <?php 
   if($_SESSION['dFInfo']['dfscoreEQuipe1A'] > $_SESSION['dFInfo']['dfscoreEQuipe2B'])
   {
        $_SESSION['finale1']['nom1']=$_SESSION['groupeB'][1]["nomEquipe"];    
        $_SESSION['finale2']['nom1']=$_SESSION['groupeA'][0]["nomEquipe"];    
   }
  //  condition si le score dfscoreEQuipe1A est inferieur 
   elseif($_SESSION['dFInfo']['dfscoreEQuipe1A'] < $_SESSION['dFInfo']['dfscoreEQuipe2B'])
   {
        $_SESSION['finale1']['nom1']=$_SESSION['groupeA'][0]["nomEquipe"];     
        $_SESSION['finale2']['nom1']=$_SESSION['groupeB'][1]["nomEquipe"];     
   }

   //.................................................

//  condition si score dfscoreEQuipe1B est supperieur au dfscoreEQuipe2A 

   if($_SESSION['dFInfo']['dfscoreEQuipe1B'] > $_SESSION['dFInfo']['dfscoreEQuipe2A'])
   {
        $_SESSION['finale1']['nom2']=$_SESSION['groupeA'][1]["nomEquipe"];    
        $_SESSION['finale2']['nom2']=$_SESSION['groupeB'][0]["nomEquipe"];    
   }
   //  condition si le score dfscoreEQuipe1A est inferieur 

   elseif($_SESSION['dFInfo']['dfscoreEQuipe1B'] < $_SESSION['dFInfo']['dfscoreEQuipe2A'])
   {
        $_SESSION['finale1']['nom2']=$_SESSION['groupeB'][0]["nomEquipe"];     
        $_SESSION['finale2']['nom2']=$_SESSION['groupeA'][1]["nomEquipe"];     
   }
   
// Condition apres match 14 pour afficher le bouton suivants 
   if(isset($_POST['match14']))
   { ?>
   <center>
      <form action="petiteFinale.php" method="post">
      <button type="submit" id="bt_s"> Petite Finale</button>
      </form>
      </center>
   <?php }
    ?>
      <marquee behavior="" direction="left">C' EST LA DEMI - FINAL DU TOURNOI COUPE 3<SUP>eme</SUP> INFOS  </marquee>
</body>
</html>