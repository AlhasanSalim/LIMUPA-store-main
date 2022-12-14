 <!-- single-product-wrap start -->
 <div class="single-product-wrap">
    <div class="product-image">
        <a href="{{ route('product.show', $productOther->slug) }}">
            <img src="{{ $productOther->image_url }}" alt="Li's Product Image">
        </a>
        <span class="sticker">New</span>
    </div>
    <div class="product_desc">
        <div class="product_desc_info">
            <div class="product-review">
                <h5 class="manufacturer">
                    <a href="shop-left-sidebar.html">{{$productOther->category->name}}</a>
                </h5>
                <div class="rating-box">
                    <ul class="rating">
                        <li><i class="fa fa-star-o"></i></li>
                        <li><i class="fa fa-star-o"></i></li>
                        <li><i class="fa fa-star-o"></i></li>
                        <li class="no-star"><i class="fa fa-star-o"></i></li>
                        <li class="no-star"><i class="fa fa-star-o"></i></li>
                    </ul>
                </div>
            </div>
            <h4><a class="product_name" href="{{ route('product.show', $productOther->slug) }}">{{$productOther->name}}</a></h4>
            <div class="price-box">
                <span class="new-price new-price-2">{{ Currency::format($productOther->price) }}</span>
                <span class="old-price">{{ Currency::format($productOther->compare_price) }}</span>
                <span class="discount-percentage">-{{ $productOther->sale_percent }}%</span>
            </div>
        </div>
        <div class="add-actions">
            <ul class="add-actions-link">
                <li class="add-cart active"><a href="#">Add to cart</a></li>
                <li><a class="links-details" href="wishlist.html"><i class="fa fa-heart-o"></i></a></li>
                <li><a href="#" title="quick view" class="quick-view-btn" data-toggle="modal" data-target="#exampleModalCenter"><i class="fa fa-eye"></i></a></li>
            </ul>
        </div>
    </div>
</div>
<!-- single-product-wrap end -->