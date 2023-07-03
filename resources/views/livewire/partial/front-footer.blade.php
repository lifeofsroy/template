<!-- footer section start -->
<footer class="footer">
    <div class="container">
        <div class="footer-bottom">
            <div class="row align-items-center">
                <div class="col-lg-6 text-lg-left text-center">
                    <p class="copyright">&copy; {{ date('Y') }} <a class="text-uppercase font-weight-bold"
                            href="https://sroywebstudio.com">SRoyWEBstudio</a> All rights reserved.</p>
                </div>
                <div class="col-lg-6">
                    <ul class="footer-menu d-flex justify-content-center justify-content-lg-end">
                        <li><a href="{{ route('policy.show') }}">Policy</a></li>
                        <li><a href="{{ route('terms.show') }}">Terms</a></li>

                        @if (Route::has('login'))
                            @auth
                                <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
                                <li><a href="{{ route('logout') }}"
                                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a></li>
                            @else
                                <li><a href="{{ route('login') }}">Login</a></li>

                                @if (Route::has('register'))
                                    <li><a href="{{ route('register') }}">Register</a></li>
                                @endif
                            @endauth
                        @endif
                    </ul>
                </div>
            </div>
            <form id="logout-form" method="POST" action="{{ route('logout') }}">
                @csrf
            </form>
        </div>
    </div>
</footer>
<!-- footer section end -->
