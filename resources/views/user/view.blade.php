@extends('layouts.app_view')
@section('content')
    <div class="main-panel" style="min-height: 100vh; display: flex; align-items: center; justify-content: center;">
        <div class="content-wrapper w-100 d-flex justify-content-center">
            <div class="row w-100 d-flex justify-content-center">
                <div class="col-md-6 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title text-center">Add New User</h4>
                            <form class="forms-sample" action="/manager/store" method="post">
                                @csrf

                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif

                                <div class="form-group">
                                    <label for="username">Username</label>
                                    <input type="text" class="form-control border-white" name="username" id="username"
                                        placeholder="Username" value="{{ old('username') }}">
                                </div>

                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="password" class="form-control border-white" name="password" id="password"
                                        placeholder="Password">
                                </div>

                                <div class="form-group">
                                    <label for="lecturer">Giảng viên</label>
                                    <select class="form-control border-white" name="lecturer" id="lecturer">
                                        @foreach($lecturers as $item)
                                            <option value="{{$item->id}}" {{ old('lecturer') == $item->id ? 'selected' : '' }}>
                                                {{$item->full_name}}
                                            </option>
                                        @endforeach   
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="role">Role</label>
                                    <select class="form-control border-white" name="role" id="role">
                                        <option value="Lecturer" {{ old('role') == 'Lecturer' ? 'selected' : '' }}>Giảng viên</option>
                                        <option value="Admin" {{ old('role') == 'Admin' ? 'selected' : '' }}>Admin</option>
                                    </select>
                                </div>

                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary">Save</button>
                                    <a class="btn btn-light" href="/manager">Cancel</a>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection