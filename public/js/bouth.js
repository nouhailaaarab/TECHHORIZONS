// create-article.js
document.addEventListener('DOMContentLoaded', () => {
    const articleForm = document.getElementById('articleForm');
    const thumbnailInput = document.getElementById('articleThumbnail');
    const thumbnailPreview = document.getElementById('thumbnailPreview');
    const tagsInput = document.getElementById('articleTags');
    const tagsPreview = document.querySelector('.tags-preview');
    const editorButtons = document.querySelectorAll('.editor-toolbar button');

    // Handle image preview
    thumbnailInput.addEventListener('change', (e) => {
        const file = e.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = (e) => {
                thumbnailPreview.style.backgroundImage = `url(${e.target.result})`;
            };
            reader.readAsDataURL(file);
        }
    });

    // Handle tags input
    tagsInput.addEventListener('input', (e) => {
        const tags = e.target.value.split(',')
            .map(tag => tag.trim())
            .filter(tag => tag !== '');

        tagsPreview.innerHTML = tags.map(tag =>
            `<span class="tag">${tag}</span>`
        ).join('');
    });

    // Handle editor toolbar
    editorButtons.forEach(button => {
        button.addEventListener('click', () => {
            const format = button.dataset.format;
            const textarea = document.getElementById('articleContent');
            const selection = {
                start: textarea.selectionStart,
                end: textarea.selectionEnd,
                text: textarea.value.substring(textarea.selectionStart, textarea.selectionEnd)
            };

            let replacement = '';
            switch(format) {
                case 'bold':
                    replacement = `**${selection.text}**`;
                    break;
                case 'italic':
                    replacement = `*${selection.text}*`;
                    break;
                case 'underline':
                    replacement = `_${selection.text}_`;
                    break;
                case 'h2':
                    replacement = `## ${selection.text}`;
                    break;
                case 'h3':
                    replacement = `### ${selection.text}`;
                    break;
                case 'quote':
                    replacement = `> ${selection.text}`;
                    break;
                case 'link':
                    const url = prompt('Enter URL:');
                    if (url) {
                        replacement = `[${selection.text}](${url})`;
                    }
                    break;
            }

            if (replacement) {
                textarea.value = textarea.value.substring(0, selection.start) +
                               replacement +
                               textarea.value.substring(selection.end);
            }
        });
    });

    // Handle form submission
    articleForm.addEventListener('submit', (e) => {
        e.preventDefault();
        // Add your form submission logic here
        console.log('Article submitted');
    });
});

// categories.js
document.addEventListener('DOMContentLoaded', () => {
    const searchInput = document.getElementById('categorySearch');
    const followButtons = document.querySelectorAll('.follow-btn');
    const removeTags = document.querySelectorAll('.remove-tag');});
