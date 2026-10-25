// Event delegation also handles widgets inserted by backend AJAX requests.
document.addEventListener('click', function (event) {
    const button = event.target.closest('.tl_textwizard button[data-command]');

    if (!button) {
        return;
    }

    const row = button.closest('li');
    const list = row.parentElement;
    const command = button.dataset.command;

    if (command === 'delete') {
        if (list.children.length > 1) {
            row.remove();
        }

        return;
    }

    if (command !== 'copy' && command !== 'new') {
        return;
    }

    const clone = row.cloneNode(true);
    const input = clone.querySelector('input');
    input.value = command === 'copy' ? row.querySelector('input').value : '';
    row.after(clone);
    input.focus();
    input.select();
});
