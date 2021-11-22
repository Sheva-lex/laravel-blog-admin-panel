@extends('layouts.admin')

@section('styles')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.css"
          rel="stylesheet"/>
    <style>
        .bootstrap-tagsinput .tag {
            margin-right: 2px;
            color: #ffffff;
            background: #2196f3;
            padding: 3px 7px;
            border-radius: 3px;
        }

        .bootstrap-tagsinput {
            width: 100%;
        }
    </style>
@endsection
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
            <div class="card-body pt-0">
                <div class="form-group">
                    @if(!isset($post))
                        <label for="tags" class="mt-2">Теги</label>
                    @endif
                    <input type="text" name="tags"
                           class="form-control @error('tags') is-invalid @enderror"
                           value="{{ old('tags') }}"
                           data-role="tagsinput"
                           id="tags_id">
                    @error('tags')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
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
                <div class="form-group">
                    <label for="text">Текст</label>
                    <textarea id="editor" class="form-control"
                              name="text"
                    >{{ old('text', isset($post->text) ? $post->text : '') }}</textarea>
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
@section('scripts')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.js"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/31.0.0/classic/ckeditor.js"></script>
    <script type="text/javascript">
        ClassicEditor
            .create(document.querySelector('#editor'))
            .catch(error => {
                console.error(error);
            });
    </script>
@endsection


