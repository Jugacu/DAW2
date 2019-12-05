<?php

require_once __DIR__ . '../../Repositorio/NewsRepo.php';
require_once __DIR__ . '../../Modelo/Notice.php';

class newsController
{
    public function showNews()
    {

        try {
            $repo = new NewsRepo();
            $news = $repo->getNews();

            $data = [];
            foreach ($news as $row) {
                $notice = new Notice($row['id'], $row['titulo'], $row['desc']);
                array_push($data, $notice);
            }
        } catch (PDOException $e) { }

        require __DIR__ . '/../../app/plantillas/viewNotices.php';
    }

    public function modifyNews(Notice $act)
    {

        $notice = $act;


        if (isset($_POST['modNot'])) {
            try {
                $newnotice = new Notice($notice->getId(), $_POST['not']['title'], $_POST['not']['descr']);
                $repo = new NewsRepo();
                $repo->editNew($newnotice);
                $notice = $newnotice;
            } catch (PDOException $e) {
                var_dump($e);

             }
        }


        require __DIR__ . '/../../app/plantillas/modifyNotice.php';
    }
}
