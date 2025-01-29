

// Populate selects with current values
document.querySelectorAll('.manager-select').forEach(select => {
    const currentManager = select.closest('.theme-section')
        .querySelector('.current-manager span').textContent;
    
    Array.from(select.options).forEach(option => {
        if (option.text === currentManager) {
            option.selected = true;
        }
    });
});