<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Cadastrar Cidade</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
    <meta content="Coderthemes" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <!-- App favicon -->
    <link rel="shortcut icon" href="assets/images/favicon.ico">

    <!-- App css -->
    <link href="<?= base_url('') ?>assets/css/bootstrap-select.min.css" rel="stylesheet" />
    <link href="<?= base_url('') ?>assets/css/select2.min.css" rel="stylesheet" type="text/css" />
    <link href="<?= base_url('') ?>assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="<?= base_url('') ?>assets/css/icons.css" rel="stylesheet" type="text/css" />
    <link href="<?= base_url('') ?>assets/css/style.css" rel="stylesheet" type="text/css" />
    <script src="<?= base_url('') ?>assets/js/modernizr.min.js"></script>

</head>

<body>
<?php $this->load->view('elementosHtml/cabecalho') ?>
<div class="wrapper">
    <div class="container-fluid">
    
        <!-- Page-Title -->
        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box">
                    <h4 class="page-title">Cadastrar Cidade</h4>
                </div>
            </div>
        </div>
        <!-- end page title end breadcrumb -->

        <div class="row">
        
            <div class="col-lg-12">
				
                <div class="card-box">
					<form action="<?= base_url() ?>index.php/CidadesEBairros/cadastrarCidade" method="post">
                        <div class="form-row">

                            <div class="form-group col-md-3">
                                <label>UF<span class="text-danger">*</span></label>
                                <select id="id_uf" name="id_uf" class="form-control select2">
                                    <option>Selecione</option>
                                    <?php foreach ($uf as $uf):
                                    echo "<option value='$uf->ID'> $uf->UF </option>";
                                    endforeach;?>
                                </select>
                            </div>
                            
                            
                            <div class="form-group col-md-9">
                                <label>Cidade<span class="text-danger">*</span></label>
                                <input type="text" name="cidade" parsley-trigger="change" required placeholder="Cidade" class="form-control">
                            </div>

                        </div>
                        <div class="form-group text-right m-b-0">
                            <button class="btn btn-custom waves-effect waves-light" type="submit">
                                Cadastrar
                            </button>
                        </div>

                    </form>
                </div> 
            </div>

        </div>

    </div> 
</div>



<!-- Footer -->
<?php $this->load->view('elementosHtml/rodape') ?>
<!-- End Footer -->


<!-- jQuery  -->
<script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="<?= base_url('') ?>assets/js/jquery.mask.min.js"></script>

<script src="<?= base_url('') ?>assets/js/popper.min.js"></script>
<script src="<?= base_url('') ?>assets/js/bootstrap.min.js"></script>
<script src="<?= base_url('') ?>assets/js/waves.js"></script>
<script src="<?= base_url('') ?>assets/js/jquery.slimscroll.js"></script>

<!-- Parsley js -->
<script type="text/javascript" src="<?= base_url('') ?>assets/js/parsley.min.js"></script>

<script src="<?= base_url('') ?>assets/js/select2.min.js" type="text/javascript"></script>
<script src="<?= base_url('') ?>assets/js/bootstrap-select.js" type="text/javascript"></script>

<!-- App js -->
<script src="<?= base_url('') ?>assets/js/jquery.core.js"></script>
<script src="<?= base_url('') ?>assets/js/jquery.app.js"></script>

<script type="text/javascript">
    $(document).ready(function() {
        $('form').parsley();
    });
</script>

<script src="<?= base_url('') ?>assets/js/jquery.form-advanced.init.js" type="text/javascript"></script>







</body>
</html>