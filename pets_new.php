<?php require 'layout/header.php'; ?>
<?php

// $name = $_POST['name'];
// $breed = $_POST['breed'];
// $weight = $_POST['weight'];
// $bio = $_POST['bio'];

//  to make sure code doesn't break if form not filled out or it's missing:
if (isset($_POST['name'])) {
    $name=$_POST['name'];
} else {
    $name = '';
}

if (isset($_POST['breed'])) {
    $name=$_POST['breed'];
} else {
    $name = '';
}

if (isset($_POST['weight'])) {
    $name=$_POST['weight'];
} else {
    $name = '';
}

if (isset($_POST['bio'])) {
    $name=$_POST['bio'];
} else {
    $name = '';
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