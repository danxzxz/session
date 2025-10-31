<?php
    require_once(__DIR__ . "/../service/PerfilService.php");
    require_once(__DIR__ . "/../service/ArquivoService.php");


    class PerfilController {
        private PerfilService $perfilService;
        private ArquivoService $arquivoService;


        public function __construct() {
            $this->perfilService = new PerfilService();
            $this->arquivoService = new ArquivoService();

        }

        public function atualizar(array $foto) {
            $erros = $this->perfilService->validar($foto);

            if (! $erros){

                $nomeArquivo = $this->arquivoService->salvarArquivo($foto);
                if ($nomeArquivo) {
                    echo $nomeArquivo;
                }else{
                    array_push($erros, "Erro ao salvar o arquivo!");
                }

            }

            return $erros;
        }
    }