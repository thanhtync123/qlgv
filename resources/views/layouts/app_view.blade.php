<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Your Title Here</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lykmapipo/themify-icons@0.1.2/css/themify-icons.css">
    <link rel="stylesheet" href="/vendors/base/vendor.bundle.base.css">
    <script src="https://code.jquery.com/jquery-3.6.0.slim.min.js"
            integrity="sha256-u7e5khyithlIdTpu22PHhENmPcRdFiHRjhAuHcs05RI="
            crossorigin="anonymous"></script>
    <!-- endinject -->
    <!-- inject:css -->
    <link rel="stylesheet" href="/css/style.css">
    <!-- endinject -->
    <link rel="shortcut icon" href="/images/favicon.png"/>

<<<<<<< HEAD
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    
    <style>
        :root {
            --primary-color: #2c3e50;
            --secondary-color: #34495e;
            --success-color: #27ae60;
            --danger-color: #e74c3c;
            --warning-color: #f39c12;
            --info-color: #3498db;
            --light-color: #ecf0f1;
            --dark-color: #2c3e50;
            --text-color: #2c3e50;
        }

        body {
            background-color: #f5f6fa;
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, sans-serif;
        }

        /* Navbar Styles */
        .navbar {
            background-color: white;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            padding: 1rem 0;
        }

        .navbar-brand {
            font-weight: 700;
            color: var(--primary-color) !important;
        }

        .navbar-brand img {
            border-radius: 8px;
            transition: transform 0.3s ease;
        }

        .navbar-brand:hover img {
            transform: scale(1.05);
        }

        /* Sidebar Styles */
        .sidebar {
            background: white;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            min-height: calc(100vh - 60px);
        }

        .nav-link {
            color: var(--text-color);
            padding: 0.8rem 1rem;
            border-radius: 8px;
            margin: 0.2rem 0;
            transition: all 0.3s ease;
        }

        .nav-link:hover {
            background-color: var(--light-color);
            color: var(--primary-color);
            transform: translateX(5px);
        }

        .nav-link i {
            margin-right: 10px;
            transition: transform 0.3s ease;
        }

        .nav-link:hover i {
            transform: scale(1.2);
        }

        /* Card Styles */
        .card {
            border: none;
            border-radius: 12px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            background-color: white;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
        }

        .card-header {
            background-color: white;
            color: var(--primary-color);
            border-radius: 12px 12px 0 0 !important;
            padding: 1rem;
            border-bottom: 1px solid #eee;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        /* Button Styles */
        .btn {
            border-radius: 8px;
            padding: 0.5rem 1.5rem;
            font-weight: 500;
            transition: all 0.3s ease;
        }

        .btn-primary {
            background-color: var(--primary-color);
            border: none;
        }

        .btn-primary:hover {
            background-color: var(--secondary-color);
            transform: translateY(-2px);
        }

        /* Table Styles */
        .table {
            border-radius: 12px;
            overflow: hidden;
            background-color: white;
        }

        .table thead th {
            background-color: var(--light-color);
            color: var(--primary-color);
            border: none;
            padding: 1rem;
            font-weight: 600;
        }

        .table tbody tr {
            transition: all 0.3s ease;
        }

        .table tbody tr:hover {
            background-color: var(--light-color);
        }

        /* Form Styles */
        .form-control {
            border-radius: 8px;
            padding: 0.75rem 1rem;
            border: 1px solid #eee;
            transition: all 0.3s ease;
        }

        .form-control:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 3px rgba(44, 62, 80, 0.1);
        }

        /* Alert Styles */
        .alert {
            border-radius: 12px;
            border: none;
            padding: 1rem;
        }

        .alert-success {
            background-color: #d4edda;
            color: var(--success-color);
        }

        .alert-danger {
            background-color: #f8d7da;
            color: var(--danger-color);
        }

        /* Footer Styles */
        .footer {
            background-color: white;
            color: var(--text-color);
            padding: 2rem 0;
            margin-top: 2rem;
            box-shadow: 0 -2px 4px rgba(0,0,0,0.1);
        }

        .footer h5 {
            font-weight: 600;
            margin-bottom: 1rem;
            color: var(--primary-color);
        }

        .footer .social-icons {
            display: flex;
            gap: 1rem;
            margin-top: 1rem;
        }

        .footer .social-icon {
            color: var(--primary-color);
            font-size: 1.5rem;
            transition: all 0.3s ease;
        }

        .footer .social-icon:hover {
            transform: translateY(-3px);
            color: var(--secondary-color);
        }

        /* Profile Styles */
        .profile-container {
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .profile-container img {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            border: 2px solid var(--light-color);
            transition: transform 0.3s ease;
        }

        .profile-container:hover img {
            transform: scale(1.1);
        }

        /* Responsive Styles */
        @media (max-width: 768px) {
            .sidebar {
                min-height: auto;
            }
            
            .navbar-brand img {
                width: 40px;
                height: 40px;
            }
            
            .profile-container h4 {
                font-size: 1rem;
            }
        }
=======
    <style>
        /* Custom styles for aligning greeting and image */
        .profile-container {
            display: flex;
            align-items: center; /* Vertically align items */
        }

        .profile-container h3 {
            margin-right: 10px; /* Add spacing between greeting and image */
            margin-bottom: 0; /* Reset default bottom margin */
        }

        .profile-container img {
            border-radius: 50%; /* Make the image circular */
            max-width: 40px; /* Adjust size as needed */
            height: auto;
        }


>>>>>>> 7d33372603d35ba805c7ab06a8499d5e457f79cf
    </style>
</head>

<body>
<div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
        <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
            <a class="navbar-brand brand-logo me-5" href="/"><img src="/lecturer_image/logo.jpg" 
                                                        class="me-2 logo-img"
                                                        alt="logo"/>
                                                    </a>
            <a class="navbar-brand brand-logo-mini" href="/"><img src="/lecturer_image/logo.jpg" alt="logo"/></a>
        </div>
        <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
            <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
                <span class="ti-view-list"></span>
            </button>
            <ul class="navbar-nav mr-lg-2">
            </ul>
            <ul class="navbar-nav navbar-nav-right">
                <li class="nav-item nav-profile dropdown">
                    <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown" id="profileDropdown">
                        <div class="profile-container">
                            @if(session('greeting'))
                                <h4>Xin chào {{ session('greeting') }}</h4>
                            @endif

                            @if(session('lecturer_image'))
                                <img src="{{ session('lecturer_image') }}" alt="Ảnh giảng viên">
                            @endif
                        </div>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
                        <a class="dropdown-item" href="/logout">
                            <i class="ti-power-off">
                                Đăng Xuất</i>
                        </a>
                    </div>
                </li>
            </ul>
            <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button"
                    data-toggle="offcanvas">
                <span class="ti-view-list"></span>
            </button>
        </div>
    </nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
        <!-- partial:partials -->
        <nav class="sidebar sidebar-offcanvas" id="sidebar">
            <ul class="nav">
                <li class="nav-item">
                    <a class="nav-link" href="/dashboard">
                        <i class="ti-shield menu-icon"></i>
                        <span class="menu-title">Bảng Điều Khiển</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="collapse" href="#ui-teacher" aria-expanded="false"
                       aria-controls="ui-teacher">
                        <i class="ti-briefcase menu-icon"></i>
                        <span class="menu-title">Quản Lý Giáo Viên</span>
                        <i class="menu-arrow"></i>
                    </a>
                    <div class="collapse" id="ui-teacher">
                        <ul class="nav flex-column sub-menu">
                            <li class="nav-item"><a class="nav-link" href="/lecturer/create">Thêm Giáo Viên</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/lecturer">Quản Lý Giáo Viên</a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="collapse" href="#ui-classroom" aria-expanded="false"
                       aria-controls="ui-classroom">
                        <i class="ti-menu-alt menu-icon"></i>
                        <span class="menu-title">Quản Lý Học Vị</span>
                        <i class="menu-arrow"></i>
                    </a>
                    <div class="collapse" id="ui-classroom">
                        <ul class="nav flex-column sub-menu">
                            <li class="nav-item"><a class="nav-link" href="/degree/create">Thêm Học Vị</a>
                            </li>
                            <li class="nav-item"><a class="nav-link"
                                                    href="/degree">Danh sách học vị</a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="collapse" href="#ui-student" aria-expanded="false"
                       aria-controls="ui-student">
                        <i class="ti-id-badge menu-icon"></i>
                        <span class="menu-title">Quản Lý Học Phần</span>
                        <i class="menu-arrow"></i>
                    </a>
                    <div class="collapse" id="ui-student">
                        <ul class="nav flex-column sub-menu">
                            <li class="nav-item"><a class="nav-link" href="/course/create">Thêm Học Phần</a>
                            </li>
                            <li class="nav-item"><a class="nav-link"
                                                    href="/course">Quản Lý Học Phần</a></li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="collapse" href="#ui-subject" aria-expanded="false"
                       aria-controls="ui-subject">
                        <i class="ti-ruler-pencil menu-icon"></i>
                        <span class="menu-title">Quản Lý Khoa</span>
                        <i class="menu-arrow"></i>
                    </a>
                    <div class="collapse" id="ui-subject">
                        <ul class="nav flex-column sub-menu">
                            <li class="nav-item"><a class="nav-link" href="/department/create">Thêm Khoa</a>
                            </li>
                            <li class="nav-item"><a class="nav-link"
                                                    href="/department">Quản Lý Khoa</a></li>
                        </ul>
                    </div>
                </li>

<<<<<<< HEAD
                <li class="nav-item">
=======
                                <li class="nav-item">
>>>>>>> 7d33372603d35ba805c7ab06a8499d5e457f79cf
                    <a class="nav-link" data-bs-toggle="collapse" href="#ui-salary" aria-expanded="false"
                        aria-controls="ui-salary">
                        <i class="ti-id-badge menu-icon"></i>
                        <span class="menu-title">Bảng lương</span>
                        <i class="menu-arrow"></i>
                    </a>
                    <div class="collapse" id="ui-salary">
                        <ul class="nav flex-column sub-menu">
                            <li class="nav-item"><a class="nav-link" href="/salary">Xem bảng lương</a>
                            </li>
                        </ul>
                    </div>
                </li>
<<<<<<< HEAD

                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="collapse" href="#ui-research" aria-expanded="false"
                        aria-controls="ui-research">
                        <i class="ti-book menu-icon"></i>
                        <span class="menu-title">Quản lý dự án nghiên cứu</span>
                        <i class="menu-arrow"></i>
                    </a>
                    <div class="collapse" id="ui-research">
                        <ul class="nav flex-column sub-menu">
                            <li class="nav-item"><a class="nav-link" href="{{ route('research-projects.create') }}">Thêm dự án</a></li>
                            <li class="nav-item"><a class="nav-link" href="{{ route('research-projects.index') }}">Danh sách dự án</a></li>
                        </ul>
                    </div>
                </li>

                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="collapse" href="#users" aria-expanded="false"
                    aria-controls="users">
                        <i class="ti-user menu-icon"></i>
                        <span class="menu-title">Quản Lý Người Dùng</span>
                        <i class="menu-arrow"></i>
                    </a>
                    <div class="collapse" id="users">
                        <ul class="nav flex-column sub-menu">
                            <li class="nav-item"><a class="nav-link" href="/manager/create"> Thêm Người Quản Lý </a></li>
                            <li class="nav-item"><a class="nav-link" href="/manager"> Quản Lý Người Dùng </a></li>
                        </ul>
                    </div>
                </li>
=======
    
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="collapse" href="#users" aria-expanded="false"
                        aria-controls="users">
                            <i class="ti-user menu-icon"></i>
                            <span class="menu-title">Quản Lý Người Dùng</span>
                            <i class="menu-arrow"></i>
                        </a>
                        <div class="collapse" id="users">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item"><a class="nav-link" href="/manager/create"> Thêm Người Quản Lý </a></li>
                                <li class="nav-item"><a class="nav-link" href="/manager"> Quản Lý Người Dùng </a></li>
                            </ul>
                        </div>
                    </li>
  

            
>>>>>>> 7d33372603d35ba805c7ab06a8499d5e457f79cf
            </ul>
        </nav>
        <!-- partial -->

    @yield('content')

    <!-- main-panel ends -->

</div>
<!-- page-body-wrapper ends -->
</div>
<!-- container-scroller -->

<!-- partial:partials/footer -->
<footer class="footer bg-dark text-light py-4">
    <div class="container">
        <div class="row">
            <!-- Cột 1: Giới thiệu -->
            <div class="col-md-4 text-center text-md-left mb-3">
                <h5>Về Chúng Tôi</h5>
                <p class="small">
                    Trang web cung cấp nội dung chất lượng về lập trình, công nghệ, và hướng dẫn hữu ích. Cùng nhau học tập và phát triển!
                </p>
            </div>

            <!-- Cột 2: Điều hướng -->
            <div class="col-md-4 text-center mb-3">
                <h5>Điều Hướng</h5>
                <ul class="list-unstyled">
                    <li><a href="#" class="text-light">Trang chủ</a></li>
                    <li><a href="#" class="text-light">Bài viết</a></li>
                    <li><a href="#" class="text-light">Dịch vụ</a></li>
                    <li><a href="#" class="text-light">Liên hệ</a></li>
                </ul>
            </div>

            <!-- Cột 3: Liên hệ & Mạng xã hội -->
            <div class="col-md-4 text-center text-md-right">
                <h5>Liên hệ</h5>
                <p class="small">Email: contact@example.com</p>
                <div class="social-icons mt-2">
                    <a href="#" class="social-icon"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" class="social-icon"><i class="fab fa-twitter"></i></a>
                    <a href="#" class="social-icon"><i class="fab fa-linkedin-in"></i></a>
                    <a href="#" class="social-icon"><i class="fab fa-instagram"></i></a>
                </div>
            </div>
        </div>

        <!-- Dòng bản quyền -->
        <div class="text-center mt-3 small">
            © 2021 - 2025 <a href="https://omarkadish.wordpress.com/" target="_blank" class="text-warning">Omar
                KADISH</a>. All Rights Reserved.
        </div>
    </div>
</footer>

<!-- CSS -->
<style>
    .footer {
        background: linear-gradient(135deg, #232526, #414345);
        color: #ffffff;
    }

    .footer h5 {
        font-weight: bold;
    }

    .footer .list-unstyled li a {
        text-decoration: none;
        transition: color 0.3s ease-in-out;
    }

    .footer .list-unstyled li a:hover {
        color: #f0ad4e;
    }

    .social-icons {
        display: flex;
        justify-content: center;
        gap: 10px;
    }

    .social-icon {
        color: #ffffff;
        font-size: 20px;
        transition: transform 0.3s ease-in-out, color 0.3s ease-in-out;
    }



</style>

<!-- FontAwesome -->
<script src="https://kit.fontawesome.com/YOUR_KIT_CODE.js" crossorigin="anonymous"></script>


<!-- FontAwesome for icons -->
<script src="https://kit.fontawesome.com/YOUR_KIT_CODE.js" crossorigin="anonymous"></script>
<!-- partial -->

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<script type="text/javascript">
    $(function () {
        // Multiple images preview with JavaScript
        var multiImgPreview = function (input, imgPreviewPlaceholder) {
            if (imgPreviewPlaceholder.files) {
                imgPreviewPlaceholder.files.clear();
            }
            if (input.files) {
                var filesAmount = input.files.length;
                for (i = 0; i < filesAmount; i++) {
                    var reader = new FileReader();
                    reader.onload = function (event) {
                        var $clone = $($.parseHTML('<img>'));
                        $clone.attr('class', 'image_pr');
                        $clone.attr('style', 'max-width: 200px;');
                        $clone.attr('src', event.target.result).appendTo(imgPreviewPlaceholder);
                    }
                    reader.readAsDataURL(input.files[i]);

                }
            }
        };
        $('#images').on('change', function () {
            multiImgPreview(this, 'div.preview-image');
        });
        $('#photo').on('change', function () {
            // To delete the uploaded photo from preview after selecting new photo
            var arr = document.getElementsByClassName('image_pr');
            if (arr.length) {
                for (var i = 0; i < arr.length; i++) {
                    arr[i].remove();
                }
            }
            multiImgPreview(this, 'div.preview-image');
        });
    });

</script>
<!-- plugins:js -->

<script src="/vendors/base/vendor.bundle.base.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.9.1/chart.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.js"
        type="text/javascript"></script>

<!-- Custom js for dashboard-->
<script src="/js/off-canvas.js"></script>
<script src="/js/hoverable-collapse.js"></script>
<script src="/js/template.js"></script>
<script src="/js/chart.js"></script>
<script src="/js/file-upload.js"></script>
<!-- End custom js for dashboard-->

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>


</body>

</html>