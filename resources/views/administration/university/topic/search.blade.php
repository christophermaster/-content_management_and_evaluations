{!! Form::open(array('url' => 'facultad/tema/'.$id_modulo, 'method'=> 'Get','autocomplete' =>'off','role' => 'search'))!!}

<div class = "form-group">
    <div class="input-group no-border">
        <input type="text" class="form-control" name = "searchText" placeholder = "Buscar..." value ="{{$searchText}}">
        <button type="submit" class="btn btn-white btn-round btn-just-icon">
            <i class="material-icons">search</i>
            <div class="ripple-container"></div>
        </button>
    </div>   
</div>

{{Form::close()}}