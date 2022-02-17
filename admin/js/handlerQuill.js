var toolbarOptions = [
  ["bold", "italic", "underline", "strike"], // toggled buttons
  ["link", "image"],
  ["blockquote"],

  [{ list: "ordered" }, { list: "bullet" }],
  [{ script: "sub" }, { script: "super" }], // superscript/subscript

  [{ header: [1, 2, 3, 4, 5, 6, false] }],

  [{ align: [] }],

  ["clean"], // remove formatting button
];

//Initialize Quill editor
const quillQuestion = new Quill("#editor", {
  modules: {
    toolbar: toolbarOptions,
  },
  theme: "snow",
});

const quillResponseA = new Quill("#qlEditorA", {
  modules: {
    toolbar: toolbarOptions,
  },
  theme: "snow",
});

const quillResponseB = new Quill("#qlEditorB", {
  modules: {
    toolbar: toolbarOptions,
  },
  theme: "snow",
});

const quillResponseC = new Quill("#qlEditorC", {
  modules: {
    toolbar: toolbarOptions,
  },
  theme: "snow",
});

const quillResponseD = new Quill("#qlEditorD", {
  modules: {
    toolbar: toolbarOptions,
  },
  theme: "snow",
});


/** Handler Quill Content **/

//Selection inputs
const questionInput = document.getElementById('question');
const answerAInput = document.getElementById('answer_a');
const answerBInput = document.getElementById('answer_b');
const answerCInput = document.getElementById('answer_c');
const answerDInput = document.getElementById('answer_d');


quillQuestion.on('editor-change', () => {
  questionInput.value = quillQuestion.root.innerHTML;
});

quillResponseA.on('editor-change', () => {
  answerAInput.value = quillResponseA.root.innerHTML;
});

quillResponseB.on('editor-change', () => {
  answerBInput.value = quillResponseB .root.innerHTML;
});

quillResponseC.on('editor-change', () => {
  answerCInput.value = quillResponseC .root.innerHTML;
});

quillResponseD.on('editor-change', () => {
  answerDInput.value = quillResponseD.root.innerHTML;
});

