<x-app-layout>


    <h1 class="text-white text-center py-2"> {{ $project->title }}</h1>
    <p class="text-white text-center py-2"> {{ $project->description }}</p>

    <div class="flex justify-center">
        <img src="{{ asset('storage/' . $project->image1) }}" alt="{{ $project->title }}">
    </div>
    
    
    {{-- <img src="{{ asset('storage/' . $project->user->image) }}" alt="{{ $project->user->id }}"> --}}
    
    
                       
    
                        
    </x-app-layout>