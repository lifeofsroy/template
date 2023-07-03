<div>
    @push('meta')
        {!! seo() !!}
    @endpush
    <!-- banner section start -->
    <section class="banner-section style2">
        <div class="shape-layer">
            <div class="circle-shape" data-depth="0.1"></div>
            <div class="circle-shape-2" data-depth="0.05"></div>
            <div class="shape-box1" data-depth="0.15">
                <img src="{{ asset('assets/images/dot-shape.png') }}" alt="">
            </div>
            <div class="shape-box" data-depth="0.15">
                <img src="{{ asset('assets/images/dot-shape.png') }}" alt="">
                <div class="sm-circle"></div>
            </div>
            <div class="name-shape" data-depth="0.3">
                <img src="{{ asset('assets/images/flux.png') }}" alt="">
            </div>
            <div class="dot-circle-shape" data-depth="0.1"></div>
        </div>
        <div class="banner-content-area">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6">
                        <div class="banner-text">
                            <p class="subtitle">Give Your Business A New Identity</p>
                            <h1 class="title">Give Your Business<br>A New Identity</h1>
                            <a class="banner-btn" href="{{ route('template') }}"><span>Browse All Templates</span>
                                <svg id="Capa_1" style="enable-background:new 0 0 512 512;" version="1.1" xmlns="http://www.w3.org/2000/svg"
                                    xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 512 512"
                                    xml:space="preserve">
                                    <path
                                        d="M506.134,241.843c-0.006-0.006-0.011-0.013-0.018-0.019l-104.504-104c-7.829-7.791-20.492-7.762-28.285,0.068 c-7.792,7.829-7.762,20.492,0.067,28.284L443.558,236H20c-11.046,0-20,8.954-20,20c0,11.046,8.954,20,20,20h423.557 l-70.162,69.824c-7.829,7.792-7.859,20.455-0.067,28.284c7.793,7.831,20.457,7.858,28.285,0.068l104.504-104 c0.006-0.006,0.011-0.013,0.018-0.019C513.968,262.339,513.943,249.635,506.134,241.843z" />
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="banner-image-area">
            <div class="screenshot-images" data-depth="0.05">
                <img src="assets/images/banner/screenshot/01.png" alt="screenshot">
                <div class="screenshot1" data-depth="0.015">
                    <img src="assets/images/banner/screenshot/02.png" alt="screenshot">
                </div>
                <div class="screenshot2" data-depth="0.03">
                    <img src="assets/images/banner/screenshot/03.png" alt="screenshot">
                </div>
                <div class="screenshot3" data-depth="0.02">
                    <img src="assets/images/banner/screenshot/04.png" alt="screenshot">
                </div>
            </div>
        </div>
    </section>
    <!-- banner section end -->

    <!-- specialty-section start -->
    <section class="specialty-section section-ptb" style="padding-bottom: 50px;">
        <div class="section-header pb--30 pb_lg--60">
            <div class="container">
                <div class="row align-items-center text-lg-left text-center">
                    <div class="col-lg-6 mb--15 mb-lg-0">
                        <h3>Convince Your Clients<br><span>with Most Important Features </span></h3>
                    </div>
                    <div class="col-lg-6 text-lg-right text-center">
                        <a class="flux-btn-solid" href="{{ route('template') }}">Find Your Template</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="section-wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-lg-4">
                        <div class="card style1">
                            <div class="thumb">
                                <img src="assets/images/feature/icon1.png" alt="feature icon">
                            </div>
                            <div class="content">
                                <h5 class="title">Beautiful Design</h5>
                                <p>Lorem ipsum dolor sit amet, conse ctetur adipisicing elit, sed do eiusmod tempor incididunt magna aliqua.</p>

                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-4">
                        <div class="card style1">
                            <div class="thumb">
                                <img src="assets/images/feature/icon2.png" alt="feature icon">
                            </div>
                            <div class="content">
                                <h5 class="title">Nice Functionality</h5>
                                <p>Lorem ipsum dolor sit amet, conse ctetur adipisicing elit, sed do eiusmod tempor incididunt magna aliqua.</p>

                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-4">
                        <div class="card style1">
                            <div class="thumb">
                                <img src="assets/images/feature/icon3.png" alt="feature icon">
                            </div>
                            <div class="content">
                                <h5 class="title">Fast Loading Speed</h5>
                                <p>Lorem ipsum dolor sit amet, conse ctetur adipisicing elit, sed do eiusmod tempor incididunt magna aliqua.</p>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- specialty-section end -->

    <!-- Content start -->
    @foreach ($categories as $category)
        <section class="product-section section-ptb bg-gray1" style="padding-top: 50px;">
            <div class="section-header pb--30 pb_lg--60" style="padding-bottom: 20px;">
                <div class="container">
                    <div class="row align-items-center text-lg-left text-center">
                        <div class="col-lg-6 mb--15 mb-lg-0">
                            <h3>Our Collection of Handcrafted<br>
                                <span>
                                    <a href="{{ route('template.by.category', ['category_slug' => $category->slug]) }}">{{ $category->name }}</a>
                                </span>
                            </h3>
                        </div>
                        <div class="col-lg-6 text-lg-right text-center">
                            <div class="text text-lg-left text-center">
                                <p>{{ $category->desc }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="section-wrapper">
                <div class="p-lg-0 container">
                    <div class="d-flex pb--30 pb_lg--60">
                        <ul class="product-tabname nav" role="tablist">
                            @foreach ($category->templateSubCategories as $index => $subCategory)
                                <li role="presentation">
                                    <a class="tabnav-btn {{ $index == 0 ? 'active' : '' }}" id="productTypeName{{ $subCategory->id }}-tab"
                                        data-toggle="tab" href="#productTypeName{{ $subCategory->id }}" role="tab"
                                        aria-controls="productTypeName{{ $subCategory->id }}"
                                        aria-selected="{{ $index == 0 ? 'true' : 'false' }}">{{ $subCategory->name }}</a>
                                </li>
                            @endforeach
                        </ul>
                    </div>

                    <div class="tab-content">
                        @foreach ($category->templateSubCategories as $indexing => $subCategory)
                            <!-- product-list 1 -->
                            <div class="tab-pane fade {{ $indexing == 0 ? 'show active' : '' }}" id="productTypeName{{ $subCategory->id }}"
                                role="tabpanel" aria-labelledby="productTypeName{{ $subCategory->id }}-tab">
                                <div class="row">
                                    @foreach ($subCategory->templates->take(3) as $template)
                                        <div class="col-md-6 col-lg-4 my-2">
                                            <div class="product-item">
                                                <div class="thumb">
                                                    <a class="thumb-link"
                                                        href="{{ route('template.detail', ['template_slug' => $template->slug]) }}">
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
                                                        href="{{ route('template.preview', ['template_slug' => $template->slug]) }}"
                                                        target="_blank">
                                                        <span>Preveiw</span>
                                                    </a>

                                                    <sapn class="product-overlay-btn details" role="button" wire:click="store({{$template->id}},'{{$template->title}}',{{$template->new_price}})">
                                                        <span>Add To Cart</span>
                                                    </sapn>
                                                </div>
                                            </div>
                                        </div>

                                    @endforeach

                                    <div class="col-12 text-center">
                                        <a class="view-theme button"
                                            href="{{ route('template.by.subcategory', ['subcategory_slug' => $subCategory->slug]) }}">View All <span
                                                class="text-warning">{{ $subCategory->name }}</span>
                                        </a>
                                    </div>

                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>
    @endforeach
    <!-- Content end -->

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
