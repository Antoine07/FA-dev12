@extends('layouts.master')

@section('content')
@if(!empty($student))
    <ul>
        <li>{{$student->name}}</li>
        <li>{{$student->address}}</li>
    </ul>
@else
    <p>Désolé aucun étudiant...</p>
@endif
@endsection