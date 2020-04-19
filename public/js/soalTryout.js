$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $.ajax({
        type: 'POST',
        url: '/home/tryouts/free/' + $('meta[name="paket_id"]').attr('content') +'/ujian',
        data: {
            paket: $('meta[name="paket_id"]').attr('content'),
        },
        dataType: 'json',
        success: function(data) {
            console.log(data)
        },
        error: function(data) {
            console.log(data)
        }
    });
})