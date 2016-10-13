<?php require 'layout/header.php'; ?>
<?php
require 'lib/functions.php';
//assign the value of each form field entry to a variable. 

// $name = $_POST['name'];
// $breed = $_POST['breed'];
// $age = $_POST['age'];
// $weight = $_POST['weight'];
// $bio = $_POST['bio'];

if($_SERVER['REQUEST_METHOD'] == 'POST') {

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
    if (isset($_POST['gender'])) {
        $gender=$_POST['gender'];
    } else {
        $gender = '';
    }
    if (isset($_POST['neutered'])) {
        $neutered=$_POST['neutered'];
    } else {
        $neutered = '';
    }
    if (isset($_POST['potty'])) {
        $potty=$_POST['potty'];
    } else {
        $potty = '';
    }
    if (isset($_POST['obedience'])) {
        $obedience=$_POST['obedience'];
    } else {
        $obedience = '';
    }
    if (isset($_POST['rescued'])) {
        $rescued=$_POST['rescued'];
    } else {
        $rescued = '';
    }
    if (isset($_POST['age'])) {
        $age=$_POST['age'];
    } else {
        $age = '';
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
    //$pets = get_pets();
    $pets = array();

    //to save a new pet to json, create an array using the properties needed. 
    $newPet = array(
        'name' => $name,
        'breed' => $breed,
        'gender' => $gender,
        'neutered' => $neutered,
        'potty' => $potty,
        'obedience' => $obedience,
        'rescued' => $rescued,
        'age'=> $age,
        'weight' => $weight,
        'bio' => $bio, 
        'image' => '',
        );
    $pets[] = $newPet; // add new pet to $pets array, without a specified index. 

    save_pets($pets);
// echo '<pre>';
// var_dump($pets);die;
// echo '</pre>';
    // $json = json_encode($pets, JSON_PRETTY_PRINT); //encode the array as json, make it look nice
    // file_put_contents('data/pets.json', $json); //add it to the file.

    //redirect to home page after submission so additional submissins are unique: 
    //ALWAYS DO THIS FOR A FORM SUBMIT!
    header('Location: /'); //
    die;
}


?>

<div class="container">
    <div class="row">
        <div class="col-xs-6">
            <h1>Add your Pet!</h1>

            <form action="/pets_new.php" method="POST">
                <div class= "form-group">
                    <h3> Tell us about your pet:</h3>

                    <label for="pet-name" class="control-label">pet name</label> 
                    <input type="text" name="name" id="pet-name" class="form-control" />
                </div>
                
                <div class= "form-group">
                    <label for="pet-breed" class="control-label">breed</label> 
                    <input type="text" name="breed" id="pet-breed" class="form-control" />
                </div>

                <div class= "form-group">
                    <label for="pet-gender" class="control-label">gender</label> 
                    <input type="radio" name="gender" id="pet-gender" class="form-control" value="Female" checked="checked"/><p>Female</p>
                    <input type="radio" name="gender" id="pet-gender" class="form-control" value="Male" /><p>Male</p>
                </div>

                

                <div class= "form-group">
                    <label for="pet-age" class="control-label">age (years)</label> 
                    <input type="number" name="age" id="pet-age" class="form-control" />
                </div>

                <div class= "form-group">
                    <label for="pet-weight" class="control-label">weight (lbs)</label> 
                    <input type="number" name="weight" id="pet-weight" class="form-control" />
                </div>

                 <div class= "form-group"> 
                    <h3>Select all that apply.</h3>

                    <label for="pet-neutered" class="control-label">Neutered</label> 
                    <input type="checkbox" name="neutered" id="pet-neutered" class="form-control" value="Neutered" />

                    <label for="pet-potty" class="control-label">House-trained</label> 
                    <input type="checkbox" name="potty" id="pet-potty" class="form-control" value="House-trained" />

                    <label for="pet-obedience" class="control-label">Obedience trained</label> 
                    <input type="checkbox" name="obedience" id="pet-obedience" class="form-control" value="Obedience-trained" v/>
                    
                    <label for="pet-rescued" class="control-label">Rescued</label> 
                    <input type="checkbox" name="rescued" id="pet-rescued" class="form-control" value="Rescue Animal" />

                </div>

                <div class= "form-group">
                    <label for="pet-bio" class="control-label">pet bio</label> 
                    <input type="textarea" name="bio" id="pet-bio" class="form-control" />
                </div>
                <button type="submit" class="btn btn-primary">
                    <span class="glyphicon glyphicon-heart"> Add</span>
                </button>

            </form>
        </div>
    </div>
</div>

<?php require 'layout/footer.php';





   
















?>