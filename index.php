<?php
require('./config/Database.php');

if(isset($_POST['email'])){
    $database = new Database();
    $db = $database->connect();
    $email = $_POST['email'];
    $password = $_POST['password'];

    $result = $db->query("SELECT user_type FROM users WHERE email='$email' AND password='$password'");

    if($result->num_rows > 0){
        $user_type = $result->fetch_array();
        $user_type = $database->getUserType($user_type[0]);
        echo "Hello";
        
        switch ($user_type) {
            case 'teacher':
                header('Location: /admin');
                break;    
            case 'student':
                header('Location: /student_view.php');
                break;
        }
    }  
 
}

include('./template/header.php'); ?>

<!-- Login form -->
<form method="POST" class="card w-25 mx-auto my-5">
    <div class="card-header fs-2 text-center">Login</div>
    <div class="card-body d-flex flex-column">
        <div class="mb-3">
            <label for="email" class="form-label">Correo</label>
            <input name="email" type="text" class="form-control" id="email" placeholder="name@example.com">
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
