<?php
require_once('../middlewares/auth.php');

include('./template/header.php');
?>

<form method="post" action="handler_question.php?title=<?= $_GET['title'] ?>" class="card w-75 mt-4 mx-auto">
    <div class="card-header d-flex align-items-center justify-content-between">
        <p class="fs-3 mb-0">Añadir una nueva pregunta</p>
        <button class="btn btn-lg btn-primary" type="submit">Crear pregunta</button>
    </div>

    <!-- Send test_id -->
    <input type="hidden" name="test_id" value="<?= $_GET['test_id'] ?>">

    <div class="card-body">
        <div class="form-group">
            <label for="question" class="form-label fw-bold fs-5">Escriba la pregunta</label>
            <div class="text-white" id="editor"></div>
            <textarea name="question" id="question" class="form-control" hidden></textarea>
        </div>

        <div class="form-group mt-2">
            <label for="correct" class="form-label fw-bold fs-6">Respuesta correcta</label>
            <select name="correct" id="correct" class="form-select">
                <option value="a">A</option>
                <option value="b">B</option>
                <option value="c">C</option>
                <option value="d">D</option>
            </select>
        </div>

        <div class="form-group mt-2">
            <label for="answer_a" class="form-label fw-bold fs-6">Respuesta A:</label>
            <div id="qlEditorA"></div>
            <textarea name="answer_a" id="answer_a" rows="5" class="form-control" hidden></textarea>
        </div>

        <div class="form-group mt-2">
            <label for="answer_b" class="form-label fw-bold fs-6">Respuesta B:</label>
            <div id="qlEditorB"></div>
            <textarea name="answer_b" id="answer_b" rows="5" class="form-control" hidden></textarea>
        </div>

        <div class="form-group mt-2">
            <label for="answer_c" class="form-label fw-bold fs-6">Respuesta C:</label>
            <div id="qlEditorC"></div>
            <textarea name="answer_c" id="answer_c" rows="5" class="form-control" hidden></textarea>
        </div>

        <div class="form-group mt-2">
            <label for="answer_d" class="form-label fw-bold fs-6">Respuesta D:</label>
            <div id="qlEditorD"></div>
            <textarea name="answer_d" id="answer_d" rows="5" class="form-control" hidden></textarea>
        </div>
    </div>
</form>

<!-- Include the Quill library -->
<script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
<script src="./js/handlerQuill.js"></script>

<?php include('./template/footer.php'); ?>