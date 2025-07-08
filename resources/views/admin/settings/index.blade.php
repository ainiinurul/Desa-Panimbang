@extends('layouts.admin')
@section('title', 'Pengaturan Website')

@section('content')
<div class="bg-white rounded-lg shadow p-6">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-xl font-semibold">Pengaturan Konten Website</h2>
        <div class="text-sm text-gray-500">
            <i class="fas fa-cog mr-2"></i>Konfigurasi Website
        </div>
    </div>

    @if(session('success'))
        <div id="success-notification" class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4 transition-opacity duration-500">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('admin.settings.update') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="space-y-6">
            @foreach($settings as $setting)
                <div class="border-b border-gray-200 pb-6 last:border-b-0">
                    <label for="{{ $setting->key }}" class="block text-gray-700 text-sm font-semibold mb-3 capitalize">
                        {{ str_replace('_', ' ', $setting->key) }}:
                    </label>

                    @if($setting->type == 'text')
                        <input type="text" 
                               name="{{ $setting->key }}" 
                               id="{{ $setting->key }}" 
                               value="{{ old($setting->key, $setting->value) }}" 
                               class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">

                    @elseif($setting->type == 'textarea')
                        <textarea name="{{ $setting->key }}" 
                                  id="{{ $setting->key }}" 
                                  rows="10" 
                                  class="tinymce-editor w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent resize-vertical">{{ old($setting->key, $setting->value) }}</textarea>

                    @elseif($setting->type == 'image')
                        <div class="space-y-3">
                            <input type="file" 
                                   name="{{ $setting->key }}" 
                                   id="{{ $setting->key }}" 
                                   accept="image/*"
                                   class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                            
                            @if($setting->value)
                                <div class="mt-3">
                                    <p class="text-sm text-gray-600 mb-2">Gambar saat ini:</p>
                                    <img src="{{ asset('storage/' . $setting->value) }}" 
                                         alt="Current {{ str_replace('_', ' ', $setting->key) }}" 
                                         class="h-32 w-auto rounded-lg border border-gray-200 shadow-sm">
                                </div>
                            @endif
                        </div>
                    @endif

                    @error($setting->key)
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
            @endforeach
        </div>

        <div class="mt-8 pt-6 border-t border-gray-200">
            <div class="flex justify-end space-x-3">
                <button type="reset" 
                        class="px-4 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-gray-500">
                    <i class="fas fa-undo mr-2"></i>Reset
                </button>
                <button type="submit" 
                        class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <i class="fas fa-save mr-2"></i>Simpan Pengaturan
                </button>
            </div>
        </div>
    </form>
</div>

<!-- Auto-hide success notification script -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    const successNotification = document.getElementById('success-notification');
    
    if (successNotification) {
        // Hide notification after 5 seconds (5000ms)
        setTimeout(function() {
            successNotification.style.opacity = '0';
            
            // Remove element from DOM after fade out animation
            setTimeout(function() {
                successNotification.remove();
            }, 500); // Wait for CSS transition to complete
        }, 5000);
    }
});
</script>

<!-- TinyMCE CDN -->
<script src="https://cdn.tiny.cloud/1/s34kxbmrwl21bvruxzffhbsldltsq5kxpjxzpigtqy2m9m0h/tinymce/7/tinymce.min.js" referrerpolicy="origin"></script>

{{-- Ganti API_KEY_KAMU_DISINI dengan API key kamu --}}

<script>
  tinymce.init({
    selector: 'textarea',
    plugins: [
      // Core editing features
      'anchor', 'autolink', 'charmap', 'codesample', 'emoticons', 'image', 'link', 'lists', 'media', 'searchreplace', 'table', 'visualblocks', 'wordcount',
      // Your account includes a free trial of TinyMCE premium features
      // Try the most popular premium features until Jul 21, 2025:
      'checklist', 'mediaembed', 'casechange', 'formatpainter', 'pageembed', 'a11ychecker', 'tinymcespellchecker', 'permanentpen', 'powerpaste', 'advtable', 'advcode', 'editimage', 'advtemplate', 'ai', 'mentions', 'tinycomments', 'tableofcontents', 'footnotes', 'mergetags', 'autocorrect', 'typography', 'inlinecss', 'markdown','importword', 'exportword', 'exportpdf'
    ],
    toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table mergetags | addcomment showcomments | spellcheckdialog a11ycheck typography | align lineheight | checklist numlist bullist indent outdent | emoticons charmap | removeformat',
    tinycomments_mode: 'embedded',
    tinycomments_author: 'Author name',
    mergetags_list: [
      { value: 'First.Name', title: 'First Name' },
      { value: 'Email', title: 'Email' },
    ],
    ai_request: (request, respondWith) => respondWith.string(() => Promise.reject('See docs to implement AI Assistant')),
  });
</script>

<script>
document.addEventListener('DOMContentLoaded', function() {
    tinymce.init({
        selector: '.tinymce-editor',
        height: 400,
        menubar: true,
        plugins: [
            'advlist', 'autolink', 'lists', 'link', 'image', 'charmap', 'preview',
            'anchor', 'searchreplace', 'visualblocks', 'code', 'fullscreen',
            'insertdatetime', 'media', 'table', 'help', 'wordcount', 'emoticons'
        ],
        toolbar: 'undo redo | blocks | ' +
                 'bold italic underline strikethrough | forecolor backcolor | ' +
                 'alignleft aligncenter alignright alignjustify | ' +
                 'bullist numlist outdent indent | ' +
                 'removeformat | link image media table | ' +
                 'emoticons charmap | preview code fullscreen help',
        content_style: 'body { font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Oxygen, Ubuntu, Cantarell, "Open Sans", "Helvetica Neue", sans-serif; font-size: 14px; line-height: 1.6; }',
        
        // Konfigurasi untuk bahasa Indonesia
        language: 'id',
        
        // Pengaturan gambar
        image_advtab: true,
        image_uploadtab: true,
        
        // Pengaturan untuk responsive
        mobile: {
            theme: 'mobile',
            plugins: ['autosave', 'lists', 'autolink'],
            toolbar: ['undo', 'bold', 'italic', 'styleselect']
        },
        
        // Custom style formats
        style_formats: [
            {title: 'Heading 1', block: 'h1'},
            {title: 'Heading 2', block: 'h2'},
            {title: 'Heading 3', block: 'h3'},
            {title: 'Heading 4', block: 'h4'},
            {title: 'Heading 5', block: 'h5'},
            {title: 'Heading 6', block: 'h6'},
            {title: 'Paragraph', block: 'p'},
            {title: 'Blockquote', block: 'blockquote'},
            {title: 'Div', block: 'div'},
            {title: 'Pre', block: 'pre'},
            {title: 'Code', inline: 'code'}
        ],
        
        // Pengaturan paste
        paste_data_images: true,
        paste_as_text: false,
        paste_word_valid_elements: "b,strong,i,em,h1,h2,h3,h4,h5,h6,p,ol,ul,li,a[href],span,div,br",
        
        // Validasi HTML
        valid_elements: '*[*]',
        extended_valid_elements: '*[*]',
        
        // Setup function untuk kustomisasi lebih lanjut
        setup: function(editor) {
            editor.on('change', function() {
                editor.save();
            });
            
            // Custom button contoh
            editor.ui.registry.addButton('customButton', {
                text: 'Contoh',
                onAction: function() {
                    editor.insertContent('<p style="color: #007cba; font-weight: bold;">Teks contoh dengan styling khusus</p>');
                }
            });
        }
    });
});
</script>

@endsection