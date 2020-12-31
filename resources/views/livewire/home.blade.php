<div>


    {{$dater}}
   
      
        
    <div class="row clearfix">
        <div class="col-xs-3">
            <h2 class="card-inside-title">Text Input</h2>
            <div class="form-group">
                <div class="form-line " id="bs_datepicker_container">
                    <input type="text" class="form-control datepicker" placeholder="Please choose a date...">
                </div>
            </div>
        </div>
      
        
        <input type="text" class="reportrange1" wire:model="dater" />
       
          
        
 


</div>
@push('scripts')
    <script>

        $(function(){

            $(".reportrange1").on("change",function (e) {
                // @this.set("tes",e.target.value);
                 @this.set("dater",e.target.value) ;
               // alert( $(this).val());
            });
        });
    </script>
    @endpush
