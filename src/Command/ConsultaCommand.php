<?php

namespace App\Command;

use App\Entity\HashGerada;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\String\ByteString;
use Symfony\Component\DependencyInjection\ContainerInterface;

class ConsultaCommand extends Command
{
    private $container;

    public function __construct(ContainerInterface $container)
    {
        parent::__construct();
        $this->container = $container;
    }

    protected static $defaultName = 'gerar-hash';

    protected function configure(): void
    {
        $this
            ->setHelp('Esse comando permite voce fazer uma requisição para a rota de hash')
            ->addArgument('string', InputArgument::REQUIRED, 'Informe a string')
            ->addArgument('requests', InputArgument::REQUIRED, 'Quantidade de requisições')
        ;
    }

    public function execute(InputInterface $input, OutputInterface $output): int
    {
        $em = $this->container->get('doctrine')->getManager();
        $chave = ByteString::fromRandom(8)->toString();
        $hash = md5($input->getArgument("string") . $chave);
        $stringEntrada[] = $input->getArgument("string");
        $requisicoesHash = [];
        $contadorHash = [];
        $chaveSearch[] = $chave;
        $contador = 0;
        $entrada = [];
        $i=0;
        $data = new \DateTime('@'.strtotime('now'));

        while ($i < $input->getArgument("requests")) {
            if (!str_starts_with($hash, '0000')) {
                $hash = md5($hash);
                $contador++;
            }   else {
                $chave = ByteString::fromRandom(8)->toString();
                $stringEntrada[] = $hash;
                $requisicoesHash[] = $hash;
                $contadorHash[] = $contador;
                $chaveSearch[] = $chave;
                $novoHash = new HashGerada();
                $novoHash->setData($data);
                $novoHash->setValorEntrada($stringEntrada[$i]);
                $novoHash->setChave($chave);
                $novoHash->setHash($hash);
                $novoHash->setNum($i);
                $novoHash->setTentativas($contador);

                $hash = md5($hash . $chave);
                $i++;
                $em = $this->container->get('doctrine')->getManager();
                $em->persist($novoHash);
                $em->flush();
            }
        };
        for ($i=0; $i < $input->getArgument("requests"); $i++){
            $output->writeln("Batch: ". $data->format('Y-m-d H:i:s'));
            $output->writeln("String de entrada: ". $stringEntrada[$i]);
            $output->writeln("Chave encontrada: ". $chaveSearch[$i]);
            $output->writeln('Hash gerado: '. $requisicoesHash[$i]);
            $output->writeln("Número de tentativas: ". $contadorHash[$i]);
            $output->writeln("===========================================");

        }
        return $i;

    }

}