@extends('layouts.app_view')
@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-md-10 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Thêm mới Môn học</h4>
                            <p class="card-description">
                            </p>
                            <form class="forms-sample" action="#" method="post">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label for="name" class="col-sm-3 col-form-label">Tên</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" name="name" id="name" autofocus placeholder="Tên">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label for="semester" class="col-sm-3 col-form-label">Học kỳ</label>
                                            <div class="col-sm-9">
                                                <select id="semester" name="semester" class="form-control form-control-sm">
                                                    <option value="0">Học kỳ 1</option>
                                                    <option value="1">Học kỳ 2</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label for="classroom" class="col-sm-3 col-form-label">Lớp học</label>
                                            <div class="col-sm-9">
                                                <select id="classroom" name="classroom" class="form-control form-control-sm">
                                                    <option value="0">Chọn một lớp học</option>
                                                    <option value="1">Lớp 1</option>
                                                    <option value="2">Lớp 2</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label for="teacher" class="col-sm-3 col-form-label">Giáo viên</label>
                                            <div class="col-sm-9">
                                                <select id="teacher" name="teacher" class="form-control form-control-sm">
                                                    <option value="">Chọn một giáo viên</option>
                                                    <option value="1">Giáo viên A</option>
                                                    <option value="2">Giáo viên B</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group row">
                                            <label for="myTextarea" class="col-sm-2 col-form-label">Mô tả</label>
                                            <div class="col-sm-10">
                                                <textarea type="text" style="resize: vertical;" rows="3" class="form-control" name="description" id="myTextarea"></textarea>
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
