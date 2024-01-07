@extends('panel.layouts.main')
@section('title', $title)

@section('content')

    <!-- HEADER -->
    @include('panel.components.header', ['action' => $action, 'title' => $title, 'route' => $route.'.create', 'text' => 'Добавить'])

    <!-- MODALS -->
    <!-- Modal: Delete -->
    <div class="modal fade" id="modalMembers" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-card card">
                    <div class="card-header">

                        <!-- Title -->
                        <h4 class="card-header-title" id="exampleModalCenterTitle">
                            Удаление
                        </h4>

                        <!-- Close -->
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

                    </div>
                    <div class="card-body">
                        <p>Действительно хотите удалить?</p>
                        <div class="d-flex justify-content-end">
                            <!-- Close -->
                            <button type="button" class="btn btn-primary me-3" data-bs-dismiss="modal">Отменить</button>
                            <div>
                                <form action="" id="deleteModalForm" method="post">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-danger">Удалить</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- CONTENT -->
    <div class="container-fluid">
        <!-- Tab content -->
        <div class="tab-content">
            <div class="tab-pane fade show active" id="contactsListPane" role="tabpanel"
                 aria-labelledby="contactsListTab">

                <!-- Card -->
                <div class="card"
                     id="contactsList">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col">

                                <!-- Form -->
                                <form>
                                    <div class="input-group input-group-flush input-group-merge input-group-reverse">
                                        <input class="form-control list-search" type="search" placeholder="Search">
                                        <span class="input-group-text">
                                          <i class="fe fe-search"></i>
                                        </span>
                                    </div>
                                </form>

                            </div>
                            <div class="col-auto me-n3">

                                <!-- Select -->
                                <form>
                                    <select class="form-select form-select-sm form-control-flush"
                                            data-choices='{"searchEnabled": false}'>
                                        <option>5 per page</option>
                                        <option selected>10 per page</option>
                                        <option>All</option>
                                    </select>
                                </form>

                            </div>
                            <div class="col-auto">

                                <!-- Dropdown -->
                                <div class="dropdown">

                                    <!-- Toggle -->
                                    <button class="btn btn-sm btn-white" type="button" data-bs-toggle="dropdown"
                                            data-bs-auto-close="outside" aria-haspopup="true" aria-expanded="false">
                                        <i class="fe fe-sliders me-1"></i> Filter <span
                                            class="badge bg-primary ms-1 d-none">0</span>
                                    </button>

                                    <!-- Menu -->
                                    <form class="dropdown-menu dropdown-menu-end dropdown-menu-card">
                                        <div class="card-header">

                                            <!-- Title -->
                                            <h4 class="card-header-title">
                                                Filters
                                            </h4>

                                            <!-- Link -->
                                            <button class="btn btn-sm btn-link text-reset d-none" type="reset">
                                                <small>Clear filters</small>
                                            </button>

                                        </div>
                                        <div class="card-body">

                                            <!-- List group -->
                                            <div class="list-group list-group-flush mt-n4 mb-4">
                                                <div class="list-group-item">
                                                    <div class="row">
                                                        <div class="col">

                                                            <!-- Text -->
                                                            <small>Title</small>

                                                        </div>
                                                        <div class="col-auto">

                                                            <!-- Select -->
                                                            <select class="form-select form-select-sm" name="item-title"
                                                                    data-choices='{"searchEnabled": false}'>
                                                                <option value="*" selected>Any</option>
                                                                <option value="Designer">Designer</option>
                                                                <option value="Developer">Developer</option>
                                                                <option value="Owner">Owner</option>
                                                                <option value="Founder">Founder</option>
                                                            </select>

                                                        </div>
                                                    </div> <!-- / .row -->
                                                </div>
                                                <div class="list-group-item">
                                                    <div class="row">
                                                        <div class="col">

                                                            <!-- Text -->
                                                            <small>Lead scrore</small>

                                                        </div>
                                                        <div class="col-auto">

                                                            <!-- Select -->
                                                            <select class="form-select form-select-sm" name="item-score"
                                                                    data-choices='{"searchEnabled": false}'>
                                                                <option value="*" selected>Any</option>
                                                                <option value="1/10">1+</option>
                                                                <option value="2/10">2+</option>
                                                                <option value="3/10">3+</option>
                                                                <option value="4/10">4+</option>
                                                                <option value="5/10">5+</option>
                                                                <option value="6/10">6+</option>
                                                                <option value="7/10">7+</option>
                                                                <option value="8/10">8+</option>
                                                                <option value="9/10">9+</option>
                                                                <option value="10/10">10</option>
                                                            </select>

                                                        </div>
                                                    </div> <!-- / .row -->
                                                </div>
                                            </div>

                                            <!-- Button -->
                                            <button class="btn w-100 btn-primary" type="submit">
                                                Apply filter
                                            </button>

                                        </div>
                                    </form>

                                </div>

                            </div>
                        </div> <!-- / .row -->
                    </div>
                    <div class="table-responsive">
                        <table class="table table-sm table-hover table-nowrap card-table">
                            <thead>
                            <tr>
                                <th>
                                    #
                                </th>
                                <th>
                                    <a class="list-sort text-muted" data-sort="item-name" href="#">Название</a>
                                </th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody class="list fs-base">
                            @foreach(${$route} as $key => ${$routeItem})
                            <tr>
                                <td>{{${$route}->firstItem() + $key}}</td>
                                <td>

                                    <!-- Avatar -->
                                    <div class="avatar avatar-xs align-middle me-2">
                                        <img class="avatar-img rounded-circle"
                                             src="/assets/img/avatars/profiles/avatar-1.jpg" alt="...">
                                    </div>
                                    <a class="item-name text-reset" href="profile-posts.html">{{${$routeItem}->name}}</a>

                                </td>
                                <td class="text-end">

                                    <!-- Dropdown -->
                                    <div class="dropdown">
                                        <a class="dropdown-ellipses dropdown-toggle" href="#" role="button"
                                           data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fe fe-more-vertical"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-end">
                                            <a href="{{route($route.'.edit', [$routeItem => ${$routeItem}])}}" class="dropdown-item">
                                                Редактировать
                                            </a>
                                            <a href="#!" data-action="delete" data-route="{{route($route.'.destroy', [$routeItem => ${$routeItem}])}}" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#modalMembers">
                                                Удалить
                                            </a>
                                        </div>
                                    </div>

                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer d-flex justify-content-center">

                        {!! ${$route}->links() !!}

                        <!-- Alert -->
                        <div class="list-alert alert alert-dark alert-dismissible border fade" role="alert">

                            <!-- Content -->
                            <div class="row align-items-center">
                                <div class="col">

                                    <!-- Checkbox -->
                                    <div class="form-check">
                                        <input class="form-check-input" id="listAlertCheckbox" type="checkbox" checked
                                               disabled>
                                        <label class="form-check-label text-white" for="listAlertCheckbox">
                                            <span class="list-alert-count">0</span> deal(s)
                                        </label>
                                    </div>

                                </div>
                                <div class="col-auto me-n3">

                                    <!-- Button -->
                                    <button class="btn btn-sm btn-white-20">
                                        Edit
                                    </button>

                                    <!-- Button -->
                                    <button class="btn btn-sm btn-white-20">
                                        Delete
                                    </button>

                                </div>
                            </div> <!-- / .row -->

                            <!-- Close -->
                            <button type="button" class="list-alert-close btn-close" aria-label="Close"></button>

                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>

    <script>
        let deleteBtns = document.querySelectorAll('[data-action="delete"]');
        let deleteModalForm = document.getElementById('deleteModalForm');

        deleteBtns.forEach((deleteBtn) => {
            deleteBtn.addEventListener('click', () => {
                deleteModalForm.setAttribute('action', deleteBtn.getAttribute('data-route'));
            });
        });
    </script>

@endsection
