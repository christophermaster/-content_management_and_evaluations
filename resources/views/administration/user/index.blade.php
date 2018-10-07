@extends('layouts.admin') 
@section('contenido')

<div class="col-lg-5 col-md-6 col-sm-3">
    <label for="exampleFormControlSelect2">Facultad</label>
    <select id="faculty"  class="form-control" data-style="select-with-transition"  title="Facultad" data-size="7">
        <option>Seleccione...</option>
        @foreach($faculty as $fac)
            <option value="{{$fac->id}}">{{$fac->nombre}}</option>
        @endforeach
    </select>
</div>
<div class="col-lg-5 col-md-6 col-sm-3">
    <label for="exampleFormControlSelect2">Escuela</label>
    <select id="school"  class="form-control"  data-style="select-with-transition"  title="Escuela" data-size="7">
        <option>Seleccione...</option>
    </select>
</div>
<div class="col-lg-5 col-md-6 col-sm-3">
    <label for="exampleFormControlSelect2">Catedra</label>
    <select id="cathedra"  class="form-control"  data-style="select-with-transition"  title="Escuela" data-size="7">
        <option>Seleccione...</option>
    </select>
</div>
<div class="col-lg-5 col-md-6 col-sm-3">
    <label for="exampleFormControlSelect2">Materia</label>
    <select id="matter"  class="form-control"  data-style="select-with-transition"  title="Escuela" data-size="7">
        <option>Seleccione...</option>
    </select>
</div>

<script src="{{asset('js/dropdown.js')}}"></script>
@endsection