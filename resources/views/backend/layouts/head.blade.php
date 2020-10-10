<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="csrf-token" content="{{ csrf_token() }}">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
<meta name="description"
      content="Stack admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
<meta name="keywords"
      content="admin template, stack admin template, dashboard template, flat admin template, responsive admin template, web app">
<meta name="author" content="PIXINVENT">
<title>AIR.CONCEPT</title>
<link rel="apple-touch-icon" href="{{asset('backend/app-assets/images/ico/apple-icon-120.png')}}">
<link rel="shortcut icon" type="image/x-icon"
      href="{{isset(\App\Helpers\Functions::getSetting()->favicon) && \App\Helpers\Functions::getSetting()->favicon
          ?\App\Constants\DirectoryConstant::UPLOAD_FOLDER_FAVICON.\App\Helpers\Functions::getSetting()->favicon
          :''}}">
<link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i%7COpen+Sans:300,300i,400,400i,600,600i,700,700i"
      rel="stylesheet">
<!-- BEGIN VENDOR CSS-->
<link rel="stylesheet" type="text/css" href="{{asset('backend/app-assets/css/vendors.css')}}">
<!-- END VENDOR CSS-->
<!-- BEGIN STACK CSS-->
<link rel="stylesheet" type="text/css" href="{{asset('backend/app-assets/css/app.css')}}">
<!-- END STACK CSS-->
<!-- BEGIN Page Level CSS-->
<link rel="stylesheet" type="text/css"
      href="{{asset('backend/app-assets/css/core/menu/menu-types/vertical-menu.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('backend/app-assets/css/core/colors/palette-gradient.css')}}">
<!-- END Page Level CSS-->

<!-- Sweet Alert -->
<link href="/backend/plugins/sweet-alert2/sweetalert2.min.css" rel="stylesheet" type="text/css">

<!-- Alertify -->
<link href="/backend/plugins/alertify/alertify.min.css" rel="stylesheet" type="text/css">

{{--select2--}}
<link rel="stylesheet" type="text/css" href="{{asset('backend/plugins/select2/select2.min.css')}}">

{{--file upload--}}
<link rel="stylesheet" type="text/css" href="{{asset('backend/css/file_upload.css')}}">

<!-- BEGIN Custom CSS-->
<link rel="stylesheet" type="text/css" href="{{asset('backend/css/style.css')}}">
<!-- END Custom CSS-->
