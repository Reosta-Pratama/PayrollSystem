document.addEventListener('DOMContentLoaded', function() {
    const jumlahPertanyaanInput = document.getElementById('jumlahPertanyaan');

    jumlahPertanyaanInput.addEventListener('input', function() {
        this.form.submit();
    });
});