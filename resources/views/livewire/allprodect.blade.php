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
                <h1>المنتجات</h1>
                <ul class="breadcrumb side">
                    <li><i class="fa fa-home fa-lg"></i></li>
                    <li>بيع منتج</li>//
                    <li class="active"><a href="/">الرئيسيه</a></li>//
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
                            <div class="col-md-12">
                                <a href="/createpro"  class="btn btn-primary mb-5" > <i class="fa fa-plus-square" aria-hidden="true"></i>  اضافه منتج </a>
                                <!-- start create Modal -->


                                <!--end model create--->
                            </div>

                            <div class="col-md-5">
                                <div class="form-group">
                                    <input type="search"  wire:model.debounce.200ms="serch"class="form-control {{$serch !== ""?"is-valid":""}}"placeholder="بحث  با اسم المنتج">
                                </div>
                            </div>
                            <div class="col-md-4 ">
                                <div class="customize-input" >
                                    <select wire:model="order" class="custom-select custom-select-set form-control  border-3 custom-shadow custom-radius">
                                        <option value="desc">عرض من الاحدث</option>
                                        <option value="asc">عرض من الاقدم</option>

                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3 ">
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
                        <div id="getmessage111" style="display: none">

                            <div  class="alert alert-danger alert-dismissible bg-danger text-white border-0 fade show " role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                                <strong> لاتوجد بيانات مطابقه جرب كلمات اكثر دقه 😮 </strong>
                            </div>


                        </div>
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
                        @if($data->count() > 0)
                            <div class=" table-responsive">
                                <table id="multi_col_order1"
                                       class="table table-striped table-bordered text-center table-hover  display wrap" >
                                    <thead style=" background-color: #3c0303;">

                                    <tr>
                                        <th>#</th>
                                        <th>اسم المنتج</th>
                                        <th> اسم العميل</th>
                                        <th>سعر المنتج</th>
                                        <th>المقدم</th>
                                        <th> هامش الربح</th>
                                        <th> المبلغ المتبقى </th>
                                        <th> مده القسط</th>
                                        <th> القسط الشهرى</th>
                                        <th> التاريخ</th>
                                        <th> الملاحظات</th>
                                        <th> اسم الضامن</th>

                                        <th>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-settings svg-icon"><circle cx="12" cy="12" r="3"></circle><path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z"></path></svg>
                                        </th>

                                    </tr>
                                    </thead>
                                    <tbody>

                                    @if($data->count() > 0)
                                        @foreach($data as $index => $cat)
                                            <tr>
                                                <td>{{$index+1}}</td>
                                                <td>{{$cat->prodect_name}}</td>
                                                <td>{{$cat->customer->name}}</td>
                                                <td>{{$cat->prodect_price}}</td>
                                                <td>{{$cat->amount_pay}}</td>
                                                <td>{{$cat->precent}}%</td>
                                                <td>{{$cat->rem_amount}}</td>
                                                <td>{{$cat->prem_lemt}}</td>
                                                <td>{{$cat->prem_manth}}</td>
                                                <td>{{$cat->date}}</td>
                                                <td>{{substr($cat->discrption,"0","20")}}
                                                <a href="javascript:void(0)" wire:click.prevent="redmore({{$cat->id}})"class="" data-toggle="modal" data-target="#getmsgshow">{{$cat->discrption !== "" ? "...المزيد":""}} </a>
                                                </td>
                                                <td>{{$cat->teker_name}}</td>
                                                <td>
                                                    <a href="#" wire:click.prevent="edit({{$cat->id}})" class="btn btn-primary btn-sm mb-1"   style="display: inline-block"> <i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                                                    <button type="button" wire:click.prevent="showname({{$cat->id}})"class="btn btn-danger btn-sm" data-toggle="modal" data-target="#danger-alert-modal"><i class="fa fa-trash" aria-hidden="true"></i></button>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @else

                                        <script>
                                            $("#multi_col_order1").hide();
                                            $("#getmessage111").fadeIn(500);

                                        </script>



                                    @endif
                                    </tbody>
                                </table>
                                <div>

                                    @else
                                        <script>

                                            $("#getmessage33").fadeIn(500);

                                        </script>

                                    @endif
                                    <div class="row">
                                        <div class="col-md-8">
                                            {{$data->links()}}
                                        </div>
                                        <div class="col-md-4 mr-auto">


                                            <span class="text-light">  عرض {{$sel}} سجلات من اجمالى السجلات   {{$counts}} </span>
                                        </div>
                                        <!-- Danger Alert Modal -->
                                    </div>
                                </div>
                                <!-------------end table-------->
                            </div>

                    </div>
                </div>

                <!-------------------show------>



                <!----------------- end model show----->
                <div id="getmsgshow" wire:ignore.self class="modal fade" tabindex="-1" role="dialog"
                     aria-labelledby="dark-header-modalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header modal-colored-header bg-primary">
                                <h4 class="modal-title text-light" id="dark-header-modalLabel ">عرض الملاحظات</h4>
                                <button type="button" class="close" data-dismiss="modal"
                                        aria-hidden="true">×</button>
                            </div>
                            <div class="modal-body">
                                <div class="form-group">
                                    <div class="col-md-12">
                                  <textarea class="form-control" row="6" wire:model="getdes" style="overflow: hidden; height:350px" readonly>


                                </textarea>

                                </div>
                                </div>
                                <div class="modal-footer">

                                    <button type="button" wire:click="restinput" class="btn btn-light"
                                            data-dismiss="modal">Close</button>
                                </div>

                            </div>
                        </div><!-- /.modal-content -->
                    </div><!-- /.modal-dialog -->
                </div>
                <div id="danger-alert-modal"wire:ignore.self class="modal fade" tabindex="-1" role="dialog"
                     aria-hidden="true">
                    <div class="modal-dialog modal-sm">
                        <div class="modal-content modal-filled bg-danger">
                            <div class="modal-body p-4">
                                <div class="text-center">
                                    <i class="dripicons-wrong h1"></i>
                                    <h4 class="mt-2 text-light">تحذير!</h4>
                                    <h5 class="text-light">هل انت متاكد من حذف بيانات القسم </h5>
                                    <div class="form-group">

                                        <input type="text"  class="form-control readonly" readonly wire:model="name">

                                    </div>
                                    <button class="btn btn-danger btn-sm" wire:click.prevent="delete">حذف</button>
                                    <button type="button" class="btn btn-dark btn-sm" data-toggle="modal" data-target="#danger-alert-modal">الغاء</button>
                                </div>
                            </div>
                        </div><!-- /.modal-content -->
                    </div><!-- /.modal-dialog -->
                </div>

                <!-------------------model------>
            </div><!--end row-->
        </div><!--end content-wrapper-->
    </div>
