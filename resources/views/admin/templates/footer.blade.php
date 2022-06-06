                <footer class="footer text-center text-sm-left">
                    &copy; 2020 Dastyle <span class="d-none d-sm-inline-block float-right">Crafted with <i class="mdi mdi-heart text-danger"></i> by Mannatthemes</span>
                </footer><!--end footer-->
            </div>
            <!-- end page content -->
        </div>
        <!-- end page-wrapper -->

        


        <!-- jQuery  -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        {{-- <script src="{{ asset('admin/assets/js/jquery.min.js') }}') }}"></script> --}}
        <script src="{{ asset('admin/assets/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('admin/assets/js/metismenu.min.js') }}"></script>
        <script src="{{ asset('admin/assets/js/waves.js') }}"></script>
        <script src="{{ asset('admin/assets/js/feather.min.js') }}"></script>
        <script src="{{ asset('admin/assets/js/simplebar.min.js') }}"></script>
        <script src="{{ asset('admin/assets/js/jquery-ui.min.js') }}"></script>
        <script src="{{ asset('admin/assets/js/moment.js') }}"></script>
        <script src="{{ asset('admin/plugins/daterangepicker/daterangepicker.js') }}"></script>

        <script src="{{ asset('admin/plugins/apex-charts/apexcharts.min.js') }}"></script>
        <script src="{{ asset('admin/plugins/jvectormap/jquery-jvectormap-2.0.2.min.js') }}"></script>
        <script src="{{ asset('admin/plugins/jvectormap/jquery-jvectormap-us-aea-en.js') }}"></script>
        <script src="{{ asset('admin/assets/pages/jquery.analytics_dashboard.init.js') }}"></script>

        {{-- Data Tables --}}
        <!-- Required datatable js -->
        <script src="{{ asset('admin/plugins/datatables/jquery.dataTables.min.js') }}"></script>
        <script src="{{ asset('admin/plugins/datatables/dataTables.bootstrap4.min.js') }}"></script>
        <!-- Buttons examples -->
        <script src="{{ asset('admin/plugins/datatables/dataTables.buttons.min.js') }}"></script>
        <script src="{{ asset('admin/plugins/datatables/buttons.bootstrap4.min.js') }}"></script>
        <script src="{{ asset('admin/plugins/datatables/jszip.min.js') }}"></script>
        <script src="{{ asset('admin/plugins/datatables/pdfmake.min.js') }}"></script>
        <script src="{{ asset('admin/plugins/datatables/vfs_fonts.js') }}"></script>
        <script src="{{ asset('admin/plugins/datatables/buttons.html5.min.js') }}"></script>
        <script src="{{ asset('admin/plugins/datatables/buttons.print.min.js') }}"></script>
        <script src="{{ asset('admin/plugins/datatables/buttons.colVis.min.js') }}"></script>
        <!-- Responsive examples -->
        <script src="{{ asset('admin/plugins/datatables/dataTables.responsive.min.js') }}"></script>
        <script src="{{ asset('admin/plugins/datatables/responsive.bootstrap4.min.js') }}"></script>
        <script src="{{ asset('admin/pages/jquery.datatable.init.js') }}"></script>

        <!-- App js -->
        <script src="{{ asset('admin/assets/js/app.js') }}"></script>

        {{-- Toastr --}}
        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

        {{-- SweetAlert2 --}}
        <link rel="stylesheet" href="sweetalert2.min.css">
        <script src="sweetalert2.all.min.js"></script>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

        @stack('script')
        
    </body>

</html>