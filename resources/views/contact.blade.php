
@extends('layouts.user')
@section('content')
 <div class="container">
            <div class="row">
                <div class="fo">
                    <div class="addr my-3 text-center"><p class="fw-bold fs-4"> للتواصل مباشرة معنا   :

                    </p>
                    </div>
                    <div class="form1 m-4">
                        <form>                          
                            <div class="row py-3">
                                <div class="col-4">
                                    <label>الاسم  *  :</label>
                                    <input type="text" class="form-control" id="inputAddress" placeholder="">
                                </div>
                                <div class="col-4">
                                    <label> رقم الجوال * :</label>
                                    <input type="text" class="form-control" id="inputAddress" placeholder="">
                                </div>
                                <div class="col pt-3">
                                    <label> رسالتك  * :</label>
                                    <textarea type="texta" class="form-control" id="inputAddress" ></textarea>
                                </div>
                            </div>
          
    
                            <div>
                                <button type="button" class="btn bg-c-blue"> ارسال</button>
                            </div>
                        </form>
                    </div>
                </div>                
                
                <div class="footer-wrapper text-center">
                    <div class="footer-section f-section-1">
                        <p class="">Copyright © 2022 <a target="_blank" href="https://bishacci.org.sa/">BishaChamber</a>, All rights reserved.</p>
                    </div>
                </div>
    
            </div>
        </div>
@endsection