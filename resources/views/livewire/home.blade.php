<div>
{{$tes1}}
{{$tes}}
    <div class="col-md-5 form-group" wire:ignore>
        <select class="form-control get-c-p1"   id="demoSelect" wire:model="tes">
            <option>اختر اسم العميل</option>
           <option value="0">ahmed</option>
           <option value="1">all</option>
        </select>
    </div>

        <select class=""   wire:model="tes1">
            <option>اختر اسم العميل</option>
           <option value="0">g</option>
           <option value="1">c</option>
        </select>



</div>
@push('scripts')
    <script>

        $(function(){

            $(".get-c-p1").on("change",function (e) {
                // @this.set("tes",e.target.value);
                 @this.set("tes",e.target.value) ;
               // alert( $(this).val());
            });
        });
    </script>
    @endpush
