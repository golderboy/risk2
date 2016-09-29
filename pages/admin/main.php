        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">ระบบบันทึกความเสี่ยง</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
<div class="row">
    <div class="col-lg-12"> 
                    <div class="panel panel-default">
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                <tr>
                                    <th class="center">เรื่อง</th>
                                    <th class="center">วันที่เกิดเรื่อง</th>
                                    <th class="center">วันที่บันทึก</th>
                                    <th class="center">สถานะ</th>
                                    <th class="center">VIEW</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                               $sqls = " SELECT r.*,s.sta_name "
                                        . " FROM tb_risk r "
                                        . " left outer join sys_status_risk s ON s.sta_id = r.risk_status "
                                        . " where r.risk_status < 4"
                                        . " order by r.risk_status desc";
                                $results = mysql_query($sqls)or die($sqls);
                                while ($record = mysql_fetch_array($results)) {
                    echo "<tr class= 'odd gradeX'>
                            <td>$record[risk_name]</td>
                            <td>".$func->format_date($record['risk_datetime'])."</td>
                            <td>".$func->format_date($record['d_update'])."</td>
                            <td>$record[sta_name]</td>
                            <td align='center'><a href='?page=".sha1('view_risk')."&getid=$record[risk_id] '><i class='fa fa-search fa-fw'></i></a></td>
                        </tr>";
                                }
                                ?>
                            </tbody>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                    <!-- /.table-responsive -->
    </div>
            
</div>


