<header>
   <nav class="it-dashboard-header navbar navbar-expand-md">
       <div class="container-fluid justify-content-between">
           <div>
               <a class="navbar-brand" href="{{ route('home') }}">
                   <img class="it-logo" src="{{URL::asset('/img/logo.png')}}" alt="ItWorld">
               </a>
               @auth
                   <a class="navbar-brand" href="{{ route('admin.home') }}">
                       Dashboard
                   </a>
               @endauth
           </div>
           <div class="navbar-brand">
               @auth
                   <a class="navbar-brand" href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                       document.getElementById('logout-form').submit();"
                   >
                   Logout 
                   <i class="fa fa-sign-out" aria-hidden="true"></i>
                   </a>
                   <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                       @csrf
                   </form>
                   <a class="navbar-brand" href="{{ route('admin.premium') }}">
                       Premium 
                       <i class="fa fa-plus" aria-hidden="true"></i>

                   </a>
               @endauth
               @guest
               <a class="navbar-brand" href="{{ route('login') }}">
                   Login
                   <i class="fa fa-sign-in" aria-hidden="true"></i>
               </a>
               <a class="navbar-brand" href="{{ route('register') }}">
                   Register
                   <i class="fa fa-user-plus" aria-hidden="true"></i>
               </a>
               @endguest
           </div>
       </div>
   </nav>
   
</header>