<!--
*******************************************************
This is the home for reusable functions. Require this file on any page that needs to use any of its functions
or pass a variable to/from.
*******************************************************
-->

<?php 
// this function makes the PDO available globally. 
function get_connection() {
   $config = require 'config.php'; //(connect to server, use this db, username, and pw returns an OBJECT )        
    
    $pdo = new PDO(       
        $config['database_dsn'],
        $config['database_user'],
        $config['database_pass']
    ); 
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    return $pdo;    
}

function get_pets($limit = null) {
    $pdo = get_connection(); //calls the function above to get the new pdo to store in $pdo variable. 
    
    $query = 'SELECT * FROM pet';
    if($limit) {
        $query = $query. ' LIMIT :resultLimit';
    }
    $stmt = $pdo->prepare($query);
    $stmt->bindParam('resultLimit', $limit, PDO::PARAM_INT);
    $stmt->execute();
    $pets = $stmt->fetchAll();

    return $pets;

    // $petsJson = file_get_contents('data/pets.json'); //brings contents of a json file into a variable. 
    // $pets = json_decode($petsJson, true); //to convert json to an assoc array structure, correctly.    
} 

function get_pet($id) {
    $pdo = get_connection(); 

    $query = 'SELECT * FROM pet WHERE id = :idVal'; // the : +string replaces the variable that was formerly here.
    $stmt = $pdo->prepare($query);
    $stmt->bindParam('idVal', $id); //this binds the value of the :idVal placeholder to the variable $id.
    $stmt-> execute();
    $pet= $stmt->fetch();

    return $pet;
// echo '<pre>';
// var_dump($query);
// echo '</pre>';
}

function save_pets($petsToSave) { //$petsToSave is defined on pets_new.php and passed here through the require statement on that file.
    /*
    $json = json_encode($petsToSave, JSON_PRETTY_PRINT); //encode the array as json, make it look nice
    file_put_contents('data/pets.json', $json); //add it to the file.
    */
    //OR add it to the database, like so:

    $pdo = get_connection();
        //        INSERT INTO `pet` (`name`, `breed`, `age`, `weight`, `bio`, `image`) VALUES ('Bulldog', '1 year', 9, 'Treats and Snoozin!', 'pancake.png')
        /*
        $query = "INSERT INTO `pet` (`name`, `breed`, `age`, `weight`, `bio`, `image`) VALUES (\"";
        $query .= mysql_real_escape_string($pet['name']) . '", "';
        $query .= mysql_real_escape_string($pet['breed']) . '", "';
        $query .= mysql_real_escape_string($pet['age']) . '", ';
        $query .= $pet['weight'] . ', "';
        $query .= $pet['bio'] . '", "';
        $query .= $pet['image'] . '")';

        $stmt = $pdo->prepare($query);
        $stmt->execute();
        */

    foreach ($petsToSave as $pet) {
        $named = array(); // 
        $cols = array();
        //$placeholders = array();
        
        foreach ($pet as $key => $value) {
            $named[':'.$key] = $value;
            $cols[] = $key;
            //$placeholders[] = ":" . $key;
        }
        /*
        $sql = "INSERT INTO `pet` (`name`, `breed`, `gender`,`neutered`,`age`, `weight`, `bio`, `image`) ";
        $sql .= "VALUES (:name, :breed, :age, :weight, :bio, :image)";
        */

        $sql = "INSERT INTO `pet` (`" . implode("`, `", $cols) . "`) ";
        $sql .= "VALUES (:" . implode(", :", $cols) . ")";

        $stmt = $pdo->prepare($sql);
        $stmt->execute($named);

        
    }
}

?>