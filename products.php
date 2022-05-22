<?php require 'connection.php' ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css/index.css" />
    <!--THE MAIN STYLES FILE-->
    <link rel="stylesheet" href="css/CARDstyles.css" />
    <!-- <link rel="stylesheet" href="footer.css"> -->
    <link rel="stylesheet" href="css/accordian.css" />
    <link rel="stylesheet" href="css/hamburger.css" />
    <link rel="stylesheet" href="css/ratings.css" />
    <link rel="stylesheet" href="css/footer.css" />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
    />
    <!--FONT AWESOME STYLES FILE-->
    <title>PRODUCT_PROFILE</title>
    <!--THE MAIN JS FILE-->
  </head>

  <body>
    <!--THE MAIN TYPE OF NAV BAR BEGINS-->
    <nav class="prinav">
      <div class="left">
        <a href="#">HOME</a>
        <a href="#">PRODUCTS</a>
        <a href="#">EDUCATION</a>
        <a href="#">CONTACT US</a>
      </div>
      <div class="right">
        <a href=""
          ><i
            class="fa fa-phone"
            style="position: absolute; margin-right: 25px; font-size: 14px"
            aria-hidden="true"
          ></i></a
        ><a href="#"> 011454525687</a>
        <a href="#">PRODUCTS</a>
        <a href="#">SIGN-UP</a>
        <a href="#">SIGN-IN</a>
      </div>
    </nav>

    <!--THE SECOND TYPE OF NAV BAR BEGINS-->
    <div class="secnav">
      <div class="image">
        <img src="IMG/logo.png" alt="logo" />
      </div>
      <div class="details">
        <div class="hamburger-menu">
          <input id="menu__toggle" type="checkbox" />
          <label class="menu__btn" for="menu__toggle">
            <span></span>
          </label>

          <ul class="menu__box">
            <li><a class="menu__item" href="#">HOME</a></li>
            <li><a class="menu__item" href="#">SIGN-UP</a></li>
            <li><a class="menu__item" href="#">SIGN-IN</a></li>
            <li><a class="menu__item" href="#">EDUCATION</a></li>
            <li><a class="menu__item" href="#">PRODUCTS</a></li>
          </ul>
        </div>
        <a class="secnav_item" href="#">STRINGS</a>
        <a class="secnav_item" href="#">DRUMS</a>
        <a class="secnav_item" href="#">FLUTES</a>
        <div id="input-container">
          <i class="fa-solid fa-magnifying-glass"></i>
          <input
            type="search"
            id="#input-container"
            class="searchbox secnav_item"
            placeholder="search"
          />
        </div>
      </div>
    </div>

    <!--THE MAIN CONTINER OF PRODUCT,FOOTER,SIDEBAR-->
    <div class="main">
      <div class="filters">
        <h2>FILTERS<i class="fa-solid fa-filter"></i></h2>
        <br /><br />
        <button class="accordion">
          PRICE<i class="fa-solid fa-sort-down"></i>
        </button>
        <div class="panel price_ranger">
          <input id="pricemin" type="number" min="0" placeholder="Min" />
          <span>-</span>
          <input id="pricemax" type="number" min="0" placeholder="Max" />
          <button class="playbtn"><i class="fa-solid fa-play"></i></button>
          <br/>
        </div>

        <button class="accordion">
          SHIPPING<i class="fa-solid fa-sort-down"></i>
        </button>
        <div class="panel">
          <label for="">FREE SHIPPING</label>
          <input id="" class="check" type="checkbox" />
          <label for="">PAID</label>
          <input id="" class="check" type="checkbox" />
        </div>

        <button class="accordion">
          RATINGS<i class="fa-solid fa-sort-down"></i>
        </button>
        <div id="div" class="panel">
          <!--THE STAR RATINGS CATEGOEY STARTS HERE-->
          <fieldset class="rating">
            <input type="radio" id="star5" name="rating" value="5" /><label
              class="full"
              for="star5"
              title="Awesome - 5 stars"
            ></label>

            <input type="radio" id="star4" name="rating" value="4" /><label
              class="full"
              for="star4"
              title="Pretty good - 4 stars"
            ></label>

            <input type="radio" id="star3" name="rating" value="3" /><label
              class="full"
              for="star3"
              title="Meh - 3 stars"
            ></label>

            <input type="radio" id="star2" name="rating" value="2" /><label
              class="full"
              for="star2"
              title="Kinda bad - 2 stars"
            ></label>

            <input type="radio" id="star1" name="rating" value="1" /><label
              class="full"
              for="star1"
              title="Sucks big time - 1 star"
            ></label>
          </fieldset>
        </div>

        <button class="accordion">
          WARRANTY<i class="fa-solid fa-sort-down"></i>
        </button>
        <div class="panel">
          <label for="">3 MONTHS</label>
          <input id="" class="check warranty" type="checkbox" /><br />
          <label for="">6 MONTHS</label>
          <input id="" class="check warranty" type="checkbox" /><br />
          <label for="">1 YEAR</label>
          <input id="" class="check warranty" type="checkbox" /><br />
        </div>
        <script src="script.js"></script>
      </div>
      <div id="products" class="products">
        <div id="p_list" class="products_list">
          <!--THE PRODUCT CARD CATEGORY STARTS HERE-->
          <?php 
          $products = database::search("SELECT * FROM `product` ");
          
          while ($product=$products->fetch_assoc()) {
            $category = database::search("SELECT * FROM `category` WHERE `category_ID` = '".$product['category_ID']."' ");
            $category = $category->fetch_assoc()['name'];
            ?>
          <div class="product-card">
            <div class="badge">Hot</div>
            <div class="product-tumb">
              <img src="IMG/1.jpg" alt="" srcset="" />
            </div>
            <div class="product-details">
              <span class="product-catagory"><?php echo $category ?></span>
              <h4><a href="product.php?id=<?php echo $product['product_ID']?>"><?php echo $product['name'] ?></a></h4>
              <p>
                <?php echo $product['description'] ?>
              </p>
              <div class="product-bottom-details">
                <div class="product-price"><small>$96.00</small>Rs<?php echo $product['price']?></div>
                <div class="product-links">
                  <button class="btnbuy">BUY NOW</button>
                  <a href=""><i class="fa fa-heart"></i></a>
                  <a href=""><i class="fa fa-shopping-cart"></i></a>
                </div>
              </div>
            </div>
          </div>
          <!--tHE CARD DIV ENDS HERE-->
          <?php } ?>
        </div>
      </div>
      <footer>
        <div class="footer">
          <div class="inner-footer">
            <!--  for company name and description -->
            <div class="footer-items">
              <img src="" alt="" />
              <h1>WEENA NAADHA</h1>
              <p>THE ONE AND ONLY PLACE FOR YOU MUSICAL NEEDS</p>
            </div>

            <!--  for quick links  -->
            <div class="footer-items">
              <h3>USEFUL Links</h3>
              <div class="border1"></div>
              <!--for the underline -->
              <ul>
                <a href="#"><li>Home</li></a>
                <a href="#"><li>Search</li></a>
                <a href="#"><li>Contact</li></a>
                <a href="#"><li>About</li></a>
              </ul>
            </div>

            <!--  for some other links -->
            <div class="footer-items">
              <h3>Categories</h3>
              <div class="border1"></div>
              <!--for the underline -->
              <ul>
                <a href="#"><li>Drums</li></a>
                <a href="#"><li>Flutes</li></a>
                <a href="#"><li>Strings</li></a>
                <a href="#"><li>Columns</li></a>
              </ul>
            </div>

            <!--  for contact us info -->
            <div class="footer-items">
              <h3>Contact us</h3>
              <div class="border1"></div>
              <ul>
                <li>
                  <!-- <i class="fa fa-map-marker" aria-hidden="true"></i>--> <a href="#zzz"> Find Us Here</a> 
                </li>
                <li>
                  <!-- <i class="fa fa-phone" aria-hidden="true"></i>-->011454525687
                </li>
                <li>
                  <!-- <i class="fa fa-envelope" aria-hidden="true"></i>-->xyz@gmail.com
                </li>
              </ul>

              <!--   for social links -->
              <div class="social-media">
                <a href="#"><i class="fab fa-instagram"></i></a>
                <a href="#"><i class="fab fa-facebook"></i></a>
                <a href="#"><i class="fab fa-google-plus-square"></i></a>
              </div>
            </div>
          </div>

          <!--   Footer Bottom start  -->
          <div class="footer-bottom">
            <span>
              WE ACCEPT<i class="fa-brands fa-cc-visa"></i
              ><i class="fa-brands fa-cc-mastercard"></i
              ><i class="fa-solid fa-building-columns"></i
              ><i class="fa-solid fa-money-bill"></i>
            </span>
            <div class="email">
              <label for="">ENTER E-MAIL</label>
              <!-- <i class="fa-solid fa-magnifying-glass"></i> -->
              <input class="intouch" type="text" placeholder="Get In Touch" />
            </div>
          </div>
        </div>
      </footer>
    </div>

    <script src="js/accordian.js"></script>
    <script src="js/value.js" type="text/javascript"></script>
  </body>
</html>

<!--<i class="fa-solid fa-caret-up"></i>-->