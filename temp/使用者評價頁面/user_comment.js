document.querySelectorAll('.slider').forEach(slider => {
    const valueSpan = slider.parentNode.parentNode.nextElementSibling;
    
    function updateValue(value) {
        // 除以 10 並保留一位小數
        const formattedValue = (value / 10).toFixed(1);
        valueSpan.textContent = formattedValue;
    }

    function updateSliderBackground(value) {
        const percentage = ((value - slider.min) / (slider.max - slider.min)) * 100;
        slider.style.background = `linear-gradient(to right, #FFC619 ${percentage}%, #D9D9D9 ${percentage}%)`;
    }

    slider.addEventListener('input', function() {
        updateValue(this.value);
        updateSliderBackground(this.value);
    });

    // Initialize the slider value and background on page load
    updateValue(slider.value);
    updateSliderBackground(slider.value);
});




const fileInputs = document.querySelectorAll('input[type="file"]');
const resetButton = document.querySelector('.reset');

fileInputs.forEach(input => {
    input.addEventListener('change', () => {
        if (input.files && input.files[0]) {
            const img = document.querySelector(`#img${input.id.slice(-1)}`);
            img.src = URL.createObjectURL(input.files[0]);
        }
    });
});

resetButton.addEventListener('click', () => {
    const images = document.querySelectorAll('.pic img');
    images.forEach(img => {
        img.src = './SB_image/default.jpg';
    });
});


