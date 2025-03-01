<script>
    function openModal(imageSrc, imageId) {
        // Устанавливаем источник изображения в модальном окне
        document.getElementById('modalImage').src = imageSrc;

        // Устанавливаем обработчик для кнопки удаления
        document.getElementById('deleteImageButton').onclick = function() {
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
                });
            }
        };
    }
</script>
