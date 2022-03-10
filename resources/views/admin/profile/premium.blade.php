@extends('layouts.admin')

@section('content')
<div class="">

   <section class="">
      <h1 class="text-white">Piano Premium</h1>
   </section>

   <form method="POST" action="{{ route('admin.payment') }}">
      @csrf
      @method('POST')
      <div id="dropin-container"></div>
      <input type="hidden" id="nonce" name="payment_method_nonce">
      <button type="submit" id="submit-button" class="button button--small button--green">Purchase</button>
   </form>

</div>
<script>
   var button = document.querySelector('#submit-button');
   var token = "{{$token}}"

   braintree.dropin.create({
      authorization: token,
      selector: '#dropin-container'
      }, function (err, instance) {

         if (err) {
            console.log('error', err);
            return;
         }
         
         
         document.querySelector('form').addEventListener('submit', function () {

            instance.requestPaymentMethod(function (err, payload) {
               // Submit payload.nonce to your server
               if (err) {
                  console.log('errorRequestPaymentMethod', err);
                  return;
               }

               document.querySelector('#nonce').value = payload.nonce;
               form.submit();
            });
      })
   });
</script>
@endsection

@section('title')
   Premium
@endsection