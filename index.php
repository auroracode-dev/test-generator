<?php
require('./config/Database.php');

if(isset($_POST['username'])){
    $db = (new Database)->connect();
    $username = $_POST['username'];
    $password = $_POST['password'];

    $result = $db->query("SELECT user_type FROM users WHERE username='$username' AND password='$password'");

    if($result->num_rows > 0){
        $value = $result->fetch_array();
        $result = $db->query("SELECT type FROM user_types WHERE id='$value[0]'");
        header('Location: /admin');
    }  
 
}

include('./template/header.php'); ?>

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
        <a href="/register.php" class="text-white mt-2 text-center">Registrarme</a>
    </div>
</form>

<?php include('./template/footer.php'); ?>
