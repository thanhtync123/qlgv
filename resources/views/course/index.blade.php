@extends('layouts.app_view')

@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Bảng Môn Học</h4>
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
                                                <form action="#" method="get">
                                                    <button type="submit" class="btn btn-dark ti-pencil-alt btn-rounded">Sửa</button>
                                                </form>
                                                <form action="#" method="post">
                                                    <button onclick="return confirm('Bạn có chắc chắn muốn xóa mục này không?')" type="submit" class="btn btn-danger ti-trash btn-rounded">Xóa</button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
    
                               
                                    </tbody>
                                </table>
                            </div>
                            <div class="d-flex justify-content-center">
                                <!-- Static pagination -->
                                <nav>
                                    <!-- <ul class="pagination">
                                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                                    </ul> -->
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
