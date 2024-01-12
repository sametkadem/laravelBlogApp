<!-- resources/views/admin/blogs/create.blade.php -->

<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h2 class="text-2xl font-semibold">Yeni Blog Ekle</h2>

                    <!-- Yeni Blog Ekleme Formu -->
                    <form action="{{ route('blogs.store') }}" method="POST">
                        @csrf
                        <div class="mb-4">
                            <label for="category_id" class="block text-gray-700 font-bold">Kategori</label>
                            <select id="category_id" name="category_id" class="form-select mt-1 block w-full" required>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-4">
                            <label for="title" class="block text-gray-700 font-bold">Başlık</label>
                            <input type="text" id="title" name="title" class="form-input mt-1 block w-full" required>
                        </div>
                        <div class="mb-4">
                            <label for="content" class="block text-gray-700 font-bold">İçerik</label>
                            <textarea id="content" name="content" class="form-textarea mt-1 block w-full" required></textarea>
                        </div>

                        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                            Ekle
                        </button>
                    </form>

                    <a href="{{ route('blogs.index') }}" class="inline-block bg-gray-300 hover:bg-gray-400 text-gray-700 font-bold py-2 px-4 rounded mt-4">
                        Geri Dön
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
