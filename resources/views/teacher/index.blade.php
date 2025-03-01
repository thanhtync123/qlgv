@extends('layouts.app_view');

@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Bảng Giáo Viên</h4>
                            <div class="table-responsive">
                                <table class="table table-striped table-hover">
                                    <thead>
                                    <tr>
                                        <th></th>
                                        <th>Mã Giáo Viên</th>
                                        <th>Tên</th>
                                        <th style="width: 30%">Môn Học Được Phân Công</th>
                                        <th>Số Điện Thoại</th>
                                        <th>Hành Động</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($teachers as $teacher)
                                        <tr>
                                            <td class="py-1">
                                                <img src="{{url('/images/'.$teacher->photo_path)}}" alt="image"/>
                                            </td>
                                            <td>
                                                {{$teacher->teacher_num}}
                                            </td>
                                            <td>
                                                {{$teacher->first_name.' '.$teacher->surname}}
                                            </td>
                                            <td style="white-space: normal;">
                                                {{$teacher->subjects->implode('name', ', ')}}
                                            </td>
                                            <td>
                                                <a href="tel:{{$teacher->phone_number}}">{{$teacher->phone_number}}</a>
                                            </td>
                                            <td>
                                                <div class="btn-group">
                                                    <form action="/teacher/edit/{{ $teacher->id }}" method="get">
                                                        @csrf
                                                        <button type="submit" class="btn btn-dark ti-pencil-alt btn-rounded">
                                                            Sửa</button>
                                                    </form>
                                                    <form action="/teacher/delete/{{ $teacher->id }}" method="post">
                                                        @method('DELETE')
                                                        @csrf
                                                        <button onclick="return confirm('Bạn có chắc chắn muốn xóa giáo viên này?')" type="submit" class="btn btn-danger ti-trash btn-rounded">
                                                            Xóa</button>
                                                    </form>
                                                </div>

                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="d-flex justify-content-center">
                                {!! $teachers->links() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- content-wrapper ends -->
    </div>

@endsection