@extends('layouts.app_view');

@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Managers Table</h4>
                            <div class="table-responsive">
                                <table class="table table-striped table-hover">
                                    <thead>
                                    <tr>
                                        <th>Ảnh</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Role</th>
                                        <th>Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($accounts as $item)
                                        <tr>
                                            <td class="py-1">
                                                <img src="{{$item->image}}" alt="image"/>
                                            </td>
                                            <td>
                                                {{$item->full_name}}
                                            </td>
                                            <td>
                                                {{$item->username}}
                                            </td>
                                            <td>
                                            {{ $item->role == 'Lecturer' ? 'Giảng viên' : $item->role }}

                                            </td>
                                            <td>
                                            <div class="btn-group">
                                            <form action="{{ url('/manager/delete/' . $item->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button onclick="return confirm('Are you sure you want to delete this?')" 
                                                            type="submit" 
                                                            class="btn btn-danger btn-rounded">
                                                        Delete
                                                    </button>
                                                </form>
                                            </div>

                                            </td>
                                        </tr>
                                        @endforeach
                     
                                    </tbody>
                                </table>
                            </div>
                            <div class="d-flex justify-content-center">
                      
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection


