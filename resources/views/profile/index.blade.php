@extends('layouts.app')

@section('title')
    Edit Profile: {{ auth()->user()->username }}
@endsection


@section('content')
    
    <div class="md:flex md:justify-center">
        <div class="md:w-1/2 bg-white shadow p-6">
            <form method="POST" action=" {{ route('profile.store') }}" enctype="multipart/form-data" class="mt-10 md:mt-0">
                @csrf

                @if (session('message-profile'))
                    <p class="bg-red-500 text-white text-sm text-center rounded-lg pb-2 my-2">{{ session('message-profile') }}</p>
                @endif

                <div class="mb-5">
                    <label for="username" class="mb-2 block uppercase text-gray-500 font-bold">Username</label>
                    <input type="text" id="username" name="username" placeholder="Your Name..." class="border p-3 w-full rounded-lg @error('username') border-red-500 @enderror" value="{{ auth()->user()->username }}">
                    @error('username')
                        <p class="text-red-500 text-sm text-center rounded-lg pb-2 my-2">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-5">
                    <label for="email" class="mb-2 block uppercase text-gray-500 font-bold">Email</label>
                    <input type="email" id="email" name="email" placeholder="Your email..." class="border p-3 w-full rounded-lg @error('email') border-red-500 @enderror" value="{{ auth()->user()->email }}">
                    @error('email')
                        <p class="text-red-500 text-sm text-center rounded-lg pb-2 my-2">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-5">
                    <label for="password" class="mb-2 block uppercase text-gray-500 font-bold">Your password</label>
                    <input type="password" id="password" name="password" placeholder="Enter your password..." class="border p-3 w-full rounded-lg @error('password') border-red-500 @enderror">
                    @error('password')
                        <p class="text-red-500 text-sm text-center rounded-lg pb-2 my-2">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-5">
                    <label for="img_profile" class="mb-2 block uppercase text-gray-500 font-bold">Image profile</label>
                    <input type="file" id="img_profile" name="img_profile" class="border p-3 w-full rounded-lg" value="" accept=".jpg, .jpeg, .png">
                </div>

                <input type="submit" value="Save changes" class="bg-green-600 hover:bg-green-500 transition-colors cursor-pointer font-bold uppercase w-full p-3 text-white rounded-lg">
            </form>
        </div>
    </div>

@endsection