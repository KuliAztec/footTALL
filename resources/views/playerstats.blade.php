<!DOCTYPE html>
<html>
<head>
    <title>Player Stats</title>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.css">
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.js"></script>
    <script>
        $(document).ready(function() {
            var table = $('#statsTable').DataTable({
                initComplete: function () {
                    this.api().columns().every(function (index) {
                        if (index > 1) {
                            var column = this;
                            var minInput = $('<input type="number" placeholder="Min" style="width: 50px; margin-right: 5px;">')
                                .appendTo($(column.footer()).empty())
                                .on('change', function () {
                                    column.draw();
                                });
                            var maxInput = $('<input type="number" placeholder="Max" style="width: 50px;">')
                                .appendTo($(column.footer()))
                                .on('change', function () {
                                    column.draw();
                                });

                            $.fn.dataTable.ext.search.push(
                                function(settings, data, dataIndex) {
                                    var min = parseFloat(minInput.val(), 10);
                                    var max = parseFloat(maxInput.val(), 10);
                                    var value = parseFloat(data[column.index()], 10) || 0;

                                    if ((isNaN(min) && isNaN(max)) ||
                                        (isNaN(min) && value <= max) ||
                                        (min <= value && isNaN(max)) ||
                                        (min <= value && value <= max)) {
                                        return true;
                                    }
                                    return false;
                                }
                            );
                        }
                    });
                }
            });

            $('#resetFilters').on('click', function() {
                $('input[type="number"]').val('');
                table.draw();
            });
        });
    </script>
</head>
<body>
    <h1>Player Stats</h1>
    <a href="/">Go to Home</a>
    <button id="resetFilters">Reset Filters</button>
    <table id="statsTable" class="display">
        <thead>
            <tr>
                <th>ID</th>
                <th>Player Name</th>
                <th>Apps</th>
                <th>Sub</th>
                <th>Goals</th>  
                <th>Assists</th>
                <th>Avg Rating</th>
                <th>Mins</th>
                <th>NP XG per 90</th>
                <th>Conv %</th>
                <th>Shots</th>
                <th>XG per Shot</th>
                <th>Shots per 90</th>
                <th>Goals per 90</th>
                <th>XG OP</th>
                <th>OP KP per 90</th>
                <th>Ch C per 90</th>
                <th>PR Passes per 90</th>
                <th>XA per 90</th>
                <th>OP CRS C per 90</th>
                <th>Pass %</th>
                <th>TGLS per 90</th>
                <th>Drb per 90</th>
                <th>HDR %</th>
                <th>Int per 90</th>
                <th>Blk per 90</th>
                <th>TCON per 90</th>
                <th>Pres C per 90</th>
                <th>GL MST</th>
                <th>Gwin</th>
                <th>Shots Outside Box per 90</th>
                <th>XG</th>
                <th>NP XG</th>
                <th>Pens</th>
                <th>PS C per 90</th>
                <th>Sprints per 90</th>
                <th>FA</th>
                <th>TCK per 90</th>
                <th>TCK R</th>
                <th>HDRS W per 90</th>
                <th>CLR per 90</th>
                <th>Poss Won per 90</th>
                <th>Poss Lost per 90</th>
                <th>Yel</th>
                <th>Red</th>
                <th>XGP per 90</th>
                <th>SV %</th>
                <th>Con per 90</th>
                <th>Cln per 90</th>
                <th>Wage</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th>ID</th>
                <th>Player Name</th>
                <th>Apps</th>
                <th>Sub</th>
                <th>Goals</th>
                <th>Assists</th>
                <th>Avg Rating</th>
                <th>Mins</th>
                <th>NP XG per 90</th>
                <th>Conv %</th>
                <th>Shots</th>
                <th>XG per Shot</th>
                <th>Shots per 90</th>
                <th>Goals per 90</th>
                <th>XG OP</th>
                <th>OP KP per 90</th>
                <th>Ch C per 90</th>
                <th>PR Passes per 90</th>
                <th>XA per 90</th>
                <th>OP CRS C per 90</th>
                <th>Pass %</th>
                <th>TGLS per 90</th>
                <th>Drb per 90</th>
                <th>HDR %</th>
                <th>Int per 90</th>
                <th>Blk per 90</th>
                <th>TCON per 90</th>
                <th>Pres C per 90</th>
                <th>GL MST</th>
                <th>Gwin</th>
                <th>Shots Outside Box per 90</th>
                <th>XG</th>
                <th>NP XG</th>
                <th>Pens</th>
                <th>PS C per 90</th>
                <th>Sprints per 90</th>
                <th>FA</th>
                <th>TCK per 90</th>
                <th>TCK R</th>
                <th>HDRS W per 90</th>
                <th>CLR per 90</th>
                <th>Poss Won per 90</th>
                <th>Poss Lost per 90</th>
                <th>Yel</th>
                <th>Red</th>
                <th>XGP per 90</th>
                <th>SV %</th>
                <th>Con per 90</th>
                <th>Cln per 90</th>
                <th>Wage</th>
            </tr>
        </tfoot>
        <tbody>
            @foreach ($stats as $stat)
            <tr>
                <td>{{ $stat->id }}</td>
                <td>{{ $stat->name }}</td>
                <td>{{ $stat->apps }}</td>
                <td>{{ $stat->sub }}</td>
                <td>{{ $stat->gls }}</td>
                <td>{{ $stat->ast }}</td>
                <td>{{ $stat->av_rat }}</td>
                <td>{{ $stat->mins }}</td>
                <td>{{ $stat->np_xg_per_90 }}</td>
                <td>{{ $stat->conv_perc }}</td>
                <td>{{ $stat->shots }}</td>
                <td>{{ $stat->xg_per_shot }}</td>
                <td>{{ $stat->sht_per_90 }}</td>
                <td>{{ $stat->gls_per_90 }}</td>
                <td>{{ $stat->xg_op }}</td>
                <td>{{ $stat->op_kp_per_90 }}</td>
                <td>{{ $stat->ch_c_per_90 }}</td>
                <td>{{ $stat->pr_passes_per_90 }}</td>
                <td>{{ $stat->xa_per_90 }}</td>
                <td>{{ $stat->op_crs_c_per_90 }}</td>
                <td>{{ $stat->pas_perc }}</td>
                <td>{{ $stat->tgls_per_90 }}</td>
                <td>{{ $stat->drb_per_90 }}</td>
                <td>{{ $stat->hdr_perc }}</td>
                <td>{{ $stat->int_per_90 }}</td>
                <td>{{ $stat->blk_per_90 }}</td>
                <td>{{ $stat->tcon_per_90 }}</td>
                <td>{{ $stat->pres_c_per_90 }}</td>
                <td>{{ $stat->gl_mst }}</td>
                <td>{{ $stat->gwin }}</td>
                <td>{{ $stat->shots_outside_box_per_90 }}</td>
                <td>{{ $stat->xg }}</td>
                <td>{{ $stat->np_xg }}</td>
                <td>{{ $stat->pens }}</td>
                <td>{{ $stat->ps_c_per_90 }}</td>
                <td>{{ $stat->sprints_per_90 }}</td>
                <td>{{ $stat->fa }}</td>
                <td>{{ $stat->tck_per_90 }}</td>
                <td>{{ $stat->tck_r }}</td>
                <td>{{ $stat->hdrs_w_per_90 }}</td>
                <td>{{ $stat->clr_per_90 }}</td>
                <td>{{ $stat->poss_won_per_90 }}</td>
                <td>{{ $stat->poss_lost_per_90 }}</td>
                <td>{{ $stat->yel }}</td>
                <td>{{ $stat->red }}</td>
                <td>{{ $stat->xgp_per_90 }}</td>
                <td>{{ $stat->sv_perc }}</td>
                <td>{{ $stat->con_per_90 }}</td>
                <td>{{ $stat->cln_per_90 }}</td>
                <td>{{ $stat->wage }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
