@extends('layouts.app')

@section('content')
    <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel" style="height: 100%; background-position: center; background-repeat: no-repeat;background-size: cover;">
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img class="d-block w-100" src="https://images.wallpaperscraft.com/image/new_york_usa_night_city_top_view_118981_3840x2400.jpg" alt="First slide">
        </div>
        <div class="carousel-item">
          <img class="d-block w-100" src="https://images.wallpaperscraft.com/image/hong_kong_china_skyscrapers_night_city_city_lights_119347_3840x2400.jpg" alt="Second slide">
        </div>
        <div class="carousel-item">
          <img class="d-block w-100" src="https://images.wallpaperscraft.com/image/new_zealand_panorama_skyscrapers_buildings_shore_lighting_119195_3840x2400.jpg" alt="Third slide">
        </div>
      </div>
    </div>
@endsection
