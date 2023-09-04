<div class="iq-sidebar">
    <div class="iq-sidebar-logo d-flex justify-content-between">
        <a href="index.html">
            {{-- <img src="images/logo.png" class="img-fluid" alt=""> --}}
            <span>Bina Marga</span>
        </a>
        <div class="iq-menu-bt-sidebar">
            <div class="iq-menu-bt align-self-center">
                <div class="wrapper-menu">
                    <div class="main-circle"><i class="ri-more-fill"></i></div>
                    <div class="hover-circle"><i class="ri-more-2-fill"></i></div>
                </div>
            </div>
        </div>
    </div>
    <div id="sidebar-scrollbar">
        <nav class="iq-sidebar-menu d-flex flex-column justify-content-between align-content-between"
            style="height: 80vh">
            <ul id="iq-sidebar-toggle" class="iq-menu">
                <hr>
                <li class="{{ request()->is('dashboard') || request()->is('folder/*') ? 'active' : '' }}">
                    <a href="{{ route('home') }}" class="iq-waves-effect"><i
                            class="ri-home-2-fill"></i><span>Dashboard</span></a>
                </li>
                <hr>
                <li class="{{ request()->is('daftar-pengguna') ? 'active' : '' }}">
                    <a href="{{ route('get.Index.Pengguna') }}" class="iq-waves-effect"><i
                            class="ri-user-2-fill"></i><span>Daftar
                            Pengguna</span></a>
                </li>
                <li class="{{ request()->is('setting') ? 'active' : '' }}">
                    <a href="{{ route('get.Index.Setting') }}" class="iq-waves-effect"><i
                            class="ri-settings-2-fill"></i><span>Pengaturan akun</span></a>
                </li>
                <hr>
            </ul>
            <ul id="iq-sidebar-toggle" class="iq-menu">
                <li class="{{ request()->is('sampah') ? 'active' : '' }}">
                    <a href="{{ route('get.Sampah') }}" class="iq-waves-effect"><i
                            class="fa fa-trash"></i><span>Sampah</span></a>
                </li>
            </ul>
        </nav>
        <div class="p-3"></div>
    </div>
</div>