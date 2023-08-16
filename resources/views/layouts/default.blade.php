<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Ayam Goreng Gacor | Administrator</title>
  <link rel="icon" href="{{ asset('back/img/logo.png') }}" type="image/png">

  <!-- General CSS Files -->
  <link rel="stylesheet" href="{{ asset('back/modules/bootstrap/css/bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('back/modules/fontawesome/css/all.min.css') }}">

  <!-- CSS Libraries -->

  <!-- Template CSS -->
  <link rel="stylesheet" href="{{ asset('back/css/style.css') }}">
  <link rel="stylesheet" href="{{ asset('back/css/components.css') }}">
<!-- Start GA -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-94034622-3"></script>
<script src="https://cdn.ckeditor.com/ckeditor5/37.0.1/classic/ckeditor.js"></script>

<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-94034622-3');
</script>
<!-- /END GA --></head>

      @include('includes.header')
      
      @include('includes.sidebar')

      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1 style="font-size:3em">{{ ucwords(Request::segment(3)) }}</h1>
          </div>
          @yield('content')
          
          <div class="section-body">
          </div>
        </section>
      </div>
      
      @include('includes.footer')
      