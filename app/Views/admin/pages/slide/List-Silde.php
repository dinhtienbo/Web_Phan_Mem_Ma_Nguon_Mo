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
    <!-- Common view -->
    <!-- Title area -->
    <div class="titleArea">
    <div class="widget">
	
    <div class="title">
        <span class="titleIcon"><input type="checkbox" name="titleCheck" id="titleCheck"></span>
        <h6>
            Danh sách slide
        </h6>
         <div class="num f12">Số lượng: <b><?= count($list) ?></b></div>
    </div>
    
    <table width="100%" cellspacing="0" cellpadding="0" id="checkAll" class="sTable mTable myTable">
        
        <thead>
            <tr>
                <td style="width:21px;"><img src="acsset/admin/images/icons/tableArrows.png"></td>
                <td style="width:60px;">Mã số</td>
                <td>Tiêu đề</td>
                <td style="width:75px;">Thứ tự</td>
                <td style="width:120px;">Hành động</td>
            </tr>
        </thead>
        
         <tfoot class="auto_check_pages">
            <tr>
                <td colspan="6">
                     <div class="list_action itemActions">
                            <a url="" class="button blueB" id="submit" href="#submit">
                                <span style="color:white;">Xóa hết</span>
                            </a>
                     </div>
                        
                </td>
            </tr>
        </tfoot>
        
        <tbody class="list_item">
             <?php foreach ($list as $row):?>
             <tr class="row_<?=$row['id'] ?>">
                <td><input type="checkbox" value="<?=$row['id'] ?>" name="id[]"></td>
                
                <td class="textC"><?= $row['id']?></td>
                
                <td>
                <div class="image_thumb">
                    <img height="50" src="/slide/<?= $row['image_link'] ?>">
                    <div class="clear"></div>
                </div>
                
                <a target="_blank" title="" class="tipS" href="">
                    <b><?=$row['name'] ?></b>
                </a>
                
                </td>
                <td><?=$row['sort_order'] ?></td>
                
                <td class="option textC">
                    
                     
                     <a class="tipS" title="Chỉnh sửa" href="admin/List-Slide/Edit/<?= $row['id']?>">
                        <img src="acsset/admin/images/icons/color/edit.png">
                    </a>
                    
                    <a class="tipS verify_action" title="Xóa" href="admin/List-Slide/Delete/<?= $row['id']?>" onClick="return confirm('Bạn có muốn xóa?')">
                        <img src="acsset/admin/images/icons/color/delete.png">
                    </a>
                </td>
            </tr>
            <?php endforeach;?>
       </tbody>
        
    </table>
</div>
    </div>
    <div class="line"></div>

    <!-- Message -->


    <!-- Footer -->
    <div id="footer">
        <div class="wrapper">
            <div>Bản quyền yasuo</div>
        </div>
    </div>
</div>