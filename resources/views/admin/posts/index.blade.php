@extends('layouts.admin')

@section('content')
    <div class="card m-2">
        <div class="card-header">
            <h3 class="card-title">Список новин</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <div class="ibox-tools pb-3">
                <a href="{{ route('admin.posts.create') }}"
                   class="btn btn-primary btn-rounded button-plus">
                    <i class="fa fa-plus"></i>
                    Добавити
                </a>
            </div>
            @if ($posts->count())
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th>
                            ID
                        </th>
                        <th>
                            Назва
                        </th>
                        <th>
                            Теги
                        </th>
                        <th>
                            Створено
                        </th>
                        <th>
                            Управління
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($posts as $post)
                        <tr>
                            <td>{{ $post->id }}</td>
                            <td>{{ $post->title }}</td>
                            <td>
                                <div class="d-flex justify-content-start flex-wrap">
                                    @foreach($post->tags as $tag)
                                        <div class="d-flex justify-content-start bg-primary m-1">
                                            <div class="pl-1">
                                                {{ $tag->name }}
                                            </div>
                                            <div>
                                                <form
                                                    action="{{ route('admin.tags.destroy', ['tag' => $tag]) }}"
                                                    method="post" class="">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm"
                                                            name="tag_delete_form"
                                                            onclick="return confirm('Підтвердіть видалення')">
                                                        <i class="fas fa-times"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </td>
                            <td>{{ $post->created_at }}</td>
                            <td>
                                <div class="row">
                                    <div class="col col-lg-2">
                                        <a href="{{ route('admin.posts.edit', $post) }}"
                                           class="btn btn-info btn-sm mr-0 ml-0 border-0">
                                            <i class="fas fa-pencil-alt"></i>
                                        </a>
                                    </div>
                                    <div class="col col-lg-2">
                                        <form
                                            action="{{ route('admin.posts.destroy', ['post' => $post]) }}"
                                            method="post" class="">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm"
                                                    onclick="return confirm('Підтвердіть видалення')">
                                                <i class="fas fa-trash-alt"></i>
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @else
                <div>Новин немає ...</div>
            @endif
        </div>
    </div>
@endsection
