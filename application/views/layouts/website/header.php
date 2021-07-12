<style type="text/css">
<!--
.style2 {color: #FFFFFF}
-->
</style>
<header>
    <div class="header-area">
        <div class="main-header ">
            <div class="header-top d-none d-lg-block">
                <div class="container-fluid">
                    <div class="col-xl-12">
                        <div class="row d-flex justify-content-between align-items-center">
                            <div class="header-info-left d-flex">
                                <ul>
                                    <li><i class="fa fa-phone" aria-hidden="true"></i>Phone: </li>
                                    <li><i class="fa fa-envelope" aria-hidden="true"></i>Email: </li>
                                </ul>
                               </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

    <!-- Header End -->
<nav class="navbar navbar-icon-top navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="<?= base_url('') ?>">GIS PBB</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="<?= base_url('') ?>">
          <i class="fa fa-home"></i>
          Home
          <span class="sr-only">(current)</span>
          </a>
      </li>
     <!-- <li class="nav-item">
        <a class="nav-link" href="#">
          <i class="fa fa-envelope-o">
            <span class="badge badge-danger">11</span>
          </i>
          Link
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link disabled" href="#">
          <i class="fa fa-envelope-o">
            <span class="badge badge-warning">11</span>
          </i>
          Disabled
        </a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fa fa-envelope-o">
            <span class="badge badge-primary">11</span>
          </i>
          Dropdown
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#">Action</a>
          <a class="dropdown-item" href="#">Another action</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Something else here</a>
        </div>
      </li>
    </ul>-->
    <ul class="navbar-nav ">
      <li class="nav-item">
        <a class="nav-link" href="#">
          <i class="fa fa-bell">
            <span class="badge badge-info">11</span>
          </i>
          Test
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">
          <i class="fa fa-globe">
            <span class="badge badge-success">11</span>
          </i>
          Test
        </a>
      </li>
	   <li class="nav-item">
        <a class="nav-link" href="#">
          <i class="fa fa-globe">
            <span class="badge badge-success">11</span>
          </i>
          Test
        </a>
      </li>
	   <li class="nav-item">
        <a class="nav-link" href="#" data-toggle="modal" data-target="#exampleModalCenter">
          <i class="fa fa-search">
            <!--<span class="badge badge-success">11</span>-->
          </i>
          Cari
        </a>
      </li>
    </ul>
  </div>
</nav>

        </div>
    </div>

</header>

<!-- header end -->
<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header navbar-dark bg-dark">
        <h2 class="modal-title" id="exampleModalCenterTitle">
        <span class="style2">Pencarian Objek Pajak</span>
        </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
     
<div class="box box-primary">
        <div class="box-header with-border">
          <center>
          	<h3 class="box-title">Cari NOP</h3>
          </center>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
          <div class="box-body table-responsive">
		    
            	  <table class="table" width="100%">
 <!-- <thead class="thead-light">
    <tr>
      <th colspan="5" scope="col"><div align="center">Pencarian NOP </div></th>
      </tr>
  </thead>-->
    <thead>
	<tr>
      <th><span class="control-label ">NOP</span></th>
      <th>:</th>
      <th> 
								<th><input  type="text" maxlength="2" id="nop1" name="nop1" value="33" readonly="" class="form-control"></th>
								<th ><input  type="text" maxlength="2" id="nop2" name="nop2" value="26" readonly="" class="form-control"></th>
								<th ><input  type="text" maxlength="3" id="nop3" name="nop3" class="form-control"></th>
								<th ><input  type="text" maxlength="3" id="nop4" name="nop4" class="form-control"></th>
								<th ><input  type="text" maxlength="3" id="nop5" name="nop5" class="form-control"></th>
								<th ><input  type="text" maxlength="4" id="nop6" name="nop6" class="form-control"></th>
								<th><input  type="text" maxlength="1" id="nop7" name="nop7" class="form-control"></th>
							  <script type="text/javascript">
								$("#nop1, #nop2, #nop3, #nop4, #nop5, #nop6, #nop7").keyup(function(){
									updates();
								});
								
								function updates() {
								  $("#nop").val($('#nop1').val() + $('#nop2').val() + $('#nop3').val() + $('#nop4').val() + $('#nop5').val() + $('#nop6').val() + $('#nop7').val());
								}
								
								</script>
							  <input type="hidden" maxlength="18" id="nop" name="nop" required placeholder="Masukkan NOP" class="form-control">
							    </th><th><span class="input-group-btn">
                  <button type="button" id="btn" class="btn btn-info btn-flat">Cari</button>
                </span></th>
    </tr>
	</thead>
</table>
 <script type="text/javascript">
      	$(document).ready(function(){
			$('#btn').on('click', function() {
      			var nop = $('#nop').val();
				var loading = '<td style="text-align: center; color: blue; font-size: 20px; font-weight: bold;" colspan="11" id="notif">Harap Tunggu. Sedang memuat data ...</td>';
				$('#result').html(loading);
				$('#loader').show();
	            //$('#notif').text("Memuat data ...");
				setTimeout(
				  	function(){
				    	load(nop);
					}, 100
				);
			});

			$('#nop').keypress(function (e) {
      			var nop = $('#nop').val();
				var key = e.which;
				if(key == 13){
					var loading = '<td style="text-align: center; color: blue; font-size: 20px; font-weight: bold;" colspan="11" id="notif">Harap Tunggu. Sedang memuat data ...</td>';
					$('#result').html(loading);
					$('#loader').show();
		            //$('#notif').text("Memuat data ...");
					setTimeout(
					  	function(){
					    	load(nop);
						}, 100
					);
				}
			});   

			function load(nop){
				$.ajax({
	                url : "https://simpelpbb.pekalongankab.go.id/cek/pelayanan.php",
                    method : "GET",
                    data : {nop: nop},
	                async : false,
	                dataType : 'json',
	                success: function(data){
	                	$('#result').html("");
	                	//console.log(data);
	                	$('#nop').val("");
	                	var html = '';
	                	if (data.length == 0) {
	                		html += "<tr><td style='text-align: center; color: red; font-size: 20px; font-weight: bold;'' colspan='11'>Data tidak ditemukan. Silahkan periksa kembali NOP anda.</td></tr>";
		                }else{
		                	for (var i = 0; i < data.length; i++) {
	                			if (data[i].status == "LUNAS") {
	                				var link = '<?= site_url('bng?nop=') ?>'+nop;
					                var notif_nop = "<a href='"+link+"'>di sini</a>";
	                			}else if (data[i].status == "BELUM LUNAS") {
	                				var link = '<?= site_url('bng?nop=') ?>'+nop;
					                var notif_nop = "<a href='"+link+"'>di sini</a>";;
	                			}
	                			html += "<tr><td>"+data[i].nop+"</td><td>"+data[i].namas+"</td><td>"+data[i].alamat_op+"</td><td>"+data[i].kelurahan+"</td><td>"+data[i].kecamatan+"</td><td>"+data[i].kabupaten+"</td><td>"+data[i].provinsi+"</td><td>"+notif_nop+"</td></tr>";
		                	}
		                }
	                	$('#result').html(html);
	                },
	                error: function (xhr, ajaxOptions, thrownError) {
				        // alert(xhr.status);
				        // alert(thrownError);
				        console.log(xhr.status);
				        var loading = '<td style="text-align: center; color: red; font-size: 20px; font-weight: bold;" colspan="11" id="notif">Ups! tidak dapat memproses permintaan anda saat ini. Tunggu beberapa saat lagi.</td>';
					$('#result').html(loading);
				    }
	            });
			}
		});
      </script>
			<table class="table table-hover table-striped table-bordered" style="margin-top: 30px; margin-bottom: 30px">
				<thead>
					<tr>
						<th>NOP</th>
						<th>NAMA</th>
						<th>ALAMAT</th>
						<th>KELURAHAN</th>
						<th>KECAMATAN</th>
						<th>KABUPATEN</th>
						<th>PROVINSI</th>
						<th>LIHAT LOKASI</th>
					</tr>
				</thead>
				<tbody id="result">
					<tr id="loader" style="display: none">
						<td style="text-align: center; color: red; font-size: 20px; font-weight: bold;" colspan="11" id="notif">Memuat data ...</td>
					</tr>
				</tbody>
			</table>
			
          </div>
      </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
        
      </div>
    </div>
  </div>
</div>
