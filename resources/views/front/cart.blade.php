<x-front-layout title="Cart">
    <x-slot name="breadcrumb">
        <div class="breadcrumb-area">
            <div class="container">
                <div class="breadcrumb-content">
                    <ul>
                        <li><a href="{{ route('home') }}">Home</a></li>
                        <li class="{{ route('product.index') }}">Cart</li>
                    </ul>
                </div>
            </div>
        </div>
    </x-slot>
    <!--Shopping Cart Area Strat-->
    <div class="Shopping-cart-area pt-60 pb-60">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <form action="#">
                        <div class="table-content table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th class="li-product-remove">remove</th>
                                        <th class="li-product-thumbnail">images</th>
                                        <th class="cart-product-name">Product</th>
                                        <th class="li-product-price">Unit Price</th>
                                        <th class="li-product-quantity">Quantity</th>
                                        <th class="li-product-subtotal">Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($cart->get() as $item)
                                    <tr id="{{ $item->id }}">
                                        <td class="li-product-remove" data-id="{{ $item->id }}"><a href="#"><i class="fa fa-times"></i></a></td>
                                        <td class="li-product-thumbnail"><a href="{{ route('product.show', $item->product->slug) }}"><img src="{{ $item->product->image_url }}" alt="Li's Product Image"></a></td>
                                        <td class="li-product-name"><a href="#">{{ $item->product->name }}</a></td>
                                        <td class="li-product-price"><span class="amount">{{ Currency::format($item->product->price) }}</span></td>
                                        <td class="quantity">
                                            <label>Quantity</label>
                                            <input class="cart-plus-minus-box item-quantity" data-id="{{ $item->id }}" value="{{ $item->quantity }}" type="text">
                                            {{-- <div class="cart-plus-minus">
                                                <div class="dec qtybutton"><i class="fa fa-angle-down"></i></div>
                                                <div class="inc qtybutton"><i class="fa fa-angle-up"></i></div>
                                            </div> --}}
                                        </td>
                                        <td class="product-subtotal"><span class="amount">{{ Currency::format($item->quantity * $item->product->price) }}</span></td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="coupon-all">
                                    <div class="coupon">
                                        <input id="coupon_code" class="input-text" name="coupon_code" value="" placeholder="Coupon code" type="text">
                                        <input class="button" name="apply_coupon" value="Apply coupon" type="submit">
                                    </div>
                                    <div class="coupon2">
                                        <input class="button" name="update_cart" value="Update cart" type="submit">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-5 ml-auto">
                                <div class="cart-page-total">
                                    <h2>Cart totals</h2>
                                    <ul>
                                        <li>Subtotal <span>{{ Currency::format( $cart->total() ) }}</span></li>
                                        <li>Total <span>{{ Currency::format( $cart->total() ) }}</span></li>
                                    </ul>
                                    <a href="#">Proceed to checkout</a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!--Shopping Cart Area End-->
    @push('scripts')
        {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script> --}}

        <script>
            const csrf_token = "{{ csrf_token() }}"; // return csrf token and this variable is constant becasue not change.
        </script>


        <script src="{{ asset('js/cart.js') }}"></script>
    @endpush
</x-front-layout>