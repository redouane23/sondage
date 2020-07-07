@extends('layouts.app')

@section('content')
    <section id="login" class="container mb-2">


        <div class="container">
            <div class="row">
                <div class="col-10 mx-auto col-md-6 bg-white mx-auto">

                    <h2 class="text-center text-capitalize text-primary">S'inscrire</h2>

                    <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <!--name-->
                        <div class="form-group{{ $errors->has('name') ? ' is-invalid' : '' }}">
                            <label for="name">Nom Complet</label>
                            <input type="text" name="name" value="{{ old('name') }}"
                                   autofocus
                                   class="form-control" id="name">

                            @if ($errors->has('name'))
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                            @endif
                        </div>

                        <div class="row">

                            <div class="col-md-6">
                                <!--first name-->
                                <div class="form-group{{ $errors->has('age') ? ' is-invalid' : '' }}">
                                    <label for="age">Age</label>
                                    <input type="number" min="18" max="90" name="age" value="{{ old('age') }}"
                                           autofocus
                                           class="form-control" id="age">

                                    @if ($errors->has('age'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('age') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="col-md-6">
                                <!--last name-->
                                <div class="form-group{{ $errors->has('genre') ? ' is-invalid' : '' }}">
                                    <label for="genre">Genre</label>
                                    <select class="form-control" id="genre" name="genre" value="{{ old('genre') }}">
                                        <option>Homme</option>
                                        <option>Femme</option>
                                    </select>

                                    @if ($errors->has('genre'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('genre') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                        </div>

                        <!--email-->
                        <div class="form-group{{ $errors->has('email') ? ' is-invalid' : '' }}">
                            <label for="email">Email</label>
                            <input type="text" class="form-control" id="email" name="email"
                                   value="{{ old('email') }}">

                            @if ($errors->has('email'))
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                            @endif
                        </div>

                        <!--password-->
                        <div class="form-group{{ $errors->has('password') ? ' is-invalid' : '' }}">
                            <label for="password">Mot de passe</label>
                            <input type="password" name="password" class="form-control" id="password">

                            @if ($errors->has('password'))
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                            @endif
                        </div>

                        <!--confirm password-->
                        <div class="form-group">
                            <label for="password-confirm">Confermation de Mot de passe</label>
                            <input type="password" class="form-control" id="password-confirm"
                                   name="password_confirmation">
                        </div>

                        <!--remember me-->
                        <div class="form-group">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="customCheck"
                                       name="example1">
                                <label class="custom-control-label"
                                       for="customCheck">Accepter les conditions</label>
                            </div>
                        </div>

                        <!--submit-->
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-block">S'inscrire</button>
                        </div>

                        <p class="text-center">Vous avez déjà un compte <a
                                href="{{ route('login') }}">S'identifier !</a></p>

                    </form><!--end of form-->

                    <div>

                        <hr>

                        <button class="btn btn-block btn-primary" style="background: #3b5998">
                            <span class="fab fa-facebook-f"></span>
                            S'inscrire avec facebook
                        </button>
                        <button class="btn btn-block btn-primary" style="background: #dd4b39">
                            <span class="fab fa-google"></span>
                            S'inscrire avec google+
                        </button>

                    </div>


                </div>
            </div>
        </div>


    </section><!--end of register-->
@endsection
