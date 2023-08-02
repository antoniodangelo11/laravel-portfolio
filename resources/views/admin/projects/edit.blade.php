<x-app-layout>
    <div class="p-4">
        <form method="post" action="{{ route('admin.projects.update', ['project' => $project]) }}" enctype="multipart/form-data">
            @csrf
            @method('put')

            <div class="mb-4">
                <label for="title" class="block mb-1 font-semibold text-white">Title</label>
                <input type="text" id="title" name="title" class="w-full px-4 py-2 border rounded @error('title') border-red-500 @enderror" value="{{ old('title', $project->title) }}">
                @error('title')
                    <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="author" class="block mb-1 font-semibold text-white">Author</label>
                <input type="text" id="author" name="user_id" class="w-full px-4 py-2 border rounded @error('user_id') border-red-500 @enderror" value="{{ old('user_id', $project->user_id) }}">
                @error('user_id')
                    <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex items-center mb-3">
                <label for="image" class="px-4 py-2 bg-gray-200 rounded-l">Upload</label>
                <input type="file" class="hidden @error('image') is-invalid @enderror" id="image" name="image">
                <label for="image" class="px-4 py-2 text-white bg-blue-500 rounded-r cursor-pointer hover:bg-blue-600">
                    Select File
                </label>
            </div>
            <div class="invalid-feedback">
                @error('image') {{ $message }} @enderror
            </div>

            <div class="mb-4">
                <label for="creation_date" class="block mb-1 font-semibold text-white">Nazionalità</label>
                <input type="text" id="creation_date" name="creation_date" class="w-full px-4 py-2 border rounded @error('creation_date') border-red-500 @enderror" value="{{ old('creation_date', $project->creation_date) }}">
                @error('creation_date')
                    <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="last_update" class="block mb-1 font-semibold text-white">Anno di nascita</label>
                <input type="text" id="last_update" name="last_update" class="w-full px-4 py-2 border rounded @error('last_update') border-red-500 @enderror" value="{{ old('last_update', $project->last_update) }}">
                @error('last_update')
                    <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="collaborators" class="block mb-1 font-semibold text-white">Ruolo</label>
                <input type="text" id="collaborators" name="collaborators" class="w-full px-4 py-2 border rounded @error('collaborators') border-red-500 @enderror" value="{{ old('collaborators', $project->collaborators) }}">
                @error('collaborators')
                    <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-3">
                <label for="type" class="block text-sm font-medium text-gray-700">Type</label>
                <select class="form-select mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-primary-500 focus:border-primary-500 sm:text-sm @error('type_id') border-red-500 @enderror" id="type" name="type_id">
                    <option selected>Change type</option>
                    
                    @foreach ($types as $type)
                    <option 
                        value="{{ $type->id }}"
                        @if (old('type_id', $project->type->id) == $type->id) selected @endif
                    >{{ $type->name }}</option>
                    @endforeach
                </select>
                <div class="text-red-500 text-xs mt-1">
                    @error('type_id') {{ $message }} @enderror
                </div>
            </div>

            <div class="mb-4">
                <label for="link_github" class="block mb-1 font-semibold text-white">Soprannome</label>
                <input type="text" id="link_github" name="link_github" class="w-full px-4 py-2 border rounded @error('link_github') border-red-500 @enderror" value="{{ old('link_github', $project->link_github) }}">
                @error('link_github')
                    <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                @enderror
            </div>
    
            <div class="mb-4">
                <label for="description" class="block mb-1 font-semibold text-white">Descrizione</label>
                <textarea id="description" name="description" class="w-full px-4 py-2 border rounded @error('description') border-red-500 @enderror" rows="4" required>{{ old('description', $project->description) }}</textarea>
                @error('description')
                    <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <button type="submit" class="px-4 py-2 text-white bg-green-700 rounded">Invia</button>
            </div>
        </form>
    </div>
</x-app-layout>