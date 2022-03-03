@auth

<div class="it-dashboard">
   <ul>
      <li class="it-dashboard-item">
          <a href="{{ route('admin.edit') }}"><span>Edit Profile</span></a>
      </li>
      <li class="it-dashboard-item">
          <a href="{{ route('admin.show') }}"><span>Show Profile</span></a>
      </li>
      <li class="it-dashboard-item">
          <a href="{{ route('admin.message') }}"><span>My Messages</span></a>
      </li>
      <li class="it-dashboard-item">
          <a href="{{ route('admin.review') }}"><span>My Reviews</span></a>
      </li>
      {{-- <li class="it-dashboard-item">
          <a href="{{ route('admin.statistic') }}"><span>Statistics</span></a>
      </li>
      <li class="it-dashboard-item">
          <a href="{{ route('chartjs.index') }}"><span>Chartjs</span></a>
      </li> --}}
      <li class="it-dashboard-item">
          <form onsubmit="return confirm(`Confermi l'eliminazione del profilo?`)"
          action="{{ route('admin.destroy')}}" method="POST">
              @csrf
              @method('DELETE')

              <button type="submit" class="btn text-light">DELETE PROFILE</button>
          </form>
      </li>
  </ul>
</div>

@endauth