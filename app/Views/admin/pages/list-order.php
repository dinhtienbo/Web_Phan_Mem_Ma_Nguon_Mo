<div id="rightSide">

    <!-- Account panel top -->

    <div class="topNav">
        <div class="wrapper">
            <div class="welcome">
                <span>Xin chào: <b><?= session()->get('loginAdmin')['name'] ?></b></span>
            </div>

            <div class="userNav">
                <ul>
                    <li><a href="admin" target="_blank">
                            <img style="margin-top:7px;" src="acsset/admin/images/icons/light/home.png" />
                            <span>Trang chủ</span>
                        </a></li>

                    <!-- Logout -->
                    <li><a href="logout">
                            <img src="acsset/admin/images/icons/topnav/logout.png" alt="" />
                            <span>Đăng xuất</span>
                        </a></li>

                </ul>
            </div>

            <div class="clear"></div>
        </div>
    </div>

    <!-- Main content -->

    <!-- Common -->
    <!-- Title area -->
    <div class="titleArea">
        <div class="wrapper">
            <div class="pageTitle">
                <h5>Đơn hàng sản phẩm</h5>
                <span>Quản lý đơn hàng</span>
            </div>

            <div class="horControlB menu_action">
                <ul>

                    <li><a href="admin/product_order.html">
                            <img src="acsset/admin/images/icons/control/16/list.png" />
                            <span>Danh sách</span>
                        </a></li>

                    <li><a href="">
                            <img src="acsset/admin/images/excel.png" />
                            <span>Xuất file excel</span>
                        </a></li>
                </ul>
            </div>

            <div class="clear"></div>
        </div>
    </div>
    <div class="line"></div>

    <!-- Message -->






    <!-- Main content wrapper -->
    <div class="wrapper">

        <div class="widget">
            <div class="title">
                <span class="titleIcon"><img src="acsset/admin/images/icons/tableArrows.png" /></span>
                <h6>Danh sách Đơn hàng sản phẩm</h6>

                <div class="num f12">Tổng số: <b><?= count($orders) ?></b></div>
            </div>

            <table cellpadding="0" cellspacing="0" width="100%" class="sTable mTable myTable" id="checkAll">
                <thead class="filter">
                    <tr>
                        <td colspan="9">
                            <form class="list_filter form" action="index.php/admin/product_order.html" method="get">
                                <table cellpadding="0" cellspacing="0" width="100%">
                                    <tbody>

                                        <tr>
                                            <td class="label" style="width:60px;"><label for="filter_id">Mã số</label></td>
                                            <td class="item"><input name="id" value="" id="filter_id" type="text" style="width:95px;" /></td>

                                            <td class="label" style="width:60px;"><label for="filter_type">Đơn hàng</label></td>
                                            <td class="item">
                                                <select name="status">
                                                    <option value=""></option>
                                                    <option value='0'>Đợi xử lý</option>
                                                    <option value='1'>Đã gửi hàng</option>
                                                    <option value='2'>Hủy bỏ</option>
                                                </select>
                                            </td>

                                            <td class="label" style="width:60px;"><label for="filter_created">Từ ngày</label></td>
                                            <td class="item"><input name="created" value="" id="filter_created" type="text" class="datepicker" /></td>


                                            <td colspan='2' style='width:60px'>
                                                <input type="submit" class="button blueB" value="Lọc" />
                                                <input type="reset" class="basic" value="Reset" onclick="window.location.href = 'index.php/admin/product_order.html'; ">
                                            </td>

                                        </tr>

                                        <tr>
                                            <td class="label" style="width:60px;"><label for="filter_user">Thành viên</label></td>
                                            <td class="item"><input name="user" value="" id="filter_user" class="tipS" title="Nhập mã thành viên" type="text" /></td>

                                            <td class="label"><label for="filter_status">Giao dịch</label></td>
                                            <td class="item">
                                                <select name="transaction_status">
                                                    <option value=""></option>
                                                    <option value='0'>Đợi xử lý</option>
                                                    <option value='1'>Thành công</option>
                                                    <option value='2'>Hủy bỏ</option>
                                                </select>
                                            </td>

                                            <td class="label"><label for="filter_created_to">Đến ngày</label></td>
                                            <td class="item"><input name="created_to" value="" id="filter_created_to" type="text" class="datepicker" /></td>

                                            <td class="label"></td>
                                            <td class="item"></td>
                                        </tr>

                                    </tbody>
                                </table>
                            </form>
                        </td>
                    </tr>
                </thead>

                <thead>
                    <tr>
                        <td style="width:60px;">Mã số</td>
                        <td>Sản phẩm</td>
                        <td style="width:80px;">Giá</td>
                        <td style="width:50px;">Số lượng</td>
                        <td style="width:70px;">Số tiền</td>
                        <td style="width:75px;">Đơn hàng</td>
                        <td style="width:75px;">Giao dịch</td>
                        <td style="width:75px;">Ngày tạo</td>
                        <td style="width:55px;">Hành động</td>
                    </tr>
                </thead>

                <tfoot class="auto_check_pages">
                    <tr>
                        <td colspan="9">

                            <div class='pagination'>
                                &nbsp;<strong>1</strong>&nbsp;<a href="admin/product_order/index/10">2</a>&nbsp;<a href="admin/product_order/index/10">Trang kế tiếp</a>&nbsp; </div>
                        </td>
                    </tr>
                </tfoot>

                <tbody class="list_item">
                    <?php foreach ($orders as $row) : ?>
                        <tr class='row_20'>

                            <td class="textC"><?= $row['id'] ?></td>

                            <td>
                                <div class="image_thumb">
                                    <img src="/upload/product/<?= $row['image_link'] ?>" height="50">
                                    <div class="clear"></div>
                                </div>

                                <a href="product/view/8.html" class="tipS" title="" target="_blank">
                                    <b><?= $row['name'] ?></b>
                                </a>
                            </td>

                            <td class="textR">
                                $<?= ($row['price'] - $row['discount']) ?>
                                <p style='text-decoration:line-through'>$<?= $row['price'] ?></p>
                            </td>

                            <td class="textC"><?= $row['qty'] ?></td>

                            <td class="textC">$<?= $row['amount'] ?></td>


                            <td class="status textC">
                                <?php if($row['status']=='0'):?>
                                    <button >Chờ xử lý</button>
                                    
                                <?php endif ?>
                                <?php if($row['status']=='1'):?>
                                    <button >Giao hàng</button>
                                <?php endif ?>
                                <?php if($row['status']=='2'):?>
                                    <button >Thành công</button>
                                <?php endif ?>
                            </td>

                            <td class="status textC">
                                <span class="pending">
                                    <?php if ($row['data'] == '') : ?>
                                        Chờ xử lý
                                    <?php else : ?>
                                        Đã thanh toán
                                    <?php endif ?>
                                </span>
                            </td>

                            <td class="textC"><?= $row['created'] ?></td>

                            <td class="textC">
                                <a href="admin/tran/view/21.html" class="lightbox">
                                    <img src="acsset/admin/images/icons/color/view.png" />
                                </a>
                            </td>
                        </tr>
                    <?php endforeach ?>
                </tbody>

            </table>
        </div>

    </div>
    <div class="clear mt30"></div>

    <!-- Footer -->
    <div id="footer">
        <div class="wrapper">
            <div>Bản quyền thuộc yasuo</div>
        </div>
    </div>
</div>