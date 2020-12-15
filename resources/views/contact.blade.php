@extends('layouts.master')

@section('title', 'Contact')
@section('content')
    <h1 class="text-center mt-3">Contact Us</h1>

    @if ($errors->any())
        <div class="alert alert-danger mx-auto" style="width: 600px;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if (session('success'))
        <div class="alert alert-success mx-auto" style="width: 600px;">
            {{ session('success') }}
        </div>
    @endif

    <div class="mx-auto" style="width: 600px;">
        <form action="{{route('mail')}}" method="post">
            @csrf
            <div class="form-group">
                <label for="">Name</label>
                <input type="text" name="fullname" placeholder="Name" value="{{old('fullname')}}" class="form-control"><br>
            </div>
            <div class="form-group">
                <label for="">Email</label>
                <input type="email" name="email" placeholder="Email address" value="{{old('email')}}" class="form-control"><br>
            </div>
            <div class="form-group">
                <label for="">Phone number</label>
                <input type="tel" name="phone" placeholder="Phone number" value="{{old('phone')}}" class="form-control"><br>
            </div>
            <div class="form-group">
                <label for="">Message</label>
                <textarea name="message" cols="30" rows="10" placeholder="Message" value="{{old('message')}}" class="form-control"></textarea><br>
            </div>
            <div class="form-group">
                <input type="submit" value="Send" class="btn btn-success">
            </div>
        </form>
    </div>
    
@endsection