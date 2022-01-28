<?php include('./template/header.php'); ?>

<form method="post" class="card w-75 mt-4 mx-auto">
    <div class="card-header d-flex align-items-center justify-content-between">
        <p class="fs-3 mb-0">Añadir una nueva pregunta</p>
        
        <button class="btn btn-lg btn-primary" type="submit">Crear pregunta</button>
    </div>
    <div class="card-body">
        <div class="form-group">
            <label for="question" class="form-label fw-bold fs-5">Escriba la pregunta</label>
            <textarea name="question" id="question" rows="5" class="form-control"></textarea>
        </div>

        <div class="form-group mt-2">
            <label for="answer_a" class="form-label fw-bold fs-6">Respuesta A:</label>
            <textarea name="answer_a" id="answer_a" rows="5" class="form-control"></textarea>
        </div>

        <div class="form-group mt-2">
            <label for="answer_b" class="form-label fw-bold fs-6">Respuesta B:</label>
            <textarea name="answer_b" id="answer_b" rows="5" class="form-control"></textarea>
        </div>

        <div class="form-group mt-2">
            <label for="answer_c" class="form-label fw-bold fs-6">Respuesta C:</label>
            <textarea name="answer_c" id="answer_c" rows="5" class="form-control"></textarea>
        </div>

        <div class="form-group mt-2">
            <label for="answer_d" class="form-label fw-bold fs-6">Respuesta D:</label>
            <textarea name="answer_d" id="answer_d" rows="5" class="form-control"></textarea>
        </div>
    </div>
</form>

<?php include('./template/footer.php'); ?>
