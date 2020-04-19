<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth','verified']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    //route for free tryout
    public function tryout_free() {
        $temp_data = [
            "Try Out Serentak 01 - SKD",
            "Try Out Serentak 02 - SKD",
            "Try Out Serentak 03 - SKD",
            "Try Out Serentak 04 - SKD",
            "Try Out Serentak 05 - SKD"
        ];
        return view('dashboard.tryoutFree',['tests'=>$temp_data]);
    }

    public function tryouthome()
    {
        return view('dashboard.tryouthome');
    }

    public function tryoutsoal()
    {
        // Dummy soal
        $soal_1 = [
            "nomor" => "1",
            "soal" => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Provident tempora enim rem sint cum dolorum debitis totam, quo nesciunt, sapiente eveniet magnam qui eligendi velit quae alias eius accusamus iste ipsa ipsum ratione odio laudantium sequi maxime! Doloremque, minima sint?",
            "choiceA" => "Apel",
            "choiceB" => "Buah",
            "choiceC" => "Cerry",
            "choiceD" => "Durian",
            "choiceE" => "Elle"
        ];
        $soal_2 = [
            "nomor" => "2",
            "soal" => "Dalam lapangan parkir tersedia enam tempat parkir berderetan, diberi nomor 1 sampai 6. Lima buah mobil yang warnanya berbeda satu sama lain, yaitu biru, hijau, merah, putih, dan hitam, akan diparkir di tempat parkir tersebut, masing-masing menempati satu tempat dengan ketentuan sebagai berikut:
a. mobil merah harus diparkir di 3
b. mobil biru harus diparkir di samping tempat mobil hitam di parkir
c. mobil hijau tidak boleh diparkir di samping tempat mobil putih diparkir.
Jika mobil hijau diparkir di 2, mana tempat parkir yang kosong?",
            "choiceA" => "5",
            "choiceB" => "4",
            "choiceC" => "3",
            "choiceD" => "2",
            "choiceE" => "1"
        ]; 
        $soal_3 = [
            "nomor" => "3",
            "soal" => "Lorem ipsum dolor sit amet consectetur, adipisicing elit. Labore rerum assumenda laudantium debitis sint minima quaerat dolor nostrum eaque ex eligendi expedita nam commodi incidunt, minus perferendis consequatur ipsa perspiciatis numquam! Vitae minus nemo non.",
            "choiceA" => "Gajah",
            "choiceB" => "Lemonade",
            "choiceC" => "Makan",
            "choiceD" => "Puasa",
            "choiceE" => "Human"
        ]; 
        $soal_4 = [
            "nomor" => "4",
            "soal" => "Lorem ipsum dolor, sit amet consectetur adipisicing elit. Voluptatibus earum quos voluptas repellendus ducimus sed minima in. Soluta fugit iure fugiat distinctio voluptates consectetur dolore consequuntur corrupti cumque harum, omnis sunt, accusantium non beatae nemo voluptatibus delectus unde eligendi nisi rerum ipsum exercitationem.",
            "choiceA" => "Kucing",
            "choiceB" => "Anjing",
            "choiceC" => "Burung",
            "choiceD" => "Ular",
            "choiceE" => "Polisi"
        ];
        $soal = [
            "soal1" => $soal_1,
            "soal2" => $soal_2,
            "soal3" => $soal_3,
            "soal4" => $soal_4,
        ];
        return view('dashboard.tryoutsoal', ["soals"=>$soal]);
    }
}
