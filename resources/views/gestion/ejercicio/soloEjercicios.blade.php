@extends('layouts.admin') @section('contenido')
    <div class="breadcrumb">
       <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{url('gestion/contenido')}}">Inicio</a></li>
                <li class="breadcrumb-item active" aria-current="page"><a href="{{url('mis/ejercicios')}}">Detalles de mis Ejercicios</a></li>
                <li class="breadcrumb-item active" aria-current="page">Ejercicios y Soluciones</li>
            </ol>
        </nav>
    </div>

<ul class="nav nav-tabs nav-tab" id="myTab" role="tablist">
  <li class="nav-item">
    <a class="nav-link a active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Home</a>
  </li>
  <li class="nav-item">
    <a class="nav-link a" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Profile</a>
  </li>
  <li class="nav-item">
    <a class="nav-link a" id="messages-tab" data-toggle="tab" href="#messages" role="tab" aria-controls="messages" aria-selected="false">Messages</a>
  </li>
</ul>

<div class="tab-content">
  <div class="tab-pane active" id="home" role="tabpanel" aria-labelledby="home-tab">..s.</div>
  <div class="tab-pane" id="profile" role="tabpanel" aria-labelledby="profile-tab">...s</div>
  <div class="tab-pane" id="messages" role="tabpanel" aria-labelledby="messages-tab">.s..</div>
</div>

<script>

</script>


  <div class="blog-card">
    <div class="meta">
      <div class="photoo" 
      style="background-image: url(https://www.kademvakfi.org/Assets/Upload/Content/duygularin-dili2-jpg14012018115911.jpg)"></div>
      <ul class="details">
        <li class="author"><a href="#">John Doe</a></li>
        <li class="date">Aug. 24, 2015</li>
        <li class="tags">
          <ul>
            <li><a href="#">Learn</a></li>
            <li><a href="#">Code</a></li>
            <li><a href="#">HTML</a></li>
            <li><a href="#">CSS</a></li>
          </ul>
        </li>
      </ul>
    </div>
    <div class="description">
      <h1>Learning to Code</h1>
      <h2>Opening a door to the future</h2>
      <p> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad eum dolorum architecto obcaecati enim dicta praesentium, quam nobis! Neque ad aliquam facilis numquam. Veritatis, sit.</p>
      <p class="read-more">
        <a href="#">Read More</a>
      </p>
    </div>
  </div>

  
@endsection