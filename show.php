<!--************************************************************
******  THIS PAGE SHOWS ONE INDIVIDUAL ANIMAL SELECTED
****************************************************************-->


<?php require 'lib/functions.php';

$id = $_GET['id']; 
$pet = get_pet($id);

// echo '<pre>';
// var_dump($id);
// echo '</pre>';

?>
<?php require 'layout/header.php'; ?>

<h1>Meet <?php echo $pet['name'].'!' ; ?></h1>

<div class="container">
    <div class="row">
        <div class="col-xs-3 pet-list-item">
            <img src="/images/<?php echo $pet['image'] ?>" class="pull-left img-rounded" />
        </div>
        <div class="col-xs-6">
            <p>
                <?php echo $pet['bio']; ?>
            </p>

            <table class="table">
                <tbody>
                      <tr>
                        <th>Breed</th>
                        <td><?php echo $pet['breed'].', '.$pet['gender']; ?></td>
                    </tr>
                    <tr>
                        <th>Age</th>
                        <td>
                            <?php    
                                if ($pet['age'] == 1 ) {
                                    echo $pet['age'].' '.'year old';
                                } 
                                else {
                                    echo $pet['age'].' '.'years old';
                                }
                            ?>
                        </td>   
                    </tr>
                    <tr>
                        <th>Neutered?</th>
                        <td><?php 
                             if ($pet['neutered'] == null) {
                               echo 'No';
                            }
                            else {
                                echo 'Yes';
                                // echo $pet['potty']; 
                            }
                            ?>
                        </td>
                    </tr>

                    <tr>
                        <th>House-trained?</th>
                        <td>
                        <?php 
                            if ($pet['potty'] == null) {
                                echo 'No';
                            }
                            else {
                                echo 'Yes';
                            }
                            ?>
                        </td>
                    </tr>

                    <tr>
                        <th>Obedience-trained?</th>
                        <td><?php 
                                if ($pet['obedience'] == null) {
                                echo 'No';
                            }
                            else {
                                echo 'Yes';
                            }
                            ?>
                        </td>
                    </tr>

                    <tr>
                    <th>Rescued?</th>
                        <td><?php 
                                if ($pet['rescued'] == null) {
                                echo 'No';
                            }
                            else {
                                echo 'Yes';
                            }
                            ?></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php require 'layout/footer.php'; ?>