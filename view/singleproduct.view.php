    <!-- Main Container -->
    <div class="main-container col1-layout">
      <div class="container">
        <div class="row">
          <div class="col-main">
            <div class="product-view-area">
              <div class="product-big-image col-xs-12 col-sm-5 col-lg-5 col-md-5">
                <?php if($data['singleProduct']->promotion_price !=0): ?>
                <div class="icon-sale-label sale-left">Sale</div>
                <?php endif ?>
                <div class="large-image">
                  <a href="public/source/images/products-images/<?=$data['singleProduct']->image?>" class="cloud-zoom" id="zoom1" rel="useWrapper: false, adjustY:0, adjustX:20">
                    <img class="zoom-img" src="public/source/images/products-images/<?=$data['singleProduct']->image?>" alt="products"> </a>
                </div>
              </div>
              <div class="col-xs-12 col-sm-7 col-lg-7 col-md-7 product-details-area">

                <div class="product-name">
                  <h1><?=$data['singleProduct']->name?></h1>
                </div>
                <div class="price-box">
                  <?php if($data['singleProduct']->promotion_price !=0): ?>
                  <p class="special-price">
                    <span class="price-label">Giá bán:</span>
                    <span class="price"> <?=number_format($data['singleProduct']->promotion_price)?></span>
                  </p>
                  <p class="old-price">
                    <span class="price-label">Giá gốc:</span>
                    <span class="price"> <?=number_format($data['singleProduct']->price)?> </span>
                  </p>
                <?php else: ?>
                    <p class="special-price">
                    <span class="price-label">Giá bán:</span>
                    <span class="price"> <?=number_format($data['singleProduct']->price)?> </span>
                  </p>
                <?php endif ?>
                </div>

                <div class="short-description">
                  <h2>Giới thiệu sản phẩm</h2>
                  <p><?=$data['singleProduct']->detail?></p>
                </div>

                <div class="product-variation">
                  <form action="#" method="post">
                    <div class="cart-plus-minus">
                      <label for="qty">Số lượng:</label>
                      <div class="numbers-row">
                        <div   class="dec qtybutton" onClick="var result = document.getElementById('qty'); var qty = result.value; if( !isNaN( qty ) && qty > 1) result.value--;return false;">
                          <i class="fa fa-minus">&nbsp;</i>
                        </div>
                        <input type="text" class="qty" title="Qty" value="1" maxlength="12" id="qty" name="qty">
                        <div onClick="var result = document.getElementById('qty'); var qty = result.value; if( !isNaN( qty )) result.value++;return false;"
                          class="inc qtybutton">
                          <i class="fa fa-plus">&nbsp;</i>
                        </div>
                      </div>
                    </div>
                    <button class="button pro-add-to-cart" title="Thêm vào giỏ hàng" type="button" data-id="<?=$data['singleProduct']->id?>">
                      <span>
                        <i class="fa fa-shopping-cart"></i> Thêm vào giỏ hàng</span>
                    </button>
                  </form>
                </div>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Main Container End -->
    <!-- Related Product Slider -->
    <section class="upsell-product-area">
      <div class="container">
        <div class="row">
          <div class="col-xs-12">

            <div class="page-header">
              <h2>Sản phẩm cùng loại</h2>
            </div>
            <div class="slider-items-products">
              <div id="upsell-product-slider" class="product-flexslider hidden-buttons">
                <div class="slider-items slider-width-col4">
                  <?php foreach($data['relatedProduct'] as $product): ?>
                  <div class="product-item">
                    <div class="item-inner fadeInUp">
                      <div class="product-thumbnail">
                        <?php if($product->promotion_price !=0): ?>
                        <div class="icon-sale-label sale-left">Sale</div>
                        <?php endif ?>
                        <?php if($product->new == 1): ?>
                        <div class="icon-new-label new-right">New</div>
                        <?php endif ?>
                        <div class="pr-img-area">
                          <img class="first-img" src="public/source/images/products-images/<?=$product->image?>" alt="">
                          <img class="hover-img" src="public/source/images/products-images/<?=$product->image?>" alt="">
                          <button type="button" class="add-to-cart-mt" data-id="<?=$product->id?>">
                            <i class="fa fa-shopping-cart"></i>
                            <span> Thêm vào giỏ hàng</span>
                          </button>
                        </div>

                      </div>
                      <div class="item-info">
                        <div class="info-inner">
                          <div class="item-title">
                            <a title="<?=$product->name?>" href="<?=$product->id.'-'.$product->url.'.html'?>"><?=$product->name?></a>
                          </div>
                          <div class="item-content">

                            <div class="item-price">
                              <div class="price-box">
                                <?php if($product->promotion_price !=0): ?>
                                <p class="special-price">
                                  <span class="price-label">Giá bán</span>
                                  <span class="price"> <?=number_format($product->promotion_price)?></span>
                                </p>
                                <p class="old-price">
                                  <span class="price-label">Giá gốc:</span>
                                  <span class="price"> <?=number_format($product->price)?></span>
                                </p>
                                <?php else: ?>
                                <p class="special-price">
                                  <span class="price-label">Giá bán:</span>
                                  <span class="price"><?=number_format($product->price)?></span>
                                </p>                
                                <?php endif ?>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                <?php endforeach ?>
                </div>
              </div>
            </div>

          </div>
        </div>
      </div>
    </section>
    <!-- Related Product Slider End -->

      <script>
      $(document).ready(function() {
        $('.pro-add-to-cart').click(function(event) {
            var idSP = $(this).attr('data-id');
            var qty = $('#qty').val();
          //  console.log(qty);
          /* Act on the event */
          $.ajax({
            url: 'shopping_cart.php',
            type: 'POST',
            dataType: 'json',//'default: Intelligent Guess (Other values: xml, json, script, or html)',
            data: {idSP,
                    qty},
          })
          .done(function(res) {
            console.log(res);
           var message = res.message;
            $('.cart-total').html(res.data);
           $('.rs-modal').text(message);
           $('#exampleModal').modal('show');
          })
          .fail(function() {
            console.log("error");
          })
          
        });
      });
  </script>