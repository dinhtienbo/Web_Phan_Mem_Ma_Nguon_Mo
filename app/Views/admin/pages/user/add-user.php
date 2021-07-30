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

    <script type="text/javascript">
        (function($) {
            $(document).ready(function() {
                var main = $('#form');

                // Tabs
                main.contentTabs();
            });
        })(jQuery);
    </script>

    <!-- Title area -->
    <div class="titleArea">
        <div class="wrapper">
            <div class="pageTitle">
                <h5>Sản phẩm</h5>
                <span>Quản lý sản phẩm</span>
            </div>

            <div class="horControlB menu_action">
                <ul>
                    <li><a href="admin/List-User/Add">
                            <img src="acsset/admin/images/icons/control/16/add.png" />
                            <span>Thêm mới</span>
                        </a></li>

                    <li><a href="admin/List-User">
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

        <!-- Form -->
        <?= view('message/messageUser')?>
        <form class="form" id="form" action="admin/List-User/Create" method="post">
            <fieldset>
                <div class="widget">
                    <div class="title">
                        <img src="acsset/admin/images/icons/dark/add.png" class="titleIcon" />
                        <h6>Thêm mới Người dùng</h6>
                    </div>
                    <div class="tab_container">
                        <div id='tab1' class="tab_content pd0">
                            <div class="formRow">
                                <label class="formLeft" for="param_name">Tên người dùng:<span class="req">*</span></label>
                                <div class="formRight">
                                    <span class="oneTwo"><input value="<?= old('name') ?>" name="name" id="param_name" _autocheck="true" type="text" /></span>
                                    <span name="name_autocheck" class="autocheck"></span>
                                    <div name="name_error" class="clear error"></div>
                                </div>
                                <div class="clear"></div>
                            </div>

                            <!-- Email -->
                            <div class="formRow">
                                <label class="formLeft" for="param_name">Email:<span class="req">*</span></label>
                                <div class="formRight">
                                    <span class="oneTwo"><input value="<?= old('email') ?>" name="email" id="param_email" _autocheck="true" type="email" /></span>
                                    <span name="name_autocheck" class="autocheck"></span>
                                    <div name="name_error" class="clear error"></div>
                                </div>
                                <div class="clear"></div>
                            </div>

                            <!-- Password -->
                            <div class="formRow">
                                <label class="formLeft" for="param_name">Password:<span class="req">*</span></label>
                                <div class="formRight">
                                    <span class="oneTwo"><input value="<?= old('password') ?>" name="password" id="param_password" _autocheck="true" type="password" /></span>
                                    <span name="name_autocheck" class="autocheck"></span>
                                    <div name="name_error" class="clear error"></div>
                                </div>
                                <div class="clear"></div>
                            </div>

                            <!-- Password confirm-->
                            <div class="formRow">
                                <label class="formLeft" for="param_name">Password:<span class="req">*</span></label>
                                <div class="formRight">
                                    <span class="oneTwo"><input value="<?= old('password_confirm') ?>" name="password_confirm" id="param_password_confirm" _autocheck="true" type="password" /></span>
                                    <span name="name_autocheck" class="autocheck"></span>
                                    <div name="name_error" class="clear error"></div>
                                </div>
                                <div class="clear"></div>
                            </div>


                            <!-- Phone -->
                            <div class="formRow">
                                <label class="formLeft" for="param_name">Phone:<span class="req">*</span></label>
                                <div class="formRight">
                                    <span class="oneTwo"><input value="<?= old('phone') ?>" name="phone" id="param_phone" _autocheck="true" type="text" /></span>
                                    <span name="name_autocheck" class="autocheck"></span>
                                    <div name="name_error" class="clear error"></div>
                                </div>
                                <div class="clear"></div>
                            </div>

                            <!-- Address -->
                            <div class="formRow">
                                <label class="formLeft" for="param_name">Address:<span class="req">*</span></label>
                                <div class="formRight">
                                    <span class="oneTwo"><input value="<?= old('address') ?>" name="address" id="param_address" _autocheck="true" type="text" /></span>
                                    <span name="name_autocheck" class="autocheck"></span>
                                    <div name="name_error" class="clear error"></div>
                                </div>
                                <div class="clear"></div>
                            </div>

                            <div class="formRow hide"></div>

                        </div><!-- End tab_container-->

                        <div class="formSubmit">
                            <input type="submit" value="Thêm mới" class="redB" />
                            <input type="button" onclick="location.href='admin/List-User/Add';" value="Hủy bỏ" class="basic" />

                        </div>
                        <div class="clear"></div>
                    </div>
            </fieldset>
        </form>
    </div>
    <div class="clear mt30"></div>

    <!-- Footer -->
    <div id="footer">
        <div class="wrapper">
            <div>Bản quyền © 2012-2016 hocphp.info</div>
        </div>
    </div>
</div>