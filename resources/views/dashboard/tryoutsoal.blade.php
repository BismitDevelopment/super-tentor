@extends('layouts.app')
@section('navbar')
    @include('navbarDashboard')
@endsection


@section('content')
<link rel="stylesheet" href="{{ asset('css/tryoutsoal.css') }}">
<div class="wrapper">
    <div class="d-flex justify-content-between title flex-wrap">
        <h3>Try Out Serentak 01 - SKD</h3>
        <h5>Sisa Waktu: 1 Jam 30 Menit</h5>
    </div>
    <div class="d-flex menus col-12 p-0">
        <div class="menu px-3 px-lg-5 py-2">
            <h4>TWK</h4>
        </div>
        <div class="menu px-3 px-lg-5 py-2">
            <h4>TIU</h4>
        </div>
        <div class="menu px-3 px-lg-5 py-2">
            <h4>TKP</h4>
        </div>
    </div>
    <div class="d-flex soal flex-column flex-lg-row">
        <div class="d-flex flex-column justify-content-center">
            <div class="border rounded-bottom bg-white box mr-2 box-kiri">
                <div class="d-flex justify-content-between soal-atas">
                    <h4>Soal 2</h4>
                    <div class="tandai d-flex">
                        <img src="{{ asset('img/mdi_flag.svg') }}" alt="">
                        <h4>Tandai</h4>
                    </div>
                </div>
                <div class="soal-isi d-flex flex-column mt-3 text-justify">
                    <p class="mb-0">Dalam lapangan parkir tersedia enam tempat parkir berderetan, diberi nomor 1 sampai 6. Lima buah mobil yang warnanya berbeda satu sama lain, yaitu biru, hijau, merah, putih, dan hitam, akan diparkir di tempat parkir tersebut, masing-masing menempati satu tempat dengan ketentuan sebagai berikut:</p>
                    <p class="ml-4 mb-0">
                        a. mobil merah harus diparkir di 3 <br>
                        b. mobil biru harus diparkir di samping tempat mobil hitam di parkir <br>
                        c. mobil hijau tidak boleh diparkir di samping tempat mobil putih diparkir.
                    </p>
                    <p>Jika mobil hijau diparkir di 2, mana tempat parkir yang kosong?</p>
                    <form action="" class="d-flex flex-column ml-4">
                        <p class="m-0">
                            <input type="radio" id="choiceA" name="">
                            <label for="choiceA">5</label>
                        </p>
                        <p class="m-0">
                            <input type="radio" id="choiceB" name="">
                            <label for="choiceB">4</label>
                        </p>
                        <p class="m-0">
                            <input type="radio" id="choiceC" name="">
                            <label for="choiceC">3</label>
                        </p> 
                        <p class="m-0">
                            <input type="radio" id="choiceD" name="">
                            <label for="choiceD">2</label>
                        </p> <p class="m-0">
                            <input type="radio" id="choiceD" name="">
                            <label for="choiceD">1</label>
                        </p>              
                    </form>
                </div>
            </div>    
            <div class="d-flex justify-content-center my-3">
                <div class="button-kembali mt-2 py-2 px-5 mr-1 text-center">
                    Kembali
                </div>
                <div class="ml-1 button-selanjutnya mt-2 py-2 px-4 text-center">
                    Selanjutnya
                </div>
            </div>            
        </div>
        <div class="d-flex justify-content-center box-kanan">
            <div class="border bg-white p-3 rounded nomor">
                <h5>Navigasi Soal TIU</h5>
                <div class="angka mt-4">
                    <div>1</div>
                    <div>2</div>
                    <div>3</div>
                    <div>4</div>
                    <div>5</div>
                    <div>6</div>
                    <div>7</div>
                    <div>8</div>
                    <div>9</div>
                    <div>10</div>
                    <div>11</div>
                    <div>12</div>
                    <div>13</div>
                    <div>14</div>
                    <div>15</div>
                    <div>16</div>
                    <div>17</div>
                    <div>18</div>
                    <div>19</div>
                    <div>20</div>
                    <div>21</div>
                    <div>22</div>
                    <div>23</div>
                    <div>24</div>
                    <div>25</div>
                    <div>26</div>
                    <div>27</div>
                    <div>28</div>
                    <div>29</div>
                    <div>30</div>
                </div>
                <div class="d-flex justify-content-center mt-4">
                    <div class="button-tipe mt-2 py-2 px-4">
                        Tipe Soal Berikut
                    </div>
                </div>
            </div>    
        </div>
    </div>
</div>
@endsection
