document.querySelectorAll('.select-btn').forEach(button => {
    button.addEventListener('click', () => {
        const selectContent = button.nextElementSibling;
        const icon = button.querySelector('i');
        selectContent.classList.toggle('show');
        icon.classList.toggle('rotate');
    });
});


document.querySelectorAll('.select-option ul.options li').forEach(item => {
    item.addEventListener('click', () => {
        const value = item.getAttribute('data-value');
        const select = item.closest('.select-option').querySelector('select');
        const option = select.querySelector(`option[value="${value}"]`);
        if (option) {
            option.selected = !option.selected;
            item.classList.toggle('selected', option.selected);
        }
    });
});
