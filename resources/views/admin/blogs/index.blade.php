<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <div class="flex justify-between items-center mb-4">
                        <h2 class="text-2xl font-semibold">Bloglar</h2>
                        <a href="{{ route('blogs.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                            Yeni Blog Ekle
                        </a>
                    </div>

                    @isset($blogs)
                        <div class="overflow-x-auto">
                            <table class="table-auto min-w-full bg-white border border-gray-300">
                                <thead>
                                    <tr>
                                        <th class="py-2 px-4 bg-gray-200 border-b">ID</th>
                                        <th class="py-2 px-4 bg-gray-200 border-b">Kategori Adı</th>
                                        <th class="py-2 px-4 bg-gray-200 border-b">Başlık</th>
                                        <th class="py-2 px-4 bg-gray-200 border-b">Oluşturulma Tarihi</th>
                                        <th class="py-2 px-4 bg-gray-200 border-b">Güncellenme Tarihi</th>
                                        <th class="py-2 px-4 bg-gray-200 border-b">Detaylı Göster</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($blogs as $blog)
                                        <tr>
                                            <td class="py-2 px-4 border-b">{{ $blog->id }}</td>
                                            <td class="py-2 px-4 border-b">{{ $blog->category_name }}</td>
                                            <td class="py-2 px-4 border-b">{{ $blog->title }}</td>
                                            <td class="py-2 px-4 border-b">{{ $blog->created_at }}</td>
                                            <td class="py-2 px-4 border-b">{{ $blog->updated_at }}</td>
                                            <td class="py-2 px-4 border-b">
                                                <a href="{{ route('blogs.show', ['id' => $blog->id]) }}" class="inline-block bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                                    Göster  
                                                </a>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="6" class="text-center py-4">Kayıt bulunamadı</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    @else
                        <p class="text-center">Kayıt bulunamadı</p>
                    @endisset
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
