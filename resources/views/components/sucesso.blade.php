@if ($message)
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>{{$message}}</strong>  
        <button type="button" class="close" data-dismiss="alert" aria-label="close">
            <span aria-hidden=true>&times;</span>
        </button>
    </div>  
@endif