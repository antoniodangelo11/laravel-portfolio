<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Projects') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <ul>
                        <div class="flex flex-col">
                            <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                              <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
                                <div class="overflow-hidden">
                                  <table class="min-w-full text-left text-sm font-light">
                                    <thead class="border-b font-medium dark:border-neutral-500">
                                      <tr>
                                        <th scope="col" class="px-6 py-4">#</th>
                                        <th scope="col" class="px-6 py-4">Title</th>
                                        <th scope="col" class="px-6 py-4">Author</th>
                                        <th scope="col" class="px-6 py-4">Creation Date</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                      
                                        @foreach ($projects as $item)
                                        <tr class="border-b dark:border-neutral-500 even:bg-white odd:bg-slate-50 hover:bg-gray-100">
                                            <td class="whitespace-nowrap px-6 py-4 font-medium">{{ $item->id }}</td>
                                            <td class="whitespace-nowrap px-6 py-4">{{ $item->title }}</td>
                                            <td class="whitespace-nowrap px-6 py-4">{{ $item->author }}</td>
                                            <td class="whitespace-nowrap px-6 py-4">{{ $item->creation_date }}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                  </table>
                                </div>
                              </div>
                            </div>
                          </div>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
