<!-- Link to Google CDN's jQuery + jQueryUI; fall back to local -->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script>
    if (!window.jQuery) {
        document.write('<script src="/js/admin/libs/jquery-2.1.1.min.js"><\/script>');
    }
</script>

<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
<script>
    if (!window.jQuery.ui) {
        document.write('<script src="/js/admin/libs/jquery-ui-1.10.3.min.js"><\/script>');
    }
</script>

<!-- IMPORTANT: APP CONFIG -->
<script src="/js/admin/app.config.js"></script>

<!-- JS TOUCH : include this plugin for mobile drag / drop touch events-->
<script src="/js/admin/plugin/jquery-touch/jquery.ui.touch-punch.min.js"></script> 

<!-- BOOTSTRAP JS -->
<script src="/js/admin/bootstrap/bootstrap.min.js"></script>

<!-- CUSTOM NOTIFICATION -->
<script src="/js/admin/notification/SmartNotification.min.js"></script>

<!-- JARVIS WIDGETS -->
<script src="/js/admin/smartwidgets/jarvis.widget.min.js"></script>

<!-- browser msie issue fix -->
<script src="/js/admin/plugin/msie-fix/jquery.mb.browser.min.js"></script>

<!-- FastClick: For mobile devices -->
<script src="/js/admin/plugin/fastclick/fastclick.min.js"></script>

<!-- MAIN APP JS FILE -->
<script src="/js/admin/app.min.js"></script>

<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        }
    });
</script>

<!-- DATA TABLES -->
<script src="/js/admin/plugin/datatables/jquery.dataTables.min.js"></script>
<script src="/js/admin/plugin/datatables/dataTables.colVis.min.js"></script>
<script src="/js/admin/plugin/datatables/dataTables.tableTools.min.js"></script>
<script src="/js/admin/plugin/datatables/dataTables.bootstrap.min.js"></script>
<script src="/js/admin/plugin/datatables/i18n/spanish.js"></script>
<script src="/js/admin/plugin/datatable-responsive/datatables.responsive.min.js"></script>

<!-- JS PROPIOS -->
<script src="/js/admin/DT.js"></script>
<script src="/js/admin/Box.js"></script>

<!-- PAGE RELATED PLUGIN(S) -->
@yield('scripts')

@stack('scripts')

<script type="text/javascript">
    $(document).ready(function() {
        pageSetUp();        
    });
</script>