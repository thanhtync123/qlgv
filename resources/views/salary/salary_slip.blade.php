<!DOCTYPE html>
<html>
<head>
    <title>Phiếu Lương</title>
    <style>
        body {
            font-family: 'Times New Roman', Times, serif;
            margin: 0;
            padding: 20px;
        }
        .salary-slip {
            width: 800px;
            margin: 0 auto;
            border: 1px solid #000;
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
        }
        .info-table th {
            background-color: #f2f2f2;
            width: 30%;
        }
        .signature {
            margin-top: 50px;
            display: flex;
            justify-content: space-between;
        }
        .signature div {
            text-align: center;
        }
        .signature p {
            margin: 0;
            font-weight: bold;
        }
        .signature .line {
            border-top: 1px solid #000;
            width: 200px;
            margin-top: 50px;
        }
        .footer {
            margin-top: 20px;
            text-align: center;
            font-style: italic;
        }
        @media print {
            .no-print {
                display: none;
            }
            .salary-slip {
                border: none;
            }
            body {
                padding: 0;
            }
        }
    </style>
</head>
<body>
    <div class="salary-slip">
        <div class="header">
            <h1>TRƯỜNG ĐẠI HỌC SƯ PHẠM KỸ THUẬT VĨNH LONG</h1>
            <h2>PHÒNG TỔ CHỨC CÁN BỘ</h2>
            <h3>PHIẾU LƯƠNG THÁNG {{ date('m/Y') }}</h3>
        </div>

        <table class="info-table">
            <tr>
                <th>Họ và tên:</th>
                <td>{{ $lecturer->full_name }}</td>
            </tr>
            <tr>
                <th>Khoa:</th>
                <td>{{ $lecturer->department_name }}</td>
            </tr>
            <tr>
                <th>Hệ số lương:</th>
                <td>{{ $lecturer->salary_coefficient }}</td>
            </tr>
            <tr>
                <th>Lương cơ bản:</th>
                <td>{{ number_format($lecturer->salary, 0, ',', '.') }} VNĐ</td>
            </tr>
            <tr>
                <th>Lương nhận:</th>
                <td>{{ number_format($lecturer->salary * $lecturer->salary_coefficient, 0, ',', '.') }} VNĐ</td>
            </tr>
            <tr>
                <th>Ngày cập nhật:</th>
                <td>{{ date('d/m/Y', strtotime($lecturer->updated_at)) }}</td>
            </tr>
        </table>

        <div class="signature">
            <div>
                <p>Người lập phiếu</p>
                <div class="line"></div>
            </div>
            <div>
                <p>Kế toán trưởng</p>
                <div class="line"></div>
            </div>
            <div>
                <p>Giảng viên</p>
                <div class="line"></div>
            </div>
        </div>

        <div class="footer">
            <p>Vĩnh Long, ngày {{ date('d') }} tháng {{ date('m') }} năm {{ date('Y') }}</p>
        </div>

        <div class="no-print" style="text-align: center; margin-top: 20px;">
            <button onclick="window.print()" style="padding: 10px 20px; margin-right: 10px; background-color: #1a237e; color: white; border: none; cursor: pointer;">In phiếu lương</button>
            <button onclick="window.close()" style="padding: 10px 20px; background-color: #dc3545; color: white; border: none; cursor: pointer;">Đóng</button>
        </div>
    </div>
</body>
</html> 