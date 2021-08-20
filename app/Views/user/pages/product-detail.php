<div class="col-sm-9 padding-right">
    <div class="product-details">
        <!--product-details-->
        <div class="col-sm-5">
            <div class="view-product">
                <img src="upload/product/<?= $product['image_link'] ?>" width="245" height="249" alt="" />
                <h3>ZOOM</h3>
            </div>
            <div id="similar-product" class="carousel slide" data-ride="carousel">

                <!-- Wrapper for slides -->
                <div class="carousel-inner">
                    <div class="item active">
                        <?php foreach ($list as $row) : ?>
                            <img src="upload/product/<?= $row ?>" width="65" height="65" alt="">
                        <?php endforeach ?>
                    </div>
                    <div class="item">
                        <?php foreach ($list as $row) : ?>
                            <img src="upload/product/<?= $row ?>" width="65" height="65" alt="">
                        <?php endforeach ?>
                    </div>
                    <div class="item">
                        <?php foreach ($list as $row) : ?>
                            <img src="upload/product/<?= $row ?>" width="65" height="65" alt="">
                        <?php endforeach ?>
                    </div>

                </div>

                <!-- Controls -->
                <a class="left item-control" href="#similar-product" data-slide="prev">
                    <i class="fa fa-angle-left"></i>
                </a>
                <a class="right item-control" href="#similar-product" data-slide="next">
                    <i class="fa fa-angle-right"></i>
                </a>
            </div>

        </div>
        <div class="col-sm-7">
            <div class="product-information">
                <!--/product-information-->
                <img src="acsset/user/images/product-details/new.jpg" class="newarrival" alt="" />
                <h2><?= $product['name'] ?></h2>

                <img src="acsset/user/images/product-details/rating.png" alt="" />
                <span>
                    <span> <?php if ($product['discount'] > 0) : ?>
                            <?php $price_new = $product['price'] - $product['discount']; ?>
                            $<?php echo number_format($price_new) ?></b>

                        <?php else : ?>
                            <?php echo number_format($product['price']) ?> đ</b>
                        <?php endif; ?>
                    </span>

                    <button type="button" class="btn btn-fefault cart">
                        <a href="cart/add/<?= $product['id'] ?>">
                            <i class="fa fa-shopping-cart"></i>
                            Add to cart
                        </a>
                    </button>
                </span>
                <p><b>Lượt xem:</b><?= $product['view'] ?></p>
                <p><b>Lượt mua:</b> <?= $product['buyed'] ?></p>

                <a href=""><img src="acsset/user/images/product-details/share.png" class="share img-responsive" alt="" /></a>
            </div>
            <!--/product-information-->
        </div>
    </div>
    <!--/product-details-->

    <div class="category-tab shop-details-tab">
        <!--category-tab-->
        <div class="col-sm-12">
            <ul class="nav nav-tabs">
                <li><a href="#details" data-toggle="tab">Miêu tả</a></li>

                <li class="active"><a href="#reviews" data-toggle="tab">Đánh giá</a></li>
            </ul>
        </div>
        <div class="tab-content">
            <div class="tab-pane fade" id="details">
                <textarea><?= $product['content'] ?></textarea>
            </div>


            <div class="tab-pane fade active in" id="reviews">
                <div class="col-sm-12">
                    <ul>
                        <li><a href=""><i class="fa fa-user"></i>EUGEN</a></li>
                        <li><a href=""><i class="fa fa-clock-o"></i>12:41 PM</a></li>
                        <li><a href=""><i class="fa fa-calendar-o"></i>31 DEC 2014</a></li>
                    </ul>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
                    <p><b>Write Your Review</b></p>

                    <form action="#">
                        <span>
                            <input type="text" placeholder="Your Name" />
                            <input type="email" placeholder="Email Address" />
                        </span>
                        <textarea name=""></textarea>
                        <b>Rating: </b> <img src="acsset/user/images/product-details/rating.png" alt="" />
                        <button type="button" class="btn btn-default pull-right">
                            Submit
                        </button>
                    </form>
                </div>
            </div>

        </div>
    </div>
    <!--/category-tab-->

    <div class="recommended_items">
        <!--recommended_items-->
        <h2 class="title text-center">recommended items</h2>

        <div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="item active">
                    <?php foreach ($productTitle as $row) : ?>
                        <div class="col-sm-4">
                            <div class="product-image-wrapper">
                                <div class="single-products">
                                    <div class="productinfo text-center">
                                        <img src="upload/product/<?= $row['image_link'] ?>" alt="" />
                                        <h2>$<?= ($row['price'] - $row['discount']) ?></h2>
                                        <p><?= $row['name'] ?></p>
                                        <button type="button" class="btn btn-default add-to-cart"><a href="cart/add/<?= $row['id'] ?>"><i class="fa fa-shopping-cart"></i>Add to cart</a></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach ?>
                </div>
                <div class="item">
                    <?php foreach ($productTitle as $row) : ?>
                        <div class="col-sm-4">
                            <div class="product-image-wrapper">
                                <div class="single-products">
                                    <div class="productinfo text-center">
                                        <img src="upload/product/<?= $row['image_link'] ?>" alt="" />
                                        <h2>$<?= ($row['price'] - $row['discount']) ?></h2>
                                        <p><?= $row['name'] ?></p>
                                        <button type="button" class="btn btn-default add-to-cart"><a href="cart/add/<?= $row['id'] ?>"><i class="fa fa-shopping-cart"></i>Add to cart</a></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach ?>
                </div>
            </div>
            <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
                <i class="fa fa-angle-left"></i>
            </a>
            <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
                <i class="fa fa-angle-right"></i>
            </a>
        </div>
    </div>
    <!--/recommended_items-->

</div>