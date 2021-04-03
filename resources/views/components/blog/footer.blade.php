<footer id="footer">

    <div class="container">

        <div class="row">
            <div class="col-md-5">
                <div class="footer-widget">
                    <div class="footer-logo">
                        <a href="{{ route('blog.index') }}" class="logo">
                            <img src="{{ $configs->logoUrl }}" alt="Site Logo">
                        </a>
                    </div>
                    <ul class="footer-nav">
                        <li><a href="{{ route('blog.policy') }}">Privacy Policy</a></li>
                    </ul>
                    <div class="footer-copyright">
                        <span>&copy;
                        Copyright &copy; {{ \Carbon\Carbon::now()->format('Y') }} All Rights Reserved. Created By <a
                                href="http://minlwinkyaw.com/">Min Lwin Kyaw</a>
                        </span>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="row">
                    <div class="col-md-6">
                        <div class="footer-widget">
                            <h3 class="footer-title">About Us</h3>
                            <ul class="footer-links">
                                <li><a href="{{ route('blog.about') }}">About Us</a></li>
                                <li><a href="{{ route('blog.contact') }}">Contacts</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="footer-widget">
                            <h3 class="footer-title">Catagories</h3>
                            <ul class="footer-links">
                                @foreach($categories as $category)
                                    @if($loop->index === 5)
                                        @break
                                    @endif
                                    <li><a
                                            href="{{ route('blog.blogs', array_merge(request()->query(), ['category' => $category->slug])) }}">{{ $category->name }}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="footer-widget">
                    <h3 class="footer-title">Social Media</h3>
                    <ul class="footer-social">
                        <li><a href="{{ $configs->facebook }}"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="{{ $configs->twitter }}"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="{{ $configs->google }}"><i class="fa fa-google-plus"></i></a></li>
                        <li><a href="{{ $configs->github }}"><i class="fa fa-github"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>

    </div>

</footer>
