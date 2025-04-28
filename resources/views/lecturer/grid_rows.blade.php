@foreach($lecturers as $item)
    <div class="col-md-4 mb-4">
        <div class="card h-100 shadow-sm hover-shadow transition-all">
            <div class="card-body">
                <div class="d-flex align-items-center mb-4">
                    <div class="flex-shrink-0">
                        <img src="{{ $item->image ? asset($item->image) : asset('lecturer_image/default.jpg') }}"
                             alt="Hình ảnh giáo viên" class="rounded-circle" style="width: 80px; height: 80px; object-fit: cover; border: 3px solid #e9ecef;">
                    </div>
                    <div class="flex-grow-1 ms-3">
                        <h5 class="card-title mb-1">{{ $item->full_name }}</h5>
                        <p class="text-muted mb-0">ID: {{ $item->id }}</p>
                        <span class="badge bg-primary">{{ $item->degree_name }}</span>
                    </div>
                </div>

                <div class="lecturer-info mb-4">
                    <div class="info-item d-flex align-items-center mb-2">
                        <i class="ti-bookmark-alt me-2 text-primary"></i>
                        <span>Chuyên ngành: {{ $item->major }}</span>
                    </div>
                    <div class="info-item d-flex align-items-center mb-2">
                        <i class="ti-home me-2 text-primary"></i>
                        <span>Khoa: {{ $item->department_name }}</span>
                    </div>
                    <div class="info-item d-flex align-items-center mb-2">
                        <i class="ti-file me-2 text-primary"></i>
                        <span>Loại hợp đồng: {{ $item->contract_type }}</span>
                    </div>
                    <div class="info-item d-flex align-items-center">
                        <i class="ti-mobile me-2 text-primary"></i>
                        <span>{{ $item->phone }}</span>
                    </div>
                </div>

                <div class="d-flex justify-content-center gap-2">
                    <a href="{{ url('lecturer/show/' . $item->id) }}" class="btn btn-info btn-sm" title="Xem">
                        <i class="ti-eye"></i> Xem
                    </a>
                    <a href="{{ url('lecturer/edit/' . $item->id) }}" class="btn btn-dark btn-sm" title="Sửa">
                        <i class="ti-pencil-alt"></i> Sửa
                    </a>
                    <form action="{{ url('lecturer/delete/' . $item->id) }}" method="POST" onsubmit="return confirm('Xác nhận xóa?')" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" title="Xóa">
                            <i class="ti-trash"></i> Xóa
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endforeach

<style>
    .card {
        border-radius: 15px;
        border: none;
        transition: all 0.3s ease;
    }
    
    .hover-shadow:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(0,0,0,0.1) !important;
    }
    
    .info-item {
        padding: 8px;
        background-color: #f8f9fa;
        border-radius: 8px;
        transition: all 0.3s ease;
    }
    
    .info-item:hover {
        background-color: #e9ecef;
    }
    
    .badge {
        font-size: 0.8rem;
        padding: 5px 10px;
        border-radius: 20px;
    }
    
    .btn {
        border-radius: 20px;
        padding: 5px 15px;
    }
</style> 