$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

var slider = document.getElementById("slider-donate");
var selector = document.getElementById("selector");
var selectValue = document.getElementById("selectValue");
var span_progressBar = document.getElementById("span-progressBar");
var tempValue = document.getElementById("tempValue");

selectValue.innerHTML = "$" + slider.value;

slider.oninput = function() {

    selectValue.innerHTML = "$" + this.value;
    selector.style.left = this.value / 10 + "%";
    span_progressBar.style.width = this.value / 10 + "%";
    slider.setAttribute('value', this.value);
    tempValue.setAttribute('value', this.value);
    $('#tempValue').val(this.value);

}

$(function($) {
    $('.cc-number').payment('formatCardNumber');
    $('.cc-exp').payment('formatCardExpiry');
    $('.cc-cvc').payment('formatCardCVC');
    $.fn.toggleInputError = function(erred) {
        this.parent('.form-group').toggleClass('has-error', erred);
        return this;
    };
    $('form').submit(function(e) {
        e.preventDefault();
        var cardType = $.payment.cardType($('.cc-number').val());
        $('.cc-number').toggleInputError(!$.payment.validateCardNumber($('.cc-number').val()));
        $('.cc-exp').toggleInputError(!$.payment.validateCardExpiry($('.cc-exp').payment(
            'cardExpiryVal')));
        $('.cc-cvc').toggleInputError(!$.payment.validateCardCVC($('.cc-cvc').val(), cardType));
        $('.cc-brand').text(cardType);
        $('.validation').removeClass('text-danger text-success');
        $('.validation').addClass($('.has-error').length ? 'text-danger' : 'text-success');
    });
});

$("#form-data").submit(function() {
    var ccExp = $('#cc-exp').val();
    var tempCcExp = Number(ccExp.slice(-2));
    if(tempCcExp >=1 && tempCcExp <=31 ){

        var dataString = $("#form-data").serialize();
        $.ajax({
            type: 'POST',
            dataType: 'JSON',
            url: '/save-customer-donate',
            data: dataString,
            success: function(result) {
                resetInput()
                $('.cc-number').val('');
                $('.cc-cvc').val('');
                $('#tempValue').val('10');

                alert(result.message);

            },
            error: function(result) {
                alert("Donation failed. Please try again!");
            },
        });
    }
    else{
        alert("EXPIRATION does not match the MM / DD format.");
        $('.cc-exp').val('');
    }

});

function resetInput(){
    var a = $('#tempValue').val('10');
    selectValue.innerHTML = "$" + 10;
    selector.style.left = 10 / 10 + "%";
    span_progressBar.style.width = 10 / 10 + "%";
    slider.setAttribute('value', 10);
    tempValue.setAttribute('value', 10);
}

function changeValue(value){
    oldValue = value;
    if(tempValue.value >= 10 && tempValue.value <= 1000){
        selectValue.innerHTML = "$" + tempValue.value;
        selector.style.left = tempValue.value / 10 + "%";
        span_progressBar.style.width = tempValue.value / 10 + "%";
        slider.setAttribute('value', tempValue.value);
    } else {
        resetInput();
    }
}

