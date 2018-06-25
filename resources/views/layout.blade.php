<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=1024">

        <title>Beat Saver | @yield('title')</title>

        {{-- Styles --}}
        <link type="text/css" href="{{ asset('css/app.css') }}" rel="stylesheet">
        @stack('styles')
    </head>
    <body>
        <div class="navbar navbar-fixed-top">
            <div class="container">
                <div class="row">
                    <div class="col-md-2">
                        <a href="{{ route('view.newest') }}">
                            <div class="logo">
                                <img src="img/beat_saver_white.png" alt="BeatSaver">
                            </div>
                        </a>
                    </div>
                    <div class="col-md-5">
                        {{-- Navigation --}}
                        <ul class="nav navbar-nav">
                            <li>
                                <a href="{{ route('view.top-downloads') }}" class="{{ Route::is('view.top-downloads') ? 'active' : '' }}">
                                    Top Downloads
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('view.top-stars') }}" class="{{ Route::is('view.top-stars') ? 'active' : '' }}">
                                    Top Stars
                                </a>
                            </li>
                            <li>
                                <a href="https://discordapp.com/invite/ZY8T8ky" target="_blank">Discord</a>
                            </li>
                            <li>
                                <a href="https://scoresaber.com" target="_blank">Score Saber</a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-3">
                        {{ Form::text('search', null, ['class' => 'form-control', 'placeholder' => 'Search songs']) }}
                    </div>
                    <div class="col-md-2">
                        @if(\Auth::check())
                            <p class="login float-right">
                                {{ \Auth::user()->username }}
                                <i class="fa fa-chevron-down"></i>
                            </p>
                        @else
                            <a href="{{ route('view.login') }}" class="login float-right">Login / Register</a>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <div class="content">
            @yield('content')
        </div>

        {{-- Scripts --}}
        <script type="text/javascript" src="{{ asset('js/app.js') }}"></script>
        @stack('scripts')
    </body>
</html>