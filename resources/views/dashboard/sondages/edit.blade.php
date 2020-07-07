@extends('layouts.dashboard.app')

@section('content')

    <main class="app-content">
        <div class="app-title">
            <div>
                <h1 class="text-capitalize">Sondages</h1>
            </div>
            <ul class="app-breadcrumb breadcrumb">
                <li class="breadcrumb-item"><i class="fa fa-dashboard fa-lg"><a
                            href="{{ route('dashboard.welcome') }}">Tableau de board</a></i>
                </li>
                <li class="breadcrumb-item"><a
                        href="{{ route('dashboard.sondages.index') }}">Sondages</a>
                </li>
                <li class="breadcrumb-item">Modifier</li>
            </ul>
        </div>

        <div class="tile">
            <div class="tile-body m-0">

                <section class="content">

                    <div class="box box-primary">

                        <div class="box-header">
                            <h3 class="box-title">Modifier</h3>
                        </div>

                        <div class="box-body">

                            @include('partials._errors')

                            <form action="{{ route('dashboard.sondages.update', $sondage->id) }}" method="POST"
                                  enctype="multipart/form-data">

                                {{ csrf_field() }}
                                {{ method_field('put') }}

                                <div class="form-group">

                                    <label>Titre</label>
                                    <input type="text" name="title" class="form-control" value="{{ $sondage->title }}">

                                </div>

                                <div class="form-group">

                                    <label>Description</label>
                                    <textarea name="description"
                                              class="form-control ckeditor">{{ $sondage->description }}</textarea>

                                </div>

                                <div class="form-group">

                                    <label>Question</label>
                                    <input type="text" name="question" class="form-control"
                                           value="{{ $sondage->question }}">

                                </div>

                                <div class="form-group">

                                    <label>Image</label>
                                    <input type="file" name="image" class="form-control image">

                                </div>

                                <div class="form-group">

                                    <img src="{{ $sondage->image_path }}" style="width: 100px"
                                         class="img-thumbnail image-preview">

                                </div>


                                <div class="form-group">

                                    <button type="submit" class="btn btn-primary"><i
                                            class="fa fa-plus"></i> Modifier
                                    </button>

                                </div>

                            </form>

                        </div>


                    </div>
                    <!-- /.box -->
                </section>

            </div>
        </div>


    </main>


@endsection
