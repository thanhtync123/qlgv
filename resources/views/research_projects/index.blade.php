@extends('layouts.app_view')

@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Quản lý dự án nghiên cứu</h5>
            <a href="{{ route('research-projects.create') }}" class="btn btn-primary">
                <i class="fas fa-plus"></i> Thêm dự án
            </a>
        </div>
        <div class="card-body">
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Tên dự án</th>
                            <th>Giảng viên</th>
                            <th>Mô tả</th>
                            <th>Trạng thái</th>
                            <th>Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($projects as $project)
                            <tr>
                                <td>{{ $project->id }}</td>
                                <td>{{ $project->project_name }}</td>
                                <td>{{ $project->lecturer_name }}</td>
                                <td>{{ Str::limit($project->description, 50) }}</td>
                                <td>
                                    <span class="badge 
                                        {{ $project->status == 'Completed' ? 'bg-success' : 
                                           ($project->status == 'Ongoing' ? 'bg-primary' : 
                                           'bg-danger') }}">
                                        {{ $project->status == 'Ongoing' ? 'Đang thực hiện' : 
                                           ($project->status == 'Completed' ? 'Đã hoàn thành' : 'Đã hủy') }}
                                    </span>
                                </td>
                                <td>
                                    <div class="btn-group">
                                        {{-- Đã bỏ nút xem chi tiết --}}
                                        <a href="{{ route('research-projects.edit', $project->id) }}" class="btn btn-sm btn-warning">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form action="{{ route('research-projects.destroy', $project->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa dự án này?')">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
