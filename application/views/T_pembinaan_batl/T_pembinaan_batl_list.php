<?php echo _css('datatables,icheck') ?>

<?php echo card_open('List of BATL', 'bg-teal', true) ?>
<div class='row'>
	<div class='col-md-6 col-lg-4'>
		<?php echo button_card($title->general->button_create, $title->general->button_create_desc, 'text-green', 'btn-success', 'fe fe-list', 'bg-green', 'btn-create', $link_create) ?>
	</div>
	
</div>

<div class="card-body">
	<div class='box-body table-responsive' id='box-table'>
		<small>
			<table class='display responsive' id="example" style="width: 100%;">
				<thead>
					<tr>
						<th style="font-size: 12px"><b>No</b></th>
						<th style="font-size: 12px"><b>Opsi</b></th>
						<th style="font-size: 12px"><b>Penerima Teguran</b></th>
						<th style="font-size: 12px"><b>Pemberi Teguran</b></th>
						<th style="font-size: 12px"><b>Tanggal</b></th>
						<th style="font-size: 12px"><b>Isi Teguran Lisan</b></th>
						<th style="font-size: 12px"><b>Pertimbangan dan Tindakan</b></th>
						<th style="font-size: 12px"><b>Komitmen</b></th>
						<th style="font-size: 12px"><b>Verifikasi</b></th>
						<th style="font-size: 12px"><b>Evidance</b></th>
					</tr>
				</thead>
				<tbody>
					<?php
					$nomor = 1;
					foreach ($batl as $datana) {

					?>
						<tr>
							<td style="font-size: 11px"><?php echo $nomor; ?></td>
							<td style="font-size: 11px"><a href="<?php echo base_url()?>T_pembinaan_batl/T_pembinaan_batl/detail?id=<?php echo $datana->id?>" target="_blank"><i class="fe fe-list"></i></a></td>							
							<td style="font-size: 11px"><?php echo $datana->penerima_teguran; ?></td>
							<td style="font-size: 11px"><?php echo $datana->pemberi_teguran; ?></td>
							<td style="font-size: 11px"><?php echo $datana->tanggal_teguran; ?></td>
							<td style="font-size: 11px"><?php echo $datana->isi_teguran_lisan; ?></td>
							<td style="font-size: 11px"><?php echo $datana->pertimbangan_tindakan; ?></td>
							<td style="font-size: 11px"><?php echo $datana->komitmen; ?></td>
							<td style="font-size: 11px"><?php echo $datana->verifikasi; ?></td>
							<td style="font-size: 11px"><?php echo $datana->evidance; ?></td>

						</tr>
					<?php
						$nomor++;
					}
					?>
				</tbody>
			</table>

			<div hidden>
				<button type='button' class='btn btn-danger btn-sm' data-toggle='modal' data-target='#modal-danger' id='button_delete_single'></button>
			</div>
		</small>
	</div>

	<?php echo card_close() ?>

	<?php echo _js('datatables,icheck') ?>

	<script>
		var page_version = "1.0.8"
	</script>
	<script type="text/javascript">
		$(document).ready(function() {
			$("#example").DataTable({
				dom: 'Bfrtip',
				buttons: [
					'copy', 'csv', 'excel', 'pdf'
				]
			});
		});
	</script>

	<script>
		function deleteItem() {
			if (confirm("anda ingin hapus data ini?")) {
				// your deletion code
			}
			return false;
		}
	</script>
	<?php echo card_close() ?>
	<?php echo _js('datatables,icheck') ?>
	<script>
		var page_version = "1.0.8"
	</script>

	<script>


		$('#btn-delete').click(function() {
			ybsDeleteTableChecked('<?php echo $link_delete ?>', '#table-detail');
		});
	</script>