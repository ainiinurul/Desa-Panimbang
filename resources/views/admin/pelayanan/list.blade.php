<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
    <?php if($this->session->flashdata('success')): ?>
        <div class="alert alert-success"><?= $this->session->flashdata('success'); ?></div>
    <?php endif; ?>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Daftar Pendaftar Pelayanan Online</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Tgl Daftar</th>
                            <th>No Antrian</th>
                            <th>Nama Pendaftar</th>
                            <th>Jenis Pelayanan</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; foreach($pelayanan_list as $p): ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= date('d-m-Y', strtotime($p->tanggal_pendaftaran)); ?></td>
                            <td><?= $p->nomor_antrian; ?></td>
                            <td><?= htmlspecialchars($p->nama_lengkap); ?></td>
                            <td><?= htmlspecialchars($p->jenis_pelayanan); ?></td>
                            <td>
                                <?php if($p->status == 'Menunggu'): ?>
                                    <span class="badge badge-warning">Menunggu</span>
                                <?php elseif($p->status == 'Diproses'): ?>
                                    <span class="badge badge-info">Diproses</span>
                                <?php elseif($p->status == 'Selesai'): ?>
                                    <span class="badge badge-success">Selesai</span>
                                <?php else: ?>
                                    <span class="badge badge-danger">Ditolak</span>
                                <?php endif; ?>
                            </td>
                            <td>
                                <a href="<?= base_url('admin/pelayanan/detail/' . $p->id_pelayanan); ?>" class="btn btn-sm btn-primary">Detail</a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>