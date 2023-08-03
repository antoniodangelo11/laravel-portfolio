<x-app-layout>


    <h1 class="text-white"> {{ $project->title }}</h1>
    <p class="text-white"> {{ $project->description }}</p>
    
    <img src="{{ asset('storage/' . $project->image1) }}" alt="{{ $project->title }}">
    <img src="{{ asset('storage/' . $project->user->image) }}" alt="{{ $project->user->id }}">
                       
    
                        
    </x-app-layout>