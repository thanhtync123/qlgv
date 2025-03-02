@extends('layouts.app_view')
@section('content')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-10 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Thêm mới Môn học</h4>

                        {{-- Hiển thị thông báo lỗi --}}
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <form action="{{ isset($course) ? url('course/update/' . $course->id) : url('course/store') }}" method="POST" class="forms-sample">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label for="name" class="col-sm-3 col-form-label">Tên học phần</label>
                                        <div class="col-sm-9">
                                        <input type="text" class="form-control @error('name') is-invalid @enderror"
                                                    name="name" id="name" autofocus
                                                    placeholder="Tên học phần"
                                                    value="{{ old('name', isset($course) ? $course->course_name : '') }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label for="faculty" class="col-sm-3 col-form-label">Khoa</label>
                                        <div class="col-sm-9">
                                            <select id="faculty" name="department"
                                                class="form-control form-control-sm @error('department') is-invalid @enderror">
                                                <option value="">Chọn khoa</option>
                                                @foreach($departments as $item)
                                                    <option value="{{ $item->id }}" 
                                                        {{ old('department', isset($course) ? $course->department_id : '') == $item->id ? 'selected' : '' }}>
                                                        {{ $item->department_name }}
                                                    </option>
                                                @endforeach

                                            </select>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary me-2">Lưu</button>
                            <a class="btn btn-light" href="/course">Hủy</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
