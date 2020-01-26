const editor = document.querySelector('#editor');
editor.contentEditable = true;

function format(string) {
    document.execCommand(string, false, null);
}

function colorize() {
    document.execCommand('foreColor', false, prompt('Color in hex', '#'))
}

function standOut() {
    document.execCommand('backColor', false, 'yellow')
}

function insertImg() {
    document.execCommand('insertImage', false, prompt('URL'))
}

const owo = document.querySelector('#owo');
const publishBtn = document.querySelector('#publish');

publishBtn.addEventListener('click', () => {
    if (editor.innerHTML === '') {
        return;
    }

    const div = document.createElement('div');
    div.classList.add('text');

    div.innerHTML = editor.innerHTML;
    editor.innerHTML = '';
    owo.append(div);
});