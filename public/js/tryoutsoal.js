let obj = 0

// Variables for saving state
let state;
if (sessionStorage.getItem("state") == null) {
    state = {
        "soal_tkp" : {
            "lastNumber" : "1",
            "arrMarked" : [],
            "answer" : {},
            "scoreAnswer" : {}
        },
        "soal_tiu" : {
            "lastNumber" : "1",
            "arrMarked" : [],
            "answer" : {},
            "scoreAnswer" : {}
        },
        "soal_twk" : {
            "lastNumber" : "1",
            "arrMarked" : [],
            "answer" : {},
            "scoreAnswer" : {}
        },
        "time_end" : parseInt(Date.now() + (90*60000))
    }
} else {
    state = JSON.parse(sessionStorage.getItem("state"))    
}


$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

let dataSoal = $.ajax({
    method: 'POST',
    url: window.location.href,
    dataType: 'json',
    success: function(data) {
        obj = data

        let arrJenis = ["soal_tkp", "soal_tiu", "soal_twk"]
        
        // Judul paket
        const namaPaket = obj.paket.nama
        $(".judul-paket").html(namaPaket)

        //
    },
    error: function(data) {
        console.log(data)
    }
});


function action(jenis_soal, noSoal, arrMarked, choiceVal) {  

    // Judul paket
    const namaPaket = obj.data_soal.nama
    $(".judul-paket").html(namaPaket)        


    for (let i = 1 ; i <= 35 ; i++) {
        if (state[`${jenis_soal}`]["answer"][`${i}`] != undefined) {
            $(`.box-angka[data-nomor='${i}'`).addClass("answered")
        } else {
            $(`.box-angka[data-nomor='${i}'`).removeClass("answered")
        }
    }

    if (jenis_soal == "soal_twk") {
        for (let i = 30; i < 35 ; i++) {
            $(".box-angka").eq(i).hide()
        }
    } else {
        for (let i = 30; i < 35 ; i++) {
            $(".box-angka").eq(i).show()
        }
    }
    

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
    let soal = obj.paket[`${jenis_soal}`][parseInt(noSoal-1)].soal
    if (soal.includes(".jpg") || soal.includes(".png")) {
        $(".soal-isi").html("")
        $(".soal-gambar").attr("src", $('meta[name="assetPath"]').attr('content')+soal)
    } else {
        $(".soal-isi").html(soal)
        $(".soal-gambar").attr("src", "")
    }

    // 4. Pilihan
    let arrPilihan = obj.paket[`${jenis_soal}`][parseInt(noSoal-1)].pilihan
    for (let i = 1; i <= 5; i++) {
        $("input#pilihan-"+i).next().html(`${arrPilihan[i-1][0]}`)
        $("input#pilihan-"+i).val(`${arrPilihan[i-1][0]}`)        
    }

    // 5. Setup data kembali dan selanjutnya
    $(".btn-kembali").data("nomor", noSoal-1) 
    $(".btn-selanjutnya").data("nomor", parseInt(noSoal)+1)

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
           
    }); 

    // Show last choice
    $("input").each(function() {
        $(this).prop('checked', false)
    }) 
    
    $(`input[value="${choiceVal}"]`).prop('checked', true)

    // Save to sessionStorage
    sessionStorage.setItem("state", JSON.stringify(state))

}

// First load
$(document).ready(function () {  
    let noSoal = state["soal_twk"]["lastNumber"]
    let jenis_soal = $(".soal").data("jenis")
    let choiceVal = state[`${jenis_soal}`].answer[`${noSoal}`]
    let arrMarked = state[`${jenis_soal}`].arrMarked

    $.when(dataSoal).done( ()=>{
        action(jenis_soal, noSoal, arrMarked, choiceVal)
    })
    
    
    // Tab Menu Click
    $('.menu').click(function () {  
        let jenis = $(this).data("jenis")
        let noSoal = state[`${jenis}`].lastNumber
        // reset noSoal (masih dipikirkan)
        $(".nomor-soal").html("Soal " + noSoal)
        let choiceVal = state[`${jenis}`].answer[`${noSoal}`]
        action(jenis, noSoal, state[`${jenis}`].arrMarked, choiceVal)
    })
    
    // Navigation Click
    $(".box-angka").click(function () {  
        let noSoal = $(this).data("nomor")
        let jenis = $(".menu-active").data("jenis")
        state[`${jenis}`].lastNumber = noSoal
        let choiceVal = state[`${jenis}`].answer[`${noSoal}`]
        action(jenis, noSoal, state[`${jenis}`].arrMarked, choiceVal)
    })
    
    // Kembali Click
    $(".btn-kembali").click(function () {  
        let noSoal = parseInt($(this).data("nomor"))
        if (noSoal > 0) {
            let jenis = $(".menu-active").data("jenis")
            state[`${jenis}`].lastNumber = noSoal
            let choiceVal = state[`${jenis}`].answer[`${noSoal}`]
            action(jenis, noSoal, state[`${jenis}`].arrMarked, choiceVal)
            }
    })
    
    // Selanjutnya Click
    $(".btn-selanjutnya").click(function () {  
        let noSoal = parseInt($(this).data("nomor"))
        if (noSoal < 31) {
            let jenis = $(".menu-active").data("jenis")
            state[`${jenis}`].lastNumber = noSoal
            let choiceVal = state[`${jenis}`].answer[`${noSoal}`]
            action(jenis, noSoal, state[`${jenis}`].arrMarked, choiceVal)
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
        }
    })

    // Finish Attempt Click
    $(".finish-attempt").click(() => {
        $(".wrapper").hide()
        for (let i = 1 ; i <= 30 ; i++) {
            if (state["soal_twk"]["answer"][`${i}`] == undefined) {
                $(`.baris-twk .status[data-nomor='${i}'`).html("Belum dijawab")
                $(`.baris-twk .status[data-nomor='${i}'`).css("color", "#EB5757")
            } else {
                $(`.baris-twk .status[data-nomor='${i}'`).html("Sudah terjawab")
                $(`.baris-twk .status[data-nomor='${i}'`).css("color", "black")
            }
            if (state["soal_twk"]["arrMarked"].includes(i) || state["soal_twk"]["arrMarked"].includes(toString(i))) {
                $(`.baris-twk img[data-nomor='${i}'`).show()
            } else {
                $(`.baris-twk img[data-nomor='${i}'`).hide()
            }
        }
        for (let i = 1 ; i <= 35 ; i++) {
            if (state["soal_tiu"]["answer"][`${i}`] == undefined) {
                $(`.baris-tiu .status[data-nomor='${i}'`).html("Belum dijawab")
                $(`.baris-tiu .status[data-nomor='${i}'`).css("color", "#EB5757")
            } else {
                $(`.baris-tiu .status[data-nomor='${i}'`).html("Sudah terjawab")
                $(`.baris-tiu .status[data-nomor='${i}'`).css("color", "black")
            }
            if (state["soal_tiu"]["arrMarked"].includes(i) || state["soal_tiu"]["arrMarked"].includes(toString(i))) {
                $(`.baris-tiu img[data-nomor='${i}'`).show()
            } else {
                $(`.baris-tiu img[data-nomor='${i}'`).hide()
            }
            if (state["soal_tkp"]["answer"][`${i}`] == undefined) {
                $(`.baris-tkp .status[data-nomor='${i}'`).html("Belum dijawab")
                $(`.baris-tkp .status[data-nomor='${i}'`).css("color", "#EB5757")
            } else {
                $(`.baris-tkp .status[data-nomor='${i}'`).html("Sudah terjawab")
                $(`.baris-tkp .status[data-nomor='${i}'`).css("color", "black")
            }
            if (state["soal_tkp"]["arrMarked"].includes(i) || state["soal_tkp"]["arrMarked"].includes(toString(i))) {
                $(`.baris-tkp img[data-nomor='${i}'`).show()
            } else {
                $(`.baris-tkp img[data-nomor='${i}'`).hide()
            }
        }

        $(".finish-attempt-page").show()
    })

    $(".btn-return").click(() => {
        $(".wrapper").show()
        $(".finish-attempt-page").hide()
    })


    // Saving answer
    $("input").click(function() {
        let valuePilihan = $(this).val()
        let jenis = $(".menu-active").data("jenis")
        let noSoal = $(".angka-active").data("nomor")
        state[`${jenis}`]["answer"][`${noSoal}`] = valuePilihan
        let pilihan = obj["paket"][`${jenis}`][`${noSoal-1}`]["pilihan"]     
        pilihan.forEach((e) => {
            if (e[0] == valuePilihan) {
                state[`${jenis}`]["scoreAnswer"][`${noSoal}`] = e[1]
            }
        })   
        sessionStorage.setItem("state", JSON.stringify(state))
    })

    // CountDown
    const countDownDate = new Date(state["time_end"]).getTime()
    let x = setInterval(function() {

        // Get today's date and time
        let now = new Date().getTime();
          
        // Find the distance between now and the count down date
        let distance = countDownDate - now;
          
        // Time calculations for days, hours, minutes and seconds
        let days = Math.floor(distance / (1000 * 60 * 60 * 24));
        let hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        let minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        let seconds = Math.floor((distance % (1000 * 60)) / 1000);
          
        // Output the result in an element with id="demo"
        $(".countdown").html(`Sisa Waktu: ${hours} Jam ${minutes} Menit ${seconds} detik`)
          
        // If the count down is over, write some text 
        if (distance < 0) {
          clearInterval(x);
          $(".countdown").html("Expired")
          finish()
        }
      }, 1000);

      // Finish Attempt
      $(".btn-finish").click(function() {
        finish()
      })
});

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

// Finish Attempt
function finish() {    
    let arrJawabanTWK = []
    let arrScoreJawabanTWK = []
    let arrJawabanTIU = []
    let arrScoreJawabanTIU = []
    let arrJawabanTKP = []
    let arrScoreJawabanTKP = []
    for(let i = 1; i <= 35 ; i++) {
        let jawabanTIU = state["soal_tiu"]["answer"][`${i}`]
        let scoreJawabanTIU = state["soal_tiu"]["scoreAnswer"][`${i}`]
        let jawabanTKP = state["soal_tkp"]["answer"][`${i}`]
        let scoreJawabanTKP = state["soal_tkp"]["scoreAnswer"][`${i}`]
        if ( jawabanTIU != null) {
            arrJawabanTIU.push(jawabanTIU)
            arrScoreJawabanTIU.push(parseInt(scoreJawabanTIU)) 
        } else {
            arrJawabanTIU.push("-")
            arrScoreJawabanTIU.push(0)
        }
        if ( jawabanTKP != null) {
            arrJawabanTKP.push(jawabanTKP)
            arrScoreJawabanTKP.push(parseInt(scoreJawabanTKP)) 
        } else {
            arrJawabanTKP.push("-")
            arrScoreJawabanTKP.push(0)
        }
    }
    for(let i = 1; i <= 30 ; i++) {
        let jawabanTWK = state["soal_twk"]["answer"][`${i}`]
        let scoreJawabanTWK = state["soal_twk"]["scoreAnswer"][`${i}`]
        if ( jawabanTWK != null) {
            arrJawabanTWK.push(jawabanTWK)
            arrScoreJawabanTWK.push(parseInt(scoreJawabanTWK)) 
        } else {
            arrJawabanTWK.push("-")
            arrScoreJawabanTWK.push(0)
        }
    }
    let objJawaban = {
        "id_paket" : obj.paket.id,
        "jawaban_tiu" : arrJawabanTIU,
        "score_jawaban_tiu" : arrScoreJawabanTIU,
        "jawaban_tkp" : arrJawabanTKP,
        "score_jawaban_tkp" : arrScoreJawabanTKP,
        "jawaban_twk" : arrJawabanTWK,
        "score_jawaban_twk" : arrScoreJawabanTWK,
        "waktu_dihabiskan" : parseInt((Date.now() - (state["time_end"] - (90*60000)))/1000)
    }
    sessionStorage.clear()
    // Ini ajax postnya bang

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    
    $.ajax({
        method: 'POST',
        url: window.location.href +'/finish',  // URL POST FINISH
        contentType: 'application/json; charset=UTF-8',
        data: JSON.stringify(objJawaban),
        success: function(data) {
            if(!data.error){
                window.location.href = data.redirect  // Nanti ini ke url score page
            }
        },
        error: function(data) {
            console.log(data)
        }
    });
}