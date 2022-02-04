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

<!-- Login form -->
<form method="POST" class="card w-25 mx-auto my-5">
    <div class="card-header fs-2 text-center">Login</div>
    <div class="card-body d-flex flex-column">
        <div class="mb-3">
            <label for="fullname" class="form-label">Nombre completo</label>
            <input name="fullname" type="text" class="form-control" id="fullname" placeholder="Andres Felipe Rojas Gonzalez">
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input name="email" type="email" class="form-control" id="email" placeholder="name@example.com">
        </div>
        <div class="mb-3">
            <label for="grade" class="form-label">Grado</label>
            <select class="form-select" name="grade" id="grade">
                <option value="6">6</option>
                <option value="7">7</option>
                <option value="8">8</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Contraseña</label>
            <input type="password" name="password" id="password" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary">Registrarme</button>
        <a href="/" class="text-white mt-2 text-center">Ingresar</a>
    </div>
</form>

<?php include('./template/footer.php'); ?>
