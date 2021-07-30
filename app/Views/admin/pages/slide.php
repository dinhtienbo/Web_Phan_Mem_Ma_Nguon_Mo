<div id="rightSide">

    <!-- Account panel top -->

    <div class="topNav">
        <div class="wrapper">
            <div class="welcome">
                <span>Xin chào: <b><?= session()->get('loginAdmin')['name']?></b></span>
            </div>

            <div class="userNav">
                <ul>
                    <li><a href="" target="_blank">
                            <img style="margin-top:7px;" src="acsset/admin/images/icons/light/home.png" />
                            <span>Trang chủ</span>
                        </a></li>

                    <!-- Logout -->
                    <li><a href="Logout">
                            <img src="acsset/admin/images/icons/topnav/logout.png" alt="" />
                            <span>Đăng xuất</span>
                        </a></li>

                </ul>
            </div>

            <div class="clear"></div>
        </div>
    </div>

    <!-- Main content -->
    <!-- Common view -->
    <!-- Title area -->
    <div class="titleArea">
        <div class="wrapper">
            <div class="pageTitle">
                <h5>Slide</h5>
                <span>Quản lý slide</span>
            </div>

            <div class="horControlB menu_action">
                <ul>
                    <li><a href="Admin/List-Product/Add">
                            <img src="acsset/admin/images/icons/control/16/add.png" />
                            <span>Thêm mới</span>
                        </a></li>

                    <li><a href="Admin/List-Product">
                            <img src="acsset/admin/images/icons/control/16/list.png" />
                            <span>Danh sách</span>
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
                <img src="acsset/admin/images/icons/dark/dialog.png" class="titleIcon" />
                <h6>
                    Danh sách
                    Slide
                </h6>
            </div>

            <div class="gallery">
                <ul>

                    <li id='3'>

                        <a class="lightbox" title="Slide 3" href="../upload/slide/31.jpg">
                            <img src="../upload/slide/31.jpg" width='280px' />
                        </a>

                        <div class="actions" style="display: none;">
                            <a href="Admin/List-Product/Edit" title="Chỉnh sửa" class="tipS">
                                <img src="acsset/admin/images/icons/color/edit.png" /></a>

                            <a href="Admin/List-Product/Delete" title="Xóa" class="tipS verify_action">
                                <img src="acsset/admin/images/icons/color/delete.png" />
                            </a>
                        </div>
                    </li>

                    <li id='2'>

                        <a class="lightbox" title="Slide 2" href="../upload/slide/21.jpg">
                            <img src="../upload/slide/21.jpg" width='280px' />
                        </a>

                        <div class="actions" style="display: none;">
                            <a href="slide/edit/2.html" title="Chỉnh sửa" class="tipS">
                                <img src="acsset/admin/images/icons/color/edit.png" /></a>

                            <a href="slide/del/2.html" title="Xóa" class="tipS verify_action">
                                <img src="acsset/admin/images/icons/color/delete.png" />
                            </a>
                        </div>
                    </li>

                    <li id='1'>

                        <a class="lightbox" title="Slide 1" href="../upload/slide/11.jpg">
                            <img src="../upload/slide/11.jpg" width='280px' />
                        </a>

                        <div class="actions" style="display: none;">
                            <a href="slide/edit/1.html" title="Chỉnh sửa" class="tipS">
                                <img src="acsset/admin/images/icons/color/edit.png" /></a>

                            <a href="slide/del/1.html" title="Xóa" class="tipS verify_action">
                                <img src="acsset/admin/images/icons/color/delete.png" />
                            </a>
                        </div>
                    </li>
                </ul>
                <div class="clear" style='height:20px'></div>
            </div>

        </div>
    </div>
    <div class="clear mt30"></div>

    <!-- Footer -->
    <div id="footer">
        <div class="wrapper">
            <div>Bản quyền © 2012-2016 hocphp.info</div>
        </div>
    </div>
</div>