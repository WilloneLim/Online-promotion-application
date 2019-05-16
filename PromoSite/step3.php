<?php

include 'connect.php';
$sql = "SELECT * FROM promotion WHERE promo_id = ".$_GET['id'];

        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {

                $sqla = "SELECT * FROM promoter WHERE promoter_id =".$row['promoter_id'];
                $resulta = $conn->query($sqla);

                if ($resulta->num_rows > 0) {
                    // output data of each row
                    while($rowa = $resulta->fetch_assoc()) {
                        $name = $rowa['promoter_username'];
                    }
                }
            }
        }

if ($_GET['ck'] == 0){ ?>
    <br/>
    <br/>
    <br/>
    <br/>
    <h3 class="pt-3" id="JTextH">Please click your post on your Facebook page!</h3>
    <br/>
        <div class="row my-4">
        <button class="col-md-3 btn btn-warning d-block mx-auto" onclick="back(2)">Back to Step 2</button>
        <a href="https://www.facebook.com" class="col-md-7 btn btn-info d-block mx-auto">Click me to go to Facebook</a>
        </div>
    <br/>
    <br/>
    <br/>

<?php }else{  ?>

    <h1 class="pt-3" id="JTextH">Step 3</h1>

    <hr class='border-secondary p-0 mb-1' id="Jhr"/>
    <hr class='border-secondary p-0 mt-0' id="Jhr"/>
    <h4 class="text-center font-weight-normal">Congratulations !!!</h4>
    <h5 class="text-center text-muted">Take this QR code to your nearest <?php echo $name; ?> store for your promotion.</h5>
    <img src="images/multimediaQR.png" class="mx-auto d-block p-2 m-4 border border-dark" alt="qrcode - please refresh">


    <br/>

    <a download="QRCode" href="images/multimediaQR.png" download class="btn btn-secondary d-block w-50 mx-auto">Download QR code</a>
    <a href="index.php" class="btn btn-info d-block w-50 mx-auto mt-3">Return to home page</a>
    <br/>
    <br/>

<?php  } ?>
