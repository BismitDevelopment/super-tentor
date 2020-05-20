let obj = 0

// Variables for saving state
let state;
if (localStorage.getItem("state") == null) {
    state = {
        "soal_tkp" : {
            "lastNumber" : "1",
            "arrMarked" : [],
            "answer" : {}
        },
        "soal_tiu" : {
            "lastNumber" : "1",
            "arrMarked" : [],
            "answer" : {}
        },
        "soal_twk" : {
            "lastNumber" : "1",
            "arrMarked" : [],
            "answer" : {}
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
        // Shuffle Pilihan
        obj = data
        console.log(obj)

        let arrJenis = ["soal_tkp", "soal_tiu", "soal_twk"]
        
        // arrJenis.forEach(element1 => {
        //     let arrSoal = obj.paket[`${element1}`]
        //     arrSoal.forEach((value, i) => {
        //         arrSoal[i].pilihan = shuffle(value.pilihan)
        //     })
        // })

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
        let jenis = $(".menu-active").data("jenis")
        let noSoal = $(".angka-active").data("nomor")
        state[`${jenis}`]["answer"][`${noSoal}`] = $(this).val()
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

      // Finish Attempt
      $(".finish-attempt").click(function() {
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
    localStorage.clear()
    let arrJawabanTWK = []
    let arrJawabanTIU = []
    let arrJawabanTKP = []
    for(let i = 1; i <= 30 ; i++) {
        let jawabanTWK = state["soal_twk"]["answer"][`${i}`]
        let jawabanTIU = state["soal_tiu"]["answer"][`${i}`]
        let jawabanTKP = state["soal_tkp"]["answer"][`${i}`]
        if ( jawabanTWK != null) {
            arrJawabanTWK.push(jawabanTWK)
        } else {
            arrJawabanTWK.push("")
        }
        if ( jawabanTIU != null) {
            arrJawabanTIU.push(jawabanTIU)
        } else {
            arrJawabanTIU.push("")
        }
        if ( jawabanTKP != null) {
            arrJawabanTKP.push(jawabanTKP)
        } else {
            arrJawabanTKP.push("")
        }
    }
    let objJawaban = {
        "id_paket" : obj.paket.id,
        "jawaban_tiu" : arrJawabanTIU,
        "jawaban_tkp" : arrJawabanTKP,
        "jawaban_twk" : arrJawabanTWK,
    }

    // Ini ajax postnya bang

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    
    $.ajax({
        type: 'POST',
        url: '',  // URL POST FINISH
        data: objJawaban,
        dataType: 'json',
        success: function(data) {
            window.location = "https://www.google.com/"  // Nunggu URL buat score
        },
        error: function(data) {
            console.log(data)
        }
    });
}