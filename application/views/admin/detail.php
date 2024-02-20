<main id="main" class="main">

    <div class="pagetitle">
        <h1>Detail E-Book</h1>
    </div><!-- End Page Title -->
    <section class="section">
        <div class="row">
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-body mt-3">
                        <table class="table table-striped table-bordered table-responsive table-sm">
                            <tr>
                                <td>Judul E-Book</td>
                                <td>: <?= $data_ebook->judul_ebook; ?></td>
                            </tr>

                            <tr>
                                <td>Pengarang</td>
                                <td>: <?= $data_ebook->pengarang; ?></td>
                            </tr>

                            <tr>
                                <td>Tahun Terbit</td>
                                <td>: <?= $data_ebook->thn_terbit; ?></td>
                            </tr>

                            <tr>
                                <td>Penerbit</td>
                                <td>: <?= $data_ebook->penerbit; ?></td>
                            </tr>

                            <tr>
                                <td>File</td>
                                <td>: <?= $data_ebook->file; ?></td>
                            </tr>

                            <tr>
                                <td>Tanggal Input</td>
                                <td>: <?= $data_ebook->tgl_input; ?></td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card" style="height: 150%;">
                    <div class="card-body mt-3 text-center">
                        <div style="--aspect-ratio: 16/9;">
                            <iframe src="<?= base_url() ?>./template/dokumen/<?php echo $data_ebook->file; ?>" type="application/text" width="800" height="170%"></iframe>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>

</main><!-- End #main -->