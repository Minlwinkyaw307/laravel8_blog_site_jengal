<div class="header navbar">
    <div class="header-container">
        <ul class="nav-left">
            <li><a id="sidebar-toggle" class="sidebar-toggle" href="javascript:void(0);"><i class="ti-menu"></i></a>
            </li>
        </ul>
        <ul class="nav-right">
            <li class="dropdown"><a href="#" class="dropdown-toggle no-after peers fxw-nw ai-c lh-1"
                                    data-toggle="dropdown">
                    <div class="peer mR-10"><img class="w-2r bdrs-50p"
                                                 src="../../../randomuser.me/api/portraits/men/10.jpg" alt="">
                    </div>
                    <div class="peer"><span class="fsz-sm c-grey-900">{{ \Illuminate\Support\Facades\Auth::user()->name }}</span></div>
                </a>
                <ul class="dropdown-menu fsz-sm">
                    <li><a href="{{ route('admin.site-config.edit', 1) }}" class="d-b td-n pY-5 bgcH-grey-100 c-grey-700 px-3"><i
                                class="ti-settings mR-10"></i> <span>Setting</span></a></li>
                    <li>
                        <form action="{{ route('admin.logout') }}" method="post">
                            @csrf
                            <button  class="pY-5 bgcH-grey-100 c-grey-700 d-block px-3 outline-none" style="outline: none;"><i style="outline: none;"
                                class="ti-power-off mR-10 outline-none"></i>
                                Logout
                            </button>
                        </form>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</div>
