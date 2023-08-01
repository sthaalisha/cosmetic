@if(Session::has('success'))
<div id="messagebox" class="fixed bottom-5 left-5 z-50 bg-green-500" >
    <p class="bg-yellow-200 text-black px-4 py-1 rounded-1g shadow text-lg font-bold">{{session('success')}}</p>

</div>
<script>
    setTimeout(function(){
        $('#messagebox').fadeOut(500);
    },1000);
</script>
@endif

<!-- @if($errors->any())
<div id="messagebox" class="fixed top-5 right-5">
    @foreach($errors->all() as $error)
        <p class="bg-green-500 text-white  px-4 py-1 rounded-lg shadow text-lg font-bold">{{$error}}</p>
    @endforeach
    </div>
    <script>
        setTimeout(function(){
            $('#messagebox').fadeOut(500);
        },1000);
    </script>
@endif -->