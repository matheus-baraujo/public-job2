<?php

    session_start();

    $page = 'home';

    if(isset($_GET['page'])) {
        $page = addslashes($_GET['page']);
    }

    include 'connection.php';

    include 'stringManipulation.php';
?>

<!DOCTYPE html>
<html lang="pt-br">

<?php
    include './components/directives.php';
?>

<body>

    <?php 

        include './components/menu.php';

        switch ($page) {
            case 'home':
                include './views/home.php';
                break;
            case 'paraVoce':
                include './views/paraVoce.php';
                break;
            case 'paraSeuNegocio':
                include './views/paraSeuNegocio.php';
                break;
            case 'solutions':
                include './views/solutions.php';
                break;
            case 'purpose':
                include './views/purpose.php';
                break;
            case 'app':
                include './views/app.php';
                break;
            case 'contact':
                include './views/contact.php';
                break;
            case 'blog':
                include './views/blog.php';
                break;
            case 'article':
                include './views/article.php';
                break;
            case 'admin':
                include './views/admin.php';
                break;
            case 'loggedAdmin':
                if (isset($_SESSION['login'])) {
                    include './views/loggedAdmin.php';
                    break;
                }else{
                    header('location: index.php?page=admin');
                }
            case 'formAdmin':
                if (isset($_SESSION['login'])) {
                    include './views/formAdmin.php';
                    break;
                }else{
                    header('location: index.php?page=admin');
                }
                
            default:
                include './views/home.php';
                break;
        }

        include './components/footer.php';

        include './components/scripts.php';

    ?>


</body>

</html>