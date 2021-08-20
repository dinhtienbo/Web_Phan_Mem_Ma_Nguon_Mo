<section id="cart_items">
    <div class="container" style="position: relative;">
       
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
                                    <a href=""><img style="height: 110px; width: 110px;" src="upload/product/<?= $row['image_link'] ?>" alt=""></a>
                                </td>
                                <td class="cart_description">
                                    <h4><a href=""><?= $row['name'] ?></a></h4>

                                </td>
                                <td class="cart_price">
                                    <p><?= ($row['price'] - $row['discount']) ?> USD</p>
                                </td>
                                <td class="cart_quantity">
                                    <?= $row['qty'] ?>
                                </td>
                                <td class="cart_total">
                                    <p class="cart_total_price"><?= ($row['amount'] ) ?> USD</p>
                                </td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </form>
    </div>
</section>
<!--/#cart_items-->