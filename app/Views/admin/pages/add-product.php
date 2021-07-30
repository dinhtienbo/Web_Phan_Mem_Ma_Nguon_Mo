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
                            <img style="margin-top:7px;" src="images/icons/light/home.png" />
                            <span>Trang chủ</span>
                        </a></li>

                    <!-- Logout -->
                    <li><a href="logout">
                            <img src="images/icons/topnav/logout.png" alt="" />
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
                    <li><a href="product/add.html">
                            <img src="images/icons/control/16/add.png" />
                            <span>Thêm mới</span>
                        </a></li>

                    <li>
                        <a href="product/?feature=1.html">
                            <img src="images/icons/control/16/feature.png" />
                            <span>Tiêu biểu</span>
                        </a>
                    </li>

                    <li><a href="product.html">
                            <img src="images/icons/control/16/list.png" />
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
        <form class="form" id="form" action="product/add.html" method="post" enctype="multipart/form-data">
            <fieldset>
                <div class="widget">
                    <div class="title">
                        <img src="images/icons/dark/add.png" class="titleIcon" />
                        <h6>Thêm mới Sản phẩm</h6>
                    </div>

                    <ul class="tabs">
                        <li><a href="#tab1">Thông tin chung</a></li>
                        <li><a href="#tab2">SEO Onpage</a></li>
                        <li><a href="#tab3">Bài viết</a></li>

                    </ul>

                    <div class="tab_container">
                        <div id='tab1' class="tab_content pd0">
                            <div class="formRow">
                                <label class="formLeft" for="param_name">Tên:<span class="req">*</span></label>
                                <div class="formRight">
                                    <span class="oneTwo"><input name="name" id="param_name" _autocheck="true" type="text" /></span>
                                    <span name="name_autocheck" class="autocheck"></span>
                                    <div name="name_error" class="clear error"></div>
                                </div>
                                <div class="clear"></div>
                            </div>

                            <div class="formRow">
                                <label class="formLeft">Hình ảnh:<span class="req">*</span></label>
                                <div class="formRight">
                                    <div class="left"><input type="file" id="image" name="image"></div>
                                    <div name="image_error" class="clear error"></div>
                                </div>
                                <div class="clear"></div>
                            </div>

                            <div class="formRow">
                                <label class="formLeft">Ảnh kèm theo:</label>
                                <div class="formRight">
                                    <div class="left"><input type="file" id="image_list" name="image_list[]" multiple></div>
                                    <div name="image_list_error" class="clear error"></div>
                                </div>
                                <div class="clear"></div>
                            </div>

                            <!-- Price -->
                            <div class="formRow">
                                <label class="formLeft" for="param_price">
                                    Giá :
                                    <span class="req">*</span>
                                </label>
                                <div class="formRight">
                                    <span class="oneTwo">
                                        <input name="price" style='width:100px' id="param_price" class="format_number" _autocheck="true" type="text" />
                                        <img class='tipS' title='Giá bán sử dụng để giao dịch' style='margin-bottom:-8px' src='crown/images/icons/notifications/information.png' />
                                    </span>
                                    <span name="price_autocheck" class="autocheck"></span>
                                    <div name="price_error" class="clear error"></div>
                                </div>
                                <div class="clear"></div>
                            </div>

                            <!-- Price -->
                            <div class="formRow">
                                <label class="formLeft" for="param_discount">
                                    Giảm giá (VNĐ)
                                    <span></span>:
                                </label>
                                <div class="formRight">
                                    <span>
                                        <input name="discount" style='width:100px' id="param_discount" class="format_number" type="text" />
                                        <img class='tipS' title='Số tiền giảm giá' style='margin-bottom:-8px' src='crown/images/icons/notifications/information.png' />
                                    </span>
                                    <span name="discount_autocheck" class="autocheck"></span>
                                    <div name="discount_error" class="clear error"></div>
                                </div>
                                <div class="clear"></div>
                            </div>


                            <div class="formRow">
                                <label class="formLeft" for="param_cat">Thể loại:<span class="req">*</span></label>
                                <div class="formRight">
                                    <select name="cat" _autocheck="true" id='param_cat' class="left">
                                        <option value="">Lựa chọn danh mục</option>
                                        <!-- kiem tra danh muc co danh muc con hay khong -->
                                        <optgroup label="Tivi">
                                            <option value="18">
                                                Toshiba </option>
                                            <option value="17">
                                                Samsung </option>
                                            <option value="16">
                                                Panasonic </option>
                                            <option value="15">
                                                LG </option>
                                            <option value="14">
                                                JVC </option>
                                            <option value="13">
                                                AKAI </option>
                                        </optgroup>

                                        <!-- kiem tra danh muc co danh muc con hay khong -->
                                        <optgroup label="Điện thoại">
                                            <option value="12">
                                                HTC </option>
                                            <option value="11">
                                                BlackBerry </option>
                                            <option value="10">
                                                Asus </option>
                                            <option value="9">
                                                Apple </option>
                                        </optgroup>

                                        <!-- kiem tra danh muc co danh muc con hay khong -->
                                        <optgroup label="Laptop">
                                            <option value="8">
                                                HP </option>
                                            <option value="7">
                                                Dell </option>
                                            <option value="6">
                                                Asus </option>
                                            <option value="5">
                                                Apple </option>
                                            <option value="4">
                                                Acer </option>
                                        </optgroup>

                                    </select>
                                    <span name="cat_autocheck" class="autocheck"></span>
                                    <div name="cat_error" class="clear error"></div>
                                </div>
                                <div class="clear"></div>
                            </div>


                            <!-- warranty -->
                            <div class="formRow">
                                <label class="formLeft" for="param_warranty">
                                    Bảo hành :
                                </label>
                                <div class="formRight">
                                    <span class="oneFour"><input name="warranty" id="param_warranty" type="text" /></span>
                                    <span name="warranty_autocheck" class="autocheck"></span>
                                    <div name="warranty_error" class="clear error"></div>
                                </div>
                                <div class="clear"></div>
                            </div>

                            <div class="formRow">
                                <label class="formLeft" for="param_sale">Tặng quà:</label>
                                <div class="formRight">
                                    <span class="oneTwo"><textarea name="sale" id="param_sale" rows="4" cols=""></textarea></span>
                                    <span name="sale_autocheck" class="autocheck"></span>
                                    <div name="sale_error" class="clear error"></div>
                                </div>
                                <div class="clear"></div>
                            </div>
                            <div class="formRow hide"></div>
                        </div>

                        <div id='tab2' class="tab_content pd0">

                            <div class="formRow">
                                <label class="formLeft" for="param_site_title">Title:</label>
                                <div class="formRight">
                                    <span class="oneTwo"><textarea name="site_title" id="param_site_title" _autocheck="true" rows="4" cols=""></textarea></span>
                                    <span name="site_title_autocheck" class="autocheck"></span>
                                    <div name="site_title_error" class="clear error"></div>
                                </div>
                                <div class="clear"></div>
                            </div>

                            <div class="formRow">
                                <label class="formLeft" for="param_meta_desc">Meta description:</label>
                                <div class="formRight">
                                    <span class="oneTwo"><textarea name="meta_desc" id="param_meta_desc" _autocheck="true" rows="4" cols=""></textarea></span>
                                    <span name="meta_desc_autocheck" class="autocheck"></span>
                                    <div name="meta_desc_error" class="clear error"></div>
                                </div>
                                <div class="clear"></div>
                            </div>

                            <div class="formRow">
                                <label class="formLeft" for="param_meta_key">Meta keywords:</label>
                                <div class="formRight">
                                    <span class="oneTwo"><textarea name="meta_key" id="param_meta_key" _autocheck="true" rows="4" cols=""></textarea></span>
                                    <span name="meta_key_autocheck" class="autocheck"></span>
                                    <div name="meta_key_error" class="clear error"></div>
                                </div>
                                <div class="clear"></div>
                            </div>
                            <div class="formRow hide"></div>
                        </div>

                        <div id='tab3' class="tab_content pd0">
                            <div class="formRow">
                                <label class="formLeft">Nội dung:</label>
                                <div class="formRight">
                                    <textarea name="content" id="param_content" class="editor"></textarea>
                                    <div name="content_error" class="clear error"></div>
                                </div>
                                <div class="clear"></div>
                            </div>
                            <div class="formRow hide"></div>
                        </div>


                    </div><!-- End tab_container-->

                    <div class="formSubmit">
                        <input type="submit" value="Thêm mới" class="redB" />
                        <input type="reset" value="Hủy bỏ" class="basic" />
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