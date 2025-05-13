@extends('layouts.app_view');

@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            @if (session('success'))
                <div class="alert alert-success">
                    <strong>Thành công!</strong> {{ session('success') }}
                </div>
            @endif
            @if (session('error'))
                <div class="alert alert-danger">
                    <strong>Lỗi!</strong> {{ session('error') }}
                </div>
            @endif
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
            <div class="row">
                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Bảng Quản Lý Người Dùng</h4>
                            <div class="table-responsive">
                                <table class="table table-striped table-hover">
                                    <thead>
                                    <tr>
                                        <th>Ảnh</th>
                                        <th>Họ tên</th>
                                        <th>Tên đăng nhập</th>
                                        <th>Vai trò</th>
                                        <th>Hành động</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($accounts as $item)
                                        <tr>
                                            <td class="py-1">
                                                <img src="{{$item->image}}" alt="image"/>
                                            </td>
                                            <td>
                                                {{$item->full_name}}
                                            </td>
                                            <td>
                                                {{$item->username}}
                                            </td>
                                            <td>
                                            {{ $item->role == 'Lecturer' ? 'Giảng viên' : ($item->role == 'Admin' ? 'Quản trị viên' : $item->role) }}
                                            </td>
                                            <td>
                                            <div class="btn-group">
                                            <form action="{{ url('/manager/delete/' . $item->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button onclick="return confirm('Bạn có chắc chắn muốn xóa người dùng này?')" 
                                                            type="submit" 
                                                            class="btn btn-danger btn-rounded">
                                                        Xóa
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


