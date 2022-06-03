@extends('default')
@section('content')
    <h1>{{$post->title}}</h1>
    <div class="flex items-center justify-center">
        <div>
            {{$post->created_at->diffForHumans()}}
        </div>
        <div>
            {{$post->author->name}}
        </div>
        <div class="flex items-center divide-x justify-center flex-shrink">
            @foreach($post->categories as $category)
                <span class="p-2">{{$category->name}}</span>
            @endforeach
        </div>
    </div>
    <hr>
    {!! $post->body !!}

@endsection
