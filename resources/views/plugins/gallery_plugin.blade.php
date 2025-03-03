<script>
    function openModal(imageSrc, imageId, translation, createdAt) {
        // Устанавливаем источник изображения в модальном окне
        document.getElementById('modalImage').src = imageSrc;
        document.getElementById('modalTranslation').innerText = translation;
        document.getElementById('modalCreatedAt').innerText = createdAt;

        const editIcon = document.getElementById('editIcon');
        const saveIcon = document.getElementById('saveIcon');
        const deleteImageButton = document.getElementById('deleteImageButton');
        const modalTranslation = document.getElementById('modalTranslation');
        const editTranslation = document.getElementById('editTranslation');

        if (editIcon && saveIcon && deleteImageButton) {
            editIcon.addEventListener('click', function() {
                // Показываем textarea и скрываем текст
                editTranslation.value = modalTranslation.innerText;
                editTranslation.style.display = 'block';
                modalTranslation.style.display = 'none';
                editIcon.style.display = 'none';
                saveIcon.style.display = 'inline';
            });

            saveIcon.addEventListener('click', function() {
                let form_data = new FormData();
                form_data.append('translation', editTranslation.value);

                fetch(`gallery/${imageId}`, {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: form_data
                }).then(response => {
                    if (response.ok) {
                        // Сохраняем изменения и скрываем textarea
                        modalTranslation.innerText = editTranslation.value;
                        modalTranslation.style.display = 'block';
                        editTranslation.style.display = 'none';
                        saveIcon.style.display = 'none';
                        editIcon.style.display = 'inline';
                    }
                }).catch(() => {
                    showNotification('Произошла ошибка :(');
                });
            });

            // Устанавливаем обработчик для кнопки удаления
            deleteImageButton.onclick = function() {
                if (confirm('Вы уверены, что хотите удалить это изображение?')) {
                    // Здесь можно добавить AJAX-запрос для удаления изображения
                    fetch(`gallery/${imageId}`, {
                        method: 'DELETE',
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        }
                    }).then(response => {
                        if (response.ok) {
                            // Закрываем модальное окно и обновляем страницу
                            location.reload();
                        }
                    }).catch(() => {
                        showNotification('Произошла ошибка :(');
                    });
                }
            };
        }
    }
</script>
