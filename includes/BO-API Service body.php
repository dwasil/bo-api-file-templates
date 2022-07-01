use ${MODULE}\Application\Service\\${NAME}Repository;
use ${MODULE}\Application\Service\\${NAME}Dto;

final class ${NAME}Service
{
    public function __construct(
        private ${NAME}Repository ${DS}repository 
    ) {
    }

    public function find(int ${DC}id): ${NAME}Dto
    {
        return $this->repository->find(${DC}id);
    }
}