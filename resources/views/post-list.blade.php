@extends('default')
@section('content')

    @foreach($posts as $post)
        <div>
            <a href="{{route('posts.show',$post)}}">{{$post->title}}</a> - {{$post->author->name}}
        </div>
    @endforeach

    {!! $posts->links() !!}
@endsection
