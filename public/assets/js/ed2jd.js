$(document).ready(function() {
    
    $('#ut_start').timepicker({
        showSeconds: false,
        showMeridian: false,
        minuteStep: 1,
    });
    $('#ut_stop').timepicker({
        showSeconds: false,
        showMeridian: false,
        minuteStep: 1,
    });
    
    $('.datepicker').datepicker({format:'yyyy-mm-dd'})
    .on('changeDate', function(ev){
//        console.log('miko');
        timestamp = ev.date.valueOf();
        var date = new Date(timestamp);
//        console.log('miko'+timestamp);
        $('#jd').val(EvalJD(date));
    });
    var myDate = $('#ed').val();
    myDate=myDate.split("-");
    var newDate=myDate[1]+"/"+myDate[2]+"/"+myDate[0];
    time = new Date(newDate).getTime();
//    console.log('miko'+time);
    var date = new Date(time);
    $('#jd').val(EvalJD(date));
});

function EvalJD(date) {
    var dzien = date.getDate();
    var miesiac = date.getMonth()+1;
    var rok = date.getFullYear();
    var X = (miesiac + 9) / 12;
    var A = 4716+rok+parseInt(X);
    var Y = 275*miesiac/9;
    var V = 7*A/4;
    var aaa = parseInt(Y);
    var bbb = parseInt(V);
    var B = 1729279.5+367*rok+aaa-bbb+dzien;
    var Q = (A+83)/100;
    var C = parseInt(Q);
    var W = 3*(C+1)/4;
    var E = parseInt(W);
    var JD=B-E+38.5;
    return JD;
    //form.data_jd.value = JD;
}