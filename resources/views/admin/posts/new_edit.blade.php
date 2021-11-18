@extends('layouts.admin')

@section('content')
    <div class="card card-primary m-2">

        <div class="card-header">
            <h3 class="card-title">
                @if(isset($post))
                    Редагувати новину
                @else
                    Створити новину
                @endif</h3>
        </div>

        @if(isset($post) && isset($post->tags))
            <div class="card-body pb-0">
                <div class="form-group col-12">
                    <div class="form-group">
                        <label for="title">Теги</label>
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
                    </div>
                </div>
            </div>
        @endif

        @if(isset($post))
            <form action="{{ route('admin.tags.store') }}"
                  method="post" enctype="multipart/form-data">
                @csrf
                @method('POST')
                <div class="card-body">
                    <div class="form-group col-12">
                        <div class="form-group col-12">
                            <div class="form-group">
                                <label for="name">Добавте тег</label>
                                <input type="text" name="name"
                                       class="form-control @error('name') is-invalid @enderror"
                                       id="a"
                                       value="{{ old('name') }}">
                                @error('name')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                <input type="hidden" name="post_id"
                                       value="{{ $post->id }}">
                                @error('post_id')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <input type="submit" value="Додати" name="form1" class="btn btn-primary">
                    </div>
                </div>
            </form>
        @endif

        <form
            action="@if(isset($post)){{ route('admin.posts.update', $post->id) }}@else{{ route('admin.posts.store') }}@endif"
            method="post" enctype="multipart/form-data">
            @csrf
            @if(isset($post))
                @method('PUT')
            @else
                @method('POST')
            @endif
            <div class="card-body">
                <div class="form-group col-12">
                    <div class="form-group">
                        <label for="title">Назва</label>
                        <input type="text" name="title"
                               class="form-control @error('title') is-invalid @enderror"
                               id="title"
                               value="{{ old('title', isset($post->title) ? $post->title : '') }}">
                        @error('title')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-group col-12">
                    <div class="form-group">
                        <label for="text">Текст</label>
                        <textarea name="text"
                                  class="form-control @error('text') is-invalid @enderror"
                        >{{ old('text', isset($post->text) ? $post->text : '') }}</textarea>
                        @error('text')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="card-footer">
                <div class="col-sm-12 text-right">
                    <input type="submit" value="Зберегти" name="form2" class="btn btn-primary">
                    <a href="{{ route('admin.posts.index') }}" class="btn btn-default"><i
                            class="far fa-times-circle"></i> Отменить</a>
                </div>
            </div>
        </form>
    </div>
@endsection


