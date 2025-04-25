@extends('layouts.app_view')

@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <h5 class="mb-0">Chỉnh sửa dự án nghiên cứu</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('research-projects.update', $project->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="project_name" class="form-label">Tên dự án <span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('project_name') is-invalid @enderror"
                                id="project_name" name="project_name" 
                                value="{{ old('project_name', $project->project_name) }}" required>
                            @error('project_name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="lecturer_id" class="form-label">Giảng viên <span class="text-danger">*</span></label>
                            <select class="form-select @error('lecturer_id') is-invalid @enderror" 
                                id="lecturer_id" name="lecturer_id" required>
                                <option value="">Chọn giảng viên</option>
                                @foreach($lecturers as $lecturer)
                                    <option value="{{ $lecturer->id }}" 
                                        {{ old('lecturer_id', $project->lecturer_id) == $lecturer->id ? 'selected' : '' }}>
                                        {{ $lecturer->full_name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('lecturer_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="status" class="form-label">Trạng thái <span class="text-danger">*</span></label>
                            <select class="form-select @error('status') is-invalid @enderror" 
                                id="status" name="status" required>
                                <option value="">Chọn trạng thái</option>
                                <option value="Ongoing" {{ old('status', $project->status) == 'Ongoing' ? 'selected' : '' }}>Đang thực hiện</option>
                                <option value="Completed" {{ old('status', $project->status) == 'Completed' ? 'selected' : '' }}>Đã hoàn thành</option>
                                <option value="Cancelled" {{ old('status', $project->status) == 'Cancelled' ? 'selected' : '' }}>Đã hủy</option>
                            </select>
                            @error('status')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label">Mô tả</label>
                    <textarea class="form-control @error('description') is-invalid @enderror" 
                        id="description" name="description" rows="3">{{ old('description', $project->description) }}</textarea>
                    @error('description')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="d-flex justify-content-end">
                    <a href="{{ route('research-projects.index') }}" class="btn btn-secondary me-2">Quay lại</a>
                    <button type="submit" class="btn btn-primary">Cập nhật</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
