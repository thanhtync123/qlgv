@extends('layouts.app_view')

@section('content')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Bảng Giáo Viên</h4>
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        @if (session()->has('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif

                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>Hình Ảnh</th>
                                        <th>Mã Giáo Viên</th>
                                        <th>Tên</th>
                                        <th>Số Điện Thoại</th>
                                        <th>Hành Động</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($lecturers as $item)
                                        <tr>
                                            <td>
                                                <img src="{{ $item->image ? asset($item->image) : asset('lecturer_image/default.jpg') }}"
                                                     alt="Hình ảnh giáo viên" width="50" height="50" class="rounded-circle">
                                            </td>
                                            <td>{{ $item->id }}</td>
                                            <td>{{ $item->full_name }}</td>
                                            <td>{{ $item->phone }}</td>
                                            <td>
                                                <div class="d-flex gap-1">
                                                    <a href="{{ url('lecturer/show/' . $item->id) }}" class="btn btn-info btn-sm btn-icon" title="Xem">
                                                        <i class="ti-eye"></i>
                                                    </a>
                                                    <a href="{{ url('lecturer/edit/' . $item->id) }}" class="btn btn-dark btn-sm btn-icon" title="Sửa">
                                                        <i class="ti-pencil-alt"></i>
                                                    </a>
                                                    <form action="{{ url('lecturer/delete/' . $item->id) }}" method="POST" onsubmit="return confirm('Xác nhận xóa?')">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-sm btn-icon" title="Xóa">
                                                            <i class="ti-trash"></i>
                                                        </button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="d-flex justify-content-center">
                  
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection