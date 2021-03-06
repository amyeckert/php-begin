<?php 
    require 'lib/functions.php';

    $pets = get_pets(); //to change number of pets shown on home page...
    
    $pets  = array_reverse($pets); //shows most recently added first.
    $cleverMessage= "All the love, none of the crap!";
    $pupCount = count($pets);
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
                         <h2>
                            <a href="/show.php?id=<?php echo $cutePet['id']; ?>">  
                                <?php echo $cutePet['name']; ?></a>

                         </h2>

                        <img src="/images/<?php echo $cutePet['image']; ?>" />

                        <blockquote class='pet-details'>
                            <span class="label label-info"><?php echo $cutePet['breed']; ?></span>
                            
                            <?php echo $cutePet['gender']. ', '; ?> 
                            <?php 

                                if (!array_key_exists('age', $cutePet) || $cutePet['age'] == '') {
                                    echo 'Age Unknown';
                                } 
                                elseif ($cutePet['age'] == 'hidden') {
                                    echo '(Contact owner for age.)';
                                } 
                                elseif ($cutePet['age'] == 1 ) {
                                    echo $cutePet['age'] . ' year, ';
                                } 
                                else {
                                    echo $cutePet['age'] . ' '.'years, ';
                                }     
                            ?>
                            <?php echo $cutePet['weight']; ?> lbs 
                            
                        </blockquote>
                        <div class='pet-bio'> <?php echo $cutePet['bio']; ?></div>

                    </div>
            <?php } ?>   
        </div>
    </div>
    <hr>

<?php require 'layout/footer.php'; ?>