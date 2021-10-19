<?php
// demarer la session  

session_start();

// valeur aleatoir pour chaque equipe 

// $equipe1=rand(0,9);
// $equipe2=rand(0,9);

function Option()
{
    for ($i=0; $i < 9; $i++) { 
        echo "<option value=$i> $i </option>";
    }

}
include 'DataClassement/traitementClassement.php';
?>


<!DOCTYPE html>
<html lang="fr-FR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="">
    <title>Premiere tour</title>
</head>
<!-- style dans les pages  -->
<style>
  
*{
   margin: 0px;
    padding: 0px; 
}
  
  body{
    background-image: url(img/backA.jpg);
    background-size: cover;
    font-family: calibri;
    font-size: 16px;
    color: white;
  }
  #tableA{
    margin-left: 100px;
    line-height: 30px;
    margin-top: 20px;
  }
  #tableB{
    float:  right;
    margin-top: -220px;
    margin-right: 100px;
    line-height: 30px;
  }

.btn-retour{
  margin-left: 20px;
  margin-top: 20px;
  background: none;
}
.btn-r{
  color: white;
  background: none;
  width: 80px;
  height: 25px;
  border-color: white;
}
  .btn-btn-succes{
    height: 30px;
    width: 17%;
    border-radius: 10px;
    margin-top: 40px;
    margin-left: 550px;
    border-color: white;
    background: none;
    color: white;
    background-color: rgba(2, 2, 141, 0.692);
  }
  .GroupA{
  
    margin-left: 300px;
    color: white;
    margin-top: 5px;
    border: 2px;
    background-color: rgba(0, 0, 0, 0.192);
    width: 150px;
    
  }
  .GroupB{
    float: right;
    margin-top: -105px;
    margin-right: 300px;
    color: white;
    border: 2px;
    background-color: rgba(0, 0, 0, 0.192);
    width: 150px;
    text-align: left;
  }
  td{
    text-align: center;
    align-items: left;
    align-content: right;
  }
  #G{
    font-family: cursive;
    color: red;
    font-size: 20px;
  }
  #S{
    color: yellow;
  }
  #M{
    color: blue;
  }
  #H{
    margin-top: -25px;
  }

  @media (max-width:900px) {
    body{
      background-image: url(img/back222.jpg);
    }  
    .GroupA{
  margin-left: 40%;
  color: white;
  margin-top: 20px;
  border: 2px;
  background-color: rgba(0, 0, 0, 0.192);
  width: 200px;
}
      .GroupB{
    margin-left: 40%;
    margin-top: 55px;
    color: white;
    border: 2px;
    background-color: rgba(0, 0, 0, 0.192);
    width: 200px;
    position: absolute;
  }
  #tableA{
    margin-left: 250px;
    line-height: 30px;
    margin-top: 200px;
  }
  #tableB{
    margin-top:100px;
    margin-left: 250px;
    line-height: 30px;
    position: absolute;
  }
  .btn-btn-succes {
            height: 30px;
            width: 25%;
            margin-left: 300px;
            margin-top: 400px;
            border-radius: 10px;
            border-color: black;
            background: none;
            color: black;
            background-color: yellow;
        }
}

</style>


<body>
  <div class="btn-retour"> 
        <a href="Tirage.php">
          <input type="submit" value=" Retour" class="btn-r"> 
        </a>
  </div>
<center>
<h1 id="H">Espace de jeu</h1>
<hr>
</center>
<div class="GroupA"> 
   <center>

<!-- tableau des listes equipe pour le Groupe A  -->

  <h2 id="G">Groupe-A</h2>
  <hr>

  <ul><?php echo $_SESSION['equipeUnGroupeA']["nomEquipe"]; ?></ul>
  <ul><?php echo  $_SESSION['equipeDeuxGroupeA']["nomEquipe"]; ?></ul>
  <ul><?php echo $_SESSION['equipeTroisGroupeA']["nomEquipe"]; ?></ul>
  <ul><?php echo $_SESSION['equipeQuatreGroupeA']["nomEquipe"]; ?></ul>
  </center>
</div>

<div class="GroupB">
    <center>
      <!-- tableau des listes equipes pour le Groupe B -->
  <h2 id="G">Groupe-B</h2>
  <hr>

    <ul><?php echo $_SESSION['equipeUnGroupeB']["nomEquipe"]; ?></ul>
    <ul><?php echo $_SESSION['equipeDeuxGroupeB']["nomEquipe"]; ?></ul>
    <ul><?php echo $_SESSION['equipeTroisGroupeB']["nomEquipe"]; ?></ul>
    <ul><?php echo $_SESSION['equipeQuatreGroupeB']["nomEquipe"]; ?></ul>
    </center>
  </div> <br> <br>

<!-- Creation de table groupe et en tete du  tableau  -->

        <table id="tableA" cellpadding="10px">
        <tr>
           <th id="G">Groupe A</th>
           <th>Affiche</th>
           <!-- <th></th> -->
           <th>Jouer</th>
           <th id="S">Score</th>   
        </tr>


        <tr>
          <!-- pour le premier matchs  -->

        <td id="">Match 1</td>
        <td>
           <?php echo $_SESSION['equipeUnGroupeA']["nomEquipe"]." VS ".$_SESSION['equipeDeuxGroupeA']["nomEquipe"]; ?>
      </td>
        <td>
          <!-- bouton jouer  -->
            <form action="" method="post">
            <select name="equipe1"> <?= Option() ?> </select>
                                    -
                            <select name="equipe2"> <?= Option() ?> </select>
                  <input type="submit" name="match1" value="Jouer" id="match1">
              </form>
            </td>
            <!-- verifier et stocker les scores  -->

          <?php if(isset($_POST['match1']) &&  $_SESSION['matchUn']==false){
              $_SESSION['equipeUnGroupeA']["scores"][0]= $_POST['equipe1'];
              $_SESSION['equipeDeuxGroupeA']["scores"][0]= $_POST['equipe2']; 
              $_SESSION['matchUn']=true; 
              $_SESSION['matchDeux']=false;
              classerData('equipeUnGroupeA','equipeDeuxGroupeA');
            }
           if($_SESSION['matchUn']==true){
          ?>
           <td>
             <!-- script permettant de desactiver le button jouer -->
          <script>
              document.querySelector('#match1').disabled="disabled";
          </script>
          <!-- differencier les scores du matchs  -->
           <button>
             <?php echo $_SESSION['equipeUnGroupeA']["scores"][0]; ?>
            </button>
            :
             <button>
               <?php echo $_SESSION['equipeDeuxGroupeA']["scores"][0]; ?>
              </button>  
           <?php
          }
          ?>
        </td>
        <!-- ............... FIN MATCH 1 .................  -->

        </tr>
<!-- conditions et repartition pour le match 2  -->
        <tr>
        <td>Match 2</td>
        <td> <?php echo $_SESSION['equipeTroisGroupeA']["nomEquipe"]." VS ".$_SESSION['equipeQuatreGroupeA']["nomEquipe"]; ?></td>
        <td>
            <form action="" method="post">
            <select name="equipe1"> <?= Option() ?> </select>
                                    -
                            <select name="equipe2"> <?= Option() ?> </select>
                  <input type="submit" name="match2" value="Jouer" <?php if($_SESSION['matchDeux']){ ?> disabled="disabled" <?php  }?> id="match2">
              </form>
        </td>

         <!-- verifier et stocker les scores  -->
        <?php 
        if(isset($_POST['match2']) &&  $_SESSION['matchDeux']==false){
            $_SESSION['equipeTroisGroupeA']["scores"][0]=$_POST['equipe1'];
            $_SESSION['equipeQuatreGroupeA']["scores"][0]=$_POST['equipe2']; 

              $_SESSION['matchDeux']=true;
              $_SESSION['matchTrois']=false; 
              classerData('equipeTroisGroupeA','equipeQuatreGroupeA'); 
            } 
           if($_SESSION['matchDeux']==true){
          ?>
<!-- ...................................... -->

<!-- script pour desactiver le button  -->

        <td>
        <script>
              document.querySelector('#match2').disabled="disabled";
          </script>

         <!-- differencier les scores du matchs  -->

           <button><?php echo $_SESSION['equipeTroisGroupeA']["scores"][0]; ?></button> : <button><?php echo  $_SESSION['equipeQuatreGroupeA']["scores"][0]; ?></button>  
           <?php
          }
          ?> 
        </td>
        </tr>

        <tr>
        <!-- conditions et repartition pour le match 3  -->
        <td>Match 3</td>
        <td> <?php echo $_SESSION['equipeUnGroupeA']["nomEquipe"] ." VS ".$_SESSION['equipeTroisGroupeA']["nomEquipe"]; ?></td>
        <td>
            <form action="" method="post">
            <select name="equipe1"> <?= Option() ?> </select>
                                    -
                            <select name="equipe2"> <?= Option() ?> </select>
                  <input type="submit" name="match3" value="Jouer" <?php if($_SESSION['matchTrois']){ ?> disabled="disabled" <?php  }?> id="match3">
              </form>
        </td>

         <!-- verifier et stocker les scores  -->
        <?php 
        if(isset($_POST['match3']) &&  $_SESSION['matchTrois']==false){
            $_SESSION['equipeUnGroupeA']["scores"][1]=$_POST['equipe1'];
            $_SESSION['equipeTroisGroupeA']["scores"][1]=$_POST['equipe2']; 

              $_SESSION['matchTrois']=true;
              $_SESSION['matchQuatre']=false; 
              classerData('equipeUnGroupeA','equipeTroisGroupeA'); 
            } 
           if($_SESSION['matchTrois']==true){
          ?>
          <!-- ............................  -->

          <!-- script pour desactiver le button  -->
        <td>
        <script>
              document.querySelector('#match3').disabled="disabled";
          </script>

           <!-- differencier les scores du matchs  -->
           <button><?php echo $_SESSION['equipeUnGroupeA']["scores"][1]; ?></button> : <button><?php echo  $_SESSION['equipeTroisGroupeA']["scores"][1]; ?></button>  
           <?php
          }
          ?>  
        </td>
        </tr>

<!-- conditions et repartition pour le match 4  -->

        <tr>
        <td>Match 4</td>
        <td> <?php echo $_SESSION['equipeDeuxGroupeA']["nomEquipe"]." VS ".$_SESSION['equipeQuatreGroupeA']["nomEquipe"]; ?></td>
        <td>
            <form action="" method="post">
            <select name="equipe1"> <?= Option() ?> </select>
                                    -
                            <select name="equipe2"> <?= Option() ?> </select>
                  <input type="submit" name="match4" value="Jouer" <?php if($_SESSION['matchQuatre']){ ?> disabled="disabled" <?php  } ?> id="match4">
              </form>
        </td>

         <!-- verifier et stocker les scores  -->
        <?php 
        if(isset($_POST['match4']) &&  $_SESSION['matchQuatre']==false){
            $_SESSION['equipeDeuxGroupeA']["scores"][1]=$_POST['equipe1'];
            $_SESSION['equipeQuatreGroupeA']["scores"][1]=$_POST['equipe2']; 

              $_SESSION['matchQuatre']=true;
              $_SESSION['matchCinq']=false; 
              classerData('equipeDeuxGroupeA','equipeQuatreGroupeA'); 
            } 
           if($_SESSION['matchQuatre']==true){
          ?>
<!-- ................................................ -->

<!-- script pour desactiver le button  -->

        <td>
        <script>
              document.querySelector('#match4').disabled="disabled";
          </script>

           <!-- differencier les scores du matchs  -->

           <button><?php echo $_SESSION['equipeDeuxGroupeA']["scores"][1]; ?></button> : <button><?php echo  $_SESSION['equipeQuatreGroupeA']["scores"][1]; ?></button>  
           <?php
          }
          ?>   
        </td>
        </tr>

        <!-- conditions et repartition pour le match 5  -->
        <tr>   
        <td>Match 5</td>
        <td> <?php echo $_SESSION['equipeUnGroupeA']["nomEquipe"] ." VS ".$_SESSION['equipeQuatreGroupeA']["nomEquipe"]; ?></td>
        <td>
            <form action="" method="post">
            <select name="equipe1"> <?= Option() ?> </select>
                                    -
                            <select name="equipe2"> <?= Option() ?> </select>
                  <input type="submit" name="match5" value="Jouer" <?php if($_SESSION['matchCinq']){ ?> disabled="disabled" <?php  }?> id="match5">
              </form>
              </td>

               <!-- verifier et stocker les scores  -->
        <?php 
        if(isset($_POST['match5']) &&  $_SESSION['matchCinq']==false){
            $_SESSION['equipeUnGroupeA']["scores"][2]=$_POST['equipe1'];
            $_SESSION['equipeQuatreGroupeA']["scores"][2]=$_POST['equipe2']; 

              $_SESSION['matchCinq']=true;
              $_SESSION['matchSix']=false; 
              classerData('equipeUnGroupeA','equipeQuatreGroupeA'); 
            } 
           if($_SESSION['matchCinq']==true){
          ?>
          <!-- .................................  -->

          <!-- script pour desactiver le button  -->
        <td>
        <script>
              document.querySelector('#match5').disabled="disabled";
          </script>

           <!-- differencier les scores du matchs  -->
           <button><?php echo $_SESSION['equipeUnGroupeA']["scores"][2]; ?></button> : <button><?php echo  $_SESSION['equipeQuatreGroupeA']["scores"][2]; ?></button>  
           <?php
          }
          ?>   
        </td>
        </tr>
        <tr>
          
        <!-- conditions et repartition pour le match 6  -->
        <td>Match 6</td>
        <td> <?php echo $_SESSION['equipeDeuxGroupeA']["nomEquipe"] ." VS ".$_SESSION['equipeTroisGroupeA']["nomEquipe"]; ?></td>
        <td>
            <form action="" method="post">
            <select name="equipe1"> <?= Option() ?> </select>
                                    -
                            <select name="equipe2"> <?= Option() ?> </select>
                  <input type="submit" name="match6" value="Jouer" <?php if($_SESSION['matchSix']){ ?> disabled="disabled" <?php  }?> id="match6">
              </form>
        </td>
         <!-- verifier et stocker les scores  -->
        <?php 
        if(isset($_POST['match6']) &&  $_SESSION['matchSix']==false){
            $_SESSION['equipeDeuxGroupeA']["scores"][2]=$_POST['equipe1'];
            $_SESSION['equipeTroisGroupeA']["scores"][2]=$_POST['equipe2']; 

              $_SESSION['matchSix']=true;
              $_SESSION['matchSept']=false; 
              classerData('equipeDeuxGroupeA','equipeTroisGroupeA'); 
            } 
           if($_SESSION['matchSix']==true){
          ?>
          <!-- ..........................................  -->

<!-- script pour desactiver le button  -->
        <td>
        <script>
              document.querySelector('#match6').disabled="disabled";
          </script>

           <!-- differencier les scores du matchs  -->

           <button><?php echo $_SESSION['equipeDeuxGroupeA']["scores"][2]; ?></button> : <button><?php echo  $_SESSION['equipeTroisGroupeA']["scores"][2]; ?></button>  
           <?php
          }
          ?>   
        </td>
        </tr>
       </table>


<!-- creation des tables pour le Groupes B  -->

       <table id="tableB">
        <tr>
           <th id="G">Groupe B</th>
           <th>Affiche</th>
           <th> Jouer</th>
           <th id="S">Score</th>   
        </tr>
<!-- conditions et repartition pour le match 8  -->
        <tr>
        <td>Match 7</td>
        <td> <?php echo $_SESSION['equipeUnGroupeB']["nomEquipe"]." VS ".$_SESSION['equipeDeuxGroupeB']["nomEquipe"]; ?></td>
        <td>
            <form action="" method="post">
            <select name="equipe1"> <?= Option() ?> </select>
                                    -
                            <select name="equipe2"> <?= Option() ?> </select>
                  <input type="submit" name="match7" value="Jouer" <?php if($_SESSION['matchSept']){ ?> disabled="disabled" <?php  }?> id="match7">
              </form>
        </td>

         <!-- verifier et stocker les scores  -->
        <?php 
        if(isset($_POST['match7']) &&  $_SESSION['matchSept']==false){
              $_SESSION['matchSept']=true;
              $_SESSION['matchHuit']=false; 
            ?>
              <script>
              location.reload();
             </script>
            <?php
              $_SESSION['equipeUnGroupeB']["scores"][0]=$_POST['equipe1'];
              $_SESSION['equipeDeuxGroupeB']["scores"][0]=$_POST['equipe2'];
              classerData('equipeUnGroupeB','equipeDeuxGroupeB');  
            } 
           if($_SESSION['matchSept']==true){
          ?>
          <!-- .....................................  -->

          <!-- script pour desactiver le button  -->
        <td>
        <script>
              document.querySelector('#match7').disabled="disabled";
          </script>

           <!-- differencier les scores du matchs  -->
           <button><?php echo $_SESSION['equipeUnGroupeB']["scores"][0]; ?></button> : <button><?php echo $_SESSION['equipeDeuxGroupeB']["scores"][0]; ?></button>  
           <?php
          }
          ?> 
        </td>
        </tr>
<!-- conditions et repartition pour le match 8  -->
        <tr>
        <td>Match 8</td>
        <td> <?php echo $_SESSION['equipeTroisGroupeB']["nomEquipe"]." VS ".$_SESSION['equipeQuatreGroupeB']["nomEquipe"]; ?></td>
        <td>
            <form action="" method="post">
            <select name="equipe1"> <?= Option() ?> </select>
                                    -
                            <select name="equipe2"> <?= Option() ?> </select>
                  <input type="submit" name="match8" value="Jouer" <?php if($_SESSION['matchHuit']){ ?> disabled="disabled" <?php  }?> id="match8">
              </form>
        </td>

         <!-- verifier et stocker les scores  -->
        <?php 
        if(isset($_POST['match8']) &&  $_SESSION['matchHuit']==false){
            $_SESSION['matchHuit']=true;
            $_SESSION['matchNeuf']=false; 
          ?>
            <script>
            location.reload();
           </script>
          <?php
            $_SESSION['equipeTroisGroupeB']["scores"][0]=$_POST['equipe1'];
            $_SESSION['equipeQuatreGroupeB']["scores"][0]=$_POST['equipe2']; 
            classerData('equipeTroisGroupeB','equipeQuatreGroupeB'); 
          } 
         if($_SESSION['matchHuit']){
        ?>
        <!-- ......................................  -->


<!-- script pour desactiver le button  -->
        <td>
        <script>
              document.querySelector('#match8').disabled="disabled";
          </script>

           <!-- differencier les scores du matchs  -->

           <button><?php echo $_SESSION['equipeTroisGroupeB']["scores"][0]; ?></button> : <button><?php echo $_SESSION['equipeQuatreGroupeB']["scores"][0]; ?></button>  
           <?php
          }
          ?> 
        </td>
        </tr>
<!-- Match 9  -->
        <tr>
        <td>Match 9</td>
        <td> <?php echo $_SESSION['equipeUnGroupeB']["nomEquipe"] ." VS ".$_SESSION['equipeTroisGroupeB']["nomEquipe"]; ?></td>
        <td>
            <form action="" method="post">
            <select name="equipe1"> <?= Option() ?> </select>
                                    -
                            <select name="equipe2"> <?= Option() ?> </select>
                  <input type="submit" name="match9" value="Jouer" <?php if($_SESSION['matchNeuf']){ ?> disabled="disabled" <?php  }?> id="match9">
              </form>
        </td>

         <!-- verifier et stocker les scores  -->
        <?php 
        if(isset($_POST['match9']) &&  $_SESSION['matchNeuf']==false){
            $_SESSION['matchNeuf']=true;
            $_SESSION['matchDix']=false; 
          ?>
            <script>
            location.reload();
           </script>
          <?php
            $_SESSION['equipeUnGroupeB']["scores"][1]=$_POST['equipe1'];
            $_SESSION['equipeTroisGroupeB']["scores"][1]=$_POST['equipe2']; 
            classerData('equipeUnGroupeB','equipeTroisGroupeB'); 
          } 
         if($_SESSION['matchNeuf']){
        ?>
<!-- ................................  -->

<!-- script pour desactiver le button  -->
        <td>
        <script>
              document.querySelector('#match9').disabled="disabled";
          </script>
           <!-- differencier les scores du matchs  -->
           <button><?php echo $_SESSION['equipeUnGroupeB']["scores"][1]; ?></button> : <button><?php echo $_SESSION['equipeTroisGroupeB']["scores"][1]; ?></button>  
           <?php
          }
          ?> 
        </td>
        </tr>

        <!-- condition et repation pour le match 10  -->
        <tr>
        <td>Match 10</td>
        <td><?php echo $_SESSION['equipeDeuxGroupeB']["nomEquipe"] ." VS ". $_SESSION['equipeQuatreGroupeB']["nomEquipe"]; ?></td>
        <td>
            <form action="" method="post">
            <select name="equipe1"> <?= Option() ?> </select>
                                    -
                            <select name="equipe2"> <?= Option() ?> </select>
                  <input type="submit" name="match10" value="Jouer" <?php if($_SESSION['matchDix']){ ?> disabled="disabled" <?php  }?> id="match10">
              </form>
        </td>
        <td>
           <!-- verifier et stocker les scores  -->
        <?php 
        if(isset($_POST['match10']) &&  $_SESSION['matchDix']==false){
            $_SESSION['matchDix']=true;
            $_SESSION['matchOnze']=false; 
          ?>
            <script>
            location.reload();
           </script>
          <?php
            $_SESSION['equipeDeuxGroupeB']["scores"][1]=$_POST['equipe1'];
            $_SESSION['equipeQuatreGroupeB']["scores"][1]=$_POST['equipe2']; 
            classerData('equipeDeuxGroupeB','equipeQuatreGroupeB'); 
          } 
         if($_SESSION['matchDix']){
        ?>
<!-- ...................................  -->
 
<!-- script pour desactiver le button  -->
        <script>
              document.querySelector('#match10').disabled="disabled";
          </script>

           <!-- differencier les scores du matchs  -->

           <button><?php echo $_SESSION['equipeDeuxGroupeB']["scores"][1]; ?></button> : <button><?php echo $_SESSION['equipeQuatreGroupeB']["scores"][1]; ?></button>  
           <?php
          }
          ?> 
        </td>
        </tr>
<!-- match 11  -->
        <tr>   
        <td>Match 11</td>
        <td> <?php echo $_SESSION['equipeUnGroupeB']["nomEquipe"] ." VS ".$_SESSION['equipeQuatreGroupeB']["nomEquipe"]; ?></td>
        <td>
            <form action="" method="post">
            <select name="equipe1"> <?= Option() ?> </select>
                                    -
                            <select name="equipe2"> <?= Option() ?> </select>
                  <input type="submit" name="match11" value="Jouer" <?php if($_SESSION['matchOnze']){ ?> disabled="disabled" <?php  }?> id="match11">
              </form>
        </td>
        <td>
           <!-- verifier et stocker les scores  -->
        <?php 
        if(isset($_POST['match11']) &&  $_SESSION['matchOnze']==false){
            $_SESSION['matchOnze']=true;
            $_SESSION['matchDouze']=false; 
          ?>
            <script>
            location.reload();
           </script>
          <?php
            $_SESSION['equipeUnGroupeB']["scores"][2]=$_POST['equipe1'];
            $_SESSION['equipeQuatreGroupeB']["scores"][2]=$_POST['equipe2']; 
            classerData('equipeUnGroupeB','equipeQuatreGroupeB'); 
          } 
         if($_SESSION['matchOnze']){
        ?>
<!-- ........................................  -->

<!-- script pour desactiver le button  -->
        <script>
              document.querySelector('#match11').disabled="disabled";
          </script>

           <!-- differencier les scores du matchs  -->

           <button><?php echo $_SESSION['equipeUnGroupeB']["scores"][2]; ?></button> : <button><?php echo $_SESSION['equipeQuatreGroupeB']["scores"][2]; ?></button>  
           <?php
          }
          ?>  
        </td>
        </tr>
<!-- Match 12  -->
        <tr>   
        <td>Match 12</td>
        <td> <?php echo $_SESSION['equipeDeuxGroupeB']["nomEquipe"] ." VS ".$_SESSION['equipeTroisGroupeB']["nomEquipe"]; ?></td>
        <td>
            <form action="" method="post">
            <select name="equipe1"> <?= Option() ?> </select>
                                    -
                            <select name="equipe2"> <?= Option() ?> </select>
                  <input type="submit" name="match12" value="Jouer" <?php if($_SESSION['matchDouze']){ ?> disabled="disabled" <?php  }?> id="match12">
              </form>
        </td>
        <td>
           <!-- verifier et stocker les scores  -->
        <?php 
        if(isset($_POST['match12']) &&  $_SESSION['matchDouze']==false){
            $_SESSION['matchDouze']=true;
            $_SESSION['equipeDeuxGroupeB']["scores"][2]=$_POST['equipe1'];
            $_SESSION['equipeTroisGroupeB']["scores"][2]=$_POST['equipe2']; 
            classerData('equipeDeuxGroupeB','equipeTroisGroupeB'); 
          } 
         if($_SESSION['matchDouze']){
        ?>
<!-- .........................................  -->

        <!-- script pour desactiver le button  -->
        <script>
              document.querySelector('#match12').disabled="disabled";
          </script>
<!-- differencier les scores du matchs  -->

           <button>
             <?php echo $_SESSION['equipeDeuxGroupeB']["scores"][2]; ?>
            </button>
             : 
             <button>
               <?php echo $_SESSION['equipeTroisGroupeB']["scores"][2]; ?>
              </button>  
           <?php
          }
          ?>  
        </td>
        </tr>
       </table>

       <!-- verifier les points pour le classement  -->
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
    {?>
      <form action="classement.php" method="post">
         <input type="submit" value="classement" name="df" class="btn-btn-succes">
      </form>
<?php } ?>
</body>
</html>