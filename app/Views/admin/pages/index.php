<div id="rightSide">

    <!-- Account panel top -->

    <div class="topNav">
        <div class="wrapper">
            <div class="welcome">
                <span>Xin chào: <b><?= session()->get('loginAdmin')['name']?></b></span>
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

    <!-- Title area -->
    <div class="titleArea">
        <div class="wrapper">
            <div class="pageTitle">
                <h5>Bảng điều khiển</h5>
                <span>Trang quản lý hệ thống</span>
            </div>

            <div class="clear"></div>
        </div>
    </div>

    <div class="line"></div>


    <!-- Message -->


    <!-- Main content wrapper -->
    <div class="wrapper">

        <div class="widgets">
            <!-- Stats -->

            <!-- Amount -->
            <div class="oneTwo">
                <div class="widget">
                    <div class="title">
                        <img src="acsset/admin/images/icons/dark/money.png" class="titleIcon" />
                        <h6>Doanh số</h6>
                    </div>

                    <table cellpadding="0" cellspacing="0" width="100%" class="sTable myTable">
                        <tbody>

                            <tr>
                                <td class="fontB blue f13">Tổng doanh số</td>
                                <td class="textR webStatsLink red" style="width:120px;">$<?=$totalAll ?></td>
                            </tr>

                            <tr>
                                <td class="fontB blue f13">Doanh số hôm nay</td>
                                <td class="textR webStatsLink red" style="width:120px;">$<?=$totalDay ?></td>
                            </tr>

                            <tr>
                                <td class="fontB blue f13">Doanh số theo tháng</td>
                                <td class="textR webStatsLink red" style="width:120px;">
                                $<?=$totalMonth ?>
                                </td>
                            </tr>

                        </tbody>
                    </table>
                </div>
            </div>


            <!-- User -->
            <div class="oneTwo">
                <div class="widget">
                    <div class="title">
                        <img src="acsset/admin/images/icons/dark/users.png" class="titleIcon" />
                        <h6>Thống kê dữ liệu</h6>
                    </div>

                    <table cellpadding="0" cellspacing="0" width="100%" class="sTable myTable">
                        <tbody>

                            <tr>
                                <td>
                                    <div class="left">Tổng số gia dịch</div>
                                    <div class="right f11"><a href="admin/tran.html">Chi tiết</a></div>
                                </td>

                                <td class="textC webStatsLink">
                                    <?= count($transactions)?> </td>
                            </tr>

                            <tr>
                                <td>
                                    <div class="left">Tổng số sản phẩm</div>
                                    <div class="right f11"><a href="admin/product.html">Chi tiết</a></div>
                                </td>

                                <td class="textC webStatsLink">
                                <?= count($products)?> </td>
                            </tr>

                            <tr>
                                <td>
                                    <div class="left">Tổng số bài viết</div>
                                    <div class="right f11"><a href="admin/news.html">Chi tiết</a></div>
                                </td>

                                <td class="textC webStatsLink">
                                    4 </td>
                            </tr>

                            <tr>
                                <td>
                                    <div class="left">Tổng số thành viên</div>
                                    <div class="right f11"><a href="admin/user.html">Chi tiết</a></div>
                                </td>

                                <td class="textC webStatsLink">
                                <?= count($users)?> </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="left">Tổng số liên hệ</div>
                                    <div class="right f11"><a href="admin/contact.html">Chi tiết</a></div>
                                </td>

                                <td class="textC webStatsLink">
                                    0 </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="clear"></div>

            <!-- Giao dich thanh cong gan day nhat -->

            

        </div>

    </div>
    <div class="clear mt30"></div>

    <!-- Footer -->
    <div id="footer">
        <div class="wrapper">

            <div>Bản quyền © yasuo</div>
        </div>
    </div>
</div>