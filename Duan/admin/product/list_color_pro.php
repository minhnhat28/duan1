<div class="content-body">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Danh Sách Màu</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example" class="display" style="min-width: 845px">
                                <thead>
                                    <tr>
                                        <th>ID Sản Phẩm</th>
                                        <th>Ảnh</th>
                                        <th>Màu</th>
                                        <th>Số Lượng</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        foreach ($list_pro as $pro) {
                                            extract($pro);
                                    ?>
                                        <tr>
                                            <td><?=$id_pro?></td>
                                            <td><img width=50px src="../image_product/<?=$image?>" alt=""></td>
                                            <td><?=$color_name?></td>
                                            <td><?=$quantity?></td>
                                            <td><a  href="index.php?act=update_color_pro&id_clp=<?=$id_clp?>"><button class="btn btn-primary">Sửa</button></a></td>
                                            <td>
                                                <a onclick="return confirm('Bạn có muốn xóa không');"href="index.php?act=delete_color_pro&id_clp=<?=$id_clp?>&id_pro=<?=$id_pro?>">
                                                    <button class="btn btn-primary">Xóa</button>
                                                </a>
                                            </td>
                                        </tr>
                                    <?php
                                        }
                                    ?>
                                </tbody>
                                <tr>
                                    <a href="index.php?act=add_more_color&id=<?=$id_pro?>"><button class="btn btn-primary">Thêm</button></a>
                                </tr>
                            </table>
                            <div class="dataTables_paginate paging_simple_numbers" id="example_paginate">
                                <a class="paginate_button previous disabled" aria-controls="example" data-dt-idx="0" tabindex="0" id="example_previous">Previous</a>
                                <span>
                                    <?php
                                        for ($i=0; $i < $count; $i++) {
                                    ?>
                                    <a class="paginate_button current" href="index.php?act=list_color_pro&page=<?=$i?>" aria-controls="example" data-dt-idx="1" tabindex="0"><?=$i+1?></a>
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