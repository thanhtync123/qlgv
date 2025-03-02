@extends('layouts.app_view')
@section('content')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-10 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Thêm mới Môn học</h4>
                        <form class="forms-sample" action="#" method="post">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label for="name" class="col-sm-3 col-form-label">Tên học phần</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" name="name" id="name" autofocus placeholder="Tên học phần">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label for="faculty" class="col-sm-3 col-form-label">Khoa</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" name="faculty" id="faculty" placeholder="Khoa">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary me-2">Lưu</button>
                            <a class="btn btn-light" href="/subject">Hủy</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
