
		<!-- Vendor -->
		<script src="{{ asset('js/jquery.js')}}"></script>
		<script src="{{ asset('js/nanoscroller.js')}}"></script>

		{{-- <script src="{{ asset('css/jquery-browser-mobile/jquery.browser.mobile.js')}}"></script> --}}
		<script src="{{ asset('js/bootstrap.js')}}"></script>
		<!-- Theme Base, Components and Settings -->
		<script src="{{ asset('js/theme.js')}}"></script>

		<!-- Theme Custom -->
		<script src="{{ asset('js/theme.custom.js')}}"></script>
		<!-- Theme Initialization Files -->
		<script src="{{ asset('js/theme.init.js')}}"></script>
		<script src="{{ asset('js/jquery.autosize.js')}}"></script>
        <!--Start of Tawk.to Script-->
        <script type="text/javascript">
            var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
            (function(){
                var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
                s1.async=true;
                s1.src='https://embed.tawk.to/5e9410fa35bcbb0c9ab06470/default';
                s1.charset='UTF-8';
                s1.setAttribute('crossorigin','*');
                s0.parentNode.insertBefore(s1,s0);
            })();
        </script>
        <!--End of Tawk.to Script-->
@yield('js')
