<li class="hm-minicart">
    <div class="hm-minicart-trigger">
        <span class="item-icon"></span>
        <span class="item-text">{{ Currency::format($total) }}
            <span class="cart-item-count">{{ $items->count() }}</span>
        </span>
    </div>
    <span></span>
    <div class="minicart">
        <ul class="minicart-product-list">
            @foreach ($items as $item)
                <li id="{{ $item->id }}">
                    <a href="{{ route('product.show', $item->product->slug) }}" class="minicart-product-image">
                        <img src="{{ $item->product->image_url }}" alt="cart products">
                    </a>
                    <div class="minicart-product-details">
                        <h6><a href="{{ route('product.show', $item->product->slug) }}">{{ $item->product->name }}</a></h6>
                        <span>{{ Currency::format($item->product->price) }} x {{ $item->quantity }}</span>
                    </div>
                    <button class="close" title="Remove" data-id="{{ $item->id }}">
                        <i class="fa fa-close"></i>
                    </button>
                </li>
            @endforeach
        </ul>
        <p class="minicart-total">SUBTOTAL: <span>{{ Currency::format($total) }}</span></p>
        <div class="minicart-button">
            <a href="{{ route('cart.store') }}" class="li-button li-button-fullwidth li-button-dark">
                <span>View Full Cart</span>
            </a>
            <a href="{{route('checkout')}}" class="li-button li-button-fullwidth">
                <span>Checkout</span>
            </a>
        </div>
    </div>
</li>