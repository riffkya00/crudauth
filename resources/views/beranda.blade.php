<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="card bg-white">
                <div class="card-body">
                    <form action="{{ route('posts.store') }}" method="post">
                        @csrf
                        <textarea name="content" class="textarea textarea-bordered w-full" placeholder="Posting Sesuatu Disini!!"  
                        rows="3"></textarea>
                        <input type="submit" value="Post" class="btn btn-primary"> 
                    </form>
                </div>
            </div>
                @foreach ($posts as $post)
                    <div class="card my-4 bg-white">
                            <h2 class="text-xl font-bold">{{ $post->user->name }}</h2>
                            <p>{{ $post->content }}</p>
                            <div class="text-end">  
                                @can('update', $post)
                                    <a href="{{ route('posts.edit', $post->id) }}" 
                                        class="link link-hover text-blue-400">Edit</a>                                                                   
                                @endcan
                                @can('delete', $post)
                                    <form action="{{ route('posts.destroy', $post->id) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-error btn-sm">Delete</button>
                                    </form>                                                                  
                                @endcan
                            <span class="text-sm">{{ $post->created_at->diffForHumans() }}</span> 
                            </div>
                    </div>
                @endforeach          
        </div>
    </div>
</x-app-layout>
