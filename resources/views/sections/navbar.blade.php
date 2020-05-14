<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">

  <i class="fas fa-tools"></i>
  <a class="navbar-brand" href="/home">
    <img src="/images/ui/servicesapp-icon.png" alt="ServiceApp Logo" style="height:32px; display:inline" />
    <strong>{{config('app.name','ServiceAPP')}}</strong>
    {{-- <a href="/home"><h5>{{config('app.name','ServiceAPP')}}</h5></a> --}}
    
  </a>

  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">

     

    <ul class="navbar-nav mr-auto">

         {{-- KLIJENTI --}}
      <li class="my-btn-blue nav-item dropdown btn btn-primary {{Request::is('clients*') ? 'my-btn-blue-active':''}}">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <strong>Klijenti</strong> 
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="/clients">Lista</a>
          <a class="dropdown-item" href="/clients/search">Pretraga</a>
          <a class="dropdown-item" href="/clients/create">Unos</a>                    
        </div>
      </li>

        
         {{-- UREDJAJI --}}
         <li class="my-btn-blue nav-item dropdown btn btn-primary">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <strong>Uređaji</strong> 
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="#">Pretraga</a>
            <a class="dropdown-item" href="#">Unos</a>                    
          </div>
        </li>
       

        
         {{-- RADNI NALOZI --}}
      <li class="my-btn-blue nav-item dropdown btn btn-outline-primary">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <strong>Radni nalozi</strong> 
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#">Pretraga</a>
          <a class="dropdown-item" href="#">Unos</a>         
          <a class="dropdown-item" href="#">Obrada</a>            
        </div>
      </li>

         {{-- BLAGAJNA --}}
         <li class="my-btn-blue nav-item dropdown btn btn-outline-primary">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <strong>Blagajna</strong>
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="#">Naplata</a>
            <a class="dropdown-item" href="#">Stanje</a>                    
          </div>
        </li>


        {{-- MAGACIN --}}
        @if(Auth::user()->hasRole('administrator'))
        <li class="my-btn-orange nav-item dropdown btn btn-outline-warning">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <strong>Magacin</strong>
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="#">Pretraga artikala</a>
            <a class="dropdown-item" href="#">Unos artikla</a>                    
          </div>
        </li>
        @endif

         {{-- ADMINISTRACIJA --}}
         @if(Auth::user()->hasRole('administrator'))
         <li class="my-btn-orange nav-item dropdown btn btn-primary {{Request::is('users*') ? 'my-btn-orange-active':''}}">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <strong>Administracija</strong>
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="/users">Lista korisnika</a>
            <a class="dropdown-item" href="#">Unos korisnika</a>    
            <a class="dropdown-item" href="#">Cena radnog sata</a>                  
          </div>
        </li>
        @endif

        @if(Auth::user()->hasRole('administrator'))
      <li class="my-btn-orange nav-item  btn btn-outline-warning">
        <a class="nav-link" href="#" tabindex="-1" aria-disabled="true"><strong>Izveštaji</strong></a>
      </li>
      @endif
    </ul>
    


    <!-- SEARCH -->
    {{-- <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form> --}}


  <!-- Right Side Of Navbar -->
  <ul class="navbar-nav ml-auto">
    <!-- Authentication Links -->
    @guest
        <li class="nav-item">
            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
        </li>
        @if (Route::has('register'))
            <li class="nav-item">
                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
            </li>
        @endif
    @else
        <li class="nav-item dropdown">
            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                {{ Auth::user()->name }} <span class="caret"></span>
            </a>

            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="{{ route('logout') }}"
                   onclick="event.preventDefault();
                                 document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </div>
        </li>
    @endguest
</ul>


  </div>
</nav>