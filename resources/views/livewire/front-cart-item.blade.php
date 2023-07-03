<div>
    <!-- banner section start -->
    <section class="banner-section page-banner bg-gra4">
        <div class="shape-layer">
            <div class="circle-shape-2" data-depth="0.2"></div>
        </div>
        <div class="banner-content-area">
            <div class="container">
                <div class="banner-text text-lg-left text-center">
                    <h1 class="title">Product Cart Page</h1>
                    <p class="subtitle">Lorem Ipsum is simply dummy text of the printing and typesetting industry</p>
                </div>
            </div>
        </div>
        <div class="breadcrumb-area">
            <div class="d-flex justify-content-end container">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Cart Page</li>
                    </ol>
                </nav>
            </div>
        </div>
    </section>
    <!-- banner section end -->

    <!-- page-content section start -->
    <section class="page-content section-ptb-90 bg-gray1">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="cart-quantity-box">
                        <p>You have {{ Cart::content()->count() }} item in your cart</p>
                        <a class="continue-shopping-btn" href="{{ route('template') }}">Continue Shopping</a>
                    </div>

                    @if (Cart::count() > 0)
                        <div class="cart-product-info">
                            @foreach (Cart::content() as $item)
                                <div class="cart-product-info-item">
                                    <div class="product-item">
                                        <div class="product-thumb">
                                            <img src="{{ asset('storage') }}/{{ $item->model->thumb }}" alt="{{ $item->model->title }}"
                                                style="width: 80px; height: 80px">
                                        </div>
                                        <div class="product-content">
                                            <a class="title" href="#">{{ $item->model->title }}</a>
                                            <ul class="license-support d-flex list-unstyled flex-wrap">
                                                <li><strong>License:</strong> Regular Price</li>
                                                <li><strong>Support:</strong> 6 Months Support</li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="product-price-area" style="width: 110px">
                                        <button class="close-item" wire:click="destroy('{{ $item->rowId }}')"><i class="fas fa-times"></i></button>
                                        <p class="price">&#8377; {{ $item->model->new_price }}</p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endif

                    <div class="discount-coupon-area pt-5">
                        <h6>Apply Discount Code</h6>
                        <div class="discount-coupon-box">
                            <input type="text">
                            <button>Apply Discount</button>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 mt-2 pt-4">
                    <div class="cart-total-area mt-lg-5">
                        <h5 class="cart-total-title">Total</h5>
                        <div class="border-item"></div>
                        <div class="cart-total-body">
                            <div class="d-flex justify-content-between py-2">
                                <p>Subtotal</p>
                                <p class="price">&#8377; {{ Cart::subtotal() }}</p>
                            </div>
                            <div class="d-flex justify-content-between py-2">
                                <p>Tax</p>
                                <p class="price">$0</p>
                            </div>
                            <div class="d-flex justify-content-between py-2">
                                <p>Discount</p>
                                <p class="price">$0</p>
                            </div>
                            <div class="border-item"></div>
                            <div class="d-flex justify-content-between py-2">
                                <h5>Discount</h5>
                                <h5 class="price">&#8377; {{ Cart::subtotal() }}</h5>
                            </div>
                            <div class="pt-5">
                                <a class="checkout-btn" wire:click.prevent="checkout()">Proceed to Checkout</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- page-content section end -->

    @push('script')
        <script>
            window.addEventListener('removed', event => {
                const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 2000,
                    timerProgressBar: true,
                    background: '#18c936',
                    didOpen: (toast) => {
                        toast.addEventListener('mouseenter', Swal.stopTimer)
                        toast.addEventListener('mouseleave', Swal.resumeTimer)
                    }
                })

                Toast.fire({
                    icon: 'success',
                    title: event.detail.message
                })
            })
        </script>
    @endpush
</div>
