@include('components.nav')

<!-- Midtrans Snap.js -->
<script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ config('midtrans.clientKey') }}"></script>

<script type="text/javascript">
    window.onload = function () {
        snap.pay('{{ $payment->snap_token }}', {
            onSuccess: function(result){
                alert("Pembayaran berhasil!");
                window.location.href = "{{ route('products.index') }}"; // arahkan setelah berhasil
            },
            onPending: function(result){
                alert("Pembayaran pending!");
            },
            onError: function(result){
                alert("Pembayaran gagal!");
            },
            onClose: function(){
                alert("Popup ditutup tanpa menyelesaikan pembayaran.");
                window.location.href = "{{ route('products.index') }}";
            }
        });
    };
</script>
