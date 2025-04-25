@foreach($lecturers as $item)
    <tr>
        <td>
            <img src="{{ $item->image ? asset($item->image) : asset('lecturer_image/default.jpg') }}"
                 alt="Hình ảnh giáo viên" width="50" height="50" class="rounded-circle">
        </td>
        <td>{{ $item->id }}</td>
        <td>{{ $item->full_name }}</td>
        <td>{{ $item->phone }}</td>
        <td>{{ $item->department_name }}</td>
        <td>{{ $item->degree_name }}</td>
        <td>
            <div class="d-flex gap-1">
                <a href="{{ url('lecturer/show/' . $item->id) }}" class="btn btn-info btn-sm btn-icon" title="Xem">
                    <i class="ti-eye"></i>
                </a>
                <a href="{{ url('lecturer/edit/' . $item->id) }}" class="btn btn-dark btn-sm btn-icon" title="Sửa">
                    <i class="ti-pencil-alt"></i>
                </a>
                <form action="{{ url('lecturer/delete/' . $item->id) }}" method="POST" onsubmit="return confirm('Xác nhận xóa?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm btn-icon" title="Xóa">
                        <i class="ti-trash"></i>
                    </button>
                </form>
            </div>
        </td>
    </tr>
@endforeach 