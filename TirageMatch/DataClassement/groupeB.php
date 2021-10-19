<?php 

function positionnerGroupeB()
{ 
  // positionner les scores du groupe B 

  $_SESSION['groupeB']=[
    'equipeUnGroupeB'=>
    [
        "nomEquipe"=>$_SESSION['equipeUnGroupeB']["nomEquipe"],
        "matchJoue"=>$_SESSION['equipeUnGroupeB']["matchJoue"],
        "matchGagne"=>$_SESSION['equipeUnGroupeB']["matchGagne"],
        "matchNul"=>$_SESSION['equipeUnGroupeB']["matchNul"],
        "matchPerdu"=>$_SESSION['equipeUnGroupeB']["matchPerdu"],
        "butPour"=>$_SESSION['equipeUnGroupeB']["butPour"],
        "butContre"=>$_SESSION['equipeUnGroupeB']["butContre"], 
        "difference"=>$_SESSION['equipeUnGroupeB']["difference"],
        "points"=>$_SESSION['equipeUnGroupeB']["points"]
    ],
    // ......................... 

    "equipeDeuxGroupeB"=>
    [
      "nomEquipe"=>$_SESSION['equipeDeuxGroupeB']["nomEquipe"],
      "matchJoue"=>$_SESSION['equipeDeuxGroupeB']["matchJoue"],
      "matchGagne"=>$_SESSION['equipeDeuxGroupeB']["matchGagne"],
      "matchNul"=>$_SESSION['equipeDeuxGroupeB']["matchNul"],
      "matchPerdu"=>$_SESSION['equipeDeuxGroupeB']["matchPerdu"],
      "butPour"=>$_SESSION['equipeDeuxGroupeB']["butPour"],
      "butContre"=>$_SESSION['equipeDeuxGroupeB']["butContre"], 
      "difference"=>$_SESSION['equipeDeuxGroupeB']["difference"],
      "points"=>$_SESSION['equipeDeuxGroupeB']["points"]
    ],
    // .............................. 
    "equipeTroisGroupeB"=>
     [
      "nomEquipe"=>$_SESSION['equipeTroisGroupeB']["nomEquipe"],
      "matchJoue"=>$_SESSION['equipeTroisGroupeB']["matchJoue"],
      "matchGagne"=>$_SESSION['equipeTroisGroupeB']["matchGagne"],
      "matchNul"=>$_SESSION['equipeTroisGroupeB']["matchNul"],
      "matchPerdu"=>$_SESSION['equipeTroisGroupeB']["matchPerdu"],
      "butPour"=>$_SESSION['equipeTroisGroupeB']["butPour"],
      "butContre"=>$_SESSION['equipeTroisGroupeB']["butContre"], 
      "difference"=>$_SESSION['equipeTroisGroupeB']["difference"],
      "points"=>$_SESSION['equipeTroisGroupeB']["points"]
     ],
    //  ....................... 

     "equipeQuatreGroupeB"=>
    [ 
      "nomEquipe"=>$_SESSION['equipeQuatreGroupeB']["nomEquipe"],
     "matchJoue"=>$_SESSION['equipeQuatreGroupeB']["matchJoue"],
     "matchGagne"=>$_SESSION['equipeQuatreGroupeB']["matchGagne"],
     "matchNul"=>$_SESSION['equipeQuatreGroupeB']["matchNul"],
     "matchPerdu"=>$_SESSION['equipeQuatreGroupeB']["matchPerdu"],
     "butPour"=>$_SESSION['equipeQuatreGroupeB']["butPour"],
     "butContre"=>$_SESSION['equipeQuatreGroupeB']["butContre"], 
     "difference"=>$_SESSION['equipeQuatreGroupeB']["difference"],
     "points"=>$_SESSION['equipeQuatreGroupeB']["points"]
     ]
    ];
// ................................ 

    usort($_SESSION['groupeB'], function($x, $y) {
      return $y["points"] - $x["points"];
    });

    foreach ($_SESSION['groupeB'] as $key => $value) {
      echo  "<tr>";
    foreach ($value as $key => $value){ 
       echo "<td>".$value."</td>";
      }
       echo "<tr>";
    }
}

?>
<!-- ............. FIN GESTION DES SCORES GROUPE A ..............  -->