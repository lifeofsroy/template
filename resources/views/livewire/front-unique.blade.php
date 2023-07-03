<div>
    @push('meta')
        <title>{{ config('app.name') }} | Unique Themes</title>
    @endpush

    <!-- banner section start -->
    <section class="banner-section page-banner bg-gra4">
        <div class="shape-layer">
            <div class="circle-shape-2" data-depth="0.2"></div>
        </div>
        <div class="banner-content-area">
            <div class="container">
                <div class="banner-text text-lg-left text-center">
                    <h1 class="title">Unique Templates</h1>
                    <p class="subtitle">Lorem Ipsum is simply dummy text of the printing and typesetting industry</p>
                </div>
            </div>
        </div>
        <div class="breadcrumb-area">
            <div class="d-flex justify-content-end container">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item active text-warning" aria-current="page">Unique</li>
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
                @foreach ($uniques as $unique)
                    <div class="col-md-2 col-lg-4 my-2">
                        <div class="product-item">
                            <div class="thumb">
                                <a class="thumb-link" href="{{ route('template.detail', ['template_slug' => $unique->slug]) }}">
                                    <img src="{{ asset('storage') }}/{{ $unique->thumb }}" alt="template thumbnail">
                                </a>
                                <a class="product-type {{ $unique->type }} text-capitalize font-weight-bold" href="#">{{ $unique->type }}</a>
                            </div>
                            <div class="content">
                                <div class="content-inner pb-0">
                                    <div class="price-rating-area d-flex justify-content-between flex-wrap">
                                        <div class="price"><del>&#8377; {{ $unique->old_price }}</del>&#8377;
                                            {{ $unique->new_price }}</div>
                                        <div class="rating">
                                            @for ($i = 1; $i <= $unique->rating; $i++)
                                                <i class="fas fa-star"></i>
                                            @endfor
                                        </div>
                                    </div>
                                    <h5 class="title">
                                        <a href="{{ route('template.detail', ['template_slug' => $unique->slug]) }}">
                                            {{ $unique->title }}
                                        </a>
                                    </h5>
                                </div>
                                <div class="content-footer">
                                    <ul class="nav taglist">
                                        <li><a href="#">Analytics</a></li>
                                        <li><a href="#">Blog</a></li>
                                        <li><a href="#">Digital Marketing</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="product-overlay">
                                <a class="product-overlay-btn details" href="{{ route('template.detail', ['template_slug' => $unique->slug]) }}">
                                    <span>Details</span>
                                </a>

                                <a class="product-overlay-btn details" href="{{ route('template.preview', ['template_slug' => $unique->slug]) }}"
                                    target="_blank">
                                    <span>Preveiw</span>
                                </a>

                                <sapn class="product-overlay-btn details" role="button" wire:click="store({{$unique->id}},'{{$unique->title}}',{{$unique->new_price}})">
                                    <span>Add To Cart</span>
                                </sapn>
                            </div>
                        </div>
                    </div>

                @endforeach
            </div>
        </div>
    </section>
    <!-- page-content section end -->

    @push('script')
        <script>
            window.addEventListener('added', event => {
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
