<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách giảng viên</title>
    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
            margin: 0;
            padding: 20px;
            color: #333;
        }
        h1 {
            text-align: center;
            color: #2c3e50;
            margin-bottom: 10px;
        }
        .subtitle {
            text-align: center;
            font-size: 14px;
            color: #7f8c8d;
            margin-bottom: 20px;
        }
        .filter-info {
            margin-bottom: 20px;
            padding: 10px;
            background-color: #f8f9fa;
            border-radius: 4px;
            font-size: 13px;
        }
        .filter-info strong {
            font-weight: bold;
            margin-right: 5px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 30px;
            font-size: 13px;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #3498db;
            color: white;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        .footer {
            text-align: center;
            font-size: 12px;
            color: #7f8c8d;
            margin-top: 20px;
        }
        .male {
            color: #2980b9;
        }
        .female {
            color: #e74c3c;
        }
        .page-break {
            page-break-after: always;
        }
    </style>
</head>
<body>
    <h1>DANH SÁCH GIẢNG VIÊN</h1>
    <div class="subtitle">
        Ngày xuất: {{ date('d/m/Y H:i') }}
    </div>
    
    @if(isset($filters) && count($filters) > 0)
    <div class="filter-info">
        <strong>Bộ lọc:</strong>
        @foreach($filters as $key => $value)
            {{ $key }}: <strong>{{ $value }}</strong>{{ !$loop->last ? ' | ' : '' }}
        @endforeach
    </div>
    @endif

    <table>
        <thead>
            <tr>
                <th>STT</th>
                <th>Mã</th>
                <th>Họ và tên</th>
                <th>Giới tính</th>
                <th>Ngày sinh</th>
                <th>Điện thoại</th>
                <th>Khoa</th>
                <th>Học vị</th>
            </tr>
        </thead>
        <tbody>
            @if(count($lecturers) > 0)
                @foreach($lecturers as $index => $lecturer)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $lecturer->id }}</td>
                    <td>{{ $lecturer->full_name }}</td>
                    <td class="{{ strtolower($lecturer->gender) == 'male' ? 'male' : 'female' }}">
                        {{ strtolower($lecturer->gender) == 'male' ? 'Nam' : 'Nữ' }}
                    </td>
                    <td>{{ date('d/m/Y', strtotime($lecturer->date_of_birth)) }}</td>
                    <td>{{ $lecturer->phone }}</td>
                    <td>{{ $lecturer->department_name }}</td>
                    <td>{{ $lecturer->degree_name }}</td>
                </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="8" style="text-align: center">Không có dữ liệu</td>
                </tr>
            @endif
        </tbody>
    </table>

    <div class="footer">
        <p>Tổng số giảng viên: {{ count($lecturers) }}</p>
        <p>© {{ date('Y') }} - Hệ thống quản lý giảng viên</p>
    </div>
</body>
</html>
