<section id="cart_items">
    <div class="container" style="position: relative;">
        <div class="breadcrumbs">
            <ol class="breadcrumb">
                <li><a href="#">Home</a></li>
                <li class="active">Shopping Cart</li>
            </ol>
        </div>
        <form action="cart/upload" method="post">
            <div class="table-responsive cart_info">
                <table class="table table-condensed">
                    <thead>
                        <tr class="cart_menu">
                            <td class="image">Ảnh sản phẩm</td>
                            <td class="description">Tên sản phẩm</td>
                            <td class="price">Giá</td>
                            <td class="quantity">Số lượng</td>
                            <td class="total">Tổng tiền</td>
                            <td></td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($items as $row) : ?>
                            <tr>
                                <td class="cart_product">
                                    <a href=""><img style="height: 110px; width: 110px;" src="upload/product/<?= $row['image'] ?>" alt=""></a>
                                </td>
                                <td class="cart_description">
                                    <h4><a href=""><?= $row['name'] ?></a></h4>

                                </td>
                                <td class="cart_price">
                                    <p><?= $row['price'] ?> USD</p>
                                </td>
                                <td class="cart_quantity">
                                    <div class="cart_quantity_button">
                                        <a class="cart_quantity_up" href="cart/add/<?= $row['id'] ?>"> + </a>
                                        <input class="cart_quantity_input" type="text" name="quantity[]" value="<?= $row['qty'] ?>" autocomplete="off" size="2">
                                        <a class="cart_quantity_down" href="cart/minus/<?=$row['id']?>"> - </a>
                                    </div>
                                </td>
                                <td class="cart_total">
                                    <p class="cart_total_price"><?= ($row['price'] * $row['qty']) ?> USD</p>
                                </td>
                                <td class="cart_delete">
                                    <a class="cart_quantity_delete" href="cart/remove/<?= ($row['id']) ?>"><i class="fa fa-times"></i></a>
                                </td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
            <div style="position: absolute; right: 12px; margin-top: -40px;">
                <button type="submit" class="btn btn-warning"> Cập nhật</button>
                <button class="btn btn-warning" ><a href = "cart/checkout"  style="color:white;">Checkout</a></button>
            </div>
        </form>
    </div>
</section>
<!--/#cart_items-->