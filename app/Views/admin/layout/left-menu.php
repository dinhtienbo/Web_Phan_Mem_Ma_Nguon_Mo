<div id="left_content">
    <div id="leftSide" style="padding-top:30px;">

        <!-- Account panel -->

        <div class="sideProfile">
            <a href="#" title="" class="profileFace"><img width="40" src="acsset/admin/images/user.png" /></a>
            <span>Xin chào: <strong><?= session()->get('loginAdmin')['name']?></strong></span>
            <span><?= session()->get('loginAdmin')['email']?></span>
            <div class="clear"></div>
        </div>
        <div class="sidebarSep"></div>
        <!-- Left navigation -->

        <ul id="menu" class="nav">

            <li class="home">

                <a href="admin" class="active" id="current">
                    <span>Bảng điều khiển</span>
                    <strong></strong>
                </a>


            </li>
            <li class="tran">

                <a href="admin" class=" exp">
                    <span>Quản lý bán hàng</span>
                    <strong>2</strong>
                </a>

                <ul class="sub">
                    <li>
                        <a href="admin/List-Transaction">
                            Giao dịch </a>
                    </li>
                    <li>
                        <a href="admin/List-Order">
                            Đơn hàng sản phẩm </a>
                    </li>
                </ul>

            </li>
            <li class="product">

                <a href="admin/List-Product" class=" exp">
                    <span>Sản phẩm</span>
                    <strong>3</strong>
                </a>

                <ul class="sub">
                    <li>
                        <a href="admin/List-Product">
                            Sản phẩm </a>
                    </li>
                    <li>
                        <a href="admin/List-Category">
                            Danh mục </a>
                    </li>
                    <li>
                        <a href="admin/List-Comment">
                            Phản hồi </a>
                    </li>
                </ul>

            </li>
            <li class="account">

                <a href="admin/List-User" class=" exp">
                    <span>Tài khoản</span>
                    <strong>2</strong>
                </a>

                <ul class="sub">
                    <li>
                        <a href="admin/List-Admin">
                            Ban quản trị </a>
                    </li>
                   
                    <li>
                        <a href="admin/List-User">
                            Thành viên </a>
                    </li>
                </ul>

            </li>
            <li class="support">

                <a href="admin/support.html" class=" exp">
                    <span>Hỗ trợ và liên hệ</span>
                    <strong>2</strong>
                </a>

                <ul class="sub">
                    <li>
                        <a href="admin/support.html">
                            Hỗ trợ </a>
                    </li>
                    <li>
                        <a href="admin/contact.html">
                            Liên hệ </a>
                    </li>
                </ul>

            </li>
            <li class="content">

                <a href="admin/content.html" class=" exp">
                    <span>Nội dung</span>
                    <strong>4</strong>
                </a>

                <ul class="sub">
                    <li>
                        <a href="admin/List-Slide">
                            Slide </a>
                    </li>
                    <li>
                        <a href="admin/news.html">
                            Tin tức </a>
                    </li>
                    <li>
                        <a href="admin/info.html">
                            Trang thông tin </a>
                    </li>
                    <li>
                        <a href="admin/video.html">
                            Video </a>
                    </li>
                </ul>

            </li>

        </ul>

    </div>
    <div class="clear"></div>
</div>