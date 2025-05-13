@extends('layouts.app_view')

@section('content')
<div class="container mt-4 mb-5">
    <h2 class="mb-3">Chỉnh sửa thông tin giảng viên</h2>
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
    @if (session('success'))
        <div class="alert alert-success">
            <strong>Thành công!</strong> {{ session('success') }}
        </div>
    @endif

    <a href="{{ url('lecturer/show/' . $lecturer->id) }}">Xem chi tiết</a>
    <form action="{{ route('lecturer.update', $lecturer->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="row">
            <!-- Cột trái: Ảnh giảng viên -->
            <div class="col-md-4 mb-4">
                <div class="card border-primary">
                    <div class="card-header bg-primary text-white">Ảnh giảng viên</div>
                    <div class="card-body text-center">
                        <img id="preview-image" src="{{ $lecturer->image ? asset($lecturer->image) : 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQm-m_gqA429ZMSmcQet4WjV6N4f7xE_B31PQ&s' }}" 
                            alt="Ảnh giảng viên" 
                            class="img-fluid rounded mb-3" 
                            style="max-width: 100%; height: auto;">
                        
                        <div class="mt-2">
                            <label for="photo-upload" class="form-label">Chọn ảnh mới</label>
                            <input class="form-control" type="file" id="photo-upload" name="photo" accept="image/*">
                            <small class="text-muted d-block mt-1">Định dạng: JPG, PNG, GIF</small>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Cột phải: Thông tin giảng viên -->
            <div class="col-md-8">
                <!-- Thông tin công tác -->
                <div class="card border-primary mb-4">
                    <div class="card-header bg-primary text-white">Thông tin công tác</div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Trình độ *</label>
                                <select name="degree_id" class="form-control" required>
                                    @foreach ($degree as $degree)
                                        <option value="{{ $degree->id }}" {{ $lecturer->degree_id == $degree->id ? 'selected' : '' }}>
                                            {{ $degree->degree_name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Khoa *</label>
                                <select name="department_id" class="form-control" required>
                                    @foreach ($department as $department)
                                        <option value="{{ $department->id }}" {{ $lecturer->department_id == $department->id ? 'selected' : '' }}>
                                            {{ $department->department_name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Thông tin cá nhân -->
        <div class="card border-primary mb-4">
            <div class="card-header bg-primary text-white">Thông tin cá nhân</div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Mã giảng viên</label>
                        <input type="text" class="form-control" value="GV0{{ $lecturer->id }}" disabled>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Họ tên *</label>
                        <input type="text" name="full_name" class="form-control" value="{{ $lecturer->full_name }}" required>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Ngày sinh *</label>
                        <input type="date" name="date_of_birth" class="form-control" 
                               value="{{ \Carbon\Carbon::parse($lecturer->date_of_birth)->format('Y-m-d') }}" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Giới tính *</label>
                        <select name="gender" class="form-control" required>
                            <option value="male" {{ $lecturer->gender == 'male' ? 'selected' : '' }}>Nam</option>
                            <option value="female" {{ $lecturer->gender == 'female' ? 'selected' : '' }}>Nữ</option>
                        </select>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Email *</label>
                        <input type="email" name="email" class="form-control" value="{{ $lecturer->email }}" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Số điện thoại *</label>
                        <input type="tel" name="phone" class="form-control" value="{{ $lecturer->phone }}" required>
                    </div>
                </div>
                
                <div class="mb-3">
                    <label class="form-label">Địa chỉ</label>
                    <textarea name="address" class="form-control">{{ $lecturer->address }}</textarea>
                </div>
            </div>
        </div>
        
        <!-- Thông tin hợp đồng -->
        <div class="card border-primary mb-4">
            <div class="card-header bg-primary text-white">Thông tin hợp đồng</div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Loại hợp đồng</label>
                        <input type="text" name="contract_type" class="form-control" value="{{ $lecturer->contract_type }}">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Ngày tuyển dụng</label>
                        <input type="date" name="hire_date" class="form-control" 
                               value="{{ \Carbon\Carbon::parse($lecturer->hire_date)->format('Y-m-d') }}">
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Lương</label>
                        <input type="number" name="salary" class="form-control" value="{{ $lecturer->salary }}">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Hệ số lương</label>
                        <input type="text" name="salary_coefficient" class="form-control" value="{{ $lecturer->salary_coefficient }}">
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Thông tin trình độ chuyên môn -->
        <div class="card border-primary mb-4">
            <div class="card-header bg-primary text-white">Thông tin trình độ chuyên môn</div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Chuyên ngành</label>
                        <input type="text" name="major" class="form-control" value="{{ $lecturer->major }}">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Trường tốt nghiệp</label>
                        <input type="text" name="university" class="form-control" value="{{ $lecturer->university }}">
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Năm tốt nghiệp</label>
                        <input type="number" name="graduation_year" class="form-control" value="{{ $lecturer->graduation_year }}">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Chứng chỉ</label>
                        <input type="text" name="certifications" class="form-control" value="{{ $lecturer->certifications }}">
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Thông tin kinh nghiệm giảng dạy -->
        <div class="card border-primary mb-4">
            <div class="card-header bg-primary text-white">Kinh nghiệm giảng dạy & công tác</div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Môn giảng dạy</label>
                        <input type="text" name="teaching_subjects" class="form-control" value="{{ $lecturer->teaching_subjects }}">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Số năm kinh nghiệm</label>
                        <input type="number" name="teaching_experience_years" class="form-control" value="{{ $lecturer->teaching_experience_years }}">
                    </div>
                </div>
                
                <div class="mb-3">
                    <label class="form-label">Nơi công tác trước đây</label>
                    <input type="text" name="previous_workplaces" class="form-control" value="{{ $lecturer->previous_workplaces }}">
                </div>
            </div>
        </div>
        
        <!-- Thông tin nghiên cứu khoa học -->
        <div class="card border-primary mb-4">
            <div class="card-header bg-primary text-white">Nghiên cứu khoa học</div>
            <div class="card-body">
                <div class="mb-3">
                    <label class="form-label">Bài báo đã công bố</label>
                    <textarea name="published_papers" class="form-control">{{ $lecturer->published_papers }}</textarea>
                </div>
                <div class="mb-3">
                    <label class="form-label">Sách đã xuất bản</label>
                    <textarea name="published_books" class="form-control">{{ $lecturer->published_books }}</textarea>
                </div>
            </div>
        </div>

        <!-- Thông tin khen thưởng & kỷ luật -->
        <div class="card border-primary mb-4">
            <div class="card-header bg-primary text-white">Khen thưởng & kỷ luật</div>
            <div class="card-body">
                <div class="mb-3">
                    <label class="form-label">Giải thưởng</label>
                    <textarea name="awards" class="form-control">{{ $lecturer->awards }}</textarea>
                </div>
                <div class="mb-3">
                    <label class="form-label">Khen thưởng</label>
                    <textarea name="commendations" class="form-control">{{ $lecturer->commendations }}</textarea>
                </div>
            </div>
        </div>

        <!-- Thông tin bổ sung -->
        <div class="card border-primary mb-4">
            <div class="card-header bg-primary text-white">Thông tin bổ sung</div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Chứng chỉ sư phạm</label>
                        <select name="pedagogical_certificate" class="form-control">
                            <option value="1" {{ $lecturer->pedagogical_certificate ? 'selected' : '' }}>Có</option>
                            <option value="0" {{ !$lecturer->pedagogical_certificate ? 'selected' : '' }}>Không</option>
                        </select>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Chứng chỉ CNTT</label>
                        <input type="text" name="it_certificates" class="form-control" value="{{ $lecturer->it_certificates }}">
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Chứng chỉ ngoại ngữ</label>
                        <input type="text" name="language_certificates" class="form-control" value="{{ $lecturer->language_certificates }}">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Hoạt động chuyên môn khác</label>
                        <input type="text" name="other_professional_activities" class="form-control" value="{{ $lecturer->other_professional_activities }}">
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Nút điều khiển -->
        <div class="d-flex justify-content-between">
            <a href="" class="btn btn-secondary">Quay lại</a>
            <button type="submit" class="btn btn-primary">Lưu thay đổi</button>
        </div>
    </form>
</div>
@endsection
<script>
    document.addEventListener("DOMContentLoaded", function () {
        const salaryCoefficientInput = document.querySelector("input[name='salary_coefficient']");
        const salaryInput = document.querySelector("input[name='salary']");
        const baseSalary = 3800000; // Giả sử mức lương cơ sở là 1.800.000 VND

        salaryCoefficientInput.addEventListener("input", function () {
            let coefficient = parseFloat(salaryCoefficientInput.value) || 0;
            salaryInput.value = coefficient * baseSalary;
        });
    });
</script>