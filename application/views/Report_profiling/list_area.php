<?php echo _css('datatables,icheck') ?>
<div class="card">
    <div class="card-status bg-orange"></div>
    <div class="card-header">
        <h3 class="card-title">Report Call Periode <?php echo $_GET['start'] . " sd " . $_GET['end'] ?>

        </h3>
        <div class="card-options">
            <a href="#" class="card-options-collapse " data-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a>
            <a href="#" class="card-options-fullscreen " data-toggle="card-fullscreen"><i class="fe fe-maximize"></i></a>
        </div>
    </div>
    <div class="card-body">
        <div class='box-body table-responsive' id='box-table'>
            <small>
                <table class='timecard' id="report_table_reg" style="width: 100%;">
                    <thead>
                        <tr>
                            <th><b>No</b></th>
                            <th nowrap><b>Nama Agent</b></th>
                            <th nowrap><b>User ID</b></th>
                            <th nowrap><b>Kategori</b></th>
                            <th style="background-color:green;color:white;"><b>Verified</b></th>
                            <th style="background-color:green;color:white;"><b>BP</b></th>
                            <th style="background-color:green;color:white;"><b>TBP</b></th>
                            <th style="background-color:green;color:white;"><b>FLUP</b></th>
                            <th style="background-color:blue;color:white;"><b>HPE</b></th>
                            <th style="background-color:blue;color:white;"><b>HPO</b></th>
                            <th style="background-color:red;color:white;"><b>RNA</b></th>
                            <th style="background-color:red;color:white;"><b>SS</b></th>
                            <th style="background-color:red;color:white;"><b>Isolir</b></th>
                            <th style="background-color:red;color:white;"><b>Decline</b></th>
                            <th style="background-color:red;color:white;"><b>Reject</b></th>
                            <th style="background-color:red;color:white;"><b>LR</b></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        $total = array();
                        $total['contacted'] = 0;
                        $total['uncontacted'] = 0;
                        $total['hp_email'] = 0;
                        $total['hp_only'] = 0;
                        $total['agent_online'] = 0;
                        for ($i = 1; $i < 16; $i++) {
                            $total[$i] = 0;
                        }
                        $data_profiling = $query_trans_profiling->result_array();
                        // $data_profiling_verifikasi=$query_trans_profiling_verifikasi->result_array();
                        if ($agent['num'] > 0) {
                            $sub_total_contacted = 0;
                            $sub_total_uncontacted = 0;
                            foreach ($agent['results'] as $ag) {

                                $data_agent = $controller->filter_by_value($data_profiling, 'veri_upd', $ag->agentid);
                                // $verified = $controller->filter_by_value($data_profiling_verifikasi, 'update_by', $ag->agentid);
                                // $verified = $controller->filter_by_value(array(), 'update_by', $ag->agentid);
                                $status_1 = count($controller->filter_by_value($data_agent, 'veri_call', '1'));
                                // $verified = $data_varified;
                                $verified = $controller->filter_by_value($data_agent, 'veri_call', '13');
                                $status_3 = count($controller->filter_by_value($data_agent, 'veri_call', '3'));
                                $status_12 = count($controller->filter_by_value($data_agent, 'veri_call', '12'));
                                $status_2 = count($controller->filter_by_value($data_agent, 'veri_call', '2'));
                                $status_4 = count($controller->filter_by_value($data_agent, 'veri_call', '4'));
                                $status_7 = count($controller->filter_by_value($data_agent, 'veri_call', '7'));
                                $status_11 = count($controller->filter_by_value($data_agent, 'veri_call', '11'));
                                $status_10 = count($controller->filter_by_value($data_agent, 'veri_call', '10'));
                                $status_14 = count($controller->filter_by_value($data_agent, 'veri_call', '14'));
                                $sub_total_contacted = $status_1 + count($verified) + $status_3 + $status_12;
                                $sub_total_uncontacted = $status_4 + $status_7 + $status_11 + $status_10 + $status_14 + $status_2;
                                $total['contacted'] = $total['contacted'] + $sub_total_contacted;
                                $total['uncontacted'] = $total['uncontacted'] + $sub_total_uncontacted;
                                $hp_email = $controller->filter_by_hp_email($verified, array("handphone", "email"), array("08", "@"));
                                $hp_only = $controller->filter_by_hp_only($verified, array("handphone", "email"), array("08", "@"));
                                $total['hp_email'] = $total['hp_email'] + count($hp_email);
                                $total['hp_only'] = $total['hp_only'] + count($hp_only);
                                $total[1] = $status_1 + $total[1];
                                $total[2] = $status_2 + $total[2];
                                $total[3] = $status_3 + $total[3];
                                $total[4] = $status_4 + $total[4];
                                $total[5] = $status_5 + $total[5];
                                $total[6] = $status_6 + $total[6];
                                $total[7] = $status_7 + $total[7];
                                $total[8] = $status_8 + $total[8];
                                $total[9] = $status_9 + $total[9];
                                $total[10] = $status_10 + $total[10];
                                $total[11] = $status_11 + $total[11];
                                $total[12] = $status_12 + $total[12];
                                $total[13] = count($verified) + $total[13];
                                $total[14] = $status_14 + $total[14];
                                $total[15] = $status_15 + $total[15];
                                $total[16] = $status_16 + $total[16];
                                 ?>

                                <tr>
                                    <td><?php echo $no; ?></td>
                                    <td style="text-align:left;"><?php echo $ag->nama; ?></td>
                                    <td style="text-align:left;"><?php echo $ag->agentid; ?></td>
                                    <td style="text-align:left;"><?php echo $ag->kategori; ?></td>
                                    <td><?php echo number_format(count($verified)); ?></td>
                                    <td><?php echo number_format($status_1); ?></td>
                                    <td><?php echo number_format($status_3); ?></td>
                                    <td><?php echo number_format($status_12); ?></td>
                                    <td><?php echo number_format(count($hp_email)); ?></td>
                                    <td><?php echo number_format(count($hp_only)); ?></td>

                                    <td><?php echo number_format($status_2); ?></td>
                                    <td><?php echo number_format($status_4); ?></td>
                                    <td><?php echo number_format($status_7); ?></td>
                                    <td><?php echo number_format($status_11); ?></td>
                                    <td><?php echo number_format($status_10); ?></td>
                                    <td><?php echo number_format($status_14); ?></td>

                                </tr>

                        <?php
                                if ($sub_total_contacted > 0 || $sub_total_uncontacted > 0) {
                                    $total['agent_online']++;
                                }
                                $no++;
                            }
                        }

                        ?>

                    </tbody>
                    <tfoot>
                        <tr>
                            <th colspan="4" style="text-align:right;">TOTAL</th>
                            <th style="background-color:green;color:white;"><?php echo number_format($total[13]); ?></th>
                            <th style="background-color:green;color:white;"><?php echo number_format($total[1]); ?></th>
                            <th style="background-color:green;color:white;"><?php echo number_format($total[3]); ?></th>
                            <th style="background-color:green;color:white;"><?php echo number_format($total[12]); ?></th>
                            <th style="background-color:blue;color:white;"><?php echo number_format($total['hp_email']); ?></th>
                            <th style="background-color:blue;color:white;"><?php echo number_format($total['hp_only']); ?></th>

                            <th style="background-color:red;color:white;"><?php echo number_format($total[2]); ?></th>
                            <th style="background-color:red;color:white;"><?php echo number_format($total[4]); ?></th>
                            <th style="background-color:red;color:white;"><?php echo number_format($total[7]); ?></th>
                            <th style="background-color:red;color:white;"><?php echo number_format($total[11]); ?></th>
                            <th style="background-color:red;color:white;"><?php echo number_format($total[10]); ?></th>
                            <th style="background-color:red;color:white;"><?php echo number_format($total[14]); ?></th>



                            </th>
                        </tr>
                    </tfoot>
                </table>
            </small>
        </div>
    </div>
</div>
<?php echo _js('datatables,icheck') ?>

<script type="text/javascript">
    $(document).ready(function() {
        $("#order_call").text('<?php echo number_format(count($query_trans_profiling->result_array())); ?>');
        $("#hp_email").text('<?php echo number_format($total['hp_email']); ?>');
        $("#hp_only").text('<?php echo number_format($total['hp_only']); ?>');
        $("#contacted").text('<?php echo number_format($total['contacted']); ?>');
        $("#verified").text('<?php echo number_format($total[13]); ?>');
        $("#agent_online").text('<?php echo number_format($total['agent_online']); ?>');
        $("#total_hp_email").text('<?php echo number_format($total['hp_email'] + $total['hp_only']); ?>');
        $("#report_table_reg").DataTable({
            dom: 'Bfrtip',
            buttons: [
                'copy', 'csv', 'excel', 'pdf'
            ]
        });
    });
</script>

<?php

?>