<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <style>
        [x-cloak] { display: none; opacity: 0; }
    </style>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    @livewireStyles
    <title>
        PHP Project
    </title>
    <script src="{{ asset('js/cdn.js') }}"></script>
</head>
<body>

    <!--Plan de travail-->

    <div class="my_work">

        <!--Navigation-->

        <div class="sidebar active">
            <div class="logo_content">
                <div class="logo">
                    <img src="images/table-account.svg" alt="">
                    <div class="logo_name">
                        GET
                    </div>
                </div>
                <img src="images/menu-fill.svg" alt="" id="btn">
            </div>
            <ul class="nav_list">
                <li>
                    <a href="{{ route('prof') }}" class="@if($_SERVER['REQUEST_URI'] === '/') active_link @endif">
                        <span><svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32"><path fill="currentColor" d="M4 6v2h22v16H12v2h18v-2h-2V6H4zm4.002 3A4.016 4.016 0 0 0 4 13c0 2.199 1.804 4 4.002 4A4.014 4.014 0 0 0 12 13c0-2.197-1.802-4-3.998-4zM14 10v2h5v-2h-5zm7 0v2h3v-2h-3zM8.002 11C9.116 11 10 11.883 10 13c0 1.12-.883 2-1.998 2C6.882 15 6 14.12 6 13c0-1.117.883-2 2.002-2zM14 14v2h10v-2H14zM4 18v8h2v-6h3v6h2v-5.342l2.064 1.092c.585.31 1.288.309 1.872 0v.002l3.53-1.867l-.933-1.77l-3.531 1.867l-3.096-1.634A3.005 3.005 0 0 0 9.504 18H4z"/></svg></span>
                        <span class="links_name">Professeurs</span>
                    </a>
                    <span class="tooltype">Professeurs</span>
                </li>
                <li>
                    <a href="{{ route('salle') }}" class="@if($_SERVER['REQUEST_URI'] === '/salle') active_link @endif">
                        <span><svg xmlns="http://www.w3.org/2000/svg" width="256" height="256" viewBox="0 0 256 256"><path fill="currentColor" d="m221.56 100.85l-79.95-75.47l-.16-.15a19.93 19.93 0 0 0-26.91 0l-.17.15l-79.93 75.47a20.07 20.07 0 0 0-6.44 14.7V208a20 20 0 0 0 20 20h48a20 20 0 0 0 20-20v-44h24v44a20 20 0 0 0 20 20h48a20 20 0 0 0 20-20v-92.45a20.07 20.07 0 0 0-6.44-14.7ZM204 204h-40v-44a20 20 0 0 0-20-20h-32a20 20 0 0 0-20 20v44H52v-86.72l76-71.75l76 71.75Z"/></svg></span>
                        <span class="links_name">Salles</span>
                    </a>
                    <span class="tooltype">Salles</span>
                </li>
                <li>
                    <a href="{{ route('classe') }}" class="@if($_SERVER['REQUEST_URI'] === '/classe') active_link @endif">
                        <span><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M23 2H1a1 1 0 0 0-1 1v18a1 1 0 0 0 1 1h22a1 1 0 0 0 1-1V3a1 1 0 0 0-1-1m-1 18h-2v-1h-5v1H2V4h20v16M10.29 9.71A1.71 1.71 0 0 1 12 8c.95 0 1.71.77 1.71 1.71c0 .95-.76 1.72-1.71 1.72s-1.71-.77-1.71-1.72m-4.58 1.58c0-.71.58-1.29 1.29-1.29a1.29 1.29 0 0 1 1.29 1.29c0 .71-.58 1.28-1.29 1.28c-.71 0-1.29-.57-1.29-1.28m10 0A1.29 1.29 0 0 1 17 10a1.29 1.29 0 0 1 1.29 1.29c0 .71-.58 1.28-1.29 1.28c-.71 0-1.29-.57-1.29-1.28M20 15.14V16H4v-.86c0-.94 1.55-1.71 3-1.71c.55 0 1.11.11 1.6.3c.75-.69 2.1-1.16 3.4-1.16c1.3 0 2.65.47 3.4 1.16c.49-.19 1.05-.3 1.6-.3c1.45 0 3 .77 3 1.71Z"/></svg></span>
                        <span class="links_name">Classes</span>
                    </a>
                    <span class="tooltype">Classes</span>
                </li>
                <li>
                    <a href="{{ route('edt') }}" class="@if($_SERVER['REQUEST_URI'] === '/edt') active_link @endif">
                        <span><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M14 12h1.5v2.82l2.44 1.41l-.75 1.3L14 15.69V12M4 2h14a2 2 0 0 1 2 2v6.1c1.24 1.26 2 2.99 2 4.9a7 7 0 0 1-7 7c-1.91 0-3.64-.76-4.9-2H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2m0 13v3h4.67c-.43-.91-.67-1.93-.67-3H4m0-7h6V5H4v3m14 0V5h-6v3h6M4 13h4.29c.34-1.15.97-2.18 1.81-3H4v3m11-2.85A4.85 4.85 0 0 0 10.15 15c0 2.68 2.17 4.85 4.85 4.85A4.85 4.85 0 0 0 19.85 15c0-2.68-2.17-4.85-4.85-4.85Z"/></svg></span>
                        <span class="links_name">Emploi du temps</span>
                    </a>
                    <span class="tooltype">Emploi du temps</span>
                </li>
                <li>
                    <a href="{{ route('table') }}" class="@if($_SERVER['REQUEST_URI'] === '/table') active_link @endif">
                        <span><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M5 4h14a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2m0 4v4h6V8H5m8 0v4h6V8h-6m-8 6v4h6v-4H5m8 0v4h6v-4h-6Z"/></svg></span>
                        <span class="links_name">Tableau</span>
                    </a>
                    <span class="tooltype">Tableau</span>
                </li>
            </ul>
        </div>

        <div class="home_content">
            <div class="w-full">
                <div class="w-full">
                    @yield('content')
                </div>
            </div>
        </div>
    </div>

        <script>
            let btn = document.querySelector('#btn')
            let sidebar = document.querySelector('.sidebar')

            btn.onclick = function(){
                sidebar.classList.toggle("active")
            }
        </script>


    <!--End Plan de travail-->
@livewireScripts

</body>
</html>

