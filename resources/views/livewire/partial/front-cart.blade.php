<div class="countitem-container">

    @if (Cart::count() > 0)
        @foreach (Cart::content() as $item)
            <div class="cart-item">
                <div wire:click="destroy('{{$item->rowId}}')" class="close-item"><i class="fas fa-times"></i></div>
                <div class="thumb">
                    <a href="{{ route('template.detail', ['template_slug' => $item->model->slug]) }}"><img
                            src="{{ asset('storage') }}/{{ $item->model->thumb }}" alt="{{ $item->model->title }}" style="width: 70%;"></a>
                </div>
                <div class="content">
                    <a class="title" href="{{ route('template.detail', ['template_slug' => $item->model->slug]) }}">{{ $item->model->title }}</a>
                    <div class="price">&#8377; {{ $item->model->new_price }}</div>
                </div>
            </div>
        @endforeach

        <div class="cart-item-footer">
            <div class="subtotal d-flex justify-content-between">
                <h6>Sub Total:</h6>
                <p class="amount">&#8377; {{ Cart::subtotal() }}</p>
            </div>
            <a class="checkout" href="#">Checkout</a>
        </div>
    @else
        <p class="text-center">No item in cart</p>
    @endif
</div>
