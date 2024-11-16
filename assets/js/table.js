let allRows = [];

document.addEventListener('DOMContentLoaded', function () {
    const table = document.getElementById('salesTable');
    const tbody = table.getElementsByTagName('tbody')[0];
    allRows = Array.from(tbody.getElementsByTagName('tr')); // Guardamos todas las filas originales
    updateTable();
});

function updateTable() {
    const rowsPerPage = parseInt(document.getElementById('rowsPerPage').value);
    const searchInput = document.getElementById('searchInput').value.toLowerCase();
    const tbody = document.getElementById('salesTable').getElementsByTagName('tbody')[0];
    const tableInfo = document.getElementById('tableInfo');

    // Filtrar filas de acuerdo al término de búsqueda
    let filteredRows = allRows.filter(row => {
        const cells = row.getElementsByTagName('td');
        return Array.from(cells).some(cell => cell.textContent.toLowerCase().includes(searchInput));
    });

    const totalRows = filteredRows.length;
    tbody.innerHTML = ''; // Limpiar el contenido del tbody

    // Mostrar solo las filas filtradas según el número seleccionado
    filteredRows.slice(0, rowsPerPage).forEach(row => tbody.appendChild(row));

    const start = totalRows > 0 ? 1 : 0;
    const end = Math.min(rowsPerPage, totalRows);
    tableInfo.textContent = `Mostrando ${start} a ${end} de ${totalRows} ventas`;
}