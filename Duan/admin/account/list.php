<div class="content-body">
    <div class="container-fluid">
        <div class="row"></div>
        <div class="content-1">
            <table class="table">
                <h2> <i class="fa-solid fa-shop"></i> Danh sách Tài Khoản</h2>
                <thead>
                    <tr>
                        <th scope="col">Mã Tài Khoản</th>
                        <th scope="col">Tên Đăng Nhập</th>
                        <th scope="col">Email</th>
                        <th scope="col">Địa Chỉ</th>
                        <th scope="col">Số Điện Thoại</th>
                        <th scope="col">Ảnh Đại Diện</th>
                        <th scope="col">Chức Vụ</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($list_account as $acc) {
                        extract($acc);
                        $list_role = ['User', 'Admin', 'Manager'];
                        ?>
                        <tr>
                            <th scope="row">
                                <?= $id_user ?>
                            </th>
                            <td>
                                <?= $user_name ?>
                            </td>
                            <td>
                                <?= $email ?>
                            </td>
                            <td>
                                <?= $address ?>
                            </td>
                            <td>
                                <?= $tel ?>
                            </td>
                            <td><img width=50px src="../image_user/<?= $avatar ?>" alt=""></td>
                            <td>
                                <?= $list_role[$role] ?>
                            </td>
                            <td>
                                <?php
                                if ($_SESSION['user_name_login']['role'] >= $role) {
                                    ?>
                                    <a href="index.php?act=update_account&id=<?= $id_user ?>"><input type="button"
                                            value="Sửa"></a>
                                    <?php
                                }
                                ?>
                            </td>
                        </tr>
                        <?php
                    }
                    ?>
                </tbody>
            </table>
            <form action="index.php?act=list_account" method="POST">
                <?php
                for ($i = 0; $i < $count; $i++) {

                    ?>
                    <input type="submit" name="number" value="<?= $i + 1 ?>">
                    <?php
                }
                ?>
            </form>
        </div>
    </div>
</div>
</div>