document.querySelector('.search').addEventListener('keyup', function (key) {
    // console.log(key.target.value);
    $.ajax({
        type: "post",
        url: `/myadmin/soal/search=${key.target.value}`,
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
        const matakuliah = clicked.target.parentElement.parentElement.parentElement.querySelector('.matakuliah').textContent;
        // console.log(matakuliah);
        document.querySelector('#delete-soal').innerHTML =
        `Yakin ingin hapus data ${matakuliah}?
        <input type="hidden" name="nim" value="${matakuliah}">`
    }
    else if (clicked.target.className.includes('edit-button')) {
        // console.log('ini edit');
        const semester = clicked.target.parentElement.parentElement.parentElement.querySelector('.semester').textContent;
        const matakuliah = clicked.target.parentElement.parentElement.parentElement.querySelector('.matakuliah').textContent;
        const type = clicked.target.parentElement.parentElement.parentElement.querySelector('.type').textContent;
        const url = clicked.target.parentElement.parentElement.parentElement.querySelector('.url').textContent;
        // console.log(semester,matakuliah,type,url);
        document.querySelector('#edit-matakuliah').value = matakuliah;
        document.querySelector('.edit-matakuliah').innerHTML = matakuliah;
        document.querySelector('#edit-semester').value = semester;
        select('edit-type', type);
        document.querySelector('#edit-url').value = url;
    }
});

function select(selectId, optionValToSelect){
    //Get the select element by it's unique ID.
    var selectElement = document.getElementById(selectId);
    //Get the options.
    var selectOptions = selectElement.options;
    //Loop through these options using a for loop.
    for (var opt, j = 0; opt = selectOptions[j]; j++) {
        //If the option of value is equal to the option we want to select.
        if (opt.value == optionValToSelect) {
            //Select the option and break out of the for loop.
            selectElement.selectedIndex = j;
            break;
        }
    }
}