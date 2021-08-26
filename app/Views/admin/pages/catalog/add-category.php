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
                    <li><a href="admin/List-Category/Add">
                            <img src="acsset/admin/images/icons/control/16/add.png" />
                            <span>Thêm mới</span>
                        </a></li>

                    <li><a href="admin/List-Category">
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
        <?= view('message/messageUser') ?>
        <form id="form" class="form" enctype="multipart/form-data" method="post" action="admin/List-Category/Create">
            <fieldset>

                <div class="formRow">
                    <label for="param_name" class="formLeft">Tên:<span class="req">*</span></label>
                    <div class="formRight">
                        <span class="oneTwo"><input type="text" _autocheck="true" id="param_name" value="<?= old('name') ?>"  name="name"></span>
                        <span class="autocheck" name="name_autocheck"></span>
                        <div class="clear error" name="name_error"></div>
                    </div>
                    <div class="clear"></div>
                </div>

                <div class="formRow">
                    <label for="param_name" class="formLeft">Danh mục cha:</label>
                    <div class="formRight">
                        <span class="oneTwo">
                            <select _autocheck="true" id="param_parent_id" name="parent_id">
                                <option value="0">Là danh mục cha</option>
                                <?php foreach ($list as $row) : ?>
                                    <option value="<?=$row['id'] ?>"><?=$row['name'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </span>
                        <span class="autocheck" name="parent_id_autocheck"></span>
                        <div class="clear error" name="parent_id_error"></div>
                    </div>
                    <div class="clear"></div>
                </div>

                <div class="formRow">
                    <label for="param_name" class="formLeft">Thứ tự hiển thị:</label>
                    <div class="formRight">
                        <span class="oneTwo"><input type="text" _autocheck="true" id="param_sort_order" value="<?= old('sort_order') ?>"  name="sort_order"></span>
                        <span class="autocheck" name="sort_order_autocheck"></span>
                        <div class="clear error" name="sort_order_error"></div>
                    </div>
                    <div class="clear"></div>
                </div>

                <div class="formRow">
                    <label for="param_name" class="formLeft">Từ khóa:</label>
                    <div class="formRight">
                        <span class="oneTwo"><input type="text" _autocheck="true" id="param_sort_order" value="<?= old('meta_key') ?>"  name="meta_key"></span>
                        <span class="autocheck" name="sort_order_autocheck"></span>
                        <div class="clear error" name="sort_order_error"></div>
                    </div>
                    <div class="clear"></div>
                </div>


                <div class="formSubmit">
                    <input type="submit" class="redB" value="Thêm mới">
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