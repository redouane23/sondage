@extends('layouts.app')

@section('content')

    <section id="slide" class="container mb-2 py-2">

        <div class="slides owl-carousel owl-theme">


            <div class="slide text-white d-flex justify-content-center align-items-center">

                <img src="dist/images/sondage1.png" class="img-fluid" alt="" style="height: 400px;width: 100%">


            </div><!--end of slide-->

            <div class="slide text-white d-flex justify-content-center align-items-center">

                <img src="dist/images/sondage2.jpg" class="img-fluid" alt="" style="height: 400px;width: 100%">


            </div><!--end of slide-->

        </div><!--end of slides-->

    </section><!--end of slide section-->

    <div class="container my-2 p-0">

        <div class="row">

            <div class="col-md-12 text-secondary d-flex justify-content-center align-items-center">

                <h3 class="text-capitalize text-primary fw-300">mes sondages</h3>

            </div>

        </div><!--end of row-->


    </div><!--end of container-->

    <section class="listing mb-4">

        <div class="container">

            <div class="row">

                <div class="col-md-3 sondage">

                    <img src="dist/images/corona.jpg" class="img-thumbnail" alt="" style="height: 227px;width: 100%">

                    <div class="d-flex">

                        <p class="product__name mb-0 text-capitalize">sondage title</p>

                    </div>

                    <div class="d-flex justify-content-between align-items-center">

                        <a href="show.html"
                           class="product__details-button btn btn-outline-primary btn-sm text-capitalize flex-fill mr-1"><span
                                    class="fas fa-info"></span>
                            plus détails
                        </a>

                    </div><!--end of movie details-->


                </div><!--end of col-->

                <div class="col-md-3 sondage">

                    <img src="dist/images/corona.jpg" class="img-thumbnail" alt="" style="height: 227px;width: 100%">

                    <div class="d-flex">

                        <p class="product__name mb-0 text-capitalize">sondage title</p>

                    </div>

                    <div class="d-flex justify-content-between align-items-center">

                        <a href="show.html"
                           class="product__details-button btn btn-outline-primary btn-sm text-capitalize flex-fill mr-1"><span
                                    class="fas fa-info"></span>
                            plus détails
                        </a>

                    </div><!--end of movie details-->


                </div><!--end of col-->

                <div class="col-md-3 sondage">

                    <img src="dist/images/corona.jpg" class="img-thumbnail" alt="" style="height: 227px;width: 100%">

                    <div class="d-flex">

                        <p class="product__name mb-0 text-capitalize">sondage title</p>

                    </div>

                    <div class="d-flex justify-content-between align-items-center">

                        <a href="show.html"
                           class="product__details-button btn btn-outline-primary btn-sm text-capitalize flex-fill mr-1"><span
                                    class="fas fa-info"></span>
                            plus détails
                        </a>

                    </div><!--end of movie details-->


                </div><!--end of col-->

                <div class="col-md-3 sondage">

                    <img src="dist/images/corona.jpg" class="img-thumbnail" alt="" style="height: 227px;width: 100%">

                    <div class="d-flex">

                        <p class="product__name mb-0 text-capitalize">sondage title</p>

                    </div>

                    <div class="d-flex justify-content-between align-items-center">

                        <a href="show.html"
                           class="product__details-button btn btn-outline-primary btn-sm text-capitalize flex-fill mr-1"><span
                                    class="fas fa-info"></span>
                            plus détails
                        </a>

                    </div><!--end of movie details-->


                </div><!--end of col-->

            </div><!--end of owl slides-->

        </div><!-- end of container -->

    </section><!--end of sondages section-->

@endsection
