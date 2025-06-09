
<div class="max-w-4xl mx-auto p-6 bg-white shadow rounded-lg">
    <h2 class="text-2xl font-semibold mb-4">Kelola Event</h2>

    {{-- Tambah Event --}}
    <form action="{{ route('admin.konten.event.store') }}" method="POST" enctype="multipart/form-data" class="mb-8 space-y-4">
        @csrf
        <div>
            <label class="block text-sm font-medium">Judul Event</label>
            <input type="text" name="title" class="w-full border rounded p-2" required>
        </div>

        <div>
            <label class="block text-sm font-medium">Deskripsi</label>
            <textarea name="description" rows="3" class="w-full border rounded p-2"></textarea>
        </div>

        <div class="grid grid-cols-2 gap-4">
            <div>
                <label class="block text-sm font-medium">Tanggal</label>
                <input type="date" name="event_date" class="w-full border rounded p-2" required>
            </div>
            <div>
                <label class="block text-sm font-medium">Waktu</label>
                <input type="time" name="event_time" class="w-full border rounded p-2" required>
            </div>
        </div>

        <div>
            <label class="block text-sm font-medium">Lokasi</label>
            <input type="text" name="location" class="w-full border rounded p-2">
        </div>

        <div>
            <label class="block text-sm font-medium">Gambar</label>
            <input type="file" name="image" class="w-full">
        </div>

        <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
            Tambah Event
        </button>
    </form>

    {{-- Tabel Event --}}
    <h3 class="text-xl font-semibold mb-3">Daftar Event</h3>
    @foreach ($events as $event)
        <div class="border p-4 rounded mb-4 shadow-sm bg-gray-50">
            <div class="flex items-center justify-between">
                <div>
                    <h4 class="text-lg font-bold">{{ $event->title }}</h4>
                    <p class="text-sm text-gray-600">{{ $event->event_date }} | {{ $event->event_time }}</p>
                    <p class="text-sm">{{ $event->location }}</p>
                </div>
                @if ($event->image_url)
                    <img src="{{ asset('storage/' . $event->image_url) }}" class="w-24 h-16 object-cover rounded ml-4" alt="Event Image">
                @endif
            </div>
            <p class="mt-2 text-gray-700">{{ $event->description }}</p>

            {{-- Tombol Aksi --}}
            <div class="mt-3 flex gap-2">
                {{-- Edit form (popup modal atau inline bisa ditambahkan kemudian) --}}
                <form action="{{ route('admin.konten.event.update', $event->id) }}" method="POST" enctype="multipart/form-data" class="w-full grid grid-cols-1 md:grid-cols-2 gap-2">
                    @csrf
                    @method('PUT')

                    <input type="text" name="title" class="border p-1 rounded" value="{{ $event->title }}" required>
                    <input type="text" name="location" class="border p-1 rounded" value="{{ $event->location }}">
                    <input type="date" name="event_date" class="border p-1 rounded" value="{{ $event->event_date }}" required>
                    <input type="time" name="event_time" class="border p-1 rounded" value="{{ $event->event_time }}" required>
                    <textarea name="description" rows="2" class="col-span-2 border p-1 rounded">{{ $event->description }}</textarea>
                    <input type="file" name="image" class="col-span-2">

                    <button type="submit" class="bg-yellow-500 text-white px-3 py-1 rounded hover:bg-yellow-600">
                        Update
                    </button>
                </form>

                {{-- Hapus --}}
                <form action="{{ route('admin.konten.event.destroy', $event->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus event ini?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="bg-red-600 text-white px-3 py-1 rounded hover:bg-red-700">
                        Hapus
                    </button>
                </form>
            </div>
        </div>
    @endforeach
</div>

