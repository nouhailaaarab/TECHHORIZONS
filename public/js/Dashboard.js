
function toggleSidebar() {
    const sidebar = document.getElementById('sidebar');
    sidebar.classList.toggle('collapsed');

    if (window.innerWidth <= 768) {
        sidebar.classList.toggle('expanded');
    }
}

// Handle active nav items
const navItems = document.querySelectorAll('.nav-item');
navItems.forEach(item => {
    item.addEventListener('click', () => {
        navItems.forEach(nav => nav.classList.remove('active'));
        item.classList.add('active');
    });
});


//profile

// Add these functions to your existing Dashboard.js

function toggleEdit(fieldId) {
    const input = document.getElementById(fieldId);
    input.readOnly = !input.readOnly;

    if (!input.readOnly) {
        input.focus();
        if (fieldId === 'password') {
            input.type = 'text';
            input.value = ''; // Clear the asterisks
        }
    } else {
        if (fieldId === 'password' && input.value) {
            input.type = 'password';
        }
    }
}

// Handle avatar upload
document.getElementById('avatar-upload').addEventListener('change', function(e) {
    const file = e.target.files[0];
    if (file) {
        const reader = new FileReader();
        reader.onload = function(e) {
            document.getElementById('avatar-preview').src = e.target.result;
        };
        reader.readAsDataURL(file);
    }
});
