<x-app-layout>


    <h1 class="text-white"> {{ $project->title }}</h1>
    <p class="text-white"> {{ $project->description }}</p>
    
    <img src="{{ asset('storage/' . $project->image) }}" alt="{{ $project->title }}">
                       
    
                        
    </x-app-layout>