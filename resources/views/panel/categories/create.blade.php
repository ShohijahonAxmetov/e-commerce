@extends('panel.layouts.main')
@section('title', $title)

@section('content')

    <!-- HEADER -->
    @include('panel.components.header', ['action' => $action, 'title' => $title, 'route' => $route.'.index', 'text' => 'Назад'])

    <div class="container-fluid">
        <!-- Form -->
        <form action="{{route($route.'.store')}}" method="post" class="mb-4">
            @csrf

            <ul class="nav nav-tabs" id="myTab" role="tablist">
                @foreach($LANGS as $lang)
                <li class="nav-item" role="presentation">
                    <button class="nav-link {{$loop->first ? 'active' : ''}}" id="{{$lang['code']}}-tab" data-bs-toggle="tab" data-bs-target="#{{$lang['code']}}-tab-pane" type="button" role="tab" aria-controls="{{$lang['code']}}-tab-pane" aria-selected="{{$loop->first ? 'true' : 'false'}}">{{$lang['name']}}</button>
                </li>
                @endforeach
            </ul>
            <div class="tab-content" id="myTabContent">
                @foreach($LANGS as $lang)
                <div class="tab-pane fade pt-4 {{$loop->first ? 'show active' : ''}}" id="{{$lang['code']}}-tab-pane" role="tabpanel" aria-labelledby="{{$lang['code']}}-tab" tabindex="0">
                    <!-- Name -->
                    <div class="form-group">

                        <!-- Label -->
                        <label class="form-label @if($loop->first) required @endif">
                            Название ({{$lang['code']}})
                        </label>

                        <!-- Input -->
                        <input name="name[{{$lang['code']}}]" value="{{old('name.'.$lang['code'])}}" @if($loop->first) required @endif type="text" class="form-control">
                        @error('name.'.$lang['code'])
                        <div class="text-danger mt-2">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Description -->
                    <div class="form-group">

                        <!-- Label -->
                        <label class="form-label mb-1">
                            Описание ({{$lang['code']}})
                        </label>

                        <!-- Text -->
                        {{--                <small class="form-text text-muted">--}}
                        {{--                    This is how others will learn about the project, so make it good!--}}
                        {{--                </small>--}}

                        <!-- Textarea -->
                        <textarea name="desc[{{$lang['code']}}]" type="textarea" hidden>{!!old('desc.'.$lang['code'])!!}</textarea>
                        <div class="quill{{$lang['code']}}">
                            {!!old('desc.'.$lang['code'])!!}
                        </div>
                        @error('desc.'.$lang['code'])
                        <div class="text-danger mt-2">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                @endforeach
            </div>

            <!-- Parent category -->
            <div class="form-group">

                <!-- Label -->
                <label class="form-label">
                    Родительская категория
                </label>

                <!-- Select -->
                <select name="parent_id" class="form-select" data-choices>
                    <option value="">Главная категория</option>
                    @foreach($categories as $category)
                    <option value="{{$category->id}}" {{old('parent_id') == $category->id ? 'selected': ''}}>{{$category->name}}</option>
                    @endforeach
                </select>
                @error('parent_id')
                <div class="text-danger mt-2">{{ $message }}</div>
                @enderror
            </div>

            <!-- Divider -->
{{--            <hr class="mt-4 mb-5">--}}

            <!-- Divider -->
            <hr class="mt-5 mb-5">

            <!-- Buttons -->
            <button class="btn w-100 btn-success">
                Сохранить
            </button>
            <a href="{{route($route.'.index')}}" class="btn w-100 btn-link text-muted mt-2">
                Отменить
            </a>

        </form>
    </div>

    <!-- Include the Quill library -->
    <script src="https://cdn.quilljs.com/1.3.6/quill.min.js"></script>

    <!-- Initialize Quill editor -->
    <script>
        @foreach($LANGS as $lang)
        let quill{{$lang['code']}} = new Quill('.quill{{$lang['code']}}', {
            modules: {
                toolbar: [
                    ['bold', 'italic'],
                    ['link', 'blockquote', 'code', 'image'],
                    [
                        {
                            list: 'ordered',
                        },
                        {
                            list: 'bullet',
                        },
                    ],
                ],
            },
            theme: 'snow',
        });

        quill{{$lang['code']}}.on('text-change', () => {
            let textArea = document.querySelector('[name="desc[{{$lang['code']}}]"]');
            textArea.value = document.querySelector('.quill{{$lang['code']}} .ql-editor').innerHTML;
        });
        @endforeach
    </script>

@endsection
