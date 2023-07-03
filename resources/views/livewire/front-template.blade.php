<div>
    @push('meta')
        <title>{{ config('app.name') }} | Templates</title>
    @endpush

    @push('style')
        <style>
            @import url(https://netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css);
            @import url(http://fonts.googleapis.com/css?family=Calibri:400,300,700);

            fieldset,
            label {
                margin: 0;
                padding: 0;
            }

            .rating {
                border: none;
                margin-top: 10px;
            }

            .myratings {
                font-size: 85px;
                color: green;
            }

            .full {
                font-size: 13px;
            }

            .rating>[id^="star"] {
                display: none;
            }

            .rating>label:before {
                margin: 5px;
                font-size: 2.25em;
                font-family: FontAwesome;
                display: inline-block;
                content: "\f005";
            }

            .rating>.half:before {
                content: "\f089";
                position: absolute;
            }

            .rating>label {
                color: #ddd;
                float: right;
            }

            .rating>[id^="star"]:checked~label,
            /* show gold star when clicked */
            .rating:not(:checked)>label:hover,
            /* hover current star */
            .rating:not(:checked)>label:hover~label {
                color: #fcc704;
            }

            .rating>[id^="star"]:checked+label:hover,
            /* hover current star when changing rating */
            .rating>[id^="star"]:checked~label:hover,
            .rating>label:hover~[id^="star"]:checked~label,
            /* lighten current selection */
            .rating>[id^="star"]:checked~label:hover~label {
                color: #fce309;
            }

            @media all and (min-width: 480px) {
                .deskContent {
                    display: block;
                }

                .phoneContent {
                    display: none;
                }
            }

            @media all and (max-width: 479px) {
                .deskContent {
                    display: none;
                }

                .phoneContent {
                    display: block;
                }
            }
        </style>
    @endpush

    <!-- banner section start -->
    <section class="banner-section page-banner bg-gra4">
        <div class="shape-layer">
            <div class="circle-shape-2" data-depth="0.2"></div>
        </div>
        <div class="banner-content-area">
            <div class="container">
                <div class="banner-text text-lg-left text-center">
                    <h1 class="title">Find Your Template</h1>
                    <p class="subtitle">Lorem Ipsum is simply dummy text of the printing and typesetting industry</p>
                </div>
            </div>
        </div>
        <div class="breadcrumb-area">
            <div class="d-flex justify-content-end container">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item active text-warning" aria-current="page">Templates</li>
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
                <div class="col-lg-3 product-sidebar">
                    <div class="theiaStickySidebar">

                        <div class="widget widget-head">
                            <div class="d-flex justify-content-between align-items-center">

                                <h6 class="deskContent">
                                    <span class="text-primary" role="button" wire:click.prevent="searching()">FILTER HERE</span>
                                </h6>

                                <h6 class="phoneContent">
                                    <a data-toggle="collapse" href="#flux-filtermain" aria-expanded="true"
                                        aria-controls="flux-catagory-filterId1">Toggle Filter</a>
                                </h6>

                                <span role="button" wire:click.prevent="resetForm()">RESET ALL</span>
                            </div>
                        </div>

                        <div class="widget-filter-wrapper" id="flux-filtermain" wire:ignore.self>
                            <form method="post" wire:submit.prevent="searching">

                                <!-- Search -->
                                <div class="widget free-paid">
                                    <a class="widget-title" data-toggle="collapse" href="#flux-search-filterId2" role="button" aria-expanded="true"
                                        aria-controls="flux-search-filterId2">Search<i class="fas fa-angle-down"></i></a>

                                    <div class="widget-wrapper show collapse" id="flux-search-filterId2" wire:ignore.self>
                                        <div class="search-form mt-2">
                                            <input type="text"
                                                style="background-color: transparent; color: rgb(8, 189, 47); border: 1px solid #e9e9e900; padding:0;"
                                                placeholder="Filter By Title" wire:model.lazy="title">

                                            <button class="submit" type="button" wire:click.prevent="clearSearch()">
                                                <i class="{{ $title == null ? '' : 'fas fa-remove' }}"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>

                                <!-- category -->
                                <div class="widget free-paid">
                                    <a class="widget-title" data-toggle="collapse" href="#flux-catagory-filterId1" role="button" aria-expanded="true"
                                        aria-controls="flux-catagory-filterId1">Category<i class="fas fa-angle-down"></i></a>

                                    <div class="widget-wrapper show collapse" id="flux-catagory-filterId1" wire:ignore.self>
                                        <ul class="catagory-submenu">
                                            @foreach ($templateCategories as $templateCategory)
                                                <li class="radio-item">
                                                    <input type="radio" value="{{ $templateCategory->id }}" wire:model="category">
                                                    <span class="radio"></span>
                                                    <span class="label">{{ $templateCategory->name }}</span>
                                                </li>
                                            @endforeach
                                        </ul>

                                        <div class="{{ $category == null ? 'd-none' : '' }}">
                                            <div class="d-flex justify-content-end text-info mt-2" style="cursor: pointer;"
                                                wire:click.prevent="clearCategory()">Reset Category</div>
                                        </div>
                                    </div>
                                </div>

                                <!-- sub category -->
                                @if (!empty($subcategories))
                                    <div class="widget free-paid">
                                        <a class="widget-title" data-toggle="collapse" href="#flux-subcatagory-filterId1" role="button"
                                            aria-expanded="true" aria-controls="flux-subcatagory-filterId1">Sub-Catagory<i
                                                class="fas fa-angle-down"></i></a>

                                        <div class="widget-wrapper show collapse" id="flux-subcatagory-filterId1" wire:ignore.self>
                                            <ul class="catagory-submenu">
                                                @foreach ($subcategories as $subCat)
                                                    <li class="radio-item">
                                                        <input type="radio" value="{{ $subCat->id }}" wire:model="subcategory_id">
                                                        <span class="radio"></span>
                                                        <span class="label">{{ $subCat->name }}</span>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                @endif

                                <!-- reting -->
                                <div class="widget free-paid">
                                    <a class="widget-title" data-toggle="collapse" href="#flux-subcatagory-filterId9" role="button"
                                        aria-expanded="true" aria-controls="flux-subcatagory-filterId9">Rating <i
                                            class="fas fa-angle-down"></i></a>

                                    <div class="widget-wrapper show collapse" id="flux-subcatagory-filterId9" wire:ignore.self>
                                        <fieldset class="rating">
                                            <input id="star5" name="rating" type="radio" value="5" wire:model.lazy="rating" />
                                            <label class="full" for="star5" title="Excellent"></label>

                                            <input id="star4" name="rating" type="radio" value="4" wire:model.lazy="rating" />
                                            <label class="full" for="star4" title="Very Good"></label>

                                            <input id="star3" name="rating" type="radio" value="3" wire:model.lazy="rating" />
                                            <label class="full" for="star3" title="Good"></label>

                                            <input id="star2" name="rating" type="radio" value="2" wire:model.lazy="rating" />
                                            <label class="full" for="star2" title="Acceptable"></label>

                                            <input id="star1" name="rating" type="radio" value="1" wire:model.lazy="rating" />
                                            <label class="full" for="star1" title="Poor"></label>

                                        </fieldset>

                                        <div class="{{ $rating == null ? 'd-none' : '' }}">
                                            <div class="d-flex justify-content-end text-info mt-2" style="cursor: pointer;"
                                                wire:click.prevent="clearRating()">Reset Rating</div>
                                        </div>
                                    </div>
                                </div>

                                <!-- price -->
                                <div class="widget free-paid">
                                    <a class="widget-title" data-toggle="collapse" href="#flux-catagory-filterId2" role="button"
                                        aria-expanded="true" aria-controls="flux-catagory-filterId2">Price<i class="fas fa-angle-down"></i></a>

                                    <div class="widget-wrapper show collapse" id="flux-catagory-filterId2" wire:ignore.self>
                                        <div class="row mt-2">
                                            <div class="col-6">
                                                <input type="text"
                                                    style="background-color: transparent; color: rgb(8, 189, 47); padding: 2px 35px 2px 20px; border: 1px solid #e9e9e900;"
                                                    placeholder="Min Price" wire:model.lazy="min_price">
                                            </div>

                                            <div class="col-6">
                                                <input type="text"
                                                    style="background-color: transparent; color: rgb(8, 189, 47); padding: 2px 35px 2px 20px; border: 1px solid #e9e9e900;"
                                                    placeholder="Max Price" wire:model.lazy="max_price">
                                            </div>
                                        </div>

                                        @if (!$min_price == null || !$max_price == null)
                                            <div class="d-flex justify-content-end text-info mt-2" style="cursor: pointer;"
                                                wire:click.prevent="clearPrice()">Reset Price</div>
                                        @endif
                                    </div>
                                </div>

                                <!-- type -->
                                <div class="widget free-paid">
                                    <a class="widget-title" data-toggle="collapse" href="#flux-catagory-filterId4" role="button"
                                        aria-expanded="true" aria-controls="flux-catagory-filterId4">Type<i class="fas fa-angle-down"></i></a>

                                    <div class="widget-wrapper show collapse" id="flux-catagory-filterId4" wire:ignore.self>
                                        <ul class="catagory-submenu">
                                            <li class="radio-item">
                                                <input type="radio" value="new" wire:model="type">
                                                <span class="radio"></span>
                                                <span class="label">New</span>
                                            </li>

                                            <li class="radio-item">
                                                <input type="radio" value="free" wire:model="type">
                                                <span class="radio"></span>
                                                <span class="label">Free</span>
                                            </li>

                                            <li class="radio-item">
                                                <input type="radio" value="premium" wire:model="type">
                                                <span class="radio"></span>
                                                <span class="label">Premium</span>
                                            </li>

                                            <li class="radio-item">
                                                <input type="radio" value="special" wire:model="type">
                                                <span class="radio"></span>
                                                <span class="label">Special</span>
                                            </li>

                                            <li class="radio-item">
                                                <input type="radio" value="unique" wire:model="type">
                                                <span class="radio"></span>
                                                <span class="label">Unique</span>
                                            </li>
                                        </ul>

                                        <div class="{{ $type == null ? 'd-none' : '' }}">
                                            <div class="d-flex justify-content-end text-info mt-2" style="cursor: pointer;"
                                                wire:click.prevent="clearType()">Reset Type</div>
                                        </div>
                                    </div>
                                </div>

                                <button class="btn btn-primary btn-sm btn-block my-2" type="submit">FILTER HERE <span
                                        wire:loading>Wait...</span></button>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="col-lg-9 main-content">
                    <div class="theiaStickySidebar">
                        <div class="row">
                            @if (count($templates) > 0)
                                @foreach ($templates as $template)
                                    <div class="col-md-6 col-lg-6 my-3">
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
                                                        <li>
                                                            <span class="text-info">{{ $template->templateSubCategory->name }}</span>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="content-footer">
                                                    <ul class="nav taglist">
                                                        @foreach ($template->tags as $tag)
                                                            <li>
                                                                <a
                                                                    href="{{ route('template.by.tag', ['tag_slug' => $tag->slug]) }}">{{ $tag->name }}</a>
                                                            </li>
                                                        @endforeach
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

                                                <sapn class="product-overlay-btn details" role="button" wire:click="store({{$template->id}},'{{$template->title}}',{{$template->new_price}})">
                                                    <span>Add To Cart</span>
                                                </sapn>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @else
                                <div class="col-md-12 col-lg-12 mt-4">
                                    <div class="d-flex justify-content-center mt-4">
                                        No Template Found
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- page-content section end -->

    @push('script')
        <script>
            $(document).ready(function() {
                $("input[type='radio']").click(function() {
                    var sim = $("input[type='radio']:checked").val();
                    //alert(sim);
                    if (sim < 3) {
                        $('.myratings').css('color', 'red');
                        $(".myratings").text(sim);
                    } else {
                        $('.myratings').css('color', 'green');
                        $(".myratings").text(sim);
                    }
                });
            });
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
</div>
