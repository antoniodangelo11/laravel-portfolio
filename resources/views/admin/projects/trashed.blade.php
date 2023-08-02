<x-app-layout>

    @if (session('delete_success'))
    @php $project = session('delete_success') @endphp
        <div class="bg-red-500 text-white p-4">
            The project "{{ $project->title }}" has been Deleted
        </div>
    @endif

    @if (session('restore_success'))
    @php $project = session('restore_success') @endphp
        <div class="bg-green-500 text-white p-4">
            The project "{{ $project->title }}" has been Restored
        </div>
    @endif

    <div class="container p-2 mx-auto sm:p-4 dark:text-gray-100">
        <h2 class="mb-4 text-2xl font-semibold leadi">Cestino</h2>
        <div class="overflow-x-auto">
            <table class="min-w-full text-xs">
                <colgroup>
                    <col>
                    <col>
                    <col>
                    <col>
                    <col>
                    <col>
                    <col class="w-24">
                </colgroup>
                <thead class="dark:bg-gray-700">
                    <tr class="text-left">
                        <th class="p-3">Title</th>
                        <th class="p-3">Author</th>
                        <th class="p-3">Creation date</th>
                        <th class="p-3">Last update</th>
                        <th class="p-3">Collaborators</th>
                        <th class="p-3">Type</th>
                        <th class="p-3 text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($trashedProjects as $project)
                        <tr class="border-b border-opacity-20 dark:border-gray-700 dark:bg-gray-900">
                        <td class="p-3">
                            <p>{{ $project->title }}</p>
                        </td>
                        <td class="p-3">
                            <p>{{ $project->user_id }}</p>
                        </td>
                        <td class="p-3">
                            <p>{{ $project->creation_date }}</p>
                        </td>
                        <td class="p-3">
                            <p>{{ $project->last_update }}</p>
                        </td>
                        
                        <td class="p-3">
                            <p>{{ $project->collaborators }}</p>
                        </td>
                        <td class="p-3">
                            <p>{{ $project->type_id }}</p>
                        </td>
                        <td class="p-3">
                            <div style="display: flex; gap: 10px;">
                                <form class="d-inline-block" method="POST" action="{{ route('admin.projects.restore', ['project' => $project]) }}">
                                    @csrf
                                    <button class="px-7 py-1 font-semibold border rounded dark:border-gray-100 dark:text-gray-100">Restore</button>
                                </form>
                                <button type="button" class="btn btn-danger js-delete" data-bs-toggle="modal" data-bs-target="#deleteModal" data-id="{{ $project->slug }}">
                                    
                                </button>
                                <form action="{{ route('admin.projects.harddelete', ['project' => $project]) }}" method="POST" class="d-inline-block">
                                    @csrf
                                    @method('delete')
                                    <button class="px-7 py-1 font-semibold border rounded dark:border-gray-100 dark:text-gray-100">Delete</button>
                                </form>
                                
                            </div>
                        </td>
                    </tr>
                    @endforeach
                    
                    
                </tbody>
            </table>
        </div>
    </div>
    

    
</x-app-layout>