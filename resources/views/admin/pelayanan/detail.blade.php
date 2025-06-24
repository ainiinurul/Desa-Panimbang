<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
    
    <div class="row">
        <div class="col-lg-7">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Detail Pendaftar</h6>
                </div>
                <div class="card-body">
                    <table class="table table-striped">
                        <tr>
                            <th>Tanggal Daftar</th>
                            <td>: <?= date('d F Y', strtotime($pelayanan->tanggal_pendaftaran)); ?></td>
                        </tr>
                        <tr>
                            <th>Nomor Antrian</th>
                            <td>: <span class="badge badge-lg badge-dark"><?= $pelayanan->nomor_antrian; ?></span></td>
                        </tr>
                        <tr>
                            <th>Nama Lengkap</th>
                            <td>: <?= htmlspecialchars($pelayanan->nama_lengkap); ?></td>
                        </tr>
                        <tr>
                            <th>NIK</th>
                            <td>: <?= htmlspecialchars($pelayanan->nik); ?></td>
                        </tr>
                         <tr>
                            <th>No. KK</th>
                            <td>: <?= htmlspecialchars($pelayanan->no_kk); ?></td>
                        </tr>
                        <tr>
                            <th>Jenis Pelayanan</th>
                            <td>: <?= htmlspecialchars($pelayanan->jenis_pelayanan); ?></td>
                        </tr>
                         <tr>
                            <th>Keperluan</th>
                            <td>: <?= nl2br(htmlspecialchars($pelayanan->keperluan)); ?></td>
                        </tr>
                        <tr>
                            <th>Status Saat Ini</th>
                            <td>: <b><?= htmlspecialchars($pelayanan->status); ?></b></td>
                        </tr>
                        <tr>
                            <th>Keterangan Admin</th>
                            <td>: <?= nl2br(htmlspecialchars($pelayanan->keterangan_admin)); ?></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-lg-5">
             <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Update Status Pelayanan</h6>
                </div>
                <div class="card-body">
                     <?php if($this->session->flashdata('success')): ?>
                        <div class="alert alert-success"><?= $this->session->flashdata('success'); ?></div>
                    <?php endif; ?>
                     <?php if($this->session->flashdata('error')): ?>
                        <div class="alert alert-danger"><?= $this->session->flashdata('error'); ?></div>
                    <?php endif; ?>

                    <form action="<?= base_url('admin/pelayanan/update_status'); ?>" method="POST">
                        <input type="hidden" name="id_pelayanan" value="<?= $pelayanan->id_pelayanan; ?>">
                        <div class="form-group">
                            <label for="status">Ubah Status</label>
                            <select name="status" id="status" class="form-control">
                                <option value="Menunggu" <?= $pelayanan->status == 'Menunggu' ? 'selected' : ''; ?>>Menunggu</option>
                                <option value="Diproses" <?= $pelayanan->status == 'Diproses' ? 'selected' : ''; ?>>Diproses</option>
                                <option value="Selesai" <?= $pelayanan->status == 'Selesai' ? 'selected' : ''; ?>>Selesai</option>
                                <option value="Ditolak" <?= $pelayanan->status == 'Ditolak' ? 'selected' : ''; ?>>Ditolak</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="keterangan_admin">Keterangan (Opsional)</label>
                            <textarea name="keterangan_admin" id="keterangan_admin" rows="4" class="form-control"><?= $pelayanan->keterangan_admin; ?></textarea>
                        </div>
                        <button type="submit" class="btn btn-success">Update Status</button>
                        <a href="<?= base_url('admin/pelayanan'); ?>" class="btn btn-secondary">Kembali ke Daftar</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>