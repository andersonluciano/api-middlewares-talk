<?php

namespace App\Action;


use Doctrine\ORM\EntityManager;
use Interop\Http\ServerMiddleware\DelegateInterface;
use Interop\Http\ServerMiddleware\MiddlewareInterface as ServerMiddlewareInterface;
use Zend\Diactoros\Response\JsonResponse;
use Psr\Http\Message\ServerRequestInterface;

class AbstractApiAction implements ServerMiddlewareInterface
{

    protected $postRequire = array();
    protected $getRequire = array();
    protected $putRequire = array();
    protected $deleteRequire = array();

    public $em;

    public function __construct()
    {

    }

    public function process(ServerRequestInterface $request, DelegateInterface $delegate)
    {
        $method = strtolower($request->getMethod());

        $this->checkNotNullParams($method, $request->getParsedBody());
        $response = $this->$method($request);
        if (is_array($response)) {
            $request = $request->withAttribute("response", $response);

            return $delegate->process($request, $delegate);
        } else {
            return $response;
        }

    }

    protected function get(ServerRequestInterface $request)
    {
        throw new \Exception("Método não permido", 400);
    }

    protected function post(ServerRequestInterface $request)
    {
        throw new \Exception("Método não permido", 400);
    }

    protected function put(ServerRequestInterface $request)
    {
        throw new \Exception("Método não permido", 400);
    }

    protected function delete(ServerRequestInterface $request)
    {
        throw new \Exception("Método não permido", 400);
    }

//  ↓ AUTO NOT NULL PARAM CHECK ↓ ----------------------------------------------------
    public function checkNotNullParams($method, $params)
    {

        $function = "get" . ucfirst($method) . "Require";
        $requireError = array();

        foreach ($this->$function() as $require) {


            if (!array_key_exists($require, $params)) {
                $requireError[] = $require;
            } else {
                if (is_string($params[$require]) && $params[$require] == "") {
                    $requireError[] = $require;
                }
            }
        }
        if (count($requireError) > 0) {
            if (count($requireError) == 1) {
                throw new \Exception($requireError[0] . " é um dado obrigatório", 400);
            } else {
                $lastParam = array_pop($requireError);
                $requireErrorMessage = implode($requireError, ", ");
                throw new \Exception($requireErrorMessage . " e " . $lastParam . ", são dados obrigatórios", 400);
            }
        }
    }


//  ↓ JUST GETTERS AND SETTERS ↓ ----------------------------------------------------

    /**
     * @return array
     */
    public function getPostRequire()
    {
        return $this->postRequire;
    }

    /**
     * @param array $postRequire
     */
    public function setPostRequire($postRequire)
    {
        $this->postRequire = $postRequire;
    }

    /**
     * @return array
     */
    public function getGetRequire()
    {
        return $this->getRequire;
    }

    /**
     * @param array $getRequire
     */
    public function setGetRequire($getRequire)
    {
        $this->getRequire = $getRequire;
    }

    /**
     * @return array
     */
    public function getPutRequire()
    {
        return $this->putRequire;
    }

    /**
     * @param array $putRequire
     */
    public function setPutRequire($putRequire)
    {
        $this->putRequire = $putRequire;
    }

    /**
     * @return array
     */
    public function getDeleteRequire()
    {
        return $this->deleteRequire;
    }

    /**
     * @param array $deleteRequire
     */
    public function setDeleteRequire($deleteRequire)
    {
        $this->deleteRequire = $deleteRequire;
    }


}
