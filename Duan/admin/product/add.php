<div class="content-body">
    <div class="container-fluid">
        
        <!-- row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Thêm Sản Phẩm</h4>
                    </div>
                    <div class="card-body">
                        <div class="form-validation">
                            <form class="form-valide" action="index.php?act=add_pro" method="POST" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-xl-6">
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-username">Tên Sản Phẩm
                                                <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" id="val-username" name="pro_name" placeholder="Enter a pro name...">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-username">Giá
                                                <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" id="val-username" name="price" placeholder="Enter a price...">
                                            </div>
                                        </div>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">Ảnh</span>
                                            </div>
                                            <div class="custom-file">
                                                <input name="img" type="file" class="custom-file-input">
                                                <label class="custom-file-label">Chọn ảnh</label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-lg-4 col-form-label" for="val-username">Mô Tả
                                                <span class="text-danger">*</span>
                                            </label>
                                            <textarea name="detail" class="form-control" rows="4" id="comment"></textarea>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-skill">Loại
                                                <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <select class="form-control" id="val-skill" name="cate">
                                                    <?php
                                                        foreach ($listcate as $key => $value) {
                                                    ?>
                                                        <option value="<?=$value['id_cate']?>"><?=$value['cate_name']?></option>
                                                    <?php
                                                        }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-skill">Hãng
                                                <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <select class="form-control" id="val-skill" name="brand">
                                                    <?php
                                                        foreach ($listbrand as $key => $value) {
                                                    ?>
                                                        <option value="<?=$value['id_brand']?>"><?=$value['brand_name']?></option>
                                                    <?php
                                                        }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-skill">Màu
                                                <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <select class="form-control" id="val-skill" name="color">
                                                    <?php
                                                        foreach ($listcolor as $key => $value) {
                                                    ?>
                                                        <option value="<?=$value['id_color']?>"><?=$value['color_name']?></option>
                                                    <?php
                                                        }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-username">Số lượng
                                                <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="number" min=0 class="form-control" id="val-username" name="quantity" placeholder="Enter Quantity">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-lg-8 ml-auto">
                                                <input type="submit" class="btn btn-primary" name="them" id="" value="Thêm">
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