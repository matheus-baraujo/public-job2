<?php
    $counter = 0;

    while ($item = mysqli_fetch_array($consulta_agendamentos)) {
        
        if($item['dia'][0] == "0"){
            $aux = substr($item['dia'],1);
        }else{
            $aux = $item['dia'];
        }

        $aux = str_replace("/", "-", $aux);

        $datas[] = $aux;
        
        $counter++;
    }

    $counter2 = 0;

    while ($item2 = mysqli_fetch_array($consulta_datas)) {
        if($item2['dia'][0] == "0"){
            $aux = substr($item2['dia'],1);
        }else{
            $aux = $item2['dia'];
        }

        $aux = str_replace("/", "-", $aux);

        $datas[] = $aux;
        
        $counter2++;
    }

    if($counter == 0 && $counter2 == 0){
        $datas = array();
    }

?>

<section id="loggedAdmin" class="sessao">

    <a href="logout.php" class="inputSend" style="padding: 2%; float: right; text-decoration: none;">logout</a>

    <p class="tituloSessao" style="border-left: none; text-align: center; margin: 10% 0%;">Administrator</p>


    <p class="subtitulo4">Categorias de post</p>

    <div class="tableAdmin">

        <table id="table_categorias" class="table table-striped table-hover" style="text-align: center; width: 100%;">
            <thead>
                <tr>
                    <th>Id</th> <th>Categoria</th> <th>Editar</th> <th>Deletar</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    while ($item = mysqli_fetch_array($consulta_categorias)) {
                        echo'<tr>
                            <td>'.$item["id_categoria"].'</td>
                            <td>'.$item["categoria"].'</td>
                            <td><a href="?page=formAdmin&type=categoria&order=edit&id='.$item["id_categoria"].'" class="btn-edit-delete"><i class="fas fa-pen"></i></a></td>
                            <td><a href="delete.php?type=categoria&id='.$item["id_categoria"].'" class="btn-edit-delete"><i class="fas fa-trash"></i></a></td>
                        </tr>';
                    }
                ?>
            </tbody>
            
        </table>

        <a href="?page=formAdmin&type=categoria&order=add" class="inputSend" style="float: right; font-weight: bold; text-decoration: none; margin-top: 3%;" >Adicionar</a>
        
    </div>


    <p class="subtitulo4" style="margin-top: 15%;">Postagens</p>

    <div class="tableAdmin">

        <table id="table_posts" class="table table-striped table-hover" style="text-align: center; width: 100%;">
            <thead>
                <tr>
                    <th>Id</th> <th>Título</th> <th>Data</th> <th>Editar</th> <th>Deletar</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    while ($item = mysqli_fetch_array($consulta_posts)) {
                        echo'<tr>
                            <td>'.$item["id_posts"].'</td>
                            <td>'.$item["titulo"].'</td>
                            <td>'.$item["dia"].'</td>
                            <td><a href="?page=formAdmin&type=post&order=edit&id='.$item["id_posts"].'" class="btn-edit-delete"><i class="fas fa-pen"></i></a></td>
                            <td><a href="delete.php?type=post&id='.$item["id_posts"].'" class="btn-edit-delete"><i class="fas fa-trash"></i></a></td>
                        </tr>';
                    }
                ?>
            </tbody>
            
        </table>

        <a href="?page=formAdmin&type=post&order=add" class="inputSend" style="float: right; font-weight: bold; text-decoration: none; margin-top: 3%;" >Adicionar</a>
        
    </div>

    <p class="subtitulo4" style="margin-top: 15%;">Agendamentos</p>

    <div class="tableAdmin">

        <table id="table_agendamentos" class="table table-striped table-hover" style="text-align: center; width: 100%;">
            <thead>
                <tr>
                    <th>Id</th> <th>Nome</th> <th>Data</th> <th>Ver</th> <th>Deletar</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    while ($item = mysqli_fetch_array($consulta_agendamentos)) {
                        echo'<tr>
                            <td>'.$item["id_agendamentos"].'</td>
                            <td>'.$item["nome"].'</td>
                            <td>'.$item["dia"].'</td>
                            <td><a href="?page=formAdmin&type=agendamento&id='.$item["id_agendamentos"].'" class="btn-edit-delete"><i class="fas fa-eye"></i></a></td>
                            <td><a href="delete.php?type=agendamento&id='.$item["id_agendamentos"].'" class="btn-edit-delete"><i class="fas fa-trash"></i></a></td>
                        </tr>';
                    }
                ?>
            </tbody>
            
        </table>
        
    </div>

    <p class="subtitulo4" style="margin-top: 15%;">Datas de atendimento <br>(mês atual)</p>

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                <p class="subtitulo5" style="margin-top: 15%;">Desabilitar datas</p>
    
                <form action="datas.php" method="post">
                    <input type="text" name="type" value="desabilitar" hidden>

                    <input type='text' autocomplete="off" class="form-control mb-3 input1" 
                    id="disable" name="datas" placeholder="dd/mm/aaaa" 
                    data-date-format="dd/mm/yyyy" 
                    data-date-language="pt-BR" 
                    data-date-multidate="true" data-date-multidate-separator=", " 
                    data-date-clear-btn="true" data-date-days-of-week-disabled="[0, 6]" 
                    data-date-start-date="0d" 
                    data-date-end-date="<?php echo date('t/m/Y', mktime(0,0,0, date('m'), date('d'), date('y')))?>"
                    data-date-dates-disabled="<?php echo "[".implode(", ",$datas)."]"?>" 
                    data-provide="datepicker">
                
                    <input class="inputSend" type="submit" value="Salvar">
                </form>
            </div>
            
            <div class="col-md-6">
                <p class="subtitulo5" style="margin-top: 15%;">Habilitar datas</p>

                <form id="teste" action="datas.php" method="post">
                    <input type="text" name="type" value="habilitar" hidden>

                    <input type='text' autocomplete="off" class="form-control mb-3 input1" 
                    id="enable" name="datas" placeholder="dd/mm/aaaa" 
                    data-date-format="dd/mm/yyyy" 
                    data-date-language="pt-BR" 
                    data-date-multidate="true" data-date-multidate-separator=", " 
                    data-date-clear-btn="true" data-date-days-of-week-disabled="[0, 6]" 
                    data-date-start-date="0d" 
                    data-date-end-date="<?php echo date('t/m/Y', mktime(0,0,0, date('m'), date('d'), date('y')))?>"
                    data-provide="datepicker">

                    <input class="inputSend" type="submit" value="Salvar">
                </form>
            </div>

        </div>
    </div>

    



</section>