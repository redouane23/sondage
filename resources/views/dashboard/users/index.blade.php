@extends('layouts.dashboard.app')

@section('content')

    <main class="app-content">
        <div class="app-title">
            <div>
                <h1 class="text-capitalize">Utilisateurs<small>({{ $users->total() }})</small></h1>
            </div>
            <ul class="app-breadcrumb breadcrumb">
                <li class="breadcrumb-item"><i class="fa fa-dashboard fa-lg"><a
                            href="{{ route('dashboard.welcome') }}">Tableau de board</a></i>
                </li>
                <li class="breadcrumb-item">Utilisateurs</li>
            </ul>
        </div>

        <div class="tile">
            <div class="tile-body m-0">

                <section class="content my-2">
                    <div class="box box-primary">
                        <div class="box-header">
                            <h5 class="box-title text-capitalize" style="margin-bottom: 15px">Utilisateurs</h5>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            @if ($users->count() > 0)

                                <div class="table-responsive">

                                    <table class="table table-hover">
                                        <thead>
                                        <tr>
                                            <th style="width: 10px">#</th>
                                            <th>Nom Complet</th>
                                            <th>Age</th>
                                            <th>Genre</th>
                                            <th>Email</th>
                                            <th>Image</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach ($users as $index=>$user)

                                            <tr>
                                                <td>{{ $index + 1 }}</td>
                                                <td>{{ $user->name }}</td>
                                                <td>{{ $user->age }}</td>
                                                <td>{{ $user->genre }}</td>
                                                <td>{{ $user->email }}</td>
                                                <td>
                                                    <img src="{{ $user->image_path }}" style="width: 100px"
                                                         class="img-thumbnail">
                                                </td>
                                                <td>
                                                    <div class="d-flex">
                                                        <form
                                                            action="{{ route('dashboard.users.destroy', $user->id) }}"
                                                            method="POST" style="display: inline">
                                                            {{ csrf_field() }}
                                                            {{ method_field('delete') }}
                                                            <button type="submit"
                                                                    class="btn btn-danger delete btn-sm"><i
                                                                    class="fa fa-trash"></i>Supprimer
                                                            </button>
                                                        </form>

                                                    </div>
                                                </td>
                                            </tr>

                                        @endforeach
                                        </tbody>
                                    </table>

                                    {{ $users->appends(request()->query())->links() }}

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
