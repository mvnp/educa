<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?> 
<div class="job_container container" style="margin-top: 10px">
    
    <!-- cabecalho da pagina -->
    <div class="page-header">
        <h1>Proposta - Aula de matemática em casa</h1>
        <ol class="breadcrumb">
          <li><a href="#">Home</a></li>
          <li><a href="#">Library</a></li>
          <li class="active">Data</li>
        </ol>
    </div>
    
    <!-- conteudo principal -->
    <div class="row">
        
        <!-- detalhes do job -->
        <div class="col-md-9">
            
            <!-- jumbotron com os principais detalhes -->
            <h3>Detalhes</h3>
            <div class="well col-md-12">
                <div class="col-md-6">
                    <strong>$ Orçamento: </strong> R$ 50,00
                </div>
                <div class="col-md-6">
                    <strong>
                        <span class="glyphicon glyphicon-calendar"></span>&nbsp; 
                        Publicado: 
                    </strong> 14:00 17/11/1996
                </div>
                <div class="col-md-6">
                    <strong>
                        <span class="glyphicon glyphicon-calendar"></span>&nbsp;
                        Vencimento
                    </strong>17/11/1996
                </div>
                <div class="col-md-6">
                    <strong>
                        <span class="glyphicon glyphicon-comment"></span>&nbsp;
                        Interessados: 
                    </strong> 5
                </div>
                <div class="col-md-12">
                    <br>
                    <span class="label label-success">Matemática</span>
                    <span class="label label-success">Matemática</span>
                    <span class="label label-success">Matemática</span>
                </div>
            </div>
            
            <!-- formulario de propostas -->
            <form class="col-md-12" action="<?php site_url()."jobs/propostas"?>" method="post">
                <h4>Fale mais sobre sua proposta</h4>
                <textarea class="form-control" rows="5"></textarea>
                
                <h4>Proposta</h4>
                <label for="price">Diga o seu preço</label>
                <div class="input-group">
                    <span class="input-group-addon" id="basic-addon1">$</span>
                    <input type="text" class="form-control" placeholder="Username" aria-describedby="basic-addon1">
                </div>
                
                <div class="text-danger">
                    <br>
                    Lembre-se que o site cobrará x% sobre o valor da sua proposta
                </div>
                
                <br>
                <button type="submit" class="btn btn-success btn-lg">Fazer proposta</button>
                
            </form>
            
        </div>
        
        <!-- detalhes do cliente -->
        <div class="col-md-3">
        aaaaaa
        </div>
        
    </div>

</div>