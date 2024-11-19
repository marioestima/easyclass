<?php session_start();?>


<!DOCTYPE html>
<html lang="pt-br">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp" rel="stylesheet">

        <link rel="stylesheet" href="../assets/css/dashboard.css">
        <title>Painel de Controle</title>
    </head>

    <body id="bdy">

        <div class="container">
            <aside id="aside">

                <div class="toggle">

                    <div class="logo">
                        <image src="../images/logo.png">
                            <a href="<?php echo" ../pages/dashboard.php";?>"><h2>Easy<span class="danger">Class</span>
                                </h2></a>
                    </div>

                    <div class="close" id="close-btn">
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1"
                            id="Capa_1" x="0px" y="0px" viewBox="0 0 512.021 512.021"
                            style="enable-background:new 0 0 512.021 512.021;" xml:space="preserve" width="512"
                            height="512">
                            <g>
                                <path
                                    d="M301.258,256.01L502.645,54.645c12.501-12.501,12.501-32.769,0-45.269c-12.501-12.501-32.769-12.501-45.269,0l0,0   L256.01,210.762L54.645,9.376c-12.501-12.501-32.769-12.501-45.269,0s-12.501,32.769,0,45.269L210.762,256.01L9.376,457.376   c-12.501,12.501-12.501,32.769,0,45.269s32.769,12.501,45.269,0L256.01,301.258l201.365,201.387   c12.501,12.501,32.769,12.501,45.269,0c12.501-12.501,12.501-32.769,0-45.269L301.258,256.01z" />
                            </g>
                        </svg>
                    </div>

                </div>


                <div class="sidebar">
                    <a>
                        <button>
                            <img src="../icons/painel-de-controle.png" alt="">
                        </button>
                        <h3>dashboard</h3>
                    </a>

                    <a href="#">
                        <button>
                            <img src="../icons/bell.png" alt="">
                        </button>
                        <h3>notificações</h3>
                        <span class="message-count">7</span>
                    </a>

                    <a href="./dashboard.php">
                        <button>
                            <img src="../icons/home.svg" alt="">
                        </button>
                        <h3>Analises</h3>
                    </a>

                    <a href="#">
                        <button>
                            <img src="../icons/comment.svg" alt="">
                        </button>

                        <h3>Mensagens</h3>
                        <span class="message-count">27</span>
                    </a>

                    <a href="./upload_material.php">
                        <button>
                            <img src="../icons/upload-de-pasta.svg" alt="">
                        </button>
                        <h3>Fazer Upload</h3>
                    </a>

                    <a href="#">
                        <button>
                            <img src="../icons/share.svg">
                        </button>
                        <h3>Reportar</h3>
                    </a>

                    <a href="../logout.php">
                        <button>
                            <img src="../icons/saida.svg">
                        </button>

                        <h3>Sair</h3>
                    </a>
                </div>
            </aside>

            <main>
                <!--depois integragar php e o chart.js no comportamento desses graficos -->
                <h1>
                    Analises
                </h1>

                <div class="analyse">
                    <div class="sales">
                        <div class="status">
                            <div class="info">
                                <h1>Total Materias</h1>
                                <h1>65,34</h1>
                            </div>

                            <div class="progress">
                                <svg>
                                    <circle cx="38" cy="38" r="36"></circle>
                                </svg>

                                <div class="percentage">
                                    <p>+81%</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- outro card do grafico  -->

                    <div class="visits">
                        <div class="status">
                            <div class="info">
                                <h1>Visitas ao site</h1>
                                <h1>24,961</h1>
                            </div>

                            <div class="progress">
                                <svg>
                                    <circle cx="38" cy="38" r="36"></circle>
                                </svg>

                                <div class="percentage">
                                    <p>-81%</p>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="searches">
                        <div class="status">
                            <div class="info">
                                <h1>Pesquisas Feitas</h1>
                                <h1>14,147</h1>
                            </div>

                            <div class="progress">
                                <svg>
                                    <circle cx="38" cy="38" r="36"></circle>
                                </svg>

                                <div class="percentage">
                                    <p>+21%</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Recent class table -->
                <div class="recent-orders">
                    <h2>Matérias recentes</h2>

                    <table>
                        <thead>
                            <tr>
                                <th>Titulo</th>
                                <th>Curso</th>
                                <th>Disciplina</th>
                                <th>data</th>
                                <th></th>
                            </tr>
                        </thead>

                        <tbody>
                            <!-- this code i'll be generated by javascript -->
                        </tbody>
                    </table>

                    <a style="font-weight: bold;" href="../pages/materials.php">Mostrar Tudo</a>
                </div>
            </main>

            <div class="right-section">
                <div class="nav">
                    <a href="../includes/search.php">
                        <button id="search-btn">
                            <img src="../icons/search.png">
                        </button>
                    </a>

                    <div class="dark-mode">
                        <span class="material-icons-sharp active">
                            light_mode
                        </span>

                        <span class="material-icons-sharp">
                            dark_mode
                        </span>
                    </div>

                    <div class="profile" id="profile-section">
                        <div class="info">
                            <p>Hey</p>
                            <small class="text-muted">
                                <b>
                                    <?= htmlspecialchars($_SESSION['userLogged']); ?>
                                </b>
                            </small>
                        </div>

                        <div class="profile-photo" style="cursor: pointer;">
                            <image src="../images/i_.jpeg">
                        </div>
                    </div>
                </div>

                <div class="notifications" style='display: none;'>
                    <div class="header">
                        <h2>notifications</h2>
                    </div>

                    <div class="notification">
                        <div class="icon">
                            <span class="material-icons-sharp">
                                volume_up
                            </span>
                        </div>

                        <div class="content">
                            <div class="info">
                                <h3>tens uma nova mensagem</h3>
                                <small class="text_muted">
                                    08:10 AM
                                </small>
                            </div>

                            <span class="material-icons-sharp">
                                more_vert
                            </span>
                        </div>
                    </div>


                    <div class="notification deactive">
                        <div class="icon">
                            <span class="material-icons-sharp">
                                volume_up
                            </span>
                        </div>

                        <div class="content">
                            <div class="info">
                                <h3>tens uma nova mensagem</h3>
                                <small class="text_muted">
                                    08:10 AM
                                </small>
                            </div>

                            <span class="material-icons-sharp">
                                more_vert
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script src="../js/index.js"></script>
        <script src="../js/active.js"></script>
        <script src="../js/showprofile.js"></script>
    </body>

</html>