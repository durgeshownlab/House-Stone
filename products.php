<?php

include('header.php');

if(isset($_GET['cat-id']) && !empty($_GET['cat-id']))
{

  $sql_cat="select * from category where id={$_GET['cat-id']}";
  $result_cat=mysqli_query($con, $sql_cat);

  if(mysqli_num_rows($result_cat)==1)
  {
    $row_cat=mysqli_fetch_assoc($result_cat);

    $sql_pro="select * from product where cat_id={$row_cat['id']}";
    $result_pro=mysqli_query($con, $sql_pro);
  }


}
else
{
  $sql_pro="select * from product";
  $result_pro=mysqli_query($con, $sql_pro);
}


?>

<div class="gutter" style="padding-top: 113px;"></div>
<section id="breadcrumbs">
  <div class="container">
    <a href="index.php">Home</a> 
    <a href="javascript:void(0);">Products</a> <?= isset($_GET['cat-id'])?ucwords(strtolower($row_cat['cat_name'])):'All' ?> 
  </div>
</section>

<section id="product">
  <div class="container">

    <div class="sect_title">
      <h1><span><?= isset($_GET['cat-id']) ? ucwords(strtolower($row_cat['cat_name'])) : "All Products" ?></span></h1>
    </div>

    

    

    <div class="prod_blurb_con">

      <?php 


        if(mysqli_num_rows($result_pro)>0)
        {
          while($row_pro=mysqli_fetch_assoc($result_pro))
          {
        ?>

          <div class="product_blurb">
            <a href="product-details.php?pid=<?= $row_pro['id'] ?>">
              <!-- <h3><span>Bearing Retainer 822</span></h3> -->
              <div class="product_list">
                <div class="img_hld">
                  <img src="images/<?= $row_pro['product_img'] ?>" alt="thumb_1535622873_0.png">
                </div>
                <div>
                  <p class="two-line-text" style="padding: 0 10px; margin: 10px 0;"><?= $row_pro['product_name'] ?></p>
                </div>
              </div>
              <div class="explore_product">
                <img src="assets/images/icon-plus.png" alt="">
              </div>
            </a>
          </div>
        
        <?php
          }
        }

      ?>      

    </div>

    <div id="data_varient"></div>

  </div>
</section>


<?php include('footer.php');  ?>