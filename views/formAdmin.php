<section class="sessao">

    <div class="container-fluid" style="padding: 0% 5%;">

        <?php 

            switch ($_GET['type']) {
                case 'categoria':

                    if ($_GET['order'] == 'add') {
                    
                        echo '<p class="subtitulo4" style="text-align: center;">Inserir Categoria</p>

                            <form action="insert.php" method="post"  enctype="multipart/form-data" style="padding: 10% 0%;">

                                <input hidden type="text" name="type" value="categoria">
                    
                                <label class="subtitulo3" style="margin-bottom: 1%;" for="categoria">Nome</label>
                                <input class="form-control input3" type="text" name="categoria" id="categoria" required>
                    
                                <input class="inputSend" style="margin-top: 5%; float: right;" type="submit" value="Adicionar">
                    
                                <a href="?page=loggedAdmin" class="inputSend formReturn" style="margin-top: 5%; float: left; text-decoration: none;">Cancelar</a>
                    
                            </form>';

                    }elseif($_GET['order'] == 'edit'){

                        $localQuery = 'SELECT * FROM categorias_posts WHERE id_categoria = '.$_GET['id'];

                        if($item = mysqli_fetch_array(mysqli_query($conn, $localQuery))){
                            echo '<p class="subtitulo4" style="text-align: center;">Inserir Categoria</p>

                            <form action="insert.php" method="post"  enctype="multipart/form-data" style="padding: 10% 0%;">

                                <input hidden type="text" name="type" value="categoria">
                    
                                <label class="subtitulo3" style="margin-bottom: 1%;" for="categoria">Nome</label>
                                <input class="form-control input3" type="text" name="categoria" id="categoria" value="'.$item['categoria'].'" required>
                    
                                <input class="inputSend" style="margin-top: 5%; float: right;" type="submit" value="Adicionar">
                    
                                <a href="?page=loggedAdmin" class="inputSend formReturn" style="margin-top: 5%; float: left; text-decoration: none;">Cancelar</a>
                    
                            </form>';
                        }

                        

                    }

                    break;
                
                case 'post':
                    
                    if ($_GET['order'] == 'add') {
                        echo '<p class="subtitulo4" style="text-align: center;">Inserir Post</p>

                            <form action="insert.php" method="post"  enctype="multipart/form-data" style="padding-bottom: 10%;">

                                <input hidden type="text" name="type" value="post">
                    
                                <label class="subtitulo3" style="margin-bottom: 1%;" for="tituloPost">Título</label>
                                <input class="form-control input3" type="text" name="titulo" id="tituloPost" required>
                    
                                <label class="subtitulo3" style="margin-bottom: 1%; margin-top: 5%;" for="imagemPost">Imagem</label>
                                <input class="form-control input3" type="file" class="formulario input-texto input3" name="imagem" accept="image/*" id="imagemPost" required>
                                            
                                <label class="subtitulo3" style="margin-bottom: 1%; margin-top: 5%;" for="textoPost">Texto</label>
                                <textarea class="form-control input3" name="texto" id="textoPost" rows="10" required></textarea>
                                
                                <label class="subtitulo3" style="margin-bottom: 1%; margin-top: 5%;" for="textoPost">Categoria</label>
                                <select class="form-select input3" name="categoria" aria-label="select" required>
                                    <option value="" disabled selected hidden>Selecione uma categoria</option>';

                                while ($item = mysqli_fetch_array($consulta_categorias)) {
                                    echo '<option value="'.$item['id_categoria'].'">'.$item['categoria'].'</option>';
                                }

                                echo '</select>';

                    
                                echo '<input  type="text" name="data" hidden value="'.date("d/m/Y").'">';
                    
                                echo '<input class="inputSend" style="margin-top: 5%; float: right;" type="submit" value="Adicionar">
                    
                                <a href="?page=loggedAdmin" class="inputSend formReturn" style="margin-top: 5%; float: left; text-decoration: none;">Cancelar</a>
                    
                            </form>';

                    }elseif($_GET['order'] == 'edit'){

                        $localQuery = 'SELECT * FROM posts WHERE id_posts = '.$_GET['id'].'';
                        $busca = mysqli_query($conn, $localQuery);

                        if ($item = mysqli_fetch_array($busca)) {
                            echo '<p class="subtitulo4" style="text-align: center;">Editar Post</p>

                            <form action="update.php" method="post"  enctype="multipart/form-data" style="padding-bottom: 10%;">

                                <input hidden type="text" name="type" value="post">
                    
                                <label class="subtitulo3" style="margin-bottom: 1%;" for="tituloPost">Título</label>
                                <input class="form-control input3" type="text" name="titulo" id="tituloPost" value='.$item['titulo'].' required>
                    
                                <label class="subtitulo3" style="margin-bottom: 1%; margin-top: 5%;" for="imagemPost">Imagem</label>
                                <input class="form-control input3" type="file" class="formulario input-texto input3" name="imagem" accept="image/*" id="imagemPost" >
                                            
                                <label class="subtitulo3" style="margin-bottom: 1%; margin-top: 5%;" for="textoPost">Texto</label>
                                <textarea class="form-control input3" name="texto" id="textoPost" rows="10">'.$item['texto'].'</textarea>

                                <label class="subtitulo3" style="margin-bottom: 1%; margin-top: 5%;" for="textoPost">Categoria</label>
                                <select class="form-select input3" name="categoria" aria-label="select" required>';

                                while ($item2 = mysqli_fetch_array($consulta_categorias)) {
                                    echo '<option value="'.$item2['id_categoria'].'"';
                                    if ($item2['id_categoria'] == $item['id_categoria']) {
                                        echo 'selected';
                                    }

                                    echo '>'.$item2['categoria'].'</option>';
                                }

                                echo '</select>';
                    
                                echo '<input class="inputSend" style="margin-top: 5%; float: right;" type="submit" value="Salvar">
                    
                                <a href="?page=loggedAdmin" class="inputSend formReturn" style="margin-top: 5%; float: left; text-decoration: none;">Cancelar</a>
                    
                            </form>';
                        }

                        
                    }

                    break;

                case 'agendamento':
                    
                    $localQuery = 'SELECT * FROM agendamentos WHERE id_agendamentos = '.$_GET['id'];
                    $search = mysqli_query($conn, $localQuery);

                    if ($item = mysqli_fetch_array($search)) {
                        echo '<p class="subtitulo4" style="text-align: center;">Visualizar Agendamento</p>

                        <label class="subtitulo3 w-100" for="autor">Autor: <span style="color: black;">'.$item['nome'].'</span> </label>
                        <label class="subtitulo3 w-100" for="autor">Telefone: <span style="color: black;">'.$item['telefone'].'</span> </label>
                        <label class="subtitulo3 w-100" for="autor">Email: <span style="color: black;">'.$item['email'].'</span> </label>
                        <label class="subtitulo3 w-100" for="autor">Tipo de cliente: <span style="color: black;">'.$item['tipo'].'</span> </label>
                        <label class="subtitulo3 w-100" for="autor">Endereço: <span style="color: black;">'.$item['local'].'</span> </label>
                        <label class="subtitulo3 w-100" for="autor">Data: <span style="color: black;">'.$item['dia'].'</span> </label>
                        <label class="subtitulo3 w-100" style="margin-bottom: 1%;" for="autor">Mensagem: </label>
                        <p class="subtitulo3 w-100" style="color: black; margin-left: 5%;">'.$item['mensagem'].'</p>';
                    }

                    echo '<a href="?page=loggedAdmin" class="inputSend formReturn" style="margin-top: 0%; float: left; text-decoration: none;">Voltar</a>';
                    

                    break;
                
                default:
                    header('location: index.php?page=admin');
                    break;
            
            }

        
        ?>
        
    </div>

</section>