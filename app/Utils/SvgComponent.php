<?php


namespace App\Utils;


use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Str;
use Illuminate\View\Component;

final class SvgComponent extends Component
{
    /**
     * @var Filesystem
     */
    protected $filesystem;

    /**
     * SvgComponent constructor.
     * @param Filesystem $filesystem
     */
    public function __construct(Filesystem $filesystem)
    {
        $this->filesystem = $filesystem;
    }


    /**
     * @return \Closure|\Illuminate\Contracts\Support\Htmlable|\Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return function (array $data) {
            $body = $this->getSvgContent($this->componentName);
            return str_replace(
                '<svg',
                sprintf('<svg %s', $this->attributes),
                $body
            );
        };
    }

    /**
     * @param $name
     * @throws \Illuminate\Contracts\Filesystem\FileNotFoundException
     */
    private function getSvgContent($name)
    {
        $res = Cache::tags('icon')->get($name);
        if(!$res) {
            $name = Str::replaceFirst(config('wdcms.icon.prefix').'-', '', $name);
            $res = trim($this->filesystem->get(sprintf(
                '%s/%s.svg',
                rtrim(config('wdcms.icon.path')),
                str_replace('.', '/', $name)
            )));
            Cache::tags('icon')->put($name, $res, config('wdcms.icon.expired_time'));
        }
        return $res;
    }
}
