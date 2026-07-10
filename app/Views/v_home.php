<?= $this->extend('layout') ?>
<?= $this->section('content') ?>
<?php
if (session()->getFlashData('success')) {
?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <?= session()->getFlashData('success') ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php
}

$diskon = session()->get('diskon') ?? 0;
?>
<div class="row">
    <?php foreach ($products as $key => $item) : ?>         
            <div class="col-lg-6">
                <?= form_open('keranjang') ?>
                <?php
                $harga_asli = $item['harga'];
                $harga_diskon = $harga_asli - $diskon;
                
                if ($harga_diskon < 0) {
                    $harga_diskon = 0; 
                }

                echo form_hidden('id', (string)$item['id']);
                echo form_hidden('nama', $item['nama']);
                echo form_hidden('harga', (string)($diskon > 0 ? $harga_diskon : $harga_asli)); 
                echo form_hidden('foto', $item['foto']);
                ?>
                <div class="card">
                    <div class="card-body">
                        <img src="<?= base_url() . "img/" . $item['foto'] ?>" alt="..." width="50%">
                        <h5 class="card-title">
                            <?= $item['nama'] ?><br>
                            
                            <?php if ($diskon > 0): ?>
                                <del class="text-danger"><?php echo number_to_currency($harga_asli, 'IDR') ?></del><br>
                                <?php echo number_to_currency($harga_diskon, 'IDR') ?>
                            <?php else: ?>
                                <?php echo number_to_currency($harga_asli, 'IDR') ?>
                            <?php endif; ?>
                            
                        </h5>
                        <button type="submit" class="btn btn-info rounded-pill">Beli</button>
                    </div>
                </div>
                <?= form_close() ?>
            </div> 
    <?php endforeach ?> 
</div>
<?= $this->endSection() ?>