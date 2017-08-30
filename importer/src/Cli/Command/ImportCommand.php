<?php

namespace Zrcms\Importer\Cli\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Zrcms\Importer\Api\Import;
use Zrcms\Importer\Logger\CallbackLogger;

/**
 * @author James Jervis - https://github.com/jerv13
 */
class ImportCommand extends Command
{
    /**
     * @var Import
     */
    protected $import;

    /**
     * @param Import $import
     */
    public function __construct(
        Import $import
    ) {
        $this->import = $import;

        parent::__construct(
            null
        );
    }

    /**
     * @return void
     */
    protected function configure()
    {
        $this
            // the name of the command (the part after "bin/console")
            ->setName('zrcms:import')
            // the short description shown while running "php bin/console list"
            ->setDescription('Imports data to ZRCMS.')
            ->addOption(
                'file',
                null,
                InputOption::VALUE_REQUIRED,
                'JSON file to import'
            )
            // the full command description shown when running the command with
            // the "--help" option
            ->setHelp('Example: zrcms:import --file data.json');
    }

    /**
     * @param InputInterface $input
     * @param OutputInterface $output
     *
     * @return void
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $file = $input->getOption('file');

        $createdByUserId = 'cli-import';
        $file = realpath($file);

        if (!file_exists($file)) {
            $output->writeln('File to import not found ' . $file);

            return;
        }

        $contents = file_get_contents($file);

        $logger = new CallbackLogger(function ($message) use ($output) {
            $output->writeln($message);
        });

        $this->import->__invoke(
            $contents,
            $createdByUserId,
            [Import::OPTIONS_LOGGER => $logger]
        );

        $output->writeln('COMPLETE');
    }
}
