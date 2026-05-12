<nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
    <!-- Navbar Brand-->
    <a class="navbar-brand ps-3" href="{{ route("dashboard") }}">البداية</a>
    <!-- Sidebar Toggle-->
    <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
    <!-- Navbar Search-->
    <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
        <div class="input-group">
            {{-- <input class="form-control" type="text" placeholder="البحث عن..." aria-label="البحث عن..." aria-describedby="btnNavbarSearch" />
            <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button> --}}
        </div>
    </form>
    <!-- Navbar-->
    <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">

                {{-- هنا تم التعديل --}}
                @auth
                    {{-- عرض اسم المستخدم كنص ثابت في أعلى القائمة --}}
                   <li> <span class="dropdown-item-text">
                    <i class="fas fa-user fa-fw ms-2"></i>{{ Auth::user()->username }}</span>
                    </li>

                    <li><hr class="dropdown-divider" /></li>
                @endauth

                {{-- بقية الروابط الأصلية --}}
               <li>
                  <a class="dropdown-item" href="{{ route("accountlogin" ) }}">
                  <i class="fas fa-user-plus ms-2"></i>
                       إنشاء حساب جديد
                 </a>
               </li>
                {{-- <li><a class="dropdown-item" href="{{ route("password.reset") }}">نسيت كلمة المرور</a></li> --}}
                <li><hr class="dropdown-divider" /></li>
                 <li>
                    <a class="dropdown-item" href="{{ route('login') }}">
                        <i class="fas fa-sign-out-alt fa-fw ms-2"></i>تسجيل الخروج
                    </a>
                </li>
            </ul>
        </li>
    </ul>
</nav>
