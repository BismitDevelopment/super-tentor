// $(".menu").click(function () {
//     $(this).addClass("menu-active") 
// });
// $(".box-angka").click(function () {  
//     $(".box-angka").each(function() {
//         $(this).removeClass("angka-active")
//     }) 
//     $(this).addClass("angka-active") 
//     $(".box-soal").each(function () {  
//         $(this).addClass("d-none")
//     })
//     $("#soal-"+$(this).data("soal")).removeClass("d-none")
//     $(".button-bawah").children().each(function () {  
//         $(this).addClass("d-none")
//     })
//     $("#soal-"+$(this).data("soal")).next().children().each(function () { 
//         $(this).removeClass("d-none")
//     }) 
// });
// $(".tandai").click(function () {  
//     const soal = $(this)
//     $(".box-angka").each(function () {  
//         if (soal.parent().parent().attr("id") == "soal-"+$(this).data("soal")) {
//             $(this).toggleClass("angka-marked")
//         }
//     })
// })
// $(".btn-kembali").click(function () {
//     let noSoal = $(this).data("soal")
//     if (parseInt(noSoal) > 1) {
//         $(".box-angka").each(function() {
//         $(this).removeClass("angka-active")
//         }) 
//         $(`.box-angka[data-soal=${noSoal-1}]`).addClass("angka-active")
//     }
//     $(".box-soal").each(function () {  
//         $(this).addClass("d-none")
//     })
//     $("#soal-"+ parseInt($(this).data("soal")-1)).removeClass("d-none")
//     $(".button-bawah").children().each(function () {  
//         $(this).addClass("d-none")
//     })
//     $("#soal-"+parseInt($(this).data("soal")-1)).next().children().each(function () { 
//         $(this).removeClass("d-none")
//     }) 
// });
// $(".btn-selanjutnya").click(function () {
//     let noSoal = $(this).data("soal")
//     if (parseInt(noSoal) < 30) {
//         $(".box-angka").each(function() {
//         $(this).removeClass("angka-active")
//         }) 
//         $(`.box-angka[data-soal=${noSoal+1}]`).addClass("angka-active")
//     }
//     $(".box-soal").each(function () {  
//         $(this).addClass("d-none")
//     })
//     $("#soal-"+ parseInt($(this).data("soal")+1)).removeClass("d-none")
//     $(".button-bawah").children().each(function () {  
//         $(this).addClass("d-none")
//     })
//     $("#soal-"+parseInt($(this).data("soal")+1)).next().children().each(function () { 
//         $(this).removeClass("d-none")
//     }) 
// });


const obj = JSON.parse('{"error":false,"paket":{"id":2,"nama":"Paket 1","jenis_tryout":0,"soal_tkp":[{"id":1,"soal":"APA ITU GAJAH?","jawaban":"AMFIBI","pembahasan":"Gajah adalah amfibi","paket_id":2,"pilihan":["MAMALIA","UNGGAS","REPTIL","IKAN","AMFIBI"]}],"soal_tiu":[{"id":3,"soal":"APA ITU BURUNG?","jawaban":"UNGGAS","pembahasan":"Burung adalah unggas","paket_id":2,"pilihan":["MAMALIA","UNGGAS","REPTIL","IKAN","UNGGAS"]}],"soal_twk":[{"id":1,"soal":"APA ITU MANUSIA?","jawaban":"MAMALIA","pembahasan":"MANUSIA adalah amfibi","paket_id":2,"pilihan":["MAMALIA","UNGGAS","REPTIL","IKAN","MAMALIA"]},{"id":2,"soal":"APA ITU Byson?","jawaban":"AMFIBI","pembahasan":"Gajah adalah amfibi","paket_id":2,"pilihan":["MAMALIA","UNGGAS","REPTIL","IKAN","AMFIBI"]}, {"id":3,"soal":"APA ITU Gani?","jawaban":"AMFIBI","pembahasan":"Gajah adalah amfibi","paket_id":2,"pilihan":["MAMALIA","UNGGAS","REPTIL","IKAN","AMFIBI"]}]}}')


// Judul paket
const namaPaket = obj.paket.nama
$(".judul-paket").html(namaPaket)

function action(jenis_soal, noSoal) {  

    // 1. Menu tab

    $(".menu").each(function() {
        $(this).removeClass("menu-active")
    }) 
    $(".menu-"+`${jenis_soal.split("_")[1]}`).addClass("menu-active")

    // 2. Nomor soal
    // let noSoal = $(".nomor-soal").data("nomor")
    $(".nomor-soal").html("Soal " + noSoal)

    // 3. Isi soal  
    $(".box-soal").data("nomor", noSoal)
    $(".soal-isi").html(obj.paket[`${jenis_soal}`][parseInt(noSoal-1)].soal)

    // 4. Pilihan
    let arrPilihan = shuffle(obj.paket[`${jenis_soal}`][parseInt(noSoal-1)].pilihan) 
    for (let i = 1; i <= 5; i++) {
        $("input#pilihan-"+i).next().html(`${arrPilihan[i-1]}`)
        $("input#pilihan-"+i).val(`${arrPilihan[i-1]}`)
    }

    // 5. Setup data kembali dan selanjutnya
    $(".btn-kembali").data("nomor", noSoal-1)
    $(".btn-selanjutnya").data("nomor", noSoal+1)

    // 6. navigasi
    $(".box-angka").each(function() {
        $(this).removeClass("angka-active")
    }) 
    $(`.box-angka[data-nomor='${noSoal}'`).addClass("angka-active") 
}

// First load
$(document).ready(function () {  
    let noSoal = $(".nomor-soal").data("nomor")
    let jenis_soal = $(".soal").data("jenis")
    action(jenis_soal, noSoal)
});

// Tab Menu Click
$('.menu').click(function () {  
    let jenis = $(this).data("jenis")
    // reset noSoal (masih dipikirkan)
    let noSoal = $(".nomor-soal").data("nomor")
    $(".nomor-soal").html("Soal " + noSoal)
    action(jenis, noSoal)
})

// Navigation Click
$(".box-angka").click(function () {  
    let noSoal = $(this).data("nomor")
    let jenis = $(".menu-active").data("jenis")
    action(jenis, noSoal)
})

// Kembali Click
$(".btn-kembali").click(function () {  
    let noSoal = parseInt($(this).data("nomor"))
    if (noSoal > 0) {
        let jenis = $(".menu-active").data("jenis")
        action(jenis, noSoal)    
    }
})

// Selanjutnya Click
$(".btn-selanjutnya").click(function () {  
    let noSoal = parseInt($(this).data("nomor"))
    if (noSoal < 31) {
        let jenis = $(".menu-active").data("jenis")
        action(jenis, noSoal)    
    }
})

// Tandai Click
$(".tandai").click(function() {
    let noSoal = $(this).parent().parent().data("nomor")
    $(`.box-angka[data-nomor='${noSoal}'`).toggleClass("angka-marked")
})

// Shuffle array
function shuffle(array) {
    let currentIndex = array.length, temporaryValue, randomIndex;
  
    // While there remain elements to shuffle...
    while (0 !== currentIndex) {
  
      // Pick a remaining element...
      randomIndex = Math.floor(Math.random() * currentIndex);
      currentIndex -= 1;
  
      // And swap it with the current element.
      temporaryValue = array[currentIndex];
      array[currentIndex] = array[randomIndex];
      array[randomIndex] = temporaryValue;
    }
  
    return array;
  }