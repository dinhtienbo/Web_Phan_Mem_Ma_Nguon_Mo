<div id="rightSide">

    <!-- Account panel top -->

    <div class="topNav">
        <div class="wrapper">
            <div class="welcome">
                <span>Xin chào: <b>admin!</b></span>
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
                <h5>Thành viên</h5>
                <span>Quản lý thành viên</span>
            </div>

            <div class="horControlB menu_action">
                <ul>
                    <li><a href="admin/List-Admin/Add">
                            <img src="acsset/admin/images/icons/control/16/add.png" />
                            <span>Thêm mới</span>
                        </a></li>

                    <li><a href="admin/List-Admin">
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
                <span class="titleIcon"><input type="checkbox" id="titleCheck" name="titleCheck" /></span>
                <h6>Danh sách ban quản trị</h6>
                <div class="num f12">Tổng số: <b><?= count($admins) ?></b></div>
            </div>

            <form action="http://localhost/webphp/index.php/admin/user.html" method="get" class="form" name="filter">
                <table cellpadding="0" cellspacing="0" width="100%" class="sTable mTable myTable withCheck" id="checkAll">
                    <thead>
                        <tr>
                            <td style="width:10px;"><img src="acsset/admin/images/icons/tableArrows.png" /></td>
                            <td style="width:80px;">Mã số</td>
                            <td>email</td>
                            <td>Name</td>

                            <td style="width:100px;">Hành động</td>
                        </tr>
                    </thead>

                    <tfoot>
                        <tr>
                            <td colspan="7">
                                <div class="list_action itemActions">
                                    <a href="#submit" id="submit" class="button blueB" url="user/del_all.html">
                                        <span style='color:white;'>Xóa hết</span>
                                    </a>
                                </div>

                                <div class='pagination'>
                                </div>
                            </td>
                        </tr>
                    </tfoot>

                    <tbody>
                        <?php foreach ($admins as $admin) : ?>
                            <tr>
                                <td><input type="checkbox" name="id[]" value="19" /></td>

                                <td class="textC"><?= $admin['id'] ?></td>


                                <td><span title="<?= $admin['email'] ?>" class="tipS">
                                        <?= $admin['email'] ?> </span></td>


                                <td><span title="<?= $admin['name'] ?>" class="tipS">
                                        <?= $admin['name'] ?> </span></td>


                                <td class="option">
                                    <a href="admin/List-Admin/Edit/<?= $admin['id'] ?>" title="Chỉnh sửa" class="tipS ">
                                        <img src="acsset/admin/images/icons/color/edit.png" />
                                    </a>

                                    <a href="admin/List-Admin/Delete/<?= $admin['id'] ?>" onClick="return confirm('Bạn có muốn xóa?')" title="Xóa" class="tipS verify_action">
                                        <img src="acsset/admin/images/icons/color/delete.png" onclick="xoa();" />
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </form>
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