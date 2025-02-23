<script>
    document.querySelectorAll('table').forEach(table => {
        let table_init = new DataTable(table, {
            language: {
                processing: "Обработка...",
                search: "Поиск:",
                lengthMenu: "Показать _MENU_ записей",
                info: "Записи с _START_ до _END_ из _TOTAL_ записей",
                infoEmpty: "Записи отсутствуют",
                infoFiltered: "(отфильтровано из _MAX_ записей)",
                loadingRecords: "Загрузка записей...",
                zeroRecords: "Совпадений не найдено",
                emptyTable: "Данные отсутствуют",

                aria: {
                    sortAscending: ": активировать для сортировки столбца по возрастанию",
                    sortDescending: ": активировать для сортировки столбца по убыванию"
                }
            }
        });
    });
</script>
