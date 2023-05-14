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
    <title>الجمعية العمومية - غرفة بيشة</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg sticky-top mb-3">
        <div class="container">
            <img src="img/logo-of-bisha-chamber-1-1-2.png" width="70px" class="" alt="">
            <a href="{{route('index')}}" class="navbar-brand text-light fw-bold p-2">نظام التصويت</a>
            <button class="navbar-toggler text-light" type="button" data-bs-toggle="collapse" data-bs-target="#myNavbar"
             aria-controls="navbarNav" aria-expanded="true" aria-label="Toggle navigation">
             <i class="fas fa-bars"></i>
            </button>
            <div class="collapse navbar-collapse" id="myNavbar">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link text-light p-lg-2 fs-6" aria-current="page" href="https://bishacci.org.sa/">العودة إلى موقع الغرفة</a>
                    </li>
                </ul>
        </div>
    </nav>

 <div class="container">
            <div class="row">
                <div class="fo">
                    <div class="addr my-3 text-center text-dark">
                        <img src="/ehtjaj/assets/img/logo-of-bisha-chamber-1-300x300.png" width="110px" class="" alt="">
                        <p class="fw-bold fs-4"> نظام التصويت </p>
                    </div>
                    <div class="container">
                        <div class="row">
                          <div class="col align-self-start">
                          </div>
                          <div class="col align-self-center">
                              <form class="text-left "  method="POST" action="{{ route('login') }}">
                                @csrf
                                <div class="mb-3">
                                  <label for="exampleInputEmail1" class="form-label">اسم المستخدم / البريدالإلكتروني :</label>
                                  <input type="email" name="email"  class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"  value="" required autofocus>
                                   <div class="invalid-feedback" style="display:block">
                                        <strong></strong>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputPassword1" class="form-label">كلمة المرور :</label>
                                    <input  name="password"  type="password" class="form-control" id="exampleInputPassword1" required>
                                    <div class="invalid-feedback" style="display:block">
                                        <strong></strong>
                                    </div>
                                </div>
                                <div class="mb-3 form-check">
                                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                  <label class="form-check-label" for="exampleCheck1">تذكرني</label>
                                </div>
                                <div class="text-center pb-3">
                                    <button type="submit" class="btn">تسجيل الدخول</button>
                                </div>
                                <p class=""><a href="register.php">تسجيل جديد</a></p>
                                </form>
                            </div>
                              <div class="col align-self-end">
                        </div>
                        </div>
                    </div>

                    </div>

                    </div>

                    </div>
            <div class="footer-wrapper text-center">
                <div class="footer-section f-section-1">
                    <p class="">Copyright © 2022 <a target="_blank" href="https://bishacci.org.sa/">BishaChamber</a>, All rights reserved.</p>
                </div>
            </div>

                <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
