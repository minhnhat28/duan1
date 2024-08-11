<style>
    .list-infor-order {
        border: 1px solid black;
        border-radius: 5px;
    }
</style>

<div class="content-body">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Đơn Hàng Đã Bị Hủy</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Tên Người Nhận</th>
                            <th scope="col">Số Điện Thoại</th>
                            <th scope="col">Địa Chỉ</th>
                            <th scope="col">Ngày Đặt Hàng</th>
                            <th scope="col">Phương Thức Thanh Toán</th>
                            <th scope="col">Tổng Tiền</th>
                            <th scope="col">Trang Thái Đơn Hàng</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php
                        foreach ($bills as $bill) {
                            extract($bill);
                            $other_bills = load_other_bill($id_bill);
                            $total_format = number_format($total, 0, '.', '.');
                        ?>
                            <tr>
                                <td><?= $name_user ?></td>
                                <td><?= $tel_user ?></td>
                                <td><?= $address_user ?></td>
                                <td><?= $date ?></td>
                                <td><?= $name_payment ?></td>
                                <td><?= $total_format ?>đ</td>
                                <td><?= $status_name ?></td>
                                <td>
                                    <?php if ($status == 1) { ?>
                                        <a href="index.php?act=change_status_bill&id=<?= $id_bill ?>"><button>Xác Nhận Đơn Hàng</button></a>
                                    <?php } ?>
                                </td>
                            </tr>
                            
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
                <span>
                    <?php
                    for ($i = 0; $i < $bills_count; $i++) {
                    ?>
                        <a class="paginate_button current" href="index.php?act=list_cancelled_order&page=<?= $i ?>" aria-controls="example" data-dt-idx="1" tabindex="0">
                            <?= $i + 1 ?>
                        </a>
                    <?php
                    }
                    ?>
                </span>
            </div>
        </div>
    </div>
</div>
</div>
</div>
</div>
</div>
</div>
