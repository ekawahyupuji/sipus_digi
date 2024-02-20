<main id="main" class="main">

  <div class="pagetitle">
    <h1>Data Kategori</h1>

  </div><!-- End Page Title -->

  <section class="section">
    <div class="row">
      <div class="col-lg-4">
        <!-- Card with titles, buttons, and links -->
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Tambah Data</h5>

            <form class="row g-3 needs-validation" action="<?= base_url();?>admin/act_tambahkategori " method="post" novalidate>
              <div class="col-12">
                <label class="form-label">Nama Kategori</label>
                <input type="text" class="form-control" name="nama_kategori" required>
                <?= form_error('kategori', '<small class="text-danger pl-3">', '</small>');?>
              </div>

              <div class="col-12">
                <button type="submit" class="btn btn-primary rounded-pill">Simpan</button>
              </div>
            </form>
          </div>

        </div><!-- End Card with titles, buttons, and links -->
      </div>

      <div class="col-lg-8">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Kategori</h5>
            <?= $this->session->flashdata('massage');?> 
            <!-- Table with hoverable rows -->
            <table class="table table-hover">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Nama Kategori</th>
                  <th scope="col">Opsi</th>
                </tr>
              </thead>
              <?php
              $no = 1;
              foreach ($data_kategori as $k){ 
                ?>
                <tbody>
                  <tr>                                         
                    <th scope="row"><?= $no++; ?></th>
                    <td><?= $k->nama_kategori; ?></td>
                    <td>
                      <a href="" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#edit<?= $k->id_kategori;?>">
                        <i class=" bi bi-pencil-square"></i>
                      </a>
                      <a href="<?= base_url().'admin/hapus_kategori/'. $k->id_kategori;?>" class="btn btn-danger btn-sm">
                        <i class="bi bi-trash"></i>
                      </a>
                    </td>
                  </tr>
                </tbody>
              <?php } ?>
            </table>
            <!-- End Table with hoverable rows -->
            <?php
            $no = 0;
            foreach ($data_kategori as $k) : $no++;?>
            </div>
          </div>
          <div class="modal fade" id="edit<?= $k->id_kategori; ?>">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title">Edit Kategori</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <?php echo form_open_multipart('admin/edit_kategori');?>
                  <label class="form-label">Nama Kategori</label>
                  <input type="hidden" name="id_kategori" value="<?php echo $k->id_kategori; ?>">   
                  <input type="text" class="form-control" name="nama_kategori" value="<?php echo $k->nama_kategori; ?>" required>
                  <?= form_error('nama_kategori', '<small class= "text-danger pl-3">', '</small>') ;?>                
                </div>
                <div class="modal-footer">
                  <button type="submit" class="btn btn-primary">Update</button>
                </div>
                <?php echo form_close();?>
              </div>
            </div>
          </div><!-- End Basic Modal-->
        <?php endforeach;?>
      </section>
    </main>                                          