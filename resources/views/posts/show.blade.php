@extends('layouts.app')

@section('title')
    {{ $post->title }}
@endsection


@section('content')
    <div class="container mx-auto md:flex">
        <div class="md:w-1/2">
            <img src="{{ asset('uploads').'/'.$post->image }}" alt="Imagen of post {{ $post->title }}">

            <div class="p-3 flex items-center gap-4">

                @auth
                    <livewire:like-post :post="$post" />
                @endauth

            </div>

            <div>
                <p class="font-bold"> {{ $post->user->username }} </p>
                <p class="text-sm text-gray-500">
                    {{ $post->created_at->diffForHumans() }}
                </p>
                <p class="mt-5">
                    {{ $post->description }}
                </p>
            </div>
            
            @auth
                @if ( $post->user_id === auth()->user()->id )
                    <form action="{{ route('posts.destroy', $post) }}" method="POST">
                        @method('DELETE') {{-- Es conocido como Method Spoofing | El navegador unicamente soporta POST y GET y el metodhod Spoofing permite agregar otro tipo de metodo --}}
                        @csrf
                        <input type="submit" value="Delete post" class="bg-red-500 hover:bg-red-600 p-2 rounded text-white font-bold mt-4 cursor-pointer">
                    </form>
                @endif
            @endauth

        </div>
        <div class="md:w-1/2 p-5">
            <div class="shadow bg-white p-5 mb-5">
                @auth
                    
                    <p class="text-xl font-bold text-center mb-4">Add new comment</p>

                    @if ( session('message') )
                        <div class="bg-green-500 p-2 rounded-lg mb-6 text-white text-center uppercase font-bold">
                            {{ session('message') }}
                        </div>
                    @endif

                    <form action="{{ route('comments.store', ['post' => $post, 'user' => $user ]) }}" method="POST">

                        @csrf

                        <div class="mb-5">
                            <label for="comment" class="mb-2 block uppercase text-gray-500 font-bold">Add Comment</label>
                            <textarea id="comment" name="comment" placeholder="Add new comment..." class="border p-3 w-full rounded-lg @error('comment') border-red-500 @enderror"></textarea>
                            @error('comment')
                                <p class="text-red-500 text-sm text-cente rounded-lg pb-2 my-2">{{ $message }}</p>
                            @enderror
                        </div>

                        <input type="submit" value="Comment" class="bg-green-600 hover:bg-green-500 transition-colors cursor-pointer font-bold uppercase w-full p-3 text-white rounded-lg">
                    </form>

                @endauth

                <div class="bg-gray-50 shadow mb-5 max-h-96 overflow-y-scroll mt-10">
                    @if ( $post->comments->count() )

                        @foreach ( $post->comments as $comment )
                            <div class="p-5 border-gray-300 border-b">
                                <a href="{{ route('posts.index', $comment->user) }}" class="text-gray-700 font-bold">
                                    {{ $comment->user->username }}
                                </a>
                                <p class="text-gray-700"> {{ $comment->comment }}</p>
                                <p class="text-sm text-gray-500"> {{ $comment->created_at->diffForHumans() }} </p>
                            </div>
                        @endforeach

                    @else
                        <p class="p-10 text-center">No comments</p>
                    @endif
                </div>

            </div>
        </div>
    </div>
@endsection