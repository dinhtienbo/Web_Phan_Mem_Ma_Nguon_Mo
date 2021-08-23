    <!--form-->
    <div class="container">
        <div class="row">
            <div class="col-sm-4">
                <div class="login-form">
                    <!--login form-->
                    <h2>Chỉnh sửa thông tin </h2>
                    <?= view('message/message') ?>
                    <form action="account/edit" method="post">
                        <input type="text" placeholder="Tên" name="name" value="<?= $users['name'] ?>" />
                        <input type="text" placeholder="Email Address" name="email" value="<?= $users['email'] ?>" />
                        <input type="text" placeholder="Điện thoại" name="phone" value="<?= $users['phone'] ?>" />
                        <input type="text" placeholder="Địa chỉ" name="address" value="<?= $users['address'] ?>" />
                        <input type="hidden" name="password" value="<?= $users['password'] ?>" />
                        <button type="submit" class="btn btn-default">Sửa thông tin</button>
                    </form>
                </div>
                <!--/login form-->
            </div>

            <div class="col-sm-8">
                <div class="signup-form">
                    <!--sign up form-->
                    <h2>Lịch sửa giao dịch</h2>

                    <table class="table table-condensed">
                        <thead>
                            <tr class="cart_menu">
                                <td class="image">STT</td>
                                <td class="description">Mã giao dịch</td>
                                <td class="price">Tổng tiền</td>
                                <td class="quantity">Hình thức thanh toán</td>
                                <td class="total">Trạng thái</td>
                                <td></td>
                            </tr>

                        <tbody>
                            <?php $i = 0 ?>
                            <?php foreach ($transactions as $row) : ?>
                                <?php $i++ ?>
                                <tr>
                                    <td>
                                        <?php echo $i ?>
                                    </td>
                                    <td>
                                        <a href="account/view/<?= $row['id'] ?>"><?= $row['id'] ?></a>

                                    </td>
                                    <td class="cart_price">
                                        <p>$<?= $row['amount'] ?></p>
                                    </td>
                                    <td class="cart_quantity">
                                        <p><?= $row['payment'] ?></p>
                                    </td>
                                    <td class="cart_total">
                                        <?php if ($row['status'] == '0') : ?>
                                            <button >Chờ xử lý</button>

                                        <?php endif ?>
                                        <?php if ($row['status'] == '1') : ?>
                                            <button onclick="window.location.href='account/Confirm/<?= $row['id'] ?>'">Giao hàng</button>
                                        <?php endif ?>
                                        <?php if ($row['status'] == '2') : ?>
                                            <button>Thành công</button>
                                        <?php endif ?>
                                    </td>

                                </tr>
                            <?php endforeach ?>
                        </tbody>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>
                <!--/sign up form-->
            </div>
        </div>
    </div>
    <!--/form-->