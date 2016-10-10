<?php require 'lib/functions.php';


$pets = get_pets();
$pupCount = count($pets);

$cleverMessage= "All the love, none of the crap!";

?>
<?php require 'layout/header.php'; ?>




    <div class="jumbotron">
        <div class="container">
            <h1><?php echo $cleverMessage ?></h1>
            <p>Over <?php echo $pupCount ?> pet friends!</p>
            <p><a class="btn btn-primary btn-lg">Learn more &raquo;</a></p>
        </div>
    </div>



    <div class="container">
        <div class="row">
            <?php foreach ($pets as $cutePet) { ?>

                    <div class="col-md-4 pet-list-item">
                         <h2><?php echo $cutePet['name']; ?></h2>

                        <img src="/images/<?php echo $cutePet['filename']; ?>" />

                        <blockquote class='pet-details'>
                            <span class="label label-info"><?php echo $cutePet['breed']; ?></span>
                            <?php 

                                if (!array_key_exists('age', $cutePet) || $cutePet['age'] == '') {
                                    echo 'Age Unknown';
                                } 
                                elseif ($cutePet['age'] == 'hidden') {
                                    echo '(Contact owner for age.)';
                                } 
                                else {
                                    echo $cutePet['age'];
                                }   
                            ?>
                            <?php echo $cutePet['weight']; ?> lbs 
                        </blockquote>
                    </div>
            <?php } ?>   

        </div>
    </div>

        <hr>
        
<?php require 'layout/footer.php'; ?>