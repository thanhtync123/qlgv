@extends('layouts.app_view')

@section('content')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        @if (session('success'))
                            <div class="alert alert-success">
                                <strong>Thành công!</strong> {{ session('success') }}
                            </div>
                        @endif
                        @if (session('error'))
                            <div class="alert alert-danger">
                                <strong>Lỗi!</strong> {{ session('error') }}
                            </div>
                        @endif
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <strong>Lỗi!</strong>
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <h4 class="card-title">Quản Lý Lương</h4>
                            <div class="d-flex align-items-center">
                                <div class="me-3">
                                    <h5 class="mb-0">Tổng lương: <span class="text-primary" id="totalSalary">{{ number_format($totalSalary, 0, ',', '.') }} VNĐ</span></h5>
                                </div>
                                <form id="exportForm" action="{{ route('salary.export') }}" method="POST" target="_blank">
                                    @csrf
                                    <input type="hidden" name="currentPageData" id="currentPageData">
                                    <input type="hidden" name="currentPage" id="currentPage">
                                    <input type="hidden" name="totalPages" id="totalPages">
                                    <button type="submit" class="btn btn-primary" id="exportBtn">
                                        <i class="ti-download"></i> Xuất báo cáo
                                    </button>
                                </form>
                            </div>
                        </div>

                        <!-- Search and Filter Section -->
                        <div class="card mb-4">
                            <div class="card-body">
                                <form id="searchForm">
                                    <div class="row g-3">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="form-label">Tìm kiếm giảng viên</label>
                                                <div class="input-group">
                                                    <span class="input-group-text"><i class="ti-search"></i></span>
                                                    <input type="text" id="name" name="name" class="form-control" 
                                                           placeholder="Nhập tên giảng viên" oninput="disableDepartment()">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="form-label">Khoa</label>
                                                <select id="department" name="department" class="form-select" onchange="disableName()">
                                                    <option value="">Chọn khoa</option>
                                                    @foreach ($departments as $item)
                                                        <option value="{{$item->id}}">{{$item->department_name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="form-label">Sắp xếp</label>
                                                <select id="sortBy" name="sortBy" class="form-select">
                                                    <option value="name">Tên A-Z</option>
                                                    <option value="salary_asc">Lương thấp đến cao</option>
                                                    <option value="salary_desc">Lương cao đến thấp</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <!-- Salary Statistics Cards -->
                        <div class="row mb-4">
                            <div class="col-md-3">
                                <div class="card bg-primary text-white">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div>
                                                <h6 class="card-title">Lương trung bình</h6>
                                                <h3 id="avgSalary">{{ number_format($totalSalary / count($lecturers), 0, ',', '.') }} VNĐ</h3>
                                            </div>
                                            <i class="ti-money display-4"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="card bg-success text-white">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div>
                                                <h6 class="card-title">Tổng giảng viên</h6>
                                                <h3 id="totalLecturers">{{ count($lecturers) }}</h3>
                                            </div>
                                            <i class="ti-user display-4"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="card bg-info text-white">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div>
                                                <h6 class="card-title">Lương cao nhất</h6>
                                                <h3 id="maxSalary">{{ number_format($lecturers->max('salary'), 0, ',', '.') }} VNĐ</h3>
                                            </div>
                                            <i class="ti-arrow-up display-4"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="card bg-warning text-white">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div>
                                                <h6 class="card-title">Lương thấp nhất</h6>
                                                <h3 id="minSalary">{{ number_format($lecturers->min('salary'), 0, ',', '.') }} VNĐ</h3>
                                            </div>
                                            <i class="ti-arrow-down display-4"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Salary Table -->
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead>
                                    <tr class="table-primary">
                                        <th class="text-center fw-bold fs-5" style="border: 2px solid #dee2e6;">STT</th>
                                        <th class="text-center fw-bold fs-5" style="border: 2px solid #dee2e6;">Tên giảng viên</th>
                                        <th class="text-center fw-bold fs-5" style="border: 2px solid #dee2e6;">Khoa</th>
                                        <th class="text-center fw-bold fs-5" style="border: 2px solid #dee2e6;">Hệ số lương</th>
                                        <th class="text-center fw-bold fs-5" style="border: 2px solid #dee2e6;">Lương cơ bản</th>
                                        <th class="text-center fw-bold fs-5" style="border: 2px solid #dee2e6;">Lương nhận</th>
                                        <th class="text-center fw-bold fs-5" style="border: 2px solid #dee2e6;">Thao tác</th>
                                    </tr>
                                </thead>
                                <tbody id="lecturerTable">
                                    @foreach ($lecturers as $index => $lecturer)
                                        <tr>
                                            <td class="text-center fw-bold" style="border: 1px solid #dee2e6; font-size: 1.1rem;">{{ $index + 1 }}</td>
                                            <td class="text-center fw-bold" style="border: 1px solid #dee2e6; font-size: 1.1rem; color: #0d6efd;">{{ $lecturer->full_name }}</td>
                                            <td class="text-center fw-bold" style="border: 1px solid #dee2e6; font-size: 1.1rem; color: #198754;">{{ $lecturer->department_name }}</td>
                                            <td class="text-center fw-bold" style="border: 1px solid #dee2e6; font-size: 1.1rem; color: #dc3545;">{{ $lecturer->salary_coefficient }}</td>
                                            <td class="text-center fw-bold" style="border: 1px solid #dee2e6; font-size: 1.1rem; color: #fd7e14;">{{ number_format($lecturer->salary, 0, ',', '.') }} VNĐ</td>
                                            <td class="text-center fw-bold" style="border: 1px solid #dee2e6; font-size: 1.1rem; color: #20c997;">{{ number_format($lecturer->salary * $lecturer->salary_coefficient, 0, ',', '.') }} VNĐ</td>
                                            <td class="text-center" style="border: 1px solid #dee2e6;">
                                                <button type="button" class="btn btn-info btn-sm fw-bold" data-bs-toggle="modal" 
                                                        data-bs-target="#salaryDetailModal" 
                                                        data-lecturer-id="{{ $lecturer->id }}"
                                                        data-lecturer-name="{{ $lecturer->full_name }}">
                                                    <i class="ti-eye"></i> Chi tiết
                                                </button>
                                            </td>
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

<!-- Salary Detail Modal -->
<div class="modal fade" id="salaryDetailModal" tabindex="-1" aria-labelledby="salaryDetailModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="salaryDetailModalLabel">Chi tiết lương</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6">
                        <h6>Thông tin cơ bản</h6>
                        <table class="table table-bordered">
                            <tr>
                                <th>Tên giảng viên:</th>
                                <td id="detailName"></td>
                            </tr>
                            <tr>
                                <th>Khoa:</th>
                                <td id="detailDepartment"></td>
                            </tr>
                            <tr>
                                <th>Hệ số lương:</th>
                                <td id="detailCoefficient"></td>
                            </tr>
                        </table>
                    </div>
                    <div class="col-md-6">
                        <h6>Thông tin lương</h6>
                        <table class="table table-bordered">
                            <tr>
                                <th>Lương cơ bản:</th>
                                <td id="detailBaseSalary"></td>
                            </tr>
                            <tr>
                                <th>Lương nhận:</th>
                                <td id="detailTotalSalary"></td>
                            </tr>
                            <tr>
                                <th>Ngày cập nhật:</th>
                                <td id="detailUpdateDate"></td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                <button type="button" class="btn btn-primary" id="printSalaryBtn">In phiếu lương</button>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    function disableDepartment() {
        if (document.getElementById("name").value !== "") 
            document.getElementById("department").disabled = true;
        else 
            document.getElementById("department").disabled = false;
    }

    function disableName() {
        if (document.getElementById("department").value !== "") 
            document.getElementById("name").disabled = true;
        else 
            document.getElementById("name").disabled = false;
    }

    $(document).ready(function() {
        // Search functionality
        $('#searchForm').on('submit', function(e) {
            e.preventDefault();
            performSearch();
        });

        $('#name, #department, #sortBy').on('change input', function() {
            performSearch();
        });

        function performSearch() {
            let name = $('#name').val();
            let department = $('#department').val();
            let sortBy = $('#sortBy').val();

            $.ajax({
                url: '{{ route("salary.search") }}',
                method: 'GET',
                data: {
                    name: name,
                    department: department,
                    sortBy: sortBy
                },
                success: function(response) {
                    updateTable(response);
                    updateStatistics(response);
                },
                error: function(xhr) {
                    console.log('Error:', xhr);
                    alert('Có lỗi xảy ra, vui lòng thử lại!');
                }
            });
        }

        function updateTable(response) {
            let tableBody = '';
            $.each(response.lecturers, function(index, lecturer) {
                tableBody += `
                    <tr>
                        <td class="text-center fw-bold" style="border: 1px solid #dee2e6; font-size: 1.1rem;">${index + 1}</td>
                        <td class="text-center fw-bold" style="border: 1px solid #dee2e6; font-size: 1.1rem; color: #0d6efd;">${lecturer.full_name}</td>
                        <td class="text-center fw-bold" style="border: 1px solid #dee2e6; font-size: 1.1rem; color: #198754;">${lecturer.department_name}</td>
                        <td class="text-center fw-bold" style="border: 1px solid #dee2e6; font-size: 1.1rem; color: #dc3545;">${lecturer.salary_coefficient}</td>
                        <td class="text-center fw-bold" style="border: 1px solid #dee2e6; font-size: 1.1rem; color: #fd7e14;">${new Intl.NumberFormat('vi-VN').format(lecturer.salary)} VNĐ</td>
                        <td class="text-center fw-bold" style="border: 1px solid #dee2e6; font-size: 1.1rem; color: #20c997;">${new Intl.NumberFormat('vi-VN').format(lecturer.salary * lecturer.salary_coefficient)} VNĐ</td>
                        <td class="text-center" style="border: 1px solid #dee2e6;">
                            <button type="button" class="btn btn-info btn-sm fw-bold" data-bs-toggle="modal" 
                                    data-bs-target="#salaryDetailModal" 
                                    data-lecturer-id="${lecturer.id}"
                                    data-lecturer-name="${lecturer.full_name}">
                                <i class="ti-eye"></i> Chi tiết
                            </button>
                        </td>
                    </tr>`;
            });
            $('#lecturerTable').html(tableBody);
        }

        function updateStatistics(response) {
            $('#totalSalary').text(response.totalSalary);
            $('#avgSalary').text(response.avgSalary);
            $('#maxSalary').text(response.maxSalary);
            $('#minSalary').text(response.minSalary);
            $('#totalLecturers').text(response.totalLecturers);
        }

        // Export functionality
        $('#exportForm').on('submit', function(e) {
            // Get current page data
            let currentPageData = [];
            $('#lecturerTable tr').each(function() {
                let row = $(this);
                currentPageData.push({
                    name: row.find('td:eq(1)').text(),
                    department: row.find('td:eq(2)').text(),
                    coefficient: row.find('td:eq(3)').text(),
                    baseSalary: row.find('td:eq(4)').text(),
                    totalSalary: row.find('td:eq(5)').text()
                });
            });

            // Set form data
            $('#currentPageData').val(JSON.stringify(currentPageData));
            $('#currentPage').val($('.pagination .active').text());
            $('#totalPages').val($('.pagination li').length - 2);

            // Show loading state
            $('#exportBtn').prop('disabled', true).html('<i class="ti-reload"></i> Đang xử lý...');
        });

        // Print salary slip
        $('#printSalaryBtn').on('click', function() {
            let lecturerId = $('#salaryDetailModal').data('lecturer-id');
            if (lecturerId) {
                window.open('/salary/print/' + lecturerId, '_blank');
            } else {
                alert('Không tìm thấy thông tin giảng viên');
            }
        });

        // Store lecturer ID when opening modal
        $('#salaryDetailModal').on('show.bs.modal', function(event) {
            let button = $(event.relatedTarget);
            let lecturerId = button.data('lecturer-id');
            let lecturerName = button.data('lecturer-name');
            
            // Store lecturer ID in modal data
            $(this).data('lecturer-id', lecturerId);
            
            // Fetch lecturer details via AJAX
            $.ajax({
                url: '/salary/lecturer/' + lecturerId,
                method: 'GET',
                success: function(response) {
                    console.log('Response received:', response);
                    
                    if (response.error) {
                        console.error('Error in response:', response.error);
                        alert(response.error);
                        return;
                    }
                    
                    try {
                        $('#detailName').text(lecturerName);
                        $('#detailDepartment').text(response.department_name || 'N/A');
                        $('#detailCoefficient').text(response.salary_coefficient || 'N/A');
                        $('#detailBaseSalary').text(response.salary ? new Intl.NumberFormat('vi-VN').format(response.salary) + ' VNĐ' : 'N/A');
                        $('#detailTotalSalary').text(response.salary && response.salary_coefficient ? 
                            new Intl.NumberFormat('vi-VN').format(response.salary * response.salary_coefficient) + ' VNĐ' : 'N/A');
                        $('#detailUpdateDate').text(response.updated_at || 'N/A');
                        $('#salaryDetailModalLabel').text(`Chi tiết lương - ${lecturerName}`);
                    } catch (error) {
                        console.error('Error processing response:', error);
                        alert('Có lỗi xảy ra khi xử lý dữ liệu: ' + error.message);
                    }
                },
                error: function(xhr, status, error) {
                    console.error('AJAX Error:', {
                        status: status,
                        error: error,
                        response: xhr.responseText
                    });
                    
                    let errorMessage = 'Có lỗi xảy ra khi tải thông tin lương, vui lòng thử lại!';
                    if (xhr.responseJSON && xhr.responseJSON.error) {
                        errorMessage = xhr.responseJSON.error;
                    } else if (xhr.responseText) {
                        try {
                            const response = JSON.parse(xhr.responseText);
                            if (response.error) {
                                errorMessage = response.error;
                            }
                        } catch (e) {
                            console.error('Error parsing response:', e);
                        }
                    }
                    alert(errorMessage);
                }
            });
        });
    });
</script>
@endsection