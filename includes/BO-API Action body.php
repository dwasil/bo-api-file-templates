#set( $routeName = ${MODULE} + '.' + ${NAME} + '.fetch' )
#set( $route = '/' + ${MODULE} + '/' + ${NAME} + '/fetch' )
use Application\Interfaces\Controller\ActionInterface;
use Laminas\ApiTools\ApiProblem\ApiProblem;
use Laminas\ApiTools\ApiProblem\ApiProblemResponse;
use Laminas\Diactoros\Response\JsonResponse;
use Laminas\Hydrator\HydratorInterface;
use Laminas\Mvc\Controller\AbstractActionController;
use Laminas\Http\Response;
use Laminas\Psr7Bridge\Psr7Response;
use Throwable;
use ${MODULE}\Application\Service\\${NAME}Service;
use ${MODULE}\Domain\Dto\\${NAME}Dto;

/*
    Add to module.config.php
    
    'controllers' => [
        'factories' => [
            ${NAME}Action::class => ${NAME}ActionFactory::class,
        ],
    ],
    
    Add to router.config.php
    
    'routes' => [
        '$routeName.toLowerCase()' => [
            'type' => Literal::class,
            'options' => [
                'route' => '$route.toLowerCase()',
                'defaults' => [
                    'action' => 'handle',
                ],
            ],
            'may_terminate' => false,
            'child_routes' => [
                'find' => [
                    'type' => Method::class,
                    'options' => [
                        'verb' => RequestMethodInterface::METHOD_GET,
                        'defaults' => [
                            'controller' => ${NAME}Action::class,
                        ],
                    ],
                ],
            ],
        ],
    ],    
*/

final class ${NAME}Action extends AbstractActionController implements ActionInterface
{
    public function __construct(
        private ${NAME}Service ${DS}service,
        private HydratorInterface ${DS}hydrator 
    ) {
    }

    public function handleAction(): Response
    {
       ${DS}id = (int) ${DS}this->params()->fromQuery('id');

        if (${DS}id <= 0) {
            return new ApiProblemResponse(
                new ApiProblem(400, 'id')
            );
        }

        try {
            ${DS}result = ${DS}this->service->fetch(${DS}id);
        } catch (Throwable ${DS}exception) {
            return new ApiProblemResponse(
                new ApiProblem(500, ${DS}exception->getMessage())
            );
        }

        return Psr7Response::toLaminas(
            new JsonResponse(
                array_map(
                    function (${NAME}Dto ${DS}dto): array {
                        return ${DS}this->hydrator->extract(${DS}dto);
                    },
                    ${DS}result
                )
            )
        );
    }
}