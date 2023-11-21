<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PDFI</title>
    
    <link rel="stylesheet" href="{{asset('dist/assets/extensions/choices.js/public/assets/styles/choices.css')}}">
    <link rel="stylesheet" href="{{asset('dist/assets/css/main/app.css')}}">
    <link rel="stylesheet" href="{{asset('dist/assets/css/main/app-dark')}}.css">
    <link rel="shortcut icon" href="{{asset('dist/assets/images/logo/favicon.svg')}}" type="image/x-icon">
    <link rel="shortcut icon" href="{{asset('dist/assets/images/logo/favicon.png')}}" type="image/png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/css/selectize.bootstrap3.min.css" integrity="sha256-ze/OEYGcFbPRmvCnrSeKbRTtjG4vGLHXgOqsyLFTRjg=" crossorigin="anonymous" />
    
<link rel="stylesheet" href="{{asset('dist/assets/extensions/simple-datatables/style.css')}}">
<link rel="stylesheet" href="{{asset('dist/assets/css/pages/simple-datatables.css')}}">
<link rel="stylesheet" href="{{asset('dist/assets/css/shared/iconly.css')}}')}}">
<link rel="stylesheet" href="{{asset('dist/assets/extensions/filepond/filepond.css')}}">
<link rel="stylesheet" href="{{asset('dist/assets/extensions/filepond-plugin-image-preview/filepond-plugin-image-preview.css')}}">
<link rel="stylesheet" href="{{asset('dist/assets/extensions/toastify-js/src/toastify.css')}}">
<link rel="stylesheet" href="{{asset('dist/assets/css/pages/filepond.css')}}">
<link type="text/css" rel="stylesheet" href="{{asset('image-uploader/dist/image-uploader.min.css')}}">



</head>
<style>
    .sidebar-wrapper .sidebar-header img{
        height: auto!important;
    }
</style>
<body>
    <div id="app">
        <div id="sidebar" class="active">
            <div class="sidebar-wrapper active">
    <div class="sidebar-header position-relative">
        <div class="d-flex justify-content-between align-items-center">
            <div class="logo">
                <a href="#"><img src="{{asset('../image/logo_pdfmi.png')}}" width="90" alt="Logo" srcset=""></a>
            </div>
            <div class="theme-toggle d-flex gap-2  align-items-center mt-2">
                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img" class="iconify iconify--system-uicons" width="20" height="20" preserveAspectRatio="xMidYMid meet" viewBox="0 0 21 21"><g fill="none" fill-rule="evenodd" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"><path d="M10.5 14.5c2.219 0 4-1.763 4-3.982a4.003 4.003 0 0 0-4-4.018c-2.219 0-4 1.781-4 4c0 2.219 1.781 4 4 4zM4.136 4.136L5.55 5.55m9.9 9.9l1.414 1.414M1.5 10.5h2m14 0h2M4.135 16.863L5.55 15.45m9.899-9.9l1.414-1.415M10.5 19.5v-2m0-14v-2" opacity=".3"></path><g transform="translate(-210 -1)"><path d="M220.5 2.5v2m6.5.5l-1.5 1.5"></path><circle cx="220.5" cy="11.5" r="4"></circle><path d="m214 5l1.5 1.5m5 14v-2m6.5-.5l-1.5-1.5M214 18l1.5-1.5m-4-5h2m14 0h2"></path></g></g></svg>
                <div class="form-check form-switch fs-6">
                    <input class="form-check-input  me-0" type="checkbox" id="toggle-dark" >
                    <label class="form-check-label" ></label>
                </div>
                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img" class="iconify iconify--mdi" width="20" height="20" preserveAspectRatio="xMidYMid meet" viewBox="0 0 24 24"><path fill="currentColor" d="m17.75 4.09l-2.53 1.94l.91 3.06l-2.63-1.81l-2.63 1.81l.91-3.06l-2.53-1.94L12.44 4l1.06-3l1.06 3l3.19.09m3.5 6.91l-1.64 1.25l.59 1.98l-1.7-1.17l-1.7 1.17l.59-1.98L15.75 11l2.06-.05L18.5 9l.69 1.95l2.06.05m-2.28 4.95c.83-.08 1.72 1.1 1.19 1.85c-.32.45-.66.87-1.08 1.27C15.17 23 8.84 23 4.94 19.07c-3.91-3.9-3.91-10.24 0-14.14c.4-.4.82-.76 1.27-1.08c.75-.53 1.93.36 1.85 1.19c-.27 2.86.69 5.83 2.89 8.02a9.96 9.96 0 0 0 8.02 2.89m-1.64 2.02a12.08 12.08 0 0 1-7.8-3.47c-2.17-2.19-3.33-5-3.49-7.82c-2.81 3.14-2.7 7.96.31 10.98c3.02 3.01 7.84 3.12 10.98.31Z"></path></svg>
            </div>
            <div class="sidebar-toggler  x">
                <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
            </div>
        </div>
    </div>
    <div class="sidebar-menu">
        <ul class="menu">
        <li class="sidebar-title">Menu</li>
            
          
            @if(Auth::user()->level == 'admin')
            <li
                class="sidebar-item {{ (request()->is('admin/tag')) ? 'active' : '' }}">
                <a href="/admin/tag" class='sidebar-link'>
                <i class="bi bi-tags"></i>
                    <span>Tag</span>
                </a>
            </li>
            <li
                class="sidebar-item {{ (request()->is('admin/update')) ? 'active' : '' }}">
                <a href="/admin/update" class='sidebar-link'>
                <i class="bi bi-card-list"></i>
                    <span>Update</span>
                </a>
            </li>
            <li
                class="sidebar-item {{ (request()->is('admin/user-management')) ? 'active' : '' }}">
                <a href="/admin/user-management" class='sidebar-link'>
                <i class="bi bi-person-square"></i>
                    <span>User Management</span>
                </a>
            </li> 
            <li
                class="sidebar-item {{ (request()->is('admin/anggota')) ? 'active' : '' }}">
                <a href="/admin/anggota" class='sidebar-link'>
                <i class="bi bi-people"></i>
                    <span>Penyelenggara</span>
                </a>
            </li>
            <li
                class="sidebar-item {{ (request()->is('admin/tipe')) ? 'active' : '' }}">
                <a href="/admin/tipe" class='sidebar-link'>
                <i class="bi bi-pin-fill"></i>
                    <span>Tipe Agenda</span>
                </a>
            </li>
            <li
                class="sidebar-item {{ (request()->is('admin/agenda')) ? 'active' : '' }}">
                <a href="/admin/agenda" class='sidebar-link'>
                <i class="bi bi-calendar-plus"></i>
                    <span>Agenda</span>
                </a>
            </li>
            <li
                class="sidebar-item {{ (request()->is('admin/banner')) ? 'active' : '' }}">
                <a href="/admin/banner" class='sidebar-link'>
                <i class="bi bi-card-image"></i>
                    <span>Banner</span>
                </a>
            </li>
            <li
                class="sidebar-item {{ (request()->is('admin/jurnal')) ? 'active' : '' }}">
                <a href="/admin/jurnal" class='sidebar-link'>
                <i class="bi bi-paperclip"></i>
                    <span>Jurnal</span>
                </a>
            </li>
            <li
                class="sidebar-item {{ (request()->is('admin/bidang')) ? 'active' : '' }}">
                <a href="/admin/bidang" class='sidebar-link'>
                <i class="bi bi-grid-3x2-gap-fill"></i>
                    <span>Bidang</span>
                </a>
            </li>
            <li
                class="sidebar-item {{ (request()->is('admin/dewan')) ? 'active' : '' }}">
                <a href="/admin/dewan" class='sidebar-link'>
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-fill-gear" viewBox="0 0 16 16">
                <path d="M11 5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm-9 8c0 1 1 1 1 1h5.256A4.493 4.493 0 0 1 8 12.5a4.49 4.49 0 0 1 1.544-3.393C9.077 9.038 8.564 9 8 9c-5 0-6 3-6 4Zm9.886-3.54c.18-.613 1.048-.613 1.229 0l.043.148a.64.64 0 0 0 .921.382l.136-.074c.561-.306 1.175.308.87.869l-.075.136a.64.64 0 0 0 .382.92l.149.045c.612.18.612 1.048 0 1.229l-.15.043a.64.64 0 0 0-.38.921l.074.136c.305.561-.309 1.175-.87.87l-.136-.075a.64.64 0 0 0-.92.382l-.045.149c-.18.612-1.048.612-1.229 0l-.043-.15a.64.64 0 0 0-.921-.38l-.136.074c-.561.305-1.175-.309-.87-.87l.075-.136a.64.64 0 0 0-.382-.92l-.148-.045c-.613-.18-.613-1.048 0-1.229l.148-.043a.64.64 0 0 0 .382-.921l-.074-.136c-.306-.561.308-1.175.869-.87l.136.075a.64.64 0 0 0 .92-.382l.045-.148ZM14 12.5a1.5 1.5 0 1 0-3 0 1.5 1.5 0 0 0 3 0Z"/>
                </svg>
                    <span>Dewan</span>
                </a>
            </li>
            <li
                class="sidebar-item {{ (request()->is('admin/koordinator')) ? 'active' : '' }}">
                <a href="/admin/koordinator" class='sidebar-link'>
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-fill-gear" viewBox="0 0 16 16">
                <path d="M11 5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm-9 8c0 1 1 1 1 1h5.256A4.493 4.493 0 0 1 8 12.5a4.49 4.49 0 0 1 1.544-3.393C9.077 9.038 8.564 9 8 9c-5 0-6 3-6 4Zm9.886-3.54c.18-.613 1.048-.613 1.229 0l.043.148a.64.64 0 0 0 .921.382l.136-.074c.561-.306 1.175.308.87.869l-.075.136a.64.64 0 0 0 .382.92l.149.045c.612.18.612 1.048 0 1.229l-.15.043a.64.64 0 0 0-.38.921l.074.136c.305.561-.309 1.175-.87.87l-.136-.075a.64.64 0 0 0-.92.382l-.045.149c-.18.612-1.048.612-1.229 0l-.043-.15a.64.64 0 0 0-.921-.38l-.136.074c-.561.305-1.175-.309-.87-.87l.075-.136a.64.64 0 0 0-.382-.92l-.148-.045c-.613-.18-.613-1.048 0-1.229l.148-.043a.64.64 0 0 0 .382-.921l-.074-.136c-.306-.561.308-1.175.869-.87l.136.075a.64.64 0 0 0 .92-.382l.045-.148ZM14 12.5a1.5 1.5 0 1 0-3 0 1.5 1.5 0 0 0 3 0Z"/>
                </svg>
                    <span>Koordinator</span>
                </a>
            </li>
            <li
                class="sidebar-item {{ (request()->is('admin/posisi')) ? 'active' : '' }}">
                <a href="/admin/posisi" class='sidebar-link'>
                <i class="bi bi-pin-map-fill"></i>
                    <span>Jabatan</span>
                </a>
            </li>
            <li
                class="sidebar-item {{ (request()->is('admin/kepengurusan')) ? 'active' : '' }}">
                <a href="/admin/kepengurusan" class='sidebar-link'>
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-building-fill-gear" viewBox="0 0 16 16">
  <path d="M2 1a1 1 0 0 1 1-1h10a1 1 0 0 1 1 1v7.256A4.493 4.493 0 0 0 12.5 8a4.493 4.493 0 0 0-3.59 1.787A.498.498 0 0 0 9 9.5v-1a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .39-.187A4.476 4.476 0 0 0 8.027 12H6.5a.5.5 0 0 0-.5.5V16H3a1 1 0 0 1-1-1V1Zm2 1.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5Zm3 0v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5Zm3.5-.5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1ZM4 5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5ZM7.5 5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1Zm2.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5ZM4.5 8a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1Z"/>
  <path d="M11.886 9.46c.18-.613 1.048-.613 1.229 0l.043.148a.64.64 0 0 0 .921.382l.136-.074c.561-.306 1.175.308.87.869l-.075.136a.64.64 0 0 0 .382.92l.149.045c.612.18.612 1.048 0 1.229l-.15.043a.64.64 0 0 0-.38.921l.074.136c.305.561-.309 1.175-.87.87l-.136-.075a.64.64 0 0 0-.92.382l-.045.149c-.18.612-1.048.612-1.229 0l-.043-.15a.64.64 0 0 0-.921-.38l-.136.074c-.561.305-1.175-.309-.87-.87l.075-.136a.64.64 0 0 0-.382-.92l-.148-.045c-.613-.18-.613-1.048 0-1.229l.148-.043a.64.64 0 0 0 .382-.921l-.074-.136c-.306-.561.308-1.175.869-.87l.136.075a.64.64 0 0 0 .92-.382l.045-.148ZM14 12.5a1.5 1.5 0 1 0-3 0 1.5 1.5 0 0 0 3 0Z"/>
</svg>
                    <span>Kepengurusan</span>
                </a>
            </li>
            @elseif(Auth::user()->level == 'cabang')
            <li
                class="sidebar-item {{ (request()->is('cabang/anggota')) ? 'active' : '' }}">
                <a href="/cabang/anggota" class='sidebar-link'>
                <i class="bi bi-people"></i>
                    <span>Penyelenggara</span>
                </a>
            </li>
            <li
                class="sidebar-item {{ (request()->is('cabang/tipe')) ? 'active' : '' }}">
                <a href="/cabang/tipe" class='sidebar-link'>
                <i class="bi bi-pin-fill"></i>
                    <span>Tipe Agenda</span>
                </a>
            </li>
            <li
                class="sidebar-item {{ (request()->is('cabang/agenda')) ? 'active' : '' }}">
                <a href="/cabang/agenda" class='sidebar-link'>
                <i class="bi bi-calendar-plus"></i>
                    <span>Agenda</span>
                </a>
            </li>
            @endif
            <li
                class="sidebar-item ">
                <a href="/logout" class='sidebar-link text-danger'>
                <i class="bi bi-box-arrow-left text-danger"></i>
                    <span>Logout</span>
                </a>
            </li>
            
            
            
        </ul>
    </div>
</div>
        </div>
        <div id="main">
            <header class="mb-3">
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
            </header>
            
<div class="main-content">
@include('sweetalert::alert')
    @yield('layout')
</div>


            <footer>
                <div class="footer clearfix mb-0 text-muted">
                    <div class="float-start">
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <script src="{{asset('dist/assets/js/bootstrap.js')}}"></script>
    <script src="{{asset('dist/assets/js/app.js')}}"></script>
    
<!-- Need: Apexcharts -->

<script src="{{asset('dist/assets/extensions/simple-datatables/umd/simple-datatables.js')}}"></script>
<script src="{{asset('dist/assets/js/pages/simple-datatables.js')}}"></script>
<script src="{{asset('dist/assets/extensions/filepond/filepond.js')}}"></script>
<script src="{{asset('dist/assets/extensions/toastify-js/src/toastify.js')}}"></script>
<script src="{{asset('dist/assets/js/pages/filepond.js')}}"></script>
<script src="{{asset('dist/assets/extensions/apexcharts/apexcharts.min.js')}}"></script>
<script src="{{asset('dist/assets/js/pages/dashboard.js')}}"></script>
<script src="{{asset('dist/assets/extensions/choices.js/public/assets/scripts/choices.js')}}"></script>
<script src="{{asset('ckeditor/ckeditor.js')}}"></script>
<script src="{{asset('dist/assets/js/pages/form-element-select.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.2/jquery.min.js" integrity="sha512-tWHlutFnuG0C6nQRlpvrEhE4QpkG1nn2MOUMWmUeRePl4e3Aki0VB6W1v3oLjFtd0hVOtRQ9PHpSfN6u6/QXkQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.7.5/sweetalert2.all.js" integrity="sha512-AINSNy+d2WG9ts1uJvi8LZS42S8DT52ceWey5shLQ9ArCmIFVi84nXNrvWyJ6bJ+qIb1MnXR46+A4ic/AUcizQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script type="text/javascript" src="{{asset('image-uploader/dist/image-uploader.min.js')}}"></script>
@stack('scripts')
<!-- Page Specific JS File -->
<script type="text/javascript">
    $('.delete').click(function(){
      Swal.fire({
        title: "Are you sure?",
        text: "Are you sure?",
        icon: "warning",
        showCancelButton: true,
        confirmButtonClass: "btn-danger",
        confirmButtonText: "Yes, delete it",
        closeOnConfirm: false
      }).then((result) => {
        if(result.isConfirmed){
          $(this).closest("form").submit();
          Swal.fire(
            'Deleted',
            'You have successfully deleted',
            'success',
          );
        }
      });
    });
  </script>
</body>

</html>
