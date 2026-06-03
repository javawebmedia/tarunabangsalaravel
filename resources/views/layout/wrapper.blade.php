<!-- wrapper berfungsi untuk menggabungkan semua bagian layout -->
@include('layout/head')
@include('layout/header')
<!-- content diambil dari variabel yang didefinisikan di controller -->
@include($content)
<!-- bagian footer -->
@include('layout/footer')