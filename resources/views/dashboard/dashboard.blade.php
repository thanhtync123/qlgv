@extends('layouts.app_view')

@section('content')
<div class="container-fluid">
    <div class="row">
        <!-- Main content -->
        <main class="col-md-10 col-lg-11 px-md-4 mb-5">


            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">Tổng quan hệ thống</h1>
                <div class="btn-toolbar mb-2 mb-md-0">
                    <div class="btn-group me-2">
                        <button type="button" class="btn btn-sm btn-outline-secondary">Xuất báo cáo</button>
                        <button type="button" class="btn btn-sm btn-outline-secondary">Cài đặt</button>
                    </div>
                    <button type="button" class="btn btn-sm btn-outline-primary dropdown-toggle">
                        <span data-feather="calendar"></span>
                        Học kỳ hiện tại
                    </button>
                </div>
            </div>

            <!-- Summary Cards -->
            <div class="row mb-4">
                <div class="col-md-3">
                    <div class="card text-white bg-primary mb-3">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <div>Giảng viên</div>
                            <i class="fas fa-chalkboard-teacher fa-2x"></i>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">{{ $lecturerCount ?? 11 }}</h5>
                            <p class="card-text">Tổng số giảng viên</p>
                        </div>
                        <div class="card-footer bg-transparent border-top-0">
                            <small>4 giảng viên mới trong tháng</small>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card text-white bg-success mb-3">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <div>Khoa</div>
                            <i class="fas fa-university fa-2x"></i>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">{{ $departmentCount ?? 10 }}</h5>
                            <p class="card-text">Tổng số khoa</p>
                        </div>
                        <div class="card-footer bg-transparent border-top-0">
                            <small>Hoạt động đầy đủ</small>
                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="card text-white bg-warning mb-3">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <div>Tài khoản</div>
                            <i class="fas fa-users fa-2x"></i>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">{{ $accountCount ?? 4 }}</h5>
                            <p class="card-text">Tài khoản hoạt động</p>
                        </div>
                        <div class="card-footer bg-transparent border-top-0">
                            <small>1 tài khoản chờ kích hoạt</small>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Faculty Distribution Chart -->
            <div class="row mb-4">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title mb-0">Phân bố giảng viên theo khoa</h5>
                        </div>
                        <div class="card-body">
                            <canvas id="facultyDistributionChart" height="250"></canvas>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title mb-0">Phân bố giảng viên theo học vị</h5>
                        </div>
                        <div class="card-body">
                            <canvas id="degreeDistributionChart" height="250"></canvas>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Recent Activity and Faculty Stats -->
            <div class="row mb-4">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h5 class="card-title mb-0">Hoạt động gần đây</h5>
                            <button class="btn btn-sm btn-outline-secondary">Xem tất cả</button>
                        </div>
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>Hoạt động</th>
                                            <th>Người thực hiện</th>
                                            <th>Thời gian</th>
                                            <th>Trạng thái</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Thêm giảng viên mới</td>
                                            <td>Nguyễn Thành Tỷ</td>
                                            <td>10 phút trước</td>
                                            <td><span class="badge bg-success">Hoàn thành</span></td>
                                        </tr>
                                        <tr>
                                            <td>Cập nhật thông tin khoa</td>
                                            <td>Phạm Thị Mai</td>
                                            <td>1 giờ trước</td>
                                            <td><span class="badge bg-success">Hoàn thành</span></td>
                                        </tr>

                                        <tr>
                                            <td>Cập nhật lương giảng viên</td>
                                            <td>Nguyễn Văn Hùng</td>
                                            <td>5 giờ trước</td>
                                            <td><span class="badge bg-warning">Đang xử lý</span></td>
                                        </tr>
                                        <tr>
                                            <td>Điều chỉnh phân công giảng dạy</td>
                                            <td>Trần Đức Anh</td>
                                            <td>1 ngày trước</td>
                                            <td><span class="badge bg-success">Hoàn thành</span></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title mb-0">Thống kê hợp đồng</h5>
                        </div>
                        <div class="card-body">
                            <canvas id="contractTypeChart" height="250"></canvas>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Recent Lecturers and Upcoming Events -->
            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h5 class="card-title mb-0">Giảng viên mới</h5>
                            <button class="btn btn-sm btn-outline-secondary">Xem tất cả</button>
                        </div>
                        <div class="card-body p-0">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                                    <div class="d-flex align-items-center">
                                        <img src="/lecturer_image/1741229954_images.jpg" class="rounded-circle me-3" width="40" height="40" alt="Profile Image">
                                        <div>
                                            <h6 class="mb-0">Nguyễn Thành Tỷ</h6>
                                            <small class="text-muted">Khoa Công nghệ Thông tin</small>
                                        </div>
                                    </div>
                                    <span class="badge bg-primary rounded-pill">Nghiên cứu sinh</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                                    <div class="d-flex align-items-center">
                                        <img src="/lecturer_image/default.jpg" class="rounded-circle me-3" width="40" height="40" alt="Profile Image">
                                        <div>
                                            <h6 class="mb-0">Phan Thị Kim</h6>
                                            <small class="text-muted">Khoa Ngoại Ngữ</small>
                                        </div>
                                    </div>
                                    <span class="badge bg-primary rounded-pill">Kỹ sư</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                                    <div class="d-flex align-items-center">
                                        <img src="/lecturer_image/1741231760_476867143_1590607448238877_2116094028939920549_n.jpg" class="rounded-circle me-3" width="40" height="40" alt="Profile Image">
                                        <div>
                                            <h6 class="mb-0">Zakuza</h6>
                                            <small class="text-muted">Khoa Công nghệ Thông tin</small>
                                        </div>
                                    </div>
                                    <span class="badge bg-primary rounded-pill">Kỹ sư</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h5 class="card-title mb-0">Sự kiện sắp tới</h5>
                            <button class="btn btn-sm btn-outline-secondary">Thêm mới</button>
                        </div>
                        <div class="card-body p-0">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item p-3">
                                    <div class="d-flex justify-content-between align-items-center mb-2">
                                        <h6 class="mb-0">Hội nghị khoa học năm 2025</h6>
                                        <span class="badge bg-danger">15/03/2025</span>
                                    </div>
                                    <p class="text-muted mb-0 small">Hội trường A, Tòa nhà Trung tâm</p>
                                </li>
                                <li class="list-group-item p-3">
                                    <div class="d-flex justify-content-between align-items-center mb-2">
                                        <h6 class="mb-0">Đào tạo phương pháp giảng dạy mới</h6>
                                        <span class="badge bg-warning">28/03/2025</span>
                                    </div>
                                    <p class="text-muted mb-0 small">Phòng học 305, Khoa CNTT</p>
                                </li>
                                <li class="list-group-item p-3">
                                    <div class="d-flex justify-content-between align-items-center mb-2">
                                        <h6 class="mb-0">Lễ kỷ niệm 20 năm thành lập trường</h6>
                                        <span class="badge bg-info">10/04/2025</span>
                                    </div>
                                    <p class="text-muted mb-0 small">Sân vận động trường</p>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</div>

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Faculty Distribution Chart
        const facultyCtx = document.getElementById('facultyDistributionChart').getContext('2d');
        new Chart(facultyCtx, {
            type: 'bar',
            data: {
                labels: ['CNTT', 'Kinh tế', 'Luật', 'Y Dược', 'Ngoại Ngữ', 'Điện - Điện Tử', 'Môi Trường', 'Nông Nghiệp', 'KHCB', 'Báo Chí'],
                datasets: [{
                    label: 'Số lượng giảng viên',
                    data: [4, 2, 1, 1, 1, 0, 0, 0, 1, 0],
                    backgroundColor: 'rgba(54, 162, 235, 0.7)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            stepSize: 1
                        }
                    }
                }
            }
        });

        // Degree Distribution Chart
        const degreeCtx = document.getElementById('degreeDistributionChart').getContext('2d');
        new Chart(degreeCtx, {
            type: 'pie',
            data: {
                labels: ['Cử nhân', 'Kỹ sư', 'Thạc sĩ', 'Tiến sĩ', 'Phó giáo sư', 'Giáo sư', 'Chuyên viên cao cấp', 'Nghiên cứu sinh'],
                datasets: [{
                    data: [3, 4, 1, 0, 1, 0, 1, 1],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.7)',
                        'rgba(54, 162, 235, 0.7)',
                        'rgba(255, 206, 86, 0.7)',
                        'rgba(75, 192, 192, 0.7)',
                        'rgba(153, 102, 255, 0.7)',
                        'rgba(255, 159, 64, 0.7)',
                        'rgba(199, 199, 199, 0.7)',
                        'rgba(83, 102, 255, 0.7)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'right',
                    }
                }
            }
        });

        // Contract Type Chart
        const contractCtx = document.getElementById('contractTypeChart').getContext('2d');
        new Chart(contractCtx, {
            type: 'doughnut',
            data: {
                labels: ['Biên chế', 'Hợp đồng', 'Thỉnh giảng'],
                datasets: [{
                    data: [6, 5, 0],
                    backgroundColor: [
                        'rgba(75, 192, 192, 0.7)',
                        'rgba(255, 206, 86, 0.7)',
                        'rgba(255, 99, 132, 0.7)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'bottom',
                    }
                }
            }
        });
    });
</script>
@endpush
@endsection