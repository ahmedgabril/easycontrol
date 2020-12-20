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
                <h1>اداره الاقساط</h1>
                <ul class="breadcrumb side">
                    <li><i class="fa fa-home fa-lg"></i></li>
                    <li>تسجيل قسط</li>//
                    <li class="active"><a href="/">الرئيسيه</a></li>//
                    <li class="active"><a href="/grop">العملاء</a></li>//
                    <li class="active"><a href="/prodect">المنتجات</a></li>//
                </ul>
            </div>
        </div><!--end bred cramp-->


        <div class="row">


            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">

                              <div class="col-md-5 form-group" wire:ignore>
                                 <select class="form-control get-c-p"   id="demoSelect" wire:model="getcustomer">
                                     <option>اختر اسم العميل</option>
                                     @foreach($getcust as $customer)
                                     <option value="{{$customer->id}}">{{$customer->name}}</option>
                                     @endforeach
                                 </select>
                              </div>
                            <div class="col-md-5 form-group">
                                <select class="form-control"wire:model="getprodect">
                                    <option>اختر اسم المنتج</option>
                                    @foreach($prodects as $data1)

                                    <option value="{{$data1->id}}">{{$data1->prodect_name}}</option>
                                        @endforeach
                                </select>
                            </div>

                            <div class="col-md-2 ">
                                <div class="customize-input ">
                                    <select wire:model="sel" class="custom-select  form-control  border-3 ">
                                        <option>5</option>
                                        <option>10</option>
                                        <option>20</option>
                                        <option>30</option>
                                        <option>50</option>
                                        <option>100</option>
                                    </select>
                                </div>
                            </div>

                        </div><!-----end row header---->
                        <!----massge--->
                        <!--end massge-->
                        <div id="getmessage33" style="display: none">

                            <div  class="alert alert-danger alert-dismissible bg-danger text-white border-0 fade show " role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                                <strong> لاتوجد بيانات  منتجات متاحه يمكن الاطلاع عليها 📜 📜 📜 📜 📜 📜 📜 📜 📜    </strong>
                            </div>


                        </div>
                        <!--end massge-->
                        <!---------table------>
                        @if($getaction->count() > 0)
                            <div class=" table-responsive">
                                <table id="multi_col_order1"
                                       class="table table-striped table-bordered text-center table-hover  display no wrap" >
                                    <thead style=" background-color: #3c0303;">

                                    <tr>
                                        <th>#</th>
                                        <th>اسم العميل</th>
                                        <th> اسم المنتج</th>
                                        <th> القسط الشهرى</th>
                                      <th> المبلغ المدفوع</th>
                                        <th>  الملاحظات</th>
                                        <th>  التاريخ</th>


                                        <th>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-settings svg-icon"><circle cx="12" cy="12" r="3"></circle><path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z"></path></svg>
                                        </th>

                                    </tr>
                                    </thead>
                                    <tbody>

                                 @foreach($getaction as $index => $cat)



                                       <tr class="{{$cat->amount_manth >= $cat->prodect->prem_manth ?"iscomp":""}}">
                                           <td>{{$index+1}}</td>
                                           <td>{{$cat->customer->name}}</td>
                                           <td>{{$cat->prodect->prodect_name}}</td>
                                           <td>{{$cat->prodect->prem_manth}}</td>
                                           <td>{{$cat->amount_manth }}</td>

                                           <td>{{   $cat->disc2  }} <br>


                                              <a href="javscript:void(0)" wire:click=edit({{$cat->id}}) data-toggle="modal" data-target="#show1">{{ substr($cat->discrption,0,20)}}</a>


                                           </td>


                                           <td>
                                               {{$cat->date}}
                                           </td>
                                           <td>
                                               <button type="button" wire:click="edit({{$cat->id}})" class="btn btn-primary btn-sm mb-1" data-toggle="modal" data-target="#dark-header-modal-update1" style="display: inline-block"> <i class="fa fa-pencil-square-o" aria-hidden="true"></i></button>
                                           </td>
                                       </tr>

                                 @endforeach

                                    </tbody>
                                </table>
                                <div class="row">
                                    <div class="col-md-8">
                                        {{$getaction->links()}}
                                    </div>
                                    <div class="col-md-4 mr-auto">


                                        <span class="text-light">  عرض {{$sel}} سجلات من اجمالى السجلات   {{$counts}} </span>
                                    </div>
                                </div>
                            </div>

                                @else
                                        <script>

                                            $("#getmessage33").fadeIn(500);

                                        </script>


                                            <!-- Danger Alert Modal -->

                                  @endif


                                <!-------------end table-------->
                            </div>

                    </div>
                </div>

                <!-------------------model------>


                <div id="dark-header-modal-update1" wire:ignore.self class="modal fade" tabindex="-1" role="dialog"
                     aria-labelledby="dark-header-modalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header modal-colored-header bg-primary">
                                <h4 class="modal-title text-light" id="dark-header-modalLabel ">  تسجيل قسط</h4>
                                <button type="button" class="close" data-dismiss="modal"
                                        aria-hidden="true">×</button>
                            </div>
                            <div class="modal-body">
                                <form wire:submit.prevent="update" class="pl-3 pr-3">

                                    <div class="form-group">
                                        <label for="emailaddress5"> القسط الشهرى </label>
                                        <input class="form-control" type="number" wire:model="name" id="emailaddress5" placeholder="ادخل  المبلغ ">

                                        @error('name')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="password1">تقاير</label>
                                        <input class="form-control" wire:model="dis2" >
                                        @error('dis')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="password1">ملاحظات اضافيه</label>
                                        <textarea class="form-control" wire:model="dis" rows="5"></textarea>
                                        @error('dis')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>




                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-success">تعديل</button>

                                        <button type="button"  class="btn btn-light"
                                                data-dismiss="modal">Close</button>
                                    </div>

                                </form>
                            </div>
                        </div><!-- /.modal-content -->
                    </div><!-- /.modal-dialog -->
                </div><!-- /.modal -->

                <!-----------------model update----->
                <div id="show1" wire:ignore.self class="modal fade" tabindex="-1" role="dialog"
                     aria-labelledby="dark-header-modalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header modal-colored-header bg-primary">
                                <h4 class="modal-title text-light" id="dark-header-modalLabel ">  تسجيل قسط</h4>
                                <button type="button" class="close" data-dismiss="modal"
                                        aria-hidden="true">×</button>
                            </div>
                            <div class="modal-body">
                                <form wire:submit.prevent="show" class="pl-3 pr-3">



                                    <div class="form-group">
                                        <label for="password1"> عرض الملاحظات الاضافيه</label>
                                        <textarea class="form-control" wire:model="dis" rows="5"></textarea>

                                    </div>




                                    <div class="modal-footer">

                                        <button type="button"  class="btn btn-light"
                                                data-dismiss="modal">اغلاق</button>
                                    </div>

                                </form>
                            </div>
                        </div><!-- /.modal-content -->
                    </div><!-- /.modal-dialog -->
                </div><!-- /.modal -->

                <!-------------------model------>
            </div><!--end row-->
        </div><!--end content-wrapper-->


</div>
@push('scripts')
    <script>

        $(function(){

            $(".get-c-p").on("change",function (e) {
                // @this.set("tes",e.target.value);
            @this.set("getcustomer",e.target.value) ;
                // alert( $(this).val());
            });
        });
    </script>
@endpush
