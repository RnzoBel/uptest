@extends('welcome')
@section('home')
    <div class="container" style="margin-top:150px">
        <div class="col-sm-6 col-md-12">
            <div class="col-md-6">
                <h2 class="text-info"><b>MÓDULO SERVICIO SOCIAL</b></h2>
            </div>
            <div class="col-md-6">
                <img src="img/img2.png" alt="Responsive image">
            </div>
        </div>
        <br><br>
       
    </div>


    <script>
        $('.counting').each(function() {
            var $this = $(this),
                countTo = $this.attr('data-count');   
            $({ countNum: $this.text()}).animate({
                countNum: countTo
            },
            {
                duration: 3000,
                easing:'linear',
                step: function() {
                $this.text(Math.floor(this.countNum));
                },
                complete: function() {
                $this.text(this.countNum);
                //alert('finished');
                }
            });  
        });
        </script>
@endsection
