@extends('layouts.app_view')

@section('content')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-6 mx-auto grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title text-center">User Information</h4>
                        <form class="forms-sample" action="/lecturer/store" method="POST">
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

                                @if (session()->has('success'))
                                    <div class="alert alert-success">
                                        {{ session('success') }}
                                    </div>
                                @endif


                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="full_name">Full Name</label>
                                            <input type="text" class="form-control" id="full_name" name="full_name" placeholder="Enter full name" value="{{ old('full_name') }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="date_of_birth">Date of Birth</label>
                                            <input type="date" class="form-control" id="date_of_birth" name="date_of_birth" value="{{ old('date_of_birth') }}">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="gender">Gender</label>
                                            <select id="gender" class="form-select" name="gender">
                                                <option value="">Select Gender</option>
                                                <option value="male" {{ old('gender') == 'male' ? 'selected' : '' }}>Male</option>
                                                <option value="female" {{ old('gender') == 'female' ? 'selected' : '' }}>Female</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="phone">Phone Number</label>
                                            <input type="tel" class="form-control" id="phone" name="phone" placeholder="Enter phone number" value="{{ old('phone') }}">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="image">Profile Image</label>
                                    <input type="file" class="form-control" id="image" name="image">
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="department_id">Department</label>
                                            <select id="department_id" class="form-select" name="department_id">
                                                <option value="">Select Department</option>
                                                @foreach($department as $item)
                                                    <option value="{{ $item->id }}" {{ old('department_id') == $item->id ? 'selected' : '' }}>{{ $item->department_name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="degree_id">Degree</label>
                                            <select id="degree_id" class="form-select" name="degree_id">
                                                <option value="">Select Degree</option>
                                                @foreach($degree as $item)
                                                    <option value="{{ $item->id }}" {{ old('degree_id') == $item->id ? 'selected' : '' }}>{{ $item->degree_name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-primary me-2">Submit</button>
                                <button type="reset" class="btn btn-light">Reset</button>
                            </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection