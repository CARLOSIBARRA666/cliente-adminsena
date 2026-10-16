/* AdminSENA — Utilidades JS */
document.addEventListener('DOMContentLoaded', function () {
    // Filtro en vivo de tablas: cada buscador con data-target filtra su tabla
    document.querySelectorAll('.search-box input[data-target]').forEach(function (input) {
        input.addEventListener('input', function () {
            var q = input.value.toLowerCase().trim();
            var table = document.querySelector(input.dataset.target);
            if (!table) return;
            table.querySelectorAll('tbody tr').forEach(function (row) {
                if (row.dataset.emptyRow) return;
                row.style.display = row.textContent.toLowerCase().includes(q) ? '' : 'none';
            });
        });
    });
});