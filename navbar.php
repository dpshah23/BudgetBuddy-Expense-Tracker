<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">Logo</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Income Dashboard</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Help</a>
      </li>

    </ul>
   
    <h5>Hello , <?php echo "$name"; ?></h5>
    <form action='logout.php' class="form-inline my-2 my-lg-0">
    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Logout</button>

    </form>
  </div>
</nav>