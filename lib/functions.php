<!--
*******************************************************
This is the home for reusable functions. Require this file on any page that needs to use any of its functions
or pass a variable to/from.
*******************************************************
-->

<?php 

    function get_pets() {
        $petsJson = file_get_contents('data/pets.json'); //brings contents of a json file into a variable. 
        $pets = json_decode($petsJson, true); //to convert json to an assoc array structure, correctly. 

        return $pets;
    } 

    function save_pets($petsToSave) { //$petsToSave is defined on pets_new.php and passed here through the require statement on that file.
    // echo '<pre>';
    // var_dump($petsToSave);die;
    // echo '</pre>';

        $json = json_encode($petsToSave, JSON_PRETTY_PRINT); //encode the array as json, make it look nice
        file_put_contents('data/pets.json', $json); //add it to the file.


    }
  
?>