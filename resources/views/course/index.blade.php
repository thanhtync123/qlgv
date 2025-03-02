@extends('layouts.app_view')

@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Bảng Môn Học</h4>
                            @if (session('success'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    {{ session('success') }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            @endif

                            <div class="table-responsive">
                                <table class="table table-striped table-hover">
                                    <thead>
                                    <tr>
                                        <th>Mã Học Phần</th>
                                        <th>Tên Học Phần</th>
                                        <th>Khoa Phụ Trách</th>
                                        <th>Hành Động</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($course as $item)
                                    <tr>
                                        <td class="py-1">HP0{{$item->id}}</td>
                                        <td>{{$item->course_name}}</td>
                                        <td>
                                            <a style="text-decoration: inherit; color: inherit;" title="Xem Chi Tiết" href="#">{{$item->department_name}}</a>
                                        </td>
                                        <td>
                                            <div class="btn-group">
                                                <a href="#" class="btn btn-dark btn-rounded">
                                                    <i class="ti-pencil-alt"></i> Sửa
                                                </a>
                                                <form action="{{ url('course/delete/' . $item->id) }}" method="post" onsubmit="return confirm('Bạn có chắc chắn muốn xóa mục này không?')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-rounded">
                                                        <i class="ti-trash"></i> Xóa
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
                                <nav>
                                    <!-- Static pagination -->
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
