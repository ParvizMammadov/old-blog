@extends('layouts.master')

@section('title', $page->title)
@section('content')
    <h1 class="text-center mt-5">{{$page->title}}</h1>
    <p class="p-5">{{$page->content}}</p>
@endsection