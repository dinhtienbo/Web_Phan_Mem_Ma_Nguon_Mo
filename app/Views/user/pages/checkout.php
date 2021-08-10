<section id="cart_items">
    <form action="cart/thanhtoan" method="post">
        <div class="container">
            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><a href="#">Home</a></li>
                    <li class="active">Check out</li>
                </ol>
            </div>
            <!--/breadcrums-->

            <div class="step-one">
                <h2 class="heading">Bước 1: Nhập thông tin</h2>
            </div>
            <!--/checkout-options-->


            <!--/register-req-->
            <?php if (session()->get('login')) : ?>

            <?php else : ?>
                <div class="shopper-informations">
                    <div class="row">

                        <div class="col-sm-8 clearfix">
                            <div class="bill-to">
                                <p>Thông tin</p>
                                <div class="form-one">
                                    <input type="text" placeholder="Tên khách hàng" name='name'>

                                    <input type="text" placeholder="Điện thoại *" name="phone">

                                </div>
                                <div class="form-two">

                                    <input type="text" placeholder="Email*" name='email'>
                                    <input type="text" placeholder="Địa chỉ" name='address'>


                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="order-message">
                                <p>Shipping Order</p>
                                <textarea name="message" placeholder="Notes about your order, Special Notes for Delivery" rows="16"></textarea>
                                <label><input type="checkbox"> Shipping to bill address</label>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif; ?>

            <div class="review-payment">
                <h2>Bước 2: Xem lại và thanh toán</h2>
            </div>

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
                                    <p>$<?= $row['price'] ?></p>
                                </td>
                                <td class="cart_quantity">
                                    <div class="cart_quantity_button">
                                        <a class="cart_quantity_up" href="cart/add/<?= $row['id'] ?>"> + </a>
                                        <input class="cart_quantity_input" type="text" name="quantity[]" value="<?= $row['qty'] ?>" autocomplete="off" size="2">
                                        <a class="cart_quantity_down" href="cart/minus/<?= ($row['id']) ?>"> - </a>
                                    </div>
                                </td>
                                <td class="cart_total">
                                    <p class="cart_total_price">$<?= ($row['price'] * $row['qty']) ?></p>
                                </td>
                                <td class="cart_delete">
                                    <a class="cart_quantity_delete" href="cart/remove/<?= ($row['id']) ?>"><i class="fa fa-times"></i></a>
                                </td>
                            </tr>
                        <?php endforeach ?>
                        <tr>
                            <td colspan="4">&nbsp;</td>
                            <td colspan="2">
                                <table class="table table-condensed total-result">
                                    <tr>
                                        <td>Tổng tiền sản phẩm</td>
                                        <td>$ <?= $total ?></td>
                                    </tr>
                                    <tr>
                                        <td>Thuế</td>
                                        <td>0 USD</td>
                                    </tr>
                                    <tr class="shipping-cost">
                                        <td>Tiền vận chuyển</td>
                                        <td>Miễn phí</td>
                                    </tr>
                                    <tr>
                                        <td>Tổng tiền</td>
                                        <td><span>$<?= $total ?></span></td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="payment-options">
                <span >
                    <select name="payment" style="width: 250px;">
                        <option value="">Chọn phương thức thanh toán</option>
                        <option value="paypal">paypal</option>
                        <option value="offline">Thanh toán khi nhận hàng</option>
                    </select>
                </span>
                <span>
                    <label><button type="submit" class="btn btn-warning"> Thanh Toán</button></label>
                </span>
               
            </div>
        </div>
    </form>
</section>
<!--/#cart_items-->