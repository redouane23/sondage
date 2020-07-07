@extends('layouts.dashboard.app')

@section('content')

    <main class="app-content">
        <div class="app-title">
            <div>
                <h1 class="text-capitalize">Sondages</h1>
            </div>
            <ul class="app-breadcrumb breadcrumb">
                <li class="breadcrumb-item"><i class="fa fa-dashboard fa-lg"><a
                            href="{{ route('dashboard.welcome') }}">Tableau de Board</a></i>
                </li>
                <li class="breadcrumb-item">Sondages</li>
            </ul>
        </div>

        <div class="tile">
            <div class="tile-body m-0">

                <section class="content-header">
                    <form action="" method="GET">

                        <div class="row">


                            <div class="col-md-4">

                                <a href="{{ route('dashboard.sondages.create') }}" class="btn btn-primary"><i
                                        class="fa fa-plus"></i>Ajouter</a>
                            </div>

                        </div>

                    </form>
                </section>

                <section class="content my-2">
                    <div class="box box-primary">
                        <div class="box-header">
                            <h5 class="box-title text-capitalize"
                                style="margin-bottom: 15px">Sondages</h5>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            @if ($sondages->count() > 0)

                                <div class="table-responsive">

                                    <table class="table table-hover">
                                        <thead>
                                        <tr>
                                            <th style="width: 10px">#</th>
                                            <th>Titre</th>
                                            <th>Description</th>
                                            <th>Question</th>
                                            <th>Image</th>
                                            <th>OUI</th>
                                            <th>NON</th>
                                            <th>IGNORER</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach ($sondages as $index=>$sondage)

                                            <tr>
                                                <td>{{ $index + 1 }}</td>
                                                <td>{{ $sondage->title }}</td>
                                                <td>{!! $sondage->description !!}</td>
                                                <td>{{ $sondage->question }}</td>
                                                <td><img src="{{ $sondage->image_path }}" style="width: 100px"
                                                         class="img-thumbnail"></td>
                                                <td>{{ $sondage->oui() }}</td>
                                                <td>{{ $sondage->non() }}</td>
                                                <td>{{ $sondage->ignorer() }}</td>
                                                <td>
                                                    <div class="d-flex">
                                                        <a href="{{ route('dashboard.sondages.edit', $sondage->id) }}"
                                                           class="btn btn-info btn-sm mx-1"><i
                                                                class="fa fa-edit"></i>Modifier</a>

                                                        <form
                                                            action="{{ route('dashboard.sondages.destroy', $sondage->id) }}"
                                                            method="POST" style="display: inline">
                                                            {{ csrf_field() }}
                                                            {{ method_field('delete') }}
                                                            <button type="submit"
                                                                    class="btn btn-danger delete btn-sm">
                                                                <i class="fa fa-trash"></i>Supprimer
                                                            </button>
                                                        </form>

                                                    </div>
                                                </td>
                                            </tr>

                                        @endforeach
                                        </tbody>
                                    </table>

                                    {{ $sondages->appends(request()->query())->links() }}

                                </div>



                            @else

                                <h4>Aucune donnée disponible</h4>

                            @endif


                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                </section>

            </div>
        </div>


    </main>



@endsection
