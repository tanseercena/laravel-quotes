<?php

namespace Tanseercena\Quotes\Commands;

use Illuminate\Console\Command;
use Tanseercena\Quotes\Quotes;

class QuotesCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'quotes';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This command show quotes.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $quotes = new Quotes();
        $quote = $quotes->getQuotes();
        
        if(!$quote){
          $this->error("Can't find any quote.");
          return;
        }

        $this->line($quote['content']);
        $this->info("By: ".$quote['author']);

    }
}
