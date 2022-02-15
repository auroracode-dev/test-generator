<?php
require_once('./config/Database.php');
session_start();

if (isset($_SESSION['user_id'])) {
    $redirect = $_SESSION['user_type'] == 'teacher' ? 'admin' : 'student_view.php';
    header('Location: /'.$redirect);
} 
if(isset($_POST['email'])){
    $database = new Database();
    $db = $database->connect();

    $email = $_POST['email'];
    $password = $_POST['password'];

    $result = $db->query("SELECT id, fullname, grade_id, user_type FROM users WHERE email='$email' AND password='$password'");

    if($result->num_rows > 0){
        $user = $result->fetch_assoc();
        $user_type = $database->getUserType($user['user_type']);
        
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['fullname'] = $user['fullname'];
        $_SESSION['user_type'] = $user_type;

        if($user_type == 'teacher') {
            header('Location: /admin');
        }
        
        $_SESSION['grade_id'] = $user['grade_id'];
        header('Location: /student_view.php');
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
