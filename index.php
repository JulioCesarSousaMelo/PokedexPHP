<?php
    // Chamando a URL da API e armazenando em uma variável
    $url = "https://www.canalti.com.br/api/pokemons.json";

    // Função que irá retornar o conteúdo da URL e armazenar
    // Converter a variável de JSON para String
    $pokemons = json_decode(file_get_contents($url));
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <title>Pokedex utilizando API</title>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- ============================================================= -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <!-- ============================================================= -->
    <link rel="stylesheet" href="./css/style.css">
    <!-- ============================================================= -->

</head>
<body>
    <!-- Header da Página -->
    <header>
        <div class="p-3 mb-5 text-center bg-dark text-light">
            <h1 class="mb-3 display-4">Pokedéx</h1>
            <h4 class="mb-3 text-muted">Consumo de API com PHP</h4>
        </div>
    </header>

    <!-- Sessão que irá retornar as informações da API -->
    <section class="container">
        <?php if(count($pokemons->pokemon)) { ?>
        <div class="row">
            <?php foreach($pokemons->pokemon as $Pokemon) { ?>
                    <div class="col-md-4 mb-3">
                        <div class="card card-custom">
                            <img src="<?= $Pokemon->img ?>" alt="Imagem do Pokémon" class="img-pokemons mt-3">
                            <h4><?= $Pokemon->name ?></h1>
                            <ul> 
                                <?php if(count($Pokemon->next_evolution)){ 
                                        echo "Próximas Evoluções: ";
                                        foreach($Pokemon->next_evolution as $ProximaEvolucao){ ?>
                                            <p> <?php echo $ProximaEvolucao->name ?> </p>
                                <?php 
                                        }
                                      } else {
                                          echo "Não possui evolução";
                                      }
                                ?>
                            </ul>
                        </div>
                    </div>
            <?php  } ?>
        </div>
        <?php  } else { echo "Não possui nenhum pokémon"; } ?>
    </section>
</body>
</html>

















































