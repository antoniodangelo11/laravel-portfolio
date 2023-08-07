<x-app-layout>


    <h1 class="text-white text-center py-2"> {{ $project->title }}</h1>
    <p class="text-white text-center py-2"> {{ $project->description }}</p>

    <div class="flex justify-center flex-wrap">
        <img src="{{ asset('storage/uploads' . $project->image1) }}" alt="{{ $project->title }}">
        <div class="flex flex-col mb-5">
            <h1 class="text-white text-center py-2">Video: {{ $project->title }}</h1>
            <video autoplay loop muted class="video h-[40rem]">
                <source 
                    src="{{ asset('storage/uploads' . $project->video) }}"
                    type="video/webm"
                />
            </video>
        </div>
       
    </div>
    
    
    {{-- <img src="{{ asset('storage/uploads/' . $project->user->image) }}" alt="{{ $project->user->id }}"> --}}
                       
    
                        
    </x-app-layout>