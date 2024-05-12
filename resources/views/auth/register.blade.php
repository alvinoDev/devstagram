@extends('layouts.app')

@section('title')
    Sign up for Stagram
@endsection

@section('content')
    <div class="md:flex md:justify-center md:gap-10 md:items-center">

        <div class="md:w-6/12 ">
            <img src="{{ asset('img/registrar.jpg') }}" alt="">
        </div>

        <div class="md:w-4/12 bg-white p-6 rounded-lg shadow">
            <form action="{{ route('register') }}" method="POST" novalidate>
                @csrf
                <div class="mb-5">
                    <label for="name" class="mb-2 block uppercase text-gray-500 font-bold">Name</label>
                    <input type="text" id="name" name="name" placeholder="Your Name..." class="border p-3 w-full rounded-lg @error('name') border-red-500 @enderror" value="{{ old('name')}}">
                    @error('name')
                        <p class="text-red-500 text-sm text-center rounded-lg pb-2 my-2">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-5">
                    <label for="username" class="mb-2 block uppercase text-gray-500 font-bold">User name</label>
                    <input type="text" id="username" name="username" placeholder="Your Username..." class="border p-3 w-full rounded-lg @error('username') border-red-500 @enderror" value="{{ old('username')}}">
                    @error('username')
                        <p class="text-red-500 text-sm text-center rounded-lg pb-2 my-2">{{ $message }}</p>
                    @enderror
                </div>

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
                    <label for="password_confirmation" class="mb-2 block uppercase text-gray-500 font-bold">Password Confirmation</label>
                    <input type="password" id="password_confirmation" name="password_confirmation" placeholder="Repeat your password..." class="border p-3 w-full rounded-lg @error('password_confirmation') border-red-500 @enderror">
                    @error('password_confirmation')
                        <p class="text-red-500 text-sm text-center rounded-lg pb-2 my-2">{{ $message }}</p>
                    @enderror
                </div>

                <input type="submit" value="Create Account" class="bg-green-600 hover:bg-green-500 transition-colors cursor-pointer font-bold uppercase w-full p-3 text-white rounded-lg">
            </form>
        </div>

    </div>
@endsection