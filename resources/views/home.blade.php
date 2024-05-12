@extends('layouts.app')

@section('title')
    Home Page
@endsection

@section('content')
    
    <x-list-post :posts="$posts" />

@endsection