<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('app.css') }}">
    <title>Payment</title>
</head>
<body>
    @php
        $regisPrice = session('regisPrice');
        $excess = session('excess');
    @endphp
    <div class="d-flex flex-column justify-content-center align-items-center vh-100">
        <h2 class="text-blue fw-bold">Registration Price : {{ $regisPrice }}</h2>
        <form class="d-flex flex-column gap-2 w-25" action="{{ route('payment.submit') }}" method="POST">
             @csrf
            <div class="d-flex flex-column gap-2">
                <input type="hidden" name="regisPrice" value="{{ $regisPrice }}">
                <div class="d-flex gap-2">
                    <label for="payment">Payment</label>
                    @error('payment')
                        <div class="text-danger">*{{ $message }}</div>
                    @enderror
                </div>
                <input type="number" class="form-control" id="payment" name="payment" placeholder="">
            </div>
             
            <button type="submit" class="text-white bg-blue p-2 mt-2 rounded-2">Pay</button>
        </form>
        @if ($excess && $excess > 0)
            <div class="modal fade" tabindex="-1" id="confirmationModal" aria-modal="true" role="dialog">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Payment Confirmation</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <p>Do you want your change {{ $excess }} to be put into your coins?</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <form action="{{ route('payment.confirmation') }}" method="POST">
                                @csrf
                                @method('PUT')
                                <input type="hidden" name="excess" value="{{ $excess }}">
                                <button type="submit" class="btn btn-primary">Yes</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endif
   </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const excess = {{ $excess ?? 'null' }};
        if (excess && excess > 0) {
            const modal = new bootstrap.Modal(document.getElementById('confirmationModal'));
            modal.show();
        }
    });
</script>
</html>