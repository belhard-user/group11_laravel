@if(session()->has('flash'))
    <script>
        window.onload = function(){
            swal("{{ session('flash.title') }}", "{{ session('flash.msg') }}", "{{ session('flash.type') }}")
        };
    </script>
@endif