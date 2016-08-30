@extends('layouts.master')


@section('content')

    <h2>{{$name}}</h2>
    <ul>
    @foreach($posts as $post)
        <li><a href="{{url('post', [$post->id])}}">{{$post->title}}</a></li>
    @endforeach
    </ul>
@endsection