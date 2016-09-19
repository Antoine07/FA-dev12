@extends('layouts.admin')

@section('content')
    <p>
        <a href="{{url('admin/post/create')}}">Ajouter un post</a></p>
    <table>
        <tr>
            <td>statut</td>
            <td>title</td>
            <td>catégorie</td>
            <td>date de publication</td>
            <td>suppression</td>
        </tr>
        @forelse($posts as $post)
        <tr>
            <td>{{$post->status}}</td>
            <td>
                <a href="{{url('admin', ['post', $post->id, 'edit'])}}">{{$post->title}}</a></td>
            <td>{{$post->category? $post->category->title : 'non catégorisé'}}</td>
            <td>{{$post->published_at}}</td>
            <td>
                <form action="{{url('admin', ['post', $post->id])}}" method="post">
                    {{method_field('delete')}}
                    {{csrf_field()}}
                    <input class="btn" type="submit" value="supprimer" >
                </form>
            </td>
        </tr>
        @empty
        @endforelse
    </table>


@endsection
