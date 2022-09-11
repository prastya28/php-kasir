<?php include 'header.php' ?>
<?php
// Dapatkan ID toko dari user yg login
$id_toko = $_SESSION['user']['id_toko'];

// Dapatkan produk dari id toko ini
$produk = array();

$produk = array();
$ambil = $koneksi->query("SELECT * FROM produk WHERE id_toko='$id_toko'");
while ($tiap = $ambil->fetch_assoc()) {
    $produk[] = $tiap;
}

// echo '<pre>';
// print_r($produk);
// echo '</pre>';

// echo '<pre>';
// print_r($_SESSION['keranjang']);
// echo '</pre>';


?>
<div class="container">
    <div class="row">
        <div class="col-md-9">
            <div class="card border-0 shadow">
                <div class="card-body">
                    <div class="row">
                        <?php foreach ($produk as $key => $value) : ?>
                            <div class="col-md-3">
                                <a href="" class="text-decoration-none link-produk" idnya="<?= $value['id_produk']; ?>">
                                    <img src="../assets/img/produk/<?= $value['foto_produk']; ?>" alt="" class="img-fluid">
                                    <h6><?= $value['nama_produk']; ?></h6>
                                    <span class="small text-muted">Rp. <?= number_format($value['jual_produk']); ?></span>
                                </a>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card border-0 shadow">
                <div class="card-body keranjang">

                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $.ajax({
            url: 'tampilkeranjang.php',
            success: function(hasil) {
                $(".keranjang").html(hasil)
            }
        })
    })
</script>

<script>
    $(document).ready(function() {
        $(".link-produk").on("click", function() {
            // dapatkan idnya
            var id_produk = $(this).attr("idnya");
            $.ajax({
                type: 'post',
                url: 'masukkankeranjang.php',
                data: 'id_produk=' + id_produk,
                success: function(hasil) {
                    $.ajax({
                        url: 'tampilkeranjang.php',
                        success: function(hasil) {
                            $(".keranjang").html(hasil)
                        }
                    })
                }
            })
        })
    })
</script>

<script>
    $(document).ready(function() {
        $(document).on("click", ".tambahi", function() {
            var id_produk = $(this).attr("idnya");
            $.ajax({
                type: 'post',
                url: 'tambahkeranjang.php',
                data: 'id_produk=' + id_produk,
                success: function(hasil) {
                    $.ajax({
                        url: 'tampilkeranjang.php',
                        success: function(hasil) {
                            $(".keranjang").html(hasil)
                        }
                    })
                }
            })
        })
    })
</script>

<script>
    $(document).ready(function() {
        $(document).on("click", ".kurangi", function() {
            var id_produk = $(this).attr("idnya");
            $.ajax({
                type: 'post',
                url: 'kurangkeranjang.php',
                data: 'id_produk=' + id_produk,
                success: function(hasil) {
                    $.ajax({
                        url: 'tampilkeranjang.php',
                        success: function(hasil) {
                            $(".keranjang").html(hasil)
                        }
                    })
                }
            })
        })
    })
</script>

<script>
    $(document).ready(function() {
        $(document).on("keyup", ".bayar", function() {
            // Dapatkan inpur bayar
            var bayar = $(this).val();

            // Dapatkan inputan total
            var total = $(".total").val();

            var kembalian = parseInt(bayar) - parseInt(total);

            $(".kembalian").val(kembalian);
        })
    })
</script>
<?php include 'footer.php' ?>