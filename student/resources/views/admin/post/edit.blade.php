@extends('layouts.admin')

@section('content')
    <div class="container">
    <div class="row">
        <form class="col s12 m12" action="{{url('admin',['post', $post->id, ])}}" method="post">
            {{ csrf_field() }}
            {{method_field('put')}}
            <div class="field input-field col s12 m6">
                <input type="text" name="title" value="{{$post->title}}">
                <label for="title">Titre:</label>
                @if($errors->has('title'))
                    {{$errors->first('title')}}
                @endif
             </div>
             <div class="input-field col s12 m6">
                 <input type="text" name="slug" value="{{$post->slug}}">
                 <label for="slug">Slug:</label>
             </div>
            <div class="field input-field col s12">
                <label for="content">Contenu</label>
                <textarea name="content" id="content" class="materialize-textarea" >{{$post->content}}</textarea>
                @if($errors->has('content'))
                    span {{$errors->first('content')}}
                @endif
            </div>
            <div class="input-field col s12">
                <select name="category_id" id="category_id" >
                    <option value="0">Non catégorisé</option>
                    @forelse($categories as $id=> $name)
                    <option {{check_select_edit($post->category, $id)}}  value="{{$id}}">{{$name}}</option>
                    @empty
                    @endforelse
                </select>
                <label for="category_id">Catégorie</label>
            </div>
            <div class="input-field col s12 input-margin">
                <span class="title">Mots clés</span>
                <p>
                @foreach($tags as $id => $name)
                    <input name="tags[]" class="filled-in" id="tag{{$id}}" value="{{$id}}" {{$post->hasTag($id)? 'checked' : ''}} type="checkbox" >
                    <label for="tag{{$id}}">{{$name}}</label>
                @endforeach
                </p>
            </div>
            <div class="input-field col s12">
                <select name="user_id" id="user_id" >
                    <option value="0">Anonymous</option>
                    @forelse($users as $id=> $name)
                        <option {{check_select_edit($post->user, $id)}}  value="{{$id}}">{{$name}}</option>
                    @empty
                    @endforelse
                </select>
                <label for="user_id">Auteur</label>
            </div>
            <div class="input-field col s12">
                <input class="datepicker" type="date" name="published_at" id="published_at" value="{{$post->published_at}}">
                <label for="published_at">Date de publication</label>
            </div>
            <div class="input-field col s12 input-margin">
                <input {{check_radio('published', $post->status)}} type="radio" name="status" value="published" id="published" >
                <label for="published">Publié</label>
                <input {{check_radio('unpublished', $post->status)}} type="radio" name="status" value="unpublished" id="unpublished" >
                <label for="unpublished">Dépublié</label>
                <input {{check_radio('draft', $post->status)}} type="radio" name="status" id="draft" value="draft" >
                <label for="draft">Brouillon</label>
            </div>
            <div class="input-field col s12">
                <p><input class="btn waves-effect waves-light" type="submit" ></p>
            </div>
        </form>
    </div>
    </div>
@endsection

@section('script')
<script>

    $('select').material_select()

    $('.datepicker').pickadate({
        format: 'yyyy-m-d'
    })
</script>

@endsection


