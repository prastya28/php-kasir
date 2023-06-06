<?php include "header.php" ?>

<div class="page-body">
    <div class="container-xl">

        <form action="" method="post">
            <div class="card">
                <div class="card-body">
                    <div class="row row-cards">
                        <div class="col-md-4">
                            <label class="form-label">Dari</label>
                            <input type="date" class="form-control" name="tglm">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Sampai</label>
                            <input type="date" class="form-control" name="tgls">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">&nbsp;</label>
                            <button class="btn btn-primary" name="filter">Filter</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>


    </div>
</div>

<?php include "footer.php" ?>