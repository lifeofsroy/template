<div>
    @push('meta')
        {!! seo() !!}
    @endpush

    <!-- banner section start -->
    <section class="banner-section page-banner bg-gra4">
        <div class="shape-layer">
            <div class="circle-shape-2" data-depth="0.2"></div>
        </div>
        <div class="banner-content-area">
            <div class="container">
                <div class="banner-text text-lg-left text-center">
                    <h1 class="title">{{ $subcategory->name }}</h1>
                    <p class="subtitle">Lorem Ipsum is simply dummy text of the printing and typesetting industry</p>
                </div>
            </div>
        </div>
        <div class="breadcrumb-area">
            <div class="d-flex justify-content-end container">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Blog</li>
                    </ol>
                </nav>
            </div>
        </div>
    </section>
    <!-- banner section end -->

    <!-- page-content section start -->
    <section class="page-content section-ptb-90">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 main-content">
                    <div class="theiaStickySidebar">
                        <div class="row">
                            @foreach ($subcategory->templates as $template)
                                <div class="col-md-2 col-lg-6">
                                    <div class="product-item">
                                        <div class="thumb">
                                            <a class="thumb-link" href="{{ route('template.detail', ['template_slug' => $template->slug]) }}">
                                                <img src="{{ asset('storage') }}/{{ $template->thumb }}" alt="template thumbnail">
                                            </a>
                                            <a class="product-type {{ $template->type }} text-capitalize font-weight-bold"
                                                href="#">{{ $template->type }}</a>
                                        </div>
                                        <div class="content">
                                            <div class="content-inner pb-0">
                                                <div class="price-rating-area d-flex justify-content-between flex-wrap">
                                                    <div class="price"><del>&#8377; {{ $template->old_price }}</del>&#8377;
                                                        {{ $template->new_price }}</div>
                                                    <div class="rating">
                                                        @for ($i = 1; $i <= $template->rating; $i++)
                                                            <i class="fas fa-star"></i>
                                                        @endfor
                                                    </div>
                                                </div>
                                                <h5 class="title">
                                                    <a href="{{ route('template.detail', ['template_slug' => $template->slug]) }}">
                                                        {{ $template->title }}
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
                                            <a class="product-overlay-btn details"
                                                href="{{ route('template.detail', ['template_slug' => $template->slug]) }}">
                                                <span>Details</span>
                                            </a>

                                            <a class="product-overlay-btn details"
                                                href="{{ route('template.preview', ['template_slug' => $template->slug]) }}" target="_blank">
                                                <span>Preveiw</span>
                                            </a>

                                            <a class="product-overlay-btn details" data-toggle="modal"
                                                data-target="#exampleModalCenter{{ $template->id }}" href="#">
                                                <span>Choose</span>
                                            </a>
                                        </div>
                                    </div>
                                </div>

                                <!-- Modal -->
                                <div class="modal fade" id="exampleModalCenter{{ $template->id }}" role="dialog"
                                    aria-labelledby="exampleModalCenter{{ $template->id }}Title" aria-hidden="true" tabindex="-1" wire:ignore.self>
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title text-info text-center" id="exampleModalLongTitle" style="font-size: 16px;">
                                                    {{ $template->title }}</h5>
                                                <button class="close" data-dismiss="modal" type="button" aria-label="Close"
                                                    wire:click="closeCheckoutModal">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="billing-inforamtion-box p-4">
                                                    <h4 class="text-secondary">Fill Your Details</h4>

                                                    <form class="review-form" wire:submit.prevent="checkoutForm">
                                                        <div class="row">

                                                            <div class="col-lg-12">
                                                                <div class="input-item">
                                                                    <input name="name" type="text" placeholder="Full Name"
                                                                        wire:model.lazy="cname">
                                                                    @error('cname')
                                                                        <div class="text-danger" style="font-size: 12px;">{{ $message }}
                                                                        </div>
                                                                    @enderror
                                                                </div>
                                                            </div>

                                                            <div class="col-lg-12">
                                                                <div class="input-item">
                                                                    <input name="email" type="text" placeholder="Email Address"
                                                                        wire:model.lazy="cemail">
                                                                    @error('cemail')
                                                                        <div class="text-danger" style="font-size: 12px;">{{ $message }}
                                                                        </div>
                                                                    @enderror
                                                                </div>
                                                            </div>

                                                            <div class="col-lg-6">
                                                                <div class="input-item">
                                                                    <input name="phone" type="text" placeholder="Phone No"
                                                                        wire:model.lazy="cphone">
                                                                    @error('cphone')
                                                                        <div class="text-danger" style="font-size: 12px;">{{ $message }}
                                                                        </div>
                                                                    @enderror
                                                                </div>
                                                            </div>

                                                            <div class="col-lg-6">
                                                                <div class="input-item">
                                                                    <input name="phone" type="text" placeholder="Whatsapp No"
                                                                        wire:model.lazy="cwhatsapp">
                                                                    @error('cwhatsapp')
                                                                        <div class="text-danger" style="font-size: 12px;">{{ $message }}
                                                                        </div>
                                                                    @enderror
                                                                </div>
                                                            </div>

                                                            <div class="col-lg-12">
                                                                <div class="input-item">
                                                                    <textarea name="message" name="desc" placeholder="Your Message (optional)" wire:model.lazy="cdesc"></textarea>
                                                                    @error('cdesc')
                                                                        <div class="text-danger" style="font-size: 12px;">{{ $message }}
                                                                        </div>
                                                                    @enderror
                                                                </div>
                                                            </div>

                                                            <div class="col-lg-12">
                                                                <button class="review-submit" type="submit"
                                                                    wire:click="updateTempid('{{ $template->id }}')">Send To
                                                                    Developer</button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>

                                @push('script')
                                    <script>
                                        window.addEventListener('close-checkout-modal', event => {
                                            $('#exampleModalCenter{{ $template->id }}').modal('hide');
                                        })
                                    </script>
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
                            @endforeach
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 pl-lg-5 sidebar">
                    <div class="theiaStickySidebar">
                        <div class="widget">
                            <form class="search-form" action="#">
                                <input name="search" type="text" placeholder="Search...">
                                <button class="submit" type="submit"><i class="fas fa-search"></i></button>
                            </form>
                        </div>

                        <div class="widget">
                            <h5 class="widget-title">Latest Templates</h5>
                            <div class="widget-wrapper">
                                <div class="small-post-list">
                                    @foreach ($latests as $latest)
                                        <div class="small-post-item">
                                            <div class="thumb">
                                                <a href="#">
                                                    <img src="{{ asset('storage') }}/{{ $latest->thumb }}" alt="thumb">
                                                </a>
                                            </div>
                                            <div class="content">
                                                <a class="title"
                                                    href="{{ route('template.detail', ['template_slug' => $latest->slug]) }}">{{ $latest->title }}
                                                </a>
                                                <ul class="meta-post">
                                                    <li>{{ $latest->updated_at->format('F j, Y') }}</li>
                                                </ul>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>

                        <div class="widget">
                            <h5 class="widget-title">Categories</h5>
                            <div class="widget-wrapper">
                                <ul>
                                    @foreach ($subcats as $subcat)
                                        <li>
                                            <a href="{{ route('template.by.subcategory', ['subcategory_slug' => $subcat->slug]) }}">
                                                {{ $subcat->name }} <span class="text-info">({{ $subcat->templates->count() }})</span>
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- page-content section end -->
</div>
