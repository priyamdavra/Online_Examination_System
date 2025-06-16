<?php
$post_per_page=5;
$q="SELECT * FROM exam_create";
$r=mysqli_query($db,$q);
$total_posts=mysqli_num_rows($r);
$total_pages=ceil($total_posts/$post_per_page);
$page=1;
?>
<div class="pagination max-width-1 m-auto">
    <?php
    if($page > 1){
        $switch = "";
    }
    else{
        $switch = "disabled";
    }
    if($page < $total_pages){
        $nswitch = "";
    }
    else{
        $nswitch = "disabled";
    }
    ?>

    <a href="?page=<?=$page-1?>">
    Previous
    </a>
  <?php
    for ($opage=1; $opage <= $total_pages; $opage++) { 
        ?>
   
        <a href="?page=<?=$opage?>">
        <?=$opage?>
        </a>
   <?php 
   }
  ?>
    <a href="?page=<?=$page+1?>">
    Next
    </a>
</div>