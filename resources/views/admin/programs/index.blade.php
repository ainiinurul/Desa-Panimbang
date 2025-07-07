@extends('layouts.admin')

@section('title', 'Program Desa')

@section('content')
<div class="bg-white rounded-lg shadow p-6">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-xl font-semibold">Daftar Program Desa</h2>
        <a href="{{ route('admin.programs.create') }}" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-lg">
            <i class="fas fa-plus mr-2"></i>Tambah Program
        </a>
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
                   placeholder="Cari berdasarkan judul, kategori, atau periode..." 
                   autocomplete="off">
        </div>
        <div id="searchResults" class="text-sm text-gray-600 mt-2 hidden">
            Menampilkan <span id="resultCount">0</span> dari <span id="totalCount">{{ count($programs) }}</span> program
        </div>
    </div>

    <div class="overflow-x-auto">
        <table class="min-w-full bg-white">
            <thead>
                <tr class="bg-gray-100">
                    <th class="py-3 px-4 text-left">No</th>
                    <th class="py-3 px-4 text-left">Gambar</th>
                    <th class="py-3 px-4 text-left">Judul</th>
                    <th class="py-3 px-4 text-left">Kategori</th>
                    <th class="py-3 px-4 text-left">Periode</th>
                    <th class="py-3 px-4 text-left">Status</th>
                    <th class="py-3 px-4 text-left">Aksi</th>
                </tr>
            </thead>
            <tbody id="tableBody">
                @forelse($programs as $program)
                <tr class="border-b program-row" 
                    data-judul="{{ strtolower($program->judul) }}" 
                    data-kategori="{{ strtolower($program->kategori) }}" 
                    data-periode="{{ strtolower($program->periode) }}">
                    <td class="py-3 px-4">{{ $loop->iteration }}</td>
                    <td class="py-3 px-4">
                        @if($program->gambar)
                            <img src="{{ asset('storage/' . $program->gambar) }}" alt="{{ $program->judul }}" class="w-12 h-12 object-cover rounded">
                        @else
                            <div class="w-12 h-12 bg-gray-200 rounded flex items-center justify-center">
                                <i class="fas fa-image text-gray-400"></i>
                            </div>
                        @endif
                    </td>
                    <td class="py-3 px-4">{{ $program->judul }}</td>
                    <td class="py-3 px-4">
                        <span class="px-2 py-1 text-xs rounded-full bg-blue-100 text-blue-800">
                            {{ $program->kategori }}
                        </span>
                    </td>
                    <td class="py-3 px-4">{{ $program->periode }}</td>
                    <td class="py-3 px-4">
                        <span class="px-2 py-1 text-xs rounded-full 
                            {{ $program->status == 'published' ? 'bg-green-100 text-green-800' : 
                               ($program->status == 'scheduled' ? 'bg-yellow-100 text-yellow-800' : 'bg-gray-100 text-gray-800') }}">
                            {{ $program->status }}
                        </span>
                    </td>
                    <td class="py-3 px-4 flex space-x-2">
                        <a href="{{ route('admin.programs.show', $program) }}" class="text-blue-500 hover:text-blue-700 mr-2" title="Lihat Detail">
                            <i class="fas fa-eye"></i>
                        </a>
                        <a href="{{ route('admin.programs.edit', $program) }}" class="text-yellow-500 hover:text-yellow-700" title="Edit Program">
                            <i class="fas fa-edit"></i>
                        </a>
                        <form action="{{ route('admin.programs.destroy', $program) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-500 hover:text-red-700" title="Hapus Program" onclick="return confirm('Anda yakin ingin menghapus program ini?')">
                                <i class="fas fa-trash"></i>
                            </button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr id="emptyRow">
                    <td colspan="7" class="py-8 px-4 text-center text-gray-500">
                        <i class="fas fa-inbox text-4xl mb-2 text-gray-300"></i>
                        <p>Belum ada data program desa.</p>
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
    @if(isset($programs) && method_exists($programs, 'links'))
    <div class="mt-4" id="pagination">
        {{ $programs->links() }}
    </div>
    @endif
</div>

{{-- JavaScript untuk search dan auto-hide success message --}}
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
    const rows = document.querySelectorAll('.program-row');
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
        // Filter rows based on judul, kategori, or periode
        rows.forEach(row => {
            const judul = row.getAttribute('data-judul');
            const kategori = row.getAttribute('data-kategori');
            const periode = row.getAttribute('data-periode');
            
            if (judul.includes(searchTerm) || kategori.includes(searchTerm) || periode.includes(searchTerm)) {
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

// Enhanced delete confirmation
function confirmDelete(programTitle) {
    const message = `Anda yakin ingin menghapus program "${programTitle}"?\n\nTindakan ini tidak dapat dibatalkan.`;
    return confirm(message);
}

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

// Add search highlight effect
function highlightSearchTerm(text, searchTerm) {
    if (!searchTerm) return text;
    const regex = new RegExp(`(${searchTerm})`, 'gi');
    return text.replace(regex, '<mark class="bg-yellow-200">$1</mark>');
}
</script>
@endsection