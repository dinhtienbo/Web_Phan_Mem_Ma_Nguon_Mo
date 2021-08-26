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
    <!-- Common view -->
    <!-- Title area -->
    <div class="titleArea">
        <div class="wrapper">

            <!-- Form -->
            <form enctype="multipart/form-data" method="post" action="" id="form" class="form">
                <fieldset>
                    <div class="widget">
                        <div class="title">
                            <img class="titleIcon" src="acsset/admin/images/icons/dark/add.png">
                            <h6>Cập nhật Slide</h6>
                        </div>

                        <ul class="tabs">
                            <li class="activeTab"><a href="#tab1">Thông tin chung</a></li>
                        </ul>

                        <div class="tab_container">
                            <div class="tab_content pd0" id="tab1" style="display: block;">
                                <div class="formRow">
                                    <label for="param_name" class="formLeft">Tên slide<span class="req">*</span></label>
                                    <div class="formRight">
                                        <span class="oneTwo"><input type="text" _autocheck="true" id="param_name" value="<?php echo $slide->name ?>" name="name"></span>
                                        <span class="autocheck" name="name_autocheck"></span>
                                        <div class="clear error" name="name_error"></div>
                                    </div>
                                    <div class="clear"></div>
                                </div>

                                <div class="formRow">
                                    <label class="formLeft">Hình ảnh:<span class="req">*</span></label>
                                    <div class="formRight">
                                        <div class="left">
                                            <input type="file" name="image" id="image" size="25">
                                            <img src="<?php echo base_url('upload/slide/' . $slide->image_link) ?>" style="width:100px;height:70px">
                                        </div>
                                        <div class="clear error" name="image_error"></div>
                                    </div>
                                    <div class="clear"></div>
                                </div>

                                <div class="formRow">
                                    <label for="param_name" class="formLeft">Link:</label>
                                    <div class="formRight">
                                        <span class="oneTwo"><input type="text" _autocheck="true" id="param_link" value="<?php echo $slide->link ?>" name="link"></span>
                                        <span class="autocheck" name="name_autocheck"></span>
                                        <div class="clear error" name="name_error"></div>
                                    </div>
                                    <div class="clear"></div>
                                </div>

                                <div class="formRow">
                                    <label for="param_name" class="formLeft">Mô tả:</label>
                                    <div class="formRight">
                                        <span class="oneTwo"><input type="text" _autocheck="true" id="param_info" value="<?php echo $slide->info ?>" name="info"></span>
                                        <span class="autocheck" name="name_autocheck"></span>
                                        <div class="clear error" name="name_error"></div>
                                    </div>
                                    <div class="clear"></div>
                                </div>

                                <div class="formRow">
                                    <label for="param_name" class="formLeft">Thứ tự hiển thị:</label>
                                    <div class="formRight">
                                        <span class="oneTwo"><input type="text" _autocheck="true" id="param_sort_order" value="<?php echo $slide->sort_order ?>" name="sort_order"></span>
                                        <span class="autocheck" name="name_autocheck"></span>
                                        <div class="clear error" name="name_error"></div>
                                    </div>
                                    <div class="clear"></div>
                                </div>


                                <div class="formRow hide"></div>
                            </div>


                        </div><!-- End tab_container-->

                        <div class="formSubmit">
                            <input type="submit" class="redB" value="Cập nhật">
                            <input type="reset" class="basic" value="Hủy bỏ">
                        </div>
                        <div class="clear"></div>
                    </div>
                </fieldset>
            </form>
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