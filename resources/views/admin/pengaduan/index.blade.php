@extends('layouts.admin')

@section('title', 'Manajemen Pengaduan')

@section('content')
<div class="bg-white rounded-lg shadow p-6">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-xl font-semibold">Daftar Pengaduan Warga</h2>
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
                   placeholder="Cari berdasarkan nama pelapor..." 
                   autocomplete="off">
        </div>
        <div id="searchResults" class="text-sm text-gray-600 mt-2 hidden">
            Menampilkan <span id="resultCount">0</span> dari <span id="totalCount">{{ count($pengaduans) }}</span> pengaduan
        </div>
    </div>

    <div class="overflow-x-auto">
        <table class="min-w-full bg-white">
            <thead>
                <tr class="bg-gray-100">
                    <th class="py-3 px-4 text-left">No</th>
                    <th class="py-3 px-4 text-left">Tanggal</th>
                    <th class="py-3 px-4 text-left">Nama Pelapor</th>
                    <th class="py-3 px-4 text-left">No. WhatsApp</th>
                    <th class="py-3 px-4 text-left">Keperluan</th>
                    <th class="py-3 px-4 text-left">Status</th>
                    <th class="py-3 px-4 text-left">Aksi</th>
                </tr>
            </thead>
            <tbody id="tableBody">
                @forelse($pengaduans as $pengaduan)
                    <tr class="border-b pengaduan-row" data-nama="{{ strtolower($pengaduan->nama_lengkap) }}">
                        <td class="py-3 px-4">{{ $loop->iteration }}</td>
                        <td class="py-3 px-4">{{ $pengaduan->created_at->format('d M Y, H:i') }}</td>
                        <td class="py-3 px-4">{{ $pengaduan->nama_lengkap }}</td>
                        <td class="py-3 px-4">{{ $pengaduan->no_whatsapp }}</td>
                        <td class="py-3 px-4">
                            <div class="max-w-xs">
                                <p class="truncate" title="{{ $pengaduan->keperluan }}">{{ $pengaduan->keperluan }}</p>
                            </div>
                        </td>
                        <td class="py-3 px-4">
                            {{-- Status badges dengan warna konsisten --}}
                            @if($pengaduan->status == 'Masuk')
                                <span class="px-2 py-1 text-xs rounded-full bg-yellow-100 text-yellow-800">{{ $pengaduan->status }}</span>
                            @elseif($pengaduan->status == 'Diproses')
                                <span class="px-2 py-1 text-xs rounded-full bg-blue-100 text-blue-800">{{ $pengaduan->status }}</span>
                            @elseif($pengaduan->status == 'Selesai')
                                <span class="px-2 py-1 text-xs rounded-full bg-green-100 text-green-800">{{ $pengaduan->status }}</span>
                            @else
                                <span class="px-2 py-1 text-xs rounded-full bg-red-100 text-red-800">{{ $pengaduan->status }}</span>
                            @endif
                        </td>
                        <td class="py-3 px-4">
                            <div class="relative inline-block text-left">
                                <button type="button" class="inline-flex justify-center w-full px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500" 
                                        onclick="toggleDropdown('dropdown-{{ $pengaduan->id }}')">
                                    Ubah Status
                                    <svg class="-mr-1 ml-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                    </svg>
                                </button>

                                <div id="dropdown-{{ $pengaduan->id }}" class="hidden absolute right-0 mt-2 w-56 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 z-10">
                                    <div class="py-1" role="menu">
                                        {{-- Detail Pengaduan --}}
                                        <button onclick="showDetail({{ $pengaduan->id }})" class="w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-900" role="menuitem">
                                            <i class="fas fa-eye mr-2 text-blue-500"></i>Lihat Detail
                                        </button>
                                        
                                        <div class="border-t border-gray-200"></div>
                                        
                                        {{-- Update Status Forms --}}
                                        <form action="{{ route('admin.pengaduan.updateStatus', $pengaduan->id) }}" method="POST" class="block">
                                            @csrf
                                            @method('PATCH')
                                            <input type="hidden" name="status" value="Diproses">
                                            <button type="submit" class="w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-900" role="menuitem">
                                                <i class="fas fa-clock mr-2 text-blue-500"></i>Diproses
                                            </button>
                                        </form>
                                        <form action="{{ route('admin.pengaduan.updateStatus', $pengaduan->id) }}" method="POST" class="block">
                                            @csrf
                                            @method('PATCH')
                                            <input type="hidden" name="status" value="Selesai">
                                            <button type="submit" class="w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-900" role="menuitem">
                                                <i class="fas fa-check mr-2 text-green-500"></i>Selesai
                                            </button>
                                        </form>
                                        
                                        <div class="border-t border-gray-200"></div>
                                        
                                        {{-- Delete Form --}}
                                        <form action="{{ route('admin.pengaduan.destroy', $pengaduan->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus pengaduan ini? Tindakan ini tidak dapat dibatalkan.');">
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
                            <i class="fas fa-comments text-4xl mb-2 text-gray-300"></i>
                            <p>Belum ada pengaduan.</p>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
        
        {{-- No results message --}}
        <div id="noResults" class="hidden py-8 px-4 text-center text-gray-500">
            <i class="fas fa-search text-4xl mb-2 text-gray-300"></i>
            <p>Tidak ada hasil yang ditemukan untuk pencarian "<span id="searchTerm"></span>"</p>
            <button onclick="clearSearch()" class="mt-2 text-blue-600 hover:text-blue-800 text-sm">
                Hapus pencarian
            </button>
        </div>
    </div>

    {{-- Pagination jika ada --}}
    @if(method_exists($pengaduans, 'links'))
        <div class="mt-4" id="pagination">
            {{ $pengaduans->links() }}
        </div>
    @endif
</div>

{{-- Modal untuk Detail Pengaduan --}}
<div id="detailModal" class="hidden fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full z-50">
    <div class="relative top-20 mx-auto p-5 border w-11/12 md:w-3/4 lg:w-1/2 shadow-lg rounded-md bg-white">
        <div class="mt-3">
            <div class="flex items-center justify-between mb-4">
                <h3 class="text-lg font-semibold text-gray-900">Detail Pengaduan</h3>
                <button onclick="closeDetail()" class="text-gray-400 hover:text-gray-600">
                    <i class="fas fa-times text-xl"></i>
                </button>
            </div>
            <div id="detailContent" class="space-y-4">
                <!-- Content will be loaded here -->
            </div>
        </div>
    </div>
</div>

{{-- JavaScript untuk dropdown, search, modal dan auto-hide success message --}}
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
    const rows = document.querySelectorAll('.pengaduan-row');
    const emptyRow = document.getElementById('emptyRow');
    const noResults = document.getElementById('noResults');
    const searchResults = document.getElementById('searchResults');
    const resultCount = document.getElementById('resultCount');
    const totalCount = document.getElementById('totalCount');
    const pagination = document.getElementById('pagination');
    
    let visibleCount = 0;
    
    if (searchTerm === '') {
        rows.forEach(row => {
            row.style.display = '';
            visibleCount++;
        });
        searchResults.classList.add('hidden');
        noResults.classList.add('hidden');
        if (pagination) {
            pagination.style.display = '';
        }
        if (emptyRow && rows.length === 0) {
            emptyRow.style.display = '';
        }
    } else {
        rows.forEach(row => {
            const nama = row.getAttribute('data-nama');
            if (nama.includes(searchTerm)) {
                row.style.display = '';
                visibleCount++;
            } else {
                row.style.display = 'none';
            }
        });
        if (emptyRow) {
            emptyRow.style.display = 'none';
        }
        if (pagination) {
            pagination.style.display = 'none';
        }
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

// Clear search function
function clearSearch() {
    const searchInput = document.getElementById('searchInput');
    searchInput.value = '';
    searchInput.dispatchEvent(new Event('input'));
    searchInput.focus();
}

// Dropdown functionality
function toggleDropdown(dropdownId) {
    const dropdown = document.getElementById(dropdownId);
    const allDropdowns = document.querySelectorAll('[id^="dropdown-"]');
    
    allDropdowns.forEach(item => {
        if (item.id !== dropdownId) {
            item.classList.add('hidden');
        }
    });
    
    dropdown.classList.toggle('hidden');
}

// Close dropdown when clicking outside
document.addEventListener('click', function(event) {
    const dropdowns = document.querySelectorAll('[id^="dropdown-"]');
    const buttons = document.querySelectorAll('button[onclick^="toggleDropdown"]');
    
    let clickedInsideDropdown = false;
    buttons.forEach(button => {
        if (button.contains(event.target)) {
            clickedInsideDropdown = true;
        }
    });
    
    dropdowns.forEach(dropdown => {
        if (dropdown.contains(event.target)) {
            clickedInsideDropdown = true;
        }
    });
    
    if (!clickedInsideDropdown) {
        dropdowns.forEach(dropdown => {
            dropdown.classList.add('hidden');
        });
    }
});


// ======================================================================
// ▼▼▼ FUNGSI INILAH YANG KITA UBAH MENJADI VERSI LENGKAP DENGAN AJAX ▼▼▼
// ======================================================================
function showDetail(pengaduanId) {
    // Tutup dropdown dulu (jika ada)
    const dropdown = document.getElementById(`dropdown-${pengaduanId}`);
    if (dropdown) {
        dropdown.classList.add('hidden');
    }
    
    const modal = document.getElementById('detailModal');
    const detailContent = document.getElementById('detailContent');
    
    // 1. Tampilkan modal dan pesan "Memuat..."
    modal.classList.remove('hidden');
    detailContent.innerHTML = `
        <div class="text-center py-4">
            <i class="fas fa-spinner fa-spin text-2xl text-gray-400"></i>
            <p class="mt-2 text-gray-600">Memuat detail pengaduan...</p>
        </div>
    `;
    
    // 2. Ambil data dari server menggunakan Fetch API ke route yang sudah kita buat
    fetch(`/admin/pengaduan/${pengaduanId}/detail`)
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.json();
        })
        .then(data => {
            // 3. Format tanggal dari database agar mudah dibaca
            const tanggal = new Date(data.created_at).toLocaleString('id-ID', {
                day: '2-digit', month: 'long', year: 'numeric',
                hour: '2-digit', minute: '2-digit'
            });

            // 4. Susun HTML dengan data yang diterima dari server
            detailContent.innerHTML = `
                <div class="grid grid-cols-1 md:grid-cols-3 gap-x-4 gap-y-2 text-sm">
                    <div class="md:col-span-1 font-semibold text-gray-600">Nama Pelapor</div>
                    <div class="md:col-span-2 text-gray-800 break-words">: ${data.nama_lengkap}</div>

                    <div class="md:col-span-1 font-semibold text-gray-600">No. WhatsApp</div>
                    <div class="md:col-span-2 text-gray-800 break-words">: ${data.no_whatsapp}</div>
                    
                    <div class="md:col-span-1 font-semibold text-gray-600">Tanggal Lapor</div>
                    <div class="md:col-span-2 text-gray-800 break-words">: ${tanggal} WIB</div>
                    
                    <div class="md:col-span-1 font-semibold text-gray-600">Keperluan</div>
                    <div class="md:col-span-2 text-gray-800 break-words">: ${data.keperluan}</div>
                    
                    <div class="md:col-span-1 font-semibold text-gray-600">Status</div>
                    <div class="md:col-span-2 text-gray-800 break-words">: ${data.status}</div>
                </div>

                <div class="border-t pt-4 mt-4">
                    <p class="font-semibold text-gray-600 mb-2">Isi Pesan:</p>
                    <p class="text-gray-800 whitespace-pre-wrap bg-gray-50 p-3 rounded-md">${data.isi_pesan}</p>
                </div>
            `;
        })
        .catch(error => {
            // 5. Tampilkan pesan error jika gagal mengambil data
            console.error('Fetch Error:', error);
            detailContent.innerHTML = `
                <div class="text-center py-4 text-red-500">
                    <i class="fas fa-exclamation-triangle text-2xl mb-2"></i>
                    <p>Gagal memuat data. Silakan tutup dan coba lagi.</p>
                </div>
            `;
        });
}
// ======================================================================
// ▲▲▲ BATAS AKHIR FUNGSI YANG KITA GANTI ▲▲▲
// ======================================================================


function closeDetail() {
    const modal = document.getElementById('detailModal');
    modal.classList.add('hidden');
}

// Close modal when clicking outside
document.getElementById('detailModal').addEventListener('click', function(event) {
    if (event.target === this) {
        closeDetail();
    }
});

// Keyboard shortcuts
document.addEventListener('keydown', function(event) {
    // Ctrl/Cmd + F to focus search
    if ((event.ctrlKey || event.metaKey) && event.key === 'f') {
        event.preventDefault();
        document.getElementById('searchInput').focus();
    }
    
    // Escape to clear search or close modal
    if (event.key === 'Escape') {
        const modal = document.getElementById('detailModal');
        if (!modal.classList.contains('hidden')) {
            closeDetail();
        } else if (document.getElementById('searchInput').value !== '') {
            clearSearch();
        }
    }
});
</script>
@endsection