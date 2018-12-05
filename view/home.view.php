    <!-- Home Slider Start -->
    <div class="slider">
      <div class="tp-banner-container clearfix">
        <div class="tp-banner">
          <ul>
            <!-- SLIDE 1 -->
            <?php foreach ($data['slide'] as $slide):?>
               <li data-transition="slidehorizontal" data-slotamount="5" data-masterspeed="700">
              <!-- MAIN IMAGE -->
              <img src="public/source/images/slider/<?=$slide->image?>" alt="slidebg1" data-bgfit="cover" data-bgposition="center center" data-bgrepeat="no-repeat">
              <!-- LAYERS -->
              <!-- LAYER NR. 1 -->
              <div class="tp-caption very_big_white skewfromrightshort fadeout" data-x="center" data-y="100" data-speed="500" data-start="1200"
                data-easing="Circ.easeInOut" style=" font-size:70px; font-weight:800; color:#fe0100;">Big
                <span style=" color:#000;">sale</span>
              </div>

              <!-- LAYER NR. 2 -->
              <div class="tp-caption tp-caption medium_text skewfromrightshort fadeout" data-x="center" data-y="165" data-hoffset="0" data-voffset="-73"
                data-speed="500" data-start="1200" data-easing="Power4.easeOut" style=" font-size:20px; font-weight:500; color:#337ab7;">
              <?=$slide->title?> </div>

              <!-- LAYER NR. 3 -->
              <div class="tp-caption customin tp-resizeme rs-parallaxlevel-0" data-x="center" data-y="210" data-hoffset="0" data-voffset="98"
                data-customin="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0;scaleY:0;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
                data-speed="500" data-start="1500" data-easing="Power3.easeInOut" data-splitin="none" data-splitout="none"
                data-elementdelay="0.1" data-endelementdelay="0.1" data-linktoslide="next" style="border: 2px solid #fed700;border-radius: 50px; font-size:14px; background-color:#fed700; color:#333; z-index: 12; max-width: auto; max-height: auto; white-space: nowrap; letter-spacing:1px;">
                <a href="<?=$slide->image?>" class='largebtn slide1'>Xem thêm</a>
              </div>
             <?php endforeach?>
           
            </li>
          </ul>
        </div>
      </div>
    </div>

    <!-- main container -->
    <div class="main-container col1-layout">
      <div class="container">
        <div class="row">

          <!-- Home Tabs  -->
          <div class="col-sm-12 col-md-12 col-xs-12">
            <div class="home-tab">
              <ul class="nav home-nav-tabs home-product-tabs">
                <li class="active">
                  <a href="#featured" data-toggle="tab" aria-expanded="false">Sản phẩm nổi bật</a>
                </li>
                <li class="divider"></li>
                <li>
                  <a href="#top-sellers" data-toggle="tab" aria-expanded="false">Sản phẩm mới</a>
                </li>
              </ul>
              <div id="productTabContent" class="tab-content">
                <div class="tab-pane active in" id="featured">
                  <div class="featured-pro">
                    <div class="slider-items-products">
                      <div id="featured-slider" class="product-flexslider hidden-buttons">
                        <div class="slider-items slider-width-col4">

                          <?php foreach($data['specialProduct'] as $product): ?>
                          <div class="product-item full-skins">
                            <div class="item-inner">
                              <div class="product-thumbnail">
                                <?php if($product->promotion_price !=0): ?>
                                <div class="icon-sale-label sale-left">Sale</div>
                              <?php endif ?>
                                <?php if($product->new ==1): ?>
                                <div class="icon-new-label new-right">New</div>
                              <?php endif ?>
                                <div class="pr-img-area">
                                  <a title="<?=$product->name?>"  href="<?=$product->id.'-'.$product->url.'.html'?>" target="_blank">
                                    <figure>
                                      <img class="first-img" src="public/source/images/products-images/<?=$product->image?>" alt="html template">
                                      <img class="hover-img" src="public/source/images/products-images/<?=$product->image?>" alt="html template">
                                    </figure>
                                  </a>
                                  <button type="button" class="add-to-cart-mt" data-id="<?=$product->id?>">
                                    <i class="fa fa-shopping-cart"></i>
                                    <span> Thêm vào giỏ hàng</span>
                                  </button>
                                </div>
                              </div>
                              <div class="item-info">
                                <div class="info-inner">
                                  <div class="item-title">
                                    <a title="<?=$product->name?>" href="<?=$product->id.'-'.$product->url.'.html'?>" target="_blank"><?=$product->name?> </a>
                                  </div>
                                  <div class="item-content">
                                    <div class="item-price">
                                      <div class="price-box">
                                        <?php if($product->promotion_price !=0):?>
                                        <p class="special-price">
                                          <span class="price-label">Giá khuyến mãi:</span>
                                          <span class="price"> <?=number_format($product->promotion_price)?></span>
                                        </p>
                                        <p class="old-price">
                                          <span class="price-label">Giá gốc:</span>
                                          <span class="price"> <?=number_format($product->price)?></span>
                                        </p>
                                      <?php else: ?>
                                        <p class="special-price">
                                          <span class="price-label">Giá khuyến mãi:</span>
                                          <span class="price"> <?=$product->price?></span>
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
                <div class="tab-pane fade" id="top-sellers">
                  <div class="top-sellers-pro">
                    <div class="slider-items-products">
                      <div id="top-sellers-slider" class="product-flexslider hidden-buttons">
                        <div class="slider-items slider-width-col4 ">
                          <?php foreach($data['newProduct'] as $newProduct): ?>
                          <div class="product-item">
                            <div class="item-inner">
                              <div class="product-thumbnail">
                                <?php if($newProduct->promotion_price !=0): ?>
                                  <div class="icon-sale-label sale-left">Sale</div>
                                <?php endif ?>
                                <?php if($newProduct->new ==1): ?>
                                  <div class="icon-new-label new-right">New</div>
                                <?php endif ?>
                                <div class="pr-img-area">
                                  <a title="<?=$newProduct->name?>" href="<?=$newProduct->id.'-'.$newProduct->url.'.html'?>">
                                    <figure>
                                      <img class="first-img" src="public/source/images/products-images/<?=$newProduct->image?>" alt="html template">
                                      <img class="hover-img" src="public/source/images/products-images/<?=$newProduct->image?>" alt="html template">
                                    </figure>
                                  </a>
                                  <button type="button" class="add-to-cart-mt" data-id="<?=$newProduct->id?>">
                                    <i class="fa fa-shopping-cart"></i>
                                    <span>Thêm vào giỏ hàng</span>
                                  </button>
                                </div>

                              </div>
                              <div class="item-info">
                                <div class="info-inner">
                                  <div class="item-title">
                                    <a title="<?=$newProduct->name?>" href="<?=$newProduct->id.'-'.$newProduct->url.'.html'?>"><?=$newProduct->name?></a>
                                  </div>
                                  <div class="item-content">

                                    <div class="item-price">
                                      <div class="price-box">
                                        <?php if($newProduct->promotion_price !=0): ?>
                                        <p class="special-price">
                                          <span class="price-label">Giá bán:</span>
                                          <span class="price"><?=number_format($newProduct->promotion_price)?></span>
                                        </p>
                                        <p class="old-price">
                                          <span class="price-label">Giá cũ:</span>
                                          <span class="price"><?=number_format($newProduct->price)?></span>
                                        </p>
                                      <?php else: ?>
                                          <p class="special-price">
                                          <span class="price-label">Giá bán:</span>
                                          <span class="price"><?=number_format($newProduct->promotion_price)?></span>
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
            </div>
          </div>

        </div>
      </div>
    </div>
    <!-- end main container -->

    <!--special-products-->

    <div class="container">
      <div class="special-products">
        <div class="page-header">
          <h2>Sản phẩm bán chạy</h2>
        </div>
        <div class="special-products-pro">
          <div class="slider-items-products">
            <div id="special-products-slider" class="product-flexslider hidden-buttons">
              <div class="slider-items slider-width-col4">
                <?php $k=0; ?>
                <?php foreach($data['hotProduct'] as $hotProduct):
                if($k++>=15) break; ?>

                <div class="product-item">
                  <div class="item-inner">
                    <div class="product-thumbnail">
                      <?php if($hotProduct->promotion_price !=0): ?>
                      <div class="icon-sale-label sale-left">Sale</div>
                      <?php endif ?>
                      <?php if($hotProduct->new ==1): ?>
                      <div class="icon-new-label new-right">New</div>
                      <?php endif ?>
                      <div class="pr-img-area">
                        <a title="<?=$hotProduct->name?>" href="<?=$hotProduct->id.'-'.$hotProduct->url.'.html'?>">
                          <figure>
                            <img class="first-img" src="public/source/images/products-images/<?=$hotProduct->image?>" alt="html template">
                            <img class="hover-img" src="public/source/images/products-images/<?=$hotProduct->image?>" alt="html template">
                          </figure>
                        </a>
                        <button type="button" class="add-to-cart-mt" data-id="<?=$hotProduct->id?>">
                          <i class="fa fa-shopping-cart"></i>
                          <span>Thêm vào giỏ hàng</span>
                        </button>
                      </div>

                    </div>
                    <div class="item-info">
                      <div class="info-inner">
                        <div class="item-title">
                          <a title="<?=$hotProduct->name?>" href="<?=$hotProduct->id.'-'.$hotProduct->url.'.html'?>"><?=$hotProduct->name?> </a>
                        </div>
                        <div class="item-content">
                          <div class="item-price">
                            <div class="price-box">
                              <?php if($hotProduct->promotion_price !=0): ?>
                              <p class="special-price">
                                <span class="price-label">Giá bán: </span>
                                <span class="price"> <?=number_format($hotProduct->promotion_price)?> </span>
                              </p>
                              <p class="old-price">
                                <span class="price-label">Giá cũ:</span>
                                <span class="price"><?=number_format($hotProduct->price)?></span>
                              </p>
                              <?php else: ?>
                                <p class="special-price">
                                <span class="price-label">Giá bán: </span>
                                <span class="price"> <?=number_format($hotProduct->price)?> </span>
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
    <!-- category area start -->
    <div class="jtv-category-area">
      <div class="container">
        <div class="row">
          <div class="col-md-4 col-sm-6">
            <div class="jtv-single-cat">
              <h2 class="cat-title">Phụ kiện giá rẻ</h2>
              <?php $i = 0; ?>
              <?php foreach($data['type6Product'] as $type6Product): 
                  if($i++ >= 3) break;  ?>
               
              <div class="jtv-product jtv-cat-margin">
                <div class="product-img">
                  <a href="<?=$type6Product->id.'-'.$type6Product->url.'.html'?>">
                    <img src="public/source/images/products-images/<?=$type6Product->image?>" alt="html template">
                    <img class="secondary-img" src="public/source/images/products-images/<?=$type6Product->image?>" alt="html template"> </a>
                </div>
                <div class="jtv-product-content">
                  <h3>
                    <a href="<?=$type6Product->id.'-'.$type6Product->url.'.html'?>"><?=$type6Product->name?></a>
                  </h3>
                  <div class="price-box">
                    <?php if($type6Product->promotion_price !=0): ?>
                    <p class="special-price">
                      <span class="price-label">Giá bán:</span>
                      <span class="price"><?=number_format($type6Product->promotion_price)?></span>
                    </p>
                    <p class="old-price">
                      <span class="price-label">Giá gốc:</span>
                      <span class="price"><?=number_format($type6Product->price)?></span>
                    </p>
                    <?php else: ?>
                    <p class="special-price">
                      <span class="price-label">Giá bán:</span>
                      <span class="price"><?=number_format($type6Product->price)?></span>
                    </p>
                    <?php endif ?>
                  </div>
                  <div class="jtv-product-action">
                    <div class="jtv-extra-link">
                      <div class="button-cart">
                        <button>
                          <i class="fa fa-shopping-cart"></i>
                        </button>
                      </div>
                      
                    </div>
                  </div>
                </div>
              </div>
              
              <?php endforeach ?>
            </div>
          </div>
          <div class="col-md-4 col-sm-6">
            <div class="jtv-single-cat">
              <h2 class="cat-title">Sản phẩm giảm giá</h2>
              <?php $j = 0 ?>
              <?php foreach($data['saleProduct'] as $saleProduct):
                if($j++ >=3) break; ?>
              <div class="jtv-product jtv-cat-margin">
                <div class="product-img">
                  <a href="<?=$saleProduct->id.'-'.$saleProduct->url.'.html'?>">
                    <img src="public/source/images/products-images/<?=$saleProduct->image?>" alt="html template">
                    <img class="secondary-img" src="public/source/images/products-images/<?=$saleProduct->image?>" alt="html template"> </a>
                </div>
                <div class="jtv-product-content">
                  <h3>
                    <a href="<?=$saleProduct->id.'-'.$saleProduct->url.'.html'?>"><?=$saleProduct->name?></a>
                  </h3>
                  <div class="price-box">
                    <?php if($saleProduct->promotion_price !=0): ?>
                    <p class="special-price">
                      <span class="price-label">Giá bán: </span>
                      <span class="price"> <?=number_format($saleProduct->promotion_price)?> </span>
                    </p>
                    <p class="old-price">
                      <span class="price-label">Giá gốc:</span>
                      <span class="price"> <?=number_format($saleProduct->price)?> </span>
                    </p>
                    <?php else: ?>
                    <p class="special-price">
                      <span class="price-label">Giá bán: </span>
                      <span class="price"><?=number_format($saleProduct->price)?></span>
                    </p>
                    <?php endif ?>
                  </div>
                  <div class="jtv-product-action">
                    <div class="jtv-extra-link">
                      <div class="button-cart">
                        <button>
                          <i class="fa fa-shopping-cart"></i>
                        </button>
                      </div>
                      
                    </div>
                  </div>
                </div>
              </div>
              <?php endforeach ?>
            </div>
          </div>

          <!-- service area start -->
          <div class="col-md-4 col-sm-12 col-xs-12">
            <div class="jtv-service-area">

              <!-- jtv-single-service start -->

              <div class="jtv-single-service">
                <div class="service-icon">
                  <img alt="html template" src="public/source/images/customer-service-icon.png"> </div>
                <div class="service-text">
                  <h2>Dịch vụ khách hàng 24/7</h2>
                  <p>
                    <span>Đặt hàng (028) 2620 2620</span>
                  </p>
                </div>
              </div>
              <div class="jtv-single-service">
                <div class="service-icon">
                  <img alt="html template" src="public/source/images/shipping-icon.png"> </div>
                <div class="service-text">
                  <h2>Miễn phí giao hàng</h2>
                  <p>
                    <span>Miễn phí giao hàng toàn quốc</span>
                  </p>
                </div>
              </div>
              <div class="jtv-single-service">
                <div class="service-icon">
                  <img alt="html template" src="public/source/images/guaratee-icon.png"> </div>
                <div class="service-text">
                  <h2>Góp ý than phiền</h2>
                  <p>
                    <span>Vui lòng gửi email HTKH@gmail.com</span>
                  </p>
                </div>
              </div>

              <!-- jtv-single-service end -->

            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- category-area end -->