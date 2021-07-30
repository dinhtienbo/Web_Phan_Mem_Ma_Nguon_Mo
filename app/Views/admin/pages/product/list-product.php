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
                    <li><a href="admin/home/logout.html">
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
                var main = $('#main_product');

                // Tips
                main.find('.tipN').tipsy({
                    gravity: 'n',
                    fade: false,
                    html: true
                });
                main.find('.tipS').tipsy({
                    gravity: 's',
                    fade: false,
                    html: true
                });
                main.find('.tipW').tipsy({
                    gravity: 'w',
                    fade: false,
                    html: true
                });
                main.find('.tipE').tipsy({
                    gravity: 'e',
                    fade: false,
                    html: true
                });

                // Tooltip
                main.find('[_tooltip]').nstUI({
                    method: 'tooltip'
                });
            });
        })(jQuery);
    </script>
    <!-- Common view -->
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
                    <li><a href="admin/List-Product/Add">
                            <img src="acsset/admin/images/icons/control/16/add.png" />
                            <span>Thêm mới</span>
                        </a></li>

                    <li>
                        <a href="admin/product/?feature=1.html">
                            <img src="acsset/admin/images/icons/control/16/feature.png" />
                            <span>Tiêu biểu</span>
                        </a>
                    </li>

                    <li><a href="admin/List-Product">
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
    <div class="wrapper" id="main_product">
        <div class="widget">

            <div class="title">
                <span class="titleIcon"><input type="checkbox" id="titleCheck" name="titleCheck" /></span>
                <h6>
                    Danh sách sản phẩm </h6>
                <div class="num f12">Số lượng: <?= count($product) ?></b></div>
            </div>

            <table cellpadding="0" cellspacing="0" width="100%" class="sTable mTable myTable" id="checkAll">

                <thead class="filter">
                    <tr>
                        <td colspan="6">
                            <form class="list_filter form" action="admin/List-Product/Search" method="post">
                                <table cellpadding="0" cellspacing="0" width="80%">
                                    <tbody>

                                        <tr>
                                            <td class="label" style="width:40px;"><label for="filter_id">Mã số</label></td>
                                            <td class="item"><input name="id" value="" id="filter_id" type="text" style="width:55px;" /></td>

                                            <td class="label" style="width:40px;"><label for="filter_id">Tên</label></td>
                                            <td class="item" style="width:155px;"><input name="name" value="" id="filter_iname" type="text" style="width:155px;" /></td>

                                            <td class="label" style="width:60px;"><label for="filter_status">Thể loại</label></td>
                                            <td class="item">
                                                <select name="catalog">
                                                    <option value=""></option>
                                                    <!-- kiem tra danh muc co danh muc con hay khong -->
                                                    <?php foreach ($catalogs as $row) : ?>
                                                        <?php if (count($row->subs) >= 1) : ?>
                                                            <optgroup label="<?php echo $row->name ?>">
                                                                <?php foreach ($row->subs as $sub) : ?>
                                                                    <option value="<?php echo $sub->id ?>"> <?php echo $sub->name ?> </option>
                                                                <?php endforeach; ?>
                                                            </optgroup>
                                                        <?php else : ?>
                                                            <option value="<?php echo $row->id ?>" ><?php echo $row->name ?></option>
                                                        <?php endif; ?>
                                                    <?php endforeach; ?>
                                                </select>
                                            </td>

                                            <td style='width:150px'>
                                                <input type="submit" class="button blueB" value="Lọc" />
                                                <input type="reset" class="basic" value="Reset" onclick="window.location.href = 'admin/List-Product'; ">
                                            </td>

                                        </tr>
                                    </tbody>
                                </table>
                            </form>
                        </td>
                    </tr>
                </thead>

                <thead>
                    <tr>
                        <td style="width:21px;"><img src="acsset/admin/images/icons/tableArrows.png" /></td>
                        <td style="width:60px;">Mã số</td>
                        <td>Tên</td>
                        <td>Giá</td>
                        <td style="width:75px;">Ngày tạo</td>
                        <td style="width:120px;">Hành động</td>
                    </tr>
                </thead>

                <tfoot class="auto_check_pages">
                    <tr>
                        <td colspan="6">
                            <div class="list_action itemActions">
                                <a href="#submit" id="submit" class="button blueB" url="admin/product/del_all.html">
                                    <span style='color:white;'>Xóa hết</span>
                                </a>
                            </div>

                            <div class='pagination'>
                            </div>
                        </td>
                    </tr>
                </tfoot>

                <tbody class="list_item">
                    <?php foreach ($product as $row) : ?>
                        <tr class='row_<?= $row->id ?>'>
                            <td><input type="checkbox" name="id[]" value="9" /></td>

                            <td class="textC"><?= $row->id ?></td>

                            <td>
                                <div class="image_thumb">
                                    <img src="/upload/product/<?= $row->image_link ?>" height="50">
                                    <div class="clear"></div>
                                </div>

                                <a href="product/view/9.html" class="tipS" title="" target="_blank">
                                    <b><?= $row->name ?></b>
                                </a>

                                <div class="f11">
                                    Đã bán: <?= $row->buyed ?> | Xem: <?= $row->view ?> </div>

                            </td>

                            <td class="textR">
                                <?php if ($row->discount > 0) : ?>
                                    <?php $price_new = $row->price - $row->discount; ?>
                                    <b style="color:red"><?php echo number_format($price_new) ?> đ</b>
                                    <p style="text-decoration:line-through"><?php echo number_format($row->price) ?> đ</p>
                                <?php else : ?>
                                    <b style="color:red"><?php echo number_format($row->price) ?> đ</b>
                                <?php endif; ?>
                            </td>

                            <td class="textC"><?= $row->created ?></td>

                            <td class="option textC">
                                <a href="" title="Gán là nhạc tiêu biểu" class="tipE">
                                    <img src="acsset/admin/images/icons/color/star.png" />
                                </a>
                                <a href="product/view/9.html" target='_blank' class='tipS' title="Xem chi tiết sản phẩm">
                                    <img src="acsset/admin/images/icons/color/view.png" />
                                </a>
                                <a href="admin/List-Product/Edit/<?= $row->id ?>" title="Chỉnh sửa" class="tipS">
                                    <img src="acsset/admin/images/icons/color/edit.png" />
                                </a>

                                <a href="admin/List-Product/Delete/<?= $row->id ?>" onClick="return confirm('Bạn có muốn xóa?')" title="Xóa" class="tipS verify_action">
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
            <div>Bản quyền thuộc yasuo</div>
        </div>
    </div>
</div>