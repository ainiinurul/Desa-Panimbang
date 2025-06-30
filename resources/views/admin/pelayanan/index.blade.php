@extends('layouts.admin')

@section('title', 'Manajemen Pelayanan')

@section('content')
<div class="bg-white rounded-lg shadow p-6">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-xl font-semibold">Daftar Permohonan Surat</h2>
    </div>

    @if(session('success'))
        <div id="success-alert" class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4 transition-opacity duration-500">
            {{ session('success') }}
        </div>
    @endif

    {{-- Search Box --}}
    <div class="mb-6">
        <div class="relative max-w-md">
            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                <i class="fas fa-search text-gray-400"></i>
            </div>
            <input type="text" 
                   id="searchInput" 
                   class="block w-full pl-10 pr-3 py-2 border border-gray-300 rounded-md leading-5 bg-white placeholder-gray-500 focus:outline-none focus:placeholder-gray-400 focus:ring-1 focus:ring-blue-500 focus:border-blue-500" 
                   placeholder="Cari berdasarkan nama pemohon..." 
                   autocomplete="off">
        </div>
        <div id="searchResults" class="text-sm text-gray-600 mt-2 hidden">
            Menampilkan <span id="resultCount">0</span> dari <span id="totalCount">{{ count($pelayanans) }}</span> permohonan
        </div>
    </div>

    <div class="overflow-x-auto">
        <table class="min-w-full bg-white">
            <thead>
                <tr class="bg-gray-100">
                    <th class="py-3 px-4 text-left">No</th>
                    <th class="py-3 px-4 text-left">Tanggal</th>
                    <th class="py-3 px-4 text-left">Nama Pemohon</th>
                    <th class="py-3 px-4 text-left">NIK</th>
                    <th class="py-3 px-4 text-left">Jenis Surat</th>
                    <th class="py-3 px-4 text-left">Status</th>
                    <th class="py-3 px-4 text-left">Aksi</th>
                </tr>
            </thead>
            <tbody id="tableBody">
                @forelse($pelayanans as $pelayanan)
                    <tr class="border-b pelayanan-row" data-nama="{{ strtolower($pelayanan->nama_pemohon) }}">
                        <td class="py-3 px-4">{{ $loop->iteration }}</td>
                        <td class="py-3 px-4">{{ $pelayanan->created_at->format('d M Y, H:i') }}</td>
                        <td class="py-3 px-4">{{ $pelayanan->nama_pemohon }}</td>
                        <td class="py-3 px-4">{{ $pelayanan->nik_pemohon }}</td>
                        <td class="py-3 px-4">{{ $pelayanan->jenis_surat }}</td>
                        <td class="py-3 px-4">
                            @if($pelayanan->status == 'Pending')
                                <span class="px-2 py-1 text-xs rounded-full bg-yellow-100 text-yellow-800">{{ $pelayanan->status }}</span>
                            @elseif($pelayanan->status == 'Diproses')
                                <span class="px-2 py-1 text-xs rounded-full bg-blue-100 text-blue-800">{{ $pelayanan->status }}</span>
                            @elseif($pelayanan->status == 'Selesai')
                                <span class="px-2 py-1 text-xs rounded-full bg-green-100 text-green-800">{{ $pelayanan->status }}</span>
                            @else
                                <span class="px-2 py-1 text-xs rounded-full bg-red-100 text-red-800">{{ $pelayanan->status }}</span>
                            @endif
                        </td>
                        <td class="py-3 px-4">
                            <div class="relative inline-block text-left">
                                <button type="button" class="inline-flex justify-center w-full px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500" 
                                        onclick="toggleDropdown('dropdown-{{ $pelayanan->id }}')">
                                    Aksi
                                    <svg class="-mr-1 ml-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                    </svg>
                                </button>

                                <div id="dropdown-{{ $pelayanan->id }}" class="hidden absolute right-0 mt-2 w-56 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 z-10">
                                    <div class="py-1" role="menu">
                                        <button onclick="showPelayananDetail({{ $pelayanan->id }})" class="w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-900" role="menuitem">
                                            <i class="fas fa-eye mr-2 text-blue-500"></i>Lihat Detail
                                        </button>
                                        <div class="border-t border-gray-100"></div>

                                        <form action="{{ route('admin.pelayanan.updateStatus', $pelayanan->id) }}" method="POST" class="block">
                                            @csrf
                                            @method('PATCH') <input type="hidden" name="status" value="Diproses">
                                            <button type="submit" class="w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-900" role="menuitem">
                                                <i class="fas fa-clock mr-2 text-blue-500"></i>Diproses
                                            </button>
                                        </form>
                                        <form action="{{ route('admin.pelayanan.updateStatus', $pelayanan->id) }}" method="POST" class="block">
                                            @csrf
                                            @method('PATCH') <input type="hidden" name="status" value="Selesai">
                                            <button type="submit" class="w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-900" role="menuitem">
                                                <i class="fas fa-check mr-2 text-green-500"></i>Selesai
                                            </button>
                                        </form>
                                        <form action="{{ route('admin.pelayanan.updateStatus', $pelayanan->id) }}" method="POST" class="block">
                                            @csrf
                                            @method('PATCH') <input type="hidden" name="status" value="Ditolak">
                                            <button type="submit" class="w-full text-left px-4 py-2 text-sm text-red-600 hover:bg-gray-100 hover:text-red-800" role="menuitem">
                                                <i class="fas fa-times mr-2"></i>Ditolak
                                            </button>
                                        </form>
                                        <div class="border-t border-gray-100"></div>
                                        <form action="{{ route('admin.pelayanan.destroy', $pelayanan->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus permohonan ini? Tindakan ini tidak dapat dibatalkan.');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="w-full text-left px-4 py-2 text-sm text-red-600 hover:bg-gray-100 hover:text-red-800" role="menuitem">
                                                <i class="fas fa-trash-alt mr-2"></i>Hapus
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr id="emptyRow">
                        <td colspan="7" class="py-8 px-4 text-center text-gray-500">
                            <i class="fas fa-inbox text-4xl mb-2 text-gray-300"></i>
                            <p>Belum ada permohonan.</p>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
        
        <div id="noResults" class="hidden py-8 px-4 text-center text-gray-500">
            <i class="fas fa-search text-4xl mb-2 text-gray-300"></i>
            <p>Tidak ada hasil yang ditemukan untuk pencarian "<span id="searchTerm"></span>"</p>
            <button onclick="clearSearch()" class="mt-2 text-blue-600 hover:text-blue-800 text-sm">Hapus pencarian</button>
        </div>
    </div>

    @if(method_exists($pelayanans, 'links'))
        <div class="mt-4" id="pagination">
            {{ $pelayanans->links() }}
        </div>
    @endif
</div>

<div id="detailModal" class="hidden fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full z-50">
    <div class="relative top-20 mx-auto p-5 border w-full max-w-2xl shadow-lg rounded-md bg-white">
        <div class="flex justify-between items-center border-b pb-3 mb-3">
            <h3 class="text-lg font-semibold text-gray-900">Detail Permohonan Surat</h3>
            <button onclick="closeDetail()" class="text-gray-400 hover:text-gray-600">
                <span class="text-2xl">&times;</span>
            </button>
        </div>
        <div id="detailContent">
            </div>
        <div class="mt-4 pt-4 border-t text-right">
             <button onclick="closeDetail()" class="px-4 py-2 bg-gray-200 text-gray-800 rounded-md hover:bg-gray-300">Tutup</button>
        </div>
    </div>
</div>

@endsection

@section('scripts')
{{-- Letakkan semua skrip di sini untuk menimpa @yield('scripts') dari layout utama --}}
<script>
// Auto-hide success message
document.addEventListener('DOMContentLoaded', function() {
    const successAlert = document.getElementById('success-alert');
    if (successAlert) {
        setTimeout(function() {
            successAlert.style.opacity = '0';
            setTimeout(function() {
                successAlert.remove();
            }, 500);
        }, 3000);
    }
});

// Search functionality
document.getElementById('searchInput').addEventListener('input', function() {
    const searchTerm = this.value.toLowerCase().trim();
    const rows = document.querySelectorAll('.pelayanan-row');
    const emptyRow = document.getElementById('emptyRow');
    const noResults = document.getElementById('noResults');
    const searchResults = document.getElementById('searchResults');
    const resultCount = document.getElementById('resultCount');
    const pagination = document.getElementById('pagination');
    let visibleCount = 0;
    
    if (searchTerm === '') {
        rows.forEach(row => row.style.display = '');
        searchResults.classList.add('hidden');
        noResults.classList.add('hidden');
        if (pagination) pagination.style.display = '';
        if (emptyRow) emptyRow.style.display = rows.length === 0 ? '' : 'none';
    } else {
        rows.forEach(row => {
            const nama = row.getAttribute('data-nama');
            const shouldShow = nama.includes(searchTerm);
            row.style.display = shouldShow ? '' : 'none';
            if (shouldShow) visibleCount++;
        });

        if (pagination) pagination.style.display = 'none';
        if (emptyRow) emptyRow.style.display = 'none';

        if (visibleCount > 0) {
            searchResults.classList.remove('hidden');
            noResults.classList.add('hidden');
            resultCount.textContent = visibleCount;
        } else {
            searchResults.classList.add('hidden');
            noResults.classList.remove('hidden');
            document.getElementById('searchTerm').textContent = searchTerm;
        }
    }
});

function clearSearch() {
    const searchInput = document.getElementById('searchInput');
    searchInput.value = '';
    searchInput.dispatchEvent(new Event('input'));
    searchInput.focus();
}

// JAVASCRIPT BARU UNTUK MODAL
function showPelayananDetail(pelayananId) {
    const dropdown = document.getElementById(`dropdown-${pelayananId}`);
    if (dropdown) dropdown.classList.add('hidden');
    
    const modal = document.getElementById('detailModal');
    const detailContent = document.getElementById('detailContent');
    
    modal.classList.remove('hidden');
    detailContent.innerHTML = `<div class="text-center py-4"><i class="fas fa-spinner fa-spin text-2xl text-gray-400"></i><p class="mt-2 text-gray-600">Memuat...</p></div>`;
    
    fetch(`/admin/pelayanan/${pelayananId}/detail`)
        .then(response => response.json())
        .then(data => {
            const tanggal = new Date(data.created_at).toLocaleString('id-ID', { day: '2-digit', month: 'long', year: 'numeric', hour: '2-digit', minute: '2-digit' });

            detailContent.innerHTML = `
                <div class="grid grid-cols-1 md:grid-cols-3 gap-x-4 gap-y-2 text-sm">
                    <div class="md:col-span-1 font-semibold text-gray-500">Tanggal</div><div class="md:col-span-2 text-gray-800">: ${tanggal} WIB</div>
                    <div class="md:col-span-1 font-semibold text-gray-500">Nama Pemohon</div><div class="md:col-span-2 text-gray-800">: ${data.nama_pemohon || '-'}</div>
                    <div class="md:col-span-1 font-semibold text-gray-500">NIK</div><div class="md:col-span-2 text-gray-800">: ${data.nik_pemohon || '-'}</div>
                    <div class="md:col-span-1 font-semibold text-gray-500">No. Telepon</div><div class="md:col-span-2 text-gray-800">: ${data.nomor_telepon || '-'}</div>
                    <div class="md:col-span-1 font-semibold text-gray-500">Jenis Surat</div><div class="md:col-span-2 text-gray-800">: ${data.jenis_surat || '-'}</div>
                    ${data.lainnya ? `<div class="md:col-span-1 font-semibold text-gray-500">Detail Lainnya</div><div class="md:col-span-2 text-gray-800">: ${data.lainnya}</div>` : ''}
                    <div class="md:col-span-1 font-semibold text-gray-500">Status</div><div class="md:col-span-2 text-gray-800">: ${data.status || '-'}</div>
                </div>
                <div class="border-t pt-4 mt-4">
                    <p class="font-semibold text-gray-500 mb-2">Keterangan Tambahan:</p>
                    <p class="text-gray-800 whitespace-pre-wrap bg-gray-50 p-3 rounded-md">${data.keperluan || 'Tidak ada keterangan tambahan.'}</p>
                </div>
            `;
        })
        .catch(error => {
            console.error('Error:', error);
            detailContent.innerHTML = `<div class="text-center py-4 text-red-500">Gagal memuat data.</div>`;
        });
}

function closeDetail() {
    document.getElementById('detailModal').classList.add('hidden');
}

// Dropdown functionality
function toggleDropdown(dropdownId) {
    const dropdown = document.getElementById(dropdownId);
    const allDropdowns = document.querySelectorAll('[id^="dropdown-"]');
    
    allDropdowns.forEach(item => {
        if (item.id !== dropdownId) item.classList.add('hidden');
    });
    
    dropdown.classList.toggle('hidden');
}

document.addEventListener('click', function(event) {
    const isDropdownButton = event.target.matches('button[onclick^="toggleDropdown"]');
    const isDropdownContent = event.target.closest('[id^="dropdown-"]');

    if (!isDropdownButton && !isDropdownContent) {
        document.querySelectorAll('[id^="dropdown-"]').forEach(dropdown => {
            dropdown.classList.add('hidden');
        });
    }
});

// Keyboard shortcuts
document.addEventListener('keydown', function(event) {
    // MODIFIKASI: Tambahkan penanganan untuk modal
    if (event.key === 'Escape') {
        const modal = document.getElementById('detailModal');
        if (!modal.classList.contains('hidden')) {
            closeDetail();
        } else if (document.getElementById('searchInput').value !== '') {
            clearSearch();
        }
    }
    
    if ((event.ctrlKey || event.metaKey) && event.key === 'f') {
        event.preventDefault();
        document.getElementById('searchInput').focus();
    }
});
</script>
@endsection