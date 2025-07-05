
					<div class="row">
						<div class="col-md-12 col-sm-12 ">
							<div class="x_panel">
								<div class="x_title">
									<h2>Set Password</h2>
									<div class="clearfix"></div>
								</div>
								<div class="x_content">
									<br />
									<form action='' method='POST' class="form-horizontal form-label-left">

										
										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="password_user">Password Baru
											</label>
											<div class="col-md-6 col-sm-6 ">
												<input type="password" name="password_baru"   class="form-control">
											</div>
										</div>
										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="password_user">Konfirmasi Password Baru
											</label>
											<div class="col-md-6 col-sm-6 ">
												<input type="password" name="konfirmasi"   class="form-control">
											</div>
										</div>
									
										<div class="ln_solid"></div>
										<div class="item form-group">
											<div class="col-md-6 col-sm-6 offset-md-3">
											
												<button type="submit" class="btn btn-success" name="simpan">Set Pass</button>
											</div>
										</div>

									</form>
								</div>
							</div>
						</div>
					</div>

<?php

session_start();
$id_admin=$_SESSION['id_admin'];

if(isset($_POST['simpan']))
{
    $pass_baru=$_POST['password_baru'];
    $konfir=$_POST['konfirmasi'];
    
    
    if($pass_baru!=$konfir)
    {
         echo"
            <script>
                alert('Password Baru dan Konfirmasi Password baru harus sama');
            </script>
        ";
    }else
    {
        include('koneksi.php');
         $simpan=mysqli_query($conn,"UPDATE `user` SET `password` = '$pass_baru' WHERE `user`.`id_user` = '$id_user';");
    

        if($simpan)
        {
    
    	
            echo"
                <script>
                    alert('Password Berhasi Diubah, Silahkan Login Kembali');
                    location.href='logout.php';
                </script>
            ";
        }else
        {
             echo"
                <script>
                    alert('Maaf, gagal mengirim');
                    history.back();
                </script>
            ";
        }
    }
}




?>
