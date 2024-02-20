<main id="main" class="main">

    <div class="pagetitle">
        <h1>Ubah Data E-Book</h1>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-6">

                <div class="card">
                    <div class="card-body">

                        <?php
                        $no = 0;
                        foreach ($data_ebook as $e) : $no++
                            ?>
                            <!-- General Form Elements -->
                            <form class="mt-5" action="<?php echo base_url() . 'admin/ubah_ebook/' . $e->id_ebook; ?>" method="post" enctype="multipart/form-data">
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label">Kategori</label>
                                    <input type="hidden" value="<?php echo $e->id_ebook; ?>" name="id_ebook">
                                    <div class="col-sm-10">
                                        <select class="form-select" name="id_kategori">
                                            <option selected>--Pilih Kategori--</option>
                                            <?php foreach ($data_kategori as $k) { ?>
                                                <option value="<?= $k->id_kategori; ?>" <?php if ($k->id_kategori == $e->id_kategori) {
                                                    echo "selected";
                                                } ?>><?= $k->nama_kategori; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label">Judul E-Book</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="judul_ebook" value="<?php echo $e->judul_ebook; ?>">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label">Pengarang</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="pengarang" value="<?php echo $e->pengarang; ?>">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label">Tahun Terbit</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="thn_terbit" value="<?php echo $e->thn_terbit; ?>">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label">Penerbit</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="penerbit" value="<?php echo $e->penerbit; ?>">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label">Upload File</label>
                                    <div class="col-sm-10">

                                        <input class="form-control" type="file" id="formFile" name="file">

                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-sm-10">
                                        <button type="submit" class="btn btn-primary">Update</button>
                                    </div>
                                </div>

                            </form><!-- End General Form Elements -->
                        <?php endforeach ?>

                    </div>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="card" style="height: 160%;">
                    <div class="card-body mt-3 text-center">
                        <div style="--aspect-ratio: 16/9;">
                            <iframe src="<?= base_url() ?>./template/dokumen/<?php echo $e->file; ?>" type="application/text" width="800" height="170%"></iframe>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
</main>