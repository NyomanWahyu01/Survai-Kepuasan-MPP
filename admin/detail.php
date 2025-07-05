
<!-- HEADER JAWABAN SURVEI -->
 <section class="au-breadcrumb m-t-75">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="au-breadcrumb-content">
                                    <div class="au-breadcrumb-left">
                                        <ul class="list-unstyled list-inline au-breadcrumb__list">
                                           <h3 class="text-xl font-bold text-bold">List Detail</h3>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
 <!-- END JAWABAN SURVEI -->

<!-- DETAIL JAWABAN SURVEI -->
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
                                                <th>Pertanyaaan</th>
                                                <th>Bobot Jawaban</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            include("koneksi.php");
                                            $id_responden=$_GET['id_responden'];
                                            $query=mysqli_query($conn,"select * from data_pertanyaan, data_jawaban where data_pertanyaan.id_pertanyaan=data_jawaban.id_pertanyaan and data_jawaban.id_responden='$id_responden'");
                                            $nomor=1;
                                            while($data=mysqli_fetch_array($query))
                                            {
                                                echo"
                                                
                                                <tr class='tr-shadow'>
                                                    <td>$nomor</td>
                                                    <td>
                                                        $data[pertanyaan]
                                                    </td>
                                                    <td>
                                                        $data[point_jawaban]
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
 <!-- END ISI SURVEI -->
 
 
 	