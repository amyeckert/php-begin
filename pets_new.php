<?php require 'layout/header.php'; ?>
<?php
require 'lib/functions.php';

// $name = $_POST['name'];
// $breed = $_POST['breed'];
// $weight = $_POST['weight'];
// $bio = $_POST['bio'];
if($_SERVER['REQUEST_METHOD'] == 'POST') {

    // echo '<pre>';
    // var_dump($_SERVER);
    // echo '</pre>';
    //  to make sure code doesn't break if form not filled out or it's missing:
    if (isset($_POST['name'])) {
        $name=$_POST['name'];
    } else {
        $name = '';
    }

    if (isset($_POST['breed'])) {
        $breed=$_POST['breed'];
    } else {
        $breed = '';
    }

    if (isset($_POST['weight'])) {
        $weight=$_POST['weight'];
    } else {
        $weight = '';
    }

    if (isset($_POST['bio'])) {
        $bio=$_POST['bio'];
    } else {
        $bio = '';
    }
    $pets = get_pets();

    //to save a new pet to json, create an array using the properties needed. 
    $newPet = array(
        'name' => $name,
        'breed' => $breed,
        'weight' => $weight,
        'bio' => $bio,
        'age' => '', 
        'image' => '',
        );
    $pets[] = $newPet; // add new pet to $pets array, without a specified. 

    save_pets($pets);

    // $json = json_encode($pets, JSON_PRETTY_PRINT); //encode the array as json, make it look nice
    // file_put_contents('data/pets.json', $json); //add it to the file.

    //redirect to home page after submission so additional submissins are unique: 
    //ALWAYS DO THIS FOR A FORM SUBMIT!
    header('Location: /'); //
    die;
}
// echo '<pre>';
// var_dump($name, $breed, $weight, $bio);die;
// echo '</pre>';
?>

<div class="container">
    <div class="row">
        <div class="col-xs-6">
            <h1>Add your Pet! Squirrel!</h1>

            <form action="/pets_new.php" method="POST">
                <div class= "form-group">
                    <label for="pet-name" class="control-label">pet name</label> 
                    <input type="text" name="name" id="pet-name" class="form-control" />
                </div>
                
                <div class= "form-group">
                    <label for="pet-breed" class="control-label">breed</label> 
                    <input type="text" name="breed" id="pet-breed" class="form-control" />
                </div>

                <div class= "form-group">
                    <label for="pet-weight" class="control-label">weight (lbs)</label> 
                    <input type="text" name="weight" id="pet-weight" class="form-control" />
                </div>

                <div class= "form-group">
                    <label for="pet-bio" class="control-label">pet bio</label> 
                    <input type="textarea" name="bio" id="pet-bio" class="form-control" />
                </div>
                <button type="submit" class="btn btn-primary">
                    <span class="glyphicon glyphicon-heart">Add</span>
                </button>

            </form>
        </div>
    </div>
</div>

<?php require 'layout/footer.php';





   
















?>