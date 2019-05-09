    <footer id="footer">

        <div class="container">

            <div class="row">

                <!--div class="col-sm-6">

                    Av. 2 Lora, entre calles 31 y 32, Centro Profesional Diaz, Local 8.<br>

                    Mérida, 5101. Mérida - Venezuela<br>

                    Teléfonos: +58 414 7482503 / +58 416 9794842 / +58 274 2527514 / +58 274 9350884<br>

                    &copy; <--?php echo date("Y"); ?> FUNDAEOE

                </div-->

                
                <div class="col-sm-6">

                    <h3><b>Aprende - Interactúa - Disfruta</b></h3>

                    Teléfonos: +58 414 7482503 / +57 321 3897323 / +58 274 2527514 / +58 274 9350884<br>

                    &copy; <?php echo date("Y"); ?> FUNDAEOE

                </div>

                <div class="col-sm-6">

                    <ul class="social-icons">

                        <li><a target="_blank" href="https://www.facebook.com/Fundaeoe-Estudiantes-y-Profesionales-1609492515966629/"><i class="fa fa-facebook"></i></a></li>

                        <li><a target="_blank" href="https://twitter.com/fundaeoe"><i class="fa fa-twitter"></i></a></li>

                        <li><a target="_blank" href="https://www.instagram.com/fundaeoe/"><i class="fa fa-instagram"></i></a></li>

                    </ul>

                </div>

            </div>

        </div>

    </footer><!--/#footer-->



    <script src="/plugins/jquery/js/jquery-3.2.0.js"></script>

    <script src="/plugins/bootstrap/dist/js/bootstrap.min.js"></script>

    @if (substr(Request::path(),0, 5) == 'users' OR 

         substr(Request::path(),0,11) == 'admin/users' OR

         substr(Request::path(),0,12) == 'admin/evento' OR

         substr(Request::path(),0,13) == 'eventos/pagar' OR

         substr(Request::path(),0, 8) == 'register') 

        <script src="/plugins/moment/moment.js"></script>

        <script src="/plugins/bootstrap/bootstrap-datetimepicker/bootstrap-datetimepicker.min.js"></script>

        <script src="/plugins/bootstrap/BootstrapValidation/jqBootstrapValidation.js"></script>

    @endif

    @if (substr(Request::path(),0,7)  == 'galeria' OR 

         substr(Request::path(),0,11) == 'admin/banco' )    

        <script src="/plugins/lightbox/js/lightbox.js"> </script>

    @endif

    @if (substr(Request::path(),0,11) == 'admin/banco' OR

         substr(Request::path(),0,15) == 'admin/instituto' OR

         substr(Request::path(),0,13) == 'admin/ponente' OR

         substr(Request::path(),0,14) == 'admin/material' OR

         substr(Request::path(),0,12) == 'admin/evento')

        <script src="/plugins/bootstrap/bootstrap-filestyle/bootstrap-filestyle.min.js"></script>        

    @endif

    @if (substr(Request::path(),0,14) == 'admin/politica' OR

         substr(Request::path(),0,12) == 'admin/evento')

        <script src="/plugins/tinymce/js/tinymce/tinymce.min.js"></script>        

    @endif

    <script src="/plugins/jquery/js/jquery.mask.js"></script>

    <script src="/js/jquery.prettyPhoto.js"></script>

    <script src="/js/jquery.isotope.min.js"></script>

    <script src="/js/jquery.inview.min.js"></script>

    <script src="/js/wow.min.js"></script>

    <script src="/js/mousescroll.js"></script>

    <script src="/js/smoothscroll.js"></script>

    <script src="/plugins/OwlCarousel/owl.carousel.min.js"></script>

    <script src="/js/main.js"></script> 

    <script>

        $(document).ready(function()

        { 

            $('[data-toggle="tooltip"]').tooltip();

            $('.money').mask('#.##0,00', {reverse: true});



            @if (substr(Request::path(),0,5)  == 'users' OR 

                 substr(Request::path(),0,11) == 'admin/users' OR

                 substr(Request::path(),0,8) == 'register')

                $('input, select, textarea').not('[type=submit]').jqBootstrapValidation();

                $('#fechaNacimiento').datetimepicker({format: 'DD/MM/YYYY'});

            @endif



            @if (substr(Request::path(),0,13) == 'eventos/pagar')

                $('input, select, textarea').not('[type=submit]').jqBootstrapValidation();

                $('#fechaFPago1').datetimepicker({format: 'DD/MM/YYYY'});

                $('#fechaFPago2').datetimepicker({format: 'DD/MM/YYYY'});

                $('#fechaFPago3').datetimepicker({format: 'DD/MM/YYYY'});

                $('#fechaFPago4').datetimepicker({format: 'DD/MM/YYYY'});

                $('#fechaFPago5').datetimepicker({format: 'DD/MM/YYYY'});

                $('#fechaFPago6').datetimepicker({format: 'DD/MM/YYYY'});

            @endif



            @if (substr(Request::path(),0,12) == 'admin/evento')

                $('input, select, textarea').not('[type=submit]').jqBootstrapValidation();

                $('#fechaI').datetimepicker({format: 'DD/MM/YYYY'});

                $('#fechaF').datetimepicker({format: 'DD/MM/YYYY'});

                $('#fechaPQ').datetimepicker({format: 'DD/MM/YYYY'});

                $('#fechaIPQ').datetimepicker({format: 'DD/MM/YYYY'});

                $('#fechaFPQ').datetimepicker({format: 'DD/MM/YYYY'});

                $('#fechaAD').datetimepicker({format: 'DD/MM/YYYY'});

                $('#fechaIAD').datetimepicker({format: 'DD/MM/YYYY'});

                $('#fechaFAD').datetimepicker({format: 'DD/MM/YYYY'});

                $('#hora').datetimepicker({format: 'LT'});

                tinymce.init({selector: '#mytextarea'});

                tinymce.init({selector: '#mytextareapq'});

                tinymce.init({selector: '#mytextareaad'});

                @include('admin.evento.extendjs');

            @endif



            @if (substr(Request::path(),0,14) == 'admin/politica')

                tinymce.init({selector: '#mytextarea'});

            @endif

        }); 

    </script>



    @if (isset($errors))

    @if ($errors->has('email'))

        <script type="text/javascript">

            $(window).on('load',function(){$('#myModal').modal('show');});

        </script>

    @endif

    @endif



    <!-- <script src="http://maps.google.com/maps/api/js?sensor=true"></script> !-->