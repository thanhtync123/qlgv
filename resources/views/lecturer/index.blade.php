@extends('layouts.app_view')

@section('content')

<!-- Thêm jQuery từ CDN -->


<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <textarea name="" id="debug" rows="4" cols="50"></textarea>
                        <h4 class="card-title">Bảng Giáo Viên</h4>
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

                        <div class="table-responsive">
                            <div class="row mb-3">
                                <div class="col-md-3">
                                    <input type="text" id="searchInput" class="form-control" placeholder="Tìm kiếm theo tên hoặc mã...">
                                </div>
                                <div class="col-md-3">
                                    <select name="department_id" id="department_id" class="form-control">
                                        <option value="">Chọn Khoa</option>
                                        @foreach($department as $dep)
                                            <option value="{{ $dep->id }}">{{ $dep->department_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <select name="degree_id" id="degree_id" class="form-control">
                                        <option value="">Chọn Học Vấn</option>
                                        @foreach($degree as $deg)
                                            <option value="{{ $deg->id }}">{{ $deg->degree_name }}</option>
                                        @endforeach 
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <button type="button" id="exportPdfBtn" class="btn btn-danger">
                                        <i class="ti-file"></i> Xuất PDF
                                    </button>
                                </div>
                            </div>

                            <table class="table table-striped table-hover" id="lecturerTable">
                                <thead>
                                    <tr>
                                        <th>Hình Ảnh</th>
                                        <th>Mã Giáo Viên</th>
                                        <th>Tên</th>
                                        <th>Số Điện Thoại</th>
                                        <th>Khoa</th>
                                        <th>Học Vấn</th>
                                        <th>Hành Động</th>
                                    </tr>
                                </thead>
                                <tbody id="lecturerTableBody">
                                    @include('lecturer.table_rows', ['lecturers' => $lecturers])
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Script để kiểm tra jQuery -->
<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Kiểm tra xem jQuery có tồn tại không
        if (typeof jQuery !== 'undefined') {
            document.getElementById('debug').value = 'jQuery đã được tìm thấy! Version: ' + jQuery.fn.jquery;
        } else {
            document.getElementById('debug').value = 'jQuery không được tìm thấy!';
        }
    });

    $(document).ready(function() {
        function performSearch() {
            var search = $('#searchInput').val();
            var departmentId = $('#department_id').val();
            var degreeId = $('#degree_id').val();

            $.ajax({
                url: '{{ route("lecturer.search") }}',
                type: 'GET',
                data: {
                    search: search,
                    department_id: departmentId,
                    degree_id: degreeId
                },
                success: function(response) {
                    var html = '';
                    response.forEach(function(item) {
                        html += `
                            <tr>
                                <td>
                                    <img src="${item.image ? '{{ asset('') }}' + item.image : '{{ asset('lecturer_image/default.jpg') }}'}"
                                         alt="Hình ảnh giáo viên" width="50" height="50" class="rounded-circle">
                                </td>
                                <td>${item.id}</td>
                                <td>${item.full_name}</td>
                                <td>${item.phone}</td>
                                <td>${item.department_name}</td>
                                <td>${item.degree_name}</td>
                                <td>
                                    <div class="d-flex gap-1">
                                        <a href="/lecturer/show/${item.id}" class="btn btn-info btn-sm btn-icon" title="Xem">
                                            <i class="ti-eye"></i>
                                        </a>
                                        <a href="/lecturer/edit/${item.id}" class="btn btn-dark btn-sm btn-icon" title="Sửa">
                                            <i class="ti-pencil-alt"></i>
                                        </a>
                                        <form action="/lecturer/delete/${item.id}" method="POST" onsubmit="return confirm('Xác nhận xóa?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm btn-icon" title="Xóa">
                                                <i class="ti-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        `;
                    });
                    $('#lecturerTableBody').html(html);
                },
                error: function(xhr) {
                    console.log(xhr.responseText);
                }
            });
        }

        // Search on input change
        $('#searchInput').on('input', function() {
            performSearch();
        });

        // Search on select change
        $('#department_id, #degree_id').on('change', function() {
            performSearch();
        });

        $('#exportPdfBtn').on('click', function() {
            var search = $('#searchInput').val();
            var departmentId = $('#department_id').val();
            var degreeId = $('#degree_id').val();

            var url = '{{ route("lecturer.exportPdf") }}';
            url += '?search=' + encodeURIComponent(search);
            if (departmentId) url += '&department_id=' + departmentId;
            if (degreeId) url += '&degree_id=' + degreeId;

            window.location.href = url;
        });
    });

</script>

@endsection