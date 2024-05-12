@extends('layouts.app')

@section('title')
    Change Password: {{ auth()->user()->username }}
@endsection

@section('content')
    
    <div class="md:flex md:justify-center">
        <div class="md:w-1/2 bg-white shadow p-6">
            <form method="POST" action=" {{ route('changepassword.store') }}" enctype="multipart/form-data" class="mt-10 md:mt-0">
                @csrf

                @if (session('message-changepass'))
                    <p class="bg-red-500 text-white text-sm text-center rounded-lg pb-2 my-2">{{ session('message-changepass') }}</p>
                @endif

                <div class="mb-5">
                    <label for="current_password" class="mb-2 block uppercase text-gray-500 font-bold">Current password</label>
                    <input type="password" id="current_password" name="current_password" placeholder="Enter current password..." class="border p-3 w-full rounded-lg @error('current_password') border-red-500 @enderror">
                    @error('current_password')
                        <p class="text-red-500 text-sm text-left rounded-lg pb-2 my-2">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-5">
                    <label for="password" class="mb-2 block uppercase text-gray-500 font-bold">New password</label>
                    <input type="password" id="password" name="password" placeholder="Enter new password..." class="border p-3 w-full rounded-lg @error('password') border-red-500 @enderror">
                    @error('password')
                        <p class="text-red-500 text-sm text-left rounded-lg pb-2 my-2">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-5">
                    <label for="password_confirmation" class="mb-2 block uppercase text-gray-500 font-bold">Confirm new password</label>
                    <input type="password" id="password_confirmation" name="password_confirmation" placeholder="Enter confirm new password..." class="border p-3 w-full rounded-lg @error('password_confirmation') border-red-500 @enderror">
                    @error('password_confirmation')
                        <p class="text-red-500 text-sm text-center rounded-lg pb-2 my-2">{{ $message }}</p>
                    @enderror
                </div>

                <input type="submit" value="Save changes" class="bg-green-600 hover:bg-green-500 transition-colors cursor-pointer font-bold uppercase w-full p-3 text-white rounded-lg">
            </form>
        </div>
    </div>

@endsection