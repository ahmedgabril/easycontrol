<div>


      

            <div class="page-title">
                <div>
                    <h1>  تقارير المبيعات</h1>
                    <ul class="breadcrumb side">
                        <li><i class="fa fa-home fa-lg"></i></li>
                        <li>   تقارير المبيعات</li>//
                        <li class="active"><a href="/">الرئيسيه</a></li>//
                        <li class="active"><a href="/grop">العملاء</a></li>//
                        <li class="active"><a href="/prodect">المنتجات</a></li>//
                        <li class="active"><a href="/premmanth">الاقساط</a></li>//
                        <li class="active"><a href="/pro">تقارير المبيعات</a></li>//
                        <li class="active"><a href="/repoc">تقارير العملاء</a></li>//
                    </ul>
                </div>
            </div><!--end bred cramp-->
         
        
       
            <div class="row">
         
                <div class="col-sm-6 col-md-6">
                    <div class="card">
    
                        <div class="card-body">
                        <div class="row">
                          <div class="col-md-5">
                           <h6>اجمالى المبيعات</h6>

                          </div>
                          <div class="col-md-7">
                   <span>{{ $data }}</span>
 
                           </div>

                  

                        </div><!--endrow--->
                  
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-6">
                    <div class="card">
    
                        <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <h6>عدد عمليات  المبيعات</h6>
     
                                </div>
                                <div class="col-md-6">
                                    <span>{{ $count }}</span>
      
                                </div>
                             </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="card" style="margin-top: 10px">
                        <div class="card-body">

                            <div class="row">

                                <div class="col-md-5 form-group">
                               <input type="date" wire:model="datestart" class="form-control" style="color:black;background-color:#fff">
                                </div>
                                <div class="col-md-5 form-group">
                               <input type="date" wire:model="dateend"class="form-control" style="color:black;background-color:#fff">
                                </div>
                                <div class="col-md-2 form-group">
                                    <button type="button" wire:click="getdate" class="btn btn-primary">ابحث</button>
                                </div>
                         
                              <div class="col-md-3 form-group">
                                    <button type="button" class=" print btn btn-warning" onclick="window.print()">طباعه <i class="fa fa-print" aria-hidden="true"></i>
                                    </button>
                                </div>

                                <div class="col-md-3 ">
                                    <div class="customize-input ">
                                        <select wire:model="sel" class="custom-select  form-control  border-3 ">
                                            <option value="5">5</option>
                                            <option value="10">10</option>
                                            <option value="20">20</option>
                                            <option value="30">30</option>
                                            <option value="50">50</option>
                                            <option value="100">100</option>
                                        </select>
                                    </div>
                                </div>

                            </div><!-----end row header---->

                            <!--end massge-->
                            <div id="getmessage33" style="display: none">

                                <div  class="alert alert-danger alert-dismissible bg-danger text-white border-0 fade show " role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                    <strong> لاتوجد بيانات   متاحه يمكن الاطلاع عليها 📜 📜 📜 📜 📜 📜 📜 📜 📜    </strong>
                                </div>


                            </div>
                       
                                
                         
                     
                            <!--end massge-->
            
                    
                  
                                    @if ($status) 
                                        <div class="row">
                                    <div class="col-sm-6 col-md-6">
                                        <div class="card" style="background-color: rgb(0 0 0)">
                        
                                            <div class="card-body">
                                            <div class="row">
                                              <div class="col-md-5">
                                               <h6>اجمالى المبيعات</h6>
                    
                                              </div>
                                              <div class="col-md-7">
                                       <span>{{ $getsum }}</span>
                     
                                               </div>
                    
                                      
                    
                                            </div><!--endrow--->
                                      
                                            </div>
                                        </div>
                                    </div>





                                    <div class="col-sm-6 col-md-6">
                                        <div class="card" style="background-color:#020817">
                        
                                            <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <h6>عدد عمليات  المبيعات</h6>
                         
                                                    </div>
                                                    <div class="col-md-6">
                                                        <span>{{ $getcount }}</span>
                          
                                                    </div>
                                                 </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                
                              @if ($getdata->count() > 0)
                            <!---------table------>


                                <div class=" table-responsive" id="printt">
                                    <table id="multi_col_order22" style="margin-top: 17px;"
                                           class=" pr table table-striped table-bordered text-center table-hover  display no wrap" >
                                        <thead style=" background-color: #3c0303;">

                                        <tr>
                                       
                                            <th>اسم العميل</th>
                                            <th> اسم المنتج</th>
                                
                                            <th>  سعر المنتج</th>
                                       
                                            <th>  التاريخ</th>


                                            <th>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-settings svg-icon"><circle cx="12" cy="12" r="3"></circle><path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z"></path></svg>
                                            </th>

                                        </tr>
                                        </thead>
                                        <tbody>
                                   
                                        @foreach($getdata  as  $cat)

                    

                                            <tr>
                                           
                                                <td>{{$cat->customer->name}}</td>
                                                <td>{{$cat->prodect_name}}</td>
                                                <td>{{$cat->prodect_price}}</td>
                                     
                                           

                      


                                                <td>
                                                    {{$cat->date}}
                                                </td>
                                     
                                            </tr>

                                        @endforeach
                                        @else
                                            <script>

                                                $("#getmessage33").fadeIn(500);

                                            </script>
                                         @endif
                                        </tbody>
                                    </table>




                                    <div class="row">
                                        <div class="col-md-8">
                                            {{$getdata->links()}}
                                        </div>
                                        <div class="col-md-4 mr-auto">


                                            <span class="text-light">  عرض {{$sel}} سجلات من اجمالى السجلات   </span>
                                        </div>
                                    </div>
                                
                                    @endif
                                            <!-- Danger Alert Modal -->
                                    </div>


                                </div>
                         
                                <!-------------end table-------->

                        </div>

                    </div>
                </div><!---end-min-col-12--->


            </div><!--end row-->
        </div><!--end content-wrapper-->

</div>

