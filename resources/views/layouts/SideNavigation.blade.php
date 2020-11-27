<nav class="Side-Menu">
    <a href="/">
        <div class="Brand mx-auto mt-3"></div>
    </a>
    <ul class="Side-Ul text-center">
        <li  class="{{Request::path() === "teams"     ? 'active':''  }}" ><a href="/teams"><i class="fas fa-users"></i><p>Teams</p></a></li>
        <li  class="{{Request::path() === "assigment" ? 'active':''  }}" ><a href="/assignments"><i class="fas fa-file-alt"></i><p>Assigment</p></a></li>
        <li  class="{{Request::path() === "activity"  ? 'active':''  }}" ><a href=""><i class="fas fa-bell"></i><p>Activity</p></a></li>
        <li  class="{{Request::path() === "chat"      ? 'active':''  }}"><a href=""><i class="fas fa-comments"></i><p>Chat</p></a></li>
        <li  class="{{Request::path() === "profile"   ? 'active':''  }}" ><a href="/profile"><i class="fas fa-user-circle"></i><p>Profile</p></a></li>
    </ul>
    <p class="text-center" style="margin-top: 100px"><a href="#">Logout</a></p>
</nav>
