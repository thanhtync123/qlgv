@extends('layouts.app_view')
@section('content')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div>
                        <h4 class="card-title">Bảng Khoa</h4>
                            @if (session('error'))
                                <div class="alert alert-danger">
                                    {{ session('error') }}
                                </div>
                            @endif

                            @if (session('success'))
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                </div>
                            @endif

                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                        </div>
                      
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead>
                                <tr>
                                    <th>STT</th>
                                    <th>Tên Khoa</th>
                                    <th>Địa Chỉ</th>
                                    <th>Số Điện Thoại</th>
                                    <th>Hành Động</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($departments as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->department_name }}</td>
                                    <td>{{ $item->address }}</td>
                                    <td><a href="tel:{{ $item->phone }}">{{ $item->phone }}</a></td>
                                    <td>
                                        <div class="btn-group">
                                            <a href="{{ url('department/edit/' . $item->id) }}" class="btn btn-dark btn-rounded">
                                                <i class="ti-pencil-alt"></i> Sửa
                                            </a>

                                            <form action="{{ url('department/delete/' . $item->id) }}" method="POST" onsubmit="return confirm('Xác nhận xóa')">
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
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
