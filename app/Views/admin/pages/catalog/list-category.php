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
        <div class="widget">

            <div class="title">
                <span class="titleIcon">
                    <div class="checker" id="uniform-titleCheck">
                        <span>
                            <input type="checkbox" name="titleCheck" id="titleCheck" style="opacity: 0;">
                        </span>
                    </div>
                </span>
                <h6>Danh sách danh mục sản phẩm</h6>
                <div class="num f12">Tổng số: <b><?php echo count($categoris) ?></b></div>
            </div>

            <table cellpadding="0" cellspacing="0" width="100%" class="sTable mTable myTable withCheck" id="checkAll">
                <thead>
                    <tr>
                        <td style="width:10px;"><img src="acsset/admin/images/icons/tableArrows.png" /></td>
                        <td style="width:80px;">Mã số</td>
                        <td style="width:80px;">Thư tự hiện thị</td>
                        <td>Tên danh mục</td>
                        <td style="width:100px;">Hành động</td>
                    </tr>
                </thead>

                <tfoot>
                    <tr>
                        <td colspan="7">
                            <div class="list_action itemActions">
                                <a href="#submit" id="submit" class="button blueB" url="">
                                    <span style='color:white;'>Xóa hết</span>
                                </a>
                            </div>

                            <div class='pagination'>
                            </div>
                        </td>
                    </tr>
                </tfoot>

                <tbody>
                    <?php foreach ($categoris as $row) : ?>
                        <tr class="">
                            <td><input type="checkbox" name="id[]" value="" /></td>

                            <td class="textC"><?= $row['id'] ?></td>
                            <td class="textC"><?=$row['sort_order'] ?></td>

                            <td>
                                <span title="<?=$row['name'] ?>" class="tipS">
                                <?=$row['name'] ?>
                                </span>
                            </td>


                            <td class="option">
                                <a href="admin/List-Category/Edit/<?= $row['id'] ?>" title="Chỉnh sửa" class="tipS ">
                                    <img src="acsset/admin/images/icons/color/edit.png" />
                                </a>

                                <a href="admin/List-Category/Delete/<?= $row['id'] ?>" onClick="return confirm('Bạn có muốn xóa?')" title="Xóa" class="tipS verify_action">
                                    <img src="acsset/admin/images/icons/color/delete.png" />
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
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