<?php
require('./config/Database.php');

if(isset($_POST['username'])){
    $db = (new Database)->connect();
    $username = $_POST['username'];
    $password = $_POST['password'];

    $result = $db->query("SELECT id FROM users WHERE username='$username' AND password='$password'");

    if($result->num_rows > 0){
        header('Location: /admin');
    }  
 
}

include('./template/header.php'); ?>

<!-- Modal -->
<div class="modal fade" id="modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <form action="/take.php" method="GET" class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Ingresar al examen</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
              <div class="form-group">
                  <label for="testId" class="form-label fs-6">Ingrese el codigo del examen</label>
                  <input class="form-control" type="number" name="test_id" id="testId"/>
              </div>
          </div>
          <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="submit" type="button" class="btn btn-primary">Presentar</button>
          </div>
      </form>
    </div>
</div>

<!-- Login form -->
<form method="POST" class="card w-25 mx-auto my-5">
    <div class="card-header fs-2 text-center">Login</div>
    <div class="card-body d-flex flex-column">
        <div class="mb-3">
            <label for="username" class="form-label">Nombre de usuario</label>
            <input name="username" type="text" class="form-control" id="username" placeholder="name@example.com">
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Contraseña</label>
            <input type="password" name="password" id="password" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary">Ingresar</button>

        <button type="button" data-bs-toggle="modal" data-bs-target="#modal" class="w-75 mt-2 mx-auto border-0 text-decoration-underline bg-transparent text-white">Presentar evaluación</button>
    </div>
</form>

<?php include('./template/footer.php'); ?>
