@extends('layouts.app_view')

@section('content')
<div class="container mt-4 mb-5"> <!-- Thêm mb-5 để tạo khoảng cách với footer -->
    <h2 class="mb-3">Thông tin giảng viên</h2>
    <div class="row">
        <!-- Thông tin cá nhân -->
        <div class="col-md-8">
            <div class="card border-primary">
                <div class="card-header bg-primary text-white">Thông tin cá nhân</div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <tr><th>Mã giảng viên</th><td>GV0{{ $lecturer->id }}</td></tr>
                        <tr><th>Họ tên</th><td><strong>{{ $lecturer->full_name }}</strong></td></tr>
                        <tr><th>Ngày sinh</th><td>{{ $lecturer->date_of_birth }}</td></tr>
                        <tr><th>Ngày tuyển dụng</th><td>{{ $lecturer->hire_date }}</td></tr>
                        <tr><th>Giới tính</th><td>{{ $lecturer->gender == 'male' ? 'Nam' : 'Nữ' }}</td></tr>
                        <tr><th>Email</th><td>{{ $lecturer->email }}</td></tr>
                        <tr><th>Số điện thoại</th><td>{{ $lecturer->phone }}</td></tr>
                        <tr><th>Địa chỉ</th><td>{{ $lecturer->address }}</td></tr>
                    </table>
                </div>
            </div>
        </div>
        
        <!-- Ảnh giảng viên -->
        <div class="col-md-4">
            <div class="card border-primary">
                <div class="card-header bg-primary text-white">Ảnh giảng viên</div>
                <div class="card-body text-center">
                    <img src="{{ asset('storage/' . $lecturer->image) }}" class="img-fluid" alt="Ảnh giảng viên">
                    <button class="btn btn-success mt-2">Cập nhật ảnh</button>
                </div>
            </div>
        </div>
    </div>


    <!-- Thông tin chuyên môn -->
    <div class="mt-4">
        <div class="card border-primary">
            <div class="card-header bg-primary text-white">Thông tin chuyên môn</div>
            <div class="card-body">
                <table class="table table-bordered">
                <tr><th>Trình độ</th><td>{{ $lecturer->degree->degree_name }}</td></tr>
                <tr><th>Khoa</th><td>{{ $lecturer->department->department_name }}</td></tr>


                </table>
            </div>
        </div>
    </div>
</div>
@endsection