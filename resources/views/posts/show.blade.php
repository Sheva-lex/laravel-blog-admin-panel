@extends('layouts.app')

@section('content')
    <main role="main" class="container">
        @if($post)
            <div class="row">
                <div class="col-md-8 blog-main">
                    <div class="blog-post">
                        <h1 class="blog-post-title">{{ $post->title }}</h1>
                        <p class="blog-post-meta">Стоврено: <i>{{ $post->created_at }}</i></p>

                        <p>{!! $post->text !!}</p>
                        <a class="btn btn-outline-primary" href="{{ url()->previous() }}">Назад</a>
                        <a class="btn btn-outline-primary" href="{{ url()->route('main') }}">На головну</a>
                    </div>
                </div>
                <aside class="col-md-4 blog-sidebar">
                    <div class="p-3">
                        @if(count($post->tags))
                            <h4 class="font-italic">Теги</h4>
                            <ol class="list-unstyled mb-0">
                                @foreach($post->tags as $tag)
                                    <li><a href="#">{{ $tag->name }}</a></li>
                                @endforeach
                            </ol>
                        @endif
                    </div>
                </aside>
            </div>
        @else
            <p>Щось пішло не так</p>
        @endif
    </main>
    <footer class="container">
        <p>© Company 2021-2022</p>
    </footer>
@endsection
