@extends('panel.layouts.main')
@section('title', $title)

@section('content')

    <!-- HEADER -->
    @include('panel.components.header', ['action' => $action, 'title' => $title, 'route' => $route.'.index', 'text' => 'Назад'])

    <div class="container-fluid">

        <!-- Title -->
        <h2 class="header-title mb-4">
            Основные данные
        </h2>

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

            <!-- Category -->
            <div class="form-group">

                <!-- Label -->
                <label class="form-label">
                    Категория
                </label>

                <!-- Select -->
                <select name="category_id" class="form-select" data-choices>
                    <option value="">Не входит в категории</option>
                    @foreach($categories as $item)
                        <option value="{{$item->id}}" {{old('category_id') == $item->id ? 'selected': ''}}>{{$item->name}}</option>
                    @endforeach
                </select>
                @error('parent_id')
                <div class="text-danger mt-2">{{ $message }}</div>
                @enderror
            </div>

            <!-- Brand -->
            <div class="form-group">

                <!-- Label -->
                <label class="form-label">
                    Бренд
                </label>

                <!-- Select -->
                <select name="brand_id" class="form-select" data-choices>
                    <option value="">Нет бренда</option>
                    @foreach($brands as $item)
                        <option value="{{$item->id}}" {{old('brand_id') == $item->id ? 'selected': ''}}>{{$item->name}}</option>
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

            <!-- Title -->
            <h2 class="header-title mb-4">
                Вариации продукта
            </h2>

            @foreach([0,1,2] as $item)
                <div class="card card-body">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        @foreach($LANGS as $lang)
                            <li class="nav-item" role="presentation">
                                <button class="nav-link {{$loop->first ? 'active' : ''}}" id="{{$lang['code']}}{{$item}}-tab" data-bs-toggle="tab" data-bs-target="#{{$lang['code']}}{{$item}}-tab-pane" type="button" role="tab" aria-controls="{{$lang['code']}}{{$item}}-tab-pane" aria-selected="{{$loop->first ? 'true' : 'false'}}">{{$lang['name']}}</button>
                            </li>
                        @endforeach
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        @foreach($LANGS as $lang)
                            <div class="tab-pane fade pt-4 {{$loop->first ? 'show active' : ''}}" id="{{$lang['code']}}{{$item}}-tab-pane" role="tabpanel" aria-labelledby="{{$lang['code']}}{{$item}}-tab" tabindex="0">
                                <div class="form-group">

                                    <!-- Label -->
                                    <label class="form-label @if($loop->first) required @endif">
                                        Название ({{$lang['code']}})
                                    </label>

                                    <!-- Input -->
                                    <input name="variations[{{$item}}][name][{{$lang['code']}}]" @if($loop->first) required @endif type="text" class="form-control">
                                    @error('variations.'.$item.'.name')
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
                                    <textarea name="variations[{{$item}}][desc][{{$lang['code']}}]" type="textarea" hidden>{!!old('variations.'.$item.'.desc')!!}</textarea>
                                    <div class="quill{{$item}}{{$lang['code']}}">
                                        {!!old('variations.'.$item.'.desc')!!}
                                    </div>
                                    @error('variations.'.$item.'.desc')
                                    <div class="text-danger mt-2">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <div class="form-group">

                        <!-- Label -->
                        <label class="form-label">
                            Цена продажи
                        </label>

                        <!-- Input -->
                        <input name="variations[{{$item}}][price]" type="text" class="form-control">
                        @error('variations.'.$item.'.price')
                        <div class="text-danger mt-2">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <input type="file"
                               class="filepond{{$item}}"
                               name="variations[{{$item}}][files][]"
                               multiple
                               data-allow-reorder="true"
                               data-max-file-size="3MB"
                               data-max-files="3">
                    </div>
                </div>
            @endforeach

            <!-- Buttons -->
            <button class="btn w-100 btn-success">
                Сохранить
            </button>
            <a href="{{route($route.'.index')}}" class="btn w-100 btn-link text-muted mt-2">
                Отменить
            </a>

        </form>
    </div>


    <!-- FilePond -->
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            @foreach([0,1,2] as $item)
                let filePond{{$item}} = FilePond.create(
                    document.querySelector('.filepond{{$item}}'),
                );

                @if(isset(session('files')['variations'][$item][0]))
                filePond{{$item}}.setOptions({
                    filePosterHeight: 256,
                    files: [
                        @foreach(session('files')['variations'][$item] as $sessionFile)
                            {
                                source: '{{$sessionFile}}',
                                options: {
                                    type: 'local',
                                    metadata: {
                                        poster: '{{url('/')}}/storage/{{$sessionFile}}'
                                    }
                                }
                            },
                        @endforeach
                    ]
                });
                @endif
            @endforeach
        });
    </script>

    <!-- Include the Quill library -->
    <script src="https://cdn.quilljs.com/1.3.6/quill.min.js"></script>

    <!-- Initialize Quill editor -->
    <script>
        let quillOptions = {
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
        };

        @foreach($LANGS as $lang)
        let quill{{$lang['code']}} = new Quill('.quill{{$lang['code']}}', quillOptions);
        quill{{$lang['code']}}.on('text-change', () => {
            let textArea{{$lang['code']}} = document.querySelector('[name="desc[{{$lang['code']}}]"]');
            textArea{{$lang['code']}}.value = document.querySelector('.quill{{$lang['code']}} .ql-editor').innerHTML;
        });
        @foreach([0,1,2] as $item)
        let quill{{$item}}{{$lang['code']}} = new Quill('.quill{{$item}}{{$lang['code']}}', quillOptions);
        quill{{$item}}{{$lang['code']}}.on('text-change', () => {
            let textArea{{$lang['code']}} = document.querySelector('[name="variations[{{$item}}][desc]"]');
            textArea{{$lang['code']}}.value = document.querySelector('.quill{{$item}}{{$lang['code']}} .ql-editor').innerHTML;
        });
        @endforeach
        @endforeach
    </script>

@endsection
