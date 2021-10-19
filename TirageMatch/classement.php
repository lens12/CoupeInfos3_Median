<?php
// demarer la session 
session_start();

include 'DataClassement/groupeA.php';
include 'DataClassement/groupeB.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="">
    <title>Classement</title>
</head>


<style>
   body{
      background-image: url(img/backA.jpg);
    background-size: cover;
   }
   #GroupA{
     width: 50%;
  
    color: white;

  }
  .btn-btn-succes{
    height: 30px;
    width: 17%;
    border-radius: 10px;
    border-color: white;
    background: none;
    color: white;
    margin-top: 90px;
    background-color: rgba(2, 2, 141, 0.092);
  }
  table{
    margin: 5px;
  }
  tr{
    margin: 15px;
    background-color: rgba(0, 0, 0, 0.097);
  }
.grp{
  margin-top: 80px;
  display: flex;
}
  #GroupB{
    width: 50%;
    color: white;
    justify-content: space-around;
  }
 #G{
  font-family: cursive;
    color: red;
    font-size: 20px;

  }
  #S{
    color: yellow;
  }
  #H{
    font-family: cursive;
    margin-top: 10px;
    color: white;
  }
  @media (max-width:900px) {

    #GroupA{
     width: 90%;
  }

  #GroupB{
     width: 90%;
  }

    .grp{
      /* width: 100%; */
  margin-top: 80px;
  display: block;
}
table{
  width: 100%;
}

.btn-btn-succes{
  background-color: yellow;
  color: black;
  margin-top: -20px;
  border-color: black;
  }
}
</style>


<body>

<center>
  <!-- la grande titre pour la page  -->
  <h1 id="H">Classement</h1>

<hr>
<div class="grp">
<div id="GroupA">
  <!-- creation de tableau pour les classements de points Groupe A -->
  <table  cellspacing="10px">
 
   <tr>
   <td id="G">Groupe A</td>
   <td> MJ </td>
   <td> MG </td>
   <td> MN </td>
   <td> MP </td>
   <td> BP </td>
   <td> BC </td>
   <td> Dif </td>
   <td id="S"> Point </td>
   </tr>

<!-- position les points groupes A  -->

  <?php positionnerGroupeA(); ?>
  </table>
</div>

  <!-- creation de tableau pour les classements de points Groupe B  -->
<div id="GroupB">
  <table  cellspacing="10px" >
   <tr >
   <td id="G">Groupe B</td>
   <td> MJ </td>
   <td> MG </td>
   <td> MN </td>
   <td> MP </td>
   <td> BP </td>
   <td> BC </td>
   <td> Dif </td>
   <td id="S" align=center> Point </td>
   </tr>
   <!-- position les points groupes B  -->
   <?php positionnerGroupeB(); ?>
  </table>
  </div>
  </div>
  <!-- Recuperer les points avec la variables session  -->
<?php 
   if($_SESSION['equipeUnGroupeA']["matchJoue"]==3
    && $_SESSION['equipeDeuxGroupeA']["matchJoue"]==3
    && $_SESSION['equipeTroisGroupeA']["matchJoue"]==3 
    && $_SESSION['equipeQuatreGroupeA']["matchJoue"]==3
    && $_SESSION['equipeUnGroupeB']["matchJoue"]==3
    && $_SESSION['equipeDeuxGroupeB']["matchJoue"]==3
    && $_SESSION['equipeTroisGroupeB']["matchJoue"]==3
    && $_SESSION['equipeQuatreGroupeB']["matchJoue"]==3
    )
   {
     ?>

<?php 
} 
?>

        <form action="demiFinale.php" method="post">
           <input type="submit" value=" Demie-finale" name="df" class="btn-btn-succes">
        </form>
        </center>
</body>
</html>
