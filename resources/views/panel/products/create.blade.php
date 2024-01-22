@extends('panel.layouts.main')
@section('title', $title)

@section('content')

    <!-- HEADER -->
    @include('panel.components.header', ['action' => $action, 'title' => $title, 'route' => $route.'.index', 'text' => 'Назад'])

    <div class="container-fluid">

{{--        @if($errors->any())--}}
{{--            @dd(session()->getOldInput());--}}
{{--        @endif--}}

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
                            <input name="name[{{$lang['code']}}]" value="{{old('name.'.$lang['code'])}}"  type="text" class="form-control">
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

            <div id="variationsBlock">
                @if(!empty(session()->getOldInput()))
                    @foreach(old('variations') as $itemKey => $item)
                        <div class="card card-body mb-3" data-id="{{$itemKey}}">
                            <span data-variation-delete-btn-id="{{$itemKey}}" class="fe fe-x delete_variation__icon"></span>
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                @foreach($LANGS as $lang)
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link {{$loop->first ? 'active' : ''}}" id="{{$lang['code']}}{{$itemKey}}-tab" data-bs-toggle="tab" data-bs-target="#{{$lang['code']}}{{$itemKey}}-tab-pane" type="button" role="tab" aria-controls="{{$lang['code']}}{{$itemKey}}-tab-pane" aria-selected="{{$loop->first ? 'true' : 'false'}}">{{$lang['name']}}</button>
                                    </li>
                                @endforeach
                            </ul>
                            <div class="tab-content" id="myTabContent">
                                @foreach($LANGS as $lang)
                                    <div class="tab-pane fade pt-4 {{$loop->first ? 'show active' : ''}}" id="{{$lang['code']}}{{$itemKey}}-tab-pane" role="tabpanel" aria-labelledby="{{$lang['code']}}{{$itemKey}}-tab" tabindex="0">
                                        <div class="form-group">

                                            <!-- Label -->
                                            <label class="form-label @if($loop->first) required @endif">
                                                Название ({{$lang['code']}})
                                            </label>

                                            <!-- Input -->
                                            <input name="variations[{{$itemKey}}][name][{{$lang['code']}}]" value="{{old('variations.'.$itemKey.'.name.'.$lang['code'])}}" type="text" class="form-control">
                                            @error('variations.'.$itemKey.'.name.'.$lang['code'])
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
                                            <textarea name="variations[{{$itemKey}}][desc][{{$lang['code']}}]" type="textarea" hidden>{!!old('variations.'.$itemKey.'.desc.'.$lang['code'])!!}</textarea>
                                            <div class="quill{{$itemKey}}{{$lang['code']}}">
                                                {!!old('variations.'.$itemKey.'.desc.'.$lang['code'])!!}
                                            </div>
                                            @error('variations.'.$itemKey.'.desc.'.$lang['code'])
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
                                <input name="variations[{{$itemKey}}][price]" value="{{old('variations.'.$itemKey.'.price')}}" type="text" class="form-control">
                                @error('variations.'.$itemKey.'.price')
                                <div class="text-danger mt-2">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <input type="file"
                                       class="filepond{{$itemKey}}"
                                       name="variations[{{$itemKey}}][files][]"
                                       multiple
                                       data-allow-reorder="true"
                                       data-max-file-size="3MB"
                                       data-max-files="3">
                            </div>
                        </div>
                    @endforeach
                @else
                    @foreach([0] as $item)
                        <div class="card card-body mb-3" data-id="{{$item}}">
                            <span data-variation-delete-btn-id="{{$item}}" class="fe fe-x delete_variation__icon"></span>
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
                                            <input name="variations[{{$item}}][name][{{$lang['code']}}]" value="{{old('variations.'.$item.'.name.'.$lang['code'])}}" type="text" class="form-control">
                                            @error('variations.'.$item.'.name.'.$lang['code'])
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
                                            <textarea name="variations[{{$item}}][desc][{{$lang['code']}}]" type="textarea" hidden>{!!old('variations.'.$item.'.desc.'.$lang['code'])!!}</textarea>
                                            <div class="quill{{$item}}{{$lang['code']}}">
                                                {!!old('variations.'.$item.'.desc.'.$lang['code'])!!}
                                            </div>
                                            @error('variations.'.$item.'.desc.'.$lang['code'])
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
                                <input name="variations[{{$item}}][price]" value="{{old('variations.'.$item.'.price')}}" type="text" class="form-control">
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
                @endif
            </div>

            <!-- Variation add button -->
            <div class="d-flex justify-content-center">
                <button class="btn w-50 btn-outline-info mb-4" type="button" id="addVariationBtn">
                    + Добавить вариацию
                </button>
            </div>

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
            @if(!empty(session()->getOldInput()))
                @foreach(old('variations') as $itemKey => $item)
                    let filePond{{$itemKey}} = FilePond.create(
                        document.querySelector('.filepond{{$itemKey}}'),
                    );

                    @if(isset(session('files')['variations'][$itemKey][0]))
                    filePond{{$itemKey}}.setOptions({
                        filePosterHeight: 256,
                        files: [
                                @foreach(session('files')['variations'][$itemKey] as $sessionFile)
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
            @else
                FilePond.create(
                    document.querySelector('.filepond0'),
                );

                @if(isset(session('files')['variations'][0][0]))
                filePond{{$item}}.setOptions({
                    filePosterHeight: 256,
                    files: [
                        @foreach(session('files')['variations'][0] as $sessionFile)
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
            @endif
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
            @if(!empty(session()->getOldInput()))
                @foreach(old('variations') as $itemKey => $item)
                    let quill{{$itemKey}}{{$lang['code']}} = new Quill('.quill{{$itemKey}}{{$lang['code']}}', quillOptions);
                    quill{{$itemKey}}{{$lang['code']}}.on('text-change', () => {
                        let textArea{{$lang['code']}} = document.querySelector('[name="variations[{{$itemKey}}][desc][{{$lang['code']}}]"]');
                        textArea{{$lang['code']}}.value = document.querySelector('.quill{{$itemKey}}{{$lang['code']}} .ql-editor').innerHTML;
                    });
                @endforeach
            @else
                @foreach([0] as $item)
                    let quill{{$item}}{{$lang['code']}} = new Quill('.quill{{$item}}{{$lang['code']}}', quillOptions);
                    quill{{$item}}{{$lang['code']}}.on('text-change', () => {
                        let textArea{{$lang['code']}} = document.querySelector('[name="variations[{{$item}}][desc][{{$lang['code']}}]"]');
                        textArea{{$lang['code']}}.value = document.querySelector('.quill{{$item}}{{$lang['code']}} .ql-editor').innerHTML;
                    });
                @endforeach
           @endif
        @endforeach
    </script>

    <!-- ADD VARIATIONS -->
    <script>
        function getVariationElements(dataId) {
            return '<div class="card card-body mb-3" data-id="' + dataId + '">' +
                '<span data-variation-delete-btn-id="' + dataId + '" class="fe fe-x delete_variation__icon"></span>' +
                '<ul class="nav nav-tabs" id="myTab" role="tablist">' +
                '@foreach($LANGS as $lang)' +
                '<li class="nav-item" role="presentation">' +
                '<button class="nav-link {{$loop->first ? 'active' : ''}}" id="{{$lang['code']}}' + dataId + '-tab" data-bs-toggle="tab" data-bs-target="#{{$lang['code']}}' + dataId + '-tab-pane" type="button" role="tab" aria-controls="{{$lang['code']}}' + dataId + '-tab-pane" aria-selected="{{$loop->first ? 'true' : 'false'}}">{{$lang['name']}}</button>' +
                '</li>' +
                '@endforeach' +
                ' </ul>' +
                '<div class="tab-content" id="myTabContent">' +
                '@foreach($LANGS as $lang)' +
                '<div class="tab-pane fade pt-4 {{$loop->first ? 'show active' : ''}}" id="{{$lang['code']}}' + dataId + '-tab-pane" role="tabpanel" aria-labelledby="{{$lang['code']}}' + dataId + '-tab" tabindex="0">' +
                '<div class="form-group">' +

                <!-- Label -->
                '<label class="form-label @if($loop->first) required @endif">' +
                'Название ({{$lang['code']}})' +
                '</label>' +

                <!-- Input -->
                '<input name="variations[' + dataId + '][name][{{$lang['code']}}]" value="" type="text" class="form-control">' +
                '</div>' +

                <!-- Description -->
                '<div class="form-group">' +

                <!-- Label -->
                '<label class="form-label mb-1">' +
                'Описание ({{$lang['code']}})' +
                '</label>' +

                <!-- Text -->
                {{--                <small class="form-text text-muted">--}}
                {{--                    This is how others will learn about the project, so make it good!--}}
                {{--                </small>--}}

                <!-- Textarea -->
                '<textarea name="variations[' + dataId + '][desc][{{$lang['code']}}]" type="textarea" hidden></textarea>' +
                '<div class="quill' + dataId + '{{$lang['code']}}">' +
                '</div>' +
                '</div>' +
                '</div>' +
                '@endforeach' +
                '</div>' +

                '<div class="form-group">' +

                <!-- Label -->
                '<label class="form-label">' +
                'Цена продажи' +
                '</label>' +

                <!-- Input -->
                '<input name="variations[' + dataId + '][price]" value="" type="text" class="form-control">' +
                '</div>' +

                '<div class="form-group">' +
                '<input type="file"' +
                'class="filepond' + dataId + '"' +
                'name="variations[' + dataId + '][files][]"' +
                'multiple' +
                'data-allow-reorder="true"' +
                'data-max-file-size="3MB"' +
                'data-max-files="3">' +
                '</div>' +
                '</div>';
        }

        let variationsBlock = document.getElementById('variationsBlock');
        let addVariationBtn = document.getElementById('addVariationBtn');
        addVariationBtn.addEventListener('click', () => {
            // get last variation id
            let lastId = document.querySelector('#variationsBlock > div:last-of-type').getAttribute('data-id');

            // add variation block
            variationsBlock.insertAdjacentHTML('beforeend', getVariationElements(Number(lastId)+1));

            // add QuillJS
            @foreach($LANGS as $lang)
            new Quill('.quill' + (Number(lastId)+1) + '{{$lang['code']}}', quillOptions).on('text-change', () => {
                let textArea{{$lang['code']}} = document.querySelector('[name="variations[' + (Number(lastId)+1) + '][desc][{{$lang['code']}}]"]');
                textArea{{$lang['code']}}.value = document.querySelector('.quill' + (Number(lastId)+1) + '{{$lang['code']}}' + ' .ql-editor').innerHTML;
            });
            @endforeach

            // add filepond
            FilePond.create(
                document.querySelector('.filepond' + (Number(lastId)+1)),
            );

            // add variation delete btn
            deleteVariation((Number(lastId)+1));
        });
    </script>
    <!-- END ADD VARIATIONS -->

    <!-- DELETE VARIATIONS -->
    <script>
        @if(!empty(session()->getOldInput()))
            @foreach(old('variations') as $itemKey => $item)
                deleteVariation({{$itemKey}});
            @endforeach
        @else
            deleteVariation(0);
        @endif

        function deleteVariation(itemKey)
        {
            let elem = document.querySelector('[data-variation-delete-btn-id="' + itemKey + '"]');
            let variationBlock = document.querySelector('#variationsBlock [data-id="' + itemKey + '"]');

            elem.addEventListener('click', () => {
                if (document.getElementById('variationsBlock').childElementCount < 2) {
                    // Create an instance of Notyf
                    let options = {
                        "position": {
                            "x": "center",
                            "y": "top"
                        }
                    };
                    new Notyf(options).error('Нельзя удалить последнюю вариацию!');
                    return 0;
                }
                variationBlock.remove();
            });
        }
    </script>
    <!-- END DELETE VARIATIONS -->

@endsection
