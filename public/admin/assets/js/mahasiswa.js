document.querySelector('.search').addEventListener('keyup', function (key) {
    // console.log(key.target.value);
    $.ajax({
        type: "post",
        url: `/myadmin/mahasiswa/search=${key.target.value}`,
        data: {
            _token: $('meta[name="csrf-token"]').attr("content"),
        },
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
        },
        success: function (Response) {
            document.querySelector('.table').innerHTML = Response;
        },
        error: function(error) {
            console.log (error);
        }
    });
})

document.querySelector('.table').addEventListener('click', function (clicked) {
    // console.log(clicked.target.parentElement.parentElement.parentElement.className);
    if (clicked.target.className.includes('delete-button')) {
        // console.log('ini delete');
        const nama = clicked.target.parentElement.parentElement.parentElement.querySelector('.nama').textContent;
        const nim = clicked.target.parentElement.parentElement.parentElement.querySelector('.nim').textContent;
        // console.log(nama,nim);
        document.querySelector('#delete-mahasiswa').innerHTML =
        `Yakin ingin hapus data ${nama}?
        <input type="hidden" name="nim" value="${nim}">`
    }
    else if (clicked.target.className.includes('edit-button')) {
        // console.log('ini edit');
        const nama = clicked.target.parentElement.parentElement.parentElement.querySelector('.nama').textContent;
        const nim = clicked.target.parentElement.parentElement.parentElement.querySelector('.nim').textContent;
        const angkatan = clicked.target.parentElement.parentElement.parentElement.querySelector('.angkatan').textContent;
        const password = clicked.target.parentElement.parentElement.parentElement.querySelector('.password').textContent;
        // console.log(nama,nim,angkatan,password);
        document.querySelector('#edit-nama').value = nama;
        document.querySelector('#edit-nim').value = nim;
        document.querySelector('.edit-nim').innerHTML = nim;
        document.querySelector('#edit-angkatan').value = angkatan;
        document.querySelector('#edit-password').value = password;
    }
});