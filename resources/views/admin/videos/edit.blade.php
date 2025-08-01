<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Video: ' . Str::limit($video->judul, 50)) }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @if ($errors->any())
                        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                            <ul class="list-disc list-inside">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('admin.videos.update', $video) }}" method="POST">
                        @csrf
                        @method('PUT') {{-- Penting untuk metode PUT/PATCH --}}
                        <div class="mb-4">
                            <label for="judul" class="block text-sm font-medium text-gray-700">Judul Video</label>
                            <input type="text" name="judul" id="judul" value="{{ old('judul', $video->judul) }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required>
                        </div>

                        <div class="mb-4">
                            <label for="embed_code" class="block text-sm font-medium text-gray-700">Kode Embed Video (YouTube/Vimeo)</label>
                            <textarea name="embed_code" id="embed_code" rows="5" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required placeholder="Contoh: <iframe width='560' height='315' src='https://www.youtube.com/embed/XXXXX' frameborder='0' allowfullscreen></iframe>">{{ old('embed_code', $video->embed_code) }}</textarea>
                            <p class="mt-1 text-xs text-gray-500">Salin kode embed dari YouTube/Vimeo dan tempelkan di sini.</p>
                        </div>

                        <div class="mb-4">
                            <label for="thumbnail" class="block text-sm font-medium text-gray-700">URL Thumbnail Video (Opsional)</label>
                            <input type="url" name="thumbnail" id="thumbnail" value="{{ old('thumbnail', $video->thumbnail) }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" placeholder="Contoh: https://img.youtube.com/vi/XXXXX/hqdefault.jpg">
                            <p class="mt-1 text-xs text-gray-500">Jika kosong, thumbnail YouTube/Vimeo akan dicoba diambil secara otomatis.</p>
                        </div>

                        <div class="mb-4">
                            <label for="deskripsi" class="block text-sm font-medium text-gray-700">Deskripsi Video (Opsional)</label>
                            <textarea name="deskripsi" id="deskripsi" rows="3" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">{{ old('deskripsi', $video->deskripsi) }}</textarea>
                        </div>

                        <div class="mb-4">
                            <label class="inline-flex items-center">
                                <input type="hidden" name="is_active" value="0">
                                <input type="checkbox" name="is_active" value="1" class="form-checkbox h-5 w-5 text-gray-600" {{ old('is_active', $video->is_active) ? 'checked' : '' }}>
                                <span class="ml-2 text-sm text-gray-600">Aktif (Tampilkan di Publik)</span>
                            </label>
                            @error('is_active')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <a href="{{ route('admin.videos.index') }}" class="inline-flex items-center px-4 py-2 bg-gray-300 border border-transparent rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest hover:bg-gray-400 active:bg-gray-500 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150 mr-2">Batal</a>
                            <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">Update Video</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>