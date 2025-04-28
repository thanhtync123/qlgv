<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Báo cáo lương</title>
    <style>
        body {
            font-family: 'DejaVu Sans', sans-serif;
            font-size: 12px;
        }
        .header {
            text-align: center;
            margin-bottom: 20px;
        }
        .university-name {
            font-size: 16px;
            font-weight: bold;
            text-transform: uppercase;
            color: #2c3e50;
        }
        .report-title {
            font-size: 14px;
            font-weight: bold;
            margin: 10px 0;
        }
        .info-section {
            margin-bottom: 20px;
        }
        .info-row {
            margin-bottom: 5px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
            font-weight: bold;
        }
        .summary {
            margin-top: 20px;
            padding: 10px;
            background-color: #f9f9f9;
            border: 1px solid #ddd;
        }
        .footer {
            margin-top: 30px;
            text-align: right;
        }
    </style>
</head>
<body>
    <div class="header">
        <div class="university-name">{{ $universityName }}</div>
        <div class="report-title">BÁO CÁO LƯƠNG</div>
        <div>Ngày xuất báo cáo: {{ $exportDate }}</div>
    </div>

    <div class="info-section">
        <div class="info-row">Tổng số giảng viên: {{ $totalLecturers }}</div>
        <div class="info-row">Tổng quỹ lương: {{ number_format($totalSalary, 0, ',', '.') }} VNĐ</div>
        <div class="info-row">Lương trung bình: {{ number_format($avgSalary, 0, ',', '.') }} VNĐ</div>
        <div class="info-row">Lương cao nhất: {{ number_format($maxSalary, 0, ',', '.') }} VNĐ</div>
        <div class="info-row">Lương thấp nhất: {{ number_format($minSalary, 0, ',', '.') }} VNĐ</div>
    </div>

    <table>
        <thead>
            <tr>
                <th>STT</th>
                <th>Họ và tên</th>
                <th>Khoa</th>
                <th>Lương cơ bản</th>
                <th>Hệ số lương</th>
                <th>Thành tiền</th>
            </tr>
        </thead>
        <tbody>
            @foreach($lecturers as $index => $lecturer)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $lecturer->full_name }}</td>
                    <td>{{ $lecturer->department_name }}</td>
                    <td>{{ number_format($lecturer->salary, 0, ',', '.') }}</td>
                    <td>{{ $lecturer->salary_coefficient }}</td>
                    <td>{{ number_format($lecturer->salary * $lecturer->salary_coefficient, 0, ',', '.') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="footer">
        <div>Vĩnh Long, ngày {{ date('d') }} tháng {{ date('m') }} năm {{ date('Y') }}</div>
        <div style="margin-top: 50px;">
            <div>Người lập báo cáo</div>
            <div style="margin-top: 30px;">(Ký và ghi rõ họ tên)</div>
        </div>
    </div>
</body>
</html> 