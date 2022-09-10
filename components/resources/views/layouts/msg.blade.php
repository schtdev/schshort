@if (session('message'))
    <div class="alert alert-success">
        <div class="container">
            {{ session('message') }}
        </div>
    </div>        
@endif

<script>
    window.setTimeout(function() {
    $(".alert-success").fadeTo(500, 0).slideUp(500, function(){
        $(this).remove(); 
    });
}, 5000);
</script>

@if (count($errors) > 0)
    <div class="alert alert-danger">
        <div class="container">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>                    
                @endforeach
            </ul>
        </div>
    </div>        
@endif