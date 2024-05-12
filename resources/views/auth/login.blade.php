@extends('layouts.app')

@section('title')
    Login to Stagram
@endsection

@section('content')
    <div class="md:flex md:justify-center md:gap-10 md:items-center">

        <div class="md:w-6/12 ">
            <img src="{{ asset('img/login.jpg') }}" alt="Image login user">
        </div>

        <div class="md:w-4/12 bg-white p-6 rounded-lg shadow">
            <form method="POST" action="{{ route('login')}}">
                @csrf

                @if (session('message'))
                    <p class="bg-red-500 text-white text-sm text-center rounded-lg pb-2 my-2">{{ session('message') }}</p>
                @endif

                <div class="mb-5">
                    <label for="email" class="mb-2 block uppercase text-gray-500 font-bold">Email</label>
                    <input type="email" id="email" name="email" placeholder="Your email..." class="border p-3 w-full rounded-lg @error('email') border-red-500 @enderror" value="{{ old('email')}}">
                    @error('email')
                        <p class="text-red-500 text-sm text-center rounded-lg pb-2 my-2">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-5">
                    <label for="password" class="mb-2 block uppercase text-gray-500 font-bold">Password</label>
                    <input type="password" id="password" name="password" placeholder="Your Password..." class="border p-3 w-full rounded-lg @error('password') border-red-500 @enderror">
                    @error('password')
                        <p class="text-red-500 text-sm text-center rounded-lg pb-2 my-2">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-5">
                    <input type="checkbox" id="remember" name="remember">
                    <label for="remember" class="text-gray-500 text-sm"> Keep my sesion open </label>
                </div>

                <input type="submit" value="Login" class="bg-green-600 hover:bg-green-500 transition-colors cursor-pointer font-bold uppercase w-full p-3 text-white rounded-lg">
            </form>
        </div>

    </div>
@endsection