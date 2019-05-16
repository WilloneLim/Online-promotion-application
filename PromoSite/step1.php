<?php
$myfile = fopen("url.txt", "r") or die("Unable to open file!");
$url = fgets($myfile);

fclose($myfile);

include 'connect.php';
?>

<h1 class="pt-3" id="JTextH">Step 1</h1>
<hr class='border-secondary p-0 mb-1' id="Jhr"/>
<hr class='border-secondary p-0 mt-0' id="Jhr"/>
   <?php

    if (!isset($_GET['id'])){
        echo "<h1>Oops... this promotion is missing</h1>";
        echo "<br/>";
        echo "<br/>";
        echo "<img src='images/error.png' class='mx-auto d-block w-10' alt='...'>";

    }else{
        $sql = "SELECT * FROM promotion WHERE promo_id = ".$_GET['id'];

        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {

                echo "<div class='col-md-8 mx-auto'>";
                echo "<img class='img-fluid p-1 border border-secondary mb-2' src='images/".$row['promo_img']."' alt='".$row['promo_title']."'>";
                echo "<h3>".$row['promo_title']."</h3>";

                $sqla = "SELECT * FROM promoter WHERE promoter_id =".$row['promoter_id'];
                $resulta = $conn->query($sqla);

                if ($resulta->num_rows > 0) {
                    // output data of each row
                    while($rowa = $resulta->fetch_assoc()) {
                        echo '<p>By <a href="promoterview.php?id='.$row['promoter_id'].'" class="text-muted font-weight-bold">'.$rowa['promoter_username'].'</a></p>';
                    }
                }


                echo "<p class='font-weight-bolder m-0'>Promotion Description</p><p class='text-dark'>".$row['promo_desc']."</p>";
                echo "<p class='m-0'> This promotion starts <b>".$row['promo_start']."</b></p>";
                echo "<p> This promotion starts <b>".$row['promo_end']."</b></p>";
                echo '<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Click Me</button>';
                echo "<br/>";
                echo "<br/>";
                echo "</div>";


            }
        } else {
            echo "0 results";
    }
    $conn->close();

    }
    ?>
