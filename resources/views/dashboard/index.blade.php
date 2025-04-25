@extends('layouts.app_view')

@section('content')
<div class="main-panel">
    <div class="content-wrapper">
        <!-- Statistics Cards -->
        <div class="row">
            <div class="col-xl-4 col-sm-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-9">
                                <div class="d-flex align-items-center align-self-start">
                                    <h3 class="mb-0">{{ $totalLecturers }}</h3>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="icon icon-box-success">
                                    <span class="mdi mdi-account-multiple icon-item"></span>
                                </div>
                            </div>
                        </div>
                        <h6 class="text-muted font-weight-normal">Tổng số giảng viên</h6>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-sm-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-9">
                                <div class="d-flex align-items-center align-self-start">
                                    <h3 class="mb-0">{{ $totalDepartments }}</h3>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="icon icon-box-success">
                                    <span class="mdi mdi-domain icon-item"></span>
                                </div>
                            </div>
                        </div>
                        <h6 class="text-muted font-weight-normal">Tổng số khoa</h6>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-sm-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-9">
                                <div class="d-flex align-items-center align-self-start">
                                    <h3 class="mb-0">{{ $totalCourses }}</h3>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="icon icon-box-success">
                                    <span class="mdi mdi-book-open-page-variant icon-item"></span>
                                </div>
                            </div>
                        </div>
                        <h6 class="text-muted font-weight-normal">Tổng số môn học</h6>
                    </div>
                </div>
            </div>
        </div>

        <!-- Charts Row -->
        <div class="row">
            <!-- Salary Distribution Chart -->
            <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Phân bố lương theo khoa</h4>
                        <canvas id="salaryChart"></canvas>
                    </div>
                </div>
            </div>

            <!-- Lecturer Distribution Chart -->
            <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Phân bố giảng viên theo khoa</h4>
                        <canvas id="lecturerChart"></canvas>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main Content Row -->
        <div class="row">
            <!-- Department Statistics -->
            <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Thống kê theo khoa</h4>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Khoa</th>
                                        <th>Số GV</th>
                                        <th>Lương TB</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($lecturersByDepartment as $dept)
                                    <tr>
                                        <td>{{ $dept->department_name }}</td>
                                        <td>{{ $dept->total_lecturers }}</td>
                                        <td>{{ number_format($dept->avg_salary, 0, ',', '.') }} VNĐ</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Top Departments -->
            <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Khoa có nhiều giảng viên nhất</h4>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Khoa</th>
                                        <th>Số GV</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($topDepartments as $dept)
                                    <tr>
                                        <td>{{ $dept->department_name }}</td>
                                        <td>{{ $dept->lecturer_count }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Recent Lecturers -->
        <div class="row">
            <div class="col-12 grid-margin">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Giảng viên mới nhất</h4>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Hình ảnh</th>
                                        <th>Tên</th>
                                        <th>Khoa</th>
                                        <th>Lương</th>
                                        <th>Ngày thêm</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($recentLecturers as $lecturer)
                                    <tr>
                                        <td>
                                            <img src="{{ asset($lecturer->image) }}" class="rounded-circle" width="40" height="40" alt="avatar">
                                        </td>
                                        <td>{{ $lecturer->full_name }}</td>
                      
                                        <td>{{ number_format($lecturer->salary, 0, ',', '.') }} VNĐ</td>
                                        <td>{{ $lecturer->created_at->format('d/m/Y') }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Salary Distribution Chart
    const salaryCtx = document.getElementById('salaryChart').getContext('2d');
    new Chart(salaryCtx, {
        type: 'bar',
        data: {
            labels: {!! json_encode($lecturersByDepartment->pluck('department_name')) !!},
            datasets: [{
                label: 'Lương trung bình (VNĐ)',
                data: {!! json_encode($lecturersByDepartment->pluck('avg_salary')) !!},
                backgroundColor: 'rgba(54, 162, 235, 0.5)',
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
                        callback: function(value) {
                            return value.toLocaleString('vi-VN') + ' VNĐ';
                        }
                    }
                }
            }
        }
    });

    // Lecturer Distribution Chart
    const lecturerCtx = document.getElementById('lecturerChart').getContext('2d');
    new Chart(lecturerCtx, {
        type: 'pie',
        data: {
            labels: {!! json_encode($lecturersByDepartment->pluck('department_name')) !!},
            datasets: [{
                data: {!! json_encode($lecturersByDepartment->pluck('total_lecturers')) !!},
                backgroundColor: [
                    'rgba(255, 99, 132, 0.5)',
                    'rgba(54, 162, 235, 0.5)',
                    'rgba(255, 206, 86, 0.5)',
                    'rgba(75, 192, 192, 0.5)',
                    'rgba(153, 102, 255, 0.5)'
                ]
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    position: 'right'
                }
            }
        }
    });
});
</script>
@endsection 