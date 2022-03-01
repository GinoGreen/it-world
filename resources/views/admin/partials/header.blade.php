<header>
   <nav class="navbar navbar-expand-md navbar-dark bg-dark shadow-sm">
       <div class="container-fluid justify-content-between">
           <div>
               <a class="navbar-brand" href="{{ route('home') }}">
                   {{ config('app.name', 'Laravel') }}
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
                   </a>
                   <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                       @csrf
                   </form>
               @endauth
               @guest
               <a class="navbar-brand" href="{{ route('login') }}">
                   Login
               </a>
               <a class="navbar-brand" href="{{ route('register') }}">
                   Register
               </a>
               @endguest
           </div>
       </div>
   </nav>
</header>