@extends('panel.layouts.main')
@section('title', $title)

@section('content')

    <!-- HEADER -->
    @include('panel.components.header', ['action' => $action, 'title' => $title, 'route' => $route.'.index', 'text' => 'Назад'])

    <div class="container-fluid">
        <!-- Form -->
        <form action="{{route($route.'.update', [$routeItem => ${$routeItem}])}}" method="post" class="mb-4">
            @csrf
            @method('put')
            <!-- Team name -->
            <div class="form-group">

                <!-- Label -->
                <label class="form-label required">
                    Название
                </label>

                <!-- Input -->
                <input name="name" value="{{old('name', ${$routeItem}->name)}}" type="text" class="form-control">
                @error('name')
                <div class="text-danger mt-2">{{ $message }}</div>
                @enderror
            </div>

            <!-- Categories -->
            <div class="form-group">

                <!-- Label -->
                <label class="form-label">
                    Категории
                </label>

                <!-- Select -->
                <select name="categories[]" class="form-select" data-choices='{"removeItemButton": true}' multiple>
                    <option value="">+</option>
                    @foreach($categories as $category)
                        <option value="{{$category->id}}" {{in_array($category->id, old('categories', ${$routeItem}->categories->pluck('id')->toArray())) ? 'selected': ''}}>{{$category->name}}</option>
                    @endforeach
                </select>
                @error('categories', 'categories.*')
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
                <textarea name="desc" type="textarea" hidden>{!!old('name', ${$routeItem}->desc)!!}</textarea>
                <div class="quill">
                    {!!old('name', ${$routeItem}->desc)!!}
                </div>
                @error('desc')
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
        var quill = new Quill('.quill', {
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

        quill.on('text-change', () => {
            let textArea = document.querySelector('[name="desc"]');
            textArea.value = document.querySelector('.ql-editor').innerHTML;
        });
    </script>

@endsection
