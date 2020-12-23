<nav class="Side-Menu">
    <a href="/">
        <div class="Brand mx-auto mt-3"></div>
    </a>
    <ul class="Side-Ul text-center">
        <li  class="{{Request::path() === "teams"     ? 'active':''  }}" ><a href="/teams"><i class="fas fa-users"></i><p>Teams</p></a></li>
        <li  class="{{Request::path() === "assignments" ? 'active':''  }}" ><a href="{{ route('myAssignments.show') }}"><i class="fas fa-file-alt"></i><p>Assigment</p></a></li>
        <li  class="{{Request::path() === "activity"  ? 'active':''  }}" ><a href="{{ route('activity.main') }}"><i class="fas fa-bell"></i><p>Activity</p></a></li>
        <li  class="{{Request::path() === "chat"      ? 'active':''  }}"><a href=""><i class="fas fa-comments"></i><p>Chat</p></a></li>
        <li  class="{{Request::path() === "profile"   ? 'active':''  }}" ><a href="{{ route('profile.home', auth()->id()) }}"><i class="fas fa-user-circle"></i><p>Profile</p></a></li>
    </ul>


    <p class="text-center" style="margin-top: 100px">
        <a href="{{ route('logout') }}" onclick="event.preventDefault();
            document.getElementById('logout-form').submit();">
            Logout
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>
    </p>

</nav>
