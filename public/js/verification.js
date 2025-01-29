// verification.js

// magazine-privacy.js
// Handle privacy settings
document.querySelectorAll('.save-privacy-btn').forEach(button => {
    button.addEventListener('click', function() {
        const card = this.closest('.magazine-card');
        const select = card.querySelector('.privacy-select');
        const magazineTitle = card.querySelector('h3').textContent;

        // Here you would typically make an API call to update the privacy setting
        this.textContent = 'Sauvegardé!';
        this.classList.add('saved');

        setTimeout(() => {
            this.textContent = 'Enregistrer';
            this.classList.remove('saved');
        }, 2000);
    });
});

// Handle visibility filtering
document.getElementById('visibilityFilter').addEventListener('change', function() {
    const filterValue = this.value;

    document.querySelectorAll('.magazine-card').forEach(card => {
        const privacySelect = card.querySelector('.privacy-select');
        const currentVisibility = privacySelect.value;

        if (filterValue === 'all' || filterValue === currentVisibility) {
            card.style.display = 'block';
        } else {
            card.style.display = 'none';
        }
    });
});
