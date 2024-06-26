@extends('layouts.app')

@section('title')
    Create a new post
@endsection

@push('styles')
    <link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />
@endpush

@section('content')
    <div class="md:flex md:justify-center md:gap-10 md:items-center">

        <div class="md:w-6/12 px-10">
            <form action="{{ route('images.store') }}" method="POST" enctype="multipart/form-data" id="dropzone" class="dropzone border-dashed border-2 w-full h-96 rounded flex flex-col justify-center items-center">
                @csrf
            </form>
        </div>
    
        <div class="md:w-4/12 p-10 bg-white rounded-lg shadow-xl mt-10 md:mt-0">
            <form method="POST" action="{{ route('posts.store') }}" novalidate>
                @csrf
    
                <div class="mb-5">
                    <label for="title" class="mb-2 block uppercase text-gray-500 font-bold">Title</label>
                    <input type="text" id="title" name="title" placeholder="Title of post.." class="border p-3 w-full rounded-lg @error('title') border-red-500 @enderror" value="{{ old('title') }}">
                    @error('title')
                        <p class="text-red-500 text-sm text-cente rounded-lg pb-2 my-2">{{ $message }}</p>
                    @enderror
                </div>
    
                <div class="mb-5">
                    <label for="description" class="mb-2 block uppercase text-gray-500 font-bold">Description</label>
                    <textarea id="description" name="description" placeholder="Description of post.." class="border p-3 w-full rounded-lg @error('description') border-red-500 @enderror">{{ old('description') }}</textarea>
                    @error('description')
                        <p class="text-red-500 text-sm text-cente rounded-lg pb-2 my-2">{{ $message }}</p>
                    @enderror
                </div>
    
                <div class="mb-5">
                    <input type="hidden" name="image" value="{{ old('image') }}">
                    @error('image')
                        <p class="text-red-500 text-sm text-cente rounded-lg pb-2 my-2">{{ $message }}</p>
                    @enderror
                </div>
                
                <input type="submit" value="Create post" class="bg-green-600 hover:bg-green-500 transition-colors cursor-pointer font-bold uppercase w-full p-3 text-white rounded-lg">
            </form>
        </div>

    </div>
@endsection