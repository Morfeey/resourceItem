<?php

namespace App\Bundles\ResourceItemBundle\Ui\Console;

use App\Bundles\ResourceItemBundle\Infrastructure\Parser\Bus\ResourceItemParserBusInterface as ResourceItemParserInterface;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Helper\ProgressBar;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

#[AsCommand(
    name: 'command:resource_item:parse',
    description: 'Resource item parser. Default by game files',
    aliases: ['crip', 'resource:parse'],
    hidden: false
)]
class ResourceItemParserCommand extends Command
{
    public function __construct(protected readonly ResourceItemParserInterface $parser)
    {
        parent::__construct($this->getName());
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $handler = $this->parser->createHandlerByType();
        $progress = new ProgressBar($output, $handler->getCount());
        $progress->start();
        foreach ($handler->collectionGenerator() as $isParsed) {
            if ($isParsed) {
                $progress->advance();
            }
        }

        return Command::SUCCESS;
    }
}