<!DOCTYPE html>

<html>
    <head>
        <meta charset="utf-8" />
        <title>Home</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
        <meta content="Coderthemes" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />

        <!-- DataTables -->
        <link href="<?= base_url('') ?>assets/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css"/>
        <link href="<?= base_url('') ?>assets/css/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css"/>

        <!-- App css -->
        <link href="<?= base_url('') ?>assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="<?= base_url('') ?>assets/css/icons.css" rel="stylesheet" type="text/css" />
        <link href="<?= base_url('') ?>assets/css/style.css" rel="stylesheet" type="text/css" />

        <script src="<?= base_url('') ?>assets/js/modernizr.min.js"></script>

    </head>


    <body>
    <?php $this->load->view('elementosHtml/cabecalho') ?>
        <!-- Navigation Bar-->

        <div class="wrapper">
            <div class="container-fluid">

                <div class="row">
                    <div class="col-sm-12">
                        <div class="page-title-box">
                            <h4 class="page-title">Cadastro de Torcedores</h4>
                        </div>
                    </div>
                </div>

            <form class="mb-3" action="<?php echo base_url()?>index.php/importarXML/uploadXml" method="POST" enctype="multipart/form-data">
            	<h4 class="header-title">Anexar XML</h4>
                <div class="input-group">
                    <input type="file" class="form-control" name="importarXml">
                    <div class="input-group-append">
                        <button class="btn btn-dark waves-effect waves-light" type="submit">Salvar XML</button>
                    </div>
                </div>
            </form>   
                              
                
                <div class="row">
                    <div class="col-12">

                    
                        <div class="card-box">
                        
                        
                            <h4 class="header-title">Dashboard</h4>

                            <div class="text-center mt-4 mb-4">
                                <div class="row">
                                    <div class="col-xs-6 col-sm-4">
                                        <div class="card-box bg-primary widget-flat border-primary text-white">
                                            <i class="fi-archive"></i>
                                            <h3 class="m-b-10"><?php echo $torcedoresTotal?></h3>
                                            <p class="text-uppercase m-b-5 font-13 font-600">Total de Torcedores</p>
                                        </div>
                                    </div>
                                    <div class="col-xs-6 col-sm-4">
                                        <div class="card-box widget-flat border-success bg-success text-white">
                                            <i class="fi-help"></i>
                                            <h3 class="m-b-10"><?php echo $torcedoresAtivos?></h3>
                                            <p class="text-uppercase m-b-5 font-13 font-600">Torcedores Ativos</p>
                                        </div>
                                    </div>
                                    <div class="col-xs-6 col-sm-4">
                                        <div class="card-box bg-danger widget-flat border-danger text-white">
                                            <i class="fi-delete"></i>
                                            <h3 class="m-b-10"><?php echo $torcedoresInativos?></h3>
                                            <p class="text-uppercase m-b-5 font-13 font-600">Torcedores Inativos</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

							<a href="<?= base_url() ?>index.php/torcedores/cadastrarTorcedor">
                                <button type="button" class="btn btn-info waves-effect waves-light float-right"> <i class="fa fa-cloud m-r-5"></i> <span>Adicionar Torcedor</span> </button>
                            </a>
                            <table class="table table-hover m-0 tickets-list table-actions-bar dt-responsive nowrap" cellspacing="0" width="100%" id="datatable">
                                <thead>
                                <tr>
                                    <th>DOCUMENTO</th>
                                    <th>NOME</th>
                                    <th>UF</th>
                                    <th>CIDADE</th>
                                    <th>BAIRRO</th>
                                    <th>CEP</th>
                                    <th>STATUS</th>
                                    <th>TELEFONE</th>
                                    <th>EMAIL</th>
                                    <th class="hidden-sm">ACAO</th>
                                </tr>
                                </thead>

                                <tbody>
                                <?php foreach ($torcedores as $torcedor): 
                                    $id = $torcedor->ID;
                                    $uf = $torcedor->UF;
                                    $nome = $torcedor->NOME;
                                    $cidade = $torcedor->CIDADE;
                                    $bairro = $torcedor->BAIRRO;
                                    $ativo = $torcedor->ATIVO;
                                    $documento = $torcedor->DOCUMENTO;
                                    $telefone = $torcedor->TELEFONE;
                                    $email = $torcedor->EMAIL;
                                    $cep = $torcedor->CEP;

                                    $torcedorAtivo = 'badge-success';
                                    $torcedorInativo = 'badge-success';

                                
                                 ?>
                                  <tr>
                                    <td>
                                    	<b><?= $documento ?></b>
                                    </td>
                                    <td>
                                    	<?= $nome ?>
                                    </td>
                                    <td>
                                       <span class="ml-2"><?= $uf ?></span>
                                    </td>

                                    <td>
                                        <?= $cidade ?>
                                    </td>

                                    <td>
                                        <?= $bairro ?>
                                    </td>
                                    
                                    <td>
                                        <?= $cep ?>
                                    </td>

                                    <td>
                                    	<span class="badge <?= $ativo == 'SIM' ? $torcedorAtivo : $torcedorInativo ?>"><?= $ativo ?></span>
                                    </td>

                                    <td>
                                        <?= $telefone ?>
                                    </td>

                                    <td>
                                        <?= $email ?>
                                    </td>



									
                                    <td>
                                        <div class="btn-group dropdown">
                                            <a href="javascript: void(0);" class="table-action-btn dropdown-toggle arrow-none btn btn-light btn-sm" data-toggle="dropdown" aria-expanded="false"><i class="mdi mdi-dots-horizontal"></i></a>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a class="dropdown-item" href="<?php echo base_url()?>index.php/torcedores/listarTorcedorEdicao/<?php echo $id ;?> "><i class="mdi mdi-pencil mr-2 text-muted font-18 vertical-middle"></i>Editar</a>
                                                <a class="dropdown-item" href="<?php echo base_url()?>index.php/torcedores/deletarTorcedor/<?php echo $id ;?>"><i class="mdi mdi-delete mr-2 text-muted font-18 vertical-middle"></i>Remover</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>

								<?php endforeach ?>
                                </tbody>
                                
                            </table>
                            
                        </div>
                        
                    </div>
                </div>
             </div> 
             
        </div>
    <?php $this->load->view('elementosHtml/rodape') ?>

        <!-- jQuery  -->
        <script src="<?= base_url('') ?>/assets/js/jquery.min.js"></script>
        <script src="<?= base_url('') ?>/assets/js/popper.min.js"></script>
        <script src="<?= base_url('') ?>/assets/js/bootstrap.min.js"></script>
        <script src="<?= base_url('') ?>/assets/js/waves.js"></script>
        <script src="<?= base_url('') ?>/assets/js/jquery.slimscroll.js"></script>

        <script src="<?= base_url('') ?>/assets/js/jquery.dataTables.min.js"></script>
        <script src="<?= base_url('') ?>/assets/js/dataTables.bootstrap4.min.js"></script>
        <script src="<?= base_url('') ?>/assets/js/dataTables.responsive.min.js"></script>

        <!-- App js -->
        <script src="<?= base_url('') ?>/assets/js/jquery.core.js"></script>
        <script src="<?= base_url('') ?>/assets/js/jquery.app.js"></script>
        <script type="text/javascript">
            $(document).ready(function () {
                $('#datatable').dataTable();
            });
        </script>


    </body>
</html>