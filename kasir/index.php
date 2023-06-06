<?php include 'header.php' ?>

<div class="page-body">
    <div class="container-xl">
        <div class="row row-cards">
            <div class="col-9">

                <div class="card mb-3">
                    <div class="card-body">
                        <form method="post">
                            <div class="input-group">
                                <input type="text" name="cari" class="form-control input-cari" placeholder="Cari...">
                                <button class="btn btn-primary btn-cari">Cari</button>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="list-produk"></div>
            </div>
            <div class="col-3">
                <div class="card">
                    <div class="card-header">
                        <h3>
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-shopping-cart" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <circle cx="6" cy="19" r="2"></circle>
                                <circle cx="17" cy="19" r="2"></circle>
                                <path d="M17 17h-11v-14h-2"></path>
                                <path d="M6 5l14 1l-1 7h-13"></path>
                            </svg> Keranjang
                        </h3>
                    </div>
                    <div class="card-body keranjang">

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>

<script>
    $(document).ready(function() {
        $.ajax({
            url: 'listproduk.php',
            success: function(hasil) {
                $(".list-produk").html(hasil);
            }
        })
    })
</script>

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
        $(document).on("click", ".btn-cari", function(e) {
            e.preventDefault();
            var cari = $(".input-cari").val();
            $.ajax({
                type: 'post',
                url: 'cariproduk.php',
                data: 'cari=' + cari,
                success: function(hasil) {
                    $(".list-produk").html(hasil);
                }
            })
        })
    })
</script>

<script>
    $(document).ready(function() {
        $(document).on("click", ".link-produk", function() {
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