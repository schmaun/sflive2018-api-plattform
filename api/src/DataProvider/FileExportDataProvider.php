<?php

namespace App\DataProvider;

use ApiPlatform\Core\DataProvider\CollectionDataProviderInterface;
use ApiPlatform\Core\DataProvider\ItemDataProviderInterface;
use ApiPlatform\Core\DataProvider\RestrictedDataProviderInterface;
use ApiPlatform\Core\Exception\ResourceClassNotSupportedException;
use App\Dto\FileExport;
use App\Entity\Author;
use App\Entity\Book;

class FileExportDataProvider implements CollectionDataProviderInterface, RestrictedDataProviderInterface
{

    public function supports(string $resourceClass, string $operationName = null, array $context = []): bool
    {
        return $resourceClass === FileExport::class;
    }

    /**
     * Retrieves a collection.
     *
     * @throws ResourceClassNotSupportedException
     *
     * @return array|\Traversable
     */
    public function getCollection(string $resourceClass, string $operationName = null)
    {
        $book = new Book();
        $book->setTitle('foo');
        $book->setDescription('barbarbar');
        $author = new Author();
        $author->setName('baz');
        $book->setAuthor($author);

        $collection = [$book];
        return $collection;
    }
}