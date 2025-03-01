<script>
    let category_select = document.getElementById('category_select');
    let cover_form = document.getElementById('cover_form');

    let article_btn = document.getElementById('article_btn');

    const quill = new Quill('#text_editor', {
        modules: {
            syntax: true,
            toolbar: '#toolbar-container',
        },
        placeholder: 'Что-нибудь...',
        theme: 'snow',
    });

    if (category_select) {
        category_select.addEventListener('change', function(event) {
            let text = event.target.options[event.target.selectedIndex].textContent.trim();
            if (text == 'Перевод') {
                cover_form.style.display = 'block';
            } else {
                cover_form.style.display = 'none';
            }
        });
    }

    article_btn.addEventListener('click', function() {
        let form_data = new FormData(document.getElementById('article_form'));
        let content = quill.root.innerHTML;
        form_data.append('content', content);

        let what_to_do = this.getAttribute('data-what-to-do');
        let url = window.location.href;
        if (what_to_do == 'edit') {
            url = url.replace('/edit', '');
        }

        fetch(url, {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
            },
            body: form_data
        }).then(response => {
            return response.json();
        }).then(data => {
            if (what_to_do == 'edit') {
                showNotification('Статья сохранена');
            } else {
                window.location.href = data.href;
            }
        }).catch(err => {

        });
    });
</script>
