// loginregister.js
document.addEventListener('DOMContentLoaded', () => {
    // DOM Elements
    const tabs = document.querySelectorAll('.auth-tab');
    const forms = document.querySelectorAll('.auth-form');
    const loginForm = document.getElementById('login-form');
    const registerForm = document.getElementById('register-form');
    const authForms = document.querySelector('.auth-forms');

    // Validation helpers
    const validators = {
        email: (value) => /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(value),
        password: (value) => value.length >= 6,
        name: (value) => value.trim().length > 0,
        confirmPassword: (value, password) => value === password
    };

    // Error handling
    const handleError = {
        show: (input, message) => {
            const errorSpan = input.nextElementSibling;
            errorSpan.style.display = 'block';
            errorSpan.textContent = message;
            input.style.borderColor = 'red';
        },
        hide: (input) => {
            const errorSpan = input.nextElementSibling;
            errorSpan.style.display = 'none';
            input.style.borderColor = '#e1e1e1';
        }
    };

    // Calculate and set form container height
    const updateFormHeight = (targetForm) => {
        // Get the actual height of the target form
        const formHeight = targetForm.scrollHeight;
        // Add some padding to ensure everything fits
        const heightWithPadding = formHeight + 40;
        // Apply the height with a smooth transition
        authForms.style.height = `${heightWithPadding}px`;
    };

    // Tab switching with dynamic height
    const handleTabSwitch = (targetTab) => {
        // Update active tab
        tabs.forEach(tab => {
            tab.classList.toggle('active', tab === targetTab);
        });

        const targetForm = targetTab.dataset.tab;
        // Find the form that needs to be shown
        const formToShow = document.getElementById(`${targetForm}-form`);

        // Handle form switching
        forms.forEach(form => {
            if (form === formToShow) {
                form.classList.add('active');
                // Update container height based on the form being shown
                updateFormHeight(form);
            } else {
                form.classList.remove('active');
            }
        });
    };

    // Initial height setup
    updateFormHeight(loginForm);

    // Event Listeners
    tabs.forEach(tab => {
        tab.addEventListener('click', () => handleTabSwitch(tab));
    });

    // Update height on window resize
    window.addEventListener('resize', () => {
        const activeForm = document.querySelector('.auth-form.active');
        if (activeForm) {
            updateFormHeight(activeForm);
        }
    });

   
});
