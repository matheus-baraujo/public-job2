<div id="contact" class="sessao">

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

        if($counter == 0 and $counter2 == 0){
            $datas = array();
        }

    ?>


    <p class="tituloSessao">contato</p>

    <p class="subtitulo3" style="width: 70%; margin-bottom: 5%;">agende sua visita e faça o orçamento do seu apartamento/ edifício</p>

    <?php 
        if(isset($_GET['status'])){
            if ($_GET['status'] == 'sucesso') {
                echo '<p class="msgResult">Agendamento realizado com sucesso!</p>';
            } elseif ($_GET['status'] == 'falha') {
                echo '<p class="msgResult">Falha ao agendar...</p>';
            }
        }
    
    ?>
    
    <form action="agendar.php" method="post">

        <input class="form-control mb-3 input1" type="text" style="width: 50%;" name="nome" placeholder="nome" required>
        <input class="form-control mb-3 input1" type="tel" style="width: 50%;" name="telefone" placeholder="telefone" required>

        <input class="form-control mb-3 input1" type="email" style="width: 50%;" name="email" placeholder="email">

        <select class="form-select mb-3 input1" name="tipo" aria-label="select" required>
            <option value="" disabled selected hidden>tipo de usuário</option>
            <option value="morador">morador</option>
            <option value="sindico">síndico</option>
            <option value="gestor">gestor</option>
            <option value="empresaIndustria">empresa ou indústria</option>
            <option value="parceiros">parceiros</option>
        </select>

        <input class="form-control mb-3 input1" type="text" style="width: 50%;" name="local" placeholder="local" required>

        <input type='text' autocomplete="off" class="form-control mb-3 input1" id="dia" name="dia" placeholder="dd/mm/aaaa" data-provide="datepicker" required>
        
        <textarea class="form-control mb-3 input2" style="width: 70%;" name="mensagem" id="mensagem" rows="5" placeholder="Conte-nos seu problema! Sua solução está aqui."></textarea>

        <input class="inputSend" type="submit" value="agende sua visita">

    </form>

    
</div>