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

// 添加點擊事件監聽器，當選項被選擇時觸發
document.querySelectorAll('.options li').forEach(option => {
    option.addEventListener('click', () => {
        // 切換選項的選中狀態
        option.classList.toggle('selected');
        
        // 獲取選項的數據值
        const value = option.getAttribute('data-value');
        
        // 根據數據值找到對應的 select 選項
        const selectOption1 = document.querySelector(`select[name="favorate[]"] option[value="${value}"]`);
        const selectOption2 = document.querySelector(`select[name="dislike[]"] option[value="${value}"]`);
        const selectOption3= document.querySelector(`select[name="prohibit[]"] option[value="${value}"]`);
        
        // 切換 select 選項的選中狀態
        if (selectOption1) {
            selectOption1.selected = !selectOption1.selected;
        }
        if (selectOption2) {
            selectOption2.selected = !selectOption2.selected;
        }
        if (selectOption3) {
            selectOption3.selected = !selectOption3.selected;
        }
    });
});

