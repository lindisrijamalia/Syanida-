<?php echo _css('datatables,icheck') ?>

<!-- <?php if ($this->session->flashdata('flash')) : ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        Data
        <strong>berhasil</strong> <?= $this->session->flashdata('flash'); ?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="content">
        <div class="container-fluid">
        <?php endif; ?> -->

<div class="card">
    <div class="card-header">
        <a href="<?= base_url('Kelola_dokumen/Kelola/tambah') ?>" class="btn btn-primary btn-sm"><i class="fas fa-plus-square"></i> Tambah Data</a>
        <!-- <a href="<?= base_url('') ?>" class="btn btn-danger btn-sm"><i class="fas fa-print"></i> Print</a> -->

    </div>

    <!-- <div style="margin-top: 50px;">
                <div class="col-md-2">
                    <div class="form-group">
                        <label>Sortir Jenis Dokumen</label>
                        <select class="form-control jenis_dokumen" name="">
                            <option>-- Pilih --</option>
                            <option value="Png">Png</option>
                            <option value="Jpg">Jpg</option>
                            <option value="Doc">Doc</option>
                            <option value="Pdf">Pdf</option>
                            <option value="Xls">Xls</option>
                        </select>
                    </div>
                </div>
            </div> -->

    <div class="card-body">
        <div class="box-body table-responsive" id="box-table"></div>
        <table id="example" class="display responsive nowrap" style="width: 100%">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Dokumen</th>
                    <th>Jenis Dokumen</th>
                    <th>Nama Dokumen</th>
                    <th>Keterangan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $id = 1;
                $jenisdkmn = array(
                    'pdf' => 'dokumen',
                    'docx' => 'dokumen',
                    'xlsx' => 'dokumen',
                    'jpg' => 'gambar',
                    'png' => 'gambar',
                    'jpeg' => 'gambar',
                );
                foreach ($t_dokumen as $td) : ?>
                    <tr>
                        <td><?= $id++ ?></td>
                        <td><?= $td->dokumen ?></td>
                        <td><?php
                            $newstrings = explode(".", $td->dokumen);
                            $extention = $newstrings[1];
                            // echo $extention;
                            if (isset($jenisdkmn[$extention])) {
                                echo $jenisdkmn[$extention];
                            }
                            ?></td>
                        <td><?= $td->nama_dokumen ?></td>
                        <td><?= $td->keterangan ?></td>
                        <td>
                            <a href="<?= base_url('Kelola_dokumen/Kelola/edit/' . $td->id) ?>" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>
                            <a href="<?= base_url('Kelola_dokumen/Kelola/hapus/' . $td->id) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda Yakin Ingin Menghapus Data Ini?')"><i class="fas fa-trash"></i></a>
                            <a target='_blank' href="<?= base_url('Kelola_dokumen/Kelola/download/?dokumen=' . $td->dokumen) ?>" class="btn btn-secondary btn-sm"><i class="fas fa-download"></i></a>
                        </td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
</div>
</div>

<?php echo _js('datatables,icheck') ?>

<script>
    var page_version = "1.0.8"
</script>
<script>
    $(document).ready(function() {
        $('#example').DataTable();
    });

    function deleteItem() {
        if (confirm("anda ingin hapus data ini?")) {
            // your deletion code
        }
        return false;
    }
</script>