let obj = 0

// Variables for saving state
let state;
if (localStorage.getItem("state") == null) {
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
    state = JSON.parse(localStorage.getItem("state"))    
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
        $(".soal-gambar").attr("src", soal)
    } else {
        $(".soal-isi").html(soal)
    }

    // 4. Pilihan
    let arrPilihan = obj.paket[`${jenis_soal}`][parseInt(noSoal-1)].pilihan
    for (let i = 1; i <= 5; i++) {
        $("input#pilihan-"+i).next().html(`${arrPilihan[i-1][0]}`)
        $("input#pilihan-"+i).val(`${arrPilihan[i-1][0]}`)        
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
           
    }); 

    // Show last choice
    $("input").each(function() {
        $(this).prop('checked', false)
    }) 
    
    $(`input[value="${choiceVal}"]`).prop('checked', true)

    // Save to localStorage
    localStorage.setItem("state", JSON.stringify(state))

}

function resolveAfter2Seconds() {
  return new Promise(resolve => {
    while(true){
        if(obj != 0){
            data = obj;
            break
        }
    };
    setTimeout(() => {
      resolve(obj);
    }, 2000);
  });
}

function resolveAfter2Seconds() {
  return new Promise(resolve => {
    while(true){
        if(obj != 0){
            data = obj;
            break
        }
    };
    setTimeout(() => {
      resolve(obj);
    }, 2000);
  });
}


// First load
$(document).ready(function () {  
    let noSoal = state["soal_twk"]["lastNumber"]
    let jenis_soal = $(".soal").data("jenis")
    let choiceVal = state[`${jenis_soal}`].answer[`${noSoal}`]

    $.when(dataSoal).done( ()=>{
        action(jenis_soal, noSoal, [], choiceVal)
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
        localStorage.setItem("state", JSON.stringify(state))
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

      //Return to attempt
      $(".return-to-attempt").click(function() {
        returnToAttempt()
      })

      // Finish Attempt
      $(".finish-attempt").click(function() {
        finishAttempt()
      })

      //Submit dan selesai
      $("final-submit-btn").click(function() {
        finish()
      })
    //Temp
    $(".wrapper").hide();
    $(".finish-attempt-page").show()
});



//Return to attempt
function returnToAttempt() {
    clearCookie()
    $(".wrapper").show()
    $(".finish-attempt-page").hide()
}

//Go to finish attempt page
function finishAttempt() {
    setCookie()
    $(".wrapper").hide();
    $(".finish-attempt-page").show()
}

//Set cookie
function setCookie() {
    document.cookie = "state="+localStorage.getItem('state')
    console.log(document.cookie)
}

function clearCookie() {
    document.cookie = ""
}

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

// Submit dan selesai
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
            arrJawabanTIU.push("")
            arrScoreJawabanTIU.push(0)
        }
        if ( jawabanTKP != null) {
            arrJawabanTKP.push(jawabanTKP)
            arrScoreJawabanTKP.push(parseInt(scoreJawabanTKP)) 
        } else {
            arrJawabanTKP.push("")
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
            arrJawabanTWK.push("")
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
    localStorage.clear()
    console.log(JSON.stringify(objJawaban));
    
    // Ini ajax postnya bang

    // $.ajaxSetup({
    //     headers: {
    //         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    //     }
    // });
    
    // $.ajax({
    //     type: 'POST',
    //     url: '',  // URL POST FINISH
    //     data: objJawaban,
    //     dataType: 'json',
    //     success: function(data) {
    //         window.location = "https://www.google.com/"  // Nanti ini ke url score page
    //     },
    //     error: function(data) {
    //         console.log(data)
    //     }
    // });
}