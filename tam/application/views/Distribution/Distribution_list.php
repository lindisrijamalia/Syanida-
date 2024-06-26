<?php echo _css('selectize,datepicker') ?>

<?php echo card_open('Form', 'bg-green', true) ?>

<form method="POST" action="<?php echo $link_submit; ?>">
    <div class='row'>
        <div class='col-md-6 col-xl-6'>
            <div class='form-group'>
                <label class='form-label'>SUMBER</label>
                <select id="sumber" readonly name="sumber" class="form-control">
                    <option value="semua" <?php echo ($filter['sumber'] == "semua") ? "selected" : ""; ?>>Semua Sumber</option>
                    <option value="CORPORATE" <?php echo ($filter['sumber'] == "CORPORATE") ? "selected" : ""; ?>>CORPORATE</option>
                    <option value="EBS" <?php echo ($filter['sumber'] == "EBS") ? "selected" : ""; ?>>EBS</option>
                    <option value="FBCC" <?php echo ($filter['sumber'] == "FBCC") ? "selected" : ""; ?>>FBCC</option>
                    <option value="Indihome" <?php echo ($filter['sumber'] == "Indihome") ? "selected" : ""; ?>>Indihome</option>
                    <option value="infomedia" <?php echo ($filter['sumber'] == "infomedia") ? "selected" : ""; ?>>infomedia</option>
                    <option value="KW2" <?php echo ($filter['sumber'] == "KW2") ? "selected" : ""; ?>>KW2</option>
                    <option value="KW4" <?php echo ($filter['sumber'] == "KW4") ? "selected" : ""; ?>>KW4</option>
                    <option value="NOSSA" <?php echo ($filter['sumber'] == "NOSSA") ? "selected" : ""; ?>>NOSSA</option>
                    <option value="NV0290" <?php echo ($filter['sumber'] == "NV0290") ? "selected" : ""; ?>>NV0290</option>
                    <option value="ProfillingMyCX" <?php echo ($filter['sumber'] == "ProfillingMyCX") ? "selected" : ""; ?>>ProfillingMyCX</option>
                    <option value="Reg Unreg" <?php echo ($filter['sumber'] == "Reg Unreg") ? "selected" : ""; ?>>Reg Unreg</option>
                    <option value="SC FCC" <?php echo ($filter['sumber'] == "SC FCC") ? "selected" : ""; ?>>SC FCC</option>
                    <option value="SSOF" <?php echo ($filter['sumber'] == "SSOF") ? "selected" : ""; ?>>SSOF</option>
                    <option value="Treg3" <?php echo ($filter['sumber'] == "Treg3") ? "selected" : ""; ?>>Treg3</option>
                    <option value="VERIFIED_LAMA" <?php echo ($filter['sumber'] == "VERIFIED_LAMA") ? "selected" : ""; ?>>VERIFIED_LAMA</option>
                    <option value="webpranpc" <?php echo ($filter['sumber'] == "webpranpc") ? "selected" : ""; ?>>webpranpc</option>
                </select>
            </div>
        </div>
    </div>
    <div class='row'>


        <div class='col-md-4 col-xl-4'>
            <div class='form-group'>
                <label class='form-label'>LENGTH NCLI</label>
                <input type='number' readonly class='form-control data-sending focus-color' id='length_ncli' name='length_ncli' placeholder='<?php echo $title->general->desc_required ?>' value='<?php echo $filter['length_ncli'] ?>'>
            </div>
        </div>
        <div class='col-md-4 col-xl-4'>
            <div class='form-group'>
                <label class='form-label'>Operator NCLI</label>
                <select id="operator_ncli" readonly name="operator_ncli" class="form-control">
                    <option value="LIKE" <?php echo ($filter['operator_ncli'] == "LIKE") ? "selected" : ""; ?>>LIKE</option>
                    <option value="NOT LIKE" <?php echo ($filter['operator_ncli'] == "NOT LIKE") ? "selected" : ""; ?>>NOT LIKE</option>
                </select>
            </div>
        </div>
        <div class='col-md-4 col-xl-4'>
            <div class='form-group'>
                <label class='form-label'>NCLI</label>
                <input type='text' readonly class='form-control data-sending focus-color' id='ncli' name='ncli' placeholder='<?php echo $title->general->desc_required ?>' value='<?php echo $filter['ncli'] ?>'>
            </div>
        </div>
        <div class='col-md-6 col-xl-6'>
            <div class='form-group'>
                <label class='form-label'>Operator NO PSTN</label>
                <select id="operator_no_pstn" readonly name="operator_no_pstn" class="form-control">
                    <option value="LIKE" <?php echo ($filter['operator_no_pstn'] == "LIKE") ? "selected" : ""; ?>>LIKE</option>
                    <option value="NOT LIKE" <?php echo ($filter['operator_no_pstn'] == "NOT LIKE") ? "selected" : ""; ?>>NOT LIKE</option>

                </select>
            </div>
        </div>
        <div class='col-md-6 col-xl-6'>
            <div class='form-group'>
                <label class='form-label'>NO PSTN</label>
                <input type='text' readonly class='form-control data-sending focus-color' id='no_pstn' name='no_pstn' placeholder='<?php echo $title->general->desc_required ?>' value='<?php echo $filter['no_pstn'] ?>'>
            </div>
        </div>
        <div class='col-md-6 col-xl-6'>
            <div class='form-group'>
                <label class='form-label'>Operator NO INTERNET</label>
                <select id="operator_no_speedy" readonly name="operator_no_speedy" class="form-control">
                    <option value="LIKE" <?php echo ($filter['operator_no_speedy'] == "LIKE") ? "selected" : ""; ?>>LIKE</option>
                    <option value="NOT LIKE" <?php echo ($filter['operator_no_speedy'] == "NOT LIKE") ? "selected" : ""; ?>>NOT LIKE</option>

                </select>
            </div>
        </div>
        <div class='col-md-6 col-xl-6'>
            <div class='form-group'>
                <label class='form-label'>NO INTERNET</label>
                <input type='text' readonly class='form-control data-sending focus-color' id='no_speedy' name='no_speedy' placeholder='<?php echo $title->general->desc_required ?>' value='<?php echo $filter['no_speedy'] ?>'>
            </div>
        </div>
        <div class='col-md-6 col-xl-6'>
            <div class='form-group'>
                <label class='form-label'>NO HANDPHONE</label>
                <select readonly id="no_handpone" name="no_handpone" class="form-control">
                    <option value="semua">Tidak Difilter</option>
                    <option value="not_like">Filter LIKE 08%</option>
                </select>
            </div>
        </div>

    </div>


    <?php echo card_close() ?>
    <div class="col-lg-12 col-xs-12 blink_me_veri">
        <div class="small-box bg-green">
            <div class="inner">
                <h3 id="verified"><?php echo number_format($jumlah_data); ?></h3>
                <p>Jumlah Data</p>
            </div>
            <div class="icon-counter">
                <i class="fa fa-check-square-o"></i>
            </div>
        </div>
    </div>
    <?php echo card_open('Pembagian DAPROS', 'bg-green', true) ?>


    <!-- <div class='row'>

        <div class='col-md-6 col-xl-6'>
            <div class='form-group'>
                <label class='form-label'>DUPLICATE</label>
                <input type='text' class='form-control data-sending focus-color' id='no_speedy' name='no_speedy' placeholder='<?php echo $title->general->desc_required ?>' value='<?php echo $filter['no_speedy'] ?>'>
            </div>
        </div>
    </div> -->
    <div class='row'>
        <div class='col-md-6 col-xl-6'>
            <div class='form-group'>
                <label class='form-label'>AGENT</label>
                <select name='agentid' id="select-agent" onchange="kalkulate()" class="form-control custom-select">
                    <option value="0">--Semua Agent--</option>
                    <?php
                    if ($list_agent_d['num'] > 0) {
                        foreach ($list_agent_d['results'] as $list_agent) {
                            $selected = "";
                            echo "<option value='" . $list_agent->agentid . "' " . $selected . ">" . $list_agent->agentid . "-" . $list_agent->nama . "</option>";
                        }
                    }
                    ?>

                </select>
            </div>
        </div>
        <div class='col-md-6 col-xl-6'>
            <div class='form-group'>
                <label class='form-label'>LIMIT</label>
                <input type="hidden" name="jumlah_data" id="jumlah_data" value="<?php echo $jumlah_data; ?>">
                <input type="hidden" name="jumlah_agent" id="jumlah_agent" value="<?php echo $list_agent_d['num']; ?>">
                <input type='number' maxlength="<?php echo $jumlah_data; ?>" class='form-control data-sending focus-color' id='limit' name='limit' placeholder='<?php echo $title->general->desc_required ?>' value='0' onkeyup="kalkulate()" required>
            </div>
        </div>
        <div class='col-md-6 col-xl-6'>
            <div class='form-group'>
                <label class='form-label'>JUMLAH</label>
                <input type='text' readonly class='form-control data-sending focus-color' id='dibagi' name='dibagi' placeholder='<?php echo $title->general->desc_required ?>' value='0'>
            </div>
        </div>
        <div class='col-md-6 col-xl-6'>
            <div class='form-group'>
                <label class='form-label'>SISA</label>
                <input type='text' readonly class='form-control data-sending focus-color' id='sisa' name='sisa' placeholder='<?php echo $title->general->desc_required ?>' value='<?php echo $jumlah_data ?>'>
            </div>
        </div>

        <div class='col-md-12 col-xl-12'>

            <div class='form-group'>
                <button type='submit' class='btn btn-primary'><i class="fe fe-save"></i> BAGIKAN</button>
                <a href='<?php echo $link_back ?>' id='btn-close' class='btn btn-primary'> <?php echo $title->general->button_close ?></a>
            </div>

        </div>
    </div>
</form>


<?php echo card_close() ?>
<?php echo _js('selectize,datepicker') ?>

<script>
    var page_version = "1.0.8"
</script>

<script>
    var custom_select = $('.custom-select').selectize({});
    var custom_select_link = $('.custom-select-link');

    function kalkulate() {
        var jumlah_data = parseInt($("#jumlah_data").val());
        var limit = parseInt($("#limit").val());
        var agentid = $("#select-agent").val();
        var jumlah_agent = parseInt($("#jumlah_agent").val());
        if (agentid == "0") {
            $("#dibagi").val(limit * jumlah_agent);
            $("#sisa").val(jumlah_data - (limit * jumlah_agent));
        } else {
            $("#dibagi").val(limit);
            $("#sisa").val(jumlah_data - (limit));
        }


    }
    $(document).ready(function() {
        <?php
        /*
	|--------------------------------------------------------------
	| CARA MEMBUAT COMBOBOX LINK
	|--------------------------------------------------------------
	| COMBOBOX LINK adalah proses membuat sebuah combobox menjadi 
	| referensi combobox lainnya dalam menampilkan data.
	| misal :
	|  combobox grup menjadi referensi combobox subgrup.
	|  perubahan/pemilihan data combobox grup menyebabkan 
	|  perubahan data combobox subgrup. 
	|--------------------------------------------------------------
	| cara :
	|  - isi "field_link" pada combobox target 
	| 	 'field_link'	=>'nama_field_join_database'.
	|  - gunakan class "custom-select-link" pada kedua combobox ,
	|	 referensi dan target.
	|  - tambahkan script :
	|     linkToSelectize('id_cmb_referensi','id_cmb_target');
	|--------------------------------------------------------------
	| note :
	|   - struktur database harus menggunakan field id sebagai primary key
	|   - combobox harus di buat dengan php code
	|	-  "create_cmb_database" untuk row < 1000
	|	-  dan linkToSelectize untuk row < 1000
	|
	|	-  "create_cmb_database_bigdata" untuk row > 1000
	|	-  dan linkToSelectize_Big untuk row > 1000
	|   - 
	|   - class harus menggunakan "custom-select-link"
	|
	*/
        ?>
    })


    $('.data-sending').keydown(function(e) {
        remove_message();
        switch (e.which) {
            case 13:
                apply();
                return false;
        }
    });
</script>

<script>
    $('.input-simple-date').datepicker({
        autoclose: true,
        format: 'dd.mm.yyyy',
    })

    $('#btn-apply').click(function() {
        apply();
        play_sound_apply();
    });

    $('#btn-close').click(function() {
        play_sound_apply();
    });

    $('#btn-cancel').click(function() {
        cancel();
        play_sound_apply();
    });

    $('#btn-save').click(function() {
        simpan();
    })

    function apply() {
        $.each(custom_select, function(key, val) {
            val.selectize.disable();
        });

        <?php
        // NOTE : FOR DISABLE CUSTOM-SELECT-LINK 
        ?>
        // $.each(custom_select_link,function(key,val){
        // 		val.selectize.disable();
        // });

        $('.form-control').attr('disabled', true);
        $('#btn-apply').attr('disabled', true);
        $('#btn-cancel').attr('disabled', false);
        $('#btn-save').attr('disabled', false);
        $('#btn-save').focus();
    }

    function cancel() {
        $.each(custom_select, function(key, val) {
            val.selectize.enable();
        });
        <?php
        // NOTE : FOR ENABLE CUSTOM-SELECT-LINK  
        ?>
        // $.each(custom_select_link,function(key,val){
        // 		val.selectize.enable();
        // });

        $('.form-control').attr('disabled', false);
        $('#btn-cancel').attr('disabled', true);
        $('#btn-save').attr('disabled', true);
        $('#btn-apply').attr('disabled', false);

    }
</script>