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


const obj = JSON.parse('{"error":false,"paket":{"id":2,"nama":"Paket 1","jenis_tryout":0,"soal_tkp":[{"id":1,"soal":"APA ITU GAJAH?","jawaban":"AMFIBI","pembahasan":"Gajah adalah amfibi","paket_id":2,"pilihan":["MAMALIA","UNGGAS","REPTIL","IKAN","AMFIBI"]},{"id":2,"soal":"Apa itu apa?","jawaban":"Jawss","pembahasan":"Apa itu pertanyaan","paket_id":2,"pilihan":["Pil 1","Pil 2","Pil 3","Pil 4","Jawss"]},{"id":3,"soal":"Consol TKP","jawaban":"ini jawaban","pembahasan":"ini pembahasan","paket_id":2,"pilihan":["ini jawab","pillih ini","coba pilih","ini dong","ini jawaban"]}],"soal_tiu":[{"id":3,"soal":"APA ITU BURUNG?","jawaban":"UNGGAS","pembahasan":"Burung adalah unggas","paket_id":2,"pilihan":["MAMALIA","UNGGAS","REPTIL","IKAN","UNGGAS"]},{"id":4,"soal":"Apa itu TIU?","jawaban":"jawabannya ini","pembahasan":"pembahasan ini","paket_id":2,"pilihan":["pilih ini bro","pilihini coba","coba pilih","pilih 4 nih","jawabannya ini"]},{"id":5,"soal":"Coonsol TIU","jawaban":"Jawaban TIU","pembahasan":"Pmebahasn TIU","paket_id":2,"pilihan":["pilih TIU 1","Pilih TIU 2","pilih TIU3","pilih TIU 4","Jawaban TIU"]}],"soal_twk":[{"id":1,"soal":"APA ITU MANUSIA?","jawaban":"MAMALIA","pembahasan":"MANUSIA adalah amfibi","paket_id":2,"pilihan":["MAMALIA","UNGGAS","REPTIL","IKAN","MAMALIA"]},{"id":2,"soal":"CONTOH TWK","jawaban":"Jawaban 1 TWK","pembahasan":"Pemabahsan 1 TWK","paket_id":2,"pilihan":["pilihan 1 twk","pilihan 1 twksd","pilihan 1 twkfff","pilihan 1 twkggg","Jawaban 1 TWK"]},{"id":3,"soal":"APA ITU TWK?","jawaban":"TWK ADAH TWLW","pembahasan":"Pemabahasn itu ajsafksdjnfc","paket_id":2,"pilihan":["Tidak tahu","tauah","apasih","gajeals","TWK ADAH TWLW"]}]}}')


// Judul paket
const namaPaket = obj.paket.nama
$(".judul-paket").html(namaPaket)

function action(jenis_soal, noSoal, arrMarked) {  

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

    // 7. navigasi marked
    $(".box-angka").each(function() {
        $(this).removeClass("angka-marked")
    }) 
    arrMarked.forEach(element => {        
        $(`.box-angka[data-nomor='${element}'`).addClass("angka-marked")     
        console.log($(`.box-angka[data-nomor='${element}'`));
           
    }); 
}

// Variables for saving state
let state = {
    "soal_tkp" : {
        "lastNumber" : "1",
        "arrMarked" : []
    },
    "soal_tiu" : {
        "lastNumber" : "1",
        "arrMarked" : []
    },
    "soal_twk" : {
        "lastNumber" : "1",
        "arrMarked" : []
    },
}


// First load
$(document).ready(function () {  
    let noSoal = $(".nomor-soal").data("nomor")
    let jenis_soal = $(".soal").data("jenis")
    action(jenis_soal, noSoal, [])
});

// Tab Menu Click
$('.menu').click(function () {  
    let jenis = $(this).data("jenis")
    let noSoal = state[`${jenis}`].lastNumber
    // reset noSoal (masih dipikirkan)
    $(".nomor-soal").html("Soal " + noSoal)
    action(jenis, noSoal, state[`${jenis}`].arrMarked)
})

// Navigation Click
$(".box-angka").click(function () {  
    let noSoal = $(this).data("nomor")
    let jenis = $(".menu-active").data("jenis")
    state[`${jenis}`].lastNumber = noSoal
    action(jenis, noSoal, state[`${jenis}`].arrMarked)
})

// Kembali Click
$(".btn-kembali").click(function () {  
    let noSoal = parseInt($(this).data("nomor"))
    if (noSoal > 0) {
        let jenis = $(".menu-active").data("jenis")
        state[`${jenis}`].lastNumber = noSoal
        action(jenis, noSoal, state[`${jenis}`].arrMarked)    
    }
})

// Selanjutnya Click
$(".btn-selanjutnya").click(function () {  
    let noSoal = parseInt($(this).data("nomor"))
    if (noSoal < 31) {
        let jenis = $(".menu-active").data("jenis")
        state[`${jenis}`].lastNumber = noSoal
        action(jenis, noSoal, state[`${jenis}`].arrMarked)    
    }
})

// Tandai Click
$(".tandai").click(function() {
    let noSoal = $(this).parent().parent().data("nomor")
    let jenis = $(".menu-active").data("jenis")
    if ($(`.box-angka[data-nomor='${noSoal}'`).hasClass("angka-marked")) {
        $(`.box-angka[data-nomor='${noSoal}'`).removeClass("angka-marked")
        state[`${jenis}`].arrMarked.splice(state[`${jenis}`].arrMarked.indexOf(noSoal), 1)
    } else {
        $(`.box-angka[data-nomor='${noSoal}'`).addClass("angka-marked")
        state[`${jenis}`].arrMarked.push(noSoal)
        console.log(state[`${jenis}`].arrMarked);    
    }
    
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