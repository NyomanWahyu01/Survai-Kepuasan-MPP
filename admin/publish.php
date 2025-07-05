 <section class="au-breadcrumb m-t-75">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="au-breadcrumb-content">
                                    <div class="au-breadcrumb-left">
                                        <ul class="list-unstyled list-inline au-breadcrumb__list">
                                            <h3 class="text-xl font-bold text-bold">List Pertanyaan</h3>
                                        </ul>
                                    </div>
                                   
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
 
 <section>          
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <!-- DATA TABLE -->
                                <br>
                                
                                <div class="table-responsive table-responsive-data2">
                                    <table class="table table-data2">
                                        <thead>
                                            <tr>
                                                <th>No.</th>
                                                <th>ID Responden</th>
                                                <th>No. Wa</th>
                                                <th>Rata-rata</th>
                                                <th width='10'>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            include("koneksi.php");
                                            
                                            $query=mysqli_query($conn,"select * from data_responden where status_responden!='belum' ");
                                            $nomor=1;
                                            while($data=mysqli_fetch_array($query))
                                            {
                                                echo"
                                                
                                                <tr class='tr-shadow'>
                                                    <td>$nomor</td>
                                                    <td>
                                                        $data[id_responden]
                                                    </td>
                                                    <td>
                                                        $data[no_wa]
                                                    </td>
                                                    <td>?<td>
                                                   
                                                    <td>
                                                        <div class='table-data-feature'>
                                                         
                                                           
                                                            <button class='item' data-toggle='tooltip' data-placement='top' title='Detail'>
                                                                <a href='?page=detail.php&id_responden=$data[id_responden]'><i class='zmdi zmdi-eye'></i></a>
                                                            </button>
                                                            
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr class='spacer'></tr>
                                                ";
                                                $nomor++;
                                            }
                                            
                                            
                                            ?>
                                            
                                            
                                        </tbody>
                                    </table>
                                </div>
                                <!-- END DATA TABLE -->
                            </div>
                        </div>
                    </div>
                </div>
 </section>   
 
 
 
 
 	