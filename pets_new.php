<?php require 'lib/functions.php'; ?>
<?php require 'layout/header.php'; ?>

<?php

//  define variables and set to empty values
$name = $breed = $gender = $age = $weight = $neutered = $potty = $obedience = $rescued = $bio = $region = "";

// make sure code doesn't break if form not filled out or it's missing.


//     // $name = test_text($_POST["name"]);
//     $breed = test_text($_POST["breed"]);
//     $gender = test_text($_POST["gender"]);
//     $age = test_text($_POST["age"]);
//     $weight = test_text($_POST["weight"]);
//     $neutered = test_text($_POST["neutered"]);
//     $potty = test_text($_POST["potty"]);
//     $obedience = test_text($_POST["obedience"]);
//     $rescued = test_text($_POST["rescued"]);
//     $bio = test_text($_POST["bio"]);
//     $region = test_text($_POST["region"]);
// }
$messages = array(
    'nameErr' => 'Name is required',
    'breedErr' => 'Please enter a breed.',
    'genderErr' => 'Please select one.',
    'ageErr' => 'Please select an age.',
    'weightErr' => 'Please select an weight.',
);

function test_text($text_data) {
  $text_data = trim($text_data);
  $text_data = stripslashes($text_data);
  $text_data = htmlspecialchars($text_data);

  return $text_data;
}

// function test_number($number_data) {
//     $number_data = ;
//     $number_data


// }

if($_SERVER['REQUEST_METHOD'] == 'POST') {

    if (empty($_POST["name"])) {
        echo $messages['nameErr'];
    } else {
        $name = test_input($_POST["name"]);
    // check if name only contains letters and whitespace
        if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
          $charErr = "Only letters and white space allowed"; 
        }
    }


    if (isset($_POST['breed'])) {
        $breed = $_POST['breed'];
    } elseif (empty($_POST['breed'])) {
        $breedErr = 'Please enter a breed.';
    } else {
        $breed = test_text($_POST["breed"]);
        if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
          $nameErr = "Only letters and white space allowed"; 
        }
    }


    if (isset($_POST['gender'])) {
        $gender = $_POST['gender'];
    } elseif (empty($_POST['gender'])) {
        $genderErr = 'Please select one.';
    } else {
        $gender = test_text($_POST["gender"]);
    }


    if (isset($_POST['age'])) {
        $age = $_POST['age'];
    } elseif (empty($_POST['age'])) {
        $ageErr = 'Please select an age.';
    } else {
        // $age = test_text($_POST["age"]);
    }


    if (isset($_POST['weight'])) {
        $weight=$_POST['weight'];
    } elseif (empty($_POST['weight'])) {
        $weightErr = 'Please enter a weight.';
    } else {
        // $weight = test_text($_POST["weight"]);
    } 

    if (isset($_POST['neutered'])) {
        $neutered = $_POST['neutered'];
    } else {
        // $neutered = test_text($_POST["neutered"]);
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

    if (isset($_POST['region'])) {
        $region=$_POST['region'];
    } else {
        $region = '';
    }
    
    if (isset($_POST['bio'])) {
        $bio=$_POST['bio'];
    } elseif (empty($_POST['bio'])) {
        $weightErr = 'You must have something good to say...';
    }
    else {
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
        'region' => $region,
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
<!-- <pre>
 <? //var_dump($data); ?>
</pre> -->


    <div class="row">
        <div class="col-xs-6">
            <h1>Add your Pet!</h1>

            <!-- <form action="/pets_new.php" method="POST"> -->
            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">

            <form action="/pets_new.php" method="POST">
                <div class= "form-group">
                    <h3> Tell us about your pet:</h3>

                    <label for="pet-name" class="control-label">pet name</label> 
                    <input type="text" name="name" id="pet-name" class="form-control"
                        value="<?php echo $name;?>" />
                     
                    <!-- <span class="error">* <?php //echo $messages['nameErr']; ?></span>
                    <br><br> -->
                </div>
                
                <div class= "form-group">
                    <label for="pet-breed" class="control-label">breed</label> 
                    <input type="text" name="breed" id="pet-breed" class="form-control"
                        value="<?php echo $breed;?>" />

                    <span class="error">* <?php echo $messages['breedErr']; ?></span>
                    <br><br>
                </div>

                <div class= "form-group">
                    <label for="pet-gender" class="control-label">gender</label> 
                    
                    <input type="radio" name="gender" id="pet-gender" class="form-control"
                        <?php if (isset($gender) && $gender=="female") echo "checked";?> 
                        value="Female" checked="checked"  /><p>Female</p>

                    <input type="radio" name="gender" id="pet-gender" class="form-control"
                        <?php if (isset($gender) && $gender=="male") echo "checked";?> 
                        value="Male" /><p>Male</p>

                    <span class="error">* <?php echo $messages['genderErr'];?></span>
                    <br><br>
                </div>

                <div class= "form-group">
                    <label for="pet-age" class="control-label">age (years)</label> 
                    <input type="number" name="age" id="pet-age" class="form-control"
                        value="<?php echo $age;?>" />

                    <span class="error">* <?php echo $messages['ageErr']; ?></span>
                    <br><br>

                </div>

                <div class= "form-group">
                    <label for="pet-weight" class="control-label">weight (lbs)</label> 
                    <input type="number" name="weight" id="pet-weight" class="form-control"
                        value="<?php echo $weight;?>" />

                    <span class="error">* <?php echo $messages['weightErr']; ?></span>
                    <br><br>
                </div>

                 <div class= "form-group"> 
                    <h3>Select all that apply.</h3>

                    <label for="pet-neutered" class="control-label">Neutered</label> 
                    <input type="checkbox" name="neutered" id="pet-neutered" class="form-control" value="<?php echo $neutered;?>" />

                    <label for="pet-potty" class="control-label">House-trained</label> 
                    <input type="checkbox" name="potty" id="pet-potty" class="form-control" value="<?php echo $potty;?>" />

                    <label for="pet-obedience" class="control-label">Obedience trained</label> 
                    <input type="checkbox" name="obedience" id="pet-obedience" class="form-control" value="<?php echo $obedience;?>" />
                    
                    <label for="pet-rescued" class="control-label">Rescued</label> 
                    <input type="checkbox" name="rescued" id="pet-rescued" class="form-control" value="<?php echo $rescued;?>" />

                </div>

                <div class= "form-group">
                    <label for="pet-region" class="control-label">Region</label> 
                    <select name="pet-region">
                          <option value="north">North</option>
                          <option value="south">South</option>
                          <option value="east">East</option>
                          <option value="west">West</option>
                    </select>
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

<?php require 'layout/footer.php'; ?>