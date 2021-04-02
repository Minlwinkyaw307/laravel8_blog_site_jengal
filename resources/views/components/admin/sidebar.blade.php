<div class="sidebar">
    <div class="sidebar-inner">
        <div class="sidebar-logo">
            <div class="peers ai-c fxw-nw">
                <div class="peer peer-greed"><a class="sidebar-link td-n" href="index.html" class="td-n">
                        <div class="peers ai-c fxw-nw">
                            <div class="peer">
                                <div class="logo"><img src="{{ url("dashboard/") }}/images/logo.png" alt=""></div>
                            </div>
                            <div class="peer peer-greed"><h5 class="lh-1 mB-0 logo-text">Adminator</h5></div>
                        </div>
                    </a></div>
                <div class="peer">
                    <div class="mobile-toggle sidebar-toggle"><a href="#" class="td-n"><i
                                class="ti-arrow-circle-left"></i></a></div>
                </div>
            </div>
        </div>
        <ul class="sidebar-menu scrollable pos-r">
            @foreach(config('navigations') as $navigation)
                <li class="nav-item mT-30 {{ \Illuminate\Support\Facades\Route::currentRouteName() == $navigation['route'] ? 'active' : '' }}">
                    <a class="sidebar-link" href="{{ route($navigation['route']) }}" default>
                        <span
                            class="icon-holder"><i class="c-blue-500 {{ $navigation['icon'] }}"></i>
                        </span>
                        <span
                            class="title">{{ $navigation['name'] }}
                        </span>
                    </a>
                </li>
            @endforeach
        </ul>
    </div>
</div>
