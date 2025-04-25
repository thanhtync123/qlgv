@extends('layouts.app_view')

@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-md-10 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Thêm Học Vị</h4>
                            @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                            <form class="forms-sample" action="{{ isset($degree) ? url('degree/update/' . $degree->id) : url('degree/store') }}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="form-group row">
                                            <label for="degree" class="col-sm-3 col-form-label">Học vị</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" name="name" id="name" autofocus
                                                       placeholder="Học vị" value="{{ old('name', $degree->degree_name ?? '') }} ">
                                      
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary me-2">Lưu</button>
                                <a class="btn btn-light" href="/degree">Hủy</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection