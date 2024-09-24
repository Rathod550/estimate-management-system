<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-item">
            <a class="nav-link {{ Request::is('admin/dashboard*') ? '' : 'collapsed' }}" href="{{ route('dashboard') }}">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link {{ Request::is('admin/user*') ? '' : 'collapsed' }}" href="{{ route('admin.index') }}">
                <i class="fa fa-user" aria-hidden="true"></i>
                <span>Admins</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link {{ Request::is('admin/estimate*') ? '' : 'collapsed' }}" href="{{ route('admin.estimate') }}">
                <i class="fa fa-id-badge" aria-hidden="true"></i>
                <span>Estimates</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link {{ Request::is('admin/approval*') ? '' : 'collapsed' }}" href="{{ route('admin.estimate.approval') }}">
                <i class="fa fa-id-badge" aria-hidden="true"></i>
                <span>Estimates Approval</span>
            </a>
        </li>
    
        <li class="nav-item">
            <a class="nav-link {{ Request::is('admin/client*') ? '' : 'collapsed' }}" href="{{ route('admin.client') }}">
                <i class="fa fa-user" aria-hidden="true"></i>
                <span>Clients Master</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link {{ Request::is('admin/service*') ? '' : 'collapsed' }}" href="{{ route('admin.service') }}">
                <i class="fa fa-book" aria-hidden="true"></i>
                <span>Services Master</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link {{ Request::is('admin/category*') ? '' : 'collapsed' }}" href="{{ route('admin.category') }}">
                <i class="fa fa-sitemap" aria-hidden="true"></i>
                <span>Categorys Master</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link {{ Request::is('admin/udsn-reg*') ? '' : 'collapsed' }}" href="{{ route('admin.udsn.reg') }}">
                <i class="fa fa-cube" aria-hidden="true"></i>
                <span>Udsn Regs Master</span>
            </a>
        </li>

    </ul>

</aside><!-- End Sidebar-->