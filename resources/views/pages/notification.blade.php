@extends('layouts.app')
@section('content')
@endsection
@section('scripts')
    <script>
        let timerInterval
        Swal.fire({
            title: 'Link is not safe!',
            html: 'I will close in <b></b> milliseconds.',
            timer: 10000,
            timerProgressBar: true,
            didOpen: () => {
                Swal.showLoading()
                const b = Swal.getHtmlContainer().querySelector('b')
                timerInterval = setInterval(() => {
                    b.textContent = Swal.getTimerLeft()
                }, 100)
            },
            willClose: () => {
                clearInterval(timerInterval)
            }
        }).then((result) => {
            window.location = "{{ $url->url }}";
            if (result.dismiss === Swal.DismissReason.timer) {
                window.location = "{{ $url->url }}";
            }
        })
    </script>
@endsection
