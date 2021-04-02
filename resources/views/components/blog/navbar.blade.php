<header id="header">
    <div id="nav">

        <div id="nav-fixed">
            <div class="container">

                <div class="nav-logo">
                    <a href="{{ route('blog.index') }}" class="logo"><img src="{{ url('blog/') }}/img/logo.png" alt=""></a>
                </div>

                <ul class="nav-menu nav navbar-nav">
                    <li><a href="{{ route('blog.blogs') }}">Blogs</a></li>
                    @foreach($categories as $category)
                        @if($loop->index === 5)
                            @break
                        @endif
                        <li class="{{ $category->slug }}"><a
                                href="{{ route('blog.blogs', array_merge(request()->query(), ['category' => $category->slug])) }}">{{ $category->name }}</a>
                        </li>
                    @endforeach
                </ul>


                <div class="nav-btns">
                    <button class="aside-btn"><i class="fa fa-bars"></i></button>
                    <button class="search-btn"><i class="fa fa-search"></i></button>
                    <form action="{{ route('blog.blogs', request()->query()) }}" method="get">
                        <div class="search-form">

                            <input class="search-input" type="text" name="search" placeholder="Enter Your Search ...">
                            <button class="search-close"><i class="fa fa-times"></i></button>
                        </div>
                    </form>

                </div>

            </div>
        </div>


        <div id="nav-aside">

            <div class="section-row">
                <ul class="nav-aside-menu">
                    <li><a href="index.html">Home</a></li>
                    <li><a href="about.html">About Us</a></li>
                    <li><a href="contact.html">Contacts</a></li>
                </ul>
            </div>


            <div class="section-row">
                <h3>Follow us</h3>
                <ul class="nav-aside-social">
                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                    <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                    <li><a href="#"><i class="fa fa-pinterest"></i></a></li>
                </ul>
            </div>


            <button class="nav-aside-close"><i class="fa fa-times"></i></button>

        </div>

    </div>

</header>
