<?php require('partials/admin/_head.php') ?>
<?php use App\utils\Alert as Alert; ?>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <?php require('partials/admin/_sidebar.php') ?>
          </div>
        </div>

        <?php require('partials/admin/_header.php') ?>
        
        <!-- page content -->
        <div class="right_col" role="main">

          <div class="">
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <?php 
                  Alert::showMessages(); 
                ?>
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Exibindo Produto</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <dl class="dl-horizontal">
                        <dt>ID</dt>
                        <dd><?= $product->getId() ?></dd>
                        <dt>Nome</dt>
                        <dd><?= $product->getNome() ?></dd>
                        <dt>Valor</dt>
                        <dd>R$ <?= $product->getValor() ?></dd>
                    </dl>

                    <a href="/admin/products" class="btn btn-primary">Voltar</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->

        <!-- footer content -->
        <footer>
          <div class="pull-right">
            Disciplina Linguagens de Programação II - Ciência da Computação - IFC Campus Videira
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>

    <?php require('partials/admin/_scripts.php') ?>
	
  </body>
</html>