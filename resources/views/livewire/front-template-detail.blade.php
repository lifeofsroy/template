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
                    <h1 class="title">{{ $template->title }}</h1>
                    <p class="subtitle">{{ $template->short }}</p>
                </div>
            </div>
        </div>
        <div class="breadcrumb-area">
            <div class="d-flex justify-content-end container">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item active text-warning" aria-current="page">Template Details</li>
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
                <div class="col-lg-8 main-content">
                    <div class="theiaStickySidebar">
                        <div class="product-entry-single">
                            <div class="product-thumb box">
                                <img src="{{ asset('storage') }}/{{ $template->image }}" alt="thumb">
                            </div>
                            <div class="box link-group d-flex justify-content-center mb-2">
                                <a class="link-button flux-btn-border" href="{{ route('template.preview', ['template_slug' => $template->slug]) }}"
                                    target="_blank">Preview</a>

                                @foreach ($template->getMedia('sliders') as $imageid => $slider)
                                    <a class="link-button {{ $imageid == 0 ? '' : 'd-none' }} showcase flux-btn-border"
                                        data-rel="lightcase:myCollection" href="{{ $slider->getUrl() }}">Screenshots</a>
                                @endforeach

                                <a class="link-button flux-btn-border"
                                    wire:click.prevent="store({{ $template->id }},'{{ $template->title }}',{{ $template->new_price }})">Add To
                                    Cart</a>
                            </div>
                            <div class="box product-detail-description">
                                <div class="d-flex pb--60">
                                    <ul class="product-tabname nav" role="tablist">
                                        <li role="presentation" wire:ignore>
                                            <a class="tabnav-btn active" id="product-detail-descrioption-tab1-tab" data-toggle="tab"
                                                href="#product-detail-descrioption-tab1" role="tab"
                                                aria-controls="product-detail-descrioption-tab1" aria-selected="true">Description</a>
                                        </li>
                                        <li role="presentation" wire:ignore>
                                            <a class="tabnav-btn" id="product-detail-descrioption-tab3-tab" data-toggle="tab"
                                                href="#product-detail-descrioption-tab3" role="tab"
                                                aria-controls="product-detail-descrioption-tab3" aria-selected="false">Reviews</a>
                                        </li>
                                        <li role="presentation" wire:ignore>
                                            <a class="tabnav-btn" id="product-detail-descrioption-tab4-tab" data-toggle="tab"
                                                href="#product-detail-descrioption-tab4" role="tab"
                                                aria-controls="product-detail-descrioption-tab4" aria-selected="false">FAQ</a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="tab-content">
                                    <!-- description -->
                                    <div class="tab-pane fade show active" id="product-detail-descrioption-tab1" role="tabpanel"
                                        aria-labelledby="product-detail-descrioption-tab1-tab" wire:ignore.self>
                                        <div class="tab-body">
                                            <p>{!! $template->desc !!}</p>

                                            <b>Note: {{ $template->note }}</b>
                                        </div>
                                    </div>

                                    <!-- reviews -->
                                    <div class="tab-pane fade" id="product-detail-descrioption-tab3" role="tabpanel"
                                        aria-labelledby="product-detail-descrioption-tab3-tab" wire:ignore.self>
                                        <div class="review-comments-section">
                                            <h3 class="reiview-comments-title">{{ $template->reviews->count() }} reviews</h3>
                                            <div class="review-comment-list">
                                                @foreach ($template->reviews as $review)
                                                    <div class="review-comment-item d-md-flex">
                                                        <div class="thumb">
                                                            @if ($review->user->profile_photo_path == null)
                                                                <img src="{{ asset('assets/images/review/01.jpg') }}" alt="review-thumb">
                                                            @else
                                                                <img src="{{ asset('storage') }}/{{ $review->user->profile_photo_path }}"
                                                                    alt="review-thumb">
                                                            @endif
                                                        </div>
                                                        <div class="content">
                                                            <div class="head d-md-flex align-items-center justify-content-between">
                                                                <div class="left">
                                                                    <h5 class="name">{{ $review->user->name }}</h5>
                                                                    <p class="post-time">Posted on
                                                                        {{ $review->created_at->format('F j, Y - h:i a') }}</p>
                                                                </div>
                                                                <div class="right">
                                                                    <div class="rating d-md-flex align-items-center">
                                                                        @for ($i = 1; $i <= $review->rating; $i++)
                                                                            <i class="fas fa-star"></i>
                                                                        @endfor
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="review-body">
                                                                <p>{{ $review->desc }}</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>

                                            <h3>Write Your Opinion and Rate Us</h3>
                                            @auth
                                                <form class="review-form" wire:submit.prevent="reviewForm">
                                                    <div class="row">

                                                        <div class="col-lg-4">
                                                            <div class="input-item">
                                                                <label>Your Rating</label>
                                                                <select name="rating" wire:model="rating">
                                                                    <option value="" selected="selected" hidden>Select Rating</option>
                                                                    <option value="5">Excellent</option>
                                                                    <option value="4">Very Good</option>
                                                                    <option value="3">Good</option>
                                                                    <option value="2">Acceptable</option>
                                                                    <option value="1">Poor</option>
                                                                </select>
                                                                @error('rating')
                                                                    <div class="text-danger" style="font-size: 12px;">{{ $message }}</div>
                                                                @enderror
                                                            </div>
                                                        </div>

                                                        <div class="col-lg-12">
                                                            <div class="input-item">
                                                                <label>Your Message</label>
                                                                <textarea name="message" placeholder="Write Your Comment Here" wire:model.lazy="desc"></textarea>
                                                                @error('desc')
                                                                    <div class="text-danger" style="font-size: 12px;">{{ $message }}</div>
                                                                @enderror
                                                            </div>
                                                        </div>

                                                        <div class="col-lg-12">
                                                            <button class="review-submit" type="submit">Submit Your Review</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            @else
                                                <ul class="menu d-flex justify-content-left align-items-center">
                                                    <li><a class="login button" href="{{ route('login') }}">Login Before Submit Review</a></li>
                                                </ul>
                                            @endauth
                                        </div>
                                    </div>

                                    <!-- FAQ -->
                                    <div class="tab-pane fade" id="product-detail-descrioption-tab4" role="tabpanel"
                                        aria-labelledby="product-detail-descrioption-tab4-tab" wire:ignore.self>
                                        <div>
                                            <div class="faq-container">
                                                <div class="accordion" id="faqaccordion">
                                                    @foreach ($template->faqs as $faqindex => $faq)
                                                        <div class="faq wow fadeInUp" data-wow-offset="10" data-wow-duration="1s"
                                                            data-wow-delay="{{ $faqindex == 0 ? '0s' : '0.2s' }}">
                                                            <div class="faq-header" id="faq{{ $faq->id }}">
                                                                <button class="btn btn-link {{ $faqindex == 0 ? '' : 'collapsed' }}"
                                                                    data-toggle="collapse" data-target="#collapseId{{ $faq->id }}"
                                                                    type="button" aria-expanded="{{ $faqindex == 0 ? 'true' : 'false' }}"
                                                                    aria-controls="collapseId{{ $faq->id }}">
                                                                    <span class="icon">
                                                                        <i class="fas fa-plus"></i>
                                                                        <i class="fas fa-minus"></i>
                                                                    </span>
                                                                    {{ $faq->question }}
                                                                </button>
                                                            </div>
                                                            <div class="{{ $faqindex == 0 ? 'show' : '' }} collapse"
                                                                id="collapseId{{ $faq->id }}" data-parent="#faqaccordion"
                                                                aria-labelledby="faq{{ $faq->id }}">
                                                                <div class="faq-body">
                                                                    <p>{{ $faq->answer }}</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 sidebar">
                    <div class="theiaStickySidebar">
                        <div class="widget-woocommerce box mb-2">
                            <div class="product-w-details">
                                <div class="site-preview text-center">
                                    <a href="{{ $template->source_url }}" target="_blank">
                                        <img src="{{ asset('storage') }}/{{ $template->source_logo }}" alt="preview">
                                    </a>
                                </div>

                                <p class="price">
                                    <del style="color: #c3c7c7; font-size: 25px;">&#8377; {{ $template->old_price }}</del><br>
                                    &#8377; {{ $template->new_price }}
                                </p>

                                <div class="rating d-flex justify-content-center">
                                    @for ($i = 1; $i <= $template->rating; $i++)
                                        <i class="fas fa-star"></i>
                                    @endfor
                                </div>

                            </div>
                        </div>

                        <div class="widget-woocommerce box">
                            <h4 class="woocommerce-widget-title">Specification</h4>
                            <div class="specification-container">
                                <div class="d-flex specification-item">
                                    <div class="specification-title">Last Update:</div>
                                    <div class="specification-desc">{{ $template->updated_at->format('F j, Y') }}</div>
                                </div>

                                <div class="d-flex specification-item">
                                    <div class="specification-title">Relased:</div>
                                    <div class="specification-desc">{{ $template->created_at->format('F j, Y') }}</div>
                                </div>

                                <div class="d-flex specification-item">
                                    <div class="specification-title">Responsive:</div>
                                    <div class="specification-desc">{{ $template->responsive }}</div>
                                </div>

                                <div class="d-flex specification-item">
                                    <div class="specification-title">Layout Interface:</div>
                                    <div class="specification-desc">{{ $template->interface }}</div>
                                </div>

                                <div class="d-flex specification-item">
                                    <div class="specification-title">Multiple Blocks:</div>
                                    <div class="specification-desc">{{ $template->blocks }}</div>
                                </div>

                                <div class="d-flex specification-item">
                                    <div class="specification-title">Compatible Browsers:</div>
                                    <div class="specification-desc">{{ $template->browser }}</div>
                                </div>

                                <div class="d-flex specification-item">
                                    <div class="specification-title">Released Version:</div>
                                    <div class="specification-desc">{{ $template->versions }}</div>
                                </div>

                                <div class="d-flex specification-item">
                                    <div class="specification-title">Files Included:</div>
                                    <div class="specification-desc">{{ $template->files }}</div>
                                </div>

                                <div class="d-flex specification-item">
                                    <div class="specification-title">Framework:</div>
                                    <div class="specification-desc">{{ $template->framework }}</div>
                                </div>

                                <div class="d-flex specification-item">
                                    <div class="specification-title">Documentation:</div>
                                    <div class="specification-desc">{{ $template->document }}</div>
                                </div>

                                @if ($template->tags->count() > 0)
                                    <div class="d-flex specification-item">
                                        <div class="specification-title">Tags:</div>
                                        <div class="specification-desc">
                                            @foreach ($template->tags as $tag)
                                                <a href="{{ route('template.by.tag', ['tag_slug' => $tag->slug]) }}">{{ $tag->name }},</a>
                                            @endforeach
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

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
