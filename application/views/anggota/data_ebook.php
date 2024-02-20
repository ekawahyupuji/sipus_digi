<main id="main" class="main">

    <div class="pagetitle">
        <h1>Data E-Book</h1>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">

            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <!---<button type="submit" class="btn btn-primary rounded-pill btn-sm mt-3" data-bs-toggle="modal" data-bs-target="#largeModal"><i class="bi bi-plus-circle"></i> Tambah E-Book</button>-->

                        <div class="mt-3">
                            <?= $this->session->flashdata('massage'); ?>
                        </div>

                        <form action="" method="post" accept-charset="utf-8" enctype="multipart/form-data">
                            <table class="table table-hover table-bordered table-sm mt-5">
                                <thead>
                                    <tr>
                                        <th scope="col" class="text-center">#</th>
                                        <th scope="col" class="text-center">Kategori</th>
                                        <th scope="col" class="text-center">Judul</th>
                                        <th scope="col" class="text-center">Pengarang</th>
                                        <th scope="col" class="text-center">Tahun Terbit</th>
                                        <th scope="col" class="text-center">Penerbit</th>
                                        <th scope="col" class="text-center">File</th>
                                        <th scope="col" class="text-center">Tanggal Input</th>
                                        <th scope="col" class="text-center">Aksi</th>
                                    </tr>
                                </thead>
                                <?php
                                $no = 1;
                                foreach ($data_ebook as $e) {
                                    ?>
                                    <tbody>
                                        <tr>
                                            <td><?= $no++; ?></td>
                                            <td><?= $e->nama_kategori; ?></td>
                                            <td><?= $e->judul_ebook; ?></td>
                                            <td><?= $e->pengarang; ?></td>
                                            <td><?= $e->thn_terbit; ?></td>
                                            <td><?= $e->penerbit; ?></td>
                                            <td><?= $e->file; ?></td>
                                            <td><?= $e->tgl_input; ?></td>
                                            <td class="text-center">
                                                <a class="btn btn-sm btn-warning" href="<?= base_url() . 'anggota/detail/' . $e->id_ebook; ?>">
                                                    <i class="bi bi-eye-fill"></i></a>
                                                <!--<a class="btn btn-sm btn-success" href="">
                                                    <i class="bi bi-download"></i></a>-->
                                                    <!--<a class="btn btn-sm btn-primary" href="<?= base_url() . 'admin/ebook_edit/' . $e->id_ebook; ?>">
                                                        <i class="bi bi-pencil-square"></i></a>-->
                                                        <!--<a class="btn btn-sm btn-danger" href="<?php echo base_url() . 'admin/hapus_ebook/' . $e->id_ebook; ?>">
                                                            <i class="bi bi-trash-fill"></i></a>-->
                                                        </td>
                                                    </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal fade" id="largeModal">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Tambah E-Book</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="<?php echo base_url() . 'admin/act_tambahebook' ?>" method="post" enctype="multipart/form-data">

                                        <div class="row g-2">
                                            <div class="col-12">
                                                <label class="form-label">Kategori</label>
                                                <select class="form-select" name="id_kategori">
                                                    <option selected>--Pilih Kategori--</option>
                                                    <?php foreach ($data_kategori as $k) { ?>
                                                        <option value="<?= $k->id_kategori; ?>" required><?= $k->nama_kategori; ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>

                                            <div class="col-12">
                                                <label class="form-label">Judul</label>
                                                <input type="text" class="form-control" name="judul_ebook" required>
                                                <?= form_error('judul_ebook', '<small class="text-danger pl-3">', '</small>'); ?>
                                            </div>

                                            <div class="col-12">
                                                <label class="form-label">Pengarang</label>
                                                <input type="text" class="form-control" name="pengarang" required>
                                                <?= form_error('pengarang', '<small class="text-danger pl-3">', '</small>'); ?>
                                            </div>

                                            <div class="col-12">
                                                <label class="form-label">Tahun Terbit</label>
                                                <input type="text" class="form-control" name="thn_terbit" required>
                                                <?= form_error('thn_terbit', '<small class="text-danger pl-3">', '</small>'); ?>
                                            </div>
                                            <div class="col-12">
                                                <label class="form-label">Penerbit</label>
                                                <input type="text" class="form-control" name="penerbit" required>
                                                <?= form_error('penerbit', '<small class="text-danger pl-3">', '</small>'); ?>
                                            </div>

                                            <div class="col-12">
                                                <label class="form-label">Upload File</label>
                                                <input class="form-control" type="file" name="file" required>
                                                <?= form_error('file', '<small class="text-danger pl-3">', '</small>'); ?>
                                            </div>

                                <!--<div class="col-12">
                                    <label for="inputText" class="form-label">Tanggal Input</label>
                                    <input type="date" class="form-control" name="tgl_input">
                                </div>-->
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                </div>
                            </div>


                        </form>
                    </div>
                </div>
            </div>
        </div><!-- End Large Modal Tambah Data-->

    </section>
</main><!-- End #main -->