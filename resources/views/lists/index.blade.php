<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Tugas</title>
</head>
<body>

    <h1>Daftar Tugas Saya</h1>

    {{-- Tampilkan error validasi --}}
    @if ($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- Form tambah list --}}
    <h2>Tambah Daftar Baru</h2>

    <form action="{{ route('lists.store') }}" method="POST">
        @csrf

        <input
            type="text"
            name="name"
            placeholder="Nama daftar"
            value="{{ old('name') }}"
            required
        >

        <button type="submit">Tambah</button>
    </form>

    <hr>

    {{-- Semua list milik user --}}
    <h2>Semua Daftar</h2>

    @if ($lists->isEmpty())
        <p>Belum ada daftar tugas.</p>
    @else

        @foreach ($lists as $list)

            <div>
                <h3>{{ $list->name }}</h3>

                {{-- Form edit --}}
                <form
                    action="{{ route('lists.update', $list->id) }}"
                    method="POST"
                >
                    @csrf
                    @method('PUT')

                    <input
                        type="text"
                        name="name"
                        value="{{ $list->name }}"
                        required
                    >

                    <button type="submit">Edit</button>
                </form>

                {{-- Form hapus --}}
                <form
                    action="{{ route('lists.destroy', $list->id) }}"
                    method="POST"
                >
                    @csrf
                    @method('DELETE')

                    <button type="submit">
                        Hapus
                    </button>
                </form>
            </div>

            <hr>

        @endforeach

    @endif

</body>
</html>