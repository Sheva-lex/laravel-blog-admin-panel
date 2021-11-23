@extends('layouts.app')

@section('content')
    <main>
        <!-- Main jumbotron for a primary marketing message or call to action -->
        <div class="jumbotron">
            <div class="container">
                <h1 class="display-3">Блог новин</h1>
                <p>Зайдіть в <b>адмінку</b> там весь функціонал.</p>
                <p><a class="btn btn-primary btn-lg" href="{{ route('admin.dashboard') }}" role="button">Перейти »</a></p>
            </div>
        </div>

        <div class="container">
            <!-- Example row of columns -->
            <div class="row">
                @foreach($posts as $post)
                <div class="col-md-4">
                    <h2>{{ Str::limit($post->title, 20) }}</h2>
                    <p>{!! Str::limit($post->text, 150) !!}</p>
                    <p><a class="btn btn-secondary" href="{{ route('post.show', $post) }}" role="button">Детальніше »</a></p>
                </div>
                @endforeach
            </div>

            <hr>

        </div> <!-- /container -->
    </main>
    <footer class="container">
        <p>© Company 2021-2022</p>
    </footer>
@endsection
