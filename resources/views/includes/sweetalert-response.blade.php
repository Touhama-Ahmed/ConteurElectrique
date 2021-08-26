<!-- notification sweet alert -->
@if(session()->has('success_msg'))
    <!-- SWEET ALERT JS -->
    <script>
        Swal.fire({
            title: 'BRAVO !',
            text: "{{session()->get('success_msg')}}",
            icon: 'success',
            confirmButtonColor: '#3085d6',
            confirmButtonText: 'J\' ai compris !',
            timer: 5000,
            timerProgressBar: true,
        });
    </script>
    {{--        handling validation errors--}}
@elseif($errors->any())
    <!-- SWEET ALERT JS -->
    <script>
        $text = '';
        @foreach ($errors->all() as $error)
            $text ='\n {{$error}}';
        @endforeach
        Swal.fire({
            title: 'Erreur !',
            text: $text,
            icon: 'error',
            confirmButtonColor: '#3085d6',
            confirmButtonText: 'J\' ai compris !',
            timer: 5000,
            timerProgressBar: true,
        })
    </script>
@elseif(session()->has('error_msg'))
    <!-- SWEET ALERT JS -->
    <script>
        Swal.fire({
            title: 'Erreur !',
            text: "{{session()->get('error_msg')}}",
            icon: 'error',
            confirmButtonColor: '#3085d6',
            confirmButtonText: 'J\' ai compris !',
            timer: 5000,
            timerProgressBar: true,
        })
    </script>
@endif
