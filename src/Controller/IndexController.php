<?php


namespace App\Controller;

use App\Entity\HashGerada;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\TooManyRequestsHttpException;
use Symfony\Component\RateLimiter\RateLimiterFactory;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\String\ByteString;

class IndexController extends AbstractController
{
    /**
     * @Route("/home", name="index", methods={"GET"})
     */
    public function index(Request $request)
    {
        return $this->render("index.html.twig");
    }
    /**
     * @Route("/gerarHash", name="gerarHash", methods={"POST"})
     */
    public function gerarHash(Request $request, RateLimiterFactory $anonymousApiLimiter)
    {
        $string = $request->get('gerarKey');
        $requisicoes = $request->get('requisicoes');
        $chave = ByteString::fromRandom(8)->toString();
        $hash = md5($string . $chave);
        $stringEntrada[] = $string;
        $requisicoesHash = [];
        $contadorHash = [];
        $chaveSearch[] = $chave;
        $contador = 0;
        $entrada = [];
        $i=0;
        $data = new \DateTime('@'.strtotime('now'));
        $limiter = $anonymousApiLimiter->create($request->getClientIp());

        if (false === $limiter->consume(1)->isAccepted()) {
            throw new TooManyRequestsHttpException();
        }
        while ($i < $requisicoes) {
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


        return  $this->redirectToRoute("visualizarResultado");
    }
    /**
     * @Route("/visualizar-resultados", name="visualizarResultado", methods={"GET","POST"})
     */
    public function visualizarHash(Request $request)
    {
        $hashGerada = $this->getDoctrine()->getManager()->getRepository(HashGerada::class)->findAll();
        return $this->render("tbl-requisicoes.html.twig", array(
            "hashGeradas"=>$hashGerada,
            ));
    }

}   