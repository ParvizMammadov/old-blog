@extends('layouts.master')

@section('title', $post->title)
@section('content')
    <h1 class="text-center">{{ $post->title }}</h1>
    <img src="{{ asset('uploads/thumbnail_'.$post->image_url) }}" alt="photo" class="rounded float-left p-5">
    <div class="p-5">{!! $post->content !!}</div>
@endsection