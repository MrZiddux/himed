<!doctype html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@yield('title')</title>
    <meta name="description" content="Ela Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    @include('admin.layouts.css')
    @stack('css')
</head>

<body data-editor="ClassicEditor" data-collaboration="false">
    <!-- Left Panel -->
    @include('admin.components.sidebar')
    <!-- End Left Panel -->
    <!-- Right Panel -->
    <div id="right-panel" class="right-panel">
      @include('admin.components.header')
      <div class="content" style="min-height: 81vh">
        @yield('content')
      </div>
      <div class="clearfix"></div>
      @include('admin.components.footer')
    </div>
    <!-- End right-panel -->

  @include('admin.layouts.js')
  @stack('script')
</body>
</html>
