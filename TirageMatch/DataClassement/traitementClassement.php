<?php  
// fonction positionner le Groupe A 
function positionnerGroupeA()
{  
  // traitement de classement pour le groupe A 

    $_SESSION['groupeA']=[
    'equipeUnGroupeA'=>
    [
        "nomEquipe"=>$_SESSION['equipeUnGroupeA']["nomEquipe"],
        "matchJoue"=>$_SESSION['equipeUnGroupeA']["matchJoue"],
        "matchGagne"=>$_SESSION['equipeUnGroupeA']["matchGagne"],
        "matchNul"=>$_SESSION['equipeUnGroupeA']["matchNul"],
        "matchPerdu"=>$_SESSION['equipeUnGroupeA']["matchPerdu"],
        "butPour"=>$_SESSION['equipeUnGroupeA']["butPour"],
        "butContre"=>$_SESSION['equipeUnGroupeA']["butContre"], 
        "difference"=>$_SESSION['equipeUnGroupeA']["difference"],
        "points"=>$_SESSION['equipeUnGroupeA']["points"]
    ],
    // ........................ 

    "equipeDeuxGroupeA"=>
    [
      "nomEquipe"=>$_SESSION['equipeDeuxGroupeA']["nomEquipe"],
      "matchJoue"=>$_SESSION['equipeDeuxGroupeA']["matchJoue"],
      "matchGagne"=>$_SESSION['equipeDeuxGroupeA']["matchGagne"],
      "matchNul"=>$_SESSION['equipeDeuxGroupeA']["matchNul"],
      "matchPerdu"=>$_SESSION['equipeDeuxGroupeA']["matchPerdu"],
      "butPour"=>$_SESSION['equipeDeuxGroupeA']["butPour"],
      "butContre"=>$_SESSION['equipeDeuxGroupeA']["butContre"], 
      "difference"=>$_SESSION['equipeDeuxGroupeA']["difference"],
      "points"=>$_SESSION['equipeDeuxGroupeA']["points"]
    ],
    // ...............................

    "equipeTroisGroupeA"=>
     [
      "nomEquipe"=>$_SESSION['equipeTroisGroupeA']["nomEquipe"],
      "matchJoue"=>$_SESSION['equipeTroisGroupeA']["matchJoue"],
      "matchGagne"=>$_SESSION['equipeTroisGroupeA']["matchGagne"],
      "matchNul"=>$_SESSION['equipeTroisGroupeA']["matchNul"],
      "matchPerdu"=>$_SESSION['equipeTroisGroupeA']["matchPerdu"],
      "butPour"=>$_SESSION['equipeTroisGroupeA']["butPour"],
      "butContre"=>$_SESSION['equipeTroisGroupeA']["butContre"], 
      "difference"=>$_SESSION['equipeTroisGroupeA']["difference"],
      "points"=>$_SESSION['equipeTroisGroupeA']["points"]
     ],
    //  ...................... 

     "equipeQuatreGroupeA"=>
    [ 
      "nomEquipe"=>$_SESSION['equipeQuatreGroupeA']["nomEquipe"],
     "matchJoue"=>$_SESSION['equipeQuatreGroupeA']["matchJoue"],
     "matchGagne"=>$_SESSION['equipeQuatreGroupeA']["matchGagne"],
     "matchNul"=>$_SESSION['equipeQuatreGroupeA']["matchNul"],
     "matchPerdu"=>$_SESSION['equipeQuatreGroupeA']["matchPerdu"],
     "butPour"=>$_SESSION['equipeQuatreGroupeA']["butPour"],
     "butContre"=>$_SESSION['equipeQuatreGroupeA']["butContre"], 
     "difference"=>$_SESSION['equipeQuatreGroupeA']["difference"],
     "points"=>$_SESSION['equipeQuatreGroupeA']["points"]
     ]
    ];
    // ..................... 

    usort($_SESSION['groupeA'], function($x, $y) {
      return $y["points"] - $x["points"];
    });

    foreach ($_SESSION['groupeA'] as $key => $value) {
      echo  "<tr>";
    foreach ($value as $key => $value){ 
       echo "<td>".$value."</td>";
      }
       echo "<tr>";
    }
}

?>
<!-- ..............  FIN DE TRAITEMENT POUR LE GROUPE A  .................  -->

<?php
// etats des matchs pour le demi final
     $_SESSION['dFInfo']=[
        'etat1'=>true,
        'etat2'=>true,
        'dfscoreEQuipe1A'=>"",
        'dfscoreEQuipe2B'=>"",
        'dfscoreEQuipe1B'=>"",
        'dfscoreEQuipe2A'=>""
     ];

// etats des matchs pour le petite finale
     $_SESSION['finale1']=[
        'etat'=>true,
        'nom1'=>"",
        'nom2'=>"",
        'pfscoreEQuipe1A'=>"",
        'pfscoreEQuipe2B'=>"",
 
     ];

// etats des matchs pour la grande finale
 $_SESSION['finale2']=[
        'etat'=>true,
        'nom1'=>"",
        'nom2'=>"",
        'gfScoreEquipe1'=>"",
        'gfScoreEquipe2'=>"",
        "champion"=>""
     ];
?>
<!-- .......................................  -->

<?php
// classement des donnees 
function classerData($dataUn,$dataDeux)
{
  // condition pour les matchs groupes A
    if($_SESSION[$dataUn]["matchJoue"]==0 && $_SESSION[$dataDeux]["matchJoue"]==0)
    {
       $_SESSION[$dataUn]["matchJoue"]=1;
       $_SESSION[$dataDeux]["matchJoue"]=1;

  // gerer les scores pour le classement
      if ($_SESSION[$dataUn]["scores"][0]>$_SESSION[$dataDeux]["scores"][0]) 
      {
        
        $_SESSION[$dataUn]["matchGagne"]=1;
        $_SESSION[$dataUn]["butPour"]=$_SESSION[$dataUn]["scores"][0];
        $_SESSION[$dataUn]["butContre"]=$_SESSION[$dataDeux]["scores"][0];
        $_SESSION[$dataUn]["difference"]=($_SESSION[$dataUn]["scores"][0] - $_SESSION[$dataDeux]["scores"][0]);
        $_SESSION[$dataUn]["points"]=3;
// .............................. 
        $_SESSION[$dataDeux]["matchPerdu"]=1;
        $_SESSION[$dataDeux]["butPour"]=$_SESSION[$dataDeux]["scores"][0];
        $_SESSION[$dataDeux]["butContre"]=$_SESSION[$dataUn]["scores"][0];
        $_SESSION[$dataDeux]["difference"]=($_SESSION[$dataDeux]["scores"][0] - $_SESSION[$dataUn]["scores"][0]);
    // ............................             
      }
      elseif($_SESSION[$dataUn]["scores"][0]<$_SESSION[$dataDeux]["scores"][0])
      {


        $_SESSION[$dataUn]["matchPerdu"]=1;
        $_SESSION[$dataUn]["butPour"]=$_SESSION[$dataUn]["scores"][0];
        $_SESSION[$dataUn]["butContre"]=$_SESSION[$dataDeux]["scores"][0];
        $_SESSION[$dataUn]["difference"]=($_SESSION[$dataUn]["scores"][0] - $_SESSION[$dataDeux]["scores"][0]);
// ................................ 

        $_SESSION[$dataDeux]["matchGagne"]=1;
        $_SESSION[$dataDeux]["butPour"]=$_SESSION[$dataDeux]["scores"][0];
        $_SESSION[$dataDeux]["butContre"]=$_SESSION[$dataUn]["scores"][0];
        $_SESSION[$dataDeux]["difference"]=($_SESSION[$dataDeux]["scores"][0] - $_SESSION[$dataUn]["scores"][0]);
        $_SESSION[$dataDeux]["points"]=3;

      }
      // ................................ 
      else
      {
        $_SESSION[$dataUn]["matchNul"]=1;
        $_SESSION[$dataUn]["butPour"]=$_SESSION[$dataUn]["scores"][0];
        $_SESSION[$dataUn]["butContre"]=$_SESSION[$dataDeux]["scores"][0];
        $_SESSION[$dataUn]["difference"]=($_SESSION[$dataUn]["scores"][0] - $_SESSION[$dataDeux]["scores"][0]);;
        $_SESSION[$dataUn]["points"]=1;  
// ...................................

        $_SESSION[$dataDeux]["matchNul"]=1;
        $_SESSION[$dataDeux]["butPour"]=$_SESSION[$dataDeux]["scores"][0];
        $_SESSION[$dataDeux]["butContre"]=$_SESSION[$dataUn]["scores"][0];
        $_SESSION[$dataDeux]["difference"]=($_SESSION[$dataDeux]["scores"][0] - $_SESSION[$dataUn]["scores"][0]);
        $_SESSION[$dataDeux]["points"]=1;
      } 
// ................................ 
    }




    elseif($_SESSION[$dataUn]["matchJoue"]==1 && $_SESSION[$dataDeux]["matchJoue"]==1)
    {
       $_SESSION[$dataUn]["matchJoue"]=2;
       $_SESSION[$dataDeux]["matchJoue"]=2;

       if ($_SESSION[$dataUn]["scores"][1]>$_SESSION[$dataDeux]["scores"][1]) 
      {
      
        $_SESSION[$dataUn]["matchGagne"]+=1;
        $_SESSION[$dataUn]["butPour"]+=$_SESSION[$dataUn]["scores"][1];
        $_SESSION[$dataUn]["butContre"]+=$_SESSION[$dataDeux]["scores"][1];
        $_SESSION[$dataUn]["difference"]+=($_SESSION[$dataUn]["scores"][1] - $_SESSION[$dataDeux]["scores"][1]);
        $_SESSION[$dataUn]["points"]+=3;
// .......................................... 

        $_SESSION[$dataDeux]["matchPerdu"]+=1;
        $_SESSION[$dataDeux]["butPour"]+=$_SESSION[$dataDeux]["scores"][1];
        $_SESSION[$dataDeux]["butContre"]+=$_SESSION[$dataUn]["scores"][1];
        $_SESSION[$dataDeux]["difference"]+=($_SESSION[$dataDeux]["scores"][1] - $_SESSION[$dataUn]["scores"][1]);
            
      }
      // .................................... 
    elseif($_SESSION[$dataUn]["scores"][1]<$_SESSION[$dataDeux]["scores"][1])
    {

      $_SESSION[$dataUn]["matchPerdu"]+=1;
      $_SESSION[$dataUn]["butPour"]+=$_SESSION[$dataUn]["scores"][1];
      $_SESSION[$dataUn]["butContre"]+=$_SESSION[$dataDeux]["scores"][1];
      $_SESSION[$dataUn]["difference"]+=($_SESSION[$dataUn]["scores"][1] - $_SESSION[$dataDeux]["scores"][1]);
// .................................... 

      $_SESSION[$dataDeux]["matchGagne"]+=1;
      $_SESSION[$dataDeux]["butPour"]+=$_SESSION[$dataDeux]["scores"][1];
      $_SESSION[$dataDeux]["butContre"]+=$_SESSION[$dataUn]["scores"][1];
      $_SESSION[$dataDeux]["difference"]+=($_SESSION[$dataDeux]["scores"][1] - $_SESSION[$dataUn]["scores"][1]);
      $_SESSION[$dataDeux]["points"]+=3;
    }
    // .................................. 
     else
     {
      $_SESSION[$dataUn]["matchNul"]+=1;
      $_SESSION[$dataUn]["butPour"]+=$_SESSION[$dataUn]["scores"][1];
      $_SESSION[$dataUn]["butContre"]+=$_SESSION[$dataDeux]["scores"][1];
      $_SESSION[$dataUn]["difference"]+=($_SESSION[$dataUn]["scores"][1] - $_SESSION[$dataDeux]["scores"][1]);;
      $_SESSION[$dataUn]["points"]+=1;  
// ...................................

      $_SESSION[$dataDeux]["matchNul"]+=1;
      $_SESSION[$dataDeux]["butPour"]+=$_SESSION[$dataDeux]["scores"][1];
      $_SESSION[$dataDeux]["butContre"]+=$_SESSION[$dataUn]["scores"][1];
      $_SESSION[$dataDeux]["difference"]+=($_SESSION[$dataDeux]["scores"][1] - $_SESSION[$dataUn]["scores"][1]);
      $_SESSION[$dataDeux]["points"]+=1;
     } 

    }

// ....................................
    else{
        $_SESSION[$dataUn]["matchJoue"]=3;
        $_SESSION[$dataDeux]["matchJoue"]=3;  

        if ($_SESSION[$dataUn]["scores"][2]>$_SESSION[$dataDeux]["scores"][2]) 
        {
        
          $_SESSION[$dataUn]["matchGagne"]+=1;
          $_SESSION[$dataUn]["butPour"]+=$_SESSION[$dataUn]["scores"][2];
          $_SESSION[$dataUn]["butContre"]+=$_SESSION[$dataDeux]["scores"][2];
          $_SESSION[$dataUn]["difference"]+=($_SESSION[$dataUn]["scores"][2] - $_SESSION[$dataDeux]["scores"][2]);
          $_SESSION[$dataUn]["points"]+=3;
  // ..................................... 
  
          $_SESSION[$dataDeux]["matchPerdu"]+=1;
          $_SESSION[$dataDeux]["butPour"]+=$_SESSION[$dataDeux]["scores"][2];
          $_SESSION[$dataDeux]["butContre"]+=$_SESSION[$dataUn]["scores"][2];
          $_SESSION[$dataDeux]["difference"]+=($_SESSION[$dataDeux]["scores"][2] - $_SESSION[$dataUn]["scores"][2]);
              
        }
        // ..................................
      elseif($_SESSION[$dataUn]["scores"][2]<$_SESSION[$dataDeux]["scores"][2])
      {
  
        $_SESSION[$dataUn]["matchPerdu"]+=1;
        $_SESSION[$dataUn]["butPour"]+=$_SESSION[$dataUn]["scores"][2];
        $_SESSION[$dataUn]["butContre"]+=$_SESSION[$dataDeux]["scores"][2];
        $_SESSION[$dataUn]["difference"]+=($_SESSION[$dataUn]["scores"][2] - $_SESSION[$dataDeux]["scores"][2]);
  // ................................. 
  
        $_SESSION[$dataDeux]["matchGagne"]+=1;
        $_SESSION[$dataDeux]["butPour"]+=$_SESSION[$dataDeux]["scores"][2];
        $_SESSION[$dataDeux]["butContre"]+=$_SESSION[$dataUn]["scores"][2];
        $_SESSION[$dataDeux]["difference"]+=($_SESSION[$dataDeux]["scores"][2] - $_SESSION[$dataUn]["scores"][2]);
        $_SESSION[$dataDeux]["points"]+=3;
      }
      // ................................ 
      else
      {
        $_SESSION[$dataUn]["matchNul"]+=1;
        $_SESSION[$dataUn]["butPour"]+=$_SESSION[$dataUn]["scores"][2];
        $_SESSION[$dataUn]["butContre"]+=$_SESSION[$dataDeux]["scores"][2];
        $_SESSION[$dataUn]["difference"]+=($_SESSION[$dataUn]["scores"][2] - $_SESSION[$dataDeux]["scores"][2]);
        $_SESSION[$dataUn]["points"]+=1;  
  // ................................ 
        $_SESSION[$dataDeux]["matchNul"]+=1;
        $_SESSION[$dataDeux]["butPour"]+=$_SESSION[$dataDeux]["scores"][2];
        $_SESSION[$dataDeux]["butContre"]+=$_SESSION[$dataUn]["scores"][2];
        $_SESSION[$dataDeux]["difference"]+=($_SESSION[$dataDeux]["scores"][2] - $_SESSION[$dataUn]["scores"][2]);
        $_SESSION[$dataDeux]["points"]+=1;
      } 
    }
}

?>