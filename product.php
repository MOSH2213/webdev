<?php require 'connection.php' ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="css/corosel.css">
  <link rel="stylesheet" href="css/index.css" />
  <!-- <link rel="stylesheet" href="css/accordian.css" /> -->
  <link rel="stylesheet" href="css/hamburger.css" />
  <link rel="stylesheet" href="css/footer.css" />
  <link rel="stylesheet" href="css/product.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" />
  <title>PRODUCT</title>
</head>

<body>
  <nav class="prinav">
    <div class="left">
      <a href="#">HOME</a>
      <a href="#">PRODUCTS</a>
      <a href="#">EDUCATION</a>
      <a href="#">CONTACT US</a>
    </div>
    <div class="right">
      <a href=""><i class="fa fa-phone" style="position: absolute; margin-right: 25px; font-size: 14px" aria-hidden="true"></i></a><a href="#"> 011454525687</a>
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
        <input type="search" id="#input-container" class="searchbox secnav_item" placeholder="search" />
      </div>
    </div>
  </div>
  <!--THIS INCLUDES THE MAIN BODY OF THE PRODUCT LISTINGS-->
  <!-- <div class="main"> -->
  <?php if (isset($_GET["id"])) {
    $pid = $_GET["id"];

    $productrs = database::search("SELECT * FROM `product` WHERE `product_ID`='$pid' ");

    $pn = $productrs->num_rows;
    if ($pn == 1) {

      $product = $productrs->fetch_assoc();

      // getting the category of the product
      $category = database::search("SELECT * FROM `category` WHERE `category_ID`='$product[category_ID]' ")->fetch_assoc();

      // getting the stock of the product
      if ($product['stock'] > 0) {
        $stock = "In Stock";
      } else {
        $stock = "Out of Stock";
      }

      //getting reviews
      $reviews = database::search("SELECT * FROM `review` WHERE `product_ID`='$pid' ");
      $rn = $reviews->num_rows;

      //getting average rating
      $rating = 0;
      if ($rn > 0) {
        while ($review = $reviews->fetch_assoc()) {
          $rating += $review['rating'];
        }
        $rating = $rating / $rn;
      }

  ?>

      <div class="card-wrapper">
        <div class="card">
          <!-- card left -->
          <div class="product-imgs">
            <div class="img-display">
              <div class="img-showcase">
                <img src="IMG/iimg/1.jpg" alt="shoe image">
                <img src="IMG/iimg/3.jpg" alt="shoe image">
                <img src="IMG/iimg/4.jpg" alt="shoe image">
                <img src="IMG/iimg/5.jpg" alt="shoe image">
              </div>
            </div>
            <div class="img-select">
              <div class="img-item">
                <a href="#" data-id="1">
                  <img src="IMG/iimg/1.jpg" alt="shoe image">
                </a>
              </div>
              <div class="img-item">
                <a href="#" data-id="2">
                  <img src="IMG/iimg/3.jpg" alt="shoe image">
                </a>
              </div>
              <div class="img-item">
                <a href="#" data-id="3">
                  <img src="IMG/iimg/4.jpg" alt="shoe image">
                </a>
              </div>
              <div class="img-item">
                <a href="#" data-id="4">
                  <img src="IMG/iimg/5.jpg" alt="shoe image">
                </a>
              </div>
            </div>
          </div>
          <!-- card right -->
          <div class="product-content">
            <h2 class="product-title"><?php echo $product["name"] ?></h2>
            <div class="product-rating">
              <?php for ($i = 0; $i < $rating; $i++) { ?>
                <i class="fa fa-star"></i>
              <?php } ?>
              <?php
              echo $rating;
              ?>
            </div>

            <div class="product-price">
              <p class="last-price">Price: <span>Rs. <?php echo $product["price"] ?></span></p>
              <!-- <p class="new-price">Discount Price: <span>$249.00 (5%)</span></p> -->
            </div>

            <div class="product-detail">
              <h2>Item Description: </h2>
              <p><?php echo $product["description"] ?></p>
              <ul>
                <li><img src="IMG/chhh.png" alt=""> Color: <?php echo $product["color"] ?></li>
                <li><img src="IMG/chhh.png" alt="">Available:in <?php echo $stock ?></li>
                <li><img src="IMG/chhh.png" alt="">Category: <?php echo $category["name"] ?></li>
                <li><img src="IMG/chhh.png" alt="">Shipping Area: </li>
                <li><img src="IMG/chhh.png" alt="">Shipping Fee: </li>
              </ul>
            </div>

            <div class="purchase-info">
              <input type="number" min="0" value="1">
              <button type="button" class="btn">
                Add to Cart <i class="fas fa-shopping-cart"></i>
              </button>
              <button type="button" class="btn">Buy Now</button>
            </div>
          </div>
        </div>
      </div>


      <!-- </div> -->
      <!--THE OTHER RELATED PRODUCTS WILL BE SHOWN GERE-->

      <span class="h2">
        <h2>REVIEWS AND FEEDBACKS</h2>
      </span>

      <div class="othersecs">
        <?php

        //getting the reviews of the product
        $reviews = database::search("SELECT * FROM `review` WHERE `product_ID`='$pid' ");
        if ($reviews->num_rows > 0) {
          while ($review = $reviews->fetch_assoc()) {
            $user = database::search("SELECT * FROM `users` WHERE `useremail`='{$review['useremail']}' ")->fetch_assoc();
        ?>
            <div class="reviews">
              <div class="photo">
                <img class="per1" src="IMG/7per.jpg" alt="">
              </div>
              <div class="texty">
                <h3><?php echo $user['username'] ?> at <?php echo $review['date'] ?>
                  <span class="product-rating" style="margin-left: 2%;">
                    <?php
                    if ($review['rating'] == 1) {
                      echo "<i class='fa fa-star'></i>";
                    } else if ($review['rating'] == 2) {
                      echo "<i class='fa fa-star'></i><i class='fa fa-star'></i>";
                    } else if ($review['rating'] == 3) {
                      echo "<i class='fa fa-star'></i><i class='fa fa-star'></i><i class='fa fa-star'></i>";
                    } else if ($review['rating'] == 4) {
                      echo "<i class='fa fa-star'></i><i class='fa fa-star'></i><i class='fa fa-star'></i><i class='fa fa-star'></i>";
                    } else if ($review['rating'] == 5) {
                      echo "<i class='fa fa-star'></i><i class='fa fa-star'></i><i class='fa fa-star'></i><i class='fa fa-star'></i><i class='fa fa-star'></i>";
                    } ?>
                  </span>
                </h3>
                <p><?php echo $review['description'] ?></p>
              </div>
            </div>
          <?php }
        } else { ?>
          <div class="text-center">
            <div class="texty">
              <h3>No Reviews Yet</h3>
            </div>
          </div>
          <style>
            .othersecs {
              display: inline;
              text-align: center;

            }

            .texty {
              margin-bottom: 50px !important;
            }
          </style>
        <?php } ?>


      </div>
  <?php
    } else {
      echo "incorrect product id";
    }
  } ?>
  <!--THE FOOTER BEGINS HERE-->
  <footer style="width: 100%">
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
            <a href="#">
              <li>Home</li>
            </a>
            <a href="#">
              <li>Search</li>
            </a>
            <a href="#">
              <li>Contact</li>
            </a>
            <a href="#">
              <li>About</li>
            </a>
          </ul>
        </div>

        <!--  for some other links -->
        <div class="footer-items">
          <h3>Categories</h3>
          <div class="border1"></div>
          <!--for the underline -->
          <ul>
            <a href="#">
              <li>Drums</li>
            </a>
            <a href="#">
              <li>Flutes</li>
            </a>
            <a href="#">
              <li>Strings</li>
            </a>
            <a href="#">
              <li>Columns</li>
            </a>
          </ul>
        </div>

        <!--  for contact us info -->
        <div class="footer-items">
          <h3>Contact us</h3>
          <div class="border1"></div>
          <ul>
            <li>
              <i class="fa fa-map-marker" aria-hidden="true"></i>Find Us Here
            </li>
            <li>
              <i class="fa fa-phone" aria-hidden="true"></i>011454525687
            </li>
            <li>
              <i class="fa fa-envelope" aria-hidden="true"></i>xyz@gmail.com
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
          WE ACCEPT<i class="fa-brands fa-cc-visa"></i><i class="fa-brands fa-cc-mastercard"></i><i class="fa-solid fa-building-columns"></i><i class="fa-solid fa-money-bill"></i></span>
        <div class="email">
          <label for="">ENTER E-MAIL</label>
          <!-- <i class="fa-solid fa-magnifying-glass"></i> -->
          <input class="intouch" type="text" placeholder="Get In Touch" />
        </div>
      </div>
    </div>
  </footer>
  <!--THE SCRIPT TAG FOR THE IMAGE SLIDERS AND MORE ON-->
  <script>
    const imgs = document.querySelectorAll('.img-select a');
    const imgBtns = [...imgs];
    let imgId = 1;

    imgBtns.forEach((imgItem) => {
      imgItem.addEventListener('click', (event) => {
        event.preventDefault();
        imgId = imgItem.dataset.id;
        slideImage();
      });
    });

    function slideImage() {
      const displayWidth = document.querySelector('.img-showcase img:first-child').clientWidth;

      document.querySelector('.img-showcase').style.transform = `translateX(${- (imgId - 1) * displayWidth}px)`;
    }

    window.addEventListener('resize', slideImage);
  </script>

</body>

</html>