<main id="main" role="main">
    <section id="checkout-container">
        <div class="container">
            <div class="py-5 text-center">
                <i class="fa fa-credit-card fa-3x text-primary"></i>
                <h2 class="my-3">Thanh Toán Đơn Hàng</h2>
            </div>
            <div class="row mb-5">
                <div class="col-md-4 order-md-2 mb-4">
                    <h4 class="d-flex justify-content-between align-items-center mb-3">
                        <span class="text-muted">Giỏ Hàng Của Bạn</span>
                        <span class="badge badge-secondary badge-pill">3</span>
                    </h4>
                    <ul class="list-group mb-3">
                        <?php
                        $totals_all = 0;
                        if ($method == "check_out_cart") {
                            foreach ($carts as $cart) {
                                extract($cart);
                                $totals_all += $totals;
                                $total_format = number_format($totals, 0, '.', '.');
                                $totals_all_format = number_format($totals_all, 0, '.', '.');

                        ?>
                                <li class="list-group-item d-flex justify-content-between lh-condensed">
                                    <div>
                                        <h6 class="my-0">Tên Sản Phẩm</h6>
                                        <small class="text-muted"><?= $pro_name ?></small>
                                        <h6 class="my-0">Màu</h6>
                                        <small class="text-muted"><?= $color_name ?></small>
                                        <h6 class="my-0">Số Lượng</h6>
                                        <small class="text-muted"><?= $quantity_cart ?></small>
                                    </div>
                                    <span class="text-muted"><?= $total_format ?>đ</span>
                                </li>
                            <?php
                            }
                        } elseif ($method == "check_out_buy") {
                            extract($product);
                            $totals_all += $totals;
                            $total_format = number_format($totals, 0, '.', '.');
                            $totals_all_format = number_format($totals_all, 0, '.', '.');
                            ?>
                            <li class="list-group-item d-flex justify-content-between lh-condensed">
                                <div>
                                    <h6 class="my-0">Tên Sản Phẩm</h6>
                                    <small class="text-muted"><?= $pro_name ?></small>
                                    <h6 class="my-0">Màu</h6>
                                    <small class="text-muted"><?= $color_name ?></small>
                                    <h6 class="my-0">Số Lượng</h6>
                                    <small class="text-muted"><?= $quantity_cart ?></small>
                                </div>
                                <span class="text-muted"><?= $total_format ?>đ</span>
                            </li>
                        <?php
                        }
                        ?>
                        <li class="list-group-item d-flex justify-content-between">
                            <span>Tổng Tiền</span>
                            <strong><?= $totals_all_format ?>đ</strong>
                        </li>

                        <li class="list-group-item d-flex justify-content-between bg-light">
                            <div class="text-success">

                                <span class="text-success"><?= $code ?></span>
                            </div>
                        </li>
                        <li class="list-group-item d-flex justify-content-between">
                            <span>=</span>
                        </li>
                        <?php
                        ?>
                    </ul>
                    <form class="card p-2" action="index.php?act=check_out" method="POST">

                    </form>
                </div>
                <div class="col-md-8 order-md-1">
                    <h4 class="mb-3">Thông Tin</h4>
                    <form class="needs-validation" novalidate method="POST" action="index.php?act=confirm_checkout">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="firstName">Họ</label>
                                <input type="text" class="form-control" id="firstName" name="firstname" required>
                                <div class="invalid-feedback">
                                    Buộc Phải Điền Thông Tin.
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="lastName">Tên</label>
                                <input type="text" class="form-control" id="lastName" name="lastname" required>
                                <div class="invalid-feedback">
                                    Valid last name is required.
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="email">Số Điện Thoại
                            </label>
                            <input type="text" class="form-control" name="tel" value="<?= $_SESSION['user_name_login']['tel'] ?>" id="tel" required>
                            <div class="invalid-feedback">
                                Please enter a valid email address for shipping updates.
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="email">Email
                            </label>
                            <input type="email" class="form-control" name="email" id="email" value="<?= $_SESSION['user_name_login']['email'] ?>" required>
                            <div class="invalid-feedback">
                                Please enter a valid email address for shipping updates.
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="address">Địa Chỉ</label>
                            <input type="text" class="form-control" name="address" id="address" value="<?= $_SESSION['user_name_login']['address'] ?>" required>
                            <div class="invalid-feedback">
                                Please enter your shipping address.
                            </div>
                        </div>
                        <hr>
                        <h4 class="mb-3">Phương Thức Thanh Toán</h4>
                        <hr>
                        <?php
                        if ($voucher_discount > 0) {
                        ?>
                            <input type="hidden" name="totals" id="" value="<?= $totals_sale ?>">
                        <?php
                        } else {
                        ?>
                            <input type="hidden" name="totals" id="" value="<?= $totals_all ?>">
                        <?php
                        }
                        ?>
                        <input type="hidden" name="check_out_method" id="" value="<?= $method ?>">
                        <input type="hidden" name="id_clp" id="" value="<?= $id_clp ?>">
                        <input type="hidden" name="pro_name" id="" value="<?= $pro_name ?>">
                        <input type="hidden" name="color_name" id="" value="<?= $color_name ?>">
                        <input type="hidden" name="brand_name" id="" value="<?= $brand_name ?>">
                        <input type="hidden" name="price" id="" value="<?= $price ?>">
                        <input type="hidden" name="quantity_cart" id="" value="<?= $quantity_cart ?>">
                        <input class="btn btn-primary btn-lg btn-block" name="pay" type="submit" value="Thanh Toán COD"></input>
                        <input class="btn btn-primary btn-lg btn-block" name="redirect" type="submit" value="Thanh Toán VN PAY"></input>
                    </form>
                </div>
            </div>
        </div>

    </section>