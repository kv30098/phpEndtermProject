document.querySelectorAll('.select-btn').forEach(button => {
    button.addEventListener('click', () => {
        const selectContent = button.nextElementSibling;
        const icon = button.querySelector('i');
        selectContent.classList.toggle('show');
        icon.classList.toggle('rotate');
    });
});

document.querySelectorAll('.slider').forEach(slider => {
    const labels = slider.parentNode.querySelectorAll('.slider-label');

    function updateLabels(value) {
        labels.forEach((label, index) => {
            if (index < value) {
                label.classList.add('active');
            } else {
                label.classList.remove('active');
            }
        });

        const percentage = ((value - 1) / (slider.max - slider.min)) * 100;
        slider.style.background = `linear-gradient(to right, #FFC619 ${percentage}%, #D9D9D9 ${percentage}%)`;
    }

    slider.addEventListener('input', function() {
        updateLabels(this.value);
    });

    // Initialize the slider labels and background on page load
    updateLabels(slider.value);
});



