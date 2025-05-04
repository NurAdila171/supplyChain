@foreach($notifikasi as $row)
    <div class="d-flex flex-stack py-2">
        <div class="d-flex align-items-center">
            <div class="mb-0 me-2">
                <a href="#" class="fs-6 text-gray-800 text-hover-primary fw-bold">{{ $row->judul }}</a>
                <div class="text-gray-600 fs-7">{{ $row->pesan }}</div>
                <div class="text-gray-400 fst-italic fs-8">{{ $row->tgl_notifikasi }}</div>
            </div>
        </div>
    </div>
@endforeach
