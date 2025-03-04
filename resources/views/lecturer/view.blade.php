@extends('layouts.app_view');

@section('content')
<form>
    <div class="row">
        <div class="col-12">
            <label for="full_name">Full Name</label>
            <input type="text" id="full_name" name="full_name" class="form-control">
        </div>
    </div>

    <div class="row">
        <div class="col-6">
            <label for="date_of_birth">Date of Birth</label>
            <input type="date" id="date_of_birth" name="date_of_birth" class="form-control">
        </div>
        <div class="col-6">
            <label for="hire_date">Hire Date</label>
            <input type="date" id="hire_date" name="hire_date" class="form-control">
        </div>
    </div>

    <div class="row">
        <div class="col-6">
            <label for="gender">Gender</label>
            <select id="gender" name="gender" class="form-control">
                <option value="">Select Gender</option>
                <option value="male">Male</option>
                <option value="female">Female</option>
                <option value="other">Other</option>
            </select>
        </div>
        <div class="col-6">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" class="form-control">
        </div>
    </div>

    <div class="row">
        <div class="col-6">
            <label for="phone">Phone Number</label>
            <input type="tel" id="phone" name="phone" class="form-control">
        </div>
        <div class="col-6">
            <label for="address">Address</label>
            <textarea id="address" name="address" class="form-control"></textarea>
        </div>
    </div>

    <div class="row">
        <div class="col-6">
            <label for="image">Profile Image</label>
            <input type="file" id="image" name="image" class="form-control">
        </div>
        <div class="col-6">
            <label for="department_id">Department</label>
            <select id="department_id" name="department_id" class="form-control">
                <option value="">Select Department</option>
                <option value="1">HR</option>
                <option value="2">IT</option>
                <option value="3">Finance</option>
            </select>
        </div>
    </div>

    <div class="row">
        <div class="col-6">
            <label for="degree_id">Degree</label>
            <select id="degree_id" name="degree_id" class="form-control">
                <option value="">Select Degree</option>
                <option value="1">Bachelor</option>
                <option value="2">Master</option>
                <option value="3">PhD</option>
            </select>
        </div>
    </div>

    <div class="row mt-3">
        <div class="col-12">
            <button type="submit" class="btn btn-primary">Submit</button>
            <button type="reset" class="btn btn-secondary">Reset</button>
        </div>
    </div>
</form>

@endsection