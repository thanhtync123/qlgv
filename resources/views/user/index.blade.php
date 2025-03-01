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
                                        <th></th>
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
                                                <img src="data:image/jpeg;base64,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" alt="image"/>
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
                                                            class="btn btn-danger ti-trash btn-rounded">
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


