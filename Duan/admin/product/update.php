<div class="content-body">
    <div class="container-fluid">
        <?php
            extract($product);
        ?>
        <!-- row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Sửa Sản Phẩm</h4>
                    </div>
                    <div class="card-body">
                        <div class="form-validation">
                            <form class="form-valide" action="index.php?act=updated_pro" method="POST" enctype="multipart/form-data">
                                <input type="hidden" name="id_pro" value="<?=$id_pro?>" id="">
                                <div class="row">
                                    <div class="col-xl-6">
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-username">Tên Sản Phẩm
                                                <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" id="val-username" name="pro_name" placeholder="Enter a pro name..." value="<?=$pro_name?>">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-username">Giá
                                                <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" id="val-username" name="price" placeholder="Enter a price..." value="<?=$price?>">
                                            </div>
                                        </div>
                                        
                                        <img src="../image_product/<?=$img?>" width=200px alt="">
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
                                            <textarea name="detail" class="form-control" rows="4" id="comment"><?=$detail?></textarea>
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
                                                        <option <?php if($value['id_cate'] == $id_cate)echo 'selected';?>
                                                        value="<?=$value['id_cate']?>"><?=$value['cate_name']?></option>
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
                                                        <option <?php if($value['id_brand'] == $id_brand)echo 'selected';?>
                                                        value="<?=$value['id_brand']?>"><?=$value['brand_name']?></option>
                                                    <?php
                                                        }
                                                    ?>
                                                </select>
                                            </div>
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