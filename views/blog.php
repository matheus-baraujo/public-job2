
<section id="blog" class="sessao">

    <p class="tituloSessao">blog lessloss</p>

    <div class="container-fluid" style="padding: 5% 0%;">

        <div class="row">

            <?php 

                if ($item = mysqli_fetch_array($consulta_posts)) {

                    $categoria = mysqli_fetch_array(mysqli_query($conn, 'SELECT * FROM categorias_posts WHERE id_categoria ='.$item['id_categoria']));

                    echo '<a href="?page=article&id='.$item['id_posts'].'" class="col-7 imgPostPrincipal" style="background-image: url('.$item['imagem'].');">
                        <div class="infoPostPrincipal">
                            <p class="textoPostPrincipal">'.$categoria['categoria'].'</p>
                            <p class="textoPostPrincipal tituloPostPrincipal">'.$item['titulo'].'</p>
                        </div>
                    </a>';
                }

                echo '<div class="col-4 my-auto" style="padding-left: 5%;">';

                $counter = 0;
                while ($item = mysqli_fetch_array($consulta_posts) and $counter < 3) {

                    $categoria = mysqli_fetch_array(mysqli_query($conn, 'SELECT * FROM categorias_posts WHERE id_categoria ='.$item['id_categoria']));

                    echo '<a href="?page=article&id='.$item['id_posts'].'" style="text-decoration: none;">
                        <p class="temaPostSecundario">'.$categoria['categoria'].'</p>
                        <p class="tituloPostSecundario">'.$item['titulo'].'</p>
                    </a>';

                    if ($counter < 2) {
                        echo '<hr style="color: #BE3591;">';
                    }

                    $counter++;
                }

                echo '</div>';
            
            ?>

            <!--
            <a href="" class="col-7 imgPostPrincipal" style="background-image: url('./resources/slide1.png');">
                <div class="infoPostPrincipal">
                    <p class="textoPostPrincipal">categoria</p>
                    <p class="textoPostPrincipal tituloPostPrincipal">titulo</p>
                </div>
            </a>

            <div class="col-4 my-auto" style="padding-left: 5%;">
                
                <a href="" style="text-decoration: none;">
                    <p class="temaPostSecundario">categoria</p>
                    <p class="tituloPostSecundario">titulo</p>
                </a>

                <hr style="color: #BE3591;">

                <a href="" style="text-decoration: none;">
                    <p class="temaPostSecundario">categoria</p>
                    <p class="tituloPostSecundario">titulo</p>
                </a>

                <hr style="color: #BE3591;">

                <a href="" style="text-decoration: none;">
                    <p class="temaPostSecundario">categoria</p>
                    <p class="tituloPostSecundario">titulo</p>
                </a>

            </div>
            -->

        </div>

        <div class="row" style="margin-top: 5%;">

            <?php 
            
                $counter = 0;
                while ($item = mysqli_fetch_array($consulta_posts)) {
                    
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

            <!--
            <a href="" class="col-6 col-sm-4 mb-3" style="text-decoration: none;">
                <div class="imgPostSecundario" style="background-image: url('./resources/slide1.png');"></div>
                
                <p class="temaPostSecundario">data | categoria</p>
                <p class="tituloPostSecundario">titulo</p>
            </a>
            -->

        </div>


    </div>


</section>