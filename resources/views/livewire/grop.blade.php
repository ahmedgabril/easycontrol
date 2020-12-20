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
                <h1>اداره العملاء</h1>
                <ul class="breadcrumb side">
                    <li><i class="fa fa-home fa-lg"></i></li>
                    <li>العملاء</li>//
                    <li class="active"><a href="/">الرئيسيه</a></li>//
                    <li class="active"><a href="/prodect">المنتجات</a></li>//
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
                                <button type="button" class="btn btn-primary mb-5" data-toggle="modal" data-target="#dark-header-modal-pro1"> <i class="fa fa-plus-square" aria-hidden="true"></i>  اضافه عميل </button>
                                <!-- start create Modal -->

                                <div id="dark-header-modal-pro1" wire:ignore.self class="modal fade" tabindex="-1" role="dialog"
                                     aria-labelledby="dark-header-modalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header modal-colored-header bg-danger">
                                                <h4 class="modal-title" id="dark-header-modalLabel">اضافه عميل جديد </h4>
                                                <button type="button" class="close" data-dismiss="modal"
                                                        aria-hidden="true">×</button>
                                            </div>
                                            <div class="modal-body">
                                                <form wire:submit.prevent="create" class="pl-3 pr-3" style="direction: rtl">

                                                    <div class="form-group">
                                                        <input class="form-control {{$name == ""?"is-invalid":"is-valid"}}" type="text" wire:model="name" id="emailaddress4" dir="auto" placeholder="ادخل اسم العميل">
                                                        @error('name')
                                                        <span class="text-danger">{{$message}}</span>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group">
                                                        <input dataformat="Y-m-d" style="background:#fff;color: #0d0e12" class="form-control {{$date == ""?"":"is-valid"}}" type="date" wire:model="date" id="emailaddress4"  >
                                                        @error('date')
                                                        <span class="text-danger">{{$message}}</span>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="emailaddress5"> موبايل</label>
                                                        <input class="form-control {{$phone !== ""?"":"is-valid"}}" type="number" wire:model="phone" id="emailaddress5"  placeholder="ادخل  رقم الموبايل">
                                                        @error('phone')
                                                        <span class="text-danger">{{$message}}</span>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group">
                                                        <input class="form-control {{$idnumber !== ""?"":"is-valid"}}" type="text" wire:model="idnumber" id="emailaddress4"  placeholder="ادخل  رقم البطاقه">
                                                        @error('idnumber')
                                                        <span class="text-danger">{{$message}}</span>
                                                        @enderror
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="password1">الوصف</label>
                                                        <textarea class="form-control"dir="auto" wire:model="dis" rows="5" placeholder=" وصف او ملاحظات "></textarea>

                                                        @error('dis')
                                                        <span class="text-danger">{{$message}}</span>
                                                        @enderror
                                                    </div>




                                                    <div class="modal-footer">
                                                        <button type="submit" class="btn btn-primary">اضافه</button>

                                                        <button type="button" wire:click="restinput" class="btn btn-light"
                                                                data-dismiss="modal">Close</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div><!-- /.modal-content -->
                                    </div><!-- /.modal-dialog -->
                                </div
                                <!--end model create--->
                            </div>

                            <div class="col-md-5">
                                <div class="form-group">
                                    <input type="search"  wire:model.debounce.200ms="serch"class="form-control {{$serch !== ""?"is-valid":""}}"placeholder="بحث  با اسم القسم">
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
                                    <th>اسم العميل</th>
                                    <th> موبايل</th>
                                    <th> رقم بطاقه</th>
                                    <th> التاريخ</th>

                                    <th>الوصف</th>
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
                                            <td>{{$cat->name}}</td>
                                            <td>{{$cat->phone}}</td>
                                            <td>{{$cat->idnumber}}</td>
                                            <td>{{$cat->date}}</td>
                                            <td>{{$cat->dis}}</td>
                                            <td>
                                                <button type="button" wire:click="edit({{$cat->id}})"class="btn btn-primary btn-sm mb-1" data-toggle="modal" data-target="#dark-header-modal-update1" style="display: inline-block"> <i class="fa fa-pencil-square-o" aria-hidden="true"></i></button>
                                                <button type="button" wire:click.prevent="edit({{$cat->id}})"class="btn btn-danger btn-sm" data-toggle="modal" data-target="#danger-alert-modal"><i class="fa fa-trash" aria-hidden="true"></i></button>
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

            <!-------------------model------>


            <div id="dark-header-modal-update1" wire:ignore.self class="modal fade" tabindex="-1" role="dialog"
                 aria-labelledby="dark-header-modalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header modal-colored-header bg-primary">
                            <h4 class="modal-title text-light" id="dark-header-modalLabel ">تعديل بيانات القسم</h4>
                            <button type="button" class="close" data-dismiss="modal"
                                    aria-hidden="true">×</button>
                        </div>
                        <div class="modal-body">
                            <form wire:submit.prevent="update" class="pl-3 pr-3">

                                <div class="form-group">
                                    <label for="emailaddress5">اسم القسم</label>
                                    <input class="form-control" type="text" wire:model="name" id="emailaddress5" placeholder="ادخل اسم القسم">
                                    <input class="form-control" type="hidden" wire:model="upid" id="emailaddress6" placeholder="ادخل اسم القسم">
                                    @error('name')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="emailaddress5"> موبايل</label>
                                    <input class="form-control {{$idnumber !== ""?"":"is-valid"}}" type="number" wire:model="phone" id="emailaddress5"  placeholder="ادخل اسم العميل">
                                    @error('phone')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="emailaddress4"> رقم البطاقه</label>
                                    <input class="form-control {{$idnumber !== ""?"":"is-valid"}}" type="text" wire:model="idnumber" id="emailaddress4"  placeholder="ادخل اسم العميل">
                                    @error('idnumber')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="password1">الوصف</label>
                                    <textarea class="form-control" wire:model="dis" rows="5"></textarea>
                                    @error('dis')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>




                        <div class="modal-footer">
                            <button type="submit" class="btn btn-success">تعديل</button>

                            <button type="button" wire:click="restinput" class="btn btn-light"
                                    data-dismiss="modal">Close</button>
                        </div>

                        </form>
                        </div>
                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->

            <!-----------------model update----->
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
</div></div>
