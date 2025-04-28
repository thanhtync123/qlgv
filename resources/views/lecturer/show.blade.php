@extends('layouts.app_view')

@section('content')
<div class="container py-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="fw-bold mb-0">Hồ sơ giảng viên</h1>
        <a href="{{ url('lecturer/edit/' . $lecturer->id) }}" class="btn btn-primary shadow-sm">
            <i class="bi bi-pencil"></i> Chỉnh sửa
        </a>
    </div>
    <div class="profile-card shadow rounded-4 p-4 mb-4 bg-white text-center mx-auto" style="max-width: 420px;">
        <img src="{{ $lecturer->image ? asset($lecturer->image) : asset('lecturer_image/default.jpg') }}"
             alt="Ảnh giảng viên"
             class="rounded-circle shadow mb-3"
             style="width: 160px; height: 160px; object-fit: cover;">
        <h2 class="fw-bold mb-1">{{ $lecturer->full_name }}</h2>
        <div class="text-muted mb-1">{{ $lecturer->department->department_name }}</div>
        <div class="mb-2">
            <span class="badge bg-info-subtle text-info-emphasis fw-semibold me-1">{{ $lecturer->degree->degree_name }}</span>
            <span class="badge bg-success-subtle text-success-emphasis fw-semibold">{{ $lecturer->contract_type }}</span>
        </div>
        <div class="d-flex flex-column align-items-center gap-1 small">
            <span><i class="bi bi-envelope me-1"></i>{{ $lecturer->email }}</span>
            <span><i class="bi bi-telephone me-1"></i>{{ $lecturer->phone }}</span>
        </div>
    </div>

    <ul class="nav nav-tabs justify-content-center mb-4" id="lecturerTabs" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link active fw-semibold" id="overview-tab" data-bs-toggle="tab" data-bs-target="#overview" type="button" role="tab">
                Tổng quan
            </button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link fw-semibold" id="education-tab" data-bs-toggle="tab" data-bs-target="#education" type="button" role="tab">
                Học vấn
            </button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link fw-semibold" id="teaching-tab" data-bs-toggle="tab" data-bs-target="#teaching" type="button" role="tab">
                Giảng dạy
            </button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link fw-semibold" id="research-tab" data-bs-toggle="tab" data-bs-target="#research" type="button" role="tab">
                Nghiên cứu
            </button>
        </li>
    </ul>

    <div class="tab-content bg-white rounded-4 shadow-sm p-4">
        <!-- Tổng quan -->
        <div class="tab-pane fade show active" id="overview" role="tabpanel">
            <div class="section-title">Thông tin cá nhân</div>
            <div class="row mb-2">
                <div class="col-md-6 mb-2">
                    <span class="info-label">Mã giảng viên:</span>
                    <span class="info-value">GV0{{ $lecturer->id }}</span>
                </div>
                <div class="col-md-6 mb-2">
                    <span class="info-label">Ngày sinh:</span>
                    <span class="info-value">{{ \Carbon\Carbon::parse($lecturer->date_of_birth)->format('d/m/Y') }}</span>
                </div>
                <div class="col-md-6 mb-2">
                    <span class="info-label">Giới tính:</span>
                    <span class="info-value">{{ $lecturer->gender == 'Male' ? 'Nam' : 'Nữ' }}</span>
                </div>
                <div class="col-md-6 mb-2">
                    <span class="info-label">Địa chỉ:</span>
                    <span class="info-value">{{ $lecturer->address }}</span>
                </div>
            </div>
            <h5 class="fw-bold mt-4 mb-2">Thông tin hợp đồng</h5>
            <div class="row">
                <div class="col-md-4 mb-2"><span class="fw-semibold">Loại hợp đồng:</span> {{ $lecturer->contract_type }}</div>
                <div class="col-md-4 mb-2"><span class="fw-semibold">Lương:</span> {{ number_format($lecturer->salary, 0, ',', '.') }} VNĐ</div>
                <div class="col-md-4 mb-2"><span class="fw-semibold">Hệ số lương:</span> {{ $lecturer->salary_coefficient }}</div>
            </div>
        </div>
        <!-- Học vấn -->
        <div class="tab-pane fade" id="education" role="tabpanel">
            <h4 class="fw-bold mb-3">Trình độ chuyên môn</h4>
            <div class="mb-2"><span class="fw-semibold">Bằng cấp:</span> {{ $lecturer->degree->degree_name }}</div>
            <div class="mb-2"><span class="fw-semibold">Trường tốt nghiệp:</span> {{ $lecturer->university }}</div>
            <div class="mb-2"><span class="fw-semibold">Năm tốt nghiệp:</span> {{ $lecturer->graduation_year }}</div>
            <div class="mb-2"><span class="fw-semibold">Chuyên ngành:</span> {{ $lecturer->major }}</div>
            <div class="mb-2"><span class="fw-semibold">Chứng chỉ:</span> {{ $lecturer->certifications }}</div>
        </div>
        <!-- Giảng dạy -->
        <div class="tab-pane fade" id="teaching" role="tabpanel">
            <h4 class="fw-bold mb-3">Kinh nghiệm giảng dạy</h4>
            <div class="mb-2"><span class="fw-semibold">Môn giảng dạy:</span> {{ $lecturer->teaching_subjects }}</div>
            <div class="mb-2"><span class="fw-semibold">Số năm kinh nghiệm:</span> {{ $lecturer->teaching_experience_years }} năm</div>
            <div class="mb-2"><span class="fw-semibold">Nơi công tác trước đây:</span> {{ $lecturer->previous_workplaces }}</div>
        </div>
        <!-- Nghiên cứu -->
        <div class="tab-pane fade" id="research" role="tabpanel">
            <h4 class="fw-bold mb-3">Nghiên cứu khoa học</h4>
            <div class="mb-2"><span class="fw-semibold">Bài báo đã công bố:</span> {{ $lecturer->published_papers }}</div>
            <div class="mb-2"><span class="fw-semibold">Sách đã xuất bản:</span> {{ $lecturer->published_books }}</div>
            <div class="mb-2"><span class="fw-semibold">Giải thưởng:</span> {{ $lecturer->awards }}</div>
        </div>
    </div>
</div>

@push('styles')
<style>
    .profile-card {
        transition: box-shadow 0.2s;
        font-size: 1.15rem;
        background: linear-gradient(135deg, #e3f2fd 0%, #fff 100%);
        border: 2px solid #90caf9;
    }
    .profile-card:hover {
        box-shadow: 0 8px 32px 0 rgba(25, 118, 210, 0.18);
        border-color: #1976d2;
    }
    .profile-card h2 {
        font-size: 2.3rem;
        color: #1976d2;
        font-weight: 800;
        letter-spacing: 1px;
    }
    .profile-card .text-muted {
        font-size: 1.1rem;
        color: #1976d2 !important;
    }
    .nav-tabs .nav-link {
        font-size: 1.25rem;
        font-weight: 700;
        color: #1976d2;
        border: none;
        background: none;
        transition: background 0.2s, color 0.2s, box-shadow 0.2s;
        padding: 1.1rem 2.2rem;
        border-bottom: 3px solid transparent;
    }
    .nav-tabs .nav-link.active, .nav-tabs .nav-link:hover {
        background: linear-gradient(90deg, #1976d2 60%, #64b5f6 100%);
        color: #fff !important;
        border-radius: 0.7rem 0.7rem 0 0;
        border-bottom: 3px solid #1976d2;
        box-shadow: 0 4px 16px 0 rgba(25, 118, 210, 0.10);
    }
    .tab-content {
        min-height: 260px;
        font-size: 1.18rem;
        background: #f5faff;
        border: 1.5px solid #90caf9;
        border-radius: 1.2rem;
    }
    .section-title {
        font-size: 1.5rem;
        font-weight: 800;
        color: #1976d2;
        margin-bottom: 1.2rem;
        border-left: 5px solid #1976d2;
        padding-left: 0.7rem;
        background: #e3f2fd;
        border-radius: 0.3rem;
        display: inline-block;
    }
    .info-label {
        font-weight: 700;
        color: #1976d2;
        font-size: 1.13em;
        background: #e3f2fd;
        padding: 0.2em 0.6em;
        border-radius: 0.4em;
        margin-right: 0.3em;
        display: inline-block;
    }
    .info-value {
        font-size: 1.18em;
        color: #0d47a1;
        font-weight: 700;
        display: inline-block;
    }
    .badge {
        font-size: 1.15em;
        padding: 0.6em 1.2em;
        border-radius: 0.6em;
        box-shadow: 0 2px 8px 0 rgba(13, 110, 253, 0.08);
        transition: box-shadow 0.2s, background 0.2s;
        background: linear-gradient(90deg, #bbdefb 60%, #e3f2fd 100%);
        color: #1976d2 !important;
        font-weight: 700;
        border: 1.5px solid #90caf9;
    }
    .badge.bg-success-subtle {
        background: linear-gradient(90deg, #c8e6c9 60%, #e8f5e9 100%);
        color: #388e3c !important;
        border: 1.5px solid #81c784;
    }
    .badge:hover {
        box-shadow: 0 4px 16px 0 rgba(25, 118, 210, 0.16);
        background: #1976d2 !important;
        color: #fff !important;
    }
    .fw-bold, .fw-semibold {
        font-weight: 700 !important;
        font-size: 1.08em;
    }
    h5.fw-bold {
        color: #1976d2;
        font-size: 1.25rem;
        margin-top: 1.5rem;
        border-left: 4px solid #1976d2;
        padding-left: 0.5rem;
        background: #e3f2fd;
        border-radius: 0.2rem;
        display: inline-block;
    }
    @media (max-width: 600px) {
        .profile-card h2 { font-size: 1.4rem; }
        .profile-card { font-size: 1rem; }
        .section-title { font-size: 1.1rem; }
    }
</style>
@endpush
@endsection