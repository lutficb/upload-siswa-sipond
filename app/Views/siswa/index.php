<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $title; ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
</head>

<body>
    <div class="container p-5">
        <div class="row">
            <div class="col-md-12 text-center">
                <h1>Upload File Siswa Baru</h1>
            </div>
        </div>
        <div class="row justify-content-center mt-3">
            <div class="col-xxl-6 col-md-4">

                <?php if (session()->getFlashdata('success')) : ?>
                    <div class="alert alert-success alert-dismissible show fade">
                        <div class="alert-body">
                            <button class="close" data-dismiss="alert">
                                <span>&times;</span>
                            </button>
                            <?= session()->getFlashdata('success'); ?>
                        </div>
                    </div>
                <?php endif; ?>

                <?php if (session()->getFlashdata('error')) : ?>
                    <div class="alert alert-danger alert-dismissible show fade">
                        <div class="alert-body">
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            <?= session()->getFlashdata('error'); ?>
                        </div>
                    </div>
                <?php endif; ?>

                <div class="card">
                    <img src="<?= base_url(); ?>/assets/img/default_filetype_file_empty_document_icon_187718.png" class="card-img-top img-thumbnail" alt="...">
                    <div class="card-body">
                        <h5 class="card-title mb-3">File *.xls, *.xlxs, *.ods</h5>
                        <form action="<?= base_url('upload'); ?>" method="post" enctype="multipart/form-data">
                            <?= csrf_field(); ?>
                            <input type="hidden" name="_method" value="POST">
                            <div class="mb-3 input-group">
                                <input class="form-control" type="file" id="formFile" name="file" placeholder="Pilih file" required>
                            </div>
                            <div class="row justify-align-content-end">
                                <div class="col-md-4 text-right">
                                    <button type="submit" class="btn btn-sm btn-primary btn-block"><i class="fa-solid fa-upload"></i>
                                        Upload
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>
</body>

</html>