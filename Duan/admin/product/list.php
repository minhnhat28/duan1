<div class="content-body">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Danh Sách Sản Phẩm</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example" class="display" style="min-width: 845px">
                                <thead>
                                    <tr>
                                        <th>ID Sản Phẩm</th>
                                        <th>Tên Sản Phẩm</th>
                                        <th>Giá</th>
                                        <th>Ảnh</th>
                                        <th>Mô Tả</th>
                                        <th>Lượt xem</th>
                                        <th>Ngày Đăng</th>
                                        <th>Danh Mục</th>
                                        <th>Hãng</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        foreach ($list_pro as $pro) {
                                            extract($pro);
                                    ?>
                                        <tr>
                                          <td><?=$id_pro?></td>
                                          <td><?=$pro_name?></td>
                                          <td><?=$price?></td>
                                          <td><img width=50px src="../image_product/<?=$img?>" alt=""></td>
                                          <td><?=$detail?></td>
                                          <td><?=$view?></td>
                                          <td><?=$add_at?></td>
                                          <td><?=$cate_name?></td>
                                          <td><?=$brand_name?></td>
                                            <td><a  href="index.php?act=update_pro&id=<?=$id_pro?>"><button class="btn btn-primary">Sửa</button></a></td>
                                            <td>
                                                <a onclick="return confirm('Bạn có muốn xóa không');"href="index.php?act=delete_pro&id=<?=$id_pro?>">
                                                    <button class="btn btn-primary">Xóa</button>
                                                </a>
                                            </td>
                                            <td><a  href="index.php?act=list_color_pro&id=<?=$id_pro?>"><button class="btn btn-primary">Danh Sách Màu</button></a></td>
                                        </tr>
                                    <?php
                                        }
                                    ?>
                                </tbody>
                            </table>
                            <div class="dataTables_paginate paging_simple_numbers" id="example_paginate">
                                <a class="paginate_button previous disabled" aria-controls="example" data-dt-idx="0" tabindex="0" id="example_previous">Previous</a>
                                <span>
                                    <?php
                                        for ($i=0; $i < $count; $i++) {
                                    ?>
                                    <a class="paginate_button current" href="index.php?act=list_pro&page=<?=$i?>" aria-controls="example" data-dt-idx="1" tabindex="0"><?=$i+1?></a>
                                    <?php
                                     }
                                    ?>
                                </span>
                                <a class="paginate_button next" aria-controls="example" data-dt-idx="7" tabindex="0" id="example_next">Next</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>