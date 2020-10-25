<?php

namespace Binay7587\LaravelFilemanager\Middlewares;

use Closure;
use Binay7587\LaravelFilemanager\Lfm;
use Binay7587\LaravelFilemanager\LfmPath;

class CreateDefaultFolder
{
    private $lfm;
    private $helper;

    public function __construct()
    {
        $this->lfm = app(LfmPath::class);
        $this->helper = app(Lfm::class);
    }

    public function handle($request, Closure $next)
    {
        $this->checkDefaultFolderExists('user');
        $this->checkDefaultFolderExists('share');

        return $next($request);
    }

    private function checkDefaultFolderExists($type = 'share')
    {
        if (! $this->helper->allowFolderType($type)) {
            return;
        }

        $this->lfm->dir($this->helper->getRootFolder($type))->createFolder();
    }
}
