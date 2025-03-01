@extends('layouts.app_view')
@section('content')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-6 mx-auto grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Thêm mới Khoa</h4>
                        <form action="{{ isset($department) ? url('department/update/' . $department->id) : url('department/store') }}" method="POST" class="forms-sample">
                            @csrf

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="faculty_name">Tên Khoa</label>
                                        <input type="text" class="form-control @error('faculty_name') is-invalid @enderror" name="faculty_name" id="faculty_name" value="{{ old('faculty_name', $department->department_name ?? '') }}" placeholder="Nhập tên khoa">
                                        @error('faculty_name')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="faculty_phone">SĐT</label>
                                        <input type="text" class="form-control @error('faculty_phone') is-invalid @enderror" name="faculty_phone" id="faculty_phone" value="{{ old('faculty_phone', $department->phone ?? '') }}" placeholder="Nhập số điện thoại">
                                        @error('faculty_phone')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="faculty_address">Địa Chỉ</label>
                                        <textarea class="form-control @error('faculty_address') is-invalid @enderror" name="faculty_address" id="faculty_address" placeholder="Nhập địa chỉ" rows="3">{{ old('faculty_address', $department->address ?? '') }}</textarea>
                                        @error('faculty_address')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary me-2">Lưu</button>
                            <button type="reset" class="btn btn-light">Hủy</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
