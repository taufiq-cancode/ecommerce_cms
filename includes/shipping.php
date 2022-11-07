<?php
$ship = 0;                 
if(isset($_POST['ship'])){
    $state = $_POST['state'];
    $country = $_POST['country'];
    $del = $_POST['del'];
     
     if ($state == "" && $country =="Nigeria"){
          $ship = 4100;
        if($del == "pick"){
            $ship = $ship - 800;
        }     
     }
     
     if ($state == "" && $country =="Ghana"){
          $ship = 13700;
     }
     
     if ($state == "" && $country =="United Kingdom"){
          $ship = 12300;
     }
     
     if ($state == "" && $country =="USA"){
          $ship = 15100;
     }
     
     if ($state == "" && $country =="Canada"){
          $ship = 15100;
     }
     
     if ($state == "" && $country =="Germany"){
          $ship = 17700;
     }
     
     if ($state == "" && $country =="Italy"){
          $ship = 17700;
     }
      if ($state == "Lagos-Island" && $country =="Nigeria"){
          $ship = 1000;
     }
     if ($state == "Lagos-Mainland" && $country =="Nigeria"){
          $ship = 2000;
     }
     
     
    if ($state == "Abuja" && $country =="Nigeria" || $state == "Port-Hacourt" && $country =="Nigeria" 
    || $state == "Owerri" && $country =="Nigeria" || $state == "Enugu" && $country =="Nigeria" 
    || $state == "Minna" && $country =="Nigeria" || $state == "Jos" && $country =="Nigeria"){
        $ship = 4100;
        if($del == "pick"){
            $ship = $ship - 800;
        }    
    }else if ($state == "Awka" && $country =="Nigeria" || $state == "Asana" && $country =="Nigeria" 
    || $state == "Onitsha" && $country =="Nigeria" || $state == "Abeokuta" && $country =="Nigeria" 
    || $state == "Ibadan" && $country =="Nigeria" || $state == "Warri" && $country =="Nigeria" ||
    $state == "Benin" && $country =="Nigeria"){
        $ship = 3700;
        if($del == "pick"){
            $ship = $ship - 800;
        }
  }else if ($state == "Abia" && $country == "Nigeria" || $state == "Adamawa" && $country == "Nigeria" ||
    $state == "Akwa-Ibom" && $country == "Nigeria" || $state == "Anambra" && $country == "Nigeria" ||
    $state == "Bauchi" && $country == "Nigeria" || $state == "Bayelsa" && $country == "Nigeria" ||
    $state == "Benue" && $country == "Nigeria" || $state == "Borno" && $country == "Nigeria" ||
    $state == "Cross-River" && $country == "Nigeria" || $state == "Delta" && $country == "Nigeria" ||
    $state == "Ebonyi" && $country == "Nigeria" || $state == "Edo" && $country == "Nigeria" || 
    $state == "Jigawa" && $country == "Nigeria" || $state == "Kaduna" && $country == "Nigeria" ||
    $state == "Kano" && $country == "Nigeria" || $state == "Kastina" && $country == "Nigeria" ||
    $state == "Kebbi" && $country == "Nigeria" || $state == "Kogi" && $country == "Nigeria" ||
    $state == "Kwara" && $country == "Nigeria" || $state == "Lagos" && $country == "Nigeria" ||
    $state == "Nasarawa" && $country == "Nigeria" || $state == "Ondo" && $country == "Nigeria" ||
    $state == "Osun" && $country == "Nigeria" || $state == "Oyo" && $country == "Nigeria" ||
    $state == "Sokoto" && $country == "Nigeria" || $state == "Taraba" && $country == "Nigeria" ||
    $state == "Yobe" && $country == "Nigeria" || $state == "Zamfara" && $country == "Nigeria" 
    ){
   
     $ship = 4000;
     $totalalll=0;
     $totalalll = $totalall + $ship;
      
   }
}                            
?>

<script>
    var stateObject = {
"Nigeria": { 
"Lagos-Island": [""],
"Lagos-Mainland": [""],
"Abuja": [""],
"Benin": [""],
"Awka": [""],
"Asana": [""],
"Onitsha": [""],
"Abeokuta": [""],
"Ibadan": [""],
"Warri": [""],
"Port-Hacourt": [""],
"Owerri": [""],
"Enugu": [""],
"Minna": [""],
"Jos": [""],
"Abia": [""],
"Adamawa": [""],
"Akwa-Ibom": [""],
"Anambra": [""],
"Bauchi": [""],
"Bayelsa": [""],
"Benue": [""],
"Borno": [""],
"Cross-River": [""],
"Delta": [""],
"Edo": [""],
"Jigawa": [""],
"Kaduna": [""],
"Kano": [""],
"Kastina": [""],
"Gombe": [""],
"Kebbi": [""],
"Kogi": [""],
"Kwara": [""],
"Lagos": [""],
"Nasarawa": [""],
"Ondo": [""],
"Osun": [""],
"Oyo": [""],
"Sokoto": [""],
"Taraba": [""],
"Yobe": [""],
"Zamfara": [""],
},
"Ghana": { 
},
"United Kingdom": { 
},
"USA": { 
},
"Canada": { 
},
"Germany": { 
},
"Italy": { 
},
}
window.onload = function () {
var countySel = document.getElementById("countySel"),
stateSel = document.getElementById("stateSel"),
districtSel = document.getElementById("districtSel");
for (var country in stateObject) {
countySel.options[countySel.options.length] = new Option(country, country);
}
countySel.onchange = function () {
stateSel.length = 1; // remove all options bar first
districtSel.length = 1; // remove all options bar first
if (this.selectedIndex < 1) return; // done 
for (var state in stateObject[this.value]) {
stateSel.options[stateSel.options.length] = new Option(state, state);
}
}
countySel.onchange(); // reset in case page is reloaded
stateSel.onchange = function () {
districtSel.length = 1; // remove all options bar first
if (this.selectedIndex < 1) return; // done 
var district = stateObject[countySel.value][this.value];
for (var i = 0; i < district.length; i++) {
districtSel.options[districtSel.options.length] = new Option(district[i], district[i]);
}
}
}
</script>
