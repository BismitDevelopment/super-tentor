let obj = 0

// Variables for saving state
let state = {
    "soal_tkp": {
        "lastNumber": "1",
        "answer": {},
        "kunci": {},
        "pembahasan": {}
    },
    "soal_tiu": {
        "lastNumber": "1",
        "arrMarked": [],
        "answer": {},
        "kunci": {},
        "pembahasan": {}

    },
    "soal_twk": {
        "lastNumber": "1",
        "arrMarked": [],
        "answer": {},
        "kunci": {},
        "pembahasan": {}
    },
}

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

let dataSoal = $.ajax({
    type: 'POST',
    url: window.location.href,
    data: {
        // paket: $('meta[name="paket_id"]').attr('content'),
    },
    dataType: 'json',
    success: function (data) {
        obj = data
        console.log(obj);

        // Judul paket
        const namaPaket = obj.data_soal.nama
        $(".judul-paket").html(namaPaket)
        // Looping jawaban dan kunci
        for (let i = 1; i <= 30; i++) {
            state["soal_twk"].answer[`${i}`] = obj.data_user.jawaban_twk[i - 1]
            state["soal_twk"].kunci[`${i}`] = obj.data_soal.soal_twk[i - 1].jawaban
            state["soal_twk"].pembahasan[`${i}`] = obj.data_soal.soal_twk[i - 1].pembahasan
        }
        for (let i = 1; i <= 35; i++) {
            state["soal_tiu"].answer[`${i}`] = obj.data_user.jawaban_tiu[i - 1]
            state["soal_tiu"].pembahasan[`${i}`] = obj.data_soal.soal_tiu[i - 1].pembahasan
            state["soal_tiu"].kunci[`${i}`] = obj.data_soal.soal_tiu[i - 1].jawaban
            state["soal_tkp"].answer[`${i}`] = obj.data_user.jawaban_tkp[i - 1]
            state["soal_tkp"].pembahasan[`${i}`] = obj.data_soal.soal_tkp[i - 1].pembahasan
            state["soal_tkp"].kunci[`${i}`] = obj.data_soal.soal_tkp[i - 1].jawaban_skor[0]
        }
    },
    error: function (data) {
        console.log(data)
    }
});


function action(jenis_soal, noSoal, jawaban, kunci, pembahasan) {
    
    // Judul paket
    const namaPaket = obj.data_soal.nama
    $(".judul-paket").html(namaPaket)    

    if (jenis_soal == "soal_twk") {
        for (let i = 30; i < 35; i++) {
            $(".box-angka").eq(i).hide()
        }
    } else {
        for (let i = 30; i < 35; i++) {
            $(".box-angka").eq(i).show()
        }
    }


    // 1. Menu tab

    $(".menu").each(function () {
        $(this).removeClass("menu-active")
    })
    $(".menu-" + `${jenis_soal.split("_")[1]}`).addClass("menu-active")

    // 2. Nomor soal
    // let noSoal = $(".nomor-soal").data("nomor")
    $(".nomor-soal").html("Soal " + noSoal)

    // 3. Isi soal  
    $(".box-soal").data("nomor", noSoal)
    let soal = obj.data_soal[`${jenis_soal}`][parseInt(noSoal - 1)].soal
    if (soal.includes(".jpg") || soal.includes(".png")) {
        $(".soal-isi").html("")
        $(".soal-gambar").attr("src", $('meta[name="assetPath"]').attr('content') + 'img/soal/' + soal)
    } else {
        $(".soal-isi").html(soal)
        $(".soal-gambar").attr("src", "")
    }

    // 4. Pilihan
    let arrPilihan = obj.data_soal[`${jenis_soal}`][parseInt(noSoal - 1)].pilihan
    for (let i = 1; i <= 5; i++) {
        $("input#pilihan-" + i).val(`${arrPilihan[i - 1][0]}`)
        if(arrPilihan[i - 1][0].includes(".jpg") || arrPilihan[i - 1][0].includes(".png")){
            $("input#pilihan-" + i).next().html("")
            $("img#gambar-pilihan-" + i).attr("src", $('meta[name="assetPath"]').attr('content') + 'img/pilihan/' + arrPilihan[i - 1][0])
        } else {
            $("img#gambar-pilihan-" + i).attr("src", "")
            $("input#pilihan-" + i).next().html(`${arrPilihan[i - 1][0]}`)
        }
    }

    // 5. Setup data kembali dan selanjutnya
    $(".btn-kembali").data("nomor", noSoal - 1)
    $(".btn-selanjutnya").data("nomor", parseInt(noSoal) + 1)

    // 6. navigasi
    $("#navigasi-title").html("Navigasi Soal " + jenis_soal.split("_")[1].toUpperCase())
    $(".box-angka").each(function () {
        $(this).removeClass("angka-active")
    })
    $(`.box-angka[data-nomor='${noSoal}'`).addClass("angka-active")

    // Show last choice
    $("input").each(function () {
        $(this).prop('checked', false)
        $(this).next().css('color', 'black')
        $(this).next().css('font-weight', '500')
        $(this).next().next().attr('style', '')
    })

    $(`input[value="${jawaban}"]`).prop('checked', true)
    $(`input[value="${kunci}"]`).next().css('color', '#E9D038')
    $(`input[value="${kunci}"]`).next().css('font-weight', '600')
    if (`${kunci}`.includes('.png') || `${kunci}`.includes('.jpg')) {
        $(`input[value="${kunci}"]`).next().next().css({'border': '1px solid #E9D038', 'border-radius': '4px', 'padding': '2px'})
    } 
    // console.log($(`input[value="${kunci}"]` + ' img'))

    // Pembahasan
    if (pembahasan.includes(".jpg") || pembahasan.includes(".png")) {
        $(".pembahasan-isi").html("")
        $(".pembahasan-gambar").attr("src", $('meta[name="assetPath"]').attr('content') + 'img/pembahasan/' + pembahasan)
    } else {
        $(".pembahasan-isi").html(pembahasan)
        $(".pembahasan-gambar").attr("src", "")
    }

}

// First load
$(document).ready(function () {

    $.when(dataSoal).done(() => {
        let noSoal = state["soal_twk"]["lastNumber"]
        let jenis_soal = $(".soal").data("jenis")
        let choiceVal = state[`${jenis_soal}`].answer[`${noSoal}`]
        let kunci = state[`${jenis_soal}`].kunci[`${noSoal}`]
        let pembahasan = state[`${jenis_soal}`].pembahasan[`${noSoal}`]
        console.log(noSoal, jenis_soal, choiceVal, kunci, pembahasan)
        action(jenis_soal, noSoal, choiceVal, kunci, pembahasan)
    })


    // Tab Menu Click
    $('.menu').click(function () {
        let jenis = $(this).data("jenis")
        let noSoal = state[`${jenis}`].lastNumber
        // reset noSoal (masih dipikirkan)
        $(".nomor-soal").html("Soal " + noSoal)
        let choiceVal = state[`${jenis}`].answer[`${noSoal}`]
        let kunci = state[`${jenis}`].kunci[`${noSoal}`]
        let pembahasan = state[`${jenis}`].pembahasan[`${noSoal}`]
        action(jenis, noSoal, choiceVal, kunci, pembahasan)
    })

    // Navigation Click
    $(".box-angka").click(function () {
        let noSoal = $(this).data("nomor")
        let jenis = $(".menu-active").data("jenis")
        state[`${jenis}`].lastNumber = noSoal
        let choiceVal = state[`${jenis}`].answer[`${noSoal}`]
        let kunci = state[`${jenis}`].kunci[`${noSoal}`]
        let pembahasan = state[`${jenis}`].pembahasan[`${noSoal}`]
        action(jenis, noSoal, choiceVal, kunci, pembahasan)
    })

    // Kembali Click
    $(".btn-kembali").click(function () {
        let noSoal = parseInt($(this).data("nomor"))
        if (noSoal > 0) {
            let jenis = $(".menu-active").data("jenis")
            state[`${jenis}`].lastNumber = noSoal
            let choiceVal = state[`${jenis}`].answer[`${noSoal}`]
            let kunci = state[`${jenis}`].kunci[`${noSoal}`]
            let pembahasan = state[`${jenis}`].pembahasan[`${noSoal}`]
            action(jenis, noSoal, choiceVal, kunci, pembahasan)
        }
    })

    // Selanjutnya Click
    $(".btn-selanjutnya").click(function () {
        let noSoal = parseInt($(this).data("nomor"))
        
        let jenis = $(".menu-active").data("jenis")
        state[`${jenis}`].lastNumber = noSoal
        let choiceVal = state[`${jenis}`].answer[`${noSoal}`]
        let kunci = state[`${jenis}`].kunci[`${noSoal}`]
        let pembahasan = state[`${jenis_soal}`].pembahasan[`${noSoal}`]
        if (noSoal < 31 & jenis === 'twk') {
            action(jenis, noSoal, choiceVal, kunci, pembahasan)
        } else if (noSoal < 36 & jenis !== 'twk') {
            action(jenis, noSoal, choiceVal, kunci, pembahasan)
        }

    })
});
