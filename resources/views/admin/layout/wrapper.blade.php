<!-- wrapper berfungsi untuk menggabungkan semua bagian layout -->
@include('admin/layout/head')
@include('admin/layout/header')
@include('admin/layout/menu')

<!-- content diambil dari variabel yang didefinisikan di controller -->
@include($content)

<!-- bagian footer -->
@include('admin/layout/footer')