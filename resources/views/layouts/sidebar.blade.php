<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item {{ request()->is('dashboard') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('dashboard') }}">
                <i class="mdi mdi-home menu-icon"></i>
                <span class="menu-title">Dashboard</span>
            </a>
        </li>

        <li class="nav-item {{ request()->is('lecturer*') ? 'active' : '' }}">
            <a class="nav-link" data-bs-toggle="collapse" href="#lecturer-menu" aria-expanded="{{ request()->is('lecturer*') ? 'true' : 'false' }}" aria-controls="lecturer-menu">
                <i class="mdi mdi-account-multiple menu-icon"></i>
                <span class="menu-title">Quản lý giảng viên</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse {{ request()->is('lecturer*') ? 'show' : '' }}" id="lecturer-menu">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('lecturer') ? 'active' : '' }}" href="{{ route('lecturer.index') }}">Danh sách giảng viên</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('lecturer/create') ? 'active' : '' }}" href="{{ route('lecturer.create') }}">Thêm giảng viên</a>
                    </li>
                </ul>
            </div>
        </li>

        <li class="nav-item {{ request()->is('department*') ? 'active' : '' }}">
            <a class="nav-link" data-bs-toggle="collapse" href="#department-menu" aria-expanded="{{ request()->is('department*') ? 'true' : 'false' }}" aria-controls="department-menu">
                <i class="mdi mdi-domain menu-icon"></i>
                <span class="menu-title">Quản lý khoa</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse {{ request()->is('department*') ? 'show' : '' }}" id="department-menu">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('department') ? 'active' : '' }}" href="{{ route('department.index') }}">Danh sách khoa</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('department/create') ? 'active' : '' }}" href="{{ route('department.create') }}">Thêm khoa</a>
                    </li>
                </ul>
            </div>
        </li>

        <li class="nav-item {{ request()->is('course*') ? 'active' : '' }}">
            <a class="nav-link" data-bs-toggle="collapse" href="#course-menu" aria-expanded="{{ request()->is('course*') ? 'true' : 'false' }}" aria-controls="course-menu">
                <i class="mdi mdi-book-open-page-variant menu-icon"></i>
                <span class="menu-title">Quản lý môn học</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse {{ request()->is('course*') ? 'show' : '' }}" id="course-menu">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('course') ? 'active' : '' }}" href="{{ route('course.index') }}">Danh sách môn học</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('course/create') ? 'active' : '' }}" href="{{ route('course.create') }}">Thêm môn học</a>
                    </li>
                </ul>
            </div>
        </li>

        <li class="nav-item {{ request()->is('degree*') ? 'active' : '' }}">
            <a class="nav-link" data-bs-toggle="collapse" href="#degree-menu" aria-expanded="{{ request()->is('degree*') ? 'true' : 'false' }}" aria-controls="degree-menu">
                <i class="mdi mdi-school menu-icon"></i>
                <span class="menu-title">Quản lý học vị</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse {{ request()->is('degree*') ? 'show' : '' }}" id="degree-menu">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('degree') ? 'active' : '' }}" href="{{ route('degree.index') }}">Danh sách học vị</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('degree/create') ? 'active' : '' }}" href="{{ route('degree.create') }}">Thêm học vị</a>
                    </li>
                </ul>
            </div>
        </li>

        <li class="nav-item {{ request()->is('salary*') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('salary.index') }}">
                <i class="mdi mdi-cash-multiple menu-icon"></i>
                <span class="menu-title">Quản lý lương</span>
            </a>
        </li>
    </ul>
</nav>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Lấy URL hiện tại
    const currentPath = window.location.pathname;
    
    // Tìm tất cả các menu item
    const menuItems = document.querySelectorAll('.nav-item');
    
    // Duyệt qua từng menu item
    menuItems.forEach(item => {
        const link = item.querySelector('a.nav-link');
        if (link) {
            const href = link.getAttribute('href');
            
            // Kiểm tra nếu URL hiện tại chứa đường dẫn của menu
            if (currentPath.includes(href) && href !== '/') {
                item.classList.add('active');
                
                // Nếu có menu con, tự động mở ra
                const collapse = item.querySelector('.collapse');
                if (collapse) {
                    collapse.classList.add('show');
                    link.setAttribute('aria-expanded', 'true');
                }
            }
        }
    });
});
</script> 