<?php

namespace Boye\Repositories;

use Boye\Services\IP;
use Boye\Visitor;

class VisitorRepository
{
    use BaseRepository;

    /**
     * @var $model
     */
    protected $model;

    /**
     * @var IP
     */
    protected $ip;

    /**
     * VisitorRepository constructor.
     * @param Visitor $visitor
     * @param IP $ip
     */
    public function __construct(Visitor $visitor, IP $ip)
    {
        $this->model = $visitor->with('post');

        $this->ip = $ip;
    }

    public function log($post_id)
    {
        $ip = $this->ip->get();

        if ($this->hasPostIp($post_id, $ip)) {

            $this->model->where('post_id', $post_id)
                        ->where('ip', $ip)
                        ->increment('clicks');

        } else {
            $data = [
                'ip'		    => $ip,
                'post_id'    => $post_id,
                'clicks' 	    => 1
            ];
            $this->model->firstOrCreate( $data );
        }
    }

    
    public function hasPostIp($post_id, $ip)
    {
        return $this->model
                    ->where('post_id', $post_id)
                    ->where('ip', $ip)
                    ->count() ? true : false;
    }

    /**
     * Get all the clicks.
     * 
     * @return int
     */
    public function getAllClicks()
    {
        return $this->model->sum('clicks');
    }

}
