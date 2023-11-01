<?php
$nome = "Douglas Baldon";
$cargo = "Trainee / Estagiário";
$perfil1 = "Programador e estudante de Ciência da Computação na Universidade Tecnológica Federal do Paraná (UTFPR), pesquisador do Laboratório de Engenharia de Software e Inteligência Computacional (LESIC) na área de inteligência artificial e confecção de jogos.";
$perfil2 = "Técnico em Mecânica pela UTFPR e apesar de não seguir na área, os ensinos da universidade me orientaram para a área da computação desde jovem, assim estou aprimorando minha lógica computacional desde os 14 anos com o auxílio de matérias como algoritmos, CLP, CNC e outras desenvolvidas no curso Técnico, além do aprendizado dedicado nas matérias e linguagens de programação aprendidas pelo curso de Ciência da Computação: Programação Orientada a Objetos, Estrutura de Dados, Banco de Dados, Java, C, C#, Python, SQL, etc.";
$competencias = ["C", "Java", "Python", "SQL", "C#", "C++", "HTML", "CSS", "PHP", "Excel", "POO", "Inteligência Artificial"];
$experiencia1 = "Pesquisador bolsista, LESIC\nUTFPR, Ponta Grossa\n2021-2022\nComo pesquisador de Iniciação Científica...";
$experiencia2 = "Estagiário\nUTFPR, Curitiba\n2018\nEstágio obrigatório realizado na área de planejamento financeiro...";
$formacao1 = "Técnico em Mecânica\nUTFPR, Curitiba\n2014-2018\nEnsino Médio Profissionalizante na área de Mecânica";
$formacao2 = "Cientista da Computação\nUTFPR, Ponta Grossa\n08/2019 - 12/2023 (Bacharelando)\nGraduação em Ciência da Computação";
$idiomas = ["Inglês avançado", "Espanhol básico", "Português fluente"];
$contato = [
    "telefone" => "(41) 99869-1968",
    "email" => "douglasbaldon@gmail.com",
    "linkedin" => "linkedin.com/in/douglasbaldon/",
    "localizacao" => "Ponta Grossa, PR"
];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Currículo - Douglas Baldon</title>
</head>
<body>
    <header>
        <img src="perfil.jpeg" alt="Foto de Perfil" id="foto-perfil">
        <div>
            <h1><?php echo $nome; ?></h1>
            <h2><?php echo $cargo; ?></h2>
        </div>
    </header>

    <section id="perfil">
        <h3>Perfil</h3>
        <p><?php echo $perfil1; ?></p>
        <p><?php echo $perfil2; ?></p>
    </section>

    <section id="competencias">
        <h3>Competências</h3>
        <ul>
            <?php foreach ($competencias as $competencia) : ?>
                <li><?php echo $competencia; ?></li>
            <?php endforeach; ?>
        </ul>
    </section>

    <section id="experiencia">
        <h3>Experiência Profissional</h3>
        <p><strong>Pesquisador bolsista, LESIC</strong><br><?php echo $experiencia1; ?></p>
        <p><strong>Estagiário</strong><br><?php echo $experiencia2; ?></p>
    </section>

    <section id="formacao">
        <h3>Formação</h3>
        <p><strong>Técnico em Mecânica</strong><br><?php echo $formacao1; ?></p>
        <p><strong>Cientista da Computação</strong><br><?php echo $formacao2; ?></p>
    </section>

    <section id="idiomas">
        <h3>Idiomas</h3>
        <ul>
            <?php foreach ($idiomas as $idioma) : ?>
                <li><?php echo $idioma; ?></li>
            <?php endforeach; ?>
        </ul>
    </section>

    <section id="contato">
        <h3>Dados Pessoais</h3>
        <p><?php echo $contato["telefone"]; ?></p>
        <p><?php echo $contato["email"]; ?></p>
        <p><a href="<?php echo $contato["linkedin"]; ?>" target="_blank"><?php echo $contato["linkedin"]; ?></a></p>
        <p><?php echo $contato["localizacao"]; ?></p>
    </section>

    <div id="button-container">
        <a href="horarios.html" class="botao">Horários</a>
    </div>

</body>
</html>
