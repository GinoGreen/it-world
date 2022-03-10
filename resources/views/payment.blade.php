@extends('layouts.admin')
@section('content')

<div id="dropin-container"></div>
<button id="submit-button" class="button button--small button--green">Purchase</button>

<script>
  var button = document.querySelector('#submit-button');

  braintree.dropin.create({
    authorization: 'sandbox_g42y39zw_348pk9cgf3bgyw2b',
    selector: '#dropin-container'
  }, function (err, instance) {
    button.addEventListener('click', function () {
      instance.requestPaymentMethod(function (err, payload) {
        // Submit payload.nonce to your server
      });
    })
  });
  button.addEventListener('click', function () {
    instance.requestPaymentMethod(function (err, payload) {
        (function($) {
            $(function() {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type: "POST",
                    url: "{{route('admin.orders.make.payment')}}",
                    data: {nonce : payload.nonce},
                    success: function (data) {
                        console.log('success',payload.nonce)
                    },
                    error: function (data) {
                        console.log('error',payload.nonce)
                    }
                });
            });
        })(jQuery);
    });
  });
</script>
   
  
   
@endsection