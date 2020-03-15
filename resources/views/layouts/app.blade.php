<!doctype html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <!-- Titre -->
        <title>{{ config('app.name', 'Wimo') }} | @yield('title')</title>
        <!-- Les balises de scripts, link par défaut -->
        @include('layouts.head.default')
        <!--
            additional_head est le nom du fichier blade qui contient des balises scripts, links ou metas en supplement.
         -->
        @isset($additional_head)
            @include('layouts.head.'.$additional_head)
        @endisset
        <!-- Favicon -->
        <!--
        @include('layouts.head.favicon')-->
    </head>
<body>
    <div id="app">
        <header>
            @include('layouts.header.nav')
        </header>
        <main>
            @yield('content')
        </main>
    </div>
    @yield('extra-js')
  </body>
</html>
