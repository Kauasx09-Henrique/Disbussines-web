<?php
include_once '../control/listarCategoriasControl.php';
session_start();
require_once 'C:\xampp\htdocs\projeto\Disbusines\model\DAO\EmpresaDAO.php';

// Verifica se o usuário está logado
if (!isset($_SESSION['idUsu'])) {
    header("Location: cadastroUsuario.php");
    exit();
}

// Captura o valor da pesquisa
$categoria = isset($_GET['categoria']) ? $_GET['categoria'] : '';

// Instancia o objeto EmpresaDAO
$empresaDAO = new EmpresaDAO();
$id = $_SESSION['idUsu'];
$nome =  $_SESSION['nome'];

// Caso a pesquisa tenha sido feita
if (!empty($categoria)) {
    // Filtra empresas pela categoria
    $empresasAprovadas = $empresaDAO->listarEmpresasPorCategoria($categoria);
} else {
    // Caso não tenha pesquisa, lista todas as empresas aprovadas
    $empresasAprovadas = $empresaDAO->listarEmpresasPorStatus('aprovada');
}

// Evita cache no navegador
header("Cache-Control: no-cache, must-revalidate");
header("Expires: Sat, 26 Jul 1997 05:00:00 GMT");
?>


<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tela Inicial</title>
    <link rel="icon" href="../icon/logo minimalista.png" type="image/x-icon">
    <link rel="stylesheet" href="../css/index.css">
    <link rel="stylesheet" href="../css/drop.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    
    <link rel="stylesheet" href="../js/script_button.js">
    
   
    <!-- Link script Scroll Mouse -->
    <script src="https://unpkg.com/scrollreveal@4"></script>
    <!-- Link Swiper's CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css" />
    <!-- Link Script Botton -->
    <link rel="icon" href="http://www.w3.org/2000/svg" sizes="32x32" />
    <script>
        function limparSession(){
            session_destroy()
        }
    </script>

</head>

<body>
    <!-- Dobra cabeçalho -->
    <header class="main_header" id="main_header">
        <div class="main_header_content">

            <a href="" class="logo"><img src="../img/logo - DB (3).png" alt="Bem vindo ao projeto Provenance"></a>
            <nav class="main_header_content_menu">
                <ul>
                    <li class="fonte-li"><a href="">Inicio</a></li>
                    <li class="fonte-li"><a href="../view/minhaempresa.php">Acompanhar empresa</a></li>
                
                    <li class="fonte-li"><a href="../view/telaplanos.php">Planos</a></li>
                    <?php
                        if(!isset($_SESSION['idUsu'])) {
                            echo '<li class="fonte-li"><a href="../view/cadastroUsuario.php" >Login</a></li>';
                        }
                        
                    ?>
                   <div class="btn-contato"><a href="../view/telacadastro.php"><button>Cadastrar Empresa</button></a></div>
                   <li class="fonte-lii">
     
                   <div class="profile-menu">
    <!-- Ícone de perfil -->
    <div class="profile-icon" onclick="toggleMenu()">
        <img src="../img/icone_boneco.png" alt="Perfil">
    </div>

    <!-- Opções do menu -->
    <div class="menu-options" id="menuOptions">
        <a href="../index.php" class="menu-item">Sair do Sistema</a>
        <a href="../view/alterarUser.php" class="menu-item">Alterar Perfil</a>
    </div>
</div>

<script>
    function toggleMenu() {
        const menu = document.getElementById('menuOptions');
        // Verifica o estilo de exibição do menu e alterna
        menu.style.display = menu.style.display === 'block' ? 'none' : 'block';
    }
</script>

                    </li>
                </ul>
            </nav>
        </div>
    </header>

    <!-- teste chatbot -->
<div class="notification-icon" onclick="toggleSidebar()">🔔</div>

    <!-- Overlay -->
    <div class="overlay" id="overlay" onclick="toggleSidebar()"></div>

    <!-- Barra lateral de notificações -->
    <div class="sidebar" id="sidebar">
        <div class="close-btn" onclick="toggleSidebar()">✖</div>
        <h2>Notificações</h2>
        
        <?php if (!empty($empresas)): ?>
            <?php foreach ($empresas as $empresa): ?>
                <div class="notification">
                    <p><strong>Empresa:</strong> <?php echo htmlspecialchars($empresa['nome_empresa']); ?></p>
                    <p><strong>Status:</strong> <?php echo htmlspecialchars($empresa['status']); ?></p>
                    <hr>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p>Nenhuma empresa registrada.</p>
        <?php endif; ?>
    </div>
    <script>
        // Alterna a visibilidade da barra lateral e do overlay
        function toggleSidebar() {
            const sidebar = document.getElementById('sidebar');
            const overlay = document.getElementById('overlay');
            const isVisible = sidebar.style.display === 'block';

            sidebar.style.display = isVisible ? 'none' : 'block';
            overlay.style.display = isVisible ? 'none' : 'block';
        }
    </script>
    <!-- Fim dobra cabeçalho -->
    <!-- INICIO 1º DOBRA -->
   
    <main class="modal-link">
        <div class="color-main-logo">
            <div class="headline">
                <div class="main_cta" id="main_cta">
                    <article class="main_cta_content">
                        <div class="main_cta_content_spacer">
                            <header>
                                
                                <h1><b class="ponto">OLÁ <?php echo $nome?></b>, <br> SE PROCURA SERVIÇOS DE QUALIDADE, NÓS TEMOS AS MELHORES MICROEMPRESAS <br> <b class="ponto">ESPERANDO POR VOCÊ.</b></h1>
                            </header>
                            <!-- <div class="headline1"> -->
                            <p>   O marketing é a arte de entender e influenciar o comportamento
                                do consumidor para atender às suas necessidades e desejos. Ele
                                utiliza estratégias criativas e análises de mercado para
                                construir e promover marcas, produtos e serviços. Com o avanço
                                 digital, o marketing se tornou mais dinâmico e orientado por
                            dados, permitindo uma comunicação mais personalizada e eficaz.</p>
                        </div>
                    </article>
                </div>
            </div>
        </div>
        <!-- FIM 1º DOBRA -->

        <!-- inicio explicação -->

        <body>
            <div class="layout-container">
                <!-- Imagens da Galeria -->
                <section class="image-gallery">
                    <img src="../img/Design sem nome (9).jpg" alt="Escritório moderno" class="gallery-image">
                    <img src="../img/Design sem nome (10).jpg" alt="Recepção da empresa" class="gallery-image">
                    
                </section>
        
                <!-- Conteúdo Principal -->
                <section class="main-content">
                  
        
                    <h1 class="content-title">
                        Impulsionamos o crescimento de marcas<br>
                        em todos <span class="highlight-text">segmentos do mercado</span>
                    </h1>
        
                    <p class="content-description">
                        Autoridade e posicionamento com <strong>Marketing digital em Brasília e Goiânia</strong>,
                        para sua empresa alcançar a relevância e projeção que merece. Construa agora mesmo sua presença online!
                    </p>
        
                    <ul class="benefits-list">
                        <li class="benefit-item">✔️ Marketing Digital Consolidado</li>
                        <li class="benefit-item">✔️ Conversão Eficiente com Resultado</li>
                    </ul>
        
                    <a href="#" class="contact-button">Fale Conosco</a>
        
                    <!-- Botões Flutuantes de Contato -->
              
                </section>
            </div>

        <!-- fim explicaçaõ -->

        <!-- INICIO SESSÃO FUNCIONALIDADES -->

        <section class="container-phrase-body" id="container-phrase-body">
            <div class="container-phrase">
                <div >
                    <img src="../img/logo minimalista.png" alt="Logo disbusiness">
                </div>
                <h2><b>Conheça</b> os <br><b class="phrase-func">MICROEMPREENDEDORES</b></br></h2>
            </div>
        </section>

           <!-- inicio carrosel -->
           <div class="custom-carousel">
  <div class="carousel-track">
    <div class="carousel-slide">
      <img src="../img/artist-7250695 (1).jpg" alt="Austral" class="carousel-image">
      <div class="carousel-caption">
        <h3 class="carousel-title">Feito à Mão Ateliê</h3>
        <button class="carousel-button">Veja mais</button>
      </div>
    </div>
    <div class="carousel-slide">
      <img src="../img/Doce Encanto.jpg" alt="Mané Mercado" class="carousel-image">
      <div class="carousel-caption">
        <h3 class="carousel-title">Doce Encanto</h3>
        <button class="carousel-button">Veja mais</button>
      </div>
    </div>
    <div class="carousel-slide">
      <img src="../img/Doce Encanto (1).jpg" alt="Chás Leão" class="carousel-image">
      <div class="carousel-caption">
        <h3 class="carousel-title">Aprender Já </h3>
        <button class="carousel-button">Veja mais</button>
      </div>
    </div>
    <div class="carousel-slide">
      <img src="../img/artist-7250695 (1).jpg" alt="Outro Produto" class="carousel-image">
      <div class="carousel-caption">
        <h3 class="carousel-title">Outro Produto</h3>
        <button class="carousel-button">Veja mais</button>
      </div>
    </div>
    <div class="carousel-slide">
      <img src="../img/artist-7250695 (1).jpg" alt="Mais um Produto" class="carousel-image">
      <div class="carousel-caption">
        <h3 class="carousel-title">Mais um Produto</h3>
        <button class="carousel-button">Veja mais</button>
      </div>
    </div>
    <div class="carousel-slide">
      <img src="../img/artist-7250695 (1).jpg" alt="Produto Extra" class="carousel-image">
      <div class="carousel-caption">
        <h3 class="carousel-title">Produto Extra</h3>
        <button class="carousel-button">Veja mais</button>
      </div>
    </div>
  </div>
  <button class="carousel-control carousel-prev" onclick="prevSlide()">❮</button>
  <button class="carousel-control carousel-next" onclick="nextSlide()">❯</button>
<script>
    // JavaScript para o carrossel
    let currentSlide = 0;
  const slidesToShow = 3; // Número de slides visíveis
  const totalSlides = document.querySelectorAll(".carousel-slide").length;
  const track = document.querySelector(".carousel-track");

  function showSlide(index) {
    const slideWidth = document.querySelector(".carousel-slide").offsetWidth;
    track.style.transform = `translateX(-${index * slideWidth}px)`;
  }

  function prevSlide() {
    currentSlide = (currentSlide === 0) ? totalSlides - slidesToShow : currentSlide - slidesToShow;
    showSlide(currentSlide);
  }

  function nextSlide() {
    currentSlide = (currentSlide >= totalSlides - slidesToShow) ? 0 : currentSlide + slidesToShow;
    showSlide(currentSlide);
  }

  // Exibe o slide inicial
  showSlide(currentSlide);
</script>



    
   


    
  
</div>

<!-- pesquisa -->
<!-- pesquisa -->
<br>
 <br>
 <br>
<div class="hero-section">
        <div class="hero-content">
            <h1 class="hero-title">Encontre atividades em qualquer lugar</h1>
            <form class="hero-form">
        
  
  <select id="categoria" name="categoria" class="hero-input">
    <option value="moda">Moda</option>
    <option value="saúde">Saude</option>
    <option value="transporte">Transporte</option>
    <option value="educação">educação</option>
  </select>
  <button type="button" class="hero-button" onclick="pesquisarPorCategoria()">Pesquisar</button>
</form>
                
                <script>
              function pesquisarPorCategoria() {
    var categoriaSelecionada = document.getElementById("categoria").value;
    // Redireciona para outra página, passando a categoria como parâmetro na URL
    window.location.href = "resultados.php?categoria=" + categoriaSelecionada;
}


                </script>

            </form>
        </div>
<!-- fim pesquisa -->

        <!-- Icons/Buttons on the left side -->
        <div class="hero-left-icons">
            <button class="icon-button">Icon 1</button>
            <button class="icon-button">Icon 2</button>
        </div>
    </div>

   <!-- inicio lugares -->

   <h1 class="titu2">Ás melhores microempresas, você <b class="ponto2">só encontra aqui.</b></h1>
    <!-- Container onde as empresas aprovadas serão exibidas -->
<div class="modern-tour-container">
    <?php if (!empty($empresasAprovadas)): ?>
        <?php foreach ($empresasAprovadas as $empresa): ?>
            <div class="modern-tour-item">
                <img src="<?php echo !empty($empresa['logo']) ? $empresa['logo'] : '../img/pets-3715734.jpg'; ?>" alt="Imagem da empresa">
                <div class="tour-info">
                    <h4><?php echo htmlspecialchars($empresa['nome_empresa']); ?></h4>
                    <p class="rating">
                        <span class="stars">★★★☆☆</span> 160 avaliações
                    </p>
                    <button onclick="window.location.href='./detalhesEmpresa.php?id=<?php echo $empresa['id_cnpj']; ?>'">
                        Ver mais
                    </button>
                </div>
            </div>
            <style>
                button{
                    border-radius: 12px
                }
            </style>
        <?php endforeach; ?>
    <?php else: ?>
       
    <?php endif; ?>
</div>


    <!-- fim lugares -->

    <!-- tela 3 -->
    <section class="award-section">
        <div class="award-content">
            <div class="award-text">
                <img class="award-icon" src="../img/logo minimalista.png" alt="">
                <h1 class="award-title">Melhores Microempresas<br>destauqe no mercado</h1>
                <p class="award-description">Conheça as empresas que estão entre os melhores destinos, acomodações, restaurantes e experiências, decidido por vocês.</p>
                <button class="award-button">Veja os vencedores</button>
            </div>
            <div class="award-image">
                <img src="../img/Design sem nome (12).jpg" alt="Imagem ilustrativa de um destino">
            </div>
        </div>
    </section>
    <!-- fim tela 3 -->
    <!-- inicio cards -->

    <!-- <section class="restaurant-info-container">
        <div class="restaurant-card">
            <div class="restaurant-icon">
                <img src="https://img.icons8.com/ios-filled/50/000000/restaurant.png" alt="Comer Bem">
            </div>
            <h3 class="restaurant-title">Encontre onde comer bem</h3>
            <p class="restaurant-description">4,3 milhões de restaurantes, de comida de rua a refeições sofisticadas</p>
        </div>
        <div class="restaurant-card">
            <div class="restaurant-icon">
                <img src="https://img.icons8.com/ios-filled/50/000000/reservation.png" alt="Avaliações">
            </div>
            <h3 class="restaurant-title">Veja avaliações recentes</h3>
            <p class="restaurant-description">Milhões de avaliações e fotos enviadas pela nossa comunidade global de viajantes</p>
        </div>
        <div class="restaurant-card">
            <div class="restaurant-icon">
                <img src="https://img.icons8.com/ios-filled/50/000000/reservation.png" alt="Reservar">
            </div>
            <h3 class="restaurant-title">Reserve uma mesa</h3>
            <p class="restaurant-description">Faça reservas online em restaurantes do mundo todo</p>
        </div>
    </section> -->

    
    <!-- fim cards -->



    </main>

    <div id="btnTop">
        <botton class="arrow up"></botton>
    </div>

    <footer class="footer" id="footer">
        <div class="container">
            <div class="col1">
                <a href="#" class="brand">DISBUSINESS</a>
                <ul class="media-icons">
                    <li>
                        <a href="#"><i class="fa-brands fa-twitter"></i></a>
                    </li>
                    <li>
                        <a href="#"><i class="fa-brands fa-facebook"></i></a>
                    </li>
                    <li>
                        <a href="#"><i class="fa-brands fa-instagram"></i></a>
                    </li>

                </ul>
            </div>
            <div class="col2">
                <ul class="menu">
                    <li><a href="#main_cta">Inicio</a></li>
                    <li><a href="#wrapper">Funcionalidades</a></li>
                    <li><a href="#sb-body">Saiba mais</a></li>
                    <li><a href="#footer">Contato</a></li>
                    <p> Conectando você ao sucesso dos microempreendedores. Juntos, impulsionamos sonhos e fortalecemos negócios locais.
                    </p>
                </ul>
            </div>
            <div class="col3">
                <p>Entre em contato com o suporte</p>
                <form>
                    <div class="input-wrap">
                        <input type="email" placeholder="ex@gmail.com" /><button type="submit"><i
                                class="fa-solid fa-paper-plane"></i></button>
                    </div>
                </form>

            </div>
        </div>

        <div class="footer-bottom">
            <div class="mekk">
                <p>Disbusiness 2024 - Todos os direitos reservados</p>
            </div>
        </div>
    </footer>
    <script>
        // Script menu (mudar cor)
        window.addEventListener("scroll", function () {
            let header = document.querySelector('#main_header');
            header.classList.toggle('menuAnimation', window.scrollY > 0);
        })

        // Script do pop login
        // Seleciona o link e a janela modal
        var link = document.querySelector('.modal-link');
        var modal = document.querySelector('.modal_login');
        var overlay = document.querySelector('.overlay_login');
        var body = document.body;

        // Adiciona um listener de evento para o link
        link.addEventListener('click', function (event) {
            event.preventDefault(); // previne o comportamento padrão do link (navegar para outra página)

            overlay.style.display = 'block'; // exibe a camada escura
            modal.style.display = 'block'; // exibe a janela modal
            // body.classList.add('modal-open'); // desativa a rolagem
        });

        // Adiciona um listener de evento para a camada escura
        overlay.addEventListener('click', function () {
            overlay.style.display = 'none'; // oculta a camada escura
            modal.style.display = 'none'; // oculta a janela modal
            // body.classList.remove('modal-open'); // reativa a rolagem
        });
    </script>
    <!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>

    <!-- Initialize Swiper -->
    <script>
        var swiper = new Swiper(".mySwiper", {
            effect: "coverflow",
            grabCursor: true,
            centeredSlides: true,
            slidesPerView: "auto",
            coverflowEffect: {
                rotate: 0,
                stretch: 0,
                depth: 300,
                modifier: 1,
                slideShadows: false,
            },
            pagination: {
                el: ".swiper-pagination",
            },
        });
    </script>
    <!-- Script Scroll Mouse -->
    <script>
        ScrollReveal().reveal('.headline', { duration: 3000 });
        ScrollReveal().reveal('.headline1', { duration: 3300 });
    </script>
    <!-- Script Botton -->
    <script src="../js/script_button.js"></script>



    

</body>

</html>