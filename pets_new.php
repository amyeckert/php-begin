<?php require 'lib/functions.php'; ?>


<?php

//  define variables and set to empty values
$name = $breed = $gender = $age = $weight = $neutered = $potty = $obedience = $rescued = $bio = $regio = NULL;

// $messages = array(
    // 'nameErr' => 'Name is required',
    // 'breedErr' => 'Please enter a breed.',
    // 'selectErr' => 'Please select one.',
    // 'ageErr' => 'Please select an age.',
    // 'weightErr' => 'Please select a weight.',
    // 'bioErr' => 'You must have something good to say!',
    // 'requiredErr' => 'Please fill out this field.',
    // 'charErr' => 'Only letters and spaces allowed.',
    // 'numberErr' => 'Only whole numbers allowed.'
// );

//error messages
$requiredErr = 'Please fill out this field.';
$charErr = 'Only letters and spaces allowed.';
$numberErr = 'Please enter a number.';

//sanitize any text
function clean_text($text_data) {
    $text_data = trim($text_data);
    $text_data = stripslashes($text_data);
    $text_data = htmlspecialchars($text_data);

    return $text_data;
}
//check if it only contains letters and whitespace
function test_text($text_data) {
    if (!preg_match("/^[a-zA-Z ]*$/",$text_data)) {
        return FALSE; 
    } 
    return TRUE; 
}
//check if a number was entered in a number field
function test_number($number_data) {
    if (!is_numeric($number_data)) {
        return FALSE;
    }
    return TRUE;    
}  

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $isValid = TRUE;

    foreach ($_POST as $key => $value) {
        
        switch ($key) {

            case 'name':
                if (empty($value)) {
                    $isValid = FALSE;
                    echo $requiredErr;
                } 
                else {
                    if (test_text($value) == FALSE) {
                        $isValid = FALSE;
                        echo $charErr;  // failed test
                    } 
                    else {              //passed test
                        clean_text($value);
                        $isValid = TRUE;

                    }
                }
                $name = $value;
                break; 
           
            case 'breed':
                $breed = $value;
                break;
          
            case 'gender':
                $gender = $value;
                break;     

            case 'age':
                if (empty($value)) {
                    $isValid = FALSE;
                    echo $numberErr;
                } 
                else {
                    if (test_number($value) == FALSE) {
                        $isValid = FALSE;
                        echo $numberErr; 
                    } 
                    else {              //passed test
                        $isValid = TRUE;
                    }
                } 
                $age = $value;
                break;       

            case 'weight':
                $weight = $value;
                break;

            case 'neutered':
                $neutered = $value;
                break;

            case 'potty':
                $potty = $value;
                break;

            case 'obedience':
                $obedience = $value;
                break;

            case 'rescued':
                $rescued = $value;
                break;
        
            case 'region':
                $region = $value;
                break;

            case 'bio':
                $bio = $value;
                break;
                
        }
    }
        
    // if the form $isValid = TRUE;, save the new pet in an array using the properties fromthe form. 
    $pets = array();

    $newPet = array(
        'name' => $name, // where $name is the value entered in the form field, etc. 
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
    // add new pet to $pets array, without a specified index.
    $pets[] = $newPet;  

    // if form is completely validated
    if ($isValid) {
        save_pets($pets);

        //redirect to home page after submission so additional submissins are unique: 
        // DO THIS FOR A FORM SUBMIT if form is valid
        header('Location: /'); //
        die;
    }


    //save to db:
    
    // if I was to write to a json file:
    // $json = json_encode($pets, JSON_PRETTY_PRINT); //encode the array as json, make it look nice
    // file_put_contents('data/pets.json', $json); //add it to the file.

        
       
}   

?>
<?php require 'layout/header.php'; ?>
<div class="container">
    <div class="row">
        <div class="col-xs-6">
            <h1>Add your Pet!</h1>

            <!-- <form action="/pets_new.php" method="POST"> -->
            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <!-- <form action="/pets_new.php" method="POST"> -->
                <div class= "form-group">
                    <h3> Tell us about your pet:</h3>

                    <label for="pet-name" class="control-label">pet name</label> 
                    <input type="text" name="name" id="pet-name" class="form-control"/>
                </div>
                
                <div class= "form-group">
                    <label for="pet-breed" class="control-label">breed</label> 
                    <input type="text" name="breed" id="pet-breed" class="form-control" />                 
                </div>

                <div class= "form-group">
                    <label for="pet-gender" class="control-label">gender</label> 
                    
                    <input type="radio" name="gender" id="pet-gender" class="form-control"
                        <?php if (isset($gender) && $gender=="female") echo "checked";?> 
                        value="Female" checked="checked" /><p>Female</p>

                    <input type="radio" name="gender" id="pet-gender" class="form-control"
                        <?php if (isset($gender) && $gender=="male") echo "checked";?> 
                        value="Male" /><p>Male</p>     
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
                    <input type="checkbox" name="neutered" id="pet-neutered" class="form-control" />

                    <label for="pet-potty" class="control-label">House-trained</label> 
                    <input type="checkbox" name="potty" id="pet-potty" class="form-control" />

                    <label for="pet-obedience" class="control-label">Obedience trained</label> 
                    <input type="checkbox" name="obedience" id="pet-obedience" class="form-control" />
                    
                    <label for="pet-rescued" class="control-label">Rescued</label> 
                    <input type="checkbox" name="rescued" id="pet-rescued" class="form-control" />

                </div>

                <div class= "form-group">
                    <label for="pet-region" class="control-label">Region</label> 
                    <select name="region">
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