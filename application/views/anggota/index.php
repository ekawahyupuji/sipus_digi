<main id="main" class="main">

	<div class="pagetitle">
		<h1>Dashboard</h1>
	</div><!-- End Page Title -->

	<section class="section dashboard">
		<div class="row">

			<!-- Left side columns -->
			<div class="col-lg-12">
				<div class="row">

					<!-- Sales Card -->
					<div class="col-xxl-4 col-md-6">
						<div class="card info-card sales-card">

							<div class="card-body">
								<h5 class="card-title">Anggota</h5>

								<div class="d-flex align-items-center">
									<div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
										<i class="bi bi-person"></i>
									</div>
									<div class="ps-3">
										<h6><?php echo $this->m_sipus->edit_data(array('role_id' => 2), 'user')->num_rows(); ?></h6>
										<span class="text-muted small pt-2 ps-1">Anggota Terdaftar</span>

									</div>
								</div>
							</div>

						</div>
					</div><!-- End Sales Card -->

					<!-- Revenue Card -->
					<div class="col-xxl-4 col-md-6">
						<div class="card info-card revenue-card">

							<div class="card-body">
								<h5 class="card-title">Kategori</h5>

								<div class="d-flex align-items-center">
									<div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
										<i class="bi bi-tags"></i>
									</div>
									<div class="ps-3">
										<h6><?= $this->m_sipus->get_data('data_kategori')->num_rows(); ?></h6>
										<span class="text-muted small pt-2 ps-1">Kategori Terupdate</span>

									</div>
								</div>
							</div>

						</div>
					</div><!-- End Revenue Card -->

					<!-- Customers Card -->
					<div class="col-xxl-4 col-xl-12">

						<div class="card info-card customers-card">

							<div class="card-body">
								<h5 class="card-title">E-Book</h5>

								<div class="d-flex align-items-center">
									<div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
										<i class="bi bi-book"></i>
									</div>
									<div class="ps-3">
										<h6><?= $this->m_sipus->get_data('data_ebook')->num_rows(); ?></h6>
										<span class="text-muted small pt-2 ps-1">Data E-Book</span>

									</div>
								</div>

							</div>
						</div>

					</div><!-- End Customers Card -->
				</section>

			</main><!-- End #main -->
