<?php

include('header.php');

if (isset($_GET['pid']) && !empty($_GET['pid'])) {
  $sql_pro = "select * from product where id={$_GET['pid']}";
  $result_pro = mysqli_query($con, $sql_pro);

  if (mysqli_num_rows($result_pro) > 0) {
    $row_pro = mysqli_fetch_assoc($result_pro);
  }
} else {
  exit;
}


?>


<div class="gutter" style="padding-top: 113px;"></div>

<section id="breadcrumbs">
  <div class="container">
    <a href="index.html">Home</a>
    <a href="products.php">Product</a>
    <?= ucfirst(strtolower($row_pro['product_name'])) ?>
  </div>
</section>

<section id="product">
  <div class="container">
    <div class="sect_title">
      <h1><span><?= ucfirst(strtolower($row_pro['product_name'])) ?></span></h1>
    </div>

    <div class="productInner">
      <div id="newoverview"></div>
      <div class="resi_quick resi_left_space clearfix">
        <div class="resi_shot"><img src="images/<?= $row_pro['product_img'] ?>" alt=""></div>
        <div class="resi_det">
          <p>
            <?= ucfirst($row_pro['text']) ?>
          </p>
        </div>
      </div>


      <div class="similar_products">
        <div class="sect_title">
          <h2><span>Similar Products</span></h2>
        </div>

        <div class="sm_prod_slider">

        <?php
          $related_sql="select * from product where cat_id={$row_pro['cat_id']}";
          $related_result=mysqli_query($con, $related_sql);

          if(mysqli_num_rows($related_result)>0)
          {
            while($row_related=mysqli_fetch_assoc($related_result))
            {
        ?>

          <span class="slide">
            <a href="product-details.php?pid=<?= $row_related['id'] ?>">
              <div class="sm_blurb">
                <h3 class="two-line-text" ><?= ucwords(strtolower($row_related['product_name'])) ?></h3>
                <img src="images/<?= $row_related['product_img'] ?>" alt="">
                <div class="commanBtn">Know More</div>
              </div>
            </a>
          </span>

        <?php
            }
          }
        ?>

          

        </div>

      </div>

    </div>

  </div>
</section>

<section id="footerHolder">

<div class="footer">
  <div class="container">
    <div class="footer_blurb">
      <div class="blurb_title">About Us</div>
      <ul>
        <li>
          <a href="about-us.php">About Latte Stone</a>
        </li>
        <li>
          <a href="javascript:void(0);">Vision &amp; Mission</a>
        </li>
        <li>
          <a href="javascript:void(0);">Milestones</a>
        </li>
        <li>
          <a href="javascript:void(0);">R&amp;D Facilities</a>
        </li>
      </ul>
    </div>
    <div class="footer_blurb">
      <div class="blurb_title">Products</div>
      <ul>
        <li><a href="javascript:void(0);">Maintenance</a></li>

        <li><a href="javascript:void(0);">Gap Filling Glazing & Expansion</a></li>

        <li><a href="javascript:void(0);">Automotive Adhesive</a></li>

        <li><a href="javascript:void(0);">Wood Care Adhesive</a></li>

        <li><a href="javascript:void(0);">Tiling, Leveling & Repair Mortars</a></li>

        <li><a href="javascript:void(0);">Waterproofing System</a></li>

        <li><a href="javascript:void(0);">Construction Care</a></li>

        <li><a href="javascript:void(0);">Adhesive tapes</a></li>

        <li><a href="javascript:void(0);">CPVC & PVC Plumbing Pipe Glue</a></li>

        <li><a href="javascript:void(0);">Application Tools</a></li>


      </ul>
    </div>

    <div class="footer_blurb">
      <div class="blurb_title">News &amp; Media</div>
      <ul>
        <li>
          <a href="javascript:void(0);">Press Release</a>
        </li>
        <li>
          <a href="javascript:void(0);">Upcoming Events</a>
        </li>
        <li>
          <a href="javascript:void(0);">Gallery</a>
        </li>
        <li>
          <a href="javascript:void(0);">Downloads</a>
        </li>
      </ul>
    </div>

    <div class="footer_blurb">
      <div class="blurb_title">Others</div>
      <ul>
        <!--  <li>
          <a href="https://www.astraladhesives.com/industrial-glue-adhesive">Industrial</a>
        </li>
       <li>
          <a href="https://www.astraladhesives.com/faq">FAQ</a>
        </li>-->
        <li>
          <a href="javascript:void(0);">Careers</a>
        </li>
        <li>
          <a href="contact-us.php">Contact Us</a>
        </li>
      </ul>
    </div>

    <div class="footer_blurb">
      <div class="blurb_title">Corporate Office</div>
      <p><b>Demo Pvt Ltd.</b></p>
      <p>Office No. 2th Floor,</p>
      <p>Vardhman Plaza,Rani bagh,</p>
      <p>Pitampura - 110034,</p>
      <p>New Delhi, India.</p>
      <div class="map">
        <!--img src="assets/images/map.jpg" alt="map"-->
        <iframe
          src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d16988.688814032965!2d80.34306029012525!3d26.474035881886756!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x2b7f6207aa73719c!2sResinova+Chemie+Ltd.!5e0!3m2!1sen!2sin!4v1536233670518"
          width="200" height="150" frameborder="0" style="border:0" allowfullscreen></iframe>
      </div>
    </div>

  </div>
</div>


  <div class="footer_bottom">
    <div class="container">
      <div class="creadit">&copy; 2021-2022 ASTRAL ADHESIVES ALL RIGHTS RESERVED.</div>
      <div class="created_by">
        <!-- <a href="https://bcwebwise.com" target="_blank"><img src="https://www.astraladhesives.com/assets/images/bcww-fish.png" alt="https://bcwebwise.com"></a> -->
      </div>
    </div>
    <div class="footerClose open">
      <img src="assets/images/footer-close.jpg" alt="Close Circle">
      <div class="ft_close">Open</div>
      <div class="arrow"><img src="assets/images/footer-arrow.png" alt="Footer Arrow"></div>
    </div>


  </div>
</section>


<!-- <section id="search_con">
  <div class="container">
    <div class="error_log" style="color:red;"></div>
    <form name="search" id="searchdata" method="post" action="https://www.astraladhesives.com/search">
      <input type="text" name="search_data" placeholder="Search" class="search_txtBox">
    </form>
    <div class="closeSearch">X</div>
  </div>
</section> -->


<div class="enq_button">
  <a href="contact-us.php"><img src="assets/images/icon-chat.png" alt="">
    <span>Enquire Now</span></a>
</div>



</div>

<!--JS Files-->
<script type="text/javascript" src="js/jquery-1.12.1.min.js"></script>
<script type="text/javascript" src="js/footer.js"></script>
<script type="text/javascript" src="assets/js/jquery.easing.1.3.js"></script>
<script type="text/javascript" src="assets/js/modernizr-custom.js"></script>
<script type="text/javascript" src="assets/js/TweenMax.min.js"></script>
<script type="text/javascript" src="assets/js/jquery.slimmenu.min.js"></script>
<script type="text/javascript" src="assets/js/owl.carousel-beta.js"></script>
<script type="text/javascript" src="assets/js/ScrollMagic.js"></script>
<script type="text/javascript" src="assets/js/animation.gsap.js"></script>
<script type="text/javascript" src="assets/js/debug.addIndicators.js"></script>
<script type="text/javascript" src="assets/js/common.js"></script>
<script type="text/javascript" src="assets/js/product.js"></script>
<script type="text/javascript">
  $(document).ready(function() {

    $(".specs_list span").on('click', function() {
      $(".specs_list span").removeClass('activeTab');
      $(this).addClass('activeTab');
    });

  });
</script>

<!--[if lt IE 9]>
        <script src="https://www.astraladhesives.com/js/html5shiv.min.js"></script>
    <![endif]-->
</body>


</html>