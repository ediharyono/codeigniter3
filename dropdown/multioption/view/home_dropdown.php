<script type="text/javascript" src="<?php echo base_url(); ?>asset/js/jquery-1.3.2.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>asset/js/jquery.livequery.js"></script>
<script type="text/javascript">

$(document).ready(function() {
	$('#loading').ajaxStart(function(){
		$(this).fadeIn();
	}).ajaxStop(function(){
		$(this).fadeOut();
	});

	$('.parent_daerah').livequery('change', function() {
		$(this).nextAll('.parent_daerah').remove();
		$(this).nextAll('.hasil').remove();
		$.post("<?php echo base_url(); ?>index.php/multi_dropdown/cari_daerah", {kode_parent: $(this).val(),
		}, function(response){
			setTimeout("selesaiMuatData('tampil_daerah', '"+escape(response)+"')", 300);
		});
		return false;
	});
});

function selesaiMuatData(kode, response){
  $('#'+kode).append(unescape(response));
}
</script>

<div id="loading" style="display:none"><img src="<?php echo base_url(); ?>asset/images/loading.gif" /><br />Memuat Data...</div>
<p align="center">Site Map Pulau Bali</p>
<div id="content">
	<div id="tampil_daerah">
		<select class="parent_daerah">
		<?php
		foreach($daerah->result_array() as $d)
		{?>
			<option value="<?php echo $d['kode_daerah'];?>"><?php echo $d['nama_daerah'];?></option>
		<?php
		}?>
		</select>
	</div>
</div>
