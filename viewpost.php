<?php
include ('conexoes/conexao4.php');?>
</div>
</div>
</div>
<div class="container">
<div class="row">
        <div class="col-md-6">
            <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title painel-title-responsive">Quadro de Avisos</h3>
                    </div>
<div class="panel-body">

            <table class="table table-striped table table-bordered table-hover table-responsive">
                    <tr>

                <thead> <th>Data</th>
                        <th>Mensagem</th>
                            </tr>
                </thead>
<?php

foreach ($rows as $row){

    $dt = date ("d/m h:i", strtotime($row->data));
    ?>                
    <?php
    echo "<tr><td>$dt</td> <td> $row->mensagem</td></tr>";
    }?>
</tbody>
</table>
</div>
</div>
</div>