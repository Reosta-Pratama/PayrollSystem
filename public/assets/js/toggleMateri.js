function manageViewMode(mode) {
    const listDiv = document.getElementById('list');
    const columnDiv = document.getElementById('column');

    const btnList = document.getElementById('btnList');
    const btnGrid = document.getElementById('btnGrid');

    const txtList = document.getElementById('txtList');
    const txtGrid = document.getElementById('txtGrid');

    // Menambahkan kelas untuk mode tampilan
    listDiv.classList.toggle('hidden', mode !== 'list');
    columnDiv.classList.toggle('hidden', mode === 'list');

    // Menambahkan kelas untuk button btnList
    btnList.classList.toggle('bg-greenBi', mode === 'list');
    btnList.classList.toggle('bg-white', mode !== 'list');

    // Menambahkan kelas untuk button btnGrid
    btnGrid.classList.toggle('bg-white', mode === 'list');
    btnGrid.classList.toggle('bg-greenBi', mode !== 'list');

    // Menambahkan kelas untuk button txtList
    txtList.classList.toggle('text-white', mode === 'list');
    txtList.classList.toggle('text-grayBi', mode !== 'list');

    // Menambahkan kelas untuk button txtGrid
    txtGrid.classList.toggle('text-grayBi', mode === 'list');
    txtGrid.classList.toggle('text-white', mode !== 'list');

    // Simpan mode tampilan ke dalam sessionStorage
    if (mode === 'list' || mode === 'column') {
        sessionStorage.setItem('listMode', mode);
    } else {
        sessionStorage.setItem('listMode', 'column'); // Set default ke 'column' jika kosong
    }
}

document.getElementById('btnList').addEventListener('click', function () {
    manageViewMode('list');
});

document.getElementById('btnGrid').addEventListener('click', function () {
    manageViewMode('column');
});

document.addEventListener('DOMContentLoaded', function () {
    let listMode = sessionStorage.getItem('listMode');
    if (!listMode) {
        manageViewMode('column'); // Default ke 'column' jika listMode kosong
        listMode = 'column'; // Set ulang listMode ke 'column'
    }
    manageViewMode(listMode);
});
