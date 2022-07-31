
<section id="blog" class="sessao">

<p class="tituloSessao">blog lessloss</p>

<div class="container-fluid" style="padding: 5% 0%;">

    <a href="?page=blog" class="linkReturn"><i class="fas fa-arrow-left"></i> voltar</a>

    <?php 
    
        if (isset($_GET['id'])) {
            $localQuery = 'SELECT * FROM posts WHERE id_posts = '.$_GET['id'];

            if($item = mysqli_fetch_array(mysqli_query($conn, $localQuery))){

                $categoria = mysqli_fetch_array(mysqli_query($conn, 'SELECT * FROM categorias_posts WHERE id_categoria ='.$item['id_categoria']));

                echo '<div class="col-11 mx-auto imgArtigo" style="background-image: url('.$item['imagem'].');">
                    <div class="infoPostPrincipal">
                        <p class="textoPostPrincipal">'.$item['dia'].' | '.$categoria['categoria'].'</p>
                        <p class="textoPostPrincipal tituloPostPrincipal">'.$item['titulo'].'</p>
                    </div>
                </div>
            
                <div>';
                    
                $texto = explode(PHP_EOL, $item['texto']);

                for($contador = 0; $contador < count($texto); $contador++){
                    echo '<p class="textoArtigo">'.$texto[$contador].'</p>';
                }
                
                echo '</div>';

            } else{
                echo '<p class="subtitulo3" style="text-align: center; padding: 10%;">Post não encontrado...</p>';
            }

        }else{
            echo '<p class="subtitulo3" style="text-align: center; padding: 10%;">Post não encontrado...</p>';
        }
    
    ?>

    <p class="subtitulo4">leia também</p>

    <div class="row" style="margin-top: 5%;">

        <?php 
        
            $counter = 0;

            while ($item = mysqli_fetch_array($consulta_posts) and $counter < 3) {

                $categoria = mysqli_fetch_array(mysqli_query($conn, 'SELECT * FROM categorias_posts WHERE id_categoria ='.$item['id_categoria']));

                echo '<a href="?page=article&id='.$item['id_posts'].'" class="col-6 col-sm-4 mb-3" style="text-decoration: none;">
                    <div class="imgPostSecundario" style="background-image: url('.$item['imagem'].');"></div>
                    
                    <p class="temaPostSecundario">'.$item['dia'].' | '.$categoria['categoria'].'</p>
                    <p class="tituloPostSecundario">'.$item['titulo'].'</p>
                </a>';

                $counter++;
            }

            if ($counter == 0) {
                echo '<p class="subtitulo3" style="text-align: center; padding: 5%;">Mais posts em breve...</p>';
            }
        
        
        ?>

    </div>


</div>


</section>