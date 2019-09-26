            `<tr>
                 <td><a href="PromoterActivity.php" id="mylink"><?php echo $row['promoter_id'];?></a></td>
                 <td><a href="PromoterActivity.php?id=<?php echo $row['promoter_id'];?>" id="mylink"><?php echo $row['promoter_username'];?></a></td>
                 <td id="mylink">To be added</td>
                     <td><a class="btn btn-success text-white w-100 disabled" id="mylink"> Edit </a></td>
                 <td><a href="javascript:delete_id(<?php echo $row['promoter_id'];?>)" id="mylink" class="btn btn-danger text-white w-100 remove" id="del_click">Delete</a></td>
              </tr>`