@extends('layouts.master')

@section('content')
@if(!empty($posts))
<ul>
    @foreach($posts as $post)
        <li>
            <a href="{{url('post', [$post->id])}}">{{$post->title}}</a>
            @if(!empty($post->thumbnail))
                <img src="{{url('images', [$post->thumbnail])}}" alt="">
            @endif
            <p>{{($post->category)? $post->category->title : 'non catégorisé'}}</p>
        </li>
    @endforeach
</ul>
@else
    <p>désolé aucun article</p>
@endif
@endsection

@section('sidebar')
@parent
@if(!empty($students))
    <ul>
        @foreach($students as $student)
            <li>
                <a href="{{url('student', [$student->id])}}">{{$student->name}}</a>
            </li>
        @endforeach
    </ul>
@else
    <p>désolé aucun étudiant</p>
@endif
@endsection




