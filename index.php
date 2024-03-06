
<?php 


include('header.php');
if(isset($_SESSION['user_id']) && isset($_SESSION['user_type']) && $_SESSION['user_type']=='admin')
{
    echo '<script>location.href = "admin.php";</script>';
}

?>



    <div class="gutter" style="padding-top: 113px;"></div>

    <!--Slider Start-->
    <section id="slider_holder">
      <div class="bannerHld">
        <div class="item">
          <picture>
            <source media="(max-width: 480px)" srcset="uploads/homebanner_images/large/banner1.jpg">
            <source media="(max-width: 1023px)" srcset="uploads/homebanner_images/large/banner1.jpg">
            <img src="uploads/homebanner_images/large/banner1.jpg" alt=" ">
          </picture>
          <div class="bannerDet">
          </div>
        </div>

        <div class="item">
          <picture>
            <source media="(max-width: 480px)" srcset="uploads/homebanner_images/large/banner2.jpg">
            <source media="(max-width: 1023px)" srcset="uploads/homebanner_images/large/banner2.jpg">
            <img src="uploads/homebanner_images/large/banner2.jpg" alt=" ">
          </picture>
          <div class="bannerDet">
          </div>
        </div>

        <div class="item">
          <picture>
            <source media="(max-width: 480px)" srcset="uploads/homebanner_images/large/banner3.jpg">
            <source media="(max-width: 1023px)" srcset="uploads/homebanner_images/large/banner3.jpg">
            <img src="uploads/homebanner_images/large/banner3.jpg" alt=" ">
          </picture>
          <div class="bannerDet">
          </div>
        </div>

        <div class="item">
          <picture>
            <source media="(max-width: 480px)" srcset="uploads/homebanner_images/large/banner4.jpg">
            <source media="(max-width: 1023px)" srcset="uploads/homebanner_images/large/banner4.jpg">
            <img src="uploads/homebanner_images/large/banner4.jpg" alt=" ">
          </picture>
          <div class="bannerDet">
          </div>
        </div>

        
        
      </div>
      <div class="mouse_icon">
        <img src="assets/images/mouse-icon.png" alt="">
      </div>
    </section>
    <!--Slider End-->


    <section id="application">
      <div class="container">
        <div class="sect_title">
          <h2><span>Applications</span></h2>
          <div class="tl_bg">Applications</div>
        </div>
      </div>
      <svg class="sampleSVG" xmlns="http://www.w3.org/2000/svg" version="1.1">
        <defs>
          <filter id="elasticSVG">
            <feGaussianBlur in="SourceGraphic" stdDeviation="10" result="blur" />
            <feColorMatrix in="blur" mode="matrix" values="1 0 0 0 0  0 1 0 0 0  0 0 1 0 0  0 0 0 18 -7" result="goo" />
            <feBlend in="SourceGraphic" in2="goo" />
          </filter>
        </defs>
      </svg>
      <div class="tilesCon">

        <?php
          $sql_cat="select * from category";
          $result_cat=mysqli_query($con, $sql_cat);
          if(mysqli_num_rows($result_cat)>0) 
          {
            while($row_cat=mysqli_fetch_assoc($result_cat))
            {
        ?>

         <!--  Maintenance  -->
         <div class="tiles ap-no-overflow" id="maintenance">
          <div class="cube">
            <div class="tile_front_face">
              <div class="front_tile_det">
                <div class="icon_con">
                  <img src="assets/images/icons/<?= $row_cat['icon'] ?>" alt="" style="height: 100px;">
                </div>
                <div class="desc_con"><?= ucwords(strtolower($row_cat['cat_name'])) ?></div>
              </div>
            </div>
            <div class="tile_back_face tile_01_backface">
              <div class="exploe_con">
                <div class="mobile_pan">
                  <div class="mobIcon">
                    <img src="assets/images/icons/<?= $row_cat['icon'] ?>" alt="">
                  </div>
                  <p class="one-line-text" ><?= ucfirst($row_cat['text']) ?></p>
                </div>
                <a href="products.php?cat-id=<?= $row_cat['id'] ?>" class="commanBtn">Explore more</a>
              </div>
            </div>
          </div>
        </div>

        
        <?php
            }
          }
        ?>


      </div>

    </section>

    <section id="home_about">
      <div class="container">
        <div class="sect_title">
          <h2>Welcome to <span>Latte Stone</span></h2>
          <div class="tl_bg">About us</div>
        </div>
        <p>Latte Stone manufactures highly diversified range of adhesives used in varied applications. Our products
          range from customized Epoxy based adhesives which give excellent strength and bonding characteristics for
          speciality applications to commodity adhesives based on cyanoacrylates, elastomers, PVA etc. Started in 1987
          as a company manufacturing epoxy resins, adhesives were added to our product range in 1993. Based on excellent
          quality control and R&amp;D facilities, range of adhesives were developed taking various applications areas
          into consideration...</p>
        <a href="about-us.php" class="commanBtn">Know More</a>
        <ul class="nationCon">
          <li>
            <div class="plant_count">
              <img src="assets/images/flag-india.jpg" alt="India Flag">
              <div class="num_count"><span>3</span></div>
            </div>
            <div class="plant">Plants<br />in india</div>
          </li>
          <li>
            <div class="plant_count">
              <img src="assets/images/flag-uk.jpg" alt="UK Flag">
              <div class="num_count"><span>1</span></div>
            </div>
            <div class="plant">Plant<br />in UK</div>
          </li>
          <li>
            <div class="plant_count">
              <img src="assets/images/flag-us.jpg" alt="US Flag">
              <div class="num_count"><span>1</span></div>
            </div>
            <div class="plant">Plant<br />in USA</div>
          </li>
        </ul>
      </div>
    </section>

    <section id="top_brands">
      <div class="container">
        <div class="sect_title">
          <h2>Our top <span>Products</span></h2>
          <div class="tl_bg">Top Products</div> 
        </div>
        <ul>
          <?php 
            $sql="select * from product limit 8";
            $result=mysqli_query($con, $sql);

            if(mysqli_num_rows($result)>0) 
            {
              while($row=mysqli_fetch_assoc($result))
              {
            ?>
          <li class="direction-reveal direction-reveal--3-grid-flexbox direction-reveal--demo-swing">
            <a href="product-details.php?pid=<?= $row['id'] ?>">
              <div class="direction-reveal__card">
                <div class="front_face">
                    <img src="images/<?= $row['product_img'] ?>">
                    <div class="overlay"></div>
                    <div class="brand_name two-line-text"><?= ucwords(strtolower($row['product_name'])) ?>
                  </div>
                </div>
                <div class="direction-reveal__overlay direction-reveal__anim--in">
                  <img src="images/<?= $row['product_img'] ?>">
                  <a href="product-details.php?pid=<?= $row['id'] ?>" class="commanBtn">Know More</a>
                </div>
              </div>
            </a>
          </li>
          <?php
              }
            }
          ?>

          

        </ul>
        <a href="products.php" class="commanBtn">View all products</a>
      </div>
    </section>

    <section id="counterHolder">
      <div class="container">
        <ul>
          <li>
            <div class="unitIconCon">
              <div class="icon_pic"><img src="assets/images/counter-icon-01.gif" alt=""></div>
              <div class="counter_indicator"><img src="assets/images/counter-arrow.png" alt=""></div>
            </div>
            <div class="counter_det">
              <div class="count"><span class="counter">3</span></div>
              <p>Manufacturing Units</p>
            </div>
          </li>
          <li>
            <div class="unitIconCon">
              <div class="icon_pic"><img src="assets/images/counter-icon-02.gif" alt=""></div>
              <div class="counter_indicator"><img src="assets/images/counter-arrow.png" alt=""></div>
            </div>
            <div class="counter_det">
              <div class="count"><span class="counter">60</span></div>
              <p>Brands</p>
            </div>
          </li>
          <li>
            <div class="unitIconCon">
              <div class="icon_pic"><img src="assets/images/counter-icon-04.gif" alt=""></div>
              <div class="counter_indicator"><img src="assets/images/counter-arrow.png" alt=""></div>
            </div>
            <div class="counter_det">
              <div class="count"><span class="counter">700</span>+</div>
              <p>SKUs</p>
            </div>
          </li>
          <li>
            <div class="unitIconCon">
              <div class="icon_pic"><img src="assets/images/counter-icon-03.gif" alt=""></div>
              <div class="counter_indicator"><img src="assets/images/counter-arrow.png" alt=""></div>
            </div>
            <div class="counter_det">
              <div class="count"><span class="counter">400000</span>+</div>
              <p>Retailers</p>
            </div>
          </li>
        </ul>
      </div>
    </section>
  
    
    <section id="subsidiaries">
      <div class="container">
        <div class="sect_title">
          <h2>Group Companies</h2>
        </div>
        <ul>
          <!--<li>
              <a href="http://rexpoly.co.in/" target="_blank">
                <img src="assets/images/rex.png" alt="REX">
              </a>
            </li>-->
          <li>
            <a href="javascript:void(0);" target="_blank">
              <img src="assets/images/sub-astralpipes-ind.svg" alt="Astral Pipes India">
            </a>
          </li>
          <!--<li>
              <a href="https://astralcpvc.co.ke/" target="_blank">
                <img src="assets/images/sub-astralpipes-kenya.png" alt="Astralpipes Kenya">
              </a>
            </li>-->
          <li>
            <a href="javascript:void(0);" target="_blank">
              <img src="assets/images/sub-bond-it.png" alt="Bond it">
            </a>
          </li>
          <li>
            <a href="javascript:void(0);" target="_blank">
              <img src="assets/images/astral-bathware3.png" alt="astralbathware">
            </a>
          </li>
          <li>
            <a href="javascript:void(0);" target="_blank">
              <img src="assets/images/gem_logo3.png" alt="gem-paints">
            </a>
          </li>
        </ul>
      </div>
    </section>
    
    <div class="popupTest white-popup-block mfp-hide" id="popupClick">
      <div class="popWrp col-100 floatLft">
        <div class="popup_header col-100 floatLft">
          <h1>Dealership Inquiry Form</h1>
          <a class="btnClose" href="javascript:void(0);"><img src="assets/images/popup_close.png" alt=""></a>
        </div>
        <div class="popup_contaner col-100 floatLft">
          <div class="popup_contaner--img floatLft">
            <img src="assets/images/img.jpg" alt="">
          </div>
          <div class="popup_contaner--form col-70 textLeft">
            <form action="javascript:void(0);" method="post" id="popupForm">

              <ul class="popup_con col-100 floatLft">
                <li class="popup_list col-100 floatLft">
                  <div class="popup_contaner__list Fname">
                    <input type="text" id="Name" name="Name" class="fild textalpha" placeholder="." autocomplete="off">
                    <label for="Name">Your Name*</label>
                    <span id="Name_validate" class="error_info"></span>
                  </div>
                </li>
                <li class="popup_list popup_list--mobileV col-100 floatLft flexDisplay justifySpace alignCenter">
                  <div class="popup_contaner__list Fname Fmobile">
                    <input type="text" inputmode="numeric" id="mobile" maxlength="10" name="mobile"
                      class="fild numberOnly" placeholder="." autocomplete="off">
                    <label for="mobile">Mobile Number*</label>
                    <span id="Number_validate" class="error_info"></span>
                  </div>
                  <div class="popup_contaner__list Fname Femail">
                    <input type="text" id="Email" name="Email" class="fild" placeholder="." autocomplete="off">
                    <label for="Email">Email ID*</label>
                    <span id="Email_validate" class="error_info"></span>
                  </div>
                </li>
              </ul>
              <div class="popup_con__list--title col-100 floatLft">
                <span>Choose Product Category*</span>
              </div>

              <div class="popup_con--ul-li">
                <ul class="popup_con--lists col-100 floatLft flexDisplay flexWrap ">

                  <li class="popup_list  floatLft flexDisplay  alignCenter  ">
                    <div class="popup_contaner__list Fproducts_1 flexDisplay alignCenter">
                      <input type="checkbox" id="checkbox1" name="productCategory[]" value="Maintenance"
                        class="checkbox1">
                      <label for="checkbox1">Maintenance</label>
                    </div>
                  </li>
                  <li class="popup_list  floatLft flexDisplay  alignCenter  ">
                    <div class="popup_contaner__list Fproducts_1 flexDisplay alignCenter">
                      <input type="checkbox" id="checkbox2" name="productCategory[]"
                        value="Tiling, Leveling & Repair Mortars" class="checkbox1">
                      <label for="checkbox2">Tiling, Leveling &
                        <br> Repair Mortars</label>
                    </div>
                  </li>
                  <li class="popup_list  floatLft flexDisplay  alignCenter  ">
                    <div class="popup_contaner__list Fproducts_1 flexDisplay alignCenter">
                      <input type="checkbox" id="checkbox3" name="productCategory[]"
                        value="CPVC & PVC Plumbing Pipe Glue" class="checkbox1">
                      <label for="checkbox3">CPVC & PVC Plumbing
                        <br>Pipe Glue</label>
                    </div>
                  </li>
                  <li class="popup_list  floatLft flexDisplay  alignCenter ">
                    <div class="popup_contaner__list Fproducts_1 flexDisplay alignCenter">
                      <input type="checkbox" id="checkbox4" name="productCategory[]" value="Gap Filling"
                        class="checkbox1">
                      <label for="checkbox4">Gap Filling</label>
                    </div>
                  </li>
                  <li class="popup_list  floatLft flexDisplay  alignCenter ">
                    <div class="popup_contaner__list Fproducts_1 flexDisplay alignCenter">
                      <input type="checkbox" id="checkbox5" name="productCategory[]" value="Glazing & Expansion"
                        class="checkbox1">
                      <label for="checkbox5">Glazing &
                        <br> Expansion</label>
                    </div>
                  </li>
                  <li class="popup_list  floatLft flexDisplay  alignCenter ">
                    <div class="popup_contaner__list Fproducts_1 flexDisplay alignCenter">
                      <input type="checkbox" id="checkbox6" name="productCategory[]" value="Waterproofing System"
                        class="checkbox1">
                      <label for="checkbox6">Waterproofing
                        <br> System</label>
                    </div>
                  </li>
                  <li class="popup_list  floatLft flexDisplay  alignCenter ">
                    <div class="popup_contaner__list Fproducts_1 flexDisplay alignCenter">
                      <input type="checkbox" id="checkbox7" name="productCategory[]" value="Application Tools"
                        class="checkbox1">
                      <label for="checkbox7">Application
                        <br> Tools</label>
                    </div>
                  </li>
                  <li class="popup_list  floatLft flexDisplay  alignCenter ">
                    <div class="popup_contaner__list Fproducts_1 flexDisplay alignCenter">
                      <input type="checkbox" id="checkbox8" name="productCategory[]" value="Automotive Adhesive"
                        class="checkbox1">
                      <label for="checkbox8">Automotive
                        <br> Adhesive</label>
                    </div>
                  </li>
                  <li class="popup_list  floatLft flexDisplay  alignCenter ">
                    <div class="popup_contaner__list Fproducts_1 flexDisplay alignCenter">
                      <input type="checkbox" id="checkbox9" name="productCategory[]" value="Construction Care"
                        class="checkbox1">
                      <label for="checkbox9">Construction
                        <br> Care</label>
                    </div>
                  </li>
                  <li class="popup_list  floatLft flexDisplay  alignCenter ">
                    <div class="popup_contaner__list Fproducts_1 flexDisplay alignCenter">
                      <input type="checkbox" id="checkbox10" name="productCategory[]" value="Wood Care Adhesive"
                        class="checkbox1">
                      <label for="checkbox10">Wood Care
                        <br> Adhesive </label>
                    </div>
                  </li>
                  <li class="popup_list  floatLft flexDisplay  alignCenter ">
                    <div class="popup_contaner__list Fproducts_1 flexDisplay alignCenter">
                      <input type="checkbox" id="checkbox11" name="productCategory[]" value="Adhesive tapes"
                        class="checkbox1">
                      <label for="checkbox11">Adhesive
                        <br> tapes</label>
                    </div>
                  </li>

                </ul>
                <p id="SuccessMSG"></p>
                <p id="checkbox_validate" class="error_info"></p>
              </div>
              <ul class="popup_con--lists col-100 floatLft flexDisplay flexWrap ">
                <li class="btn col-100 floatLft">
                  <button type="button" id="FormSubmit1" class="commanBtn32 docloader">Submit</button>
                </li>

              </ul>

            </form>

          </div>
        </div>

      </div>
    </div>
    
   <?php include('footer.php'); ?>