<?php
require 'config.php';
require '../vendor/autoload.php';
include '../utilitaire/time.php';

use Firebase\JWT\JWT;
use Firebase\JWT\Key;

class LikeModel 
{
    private $db;
    public function __construct($db) 
    {
        $this->db = $db;
    }

   public function creationLike($liked, $like_on, $entite_id, $user_id)
   {
        try 
        {
            $q = $this->db->prepare("SELECT * FROM `like` WHERE like_on = :like_on AND entite_id = :entite_id AND user_id = :user_id");
            $q->execute([
                'like_on' => $like_on,
                'entite_id' => $entite_id,
                'user_id' => $user_id
            ]);
            $result = $this->db->fetchAll();

            if (count($result) == 0 )
            {
                $q = $this->db->prepare("INSERT INTO `like` (liked, like_on, entite_id, user_id) VALUES(:liked, :like_on, :entite_id, :user_id)");
                $q->execute([
                    'liked' => $liked,
                    'like_on' => $like_on,
                    'entite_id' => $entite_id,
                    'user_id' => $user_id
                ]);
            }
            else if (count($result) > 0 && $result[0]['liked'] == $liked)
            {
                $q = $this->db->prepare("DELETE FROM `like` WHERE id = :id");
                $q->execute([
                    'id' => $result[0]['id']
                ]);
            }
            else if (count($result) > 0 && $result[0]['liked'] != $liked)
            {
                $q = $this->db->prepare("UPDATE `like` SET liked= :liked WHERE id = :id");
                $q->execute([
                    'id' => $result[0]['id'],
                    'liked' => !$result[0]['liked']
                ]);
            }
        } catch (PDOException $e) {
            return $e->getMessage(); // En production, il serait mieux de ne pas montrer les messages d'erreur de PDO directement
        }
    }

    public function getLikeCountByEntiteId($like_on, $entite_id)
    {
        $q = $this->db->prepare("SELECT * FROM `like` WHERE liked = true AND like_on = :like_on AND entite_id = :entite_id");
        $q->execute([
            'like_on' => $like_on,
            'entite_id' => $entite_id
        ]);
        $likeCount = $this->db->fetchAll();

        $q = $this->db->prepare("SELECT * FROM `like` WHERE liked = false AND like_on = :like_on AND entite_id = :entite_id");
        $q->execute([
            'like_on' => $like_on,
            'entite_id' => $entite_id
        ]);
        $dislikeCount = $this->db->fetchAll();

        return array('like' => $likeCount, 'dislike' => $dislikeCount);
    }
}
?>