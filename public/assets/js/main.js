document.querySelector('.searching').addEventListener('keyup', function (key) {
    // console.log(key.target.value);
    $.ajax({
        type: "post",
        url: `/soal/search=${key.target.value}`,
        data: {
            _token: $('meta[name="csrf-token"]').attr("content"),
        },
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
        },
        success: function (Response) {
            document.querySelector('.banksoal').innerHTML = Response;
        },
        error: function(error) {
            console.log (error);
        }
    });
})