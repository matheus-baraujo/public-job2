<section id="footer" class="sessao">

    <?php

        if ($page == 'purpose') {
            $fundoContato = './resources/fundo3.png';
            echo   '<img class="fundoContato" src="'.$fundoContato.'" alt="">';
        } elseif ($page == 'app') {
            $fundoContato = './resources/fundo5.png';
            echo   '<img class="fundoContato" style="height: 100%;" src="'.$fundoContato.'" alt="">';
        } elseif ($page == 'contact') {
            $fundoContato = './resources/fundo4.png';
            echo   '<img class="fundoContato" src="'.$fundoContato.'" alt="">';
        }else {
            $fundoContato = './resources/fundo2.png';
            echo   '<img class="fundoContato" src="'.$fundoContato.'" alt="">';
        }

    ?>

    <div class="container-fluid" style="padding: 5% 3%;">
        <div class="row" style="text-align: center;">

            <?php 
            
                if ($page == 'contato' || $page == 'app') {
                    echo '<a href=""><img style="width: 35%; margin-bottom: 5%; margin-left: 10%;" src="./resources/app3.png" alt=""></a>
                    <a href="https://goo.gl/maps/BA44n9aVu3fNJ31Q7" class="linkContato2" style="margin-bottom: 1%;">endereço</a>
                    <a href="https://api.whatsapp.com/send?l=pt&amp;phone=55818117-5594" class="linkContato2" >telefone</a>';
                }elseif($page == 'admin' || $page == 'loggedAdmin' || $page == 'formAdmin'){
                    echo '<div style="padding-bottom: 10%;"></div>';
                
                }else {
                    echo '<p class="tituloContato" style="margin-bottom: 5%;">contato</p>

                    <div class="col-4 ms-auto" style="text-align: right;">
                        <a href="https://goo.gl/maps/BA44n9aVu3fNJ31Q7" class="linkContato2">endereço</a>
                    </div>
        
                    <div class="col-3 px-0">
                        <a href="https://api.whatsapp.com/send?l=pt&amp;phone=55818117-5594" class="linkContato2">telefone</a>
                    </div>
        
                    <div class="col-4 me-auto" style="text-align: left;">
                        <a href="" class="linkContato2">baixe o app</a>
                    </div>';
                }

                if ($page != 'admin' && $page != 'loggedAdmin' && $page != 'formAdmin') {
                    echo '<div class="col-6 mx-auto" style="margin-top: 5%; margin-bottom: 3%;">
                        <a href="" target="_blank" class="linkContato" ><i class="fab fa-facebook"></i></a>
                        <a href="https://www.instagram.com/less.loss/?utm_medium=copy_link" target="_blank" class="linkContato"><i class="fab fa-instagram"></i></a>
                    </div>';

                    echo'<a href="https://api.whatsapp.com/send?l=pt&amp;phone=55818117-5594"><img 
                    src="https://i.imgur.com/ryESuZ5.png" style="height:64px; position:fixed; bottom: 25px; right: 
                    25px; z-index:99999;" data-selector="img"></a>';
                }
            
            ?>

            
            
        </div>
    </div>

</section>