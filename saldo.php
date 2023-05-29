<?php
session_start();
$id = $_SESSION['id'];
include 'server/connection.php';
$q = "SELECT * FROM akun WHERE id = $id";
$result = mysqli_query($conn, $q);
$row = mysqli_fetch_assoc($result);
include('layouts/header.php');
?>
<section class="profil mt-5 mb-2">
    <div class="container mt-2">
        <div class="d-flex row justify-content-evenly bg-30 p-4 rounded-3 shadow-lg">
            
            <div class="content col-md-4 mt-2 mb-3">
                <img class="d-absolute m-20 ms-5" src="images/money.png" alt="<?= $row['name'] ?>.jpg" style="width: 250px;">
            </div>
            <div class="content col-md-4 bg-60 p-5 rounded-4">
                <h3>Hello, <span class="c-10"><?php $nama = explode(" ", $row['name']);
                                            echo $nama[0]; ?></h3></span>
                <h5>Balance:</h5>
                <span class="c-10">
                    <h2><?= number_format($row['saldo'])  ?> IDR</h3>
                </span>
                <a class="btn btn-sm btn-primary bg-success border-0 py-2 px-2 mb-0 mt-5" role="button" data-bs-toggle="modal" data-bs-target="#tambahSaldo">
                    <h6>Top Up</h6>
                </a>
                <?php
                if (isset($_GET["changePW"]) && $_GET["changePW"] == true) {
                ?>
                    <div id="alert" class="alert alert-success alert-dismissible fade show" role="alert">
                        Password berhasil diupdate!
                        <a href="profil.php" class="btn-close"></a>
                    </div>
                <?php } else if (isset($_GET["changePW"]) && $_GET["changePW"] == false) { ?>
                    <div id="alert" class="alert alert-danger alert-dismissible fade show" role="alert">
                        Gagal update Password!
                        <a href="index.php" class="btn-close"></a>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>

    <div class="modal fade" id="tambahSaldo" tabindex="-1" aria-labelledby="tambahSaldoLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content info-skill">
                <div class="modal-header">
                    <h5 class="modal-title" id="tambahSaldoLabel">Top Up Saldo</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div>
                        <form method="POST" action="controller/topUp.php?id=<?= $id ?>">
                            <p>Pilih nominal Top Up:</p>
                            <select class="form-control my-3" name="nominal">
                                <option value="0">RP. 0</option>
                                <option value="50000">RP. 50,000</option>
                                <option value="100000">RP. 100,000</option>
                                <option value="200000">RP. 200,000</option>
                                <option value="500000">RP. 500,000</option>
                            </select>
                            <input type="submit" class="btn btn-primary btn-success mt-3" value="Top UP">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- <section>
    <div class="mt-4 p-3 container d-flex justify-content-center align-items-center vh-90 bg-dark">

        <div class="card shadow-lg">
            <div class="row g-1">
                <div class="col-md-5">
                    <div>
                        <div class="button-topup">
                            <a class="btn btn-sm btn-primary bg-success border-0  " role="button" data-bs-toggle="modal" data-bs-target="#tambahSaldo">
                                <h6>Top Up</h6>
                            </a>
                        </div>
                        <div class="modal fade" id="tambahSaldo" tabindex="-1" aria-labelledby="tambahSaldoLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content info-skill">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="tambahSaldoLabel">Top Up Saldo</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div>
                                            <form method="POST" action="controller/topUp.php?id=<?= $id ?>">
                                                <p>Choose Top Up:</p>
                                                <select class="form-control my-3" name="nominal">
                                                    <option value="0">RP. 0</option>
                                                    <option value="50000"> 50,000 IDR</option>
                                                    <option value="100000"> 100,000 IDR</option>
                                                    <option value="200000"> 200,000 IDR</option>
                                                    <option value="500000"> 500,000 IDR</option>
                                                </select>
                                                <input type="submit" class="btn btn-primary btn-success mt-3" value="Top UP">
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-7">
                    <div>

                        <div class="text-center overlaytextsaldo">
                            <div class="container">
                                <div class="card bg-dark">

                                </div>
                            </div>
                            <h3>Hello, <span class="c-60"><?php $nama = explode(" ", $row['name']);
                                                            echo $nama[0]; ?></h3></span>
                            <h5> Your Balance:</h5>
                            <span class="c-60">
                                <h2> <?= number_format($row['saldo']) ?> IDR</h2>
                            </span>
                        </div>
                        <img src="images/blurry-gradient-haikei.png" class="object-fit-cover" height="600px" width="100%" alt="">
                    </div>
                </div>
            </div>
        </div>

    </div>
</section> -->

<?php
include('layouts/footer.php');
?>