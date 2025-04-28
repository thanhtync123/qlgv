<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Báo cáo lương</title>
    <style>
        @font-face {
            font-family: 'DejaVu Sans';
            src: url('{{ storage_path('fonts/DejaVuSans.ttf') }}') format('truetype');
        }
        body {
            font-family: 'DejaVu Sans', sans-serif;
            margin: 0;
            padding: 20px;
        }
        .header {
            text-align: center;
            margin-bottom: 30px;
        }
        .header h1 {
            font-size: 24px;
            margin: 0;
            text-transform: uppercase;
            color: #1a237e;
        }
        .header h2 {
            font-size: 20px;
            margin: 10px 0;
            color: #1a237e;
        }
        .header h3 {
            font-size: 18px;
            margin: 10px 0;
            color: #1a237e;
        }
        .info-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        .info-table th, .info-table td {
            border: 1px solid #000;
            padding: 8px;
            text-align: center;
        }
        .info-table th {
            background-color: #f2f2f2;
        }
        .statistics {
            margin: 20px 0;
            padding: 15px;
            background-color: #f8f9fa;
            border: 1px solid #dee2e6;
            border-radius: 5px;
        }
        .statistics p {
            margin: 5px 0;
        }
        .footer {
            margin-top: 20px;
            text-align: right;
            font-style: italic;
        }
        .page-info {
            text-align: center;
            margin: 10px 0;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>{{ $universityName }}</h1>
        <h2>PHÒNG TỔ CHỨC CÁN BỘ</h2>
        <h3>BÁO CÁO LƯƠNG THÁNG {{ date('m/Y') }}</h3>
    </div>

    @if(isset($currentPage))
        <div class="page-info">
            Trang {{ $currentPage }} / {{ $totalPages }}
        </div>
    @endif

    <div class="statistics">
        <p>Tổng số giảng viên: {{ $totalLecturers }}</p>
        <p>Tổng lương: {{ number_format($totalSalary, 0, ',', '.') }} VNĐ</p>
        <p>Lương trung bình: {{ number_format($avgSalary, 0, ',', '.') }} VNĐ</p>
        <p>Lương cao nhất: {{ number_format($maxSalary, 0, ',', '.') }} VNĐ</p>
        <p>Lương thấp nhất: {{ number_format($minSalary, 0, ',', '.') }} VNĐ</p>
    </div>

    <table class="info-table">
        <thead>
            <tr>
                <th>STT</th>
                <th>Tên giảng viên</th>
                <th>Khoa</th>
                <th>Hệ số lương</th>
                <th>Lương cơ bản</th>
                <th>Lương nhận</th>
            </tr>
        </thead>
        <tbody>
            @foreach($lecturers as $index => $lecturer)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $lecturer->full_name }}</td>
                    <td>{{ $lecturer->department_name }}</td>
                    <td>{{ $lecturer->salary_coefficient }}</td>
                    <td>{{ number_format($lecturer->salary, 0, ',', '.') }} VNĐ</td>
                    <td>{{ number_format($lecturer->total_salary ?? ($lecturer->salary * $lecturer->salary_coefficient), 0, ',', '.') }} VNĐ</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="footer">
        <p>Ngày xuất báo cáo: {{ $exportDate }}</p>
    </div>
</body>
</html> 