@extends('layouts.app_view')

@section('content')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Bảng Học Vị</h4>
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
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

                                <thead>
                                    <tr>
                                        <th>STT</th>
                                        <th>Học Vị</th>
                                        <th>Thao tác</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($degree as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->degree_name }}</td>
                                        <td>
                                            <div class="btn-group">
                                                <a href="{{ url('/degree/edit/' . $item->id) }}" class="btn btn-dark btn-rounded">
                                                    <i class="ti-pencil-alt"></i> Sửa
                                                </a>
                                                <form action="{{ url('/degree/delete/' . $item->id) }}" method="post" onsubmit="return confirm('Are you sure you want to delete this item?')">
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

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
