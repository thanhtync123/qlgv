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
                                <!-- Dữ liệu giáo viên sẽ được thêm vào đây -->
                                </tbody>
                            </table>
                        </div>
                        <div class="d-flex justify-content-center">
                            <!-- Phân trang sẽ được thêm vào đây -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- content-wrapper ends -->
</div>


@endsection