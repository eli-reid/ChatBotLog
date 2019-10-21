<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="#"><?php echo $page_title?></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item" id="chat">
        <a class="nav-link" href="home">Chat Log<span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item" id="timeout">
        <a class="nav-link" href="chattimeout">Timeout Log</a>
      </li>
      <li class="nav-item" id="ban">
        <a class="nav-link" href="chatban">Ban Log</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Search
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="chattimout">Chat log</a>
          <a class="dropdown-item" href="chatban">Ban Log</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Something else here</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link " href="../user/logout">Logout</a>
      </li>
    </ul>
  </div>
</nav>
