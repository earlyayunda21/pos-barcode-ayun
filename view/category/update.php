<?php
    include_once("../../config/database.php");

    session_start();

    if($_SESSION['username'] == ""){
      header('location:../index.php');
    }

    $queryId = $_GET["id"];

    if(isset($_POST['submit'])){
      $nm_cat = $_POST["update"];

      $sql = "UPDATE tb_category SET name='$category' WHERE id ='$queryId";
      $result = $pdo->query($sql);

      if($result){
        echo"<script> alert('Data Berhasil Diperbarui')</script>";
      }
      else
      {
        echo"<script> alert('Data Tidak Berhasil Diperbarui')</script>";
      }
    }
?>

<?php
    include_once("../inc/admin_sidebar.php");
    include_once("../inc/header.php");
?>



  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <?php
    $sql = "SELECT * FROM tb_category WHERE id='$queryId'";
    $stmt = $pdo->query($sql);
    while ($row = $stmt->fetch()) {
        $data_nama = $row["nm_category"];
    }
    ?>
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <div class="container-fluid">
            <div class="row mb-6">
            </div>
          <!-- /.container-fluid -->
        </section>

        <!-- Main content -->

        <div class="col-md-6 mx-auto">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Tambah Kategori</h3>
            </div>
            <!-- /.card-header -->
          <form method="POST" action="">
            <div class="card-body">
              <div class="form-group">
                <label for="katInput">Nama Kategori</label>
                <input type="text" class="form-controll" id="katInput" name="kategori" value="<?= $data_nama ?>">
                <!-- <input style="width: 100%;" type="text" name="form=control input-bg"> -->
              </div>
            </div>
            <!-- /.card-body -->
            <div>
              <div class="card-footer">
                <button type="submit" name="update" class="btn btn-primary">Perbarui</button>
                <a href="index.php" class="btn btn-info">Kembali</a>
              </div>
            </div>
          </form>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>


<?php
    include_once("../inc/footer.php");
?>