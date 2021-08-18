<div class="col-sm-9 padding-right">
    <div class="features_items">
      <!--features_items-->
      <h2 class="title text-center">Sản phẩm mới</h2>
        <?php foreach ($newProducts as $row) : ?>
            <div class="col-sm-4">
                <div class="product-image-wrapper">
                    <div class="single-products">
                        <div class="productinfo text-center">
                            <img src="upload/product/<?= $row['image_link']?>" width="245" height="249" alt="" />
                            <h2>$<?= ($row['price'] - $row['discount'])?></h2>
                            <p><?= $row['name'] ?></p>
                            <a href="cart/add/<?= $row['id'] ?>" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                        </div>
                        <div class="product-overlay">
                            <div class="overlay-content">
                                <h2><?php if ($row['discount'] > 0) : ?>
                                        <?php $price_new = $row['price']  - $row['discount']; ?>
                                        <b>$<?php echo number_format($price_new) ?></b>
                                        <p style="text-decoration:line-through">$ <?php echo number_format($row['price']) ?></p>
                                    <?php else : ?>
                                        <b>$<?php echo number_format($row['price']) ?></b>
                                        <?php endif; ?>
                                </h2>
                                <p><a href="product/product-detail/<?= $row['meta_key'] ?>"><?= $row['name'] ?></a></p>
                                <a href="cart/add/<?= $row['id'] ?>" class=" btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                            </div>
                        </div>
                    </div>
                    <div class="choose">
                        <ul class="nav nav-pills nav-justified">
                            <li><a href="#"><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
                            <li><a href="#"><i class="fa fa-plus-square"></i>Add to compare</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        <?php endforeach ?>
    </div>
    <!--features_items-->

    <div class="category-tab">
        <!--category-tab-->
        <div class="col-sm-12">
            <ul class="nav nav-tabs">
                <li><a href="#Sanpham" data-toggle="tab">Sản phẩm bán chạy</a></li>
                <li><a href="#Sanphamluot" data-toggle="tab">Sản phẩm có lượt xem cao</a></li>
            </ul>
        </div>
        <div class="tab-content">
            <div class="tab-pane fade active in" id="Sanpham">
            <?php foreach($buyProducts as $row) :?>
                <div class="col-sm-3">
                    <div class="product-image-wrapper">
                        <div class="single-products">
                            <div class="productinfo text-center">
                                <img  src="upload/product/<?= $row['image_link']?>" width="122" height="124" />
                                <h2>$<?= ($row['price'] - $row['discount'])?></h2>
                                <p><a href="product/product-detail/<?= $row['meta_key'] ?>"><?= $row['name'] ?></a></p>
                                <a href="cart/add/<?= $row['id'] ?>" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                            </div>

                        </div>
                    </div>
                </div>
                <?php endforeach ?>
               
            </div>

            <div class="tab-pane fade" id="Sanphamluot">
            <?php foreach($viewProducts as $row) :?>
                <div class="col-sm-3">
                    <div class="product-image-wrapper">
                        <div class="single-products">
                            <div class="productinfo text-center">
                                <img  src="upload/product/<?= $row['image_link']?>" width="122" height="124" />
                                <h2>$<?= ($row['price'] - $row['discount'])?></h2>
                                <p><a href="product/product-detail/<?= $row['meta_key'] ?>"><?= $row['name'] ?></a></p>
                                <a href="cart/add/<?= $row['id'] ?>" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                            </div>

                        </div>
                    </div>
                </div>
                <?php endforeach ?>
               
            </div>

           
        </div>
    </div>
    <!--/category-tab-->
    <!--/recommended_items-->

</div>