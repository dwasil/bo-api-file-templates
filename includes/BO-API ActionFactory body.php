use Laminas\Hydrator\ReflectionHydrator;
use Psr\Container\ContainerInterface;
use ${MODULE}\Application\Service\\${NAME}Service;
use ${MODULE}\Application\Service\\${NAME}Action;

final class ${NAME}ActionFactory;
{
    public function __invoke(ContainerInterface  ${DS}container): ${NAME}Action
    {
        ${DS}hydrator = new ReflectionHydrator();

        return new ${NAME}Action(
             ${DS}container->get(${NAME}Service::class),
             ${DS}hydrator
        );
    }
}