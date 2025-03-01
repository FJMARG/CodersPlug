<header>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="/index">
      <img src="assets/img/title.png" width="150" height="auto" alt="">
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item actived">
          <a class="nav-link blanco" href="/index">Home<span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link blanco" href="/preguntas">Question</a>
        </li>
        <li class="nav-item">
          <a class="nav-link blanco" href="/contact">Contact</a>
        </li>
        <li class="nav-item">
          <a class="nav-link blanco" href="/register">Register</a>
        </li>      
      </ul>
      <div class="btn-group">
        <button type="button" class="btn btn-secondary dropdown-toggle fuente" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          ¿Ya tenes cuenta? <p>inicia sesion</p>
        </button>
        <div class="dropdown-menu fuente">
          <form class="px-4 py-3" action="/login" method="POST">
            <div class="form-group"> 
              <input type="email" class="form-control" name="email" id="email" placeholder="Ingresa tu email" required>
            </div>
            <div class="form-group">
              <input type="password" class="form-control" name="password" id="password" placeholder="Ingresa tu password" required>
            </div>
            <div class="form-group">
              <div class="form-check">
                <input type="checkbox" class="form-check-input" id="dropdownCheck" name="recordar">
                <label class="form-check-label" for="dropdownCheck">
                  Recordar usuario
                </label>
              </div>
            </div>
            <input type="submit" class="btn btn-primary" value="Entrar">
          </form>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="/index">Olvide mi password</a>
        </div>
      </div>

    </div>
  </nav>
</header>