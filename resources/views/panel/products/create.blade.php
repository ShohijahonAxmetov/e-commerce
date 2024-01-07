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
            <!-- Team name -->
            <div class="form-group">

                <!-- Label -->
                <label class="form-label">
                    Название
                </label>

                <!-- Input -->
                <input name="name" value="{{old('name')}}" type="text" class="form-control">
                @error('name')
                <div class="text-danger mt-2">{{ $message }}</div>
                @enderror
            </div>

            <!-- Team description -->
            <div class="form-group">

                <!-- Label -->
                <label class="form-label mb-1">
                    Описание
                </label>

                <!-- Text -->
{{--                <small class="form-text text-muted">--}}
{{--                    This is how others will learn about the project, so make it good!--}}
{{--                </small>--}}

                <!-- Textarea -->
                <textarea name="desc" type="textarea" hidden>{!!old('desc')!!}</textarea>
                <div class="quill">
                    {!!old('desc')!!}
                </div>
                @error('desc')
                <div class="text-danger mt-2">{{ $message }}</div>
                @enderror
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

            <div class="card card-body">
                <div class="form-group">

                    <!-- Label -->
                    <label class="form-label">
                        Название
                    </label>

                    <!-- Input -->
                    <input name="variations[0][name]" type="text" class="form-control">
                    @error('variations.0.name')
                    <div class="text-danger mt-2">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Description -->
                <div class="form-group">

                    <!-- Label -->
                    <label class="form-label mb-1">
                        Описание
                    </label>

                    <!-- Text -->
                    {{--                <small class="form-text text-muted">--}}
                    {{--                    This is how others will learn about the project, so make it good!--}}
                    {{--                </small>--}}

                    <!-- Textarea -->
                    <textarea name="variations[0][desc]" type="textarea" hidden>{!!old('variations.0.desc')!!}</textarea>
                    <div class="quill0">
                        {!!old('variations.0.desc')!!}
                    </div>
                    @error('variations.0.desc')
                    <div class="text-danger mt-2">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">

                    <!-- Label -->
                    <label class="form-label">
                        Цена продажи
                    </label>

                    <!-- Input -->
                    <input name="variations[0][price]" type="text" class="form-control">
                    @error('variations.0.price')
                    <div class="text-danger mt-2">{{ $message }}</div>
                    @enderror
                </div>


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

        let quill = new Quill('.quill', quillOptions);
        quill.on('text-change', () => {
            let textArea = document.querySelector('[name="desc"]');
            textArea.value = document.querySelector('.quill .ql-editor').innerHTML;
        });

        let quill0 = new Quill('.quill0', quillOptions);
        quill0.on('text-change', () => {
            let textArea = document.querySelector('[name="variations[0][desc]"]');
            textArea.value = document.querySelector('.quill0 .ql-editor').innerHTML;
        });
    </script>

@endsection
