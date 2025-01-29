// published.js
function toggleFilters() {
    const filtersPanel = document.getElementById('filtersPanel');
    filtersPanel.classList.toggle('active');
}

// Handle article assignment
document.querySelectorAll('.assign-btn').forEach(button => {
    button.addEventListener('click', function() {
        const articleCard = this.closest('.article-card');
        const magazineNumber = articleCard.querySelector('.magazine-number').value;
        const visibility = articleCard.querySelector('input[name^="visibility"]:checked').value;
        
        if (!magazineNumber) {
            alert('Veuillez entrer un numéro de magazine');
            return;
        }

        // Here you would typically make an API call to assign the article
        const status = articleCard.querySelector('.status');
        status.textContent = `Magazine #${magazineNumber}`;
        status.classList.remove('unassigned');
        status.classList.add('assigned');
        
        // Update the article card appearance
        articleCard.classList.add('assigned');
        const assignmentForm = articleCard.querySelector('.assignment-form');
        assignmentForm.style.display = 'none';
        
        // Add visibility badge and modify button
        const magazineAssignment = articleCard.querySelector('.magazine-assignment');
        magazineAssignment.innerHTML = `
            <div class="visibility-badge ${visibility}">${visibility === 'public' ? 'Public' : 'Privé'}</div>
            <button class="modify-btn">Modifier</button>
        `;

        // Add event listener to new modify button
        const modifyBtn = magazineAssignment.querySelector('.modify-btn');
        modifyBtn.addEventListener('click', function() {
            articleCard.classList.remove('assigned');
            magazineAssignment.innerHTML = assignmentForm.outerHTML;
            status.textContent = 'Non assigné';
            status.classList.remove('assigned');
            status.classList.add('unassigned');
        });
    });
});

// Handle filters
document.getElementById('statusFilter').addEventListener('change', filterArticles);

function filterArticles() {
    const statusFilter = document.getElementById('statusFilter').value;
    
    document.querySelectorAll('.article-card').forEach(card => {
        let showCard = true;
        
        // Status filtering
        if (statusFilter !== 'all') {
            const isAssigned = card.classList.contains('assigned');
            if (statusFilter === 'assigned' && !isAssigned) showCard = false;
            if (statusFilter === 'unassigned' && isAssigned) showCard = false;
        }
        
        card.style.display = showCard ? 'flex' : 'none';
    });
}