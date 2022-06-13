<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Dashboard</title>

    <!-- Custom fonts for this template-->
    <link href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <link href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <!-- Custom styles for this template-->
    <link href="{{ asset('css/sb-admin-2.min.css') }}" rel="stylesheet">

    <!-- Tailwind-->
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://unpkg.com/flowbite@1.4.7/dist/flowbite.min.css" />
    <script src="https://unpkg.com/flowbite@1.4.7/dist/flowbite.js"></script>

    <style>
        a {
            text-decoration: none !important;
            margin: 3px;
        }

        #doido {
            position: absolute;
            width: 100%;
            bottom: 0;
            list-style-type: none;
            left: -15%;
            padding-bottom: 1.25rem;
        }

        #doido2 {
            position: absolute;
            width: 78%;
            bottom: 0;
            list-style-type: none;

            padding-bottom: 1.25rem;
        }

        .back-cinema {
            background-image: url('https://images.unsplash.com/photo-1475257026007-0753d5429e10?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxzZWFyY2h8MXx8ZGFyayUyMGxlYWZ8ZW58MHx8MHx8&w=1000&q=80');
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-size: cover;
        }

        body {
            background-color: #111827;
        }

        @media (min-width: 991.98px) {
            main {
                padding-left: 240px;
            }
        }

        /* Sidebar */
        .sidebar {
            position: fixed;
            top: 0;
            bottom: 0;
            left: 0;
            padding: 58px 0 0;
            /* Height of navbar */
            box-shadow: 0 2px 5px 0 rgb(0 0 0 / 5%), 0 2px 10px 0 rgb(0 0 0 / 5%);
            width: 240px;
            z-index: 600;
        }

        @media (max-width: 991.98px) {
            .sidebar {
                width: 100%;
            }
        }

        .sidebar .active {
            border-radius: 5px;
            box-shadow: 0 2px 5px 0 rgb(0 0 0 / 16%), 0 2px 10px 0 rgb(0 0 0 / 12%);
        }

        .sidebar-sticky {
            position: relative;
            top: 0;
            height: calc(100vh - 48px);
            padding-top: 0.5rem;
            overflow-x: hidden;
            overflow-y: auto;
            /* Scrollable contents if viewport is shorter than content. */
        }

    </style>

    <script type="text/javascript">
        // Graph
        var ctx = document.getElementById("myChart");

        var myChart = new Chart(ctx, {
            type: "line",
            data: {
                labels: [
                    "Sunday",
                    "Monday",
                    "Tuesday",
                    "Wednesday",
                    "Thursday",
                    "Friday",
                    "Saturday",
                ],
                datasets: [{
                    data: [15339, 21345, 18483, 24003, 23489, 24092, 12034],
                    lineTension: 0,
                    backgroundColor: "transparent",
                    borderColor: "#007bff",
                    borderWidth: 4,
                    pointBackgroundColor: "#007bff",
                }, ],
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: false,
                        },
                    }, ],
                },
                legend: {
                    display: false,
                },
            },
        });
    </script>
</head>

<body>
    <header>
        <!-- Sidebar -->
        <nav id="sidebarMenu" class="collapse d-lg-block sidebar collapse bg-slate-800">
            <div class="position-sticky">
            <div class="sidebar-header flex items-center justify-center py-4">
      <div class="flex flex-col space-y-4">
        <a href="/" class="inline-flex flex-row items-center">
          <div></div>
          <div>
    
            <svg class=" w-32 fill-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512"><!--! Font Awesome Pro 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M224 160c8.836 0 16-7.164 16-16C240 135.2 232.8 128 224 128S208 135.2 208 144C208 152.8 215.2 160 224 160zM96 128C87.16 128 80 135.2 80 144C80 152.8 87.16 160 96 160s16-7.164 16-16C112 135.2 104.8 128 96 128zM474.4 64.12C466.8 63.07 460 69.07 460 76.73c0 5.959 4.188 10.1 9.991 12.36C514.2 99.46 544 160 544 192v112c0 8.844-7.156 16-16 16S512 312.8 512 304V212c0-14.87-15.65-24.54-28.94-17.89c-28.96 14.48-47.83 42.99-50.51 74.88C403.7 285.6 384 316.3 384 352v32H224c17.67 0 32-14.33 32-32c0-17.67-14.33-32-32-32H132.4c-14.46 0-27.37-9.598-31.08-23.57C97.86 283.5 96 269.1 96 256V254.4C101.1 255.3 106.3 256 111.7 256c10.78 0 21.45-2.189 31.36-6.436L160 242.3l16.98 7.271C186.9 253.8 197.6 256 208.3 256c7.176 0 14.11-.9277 20.83-2.426C241.7 292 277.4 320 320 320l36.56-.0366C363.1 294.7 377.1 272.7 396.2 256H320c0-25.73 17.56-31.61 32.31-32C369.8 223.8 384 209.6 384 192c0-17.67-14.31-32-32-32c-15.09 0-32.99 4.086-49.28 13.06C303.3 168.9 304 164.7 304 160.3v-16c0-1.684-.4238-3.248-.4961-4.912C313.2 133.9 320 123.9 320 112C320 103.2 312.8 96 304 96H292.7C274.6 58.26 236.3 32 191.7 32H128.3C83.68 32 45.44 58.26 27.33 96H16C7.164 96 0 103.2 0 112c0 11.93 6.816 21.93 16.5 27.43C16.42 141.1 16 142.7 16 144.3v16c0 19.56 5.926 37.71 16 52.86V256c0 123.7 100.3 224 224 224h160c123.9-1.166 224-101.1 224-226.2C639.9 156.9 567.8 76.96 474.4 64.12zM64 160.3v-16C64 108.9 92.86 80 128.3 80h63.32C227.1 80 256 108.9 256 144.3v16C256 186.6 234.6 208 208.3 208c-4.309 0-8.502-.8608-12.46-2.558L162.1 191.4c2.586-.3066 5.207-.543 7.598-1.631l8.314-3.777C186.9 182.3 192 174.9 192 166.7V160c0-6.723-5.996-12.17-13.39-12.17H141.4C133.1 147.8 128 153.3 128 160v6.701c0 8.15 5.068 15.6 13.09 19.25l8.314 3.777c2.391 1.088 5.012 1.324 7.598 1.631l-32.88 14.08C120.2 207.1 115.1 208 111.7 208C85.38 208 64 186.6 64 160.3z"/></svg>
        </div>
        </a>
      </div>
    </div>
                <div class="list-group list-group-flush mx-3 mt-4">
          <a href="/" class="flex h-10 flex-row items-center px-3 text-gray-100 bg-slate-800 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-slate-800 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            <span class="flex items-center justify-center text-lg">
              <svg fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor" class="h-6 w-6">
                <path d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
              </svg>
            </span>
            <span class="ml-3">Home</span>
          </a>

          <a href="/filmes" class="flex h-10 flex-row items-center px-3 text-gray-100 bg-slate-800 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-slate-800  dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            <span class="flex items-center justify-center text-lg">

            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M7 4v16M17 4v16M3 8h4m10 0h4M3 12h18M3 16h4m10 0h4M4 20h16a1 1 0 001-1V5a1 1 0 00-1-1H4a1 1 0 00-1 1v14a1 1 0 001 1z" />
      </svg>
            </span>
            <span class="ml-3">Filmes</span>
          </a>
          <a href="#" class="flex h-10 flex-row items-center px-3 text-gray-100 bg-slate-800 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-slate-800  dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            <span class="flex items-center justify-center text-lg">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
  <path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
</svg>
            </span>
            <span class="ml-3">Sessoes</span>
          </a>
          <a href="#" class="flex h-10 flex-row items-center px-3 text-gray-100 bg-slate-800 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-slate-800  dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            <span class="flex items-center justify-center text-lg">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
  <path d="M3 1a1 1 0 000 2h1.22l.305 1.222a.997.997 0 00.01.042l1.358 5.43-.893.892C3.74 11.846 4.632 14 6.414 14H15a1 1 0 000-2H6.414l1-1H14a1 1 0 00.894-.553l3-6A1 1 0 0017 3H6.28l-.31-1.243A1 1 0 005 1H3zM16 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0zM6.5 18a1.5 1.5 0 100-3 1.5 1.5 0 000 3z" />
</svg>
            </span>
            <span class="ml-3">Carrinho</span>
          </a>

                </div>
            </div>
        </nav>
        <!-- Sidebar -->

        <!-- Navbar -->
        <nav id="main-navbar" class="navbar navbar-expand-lg navbar-light bg-slate-800 fixed-top">
            <!-- Container wrapper -->
            <div class="container-fluid">
                <!-- Toggle button -->
                <button class="navbar-toggler" type="button" data-mdb-toggle="collapse" data-mdb-target="#sidebarMenu"
                    aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fas fa-bars"></i>
                </button>

                <!-- Brand -->
                <a class="navbar-brand" href="#" height="25">
    
                </a>
                <!-- Search form -->
                <form class="d-md-flex input-group w-auto my-auto"  method="GET" action="{{ route('filmes.index') }}" class="form-group"> 
                    @yield('selectbar')

                    <input autocomplete="off" type="search" class="text-sm text-gray-100 bg-gray-50 rounded-r-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder='Filme que pretende Procurar' style="min-width: 225px" />
                    <button type="submit"><span class="input-group-text border-0 bg-slate-800 text-gray-100"><i class="fas fa-search"></i></span></button>
                </form>
                <!-- Right links -->
                <ul class="navbar-nav ms-auto d-flex flex-row">
                    <!-- Notification dropdown -->
                        <a class="nav-link me-3 me-lg-0" href="#"
                            id="navbarDropdownMenuLink" role="button" data-mdb-toggle="dropdown" aria-expanded="false">
                            <i class="fa fa-shopping-cart text-white"></i>
                            
                            <span class="badge rounded-pill badge-notification bg-danger">1</span>
                        </a>

 




                
                    @guest
        <li class="my-px">
          <a href="{{ route('login') }}" class="flex h-10 flex-row items-center px-3 text-gray-100 bg-slate-800 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-slate-800  dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            <span class="flex items-center justify-center text-lg">

            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
            </span>
          
            <span class="ml-3">{{ __('Login') }}</span>
          </a>
        </li>
        @else
        
        <li class="my-px">
     


     <div class="header-content flex flex-row items-center">
     <div class="ml-auto flex">
       <a id="dropdownDefault"data-dropdown-toggle="dropdown" class="flex flex-row items-center ">
       <img src="{{ Auth::user()->foto_url ? asset('storage/fotos/' . Auth::user()->foto_url) : asset('img/default_img.png') }}" alt class="h-10 w-10 rounded-full border bg-gray-200" />
       <span class="ml-2 flex ">
       <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
         </span>
       </a>

       <!-- Dropdown menu -->
<div id="dropdown" class="z-10 hidden bg-slate-800 divide-y divide-gray-100 rounded shadow">
<div class="px-4 py-3 text-sm text-gray-100 dark:text-white">
      <div>{{ Auth::user()->name }}</div>
      <div class="font-medium truncate">{{ Auth::user()->email }}</div>
    </div>
    <ul class="px-4 py-6 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownLargeButton">
   
    @if (auth()->user()->tipo != 'O')
    <li>

<a href="#" style = "text-decoration:none"class="flex h-10 flex-row items-center px-3 text-gray-100 bg-slate-800 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-slate-800  dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
     <span class="flex items-center justify-center text-lg">
     <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
     </span>
     <span class="ml-3">Perfil</span>
   </a>

</li>
@endif
    <li class="my-px">

       <a href="#" style = "text-decoration:none"class="flex h-10 flex-row items-center px-3 text-gray-100 bg-slate-800 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-slate-800  dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            <span class="flex items-center justify-center text-lg">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
            </span>
            <span class="ml-3">Settings</span>
          </a>

      </li>
      <li class="my-px">
      <a href="#" data-toggle="modal" style = "text-decoration:none"class="flex h-10 flex-row items-center px-3 text-gray-100 bg-slate-800 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-slate-800  dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" data-target="#logoutModal">
            <span class="flex items-center justify-center text-lg" >
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path></svg>            </span>
            <span class="ml-3">Logout</span>
          </a>
      </li>

    </ul>

</div>
     </div>
   </div>
 </li>
 @endguest
                </ul>
            </div>
            <!-- Container wrapper -->
        </nav>
        <!-- Navbar -->
    </header>
    <!--Main Navigation-->

                        <!-- Page Heading -->

    <!--Main layout-->
    <main style="margin-top: 58px">
        <div class="container pt-4">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
    </div>  
            @yield('content')

            <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Logout</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body text-center">
              
                <h5 class="text-black" id="exampleModalLabel">Pretende sair?</h5>

                <br>

<div class="flex items-center justify-center">
                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" style = "text-decoration:none"class="flex h-10 flex-row items-center px-3 text-white bg-green-500 hover:bg-black transition ease-out duration-500">
            <span class="flex items-center justify-center text-lg">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>  <path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
</svg>
            </span>
            <span class="ml-3 ">Sim</span>
          </a>

                    <a  type="button" data-dismiss="modal" style = "text-decoration:none"class="flex h-10 flex-row items-center px-3 text-white bg-red-500 hover:bg-black transition ease-out duration-500">
            <span class="flex items-center justify-center text-lg">
            <svg class="w-6 h-6 flex items-center justify-center text-lg" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
            </span>
            <span class="ml-3 ">Nao</span>
          </a>

            </div>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                    </div>
            </div>
        </div>

        <!-- Bootstrap core JavaScript-->
        <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
        <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

        <!-- Core plugin JavaScript-->
        <script src="{{ asset('vendor/jquery-easing/jquery.easing.min.js') }}"></script>

        <!-- Custom scripts for all pages-->
        <script src="{{ asset('js/sb-admin-2.min.js') }}"></script>
        </div>
    </main>
</body>

</html>
