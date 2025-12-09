<?php
session_start();
error_reporting(0);
if ($_SESSION['nowa'] == '') {
    header('Location: index.php');
}
?>
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <!--<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">-->

    <title>Survei Kepuasan Masyarakat</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

<!--

TemplateMo 570 Chain App Dev

https://templatemo.com/tm-570-chain-app-dev

-->

    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link rel="stylesheet" href="assetss/css/templatemo-chain-app-dev.css">
    <link rel="stylesheet" href="assetss/css/animated.css">
    <link rel="stylesheet" href="assetss/css/owl.css">
    <link rel="stylesheet" href="vendor/bootstrap/css/survai.css">

    <style>
      .survey-option {
        cursor: pointer;
        margin-bottom: 10px;
      }
      
      .survey-radio {
        display: none;
      }
      
      .option-card {
        transition: all 0.3s ease;
        border: 2px solid #e9ecef !important;
        background: linear-gradient(145deg, #ffffff, #f8f9fa) !important;
      }
      
      .survey-radio:checked + .option-card {
        background: linear-gradient(145deg, #e3f2fd, #bbdefb) !important;
        border-color: #64b5f6 !important;
        transform: translateY(-2px);
      }
      
      .option-img {
        transition: transform 0.2s;
      }
      
      .survey-option:hover .option-card {
        background: linear-gradient(145deg, #f5f5f5, #e9ecef) !important;
        border-color: #90caf9 !important;
      }
      
      .option-text {
        font-size: 1rem;
        color: #f5f5f5;
      }
      
      .card {
        transition: transform 0.3s ease;
      }
      
      .card:hover {
        transform: translateY(-5px);
      }
      
      .btn-success {
        padding: 10px 25px;
        font-weight: 500;
        letter-spacing: 0.5px;
        transition: all 0.3s ease;
      }
      
      .btn-success:hover {
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(0,0,0,0.1);
      }
      
      .header-area {
        background: transparent;
        box-shadow: 0 2px 10px rgba(0,0,0,0.1);
      }
      
      .header-area .main-nav .nav li a {
        color: #333 !important;
      }
      
      body {
        background-color: #f8f9fa;
      }
      
      .question-header-1 {
        background: linear-gradient(135deg, #26c6da, #00acc1) !important;
      }
      
      .question-header-2 {
        background: linear-gradient(135deg, #66bb6a, #43a047) !important;
      }
      
      .question-header-3 {
        background: linear-gradient(135deg, #ffa726, #fb8c00) !important;
      }
      
      .question-header-4 {
        background: linear-gradient(135deg, #ab47bc, #8e24aa) !important;
      }
      
      /* Style untuk opsi jawaban berdasarkan karakter */
      /* Opsi 4 (Sangat Puas/Sangat Baik) */
      .option-card[data-value="4"] {
        background: linear-gradient(145deg, #e8f5e9, #c8e6c9) !important;
        border-color: #81c784 !important;
      }
      
      /* Opsi 3 (Puas/Baik) */
      .option-card[data-value="3"] {
        background: linear-gradient(145deg, #e3f2fd, #bbdefb) !important;
        border-color: #64b5f6 !important;
      }
      
      /* Opsi 2 (Cukup/Kurang) */
      .option-card[data-value="2"] {
        background: linear-gradient(145deg, #fff3e0, #ffe0b2) !important;
        border-color: #ffb74d !important;
      }
      
      /* Opsi 1 (Tidak Puas/Buruk) */
      .option-card[data-value="1"] {
        background: linear-gradient(145deg, #ffebee, #ffcdd2) !important;
        border-color: #e57373 !important;
      }
      
      /* Hover effects */
      .survey-option:hover .option-card[data-value="4"] {
        background: linear-gradient(145deg, #c8e6c9, #a5d6a7) !important;
      }
      
      .survey-option:hover .option-card[data-value="3"] {
        background: linear-gradient(145deg, #bbdefb, #90caf9) !important;
      }
      
      .survey-option:hover .option-card[data-value="2"] {
        background: linear-gradient(145deg, #ffe0b2, #ffcc80) !important;
      }
      
      .survey-option:hover .option-card[data-value="1"] {
        background: linear-gradient(145deg, #ffcdd2, #ef9a9a) !important;
      }
      
      /* Selected state */
      .survey-radio:checked + .option-card[data-value="4"] {
        background: linear-gradient(145deg, #a5d6a7, #81c784) !important;
        border-color: #4caf50 !important;
      }
      
      .survey-radio:checked + .option-card[data-value="3"] {
        background: linear-gradient(145deg, #90caf9, #64b5f6) !important;
        border-color: #2196f3 !important;
      }
      
      .survey-radio:checked + .option-card[data-value="2"] {
        background: linear-gradient(145deg, #ffcc80, #ffb74d) !important;
        border-color: #ff9800 !important;
      }
      
      .survey-radio:checked + .option-card[data-value="1"] {
        background: linear-gradient(145deg, #ef9a9a, #e57373) !important;
        border-color: #f44336 !important;
      }
      
      /* Styling untuk container utama */
      .about-us.section {
        padding: 80px 0;
        background: linear-gradient(135deg, #f8f9fa, #e9ecef);
      }
      
      /* Card styling */
      .card {
        border: none;
        border-radius: 15px;
        box-shadow: 0 8px 20px rgba(0,0,0,0.05);
        overflow: hidden;
        margin-bottom: 25px;
      }
      
      /* Header pertanyaan */
      .card-header {
        padding: 20px 25px;
        border: none;
      }
      
      .card-header h3 {
        font-size: 1.2rem;
        font-weight: 600;
        margin: 0;
        line-height: 1.4;
      }
      
      /* Body card */
      .card-body {
        padding: 25px;
        background: rgba(255, 255, 255, 0.9) !important;
      }
      
      /* Styling opsi jawaban */
      .option-card {
        padding: 15px !important;
        border-radius: 12px !important;
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1) !important;
        height: 100%;
      }
      
      .option-card:hover {
        transform: translateY(-3px) !important;
        box-shadow: 0 10px 20px rgba(0,0,0,0.1) !important;
      }
      
      /* Image dalam opsi */
      .option-img {
        width: 40px !important;
        height: 40px !important;
        object-fit: contain;
        margin-right: 15px !important;
        transition: transform 0.3s ease;
      }
      
      /* Text opsi */
      .option-text {
        font-size: 0.95rem;
        font-weight: 500;
        color: #2c3e50;
      }
      
      /* Button styling */
      .btn-success {
        background: linear-gradient(135deg, #28a745, #218838);
        border: none;
        border-radius: 50px;
        padding: 12px 35px;
        font-weight: 600;
        letter-spacing: 0.5px;
        box-shadow: 0 5px 15px rgba(40, 167, 69, 0.2);
      }
      
      .btn-success:hover {
        background: linear-gradient(135deg, #218838, #1e7e34);
        transform: translateY(-2px);
        box-shadow: 0 8px 20px rgba(40, 167, 69, 0.3);
      }
      
      /* Kritik & Saran styling */
      textarea.form-control {
        border: 2px solid #e9ecef;
        border-radius: 12px;
        padding: 15px;
        min-height: 150px;
        font-size: 0.95rem;
        transition: all 0.3s ease;
      }
      
      textarea.form-control:focus {
        border-color: #80bdff;
        box-shadow: 0 0 0 0.2rem rgba(0,123,255,.25);
      }
      
      /* Logo styling */
      .right-image img {
        max-width: 100%;
        height: auto;
        filter: drop-shadow(0 10px 20px rgba(0,0,0,0.1));
        animation: floatAnimation 3s ease-in-out infinite;
      }
      
      @keyframes floatAnimation {
        0% {
          transform: translateY(0px);
        }
        50% {
          transform: translateY(-20px);
        }
        100% {
          transform: translateY(0px);
        }
      }
      
      /* Responsive adjustments */
      @media (max-width: 768px) {
        .card-header h3 {
          font-size: 1.1rem;
        }
        
        .option-text {
          font-size: 0.9rem;
        }
        
        .right-image img {
          width: 80% !important;
          margin: 30px auto;
        }
        
        @keyframes floatAnimation {
          0% {
            transform: translateY(0px);
          }
          50% {
            transform: translateY(-10px); /* Lebih kecil untuk mobile */
          }
          100% {
            transform: translateY(0px);
          }
        }
      }
      
      /* Animation */
      .aos-init {
        opacity: 0;
        transform: translateY(20px);
        transition: all 0.6s ease;
      }
      
      .aos-animate {
        opacity: 1;
        transform: translateY(0);
      }

      /* Custom Alert Styling */
      .custom-alert {
        position: fixed;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        background: linear-gradient(145deg, #ffffff, #f8f9fa);
        border-radius: 15px;
        padding: 20px 30px;
        box-shadow: 0 5px 25px rgba(0,0,0,0.2);
        z-index: 9999;
        display: none;
        min-width: 320px;
        max-width: 450px;
        border-left: 5px solid #dc3545;
        animation: slideIn 0.3s ease-out;
      }

      .custom-alert-content {
        display: flex;
        align-items: center;
        gap: 15px;
      }

      .custom-alert-icon {
        background: rgba(220, 53, 69, 0.1);
        width: 40px;
        height: 40px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #dc3545;
        font-size: 1.2rem;
      }

      .custom-alert-message {
        color: #2c3e50;
        font-size: 1rem;
        font-weight: 500;
        margin: 0;
        flex: 1;
      }

      .alert-overlay {
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: rgba(0,0,0,0.5);
        z-index: 9998;
        display: none;
        animation: fadeIn 0.2s ease-out;
      }

      @keyframes slideIn {
        from {
          transform: translate(-50%, -60%);
          opacity: 0;
        }
        to {
          transform: translate(-50%, -50%);
          opacity: 1;
        }
      }

      @keyframes fadeIn {
        from { opacity: 0; }
        to { opacity: 1; }
      }

      /* Update checkbox styling */
      .option-card {
        position: relative;
        padding-right: 35px !important; /* Ubah padding-left menjadi padding-right */
      }

      .option-card::before {
        content: '';
        position: absolute;
        right: 15px; /* Ubah left menjadi right */
        top: 50%;
        transform: translateY(-50%);
        width: 24px;
        height: 24px;
        border: 2px solid #e9ecef;
        border-radius: 50%;
        background: white;
        transition: all 0.3s ease;
      }

      .survey-radio:checked + .option-card::before {
        border-color: #28a745;
        background: #28a745;
      }

      .survey-radio:checked + .option-card::after {
        content: '✓';
        position: absolute;
        right: 20px; /* Ubah left menjadi right */
        top: 50%;
        transform: translateY(-50%);
        color: white;
        font-size: 14px;
        font-weight: bold;
      }

      /* Update struktur opsi jawaban */
      .option-card .d-flex {
        justify-content: flex-start;
        align-items: center;
      }

      .option-img {
        margin-right: 15px !important;
        width: 45px !important;
      }

      .option-text {
        flex: 1;
        margin-right: 15px; /* Tambah margin untuk jarak dengan checkbox */
      }

      .btn-success {
        position: relative;
        overflow: hidden;
        transition: all 0.3s ease;
      }

      .btn-success:disabled {
        opacity: 0.7;
        cursor: not-allowed;
      }

      .btn-success i {
        margin-left: 5px;
        transition: all 0.3s ease;
      }

      .btn-success:hover i {
        transform: translateX(3px);
      }

      @keyframes spin {
        from { transform: rotate(0deg); }
        to { transform: rotate(360deg); }
      }

      .fa-spinner {
        animation: spin 1s linear infinite;
      }

      .card-header.bg-gradient-primary {
        background: linear-gradient(135deg, #2C8709, #5DE2E7);
      }

      .form-control:focus {
        border-color: #2C8709; 
        box-shadow: 0 0 0 0.2rem rgba(0, 102, 204, 0.25);
      }

      #saran-error {
        font-size: 0.875rem;
        margin-top: 0.5rem;
      }
    </style>

  </head>

<body>

 

  <!-- ***** Header Area Start ***** -->
  <header class="header-area header-sticky wow slideInDown" data-wow-duration="0.75s" data-wow-delay="0s">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <nav class="main-nav">
            <!-- ***** Logo Start ***** -->
            <a href="index.html" class="logo">
              <img src="assetss/images/logo1.png" alt="Chain App Dev" >
              <!--<b>Survey Kepuasan Masyarakat</b>-->
            </a>
            <!-- ***** Logo End ***** -->
          </nav>
        </div>
      </div>
    </div>
  </header>
  <!-- ***** Header Area End ***** -->

  <!-- ***** SURVEI ***** -->
  <div id="about" class="about-us section">
  <div class="container">
    <div class="row">
      <div class="col-lg-6 align-self-center">
        <div class="section-heading">
        </div>
        <div class="row">
          <div class="col-lg-12">
            <div class="row content">
              <form action="simpan_survey.php" method="post">
                <?php
                include 'koneksi.php';
                $no = $_SESSION['no'];

                $query = mysqli_query(
                    $conn,
                    "select * from data_pertanyaan limit $no,1000"
                );
                $jum = mysqli_num_rows($query);

                if ($jum > 0) {
                    $i = $no;
                    $y = 1;

                    while ($data = mysqli_fetch_array($query)) {
                        $i++;
                        $kategori = ($data['id_pertanyaan'] % 4) + 1;
                        echo "
                    <div class='col-md-11 aos-init aos-animate' data-aos='fade-up'>
                      <br>
                      <div class='card shadow-sm border-0 rounded-lg'>
                        <div class='card-header question-header-{$kategori} text-white'>
                          <h3 id='pertanyaan' class='mb-0'>$i. $data[pertanyaan]</h3>
                        </div>
                        <div class='card-body bg-light'>
                          <ul class='list-unstyled'>
                            <div class='row g-3'>
                              <div class='col-md-6 mb-3'>
                                <label class='survey-option w-100'>
                                  <input type='radio' name='pilih$y' value='$data[id_pertanyaan],4' class='survey-radio'>
                                  <div class='option-card p-3 rounded-lg shadow-sm h-100' data-value='4'>
                                    <div class='d-flex align-items-center'>
                                      <img src='img/empat.png' class='option-img' style='width: 45px'>
                                      <span class='option-text'>Sangat Puas</span>
                                    </div>
                                  </div>
                                </label>
                              </div>
                              <div class='col-md-6 mb-3'>
                                <label class='survey-option w-100'>
                                  <input type='radio' name='pilih$y' value='$data[id_pertanyaan],3' class='survey-radio'>
                                  <div class='option-card p-3 rounded-lg shadow-sm h-100' data-value='3'>
                                    <div class='d-flex align-items-center'>
                                      <img src='img/tiga.png' class='option-img' style='width: 45px'>
                                      <span class='option-text'>$data[opsi3]</span>
                                    </div>
                                  </div>
                                </label>
                              </div>
                              <div class='col-md-6 mb-3'>
                                <label class='survey-option w-100'>
                                  <input type='radio' name='pilih$y' value='$data[id_pertanyaan],2' class='survey-radio'>
                                  <div class='option-card p-3 rounded-lg shadow-sm h-100' data-value='2'>
                                    <div class='d-flex align-items-center'>
                                      <img src='img/dua.png' class='option-img' style='width: 45px'>
                                      <span class='option-text'>$data[opsi2]</span>
                                    </div>
                                  </div>
                                </label>
                              </div>
                              <div class='col-md-6 mb-3'>
                                <label class='survey-option w-100'>
                                  <input type='radio' name='pilih$y' value='$data[id_pertanyaan],1' class='survey-radio'>
                                  <div class='option-card p-3 rounded-lg shadow-sm h-100' data-value='1'>
                                    <div class='d-flex align-items-center'>
                                      <img src='img/satu.png' class='option-img' style='width: 45px'>
                                      <span class='option-text'>$data[opsi1]</span>
                                    </div>
                                  </div>
                                </label>
                              </div>
                            </div>
                          </ul>
                        </div>
                      </div>
                    </div>
                    ";
                        $y++;
                    }

                    echo "
                  <input type='hidden' name='jum' value='$jum'>
                  <div class='col-md-11 aos-init aos-animate' data-aos='fade-up'>
                    <br>
                    <p>
                      <button type='button' onclick='validateSurvey(this.form, $jum, $i)' class='btn btn-success float-right' style='margin-right: -5px'>
                        Selanjutnya <i class='fa fa-arrow-circle-right'></i>
                      </button>
                    </p>
                    <br>
                  </div>
                  ";
                } else {
                    echo "
                  <div class='col-md-12 aos-init aos-animate' data-aos='fade-up'>
                    <br>
                    <div class='card' style='max-width: 800px; margin: 0 auto;'>
                      <div class='card-header bg-gradient-primary text-white'>
                        <h3 id='pertanyaan' style='font-size: 1.4rem; font-weight: 600;'>KRITIK DAN SARAN</h3>
                      </div>
                      <div class='card-body'>
                        <div class='form-group'>
                          <textarea name='saran' id='saran' rows='7' class='form-control' 
                            placeholder='Masukkan Kritik dan Saran Anda' 
                            style='min-height: 200px; font-size: 1rem;'></textarea>
                          <small class='text-danger' id='saran-error' style='display: none;'>
                          Harap Isi Kritik dan Saran Sebelum Kirim!
                          </small>
                        </div>
                      </div>
                    </div>
                    <br>
                    <p style='max-width: 800px; margin: 0 auto;'>
                      <input type='hidden' name='kirim' value='1'>
                      <button type='submit' class='btn btn-success float-right' 
                        onclick='return validateAndSubmit(this.form)' style='margin-right: -5px'>
                        Kirim <i class='fa fa-arrow-circle-right'></i>
                      </button>
                    </p>
                  </div>
                  ";
                }
                ?>
              </form>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-6">
        <div class="right-image">
          <img src="assetss/images/logo-pemda4.png" alt="" style="width: 800px" class="floating-logo">
        </div>
      </div>
    </div>
  </div>
</div>

<script>
function validateAndSubmit(form) {
    const saran = document.getElementById('saran').value.trim();
    const saranError = document.getElementById('saran-error');
    
    if (saran === '') {
        saranError.style.display = 'block';
        return false;
    }
    
    saranError.style.display = 'none';
    return true;
}

// Reset form state saat refresh
if (window.history.replaceState) {
    window.history.replaceState(null, null, window.location.href);
}

// Fungsi untuk validasi survey
function validateSurvey(form, totalQuestions, currentPage) {
    let answered = 0;
    
    // Cek setiap pertanyaan
    for(let i = 1; i <= totalQuestions; i++) {
        const options = document.getElementsByName(`pilih${i}`);
        let questionAnswered = false;
        
        for(let option of options) {
            if(option.checked) {
                questionAnswered = true;
                answered++;
                break;
            }
        }
        
        // Highlight pertanyaan yang belum dijawab
        if(!questionAnswered) {
            const questionCard = options[0].closest('.card');
            questionCard.style.border = '2px solid #dc3545';
            questionCard.scrollIntoView({ behavior: 'smooth', block: 'center' });
        } else {
            const questionCard = options[0].closest('.card');
            questionCard.style.border = 'none';
        }
    }
    
    if(answered < totalQuestions) {
        // Tampilkan custom alert
        const alertHtml = `
            <div class="alert-overlay"></div>
            <div class="custom-alert">
                <div class="custom-alert-content">
                    <div class="custom-alert-icon">
                        <i class="fas fa-exclamation-circle"></i>
                    </div>
                    <p class="custom-alert-message">Harap Isi Semua Survei Sebelum Melanjutkan!</p>
                </div>
            </div>
        `;
        
        if(!document.querySelector('.alert-overlay')) {
            document.body.insertAdjacentHTML('beforeend', alertHtml);
        }
        
        const overlay = document.querySelector('.alert-overlay');
        const alertBox = document.querySelector('.custom-alert');
        
        overlay.style.display = 'block';
        alertBox.style.display = 'block';
        
        setTimeout(() => {
            overlay.style.display = 'none';
            alertBox.style.display = 'none';
        }, 2000);
        
        return false;
    }
    
    // Jika semua pertanyaan sudah dijawab
    // Tambahkan input hidden u ntuk name='lanjut'
    const hiddenInput = document.createElement('input');
    hiddenInput.type = 'hidden';
    hiddenInput.name = 'lanjut';
    hiddenInput.value = currentPage;
    form.appendChild(hiddenInput);
    
    // Submit form
    form.submit();
}

// Style untuk custom alert
const alertStyle = `
<style>
.alert-overlay {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.5);
    z-index: 9998;
    display: none;
}

.custom-alert {
    position: fixed;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    background: white;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 0 20px rgba(0,0,0,0.2);
    z-index: 9999;
    display: none;
    min-width: 300px;
}

.custom-alert-content {
    display: flex;
    align-items: center;
    gap: 15px;
}

.custom-alert-icon {
    color: #dc3545;
    font-size: 24px;
}

.custom-alert-message {
    margin: 0;
    color: #333;
    font-size: 16px;
}
</style>
`;

// Tambahkan style ke head
document.head.insertAdjacentHTML('beforeend', alertStyle);
</script>


<!-- ***** END SURVEI ***** -->



  <!-- Scripts -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assetss/js/owl-carousel.js"></script>
  <script src="assetss/js/animation.js"></script>
  <script src="assetss/js/imagesloaded.js"></script>
  <script src="assetss/js/popup.js"></script>
  <script src="assetss/js/custom.js"></script>

</body>
</html>