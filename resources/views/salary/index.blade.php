@extends('layouts.app_view')

@section('content')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Bảng Lương</h4>
                        <h5>Tổng lương: <span id="totalSalary">{{ number_format($totalSalary, 0, ',', '.') }} VNĐ</span></h5>   

                        <form id="searchForm" class="mb-4">
                            <div class="row">
                                <div class="col-md-4">
                                    <input type="text" id="name" name="name" class="form-control" placeholder="Nhập tên giảng viên" 
                                        oninput="disableDepartment()">
                                </div>
                                <div class="col-md-4">
                                    <select id="department" name="department" class="form-control" onchange="disableName()">
                                        <option value="">Chọn khoa</option>
                                        @foreach ($departments as $item)
                                            <option value="{{$item->id}}">{{$item->department_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <button type="submit" class="btn btn-primary">Tìm kiếm</button>
                                </div>
                            </div>
                        </form>

                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>STT</th>
                                        <th>Tên giảng viên</th>
                                        <th>Tên khoa</th>
                                        <th>Hệ số lương</th>
                                        <th>Lương nhận</th>
                                    </tr>
                                </thead>
                                <tbody id="lecturerTable">
                                    @foreach ($lecturers as $index => $lecturer)
                                        <tr>
                                            <td>{{ $index + 1 }}</td>
                                            <td>{{ $lecturer->full_name }}</td>
                                            <td>{{ $lecturer->department_name }}</td>
                                            <td>{{ $lecturer->salary_coefficient }}</td>
                                            <td>{{ number_format($lecturer->salary * $lecturer->salary_coefficient, 0, ',', '.') }} VNĐ</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="d-flex justify-content-center mt-4">
                                {{ $lecturers->links() }}
                            </div>
                        </div>
                    </div>
                </div>
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
        $('#searchForm').on('submit', function(e) {
            e.preventDefault(); // Ngăn chặn gửi form mặc định

            let name = $('#name').val();
            let department = $('#department').val();

            $.ajax({
                url: '{{ route("salary.search") }}',
                method: 'GET',
                data: {
                    name: name,
                    department: department
                },
                success: function(response) {
                    // Cập nhật tổng lương
                    $('#totalSalary').text(response.totalSalary);

                    // Cập nhật bảng giảng viên
                    let tableBody = '';
                    $.each(response.lecturers, function(index, lecturer) {
                        tableBody += `
                            <tr>
                                <td>${index + 1}</td>
                                <td>${lecturer.full_name}</td>
                                <td>${lecturer.department_name}</td>
                                <td>${lecturer.salary_coefficient}</td>
                                <td>${new Intl.NumberFormat('vi-VN').format(lecturer.salary * lecturer.salary_coefficient)} VNĐ</td>
                            </tr>`;
                    });
                    $('#lecturerTable').html(tableBody);
                },
                error: function(xhr) {
                    console.log('Error:', xhr);
                    alert('Có lỗi xảy ra, vui lòng thử lại!');
                }
            });
        });

        // Gửi AJAX khi người dùng nhập tên hoặc chọn khoa
        $('#name').on('input', function() {
            $('#searchForm').submit();
        });

        $('#department').on('change', function() {
            $('#searchForm').submit();
        });
    });
</script>
@endsection