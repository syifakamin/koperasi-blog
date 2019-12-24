<aside id="leftsidebar" class="sidebar">
    <!-- User Info -->
    <div class="user-info">
        <div class="image">
            <img src="{{ asset('assets/backend/images/user.png') }}" width="48" height="48" alt="User" />    
        </div>
        <div class="info-container">
            <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" ">John Doe </div>
            <div class="email">labanana1322@gmail.com</div>
            <div class="btn-group user-helper-dropdown">
                <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" ">keyboard_arrow_down</i>
                <ul class="dropdown-menu pull-right">
                    <li><a href=""><i class="material-icons">input</i>Sign Out</a></li>
                </ul>
            </div>
        </div>
    </div>
    <!-- #User Info -->
    <!-- Menu -->
    <div class="menu">
        <ul class="list">
            <li class="header" i class="material-icons">MAIN</li> Admin Dashboard</li>
            <li>
                <a  href="{{url ('administrator/home')}}">
                    <i class="material-icons">dashboard</i>
                    <span>Dashboard</span>
                    
                </a>
                <a href="{{ route ('category.index')}}">
                    <i class="material-icons">layers</i>
                    <span>Kategori</span>
                </a>
            </li>
            <li>
                <a href="pages/typography.html">
                    <i class="material-icons">widgets</i>
                    <span>Pengaturan Toko</span>
                </a>
            </li>
            <li>
                <a class="nav-link" href="{{ route('product.index')}}">
                    <i class="nav-icon icon-drop"></i> Produk
                </a>
            </li>
        </ul>
    </div>
    <!-- #Menu -->
    <!-- Footer -->
    <div class="legal">
        <div class="copyright">
            &copy; 2016 - 2017 <a href="javascript:void(0);">AdminBSB - Material Design</a>.
        </div>
        <div class="version">
            <b>Version: </b> 1.0.5
        </div>
    </div>
    <!-- #Footer -->
</aside>
