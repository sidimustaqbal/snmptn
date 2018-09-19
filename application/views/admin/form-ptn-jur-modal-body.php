<div class="modal-dialog">
    <div class="modal-content">
	<!-- form tambah -->
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Form Tambah PTN</h4>
      </div>
      <div class="modal-body">
		<form id="formPtn" class="form-horizontal" role="form" method="post" action="<?php echo base_url(); ?>ptn/tambah_ptn_jur">
		  <div class="form-group">
			<label class="col-sm-3 control-label">Nama PTN</label>
			<div class="col-sm-8">
			  <input type="hidden" id="idJur" class="form-control" name="idPtn" value="<?php echo $id_jur; ?>">
			  <input type="text" id="namaPtn" class="form-control" name="namaPtn" placeholder="Nama PTN">
			  <!--<select multiple data-role="tagsinpus" id="namaJur" name="namaJur">
				 <option value="Amsterdam">Amsterdam</option>
					<option value="Washington">Washington</option>
					<option value="Sydney">Sydney</option>
					<option value="Beijing">Beijing</option>
					<option value="Cairo">Cairo</option>
			  </select>
			  -->
			</div>
		  </div>
		</form>
		<div id="status"></div>
      </div>
      <div class="modal-footer">
        <button type="button" id="btnClose" class="btn btn-default">Close</button>
        <button type="button" id="btnSimpan" class="btn btn-primary">Save changes</button>
      </div>
    </div>
	<!-- end form tambah-->
  </div>
<script>
	$('#namaPtn').typeahead({
		name:'nama_ptn',
		remote: base_url+'ptn/cari_ptn/%QUERY',
		displayKey:'nama_ptn',
		limit:4
	});
	$('.tt-query').css('background-color','#fff');
	
	$(document).ready(function() {
		$('#btnClose').click(function() {
			var id_jur = $('#idJur').val();
			$('#jurModal').load(base_url+'admin/daftar_ptn_jur/'+id_jur);
		});
		
		$('#btnSimpan').click(function() {
			var id_jur=$('#idJur').val();
			var namaPtn=$('#namaPtn').val();
			
			$.ajax({
				data:'id_jur='+id_jur+'&namaPtn='+namaPtn,
				type:'POST',
				url: base_url+'ptn/tambah_ptn_jur/',
				success:function(msg) {
					$('#jurModal .modal-dialog .modal-content .modal-body #status').html(msg);
					/*if (msg.indexOf('Berhasil')>0) {
						var kembali=setTimeout(function() {
								$('#ptnModal').load(base_url+'admin/daftar_jurusan/'+id_ptn);
							},2000);
					}*/
				}
			});
		});
	});
</script>
<script src="<?php echo base_url(); ?>asset/jquery-validation/dist/jquery.validate.min.js"></script>
	<script>
	$('#formPtn').validate({
		rules : {
			nama_ptn : {
				required : true
			}
		},
		messages : {
			namaPtn : {
				required : "Kolom Nama PTN Tidak Boleh Kosong"
			}
		}
	});
	</script>