<?php

namespace App\Action;

use Interop\Http\ServerMiddleware\DelegateInterface;
use Interop\Http\ServerMiddleware\MiddlewareInterface as ServerMiddlewareInterface;
use Zend\Diactoros\Response\JsonResponse;
use Psr\Http\Message\ServerRequestInterface;

class ArrayFunctionsAction implements ServerMiddlewareInterface
{
    public function process(ServerRequestInterface $request, DelegateInterface $delegate)
    {

        return new JsonResponse($this->getArrayFunctions());
    }


    public function getArrayFunctions()
    {
        return array(
            "array_change_key_case" => " Modifica a caixa de todas as chaves em um array",
            "array_chunk" => " Divide um array em pedaços",
            "array_column" => " Retorna os valores de uma coluna do array informado",
            "array_combine" => " Cria um array usando um array para chaves e outro para valores",
            "array_count_values" => " Conta todos os valores de um array",
            "array_diff" => " Computa as diferenças entre arrays",
            "array_diff_assoc" => " Computa a diferença entre arrays com checagem adicional de índice",
            "array_diff_key" => " Computa a diferença entre arrays usando as chaves na comparação",
            "array_diff_uassoc" => " Computa a diferença entre arrays com checagem adicional de índice ,que feita por uma função de callback fornecida pelo usuário",
            "array_diff_ukey" => " Computa a diferença entre arrays usando uma função callback na ,comparação de chaves",
            "array_fill" => " Preenche um array com valores",
            "array_fill_keys" => " Preenche um array com valores, especificando chaves",
            "array_filter" => " Filtra elementos de um array utilizando uma função callback",
            "array_flip" => " Permuta todas as chaves e seus valores associados em um array",
            "array_intersect" => " Calcula a interseção entre arrays",
            "array_intersect_assoc" => " Computa a interseção de arrays com uma adicional verificação de ,índice",
            "array_intersect_key" => " Computa a interseção de array comparando pelas chaves",
            "array_intersect_uassoc" => " Computa a interseção de arrays com checagem de índice ,adicional, compara índices por uma função de callback",
            "array_intersect_ukey" => " Computa a interseção de arrays usando uma função de callback nas ,chaves para comparação",
            "array_keys" => " Retorna todas as chaves ou uma parte das chaves de um array",
            "array_key_exists" => " Checa se uma chave ou índice existe em um array",
            "array_map" => " Aplica uma função em todos os elementos dos arrays dados",
            "array_merge" => " Combina um ou mais arrays",
            "array_merge_recursive" => " Funde dois ou mais arrays recursivamente",
            "array_multisort" => " Ordena múltiplos arrays ou arrays multidimensionais",
            "array_pad" => " Expande um array para um certo comprimento utilizando um determinado valor",
            "array_pop" => " Extrai um elemento do final do array",
            "array_product" => " Calcula o produto dos valores de um array",
            "array_push" => " Adiciona um ou mais elementos no final de um array",
            "array_rand" => " Escolhe um ou mais elementos aleatórios de um array",
            "array_reduce" => " Reduz um array para um único valor através de um processo iterativo via ,função callback",
            "array_replace" => " Replaces elements from passed arrays into the first array",
            "array_replace_recursive" => " Replaces elements from passed arrays into the first array ,recursively",
            "array_reverse" => " Retorna um array com os elementos na ordem inversa",
            "array_search" => " Procura por um valor em um array e retorna sua chave correspondente caso ,seja encontrado",
            "array_shift" => " Retira o primeiro elemento de um array",
            "array_slice" => " Extrai uma parcela de um array",
            "array_splice" => " Remove uma parcela do array e substitui com outros elementos",
            "array_sum" => " Calcula a soma dos elementos de um array",
            "array_udiff" => " Computa a diferença de arrays usando uma função de callback para ,comparação dos dados",
            "array_udiff_assoc" => " Computa a diferença entre arrays com checagem adicional de índice, ,compara dados por uma função de callback",
            "array_udiff_uassoc" => " Computa a diferença entre arrays com checagem adicional de índice, ,compara dados e índices por uma função de callback",
            "array_uintersect" => " Computa a interseção de array, comparando dados com uma função ,callback",
            "array_uintersect_assoc" => " Computa a interseção de arrays com checagem adicional de ,índice, compara os dados utilizando uma função de callback",
            "array_uintersect_uassoc" => " Computa a interseção de arrays com checagem adicional de ,índice, compara os dados e os índices utilizando funções de callback separadas",
            "array_unique" => " Remove o valores duplicados de um array",
            "array_unshift" => " Adiciona um ou mais elementos no início de um array",
            "array_values" => " Retorna todos os valores de um array",
            "array_walk" => " Aplica uma determinada funcão em cada elemento de um array",
            "array_walk_recursive" => " Aplica um função do usuário recursivamente para cada membro de um "
        );
    }
}
