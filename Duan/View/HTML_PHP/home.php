<title>BlueTech - Trang Chủ</title>

<style>
  @media screen and (max-width: 1200px ){
    .side_banner1 {
      display: none;
    }
    .side_banner2 {
      display: none;
    }

  }
  .side_banner1 {
    position: fixed;
    width: 10%;
    margin-top: 16px;
    left: 40px;
    border-radius: 5px;
    z-index: 5;
    box-shadow: 0px 0px 5px gray;
  }

  .side_banner2 {
    position: fixed;
    width: 10%;
    margin-top: 16px;
    right: 40px;
    border-radius: 5px;
    z-index: 5;
    box-shadow: 0px 0px 5px gray;
  }
  
</style>
<img class="side_banner1" src="./Duan/View/Images/side_banner1.png" alt="">
<img class="side_banner2" src="./Duan/View/Images/side_banner2.png" alt="">

<!-- ------------------------------------------------------------------------------------------------------------------------------- Chuyển Ảnh ------------ -->
<div class="container mt-3 mb-5 p-0">
  <div class="row g-0">
    <div id="carouselExampleIndicators" class="col-12 col-xl-12 carousel slide" data-bs-ride="carousel">
      <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"
          aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
          aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
          aria-label="Slide 3"></button>
      </div>
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img src="./Duan/View/Images/banner_1.webp" class="d-block w-100" alt="...">
        </div>
        <div class="carousel-item">
          <img src="./Duan/View/Images/banner_5.webp" class="d-block w-100" alt="...">
        </div>
        <div class="carousel-item">
          <img src="./Duan/View/Images/banner_3.webp" class="d-block w-100" alt="...">
        </div>
      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
        data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Trước</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
        data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Sau</span>
      </button>
    </div>

    <!-- <div class="col-3 col-xl-2"
      style="background-color: white; border-radius: 0px 10px 10px 0px; box-shadow: 0px 0px 5px gainsboro;">

    </div> -->
  </div>
</div>

<script>
  // Thêm hiệu ứng mờ và thời gian chuyển ảnh mỗi 2 giây
  document.addEventListener('DOMContentLoaded', function () {
    var myCarousel = new bootstrap.Carousel(document.getElementById('carouselExampleIndicators'), {
      interval: 3000, // Thời gian chuyển ảnh mỗi 2 giây
      wrap: true // Cho phép chuyển đến ảnh đầu tiên sau khi đến ảnh cuối cùng
    });
  });
</script>

<!-- -------------------------------------------------------------------------------------------------------------------------- SIÊU KHUYẾN MÃI ------------ -->
<div id="sale" class="container pb-3 my-5"
  style="background-image: linear-gradient(to right, #0E2241 , #00b3ff); border-radius: 10px; box-shadow: 0px 0px 5px gray;">
  <div class="row p-0">
    <div class="d-flex justify-content-start">
      <h2 class="title-product m-0" style="background-color: white; color: orangered; mix-blend-mode: luminosity;">SẢN PHẨM HOT <i class="fa-solid fa-percent"></i></h2>
    </div>
    <?php
    foreach ($product_sale as $key => $value) {
      $price_sale = number_format($value['price'], 0, '.', '.');

      ?>
      <div class="col-6 col-md-4 col-lg-3 col-xl-2 mt-4">
        <div class="card border-0" style="width: 100%;">
          <div class="collection-img position-relative">
            <a href="index.php?act=product_details&id=<?= $value['id_pro'] ?>"><img
                src="./Duan/image_product/<?= $value['img'] ?>" class="card-img-top" alt="..."></a>
            
          </div>
          <div class="card-body">
            <div class="product-title">
              <a href="index.php?act=product_details&id=<?= $value['id_pro'] ?>">
                <?= $value['pro_name'] ?>
              </a>
            </div>
            <div>
              <?php
              if ($value['discount'] != 0) {
                ?>
                <del class="old-price"><?= $price_sale ?>đ</del>
                <span class="new-price">
                  <?= $discount_sale ?>đ
                </span>
                <?php
              } else {
                ?>
                <del class="old-price"></del>
                <span class="new-price">
                  <?= $price_sale ?>đ
                </span>
                <?php
              }
              ?>
            </div>
            <div>
              <span class="rate">5.0 </span><i class="star-rate fa-solid fa-star"></i>
              <span class="rate-quantity">(10 đánh giá)</span>
            </div>
          </div>
        </div>
      </div>
      <?php
    }
    ?>
  </div>
  <nav aria-label="Page navigation example">
    <ul class="pagination justify-content-center mt-3 m-0">
      <li class="page-item disabled">
        <a class="page-link">Trước</a>
      </li>
      <?php
      for ($i = 0; $i < $count_page_sale; $i++) {
        ?>
        <li class="page-item"><a class="page-link" href="index.php?page-sale=<?= $i + 1 ?>">
            <?= $i + 1 ?>
          </a></li>
        <?php
      }
      ?>
      <li class="page-item">
        <a class="page-link" href="#">Sau</a>
      </li>
    </ul>
  </nav>
</div>


<!-- ----------------------------------------------------------------------------------------------------------------------------- CHUỘT GAMING ------------ -->
<div id="products" class="container pb-3"
  style="background-color: white; border-radius: 10px; box-shadow: 0px 0px 5px gainsboro;">
  <div class="row p-0">
    <div class="d-flex justify-content-start">
      <h2 class="title-product m-0"><i class="fa-solid fa-computer-mouse"></i> | CHUỘT GAMING</h2>
    </div>
    <?php
    foreach ($product_mouse as $key => $value) {
      $price_mouse = number_format($value['price'], 0, '.', '.');
      ?>
      <div class="col-6 col-md-4 col-lg-3 col-xl-2 mt-4"> 
        <div class="card" style="width: 100%;">
          <div class="collection-img position-relative">
            <a href="index.php?act=product_details&id=<?= $value['id_pro'] ?>"><img
                src="./Duan/image_product/<?= $value['img'] ?>" class="card-img-top" alt="..."></a>
            <?php
            
            ?>
          </div>
          <div class="card-body">
            <div class="product-title">
              <a href="index.php?act=product_details&id=<?= $value['id_pro'] ?>">
                <?= $value['pro_name'] ?>
              </a>
            </div>
            <div>
                <del class="old-price"></del>
                <span class="new-price">
                  <?= $price_mouse ?>đ
                </span>
                <?php
              
              ?>
            </div>
            <div>
              <span class="rate">5.0 </span><i class="star-rate fa-solid fa-star"></i>
              <span class="rate-quantity">(30 đánh giá)</span>
            </div>
          </div>
        </div>
      </div>
      <?php
    }
    ?>
  </div>
  <nav aria-label="Page navigation example">
    <ul class="pagination justify-content-center mt-3 m-0">
      <li class="page-item disabled">
        <a class="page-link">Trước</a>
      </li>
      <?php
      for ($i = 0; $i < $count_page_mouse; $i++) {
        ?>
        <li class="page-item"><a class="page-link" href="index.php?page_mouse=<?= $i + 1 ?>">
            <?= $i + 1 ?>
          </a></li>
        <?php
      }
      ?>
      <li class="page-item">
        <a class="page-link" href="#">Sau</a>
      </li>
    </ul>
  </nav>
</div>

<!-- ----------------------------------------------------------------------------------------------------------------------- BÀN PHÍM CƠ GAMING ------------ -->
<div class="container pb-3 my-5"
  style="background-color: white; border-radius: 10px; box-shadow: 0px 0px 5px gainsboro;">
  <div class="row p-0">
    <div class="d-flex justify-content-start">
      <h2 class="title-product m-0"><i class="fa-regular fa-keyboard"></i> | BÀN PHÍM CƠ GAMING</h2>
    </div>
    <?php
    foreach ($product_key_board as $key => $value) {
      $price_key_board = number_format($value['price'], 0, '.', '.');
      ?>
      <div class="col-6 col-md-4 col-lg-3 col-xl-2 mt-4">
        <div class="card" style="width: 100%;">
          <div class="collection-img position-relative">
            <a href="index.php?act=product_details&id=<?= $value['id_pro'] ?>"><img
                src="./Duan/image_product/<?= $value['img'] ?>" class="card-img-top" alt="..."></a>
            <?php
            
            ?>
          </div>
          <div class="card-body">
            <div class="product-title">
              <a href="index.php?act=product_details&id=<?= $value['id_pro'] ?>">
                <?= $value['pro_name'] ?>
              </a>
            </div>
            <div>
              <?php             
                ?>
                <del class="old-price"></del>
                <span class="new-price">
                  <?= $price_key_board ?>đ
                </span>
                <?php
              ?>
            </div>
            <div>
              <span class="rate">5.0 </span><i class="star-rate fa-solid fa-star"></i>
              <span class="rate-quantity">(31 đánh giá)</span>
            </div>
          </div>
        </div>
      </div>
      <?php
    }
    ?>
  </div>
  <nav aria-label="Page navigation example">
    <ul class="pagination justify-content-center mt-3 m-0">
      <li class="page-item disabled">
        <a class="page-link">Trước</a>
      </li>
      <?php
      for ($i = 0; $i < $count_page_key_board; $i++) {
        ?>
        <li class="page-item"><a class="page-link" href="index.php?page_key_board=<?= $i + 1 ?>">
            <?= $i + 1 ?>
          </a></li>
        <?php
      }
      ?>
      <li class="page-item">
        <a class="page-link" href="#">Sau</a>
      </li>
    </ul>
  </nav>
</div>

<!-- ----------------------------------------------------------------------------------------------------------------------- Tai Nghe ---------------------- -->
<div class="container pb-3 my-5"
  style="background-color: white; border-radius: 10px; box-shadow: 0px 0px 5px gainsboro;">
  <div class="row p-0">
    <div class="d-flex justify-content-start">
      <h2 class="title-product m-0"><i class="fa-solid fa-headphones-simple"></i> | Tai Nghe</h2>
    </div>
    <?php
    foreach ($product_head_phone as $key => $value) {
      $price_head_phone = number_format($value['price'], 0, '.', '.');
      ?>
      <div class="col-6 col-md-4 col-lg-3 col-xl-2 mt-4">
        <div class="card" style="width: 100%;">
          <div class="collection-img position-relative">
            <a href="index.php?act=product_details&id=<?= $value['id_pro'] ?>"><img
                src="./Duan/image_product/<?= $value['img'] ?>" class="card-img-top" alt="..."></a>
            <?php
            ?>
          </div>
          <div class="card-body">
            <div class="product-title">
              <a href="index.php?act=product_details&id=<?= $value['id_pro'] ?>">
                <?= $value['pro_name'] ?>
              </a>
            </div>
            <div>
              <?php
                ?>
                <del class="old-price"></del>
                <span class="new-price">
                  <?= $price_head_phone ?>đ
                </span>
                <?php            
              ?>
            </div>
            <div>
              <span class="rate">5.0 </span><i class="star-rate fa-solid fa-star"></i>
              <span class="rate-quantity">(31 đánh giá)</span>
            </div>
          </div>
        </div>
      </div>
      <?php
    }
    ?>
  </div>
  <nav aria-label="Page navigation example">
    <ul class="pagination justify-content-center mt-3 m-0">
      <li class="page-item disabled">
        <a class="page-link">Trước</a>
      </li>
      <?php
      for ($i = 0; $i < $count_page_head_phone; $i++) {
        ?>
        <li class="page-item"><a class="page-link" href="index.php?page_head_phone=<?= $i + 1 ?>">
            <?= $i + 1 ?>
          </a></li>
        <?php
      }
      ?>
      <li class="page-item">
        <a class="page-link" href="#">Sau</a>
      </li>
    </ul>
  </nav>
</div>


<!-- ------------------------------------------------------------------------------------------------------------------------- Banner Quảng Cáo ------------ -->
<section id="offers" class="py-5">
  <div class="container">
    <div
      class="row d-flex align-items-center justify-content-center text-center justify-content-lg-start text-lg-start">
      <div class="offers-content">
        <span class="text-white">Siêu Khuyến Mãi!</span>
        <h2 class="mt-2 mb-4 text-white">Giảm Giá Tới 50%</h2>
        <a href="#sale" class="btn">Mua Ngay</a>
      </div>
    </div>
  </div>
</section>



<!-- blogs -->
<div class="container my-5" style="background-color: white; border-radius: 10px; box-shadow: 0px 0px 5px gainsboro;">
  <section id="blogs">
    <div class="container">
      <div class="title text-center py-5">
        <h2 class="position-relative d-inline-block">BLOGS MỚI NHẤT</h2>
      </div>

      <div class="row g-3">
        <div class="card border-0 col-md-6 col-lg-4 bg-transparent my-3">
          <img src="./Duan/View/Images/blog_1.jpg" alt="" />
          <div class="card-body px-0">
            <h4 class="card-title">
              Lorem ipsum, dolor sit amet consectetur adipisicing
            </h4>
            <p class="card-text mt-3 text-muted">
              Lorem ipsum dolor sit amet consectetur adipisicing elit. Eveniet
              aspernatur repudiandae nostrum dolorem molestias odio. Sit fugit
              adipisci omnis quia itaque ratione iusto sapiente reiciendis,
              numquam officiis aliquid ipsam fuga.
            </p>
            <p class="card-text">
              <small class="text-muted">
                <span class="fw-bold">Tác Giả: </span>John Doe
              </small>
            </p>
            <a href="#" class="btn">Đọc Thêm</a>
          </div>
        </div>

        <div class="card border-0 col-md-6 col-lg-4 bg-transparent my-3">
          <img src="./Duan/View/Images/blog_2.jpg" alt="" />
          <div class="card-body px-0">
            <h4 class="card-title">
              Lorem ipsum, dolor sit amet consectetur adipisicing
            </h4>
            <p class="card-text mt-3 text-muted">
              Lorem ipsum dolor sit amet consectetur adipisicing elit. Eveniet
              aspernatur repudiandae nostrum dolorem molestias odio. Sit fugit
              adipisci omnis quia itaque ratione iusto sapiente reiciendis,
              numquam officiis aliquid ipsam fuga.
            </p>
            <p class="card-text">
              <small class="text-muted">
                <span class="fw-bold">Tác Giả: </span>John Doe
              </small>
            </p>
            <a href="#" class="btn">Đọc Thêm</a>
          </div>
        </div>

        <div class="card border-0 col-md-6 col-lg-4 bg-transparent my-3">
          <img src="./Duan/View/Images/blog_3.jpg" alt="" />
          <div class="card-body px-0">
            <h4 class="card-title">
              Lorem ipsum, dolor sit amet consectetur adipisicing
            </h4>
            <p class="card-text mt-3 text-muted">
              Lorem ipsum dolor sit amet consectetur adipisicing elit. Eveniet
              aspernatur repudiandae nostrum dolorem molestias odio. Sit fugit
              adipisci omnis quia itaque ratione iusto sapiente reiciendis,
              numquam officiis aliquid ipsam fuga.
            </p>
            <p class="card-text">
              <small class="text-muted">
                <span class="fw-bold">Tác Giả: </span>John Doe
              </small>
            </p>
            <a href="#" class="btn">Đọc Thêm</a>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>

<!-- end of blogs -->

<!-- ------------------------------------------------------------------------------------------------------------------------------- Giới Thiệu ------------ -->
<section id="about" class="py-5">
  <div class="container">
    <div class="row gy-lg-5 align-items-center">
      <div class="col-lg-6 order-lg-1 text-center text-lg-start">
        <div class="title pt-3 pb-4">
          <h2 class="position-relative d-inline-block ms-4 text-white">GIỚI THIỆU</h2>
        </div>
        <p class="lead text-white">
          BLUETECH - Một sàn thương mại điện tử về công nghệ
        </p>
        <p class="text-white">
          Với mong muốn cung cấp những sản phẩm công nghệ uy tín và chất lượng nhất đến cho mọi người, chúng tôi
          luôn không ngừng học hỏi và cải tiến từ những phản hồi góp ý từ các bạn.
        </p>
      </div>
      <div class="col-lg-6 order-lg-0">
        <a href="#"><img src="./Duan/View/Images/banner_gioithieu.png" class=" img-fluid" /></a>
      </div>
    </div>
  </div>
</section>



<!-- newsletter -->
<section id="newsletter" class="py-5">
  <div class="container">
    <div class="d-flex flex-column align-items-center justify-content-center">
      <div class="title text-center pt-3 pb-5">
        <h2 class="position-relative d-inline-block ms-4">
          ĐĂNG KÝ HỘI VIÊN
        </h2>
      </div>

      <p class="text-center text-muted">
        Chúng tôi sẽ gửi những thông tin mới nhất về các sản phẩm và dịch vụ
        khuyến mãi cho bạn qua Email, hãy đón chờ nhé!
      </p>
      <div class="input-group mb-3 mt-3">
        <input type="text" class="form-control" placeholder="Nhập Email..." />
        <button class="btn btn-primary" type="submit">Đăng Ký</button>
      </div>
    </div>
  </div>
</section>
<!-- end of newsletter -->

<!-- Scroll To Top -->
<a href="#" class="to-top" onclick="scrollToTop();"><i class="fa-solid fa-angle-up"></i></a>
<!-- End Scroll To Top -->
<script type="text/javascript">
  window.addEventListener("scroll", function () {
    var scroll = document.querySelector(".to-top");
    scroll.classList.toggle("active", window.scrollY > 500);
  });

  function scrollToTop() {
    window.scrollTo({
      top: 0,
      behavior: "smooth",
    });
  }
</script>