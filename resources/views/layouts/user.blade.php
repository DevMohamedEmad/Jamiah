
@php
use App\Models\meeting;

$meeting = meeting::latest()->first();


@endphp
<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.rtl.min.css" integrity="sha384-gXt9imSW0VcJVHezoNQsP+TNrjYXoGcrqBZJpry9zJt8PCQjobwmhMGaDHTASo9N" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('style.css') }} ">
    <!-- icon  -->
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!-- google fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;700;800;900&display=swap" rel="stylesheet">
    <title>الجمعية العمومية - غرفة بيشة </title>
<style>
    body{
    font-family: 'Cairo', sans-serif;
    background-color: #fafafa;
    //*background-image: url("https://e.top4top.io/p_2651uweym1.png");background-repeat: no-repeat;background-position: center; *//
}
.navbar{
    padding-bottom: 10px;
    background: linear-gradient(45deg,#244861,#3b7197);
}
.btn{
    background-color: #025287;
    color: white;

}
.nav-link{
    font-size: 24px;
}
.c1{
    background-color: rgb(245, 245, 245);
    border: 2px solid rgb(245, 245, 245);
    border-radius: 8px;
    padding: 5px;
}
.fo{
    background-color: #fff;
    border: 2px solid #fff;
    padding: 15px;
    border-radius: 15px;
    box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;
}
.ch1{
    box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;
}
a:link
{
text-decoration: none;
}
a:visited
{
text-decoration: none;
}
a:active
{
text-decoration: none;
}
a:hover
{
text-decoration: none;
}
a.forumlink:hover
{
text-decoration:none;
}

.order-card {
    color: #fff;
}

.bg-c-blue {
    background: linear-gradient(45deg,#244861,#3b7197);
}

.bg-c-green {
    background: linear-gradient(35deg,#2ed8b6,#1a8c75);
}

.bg-c-yellow {
    background: linear-gradient(75deg,#FFB64D,#ffcb80);
}

.bg-c-pink {
    background: linear-gradient(45deg,#FF5370,#ff869a);
}
.bg-c-red {
    background: linear-gradient(35deg,#f30029,#910119);
}
.bg-c-accept {
    background: linear-gradient(45deg,#4a00b0,#4e33ff);
}


.card {
    border-radius: 5px;
    -webkit-box-shadow: 0 1px 2.94px 0.06px rgba(4,26,55,0.16);
    box-shadow: 0 1px 2.94px 0.06px rgba(4,26,55,0.16);
    border: none;
    margin-bottom: 30px;
    -webkit-transition: all 0.3s ease-in-out;
    transition: all 0.3s ease-in-out;
}

.card .card-block {
    padding: 25px;
}

.order-card i {
    font-size: 26px;
}

.f-left {
    float: left;
}

.f-right {
    float: right;
}
.btn2{
    background-color: red;
    color: white;
}
.btn:hover {
  color: #e3e2e0;
}
</style>
</head>
<body>
    <nav class="navbar navbar-expand-lg sticky-top mb-3">
        <div class="container">
            <img src="https://j.top4top.io/p_2651s9u8n1.png" width="70px" class="" alt="">
            <a href="https://jamiah.online/bishacci" class="navbar-brand text-light fw-bold p-2">نظام التصويت</a>
            <button class="navbar-toggler text-light" type="button" data-bs-toggle="collapse" data-bs-target="#myNavbar"
            aria-controls="navbarNav" aria-expanded="true" aria-label="Toggle navigation">
            <i class="fas fa-bars"></i>
          </button>
          <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="navbar-nav ms-auto">
              <li class="nav-item">
                <a class="nav-link text-light p-lg-2 fs-6" aria-current="page" target="_blank" href="https://bishacci.org.sa/">العودة إلى موقع الغرفة </a>
              </li>
          </div>
        </div>
   {{--  --}}
   @if (Route::has('login'))
   <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right">
       @auth
       <a href="{{ route('home') }}" class="text-white m-3"style="font-weight: bold" >لوحة التحكم</a>

       @else
           <a href="{{ route('login') }}" class="text-white m-3"style="font-weight: bold" >لوحة التحكم</a>
       @endauth
   </div>
@endif
<a href="{{ route('index') }}" class="text-white m-3"style="font-weight: bold" >الصفحة الرئيسية</a>

    </nav>

    <div class="container">
        <div class="row">
            <div class="col-md-4 col-xl-6">
                <div class="card bg-c-green order-card">
                    <a target="_blank" href="https://teams.live.com/meet/948388323369?p=HMIfjG2qJPmk66mIUV">
                    <div class="card-block text-light">
                        <h2 class="text-right"><i class="fa fa-link f-left"></i><span>رابط الاجتماع</span></h2>
                    </div>
                </a>
                </div>
            </div>
            <div class="col-md-4 col-xl-6">
                <div class="card bg-c-yellow order-card">
                    <a target="_blank" href="https://bishacci.org.sa/%d8%a5%d8%b9%d9%84%d8%a7%d9%86-%d8%a7%d9%84%d8%ac%d9%85%d8%b9%d9%8a%d8%a9-%d8%a7%d9%84%d8%b9%d9%85%d9%88%d9%85%d9%8a%d8%a9-%d9%84%d9%84%d8%ba%d8%b1%d9%81%d8%a9/">
                    <div class="card-block text-light">
                        <h2 class="text-right"><i class="fa fa-info f-left"></i><span>إعلان الاجتماع</span></h2>
                    </div>
                    </a>
                </div>
            </div>

         <!--   <div class="col-md-4 col-xl-4">
                <div class="card bg-c-yellow order-card">
                <a href="#">
                    <div class="card-block text-light">
                        <h2 class="text-right"><i class="fa fa-phone f-left"></i><span>تواصل معنا</span></h2>
                    </div>
                </a>
                </div>-->
            </div>
        </div>

    </div>




@yield('content')





<div class="footer-wrapper text-center">
    <div class="footer-section f-section-1">
        <p class="">Copyright © 2022 <a target="_blank" href="https://bishacci.org.sa/">BishaChamber</a>, All rights reserved.</p>
    </div>
</div>

</div>
</div>
<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
