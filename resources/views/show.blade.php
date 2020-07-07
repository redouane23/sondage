@extends('layouts.app')

@section('content')

    <section id="show" class="container py-4">

        <div class="container">

            <div class="row">

                <div class="col-12 px-0 pb-2 col-md-4">

                    <img src="{{ $sondage->image_path }}" class="img-thumbnail" alt=""
                         style="height: 300px;width: 100%">

                </div><!--end of col-->

                <div class="col-12 col-md-4 pr-0">

                    <div class="product__details pb-2">
                        <h4 class="product__name align-self-center m-0">{{ $sondage->title }}</h4>
                    </div>

                    <div class="d-flex">
                        <p class="text-capitalize">
                            {!! $sondage->description !!}
                        </p>
                    </div>

                </div><!--end of col-->

                <div class="col-12 col-md-4 d-flex justify-content-center align-items-center">

                    <div class="chartjs-size-monitor"
                         style="position: absolute; left: 0px; top: 0px; right: 0px; bottom: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;">
                        <div class="chartjs-size-monitor-expand"
                             style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;">
                            <div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div>
                        </div>
                        <div class="chartjs-size-monitor-shrink"
                             style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;">
                            <div style="position:absolute;width:200%;height:200%;left:0; top:0"></div>
                        </div>
                    </div>
                    <canvas id="chart-line" width="299" height="200" class="chartjs-render-monitor"
                            style="display: block; width: 299px; height: 200px;"></canvas>

                    <div class="text-center">
                        <p><b>Votes</b> {{ $sondage->oui()+$sondage->non()+$sondage->ignorer() }}</p>
                    </div>


                </div>

            </div><!--end of row -->

        </div><!--end of container-->

        <div class="container mt-2 p-0">

            <div class="row my-4">

                <div class="col-md-12 text-secondary d-flex justify-content-center align-items-center">

                    <h3 class="text-capitalize text-primary fw-300">{{ $sondage->question }} ?</h3>

                </div>

            </div><!--end of row-->

            <div class="row mb-2">

                <div class="col-md-12 text-secondary d-flex justify-content-center align-items-center">

                    @guest()

                        <a href="{{ route('login') }}" class="btn btn-outline-info text-capitalize mr-2">
                            oui
                        </a>

                        <a href="{{ route('login') }}" class="btn btn-outline-success text-capitalize mr-2">
                            non
                        </a>

                        <a href="{{ route('login') }}" class="btn btn-outline-warning text-capitalize">
                            ignorer
                        </a>

                    @else



                        <a
                            class="btn {{ Auth::user()->sondages()->find($sondage->id)->pivot->oui == 1 ? 'btn-info text-white' : 'btn-outline-info text-info' }} text-capitalize update-sondage-btn mr-2"
                            data-user_id="{{ Auth::user()->id }}"
                            data-sondage_id="{{ $sondage->id }}"
                            data-type="oui"
                        >
                            oui
                        </a>

                        <a
                            class="btn {{ Auth::user()->sondages()->find($sondage->id)->pivot->non == 1 ? 'btn-success text-white' : 'btn-outline-success text-success' }} text-capitalize update-sondage-btn mr-2"
                            data-user_id="{{ Auth::user()->id }}"
                            data-sondage_id="{{ $sondage->id }}"
                            data-type="non"
                        >
                            non
                        </a>

                        <a
                            class="btn {{ Auth::user()->sondages()->find($sondage->id)->pivot->ignorer == 1 ? 'btn-warning text-white' : 'btn-outline-warning text-warning' }} text-capitalize update-sondage-btn"
                            data-user_id="{{ Auth::user()->id }}"
                            data-sondage_id="{{ $sondage->id }}"
                            data-type="ignorer"
                        >
                            ignorer
                        </a>

                    @endguest


                </div>

            </div><!--end of row-->


        </div><!--end of container-->


    </section>

    <section class="listing mb-4">

        <div class="container">

            <div class="row  my-2">

                <div class="col-12 d-flex justify-content-between">

                    <h5 class="listing__title text-dark fw-500 text-capitalize">sondages liées</h5>

                </div>

            </div><!--end of row-->

            <div class="container">

                <div class="row">

                    @foreach($sondages->slice(0,4) as $sondage)

                        <div class="col-md-3 sondage">

                            <img src="{{ $sondage->image_path }}" class="img-thumbnail" alt=""
                                 style="height: 227px;width: 100%">

                            <div class="d-flex">

                                <p class="product__name mb-0 text-capitalize">{{ $sondage->title }}</p>

                            </div>

                            <div class="d-flex justify-content-between align-items-center">

                                <a href="{{ route('show', $sondage->id) }}"
                                   class="product__details-button btn btn-outline-primary btn-sm text-capitalize flex-fill mr-1"><span
                                        class="fas fa-info"></span>
                                    plus détails
                                </a>

                            </div><!--end of movie details-->


                        </div><!--end of col-->

                    @endforeach

                </div><!--end of owl slides-->

            </div><!-- end of container -->


        </div><!--end of container-->

    </section><!--end of sondages section-->



@endsection

@section('script')

    <script>
        $(document).ready(function () {
            var ctx = $("#chart-line");
            var myLineChart = new Chart(ctx, {
                type: 'doughnut',
                data: {
                    labels: ["Oui", "Non", "Ignorer"],
                    datasets: [{
                        data: [{{ $sondage->oui() }}, {{ $sondage->non() }}, {{ $sondage->ignorer() }}],
                        backgroundColor: ["#5bc0de", "#2ecc71", "#f1c40f"]
                    }]
                },
                options: {
                    title: {
                        display: false,
                        text: 'Weather'
                    }
                }
            });
        });
    </script>
@endsection
