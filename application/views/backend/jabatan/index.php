<?php
/**
 * Created by PhpStorm.
 * User: Yusuf Abdillah Putra
 * Date: 12/12/2018
 * Time: 22:16
 */
?>
<!-- END: Left Aside -->
<div class="m-grid__item m-grid__item--fluid m-wrapper">
    <!-- BEGIN: Subheader -->
    <div class="m-subheader ">
        <div class="d-flex align-items-center">
            <div class="mr-auto">
                <h3 class="m-subheader__title">
                    Jabatan
                </h3>
            </div>
			<?php $this->load->view('tmp_backend/breadcrumb'); ?>
        </div>
    </div>
    <!-- END: Subheader -->
    <div class="m-content">
        <div class="m-portlet m-portlet--mobile">
            <div class="m-portlet__head">
                <div class="m-portlet__head-caption">
                    <div class="m-portlet__head-title">
                        <h3 class="m-portlet__head-text">
                            <i class="la la-list-ol"></i> Tabel Data Jabatan
                        </h3>
                    </div>
                </div>
				<div class="m-portlet__head-tools">
					<ul class="m-portlet__nav">
						<li class="m-portlet__nav-item">
							<div class="m-dropdown m-dropdown--inline m-dropdown--arrow m-dropdown--align-right"
								 data-dropdown-persistent="true" data-dropdown-toggle="click">
								<a href="#" class="m-dropdown__toggle btn m-btn--pill btn-primary dropdown-toggle">
									<i class="la la-search"></i>
								</a>
								<div class="m-dropdown__wrapper">
									<span class="m-dropdown__arrow m-dropdown__arrow--right"></span>
									<div class="m-dropdown__inner">
										<div class="m-dropdown__body">
											<div class="m-dropdown__content">
												<input autofocus type="text" class="form-control m-input"
													   placeholder="Pencarian..." id="generalSearch">
											</div>
										</div>
									</div>
								</div>
							</div>
						</li>
						<li class="m-portlet__nav-item">
							<a href="<?= site_url('b_jabatan/form'); ?>" class="btn m-btn--pill btn-accent"
							   data-container="body"
							   data-toggle="m-popover"
							   data-placement="left"
							   data-skin="dark"
							   data-html="true"
							   data-content="<i class='la la-info-circle'></i> Tambah Jabatan"
							>
								<i class="la la-plus"></i>
							</a>
						</li>
					</ul>
				</div>
            </div>
            <div class="m-portlet__body">
				<div class="m_datatable" id="server_data"></div>
            </div>
        </div>
    </div>
</div>
<?php
$this->load->view('backend/jabatan/modalDelete');
$this->load->view('backend/jabatan/JSDatatable');
$this->load->view('backend/jabatan/JSNotify');
$this->load->view('backend/jabatan/JS');


