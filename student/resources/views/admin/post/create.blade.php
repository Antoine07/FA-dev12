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
                 <input type="text" name="title" value="{{old('title')}}">
                 @if($errors->has('title'))
                     span {{$errors->first('title')}}
                 @endif
                 <label for="slug">Slug:</label>
                 <input type="text" name="slug" value="{{old('slug')}}">
             </div>
            <div class="field">
                <label for="category_id">Catégorie</label>
                <select name="category_id" >
                    <option value="null" selected>Non catégorisé</option>
                    @forelse($categories as $id=> $name)
                        <option {{check_select('category_id', $id)}}  value="{{$id}}">{{$name}}</option>
                    @empty
                        <p>No users</p>
                    @endforelse
                </select>
            </div>
            <div class="field">
                <label for="user_id">Auteur</label>
                <select name="user_id" >
                    @forelse($users as $id=> $name)
                        <option {{check_select('user_id', $id)}} value="{{$id}}">{{$name}}</option>
                    @empty
                        <p>No users</p>
                    @endforelse
                </select>
                @if($errors->has('user_id'))
                    span {{$errors->first('user_id')}}
                @endif
            </div>
            <div class="field">
                <label for="status">Publié</label>
                <input {{check_radio('status', 'published')}} type="radio" name="status" value="published">
                <label for="status">dépublié</label>
                <input {{check_radio('status', 'unpublished' , 'selected' )}} type="radio" name="status" value="unpublished">
                <label for="status">Brouillon</label>
                <input {{check_radio('status', 'draft')}} type="radio" name="status" value="draft">
            </div>
            <div class="field">
                <input type="date" name="published_at" value="{{old('published_at')}}">
            </div>
            <div class="field">
                <label for="content">Contenu</label>
                <textarea name="content" id="" cols="30" rows="10">{{old('content')}}</textarea>
                @if($errors->has('content'))
                    span {{$errors->first('content')}}
                @endif
            </div>
            <input type="submit" class="submit">
        </form>
    </div>
@endsection

@section('sidebar')
    @parent
    <nav>
        <li>Home</li>
    </nav>
@endsection




