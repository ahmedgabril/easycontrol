@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

<script>


    (function( factory ) {
        if ( typeof define === "function" && define.amd ) {

            // AMD. Register as an anonymous module.
            define([ "../jquery.ui.datepicker" ], factory );
        } else {

            // Browser globals
            factory( jQuery.datepicker );
        }
    }(function( datepicker ) {
        datepicker.regional['ar'] = {
            closeText: 'إغلاق',
            prevText: '&#x3C;السابق',
            nextText: 'التالي&#x3E;',
            currentText: 'اليوم',
            monthNames: ['يناير', 'فبراير', 'مارس', 'ابرايل', 'مايو', 'يونيو',
                'يوليو', 'اغسطس', 'سيتمبر',	' اكتوبر', 'نوفمبر', 'ديسمبر'],
            monthNamesShort: ['يناير', 'فبراير', 'مارس', 'ابريل', 'مايو', 'يونيو',
                'يوليو', 'اغسطس', 'سيتمبر',	'اكتوبر', 'نوفمبر', 'ديسمبر'],
            dayNames: ['الأحد', 'الاثنين', 'الثلاثاء', 'الأربعاء', 'الخميس', 'الجمعة', 'السبت'],
            dayNamesShort: ['الأحد', 'الاثنين', 'الثلاثاء', 'الأربعاء', 'الخميس', 'الجمعة', 'السبت'],
            dayNamesMin: ['ح', 'ن', 'ث', 'ر', 'خ', 'ج', 'س'],
            weekHeader: 'أسبوع',
            dateFormat: 'yy/mm/dd',
            firstDay: 6,
            isRTL: true,
            showMonthAfterYear: false,
            yearSuffix: ''};
        datepicker.setDefaults(datepicker.regional['ar']);

        return datepicker.regional['ar'];

    }));
    // initialize datepicker
    $( "#datepicker" ).datepicker({
        isRTL:true,
        changeMonth: true,
        changeYear: true
    });
</script>
