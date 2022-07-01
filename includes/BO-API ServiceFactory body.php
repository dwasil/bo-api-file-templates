use Psr\Container\ContainerInterface;
use ${MODULE}\Application\Service\\${NAME}Service;
use ${MODULE}\Infrastructire\Repository\\${NAME}Repository;

final class ${NAME}ServiceFactory;
{
    public function __invoke(ContainerInterface  ${DS}container): ${NAME}Service
    {
        return new ${NAME}Service(
             ${DS}container->get(${NAME}Repository::class)
        );
    }
}