                <footer class="footer text-center text-sm-left" style="background-color: white">
                    {{-- <strong>Copyright &copy; 2022 Vismart Studio Supported by<a href="http://madtive.com" target="_blank" rel="noopener noreferrer">&nbsp; Madtive Studio &nbsp;</a>All Right Reserved</strong> --}}
                    &copy; 2022 Vismart Studio Supported by <a href="http://madtive.com" target="_blank" rel="noopener noreferrer">Madtive Studio</a>
                </footer><!--end footer-->
            </div>
            <!-- end page content -->
        </div>
        <!-- end page-wrapper -->

        {{-- &copy; 2020 Dastyle <span class="d-none d-sm-inline-block float-right">Crafted with <i class="mdi mdi-heart text-danger"></i> by Mannatthemes</span> --}}

        @push('name')
        {{-- Summerrnote Editorr --}}
        <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
        <script type="text/javascript" src="/js/summernote.js"></script>
        @endpush
        
        {{-- Trix Editor --}}
        <script type="text/javascript" src="/js/trix.js"></script>

        {{-- Toastr --}}
        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

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
        <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

        {{-- // $(document).ready(function() {
            //     $(".btn").click(function() {
            //         var val = parseInt($('#cou-nt').text());
            //         var ez = val;
            //         var hd = document.getElementByClassName('notifi');
        
            //         // Check for the button clicked
            //         if ($(this).hasClass('btn-primary')) {
            //             $('#cou-nt').text(val + 1);
            //         } else if (hd.on('click')) {
            //             $('#cou-nt').text(ez - val);
            //         }
            //     });
            // }); --}}
        <!-- include libraries(jQuery, bootstrap) -->
        {{-- <link href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script> --}}
        <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>

        {{-- Choosen Select --}}
        <script src="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen.jquery.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen.proto.js"></script>

        <script>
            @if(session()->has('success'))
                toastr.success('{{ session('success') }}', 'TERIMA KASIH!'); 

                @elseif(session()->has('error'))

                toastr.error('{{ session('error') }}', 'GAGAL!'); 
            @endif

            $(document).ready(function() {
                $('#summernote').summernote({
                    height: 200,
                });
            });
           

            function showTime(){
                var date = new Date();
                const days = ["Sun", "Mon", "Tue", "Wed", "Thu", "Fri", "Sat"];

                var d = days[date.getDay()]; // 0 - 23
                var h = date.getHours(); // 0 - 23
                var m = date.getMinutes(); // 0 - 59
                var s = date.getSeconds(); // 0 - 59
                var session = "AM";
                
                if(h == 0){
                    h = 12;
                }
                
                if(h > 12){
                    h = h - 12;
                    session = "PM";
                }
                
                h = (h < 10) ? "0" + h : h;
                m = (m < 10) ? "0" + m : m;
                s = (s < 10) ? "0" + s : s;
                
                var time = d + " " + h + ":" + m + ":" + s + " " + session;
                document.getElementById("MyClockDisplay").innerText = time;
                document.getElementById("MyClockDisplay").textContent = time;
                
                setTimeout(showTime, 1000);
                
            }

            showTime();
        </script>
        @stack('script')

        
        
    </body>

</html>