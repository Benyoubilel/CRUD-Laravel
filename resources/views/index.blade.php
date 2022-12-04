<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>GestionEpreuveMatiere</title>
    <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
      
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand btn-outline-danger text-light" href="/">Acceuil</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link text-light" href="/affEpreuves">Liste Epreuves</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light" href="/affMatieres">Liste Matieres</a>
                    </li>
                </ul>
                <div class="d-flex m-2">
                    @auth
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-outline-danger me-2 "><a aria-current="page">Logout</a>
                            </button>
                        </form>
                    @else
                        <a class="btn btn-outline-danger me-2 " aria-current="page"
                            href="{{ route('register') }}">Registre</a>
                        {{-- <a class="btn btn-outline-success " aria-current="page" href="{{ route('login') }}">Login</a> --}}
                        <button type="button" class="btn btn-outline-success"
                            data-bs-toggle="modal" data-bs-target="#login">
                            Login 
                        </button>
                        <div class="modal fade" id="login" tabindex="-1" aria-labelledby="addmodalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    
                                    <form method="POST" action="{{ route('login') }}">
                                        @csrf
                                        <div class="modal-body">
                                        <!-- Email Address -->
                                        <div>
                                            <x-input-label for="email" :value="__('Email')" class="p-2"/>
                                            <x-text-input id="email" class="form-control" type="email" name="email" :value="old('email')" required autofocus />
                                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                        </div>
                            
                                        <!-- Password -->
                                        <div class="mt-4">
                                            <x-input-label for="password" :value="__('Password')" class="p-2"/>
                            
                                            <x-text-input id="password" class="form-control"
                                                            type="password"
                                                            name="password"
                                                            required autocomplete="current-password" />
                            
                                            <x-input-error :messages="$errors->get('password')" class="mt-2" />
                                        </div>
                            
                                        <!-- Remember Me -->
                                        <div class="block mt-4">
                                            <label for="remember_me" class="form-control">
                                                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                                                <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                                            </label>
                                        </div>
                            
                                        <div class="flex items-center justify-end mt-4">
                                            @if (Route::has('password.request'))
                                                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                                                    {{ __('Forgot your password?') }}
                                                </a>
                                            @endif
                                            <div class="modal-footer m-2">
                                            <x-primary-button class="btn btn-success">
                                                {{ __('Log in') }}
                                            </x-primary-button>
                                            </div>
                                        </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endauth
                </div>
            </div>
        </div>
    </nav>
    <section class="container-fluid ">
        <div class="row justify-content-center">
            <div class="col-md-3 btn">
                <div class="jumbotron card">
                    <i class="fa  fa-list-ul fa-4x"></i>
                    <p>
                        Liste des Epreuves
                    </p>
                    <p>
                        <a class="btn btn-primary btn-large" href="/affEpreuves">Afficher</a>
                    </p>
                </div>
            </div>
            <div class="col-md-3 btn">
                <div class="jumbotron card">
                    <i class="fa fa-list-ul fa-4x"></i>
                    <p>
                        Liste des Matieres
                    </p>
                    <p>
                        <a class="btn btn-primary btn-large" href="/affMatieres">Afficher</a>
                    </p>
                </div>
            </div>
        </div>
    </section>






    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
    </script>
</body>

</html>



</body>

</html>
