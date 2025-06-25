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
                            {{-- Status badges dengan warna konsisten --}}
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
                                    Ubah Status
                                    <svg class="-mr-1 ml-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                    </svg>
                                </button>

                                <div id="dropdown-{{ $pelayanan->id }}" class="hidden absolute right-0 mt-2 w-56 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 z-10">
                                    <div class="py-1" role="menu">
                                        <form action="{{ route('admin.pelayanan.updateStatus', $pelayanan->id) }}" method="POST" class="block">
                                            @csrf
                                            @method('PUT')
                                            <input type="hidden" name="status" value="Diproses">
                                            <button type="submit" class="w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-900" role="menuitem">
                                                <i class="fas fa-clock mr-2 text-blue-500"></i>Diproses
                                            </button>
                                        </form>
                                        <form action="{{ route('admin.pelayanan.updateStatus', $pelayanan->id) }}" method="POST" class="block">
                                            @csrf
                                            @method('PUT')
                                            <input type="hidden" name="status" value="Selesai">
                                            <button type="submit" class="w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-900" role="menuitem">
                                                <i class="fas fa-check mr-2 text-green-500"></i>Selesai
                                            </button>
                                        </form>
                                        <form action="{{ route('admin.pelayanan.updateStatus', $pelayanan->id) }}" method="POST" class="block">
                                            @csrf
                                            @method('PUT')
                                            <input type="hidden" name="status" value="Ditolak">
                                            <button type="submit" class="w-full text-left px-4 py-2 text-sm text-red-600 hover:bg-gray-100 hover:text-red-800" role="menuitem">
                                                <i class="fas fa-times mr-2"></i>Ditolak
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
    @if(method_exists($pelayanans, 'links'))
        <div class="mt-4" id="pagination">
            {{ $pelayanans->links() }}
        </div>
    @endif
</div>

{{-- JavaScript untuk dropdown, search, dan auto-hide success message --}}
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
    const totalCount = document.getElementById('totalCount');
    const pagination = document.getElementById('pagination');
    
    let visibleCount = 0;
    
    if (searchTerm === '') {
        // Show all rows
        rows.forEach(row => {
            row.style.display = '';
            visibleCount++;
        });
        
        // Hide search results info and no results message
        searchResults.classList.add('hidden');
        noResults.classList.add('hidden');
        
        // Show pagination if it exists
        if (pagination) {
            pagination.style.display = '';
        }
        
        // Show empty row if no data
        if (emptyRow && rows.length === 0) {
            emptyRow.style.display = '';
        }
    } else {
        // Filter rows
        rows.forEach(row => {
            const nama = row.getAttribute('data-nama');
            if (nama.includes(searchTerm)) {
                row.style.display = '';
                visibleCount++;
            } else {
                row.style.display = 'none';
            }
        });
        
        // Hide empty row and pagination during search
        if (emptyRow) {
            emptyRow.style.display = 'none';
        }
        if (pagination) {
            pagination.style.display = 'none';
        }
        
        // Show/hide results
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
    
    // Close all other dropdowns
    allDropdowns.forEach(item => {
        if (item.id !== dropdownId) {
            item.classList.add('hidden');
        }
    });
    
    // Toggle clicked dropdown
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

// Keyboard shortcuts
document.addEventListener('keydown', function(event) {
    // Ctrl/Cmd + F to focus search
    if ((event.ctrlKey || event.metaKey) && event.key === 'f') {
        event.preventDefault();
        document.getElementById('searchInput').focus();
    }
    
    // Escape to clear search
    if (event.key === 'Escape' && document.getElementById('searchInput').value !== '') {
        clearSearch();
    }
});
</script>
@endsection