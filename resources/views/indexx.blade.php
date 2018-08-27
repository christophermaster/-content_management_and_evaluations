<!DOCTYPE html>
<html lang="en">

<head>
	<title>MathType for CKEditor | Math & Science</title>

  <link rel="canonical" href="{{url('https://www.creative-tim.com/product/paper-dashboard-2-pro')}}" />

 
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
  <script type="text/javascript" src="{{asset('js/codemirror.min.js')}}"></script>
  <script type="text/javascript" src="{{asset('js/xml.min.js')}}"></script>

</head>

<body>
  <p>In elementary algebra, the <b>quadratic formula</b> is the solution of the quadratic equation.</p>
  <p style="text-align: center;"><math xmlns="http://www.w3.org/1998/Math/MathML"><mi>x</mi><mo>=</mo><mfrac><mrow><mo>-</mo><mi>b</mi><mo>&#x000B1;</mo><msqrt><msup><mi>b</mi><mn>2</mn></msup><mo>-</mo><mn>4</mn><mi>a</mi><mi>c</mi></msqrt></mrow><mrow><mn>2</mn><mi>a</mi></mrow></mfrac></math></p>
  <p><b>Water is made from two molecules</b> - Hydrogen and Oxygen. If you put the two gasses together, along with energy, you can make water.</p>
  <p style="text-align: center;"><math class="wrs_chemistry" xmlns="http://www.w3.org/1998/Math/MathML"><msub><mi mathvariant="normal">H</mi><mn>2</mn></msub><mfenced><mi mathvariant="normal">g</mi></mfenced><mo>+</mo><msub><mi mathvariant="normal">O</mi><mn>2</mn></msub><mfenced><mi mathvariant="normal">g</mi></mfenced><mo>&#x21CC;</mo><mn>2</mn><msub><mi mathvariant="normal">H</mi><mn>2</mn></msub><mi mathvariant="normal">O</mi><mfenced><mi mathvariant="normal">l</mi></mfenced></math></p>


  <br>
  <p>The entire formula for the surface area of a cylinder is <math xmlns="http://www.w3.org/1998/Math/MathML"><mn>2</mn><msup><mi>&#x3C0;r</mi><mn>2</mn></msup><mo>+</mo><mn>2</mn><mi>&#x3C0;rh</mi></math></p>

  <a onclick="javascript:window.imprimirDIV('ID_DIV');">Print </a>


  <!--   Core JS Files   -->
<script src="{{asset('js/core/jquery.min.js')}}"></script>
<script src="{{asset('js/core/popper.min.js')}}"></script>
<script src="{{asset('js/core/bootstrap.min.js')}}"></script>
<script src="{{asset('js/plugins/perfect-scrollbar.jquery.min.js')}}"></script>
<script src="{{asset('js/plugins/moment.min.js')}}"></script>
<!--  Plugin for Switches, full documentation here: http://www.jque.re/plugins/version3/bootstrap.switch/ -->
<script src="{{asset('js/plugins/bootstrap-switch.js')}}"></script>
<!--  Plugin for Sweet Alert -->
<script src="{{asset('js/plugins/sweetalert2.min.js')}}"></script>
<!-- Forms Validations Plugin -->
<script src="{{asset('js/plugins/jquery.validate.min.js')}}"></script>
<!--  Plugin for the Wizard, full documentation here: https://github.com/VinceG/twitter-bootstrap-wizard -->
<script src="{{asset('js/plugins/jquery.bootstrap-wizard.js')}}"></script>
<!--	Plugin for Select, full documentation here: http://silviomoreto.github.io/bootstrap-select -->
<script src="{{asset('js/plugins/bootstrap-selectpicker.js')}}"></script>
<!--  Plugin for the DateTimePicker, full documentation here: https://eonasdan.github.io/bootstrap-datetimepicker/ -->
<script src="{{asset('js/plugins/bootstrap-datetimepicker.js')}}"></script>
<!--  DataTables.net Plugin, full documentation here: https://datatables.net/    -->
<script src="{{asset('js/plugins/jquery.dataTables.min.js')}}"></script>
<!--	Plugin for Tags, full documentation here: https://github.com/bootstrap-tagsinput/bootstrap-tagsinputs  -->
<script src="{{asset('js/plugins/bootstrap-tagsinput.js')}}"></script>
<!-- Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput -->
<script src="{{asset('js/plugins/jasny-bootstrap.min.js')}}"></script>
<!--  Full Calendar Plugin, full documentation here: https://github.com/fullcalendar/fullcalendar    -->
<script src="{{asset('js/plugins/fullcalendar.min.js')}}"></script>
<!-- Vector Map plugin, full documentation here: http://jvectormap.com/documentation/ -->
<script src="{{asset('js/plugins/jquery-jvectormap.js')}}"></script>
<!--  Plugin for the Bootstrap Table -->
<script src="{{asset('js/plugins/nouislider.min.js')}}"></script>
 <!-- Chart JS -->
<script src="{{asset('js/plugins/chartjs.min.js')}}"></script>
<!--  Notifications Plugin    -->
<script src="{{asset('js/plugins/bootstrap-notify.js')}}"></script>
<!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
<script src="{{asset('js/paper-dashboard.min790f.js?v=2.0.1')}}" type="text/javascript"></script>
<!-- Paper Dashboard DEMO methods, don't include it in your project! -->
<script src="{{asset('demo/demo.js')}}"></script>
<!-- Sharrre libray -->
<script src="{{asset('demo/jquery.sharrre.js')}}"></script>

<noscript>
  <img height="1" width="1" style="display:none" src="https://www.facebook.com/tr?id=111649226022273&amp;ev=PageView&amp;noscript=1" />
</noscript>

<script>
  $(document).ready(function() {
    // Javascript method's body can be found in assets/js/demos.js
    demo.initDashboardPageCharts();


    demo.initVectorMap();

  });
</script>


  <!-- Prism JS script to beautify the HTML code -->
  <script type="text/javascript" src="{{asset('js/prism.js')}}"></script>

  <!-- WIRIS script -->
  <script type="text/javascript" src="{{asset('js/wirislib.js')}}"></script>

  <!-- Google Analytics -->
  <script src="{{asset('js/google_analytics.js')}}"></script>

  <script>
      if (typeof urlParams !== 'undefined') {
          var selectLang = document.getElementById('lang_select');
          selectLang.value = urlParams[1];
      }
  </script>
  <script src="{{asset('ckeditor4/ckeditor.js')}}"></script>

 
</body>

	</html>