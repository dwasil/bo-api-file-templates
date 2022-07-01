use Doctrine\ORM\EntityRepository;
use ${MODULE}\Domain\Model\\${NAME};

class ${NAME}Repository extends EntityRepository
{
    public function find(int ${DC}id): ?${NAME}
    {
        return ${DC}this->findOneBy(
            ['id' => ${DC}id]
        );
    }
}
