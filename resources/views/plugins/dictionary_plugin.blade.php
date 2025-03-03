<script>
    document.addEventListener('DOMContentLoaded', () => {
        let create_new_word_btn = document.getElementById('create_new_word_btn');
        let add_word_btn = document.getElementById('add_word_btn');

        let dictionary_body = document.getElementById('dictionary_body');

        let modal_window = document.getElementById('dictionary_modal');
        let modal_window_label = document.getElementById('dictionary_modal_label');

        let word_input = document.getElementById('word_input');
        let definition_input = document.getElementById('definition_input');

        function changeLabels(modal_label, button_label) {
            modal_window_label.textContent = modal_label;
            add_word_btn.innerText = button_label;
        }

        function clearInputs() {
            word_input.value = '';
            definition_input.value = '';
        }

        function sendAjax(url, data, is_new_word, word_id = null) {
            fetch(url, {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                },
                body: data
            }).then(response => {
                return response.json();
            }).then(data => {
                if (is_new_word) {
                    dictionary_body.innerHTML += data.template;
                    clearInputs();
                    showNotification('Слово добавлено');
                } else {
                    document.getElementById(`word_${word_id}`).innerHTML = data.template;
                    bootstrap.Modal.getInstance(modal_window).hide();
                    showNotification('Слово изменено');
                }
            }).catch(err => {

            });
        }

        if (create_new_word_btn && add_word_btn) {
            create_new_word_btn.addEventListener('click', () => {
                changeLabels('Добавление слова', 'Добавить');
                add_word_btn.setAttribute('data-edit-id', null);
                clearInputs();
            });

            add_word_btn.addEventListener('click', function () {
                let form_data = new FormData(document.getElementById('word_definition_form'));

                let edit_id = this.getAttribute('data-edit-id');

                if (edit_id != 'null') {
                    let url = `${window.location.href}/${edit_id}`;
                    sendAjax(url, form_data, false, edit_id);
                } else {
                    let url = window.location.href;
                    sendAjax(url, form_data, true);
                }
            });
        }

        dictionary_body.addEventListener('click', function(event) {
            let edit_btn = event.target.closest('.edit_word_btn');
            let delete_btn = event.target.closest('.delete_word_btn');

            if (edit_btn) {
                let word = edit_btn.getAttribute('data-word');
                let definition = edit_btn.getAttribute('data-definition');
                let word_id = edit_btn.getAttribute('data-word-id');

                changeLabels('Изменение слова', 'Сохранить');

                word_input.value = word;
                definition_input.value = definition;
                add_word_btn.setAttribute('data-edit-id', word_id);
            }

            if (delete_btn) {
                let word_id = delete_btn.getAttribute('data-word-id');

                let url = `${window.location.href}/${word_id}`;

                fetch(url, {
                    method: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                    }
                }).then(response => {
                    return response.json();
                }).then(() => {
                    document.getElementById(`word_${word_id}`).remove();
                    showNotification('Слово удалено');
                }).catch(() => {
                    showNotification('Произошла ошибка');
                });
            }
        });
    });
</script>
