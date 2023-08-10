<x-app-layout>

    @if (session('delete_success'))
    @php
        $project = session('delete_success')
    @endphp
    <div class="bg-red-500 text-white p-4">
        "{{ $project->title }}" has been moved to the trash!!
        <form action="{{ route('admin.projects.cancel', ['project' => $project]) }}" method="post">
            @csrf
            <button class="bg-yellow-500 text-white px-4 py-2 rounded">Cancel</button>
        </form>
    </div>
    @endif

    <div class="container p-2 mx-auto sm:p-4 dark:text-gray-100">
        <h2 class="mb-4 text-2xl font-semibold leadi">Progetti</h2>
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
                        <th class="p-3 text-blue-600/100">@sortablelink('title')</th>
                        <th class="p-3 text-blue-600/100">@sortablelink('user.name', 'Author')</th>
                        <th class="p-3 text-blue-600/100">@sortablelink('creation_date', 'Creation Date')</th>
                        <th class="p-3 text-blue-600/100">@sortablelink('last_update', 'Last Update')</th>
                        <th class="p-3 text-blue-600/100">@sortablelink('collaborators')</th>
                        <th class="p-3 text-blue-600/100">@sortablelink('type_id', 'Type')</th>
                        <th class="p-3">Technologies</th>
                        <th class="p-3 text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($projects as $project)
                        <tr class="border-b border-opacity-20 dark:border-gray-700 dark:bg-gray-900">
                        <td class="p-3">
                            <p>{{ $project->title }}</p>
                        </td>
                        <td class="p-3">
                            <p>{{ $project->user->name }}</p>
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
                            <p>{{ $project->type->name }}</p>
                        </td>
                        <td class="p-3">
                            {{-- @foreach ($project->technologies as $technology)
                                <p>{{ $technology->name }}</p>{{ !$loop->last ? ',' : '' }}
                            @endforeach --}}
                            <p>{{ implode(', ', $project->technologies->pluck('name')->all()) }}</p>
                        </td>
                        <td class="p-3">
                            <div class="flex justify-center gap-4">
                                <button class="px-7 py-1 font-semibold border rounded dark:border-gray-100 dark:text-gray-100" onclick="window.location='{{ route('admin.projects.show', ['project' => $project]) }}'">Info</button>
                                <button class="px-7 py-1 font-semibold border rounded dark:border-gray-100 dark:text-gray-100" onclick="window.location='{{ route('admin.projects.edit', ['project' => $project]) }}'">Edit</button>
                                <form class="d-inline-block" method="POST" action="{{ route('admin.projects.destroy', ['project' => $project]) }}">
                                    @csrf
                                    @method('delete')
                                    <button class="px-7 py-1 font-semibold border rounded dark:border-gray-100 dark:text-gray-100" onclick="window.location='{{ route('admin.projects.destroy', ['project' => $project]) }}'">delete</button>
                                </form>
                                
                            </div>
                        </td>
                    </tr>
                    @endforeach
                    
                    
                </tbody>
            </table>
        </div>
    </div>
    <div class="container mx-auto mt-4">
        {{-- {{ $projects->links('vendor.pagination.tailwind') }} --}}
        {!! $projects->appends(Request::except('page'))->render() !!}
    </div>
</x-app-layout>