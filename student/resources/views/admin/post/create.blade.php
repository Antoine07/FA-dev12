@extends('layouts.admin')

@section('content')
    <div class="container">
        @if(Session::has('message'))
            <p>{{ Session::get('message') }}</p>
        @endif
        {{-- une autre manière d'écrire l'action action="action('PostController@store')" --}}
        <form action="{{url('admin/post') }}" method="POST" >
            {{ csrf_field() }}
             <div class="field">
                 <label for="title">Titre:</label>
                 <input type="text" name="title" value="">
                 <label for="slug">Slug:</label>
                 <input type="text" name="slug" value="">
             </div>
            <div class="field">
                <label for="category_id">Catégorie</label>
                <select name="category_id" >
                    <option value="null" selected>Non catégorisé</option>
                    @forelse($categories as $id=> $name)
                        <option value="{{$id}}">{{$name}}</option>
                    @empty
                        <p>No users</p>
                    @endforelse
                </select>
            </div>
            <div class="field">
                <label for="category_id">Auteur</label>
                <select name="user_id" >
                    @forelse($users as $id=> $name)
                        <option value="{{$id}}">{{$name}}</option>
                    @empty
                        <p>No users</p>
                    @endforelse
                </select>
            </div>
            <div class="field">
                <label for="status">Publié</label>
                <input type="radio" name="status" value="published">
                <label for="status">dépublié</label>
                <input type="radio" name="status" value="unpublished">
                <label for="status">Brouillon</label>
                <input type="radio" name="status" value="draft">
            </div>
            <div class="field">
                <input type="date" name="published_at" value="">
            </div>
            <div class="field">
                <label for="content">Contenu</label>
                <textarea name="content" id="" cols="30" rows="10"></textarea>
            </div>
            <input type="submit" class="submit">
        </form>
    </div>
@endsection