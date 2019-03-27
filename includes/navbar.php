<nav class="navbar navbar-expand-md navbar-light bg-light">
  <div class="container">
    <a href="#" class="navbar-brand">E 'n' C</a>
    <button
      class="navbar-toggler"
      type="button"
      data-toggle="collapse"
      data-target="#navbarContent"
      aria-controls="navbarContent"
      aria-expanded="false"
      aria-label="Toggle navigation"
    >
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item">
          <a class="nav-link" href="#">HOME</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">PLANS</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">PROFILE</a>
        </li>
      </ul>
      <ul class="navbar-nav">
        <li class="nav-item my-2 my-md-0">
          <a href="#" class="nav-link" onclick="profile(<?=$userDetails['id'];?>)">
            Signed In as
            <?=$userDetails['username'];?>
          </a>
        </li>
      </ul>
    </div>
  </div>
</nav>
