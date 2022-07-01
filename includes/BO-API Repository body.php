use Doctrine\ORM\EntityRepository;
use ${MODULE}\Domain\Model\\${NAME};

class ${NAME}Repository extends EntityRepository
{
    public function find(int ${DS}id): ?${NAME}
    {
        return ${DS}this->findOneBy(
            ['id' => ${DS}id]
        );
    }
}
