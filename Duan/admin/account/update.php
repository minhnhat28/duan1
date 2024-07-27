
<div class="content-body">
    <div class="container-fluid">
        <?php
            extract($account);
            $role_array = ['user','admin','manager'];
        ?>
        <!-- row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Sửa Tài Khoản</h4>
                    </div>
                    <div class="card-body">
                        <div class="form-validation">
                            <form class="form-valide" action="index.php?act=updated_account" method="POST" enctype="multipart/form-data">
                                <input type="hidden" name="id_user" value="<?=$id_user?>">
                                <div class="row">
                                    <div class="col-xl-6">
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-username">Tên Đăng Nhập
                                                <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" id="val-username" name="user_name" placeholder="Enter a user name..." value="<?=$user_name?>">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-username">Mật Khẩu
                                                <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" id="val-username" name="pass" placeholder="Enter a password..." value="<?=$pass?>">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-username">Email
                                                <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="email" class="form-control" id="val-username" name="email" placeholder="Enter a email..." value="<?=$email?>">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-username">Địa Chỉ
                                                <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="email" class="form-control" id="val-username" name="address" placeholder="Enter a address..." value="<?=$address?>">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-username">Số Điện Thoại
                                                <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="email" class="form-control" id="val-username" name="tel" placeholder="Enter a telephone..." value="<?=$tel?>">
                                            </div>
                                        </div>
                                        <img src="../image_product/<?=$avatar?>" width=200px alt="">
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">Ảnh Đại Diện</span>
                                            </div>
                                            <div class="custom-file">
                                                <input name="avatar" type="file" class="custom-file-input">
                                                <label class="custom-file-label">Chọn ảnh</label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-lg-4 col-form-label" for="val-username">Chức Vụ
                                                <span class="text-danger">*</span>
                                            </label>
                                            <p name="detail" class="form-control" rows="4" id="comment"><?=$role_array[$role]?></p>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-lg-8 ml-auto">
                                                <input type="submit" class="btn btn-primary" name="sua" id="" value="Sửa">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>