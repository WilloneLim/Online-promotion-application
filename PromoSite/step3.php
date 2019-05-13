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
?>
<h1 class="pt-3" id="JTextH">Step 3</h1>
<hr class='border-secondary p-0 mb-1' id="Jhr"/>
<hr class='border-secondary p-0 mt-0' id="Jhr"/>
<h4 class="text-center font-weight-normal">Congratulations !!!</h4>
<h5 class="text-center text-muted">Take this QR code to your nearest <?php echo $name; ?> store for your promotion.</h5>
<img src="images/multimediaQR.png" class="mx-auto d-block p-2 m-4 border border-dark" alt="qrcode - please refresh">


<br/>

<a download="QRCode" href="images/multimediaQR.png" download class="qrbtn">Download</a>
<br/>
<br/>