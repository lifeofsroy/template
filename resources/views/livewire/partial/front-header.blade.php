<div>
    <!-- Desktop Header -->
    <header class="header style2" style="padding:5px 0;">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-4 d-flex d-lg-block justify-content-between align-items-center">
                    <a class="logo" href="{{ route('home') }}"><img src="{{ asset('assets/images/logo5.png') }}" alt=""></a>
                    <a class="logo-sticky" href="{{ route('home') }}"><img src="{{ asset('assets/images/logo5.png') }}" alt=""></a>

                    <!-- Mobile Cart icon -->
                    <div class="mobile-cart-option d-lg-none">
                        <a href="{{route('template.cart')}}"><i class="fas fa-shopping-cart"></i></a>
                    </div>

                    <div class="menu-bar d-lg-none">
                        <i class="fas fa-bars"></i>
                        <i class="d-none fas fa-times"></i>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="main-menu-area">
                        <div class="d-lg-none px-3 text-right">
                            <button class="close-btn">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>

                        <ul class="menu d-lg-flex justify-content-lg-end align-items-center">
                            <li><a class="{{ Route::is('home') ? 'text-info' : '' }}" href="{{ route('home') }}">Home</a></li>

                            <li class="item-has-child">
                                <a class="d-flex align-items-center justify-content-between" href="#">Templates<i
                                        class="fas fa-angle-down ml-2"></i></a>
                                <ul class="submenu">
                                    @foreach ($subCategories as $subCategory)
                                        <li>
                                            <a href="{{ route('template.by.subcategory', ['subcategory_slug' => $subCategory->slug]) }}">
                                                {{ $subCategory->name }}
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            </li>

                            <li><a class="{{ Route::is('special') ? 'text-info' : '' }}" href="{{ route('special') }}">Special</a></li>

                            <li><a class="{{ Route::is('unique') ? 'text-info' : '' }}" href="{{ route('unique') }}">Unique</a></li>

                            <!-- Desktop Cart icon-->
                            <li class="cart-option d-none d-lg-block"><a href="{{route('template.cart')}}"><i
                                        class="fas fa-shopping-cart"></i></a>
                                {{-- <div class="cart-submenu">

                                    <!-- Desktop Cart -->
                                    @livewire('partial.front-cart')
                                </div> --}}
                            </li>

                            <li><a class="login button" data-toggle="modal" data-target="#searchModal" style="padding: 10px 20px;">Search</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Mobile Cart -->
    <div class="cart-sidemenu">
        <div class="cs-header">
            <div class="close-cart-sidebar"><i class="fas fa-times"></i></div>
        </div>

        {{-- @livewire('partial.front-cart') --}}

    </div>

    <!-- Modal -->
    <div class="modal fade" id="searchModal" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" tabindex="-1" wire:ignore.self>
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content" style="border-radius: 1rem;">

                <div class="modal-body">
                    <div class="banner-text my-3 text-center">
                        <div class="banner-search">
                            <div class="select-search-option">
                                <form class="search-form" style="width: 100%;" wire:submit.prevent="searchTemplate">
                                    <input name="search" type="text" placeholder="Search for Templates" wire:model.lazy="title">

                                    <button class="submit-btn" type="submit"><i class="fas fa-search"></i></button>
                                </form>
                            </div>
                        </div>
                    </div>

                    @if (!empty($title))
                        <div class="list-group">
                            @forelse ($templates as $template)
                                <div class="list-group-item list-group-item-action flex-column align-items-start my-2" style="border: 0;">
                                    <div class="d-flex w-100 justify-content-between">
                                        <h5 class="mb-1">
                                            <a href="{{ route('template.detail', ['template_slug' => $template->slug]) }}"
                                                style="color: #027e85;">{{ $template->title }}</a>
                                        </h5>
                                        <div class="text-success">
                                            <a
                                                href="{{ route('template.by.subcategory', ['subcategory_slug' => $template->templateSubCategory->slug]) }}">
                                                {{ $template->templateSubCategory->name }}</a>
                                        </div>
                                    </div>

                                    <p class="mb-1">{{ $template->short }}</p>

                                    <div class="text-info">
                                        @foreach ($template->tags as $tag)
                                            <a class="mx-1"
                                                href="{{ route('template.by.tag', ['tag_slug' => $tag->slug]) }}">{{ $tag->name }}</a>
                                        @endforeach
                                    </div>
                                </div>
                            @empty
                                <div class="d-flex justify-content-center">
                                    No Template Found
                                </div>
                            @endforelse
                        </div>
                    @endif
                </div>

                <button class="close p-3" data-dismiss="modal" type="button" aria-label="Close">
                    <span aria-hidden="true">close</span>
                </button>
            </div>
        </div>
    </div>

</div>
