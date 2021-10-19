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