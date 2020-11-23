 </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
       
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="logout.php">Logout</a>
        </div>
      </div>
    </div>
  </div>



  <!-- Bootstrap core JavaScript-->
  <script src="assets/sbadmin/vendor/jquery/jquery.min.js"></script>

  <script src="assets/datepicker/jquery-ui.js"></script>  <link rel="stylesheet" href="assets/datepicker/jquery-ui.css"></link> 
    <link rel="stylesheet" href="assets/datepicker/jquery-ui-1.8.21.custom.css" type="text/css"></link>   
  
<script>
    $(function () {
        $("#dateone").datepicker({ dateFormat: 'yy-mm-dd' }).val();
    $("#datetwo").datepicker({ dateFormat: 'yy-mm-dd' }).val();
    
    $("#date1").datepicker({ dateFormat: 'yy-mm-dd' }).val();
    $("#date2").datepicker({ dateFormat: 'yy-mm-dd' }).val();
    $("#date3").datepicker({ dateFormat: 'yy-mm-dd' }).val();
    $("#date4").datepicker({ dateFormat: 'yy-mm-dd' }).val();
    $("#date5").datepicker({ dateFormat: 'yy-mm-dd' }).val();
    
        $("#fdate_lh").datepicker({ dateFormat: 'yy-mm-dd' }).val();
    $("#fdate_idea_doornot").datepicker({ dateFormat: 'yy-mm-dd' }).val();
    
        $("#fdate_paraf1").datepicker({ dateFormat: 'yy-mm-dd' }).val();
        $("#fdate_paraf2").datepicker({ dateFormat: 'yy-mm-dd' }).val();
        $("#fdate_paraf3").datepicker({ dateFormat: 'yy-mm-dd' }).val();
    });
</script>

  
  <script src="assets/sbadmin/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="assets/sbadmin/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="assets/sbadmin/js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
 
  <script src="assets/sbadmin/vendor/chart.js/Chart.min.js"></script>
  

    <!-- Page level plugins -->
  <script src="assets/sbadmin/vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="assets/sbadmin/vendor/datatables/dataTables.bootstrap4.min.js"></script>
    <script src="assets/select2/select2.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="assets/sbadmin/js/demo/datatables-demo.js"></script>
  
  
  <script>
	    
		$("body").toggleClass("sidebar-toggled");
	    $(".sidebar").toggleClass("toggled");
	    e.preventDefault();
		
	
		/*
		function myFunction(x) {
		  if (x.matches) { // If media query matches
			setTimeout(function(){ $(".sidebar").toggleClass("toggled"); }, 2000);
		  } else {
			setTimeout(function(){ $(".sidebar").toggleClass("toggled"); }, 2000);
		  }
		}

		var x = window.matchMedia("(max-width: 900px)");
		myFunction(x); // Call listener function at run time
		x.addListener(myFunction);
		*/
	
	</script>

  <script>
    $(function () {
        $("#dateone").datepicker({ dateFormat: 'yy-mm-dd' }).val();
    $("#datetwo").datepicker({ dateFormat: 'yy-mm-dd' }).val();
    
    $("#date1").datepicker({ dateFormat: 'yy-mm-dd' }).val();
    $("#date2").datepicker({ dateFormat: 'yy-mm-dd' }).val();
    $("#date3").datepicker({ dateFormat: 'yy-mm-dd' }).val();
    $("#date4").datepicker({ dateFormat: 'yy-mm-dd' }).val();
    $("#date5").datepicker({ dateFormat: 'yy-mm-dd' }).val();
    
        $("#fdate_lh").datepicker({ dateFormat: 'yy-mm-dd' }).val();
    $("#fdate_idea_doornot").datepicker({ dateFormat: 'yy-mm-dd' }).val();
    
        $("#fdate_paraf1").datepicker({ dateFormat: 'yy-mm-dd' }).val();
        $("#fdate_paraf2").datepicker({ dateFormat: 'yy-mm-dd' }).val();
        $("#fdate_paraf3").datepicker({ dateFormat: 'yy-mm-dd' }).val();
    });
</script>



<script>

function update4s(fid) {
      
    var dataString = "fid="+fid; 	
	//alert(dataString);
	
	var yoi = "oke"+fid;
	
	 $.ajax({
    type: 'POST',
    data: dataString,
    url: 'status_dashboard_4s_os.php',       
    success: function(htmlx) {
      var myStr = htmlx;
      document.getElementById(yoi).innerHTML = "On Solving";
    }
    });
	
	
	
  }	
	

</script>


</body>

</html>
