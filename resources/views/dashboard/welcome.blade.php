@extends('layouts.dashboard.app')

@section('content')

    <main class="app-content">
        <div class="app-title">
            <div>
                <h1 class="text-capitalize">Tableau de board</h1>
            </div>
            <ul class="app-breadcrumb breadcrumb">
                <li class="breadcrumb-item"><i class="fa fa-dashboard fa-lg"> Tableau de board</i></li>
            </ul>
        </div>
        <div class="row">

            <div class="col-md-6 col-lg-3">
                <div class="widget-small warning coloured-icon"><i class="icon fa fa-file fa-3x"></i>
                    <div class="info">
                        <h4>Sondages</h4>
                        <p><b>{{ $sondages->count() }}</b></p>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-lg-3">
                <div class="widget-small info coloured-icon"><i class="icon fa fa-users fa-3x"></i>
                    <div class="info">
                        <h4>Utilisateurs</h4>
                        <p><b>{{ $users->count() }}</b></p>
                    </div>
                </div>
            </div>

        </div>
    </main>

@endsection
