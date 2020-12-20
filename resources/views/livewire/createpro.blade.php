<div>

 <div class="content-wrapper">
        <div id="getmessage22">
            @if (session()->has('message'))
                <div  class="alert alert-success alert-dismissible bg-success text-white border-0 fade show timeout" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <strong>{{ session('message') }} </strong>
                </div>

            @endif
        </div>

        <div class="page-title">
            <div>
                <h1>اضافه منتج</h1>
                <ul class="breadcrumb side">
                    <li><i class="fa fa-home fa-lg"></i></li>
                    <li>اضافه منتج</li>//
                    <li class="active"><a href="/">الرئيسيه</a></li>//
                    <li class="active"><a href="/prodect">المنتجات</a></li>//
                    <li class="active"><a href="/grop">اداره العملاء</a></li>//
                    <li class="active"><a href="/premmanth">تسجيل قسط</a></li>
                </ul>
            </div>
        </div><!--end bred cramp-->
        <div class="row">

            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">

                        <div class="row">
                <div class="col-md-10">
                    <a href="/prodect"  class="btn btn-danger mb-5" > <i class="fa fa-arrow-circle-right" aria-hidden="true"></i>   الصفحه السابقه </a>

                </div><!---end col-md-10--->

                     <div class="form-group col-md-4">
                         <input type="text" id="inputValid" wire:model="prodect_name"class="form-control {{$prodect_name == ""?"":"is-valid"}}" placeholder="بحث بأاسم المنتج">
                         @error('prodect_name')
                         <span class="text-danger">{{$message}}</span>
                         @enderror
                     </div>

                            <div class="form-group col-md-4">
                                <select  wire:model="customer_name"class="form-control {{$customer_name == ""?"":"is-valid"}} " required >
                                    <option value="">اختر اسم العميل</option>
                                 @foreach($data as $getdata)

                              <option value="{{$getdata->id}}">  {{$getdata->name}} </option>

                                     @endforeach


                                </select>
                                @error('customer_name')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>

                            <div class="form-group col-md-4">
                                <input type="date" class="form-control {{$date == ""?"":"is-valid"}}" wire:model="date" style="background:#fff;color:#000000">
                                @error('date')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="form-group col-md-4">
                                <input type="number" wire:model="prodect_price"class="form-control {{$prodect_price == ""?"":"is-valid"}} " placeholder="ادخل  سعر المنتج">
                                @error('prodect_price')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>

                            <div class="form-group col-md-4">
                                <input type="number"   wire:model="amount_pay"class="form-control {{$amount_pay == ""?"":"is-valid"}}" placeholder="  المبلغ المدفوع مقدما">
                                @error('amount_pay')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="form-group col-md-4">
                                <input type="number"   wire:model="precent" class="form-control {{$precent == ""?"":"is-valid"}} " placeholder=" هامش الربح %">
                                @error('precent')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="form-group col-md-4">
                                <input type="number"  wire:model="rem_amount"class="form-control {{$rem_amount == ""?"":"is-valid"}} " placeholder="  المبلغ المتبقى ">
                                @error('rem_amount')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="form-group col-md-4">
                                <input type="number"  wire:model="prem_lemt"class="form-control {{$prem_lemt == ""?"":"is-valid"}} " placeholder="   مده القسط ">
                                @error('prem_lemt')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="form-group col-md-4">
                                <input type="number"  wire:model="manthpay"class="form-control {{$manthpay == ""?"":"is-valid"}} " placeholder="   القسط الشهرى ">
                                @error('manthpay')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <hr>

                            <div class="form-group col-md-4">
                                <input type="text"   wire:model="taker_name"class="form-control {{$taker_name == ""?"":"is-valid"}}" placeholder="   اسم الضامن {اختيارى} ">
                                @error('taker_name')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="form-group col-md-4">
                                <input type="number"  wire:model="taker_phone"class="form-control {{$taker_phone == ""?"":"is-valid"}} " placeholder="   موبايل {اختيارى} ">
                                @error('taker_phone')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="form-group col-md-4">
                                <input type="number"   wire:model="taker_id"class="form-control {{$taker_id == ""?"":"is-valid"}}" placeholder="  رقم بطاقه {اختيارى} ">
                                @error('taker_id')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="form-group col-md-12">
                            <textarea class="form-control {{$descrption == ""?"":"is-valid"}} " rows="4" wire:model="descrption" placeholder=" ملاحظات {اختيارى}"></textarea>
                                @error('descrption')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>


                            <div class="form-group col-md-6">
                           <button type="button" wire:click.prevent="create" class="btn btn-success">اضافه منتج <i class="fa fa-plus-square"></i></button>
                            </div>

                        </div><!----end inner row--->

                     </div><!----card -body--->
                    </div><!----card--->
               </div><!---end man col--->
            </div><!--end row-->
        </div><!--end content-wrapper-->







    </div>
