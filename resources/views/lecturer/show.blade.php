@extends('layouts.app_view')

@section('content')
<div class="container mt-4 mb-5">
    <h2 class="mb-3">Thông tin giảng viên</h2>
    <a href="{{ url('lecturer/edit/' . $lecturer->id) }}">
        <button type="button" class="btn btn-warning">
                <i class="bi bi-pencil"></i> Chỉnh sửa
        </button>
    </a>
    <br> <br>
    <div class="row">
        <!-- Hiển thị ảnh giảng viên -->
            <div class="col-md-4">
                <div class="card border-primary">
                    <div class="card-header bg-primary text-white">Ảnh giảng viên</div>
                    <div class="card-body text-center">
              <img src="{{ $lecturer->image ? asset($lecturer->image) : asset('lecturer_image/default.jpg') }}" 

                        alt="Ảnh giảng viên" 
                        class="img-fluid rounded" 
                        style="max-width: 100%; height: auto;">
                    </div>
                </div>
            </div>
  


        <!-- Thông tin cá nhân -->
        <div class="col-md-8">
            <div class="card border-primary">
                <div class="card-header bg-primary text-white">Thông tin cá nhân</div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <tr><th>Mã giảng viên</th><td>GV0{{ $lecturer->id }}</td></tr>
                        <tr><th>Họ tên</th><td><strong>{{ $lecturer->full_name }}</strong></td></tr>
                        <tr><th>Ngày sinh</th><td>{{ \Carbon\Carbon::parse($lecturer->date_of_birth)->format('d/m/Y') }}</td></tr>
                        <tr><th>Tuổi</th><td>{{ \Carbon\Carbon::parse($lecturer->date_of_birth)->age }} tuổi</td></tr>
                        <tr><th>Ngày tuyển dụng</th><td>{{ \Carbon\Carbon::parse($lecturer->hire_date)->format('d/m/Y')}}</td></tr>
                        <tr><th>Giới tính</th><td>{{ $lecturer->gender == 'Male' ? 'Nam' : 'Nữ' }}</td></tr>
                        <tr><th>Email</th><td>{{ $lecturer->email }}</td></tr>
                        <tr><th>Số điện thoại</th><td>{{ $lecturer->phone }}</td></tr>
                        <tr><th>Địa chỉ</th><td>{{ $lecturer->address }}</td></tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
        <!-- Thông tin công tác -->
        <div class="mt-4">
                <div class="card border-primary">
                    <div class="card-header bg-primary text-white">Thông tin công tác</div>
                    <div class="card-body">
                        <table class="table table-bordered">
                        <tr><th>Trình độ</th><td>{{ $lecturer->degree->degree_name }}</td></tr>
                        <tr><th>Khoa</th><td>{{ $lecturer->department->department_name }}</td></tr>


                        </table>
                    </div>
                </div>
            </div>
    <!-- Thông tin hợp đồng -->
    <div class="mt-4">
        <div class="card border-primary">
            <div class="card-header bg-primary text-white">Thông tin hợp đồng</div>
            <div class="card-body">
                <table class="table table-bordered">
                    <tr><th>Loại hợp đồng</th><td>{{ $lecturer->contract_type }}</td></tr>
                    <tr><th>Lương</th><td>{{ number_format($lecturer->salary, 0, ',', '.') }} VNĐ</td></tr>
                    <tr><th>Hệ số lương</th><td>{{ $lecturer->salary_coefficient }}</td></tr>
                </table>
            </div>
        </div>
    </div>

    <!-- Thông tin trình độ chuyên môn -->
    <div class="mt-4">
        <div class="card border-primary">
            <div class="card-header bg-primary text-white">Thông tin trình độ chuyên môn</div>
            <div class="card-body">
                <table class="table table-bordered">
                    <tr><th>Chuyên ngành</th><td>{{ $lecturer->major }}</td></tr>
                    <tr><th>Trường tốt nghiệp</th><td>{{ $lecturer->university }}</td></tr>
                    <tr><th>Năm tốt nghiệp</th><td>{{ $lecturer->graduation_year }}</td></tr>
                    <tr><th>Chứng chỉ</th><td>{{ $lecturer->certifications }}</td></tr>
                </table>
            </div>
        </div>
    </div>

    <!-- Thông tin kinh nghiệm giảng dạy & công tác -->
    <div class="mt-4">
        <div class="card border-primary">
            <div class="card-header bg-primary text-white">Kinh nghiệm giảng dạy & công tác</div>
            <div class="card-body">
                <table class="table table-bordered">
                    <tr><th>Môn giảng dạy</th><td>{{ $lecturer->teaching_subjects }}</td></tr>
                    <tr><th>Số năm kinh nghiệm</th><td>{{ $lecturer->teaching_experience_years }}</td></tr>
                    <tr><th>Nơi công tác trước đây</th><td>{{ $lecturer->previous_workplaces }}</td></tr>
                </table>
            </div>
        </div>
    </div>

    <!-- Thông tin nghiên cứu khoa học -->
    <div class="mt-4">
        <div class="card border-primary">
            <div class="card-header bg-primary text-white">Nghiên cứu khoa học</div>
            <div class="card-body">
                <table class="table table-bordered">
                    <tr><th>Bài báo đã công bố</th><td>{{ $lecturer->published_papers }}</td></tr>
                    <tr><th>Sách đã xuất bản</th><td>{{ $lecturer->published_books }}</td></tr>
                </table>
            </div>
        </div>
    </div>

    <!-- Thông tin khen thưởng & kỷ luật -->
    <div class="mt-4">
        <div class="card border-primary">
            <div class="card-header bg-primary text-white">Khen thưởng & kỷ luật</div>
            <div class="card-body">
                <table class="table table-bordered">
                    <tr><th>Giải thưởng</th><td>{{ $lecturer->awards }}</td></tr>
                    <tr><th>Khen thưởng</th><td>{{ $lecturer->commendations }}</td></tr>
                </table>
            </div>
        </div>
    </div>

    <!-- Thông tin khác -->
    <div class="mt-4 mb-5">
        <div class="card border-primary">
            <div class="card-header bg-primary text-white">Thông tin khác</div>
            <div class="card-body">
                <table class="table table-bordered">
                    <tr><th>Chứng chỉ sư phạm</th><td>{{ $lecturer->pedagogical_certificate ? 'Có' : 'Không' }}</td></tr>
                    <tr><th>Chứng chỉ CNTT</th><td>{{ $lecturer->it_certificates }}</td></tr>
                    <tr><th>Chứng chỉ ngoại ngữ</th><td>{{ $lecturer->language_certificates }}</td></tr>
                    <tr><th>Hoạt động chuyên môn khác</th><td>{{ $lecturer->other_professional_activities }}</td></tr>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection