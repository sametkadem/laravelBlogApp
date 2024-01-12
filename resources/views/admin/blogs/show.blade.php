<!-- resources/views/admin/blogs/show.blade.php -->

<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h2 class="text-2xl font-semibold">Blog Detayları</h2>

                                    

                    <!-- Kullanıcı Düzenleme Formu -->
                    <form action="#" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-4">
                            <label for="title" class="block text-gray-700 font-bold">Başlık</label>
                            <input type="text" id="title" name="title" value="{{ old('title', $blog->title) }}" class="form-input mt-1 block w-full" required>
                        </div>
                        <div class="mb-4">
                            <label for="content" class="block text-gray-700 font-bold">İçerik</label>
                            <textarea id="content" name="content" class="form-textarea mt-1 block w-full" required>{{ old('content', $blog->content) }}</textarea>
                        </div>

                        <!-- Diğer form alanlarını buraya ekleyin -->

                        <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                            Kaydet
                        </button>
                    </form>

                    <a href="{{ route('blogs.index') }}" class="inline-block bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mt-4">
                        Geri Dön
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
