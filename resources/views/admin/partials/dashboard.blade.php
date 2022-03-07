

<div class="it-dashboard">

   {{-- menu --}}
   <ul>

      {{-- edit --}}
      <li class="it-dashboard-item 
      {{ (Route::currentRouteName() === 'admin.edit') ? 'active' : '' }}
      ">
         <i class="fa fa-pencil" aria-hidden="true"></i>
         <a href="{{ route('admin.edit') }}"><span>Edit Profile</span></a>
      </li>

      {{-- show --}}
      <li class="it-dashboard-item
      {{ (Route::currentRouteName() === 'admin.show') ? 'active' : '' }}
      ">
         <i class="fa fa-user" aria-hidden="true"></i>
         <a href="{{ route('admin.show') }}"><span>Show Profile</span></a>
      </li>

      {{-- messages --}}
      <li class="it-dashboard-item
      {{ (Route::currentRouteName() === 'admin.message') ? 'active' : '' }}
      ">
         <i class="fa fa-comments" aria-hidden="true"></i>
         <a href="{{ route('admin.message') }}"><span>My Messages</span></a>
      </li>

      {{-- reviews --}}
      <li class="it-dashboard-item
      {{ (Route::currentRouteName() === 'admin.review') ? 'active' : '' }}
      ">
         <i class="fa fa-star" aria-hidden="true"></i>
         <a href="{{ route('admin.review') }}"><span>My Reviews</span></a>
      </li>

      {{-- <li class="it-dashboard-item">
         <a href="{{ route('admin.statistic') }}"><span>Statistics</span></a>
      </li>
      <li class="it-dashboard-item">
         <a href="{{ route('chartjs.index') }}"><span>Chartjs</span></a>
      </li> --}}

    </ul>
    {{-- /menu --}}

    {{-- buttons --}}
    <div class="dashboard-buttons-box">

      {{-- DELETE PROFILE --}}
       <div class="it-delete-profile">
         <form onsubmit="return confirm(`Confermi l'eliminazione del profilo?`)"
         action="{{ route('admin.destroy')}}" method="POST">
            @csrf
            @method('DELETE')
            
            <button type="submit" class="btn text-light">
               <i class="fa fa-trash" aria-hidden="true"></i>
               DELETE PROFILE
            </button>
         </form>
       </div>
      
    </div>
</div>