<?php 

    function get_pets() {
        $petsJson = file_get_contents('data/pets.json'); //brings contents of a json file into a variable. 
        $pets = json_decode($petsJson, true); //to convert json to an assoc array structure, correctly. 
        return $pets;
    }  
  
?>