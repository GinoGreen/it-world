@extends('layouts.admin')

@section('content')
<div class="">

   <section class="">
      <h1 class="text-white">Effettua il pagamento</h1>
   </section>
   <form id="payment-form" action="{{ route('admin.payment', $plan) }}" method="post">
      @csrf
      <!-- Putting the empty container you plan to pass to
        `braintree.dropin.create` inside a form will make layout and flow
        easier to manage -->
      <div id="dropin-container"></div>
      <input type="submit" />
      <input type="hidden" id="nonce" name="payment_method_nonce"/>
   </form>

</div>
<script>
   var button = document.querySelector('#submit-button');

   braintree.dropin.create({
   authorization: '{{ $token }}',
   container: '#dropin-container'
   }, (error, dropinInstance) => {
   if (error) console.error(error);

   form.addEventListener('submit', event => {
      event.preventDefault();

      dropinInstance.requestPaymentMethod((error, payload) => {
         if (error) console.error(error);

         // Step four: when the user is ready to complete their
         //   transaction, use the dropinInstance to get a payment
         //   method nonce for the user's selected payment method, then add
         //   it a the hidden field before submitting the complete form to
         //   a server-side integration
         document.getElementById('nonce').value = payload.nonce;
         form.submit();
      });
   });
   });

   
</script>
@endsection

@section('title')
   Premium
@endsection