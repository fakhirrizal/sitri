                        <!-- END PAGE CONTENT INNER -->
						</div>
                </div>
                <!-- END PAGE CONTENT BODY -->
                <!-- END CONTENT BODY -->
            </div>
            <!-- END CONTENT -->
            
        </div>
        <!-- END CONTAINER -->
        <!-- BEGIN FOOTER -->
        <!-- BEGIN PRE-FOOTER -->
        <div class="page-prefooter">
            <div class="container">
				<div class="row">
                    <?php
                    $q = "SELECT * from aplikasi";
                    $hasil = $this->Main_model->manualQuery($q)->result();
                    foreach ($hasil as $key => $value) {
                    ?>
                    <div class="col-md-6 col-sm-6 col-xs-12 footer-block">
                        <h2>About</h2>
                        <p> <?= $value->about; ?> </p>
                    </div>
                    <!-- <div class="col-md-3 col-sm-6 col-xs12 footer-block">
                        <h2>Subscribe Email</h2>
                        <div class="subscribe-form">
                            <form action="javascript:;">
                                <div class="input-group">
                                    <input type="text" placeholder="mail@email.com" class="form-control">
                                    <span class="input-group-btn">
                                        <button class="btn" type="submit">Submit</button>
                                    </span>
                                </div>
                            </form>
                        </div>
                    </div> -->
                    <div class="col-md-3 col-sm-6 col-xs-12 footer-block">
                        <!-- <h2>Follow Us On</h2>
                        <ul class="social-icons">
                            <li>
                                <a href="javascript:;" data-original-title="rss" class="rss"></a>
                            </li>
                            <li>
                                <a href="#" data-original-title="facebook" class="facebook"></a>
                            </li>
                            <li>
                                <a href="#" data-original-title="twitter" class="twitter"></a>
                            </li>
                            <li>
                                <a href="#" data-original-title="instagram" class="instagram"></a>
                            </li>
                            <li>
                                <a href="#" data-original-title="linkedin" class="linkedin"></a>
                            </li>
                            <li>
                                <a href="#" data-original-title="youtube" class="youtube"></a>
                            </li>
                            <li>
                                <a href="javascript:;" data-original-title="vimeo" class="vimeo"></a>
                            </li>
                        </ul> -->
                    </div>
                    <div class="col-md-3 col-sm-6 col-xs-12 footer-block">
                        <h2>Contacts</h2>
                        <address class="margin-bottom-40"> Phone: <?= $value->phone; ?>
                            <br> Email:
                            <a href="mailto:<?= $value->email; ?>"><?= $value->email; ?></a>
                        </address>
                    </div>
                    <?php } ?>
                </div>
            </div>
        </div>
        <!-- END PRE-FOOTER -->
        <!-- BEGIN INNER FOOTER -->
        <div class="page-footer">
            <div class="container"> 2018 &copy; Partai Keadilan Sejahtera
            </div>
        </div>
        <div class="scroll-to-top">
            <i class="icon-arrow-up"></i>
        </div>
        <!-- END FOOTER -->
        <!--[if lt IE 9]>
<script src="../assets/global/plugins/respond.min.js"></script>
<script src="../assets/global/plugins/excanvas.min.js"></script> 
<![endif]-->
        <!-- BEGIN CORE PLUGINS -->
        <script src="<?=base_url('assets/global/plugins/jquery.min.js');?>" type="text/javascript"></script>
        <script src="<?=base_url('assets/global/plugins/bootstrap/js/bootstrap.min.js');?>" type="text/javascript"></script>
        <script src="<?=base_url('assets/global/plugins/js.cookie.min.js');?>" type="text/javascript"></script>
        <script src="<?=base_url('assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js');?>" type="text/javascript"></script>
        <script src="<?=base_url('assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js');?>" type="text/javascript"></script>
        <script src="<?=base_url('assets/global/plugins/jquery.blockui.min.js');?>" type="text/javascript"></script>
        <script src="<?=base_url('assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js');?>" type="text/javascript"></script>
        <!-- END CORE PLUGINS -->
		<!-- BEGIN THEME GLOBAL SCRIPTS -->
		<script src="<?=base_url('assets/global/plugins/amcharts/amcharts/amcharts.js');?>" type="text/javascript"></script>
        <script src="<?=base_url('assets/global/plugins/amcharts/amcharts/serial.js');?>" type="text/javascript"></script>
        <script src="<?=base_url('assets/global/scripts/datatable.js');?>" type="text/javascript"></script>
        <script src="<?=base_url('assets/global/plugins/datatables/datatables.min.js');?>" type="text/javascript"></script>
		<script src="<?=base_url('assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js');?>" type="text/javascript"></script>
		<script src="<?=base_url('assets/global/plugins/select2/js/select2.full.min.js');?>" type="text/javascript"></script>
        <script src="<?=base_url('assets/global/plugins/jquery-validation/js/jquery.validate.min.js');?>" type="text/javascript"></script>
        <script src="<?=base_url('assets/global/plugins/jquery-validation/js/additional-methods.min.js');?>" type="text/javascript"></script>
        <script src="<?=base_url('assets/global/plugins/bootstrap-wizard/jquery.bootstrap.wizard.min.js');?>" type="text/javascript"></script>
		<script src="<?=base_url('assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js');?>" type="text/javascript"></script>
		<script src="<?=base_url('assets/global/plugins/ladda/spin.min.js');?>" type="text/javascript"></script>
		<script src="<?=base_url('assets/global/plugins/ladda/ladda.min.js');?>" type="text/javascript"></script>
		<script src="<?=base_url('assets/global/plugins/moment.min.js');?>" type="text/javascript"></script>
		<script src="<?=base_url('assets/global/plugins/bootstrap-daterangepicker/daterangepicker.min.js');?>" type="text/javascript"></script>
		<script src="<?=base_url('assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js');?>" type="text/javascript"></script>
		<script src="<?=base_url('assets/global/plugins/bootstrap-timepicker/js/bootstrap-timepicker.min.js');?>" type="text/javascript"></script>
		<script src="<?=base_url('assets/global/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js');?>" type="text/javascript"></script>
		<script src="<?=base_url('assets/global/plugins/clockface/js/clockface.js');?>" type="text/javascript"></script>
		<script src="<?=base_url('assets/global/scripts/app.min.js');?>" type="text/javascript"></script>
		<script src="<?=base_url('assets/pages/scripts/components-select2.min.js');?>" type="text/javascript"></script>
		<script src="<?=base_url('assets/pages/scripts/table-datatables-managed.min.js');?>" type="text/javascript"></script>
		<script src="<?=base_url('assets/pages/scripts/table-datatables-editable.min.js');?>" type="text/javascript"></script>
		<script src="<?=base_url('assets/pages/scripts/form-wizard.min.js');?>" type="text/javascript"></script>
		<script src="<?=base_url('assets/pages/scripts/ui-buttons.min.js');?>" type="text/javascript"></script>
		<script src="<?=base_url('assets/pages/scripts/ui-blockui.min.js');?>" type="text/javascript"></script>
		<script src="<?=base_url('assets/pages/scripts/components-date-time-pickers.min.js');?>" type="text/javascript"></script>
		<script src="https://code.highcharts.com/highcharts.js"></script>
		<script type="text/javascript" src="https://code.highcharts.com/modules/exporting.js"></script>
        <!-- END THEME GLOBAL SCRIPTS -->
        <!-- BEGIN THEME LAYOUT SCRIPTS -->
        <script src="<?=base_url('assets/layouts/layout3/scripts/layout.min.js');?>" type="text/javascript"></script>
        <script src="<?=base_url('assets/layouts/layout3/scripts/demo.min.js');?>" type="text/javascript"></script>
        <script src="<?=base_url('assets/layouts/global/scripts/quick-sidebar.min.js');?>" type="text/javascript"></script>
        <!-- END THEME LAYOUT SCRIPTS -->
    </body>

</html>