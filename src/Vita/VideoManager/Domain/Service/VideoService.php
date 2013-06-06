<?php
/**
 * Package: videos-manager
 * User: viniciusdesa
 * Date: 28/05/13
 * Time: 19:08
 */

namespace Vita\VideoManager\Domain\Service;
use Vimeo\Vimeo;
use Vimeo\VimeoAPIException;
use Vita\VideoManager\Domain\Repository\VideoRepository;
use Silex\Application;
use Symfony\Component\HttpFoundation\File\UploadedFile;


class VideoService extends AbstractService {

    /**
     * @var VideoRepository
     */
    protected $repository;

    public function __construct(Application $app, VideoRepository $repository)
    {
        parent::__construct($app, $repository);
    }

    /**
     * Retorna a lista de videos
     * @return array
     */
    public function getAll()
    {
        return iterator_to_array($this->repository->findAll());
    }

    public function getVideoData($videoId)
    {
        return $this->repository->findOne($videoId);
    }

    public function uploadVideo($title, $description, UploadedFile $file)
    {
        $vimeo = $this->app['vimeo'];

        $video_id = $vimeo->upload($file->getRealPath());
        $vimeo->call('vimeo.videos.setTitle', array('title' => $title, 'video_id' => $video_id));
        $vimeo->call('vimeo.videos.setDescription', array('description' => $description, 'video_id' => $video_id));

        $this->repository->save(array(
            'user' => $this->app['auth.user'],
            'title' => $title,
            'description' => $description,
            'video_id' => $video_id,
        ));
    }

}