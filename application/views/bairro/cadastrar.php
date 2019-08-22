<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Cadastrar Torcedor</title>
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
                    <h4 class="page-title">Cadastrar Bairro</h4>
                </div>
            </div>
        </div>
        

        <div class="row">
        
            <div class="col-lg-12">
				
                <div class="card-box">
					<form action="<?= base_url() ?>index.php/CidadesEBairros/cadastrarBairro/" method="post">
                        <div class="form-row">
                            <div class="form-group col-md-5">
                                <label>Cidade<span class="text-danger">*</span></label>
                                <select id="id_cidade" name="id_cidade" class="form-control select2">
                                    <option>Selecione</option>
                                    <?php foreach ($cidades as $cidade):
                                    echo "<option class='option_cidade' value='$cidade->ID'> $cidade->CIDADE </option>";
                                    endforeach;?>
                                </select>
                            </div>
                            
                            <div class="form-group col-md-7">
                                <label>Bairro<span class="text-danger">*</span></label>
                                <input type="text" name="bairro" parsley-trigger="change" required placeholder="Bairro" class="form-control">
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
<script type="text/javascript">
    $(document).ready(function () {
        $('#id_cidade').change(function () {
            var valorCidade = $(this).val();
            var url = "<?= base_url() ?>index.php/cidadesebairros/gerarJsonCidadesEBairros/" + valorCidade;
            
            $.ajax({
            	
                url: url,
                type: "GET",
                dataType: 'json',
                success: function (data) {
                    var options = '<option>Escolha o Bairro</option>';

                    for (var i = 0; i < data.length; i++) {
                        options += '<option value="' + data[i].id + '">' + data[i].nome_sub_categoria + '</option>';
                    }
                    $('#id_bairro').html(options).show();
                }
            ,
            });
        });

        
        $('#documento').change(function () {
            var valorDocumento = $(this).val();
            var url = "<?= base_url() ?>index.php/torcedores/gerarJsonConsultaDocumento/" + valorDocumento;

            var valorDocumentoInput = valorDocumento.replace(/[\(\)\.\s-]+/g,'');


 			$.ajax({
            	
                url: url,
                type: "GET",
                dataType: 'json',
                success: function (data) {

                	var dados = data.documento;

                    var valorDocumentoBanco = dados.replace(/[\(\)\.\s-]+/g,'');


                    if(valorDocumentoInput == valorDocumentoBanco){
                        console.log('Já tá no banco');
                        
                    }
            	
            	 }
            ,
            });
        });
        
    });


    
</script>

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