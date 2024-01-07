<!-- HEADER -->
<div class="header">
    <div class="container-fluid">

        <!-- Body -->
        <div class="header-body">
            <div class="row align-items-end">
                <div class="col">

                    <!-- Pretitle -->
                    <h6 class="header-pretitle">
                        {{$action}}
                    </h6>

                    <!-- Title -->
                    <h1 class="header-title">
                        {{$title}}
                    </h1>

                </div>

                <div class="col-auto">

                    <!-- Button -->
                    <a href="{{route($route)}}" class="btn btn-primary lift">
                        {{$text}}
                    </a>

                </div>
            </div> <!-- / .row -->
        </div> <!-- / .header-body -->

    </div>
</div> <!-- / .header -->
