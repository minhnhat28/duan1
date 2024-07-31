<div class="content-body">
    <div class="container-fluid">
        <?php
            extract($color_pro);
        ?>
        <!-- row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Sửa Màu Sản Phẩm</h4>
                    </div>
                    <div class="card-body">
                        <div class="form-validation">
                            <form class="form-valide" action="index.php?act=updated_color_pro" method="POST" enctype="multipart/form-data">
                                <input type="hidden" name="id_clp" value="<?=$id_clp?>" id="">
                                <input type="hidden" name="id_pro" value="<?=$id_pro?>" id="">
                                <div class="row">
                                    <div class="col-xl-6">
                                        <img width=200px src="../image_product/<?=$image?>" alt="">
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">Ảnh</span>
                                            </div>
                                            <div class="custom-file">
                                                <input name="img" type="file" class="custom-file-input">
                                                <label class="custom-file-label">Chọn ảnh</label>
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
                                                        <option <?php if($value['id_color'] == $id_color){echo'selected';}?>value="<?=$value['id_color']?>">
                                                        <?=$value['color_name']?>
                                                        </option>
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
                                                <input type="number" min=0 class="form-control" id="val-username" name="quantity" placeholder="Enter Quantity" value="<?=$quantity?>">
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