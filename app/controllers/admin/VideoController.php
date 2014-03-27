<?php
/**
 * Created by PhpStorm.
 * User: bhoo
 * Date: 2/12/14
 * Time: 1:23 PM
 */

namespace Unic\Controllers\Admin;
use Phalcon\Mvc\Controller,
    Phalcon\Mvc\View,
    Unic\Models\CourseSpec;
use Unic\Models\Videos;


class VideoController extends ControllerBase
    {

    /* Dynamically create player script with secure token
     *
     * @param video_id
     **/
        public function playerScript()
        {
            // TODO create secure token dynamically instead of static
            if($this->request->isPost())
            {
                $video_id=$this->request->getPost('video_id');
                $video=Videos::findFirst($video_id)->toArray();
                $filename=$video->name;

                echo '<script type="text/javascript">jwplayer("video-body").setup({',
                     'file: "'.$filename.'",',
                     'height: 300,
                        width: 550,
                        rtmp: {
                            securetoken: "d18bfcb0aa2416d5"
                        }
                    });';

                $this->view->disable();
            }
        }
    }