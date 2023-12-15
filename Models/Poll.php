<?php

namespace Models;

require 'connection.php';

class Poll
{
    public $id;
    public $title;
    public $category;
    public $end_date;
    public $user_id;
    public $time_created;
    public $time_updated;

    public $options;

    public static function All($category = null) {
        global $db;
        if ($category != null)
            return $db->query('SELECT * FROM polls WHERE category LIKE "' . $category . '"')->fetchAll(\PDO::FETCH_CLASS, self::class);
        else
            return $db->query('SELECT * FROM polls')->fetchAll(\PDO::FETCH_CLASS, self::class);
    }

    public function create() {
        global $db;
        try {
            $db->beginTransaction();
            $query = $db->prepare('INSERT INTO polls (title, category, end_date, user_id) VALUES (:title, :category, :end_date, :user_id)');
            $query->execute([
                'title' => $this->title,
                'category' => $this->category,
                'end_date' => $this->end_date ? : null,
                'user_id' => $this->user_id,
            ]);
            $this->id = $db->lastInsertId();
            $query = $db->prepare('INSERT INTO options (option_text, poll_id) VALUES (:option_text, :poll_id)');
            foreach ($this->options as $option) {
                $query->execute([
                    'option_text' => $option,
                    'poll_id' => $this->id,
                ]);
            }
            $db->commit();
            return true;
        } catch (\PDOException $e) {
            $db->rollBack();
            return false;
        }
    }

    public function end() {
        global $db;
        $query = $db->prepare('UPDATE polls SET end_date = :end_date WHERE id = :id');
        $query->execute([
            'id' => $this->id,
            'end_date' => date('Y-m-d H:i:s'),
        ]);
        return $query->rowCount() == 1;
    }

    public static function find($id) {
        global $db;
        return $db->query('SELECT * FROM polls WHERE id = ' . $id)->fetchObject(self::class);
    }

    public function user() {
        global $db;
        return $db->query('SELECT * FROM users WHERE id = ' . $this->user_id)->fetchObject(User::class);
    }

    public function options() {
        global $db;
        return $db->query('SELECT * FROM options WHERE poll_id = ' . $this->id)->fetchAll(\PDO::FETCH_CLASS, Option::class);
    }

    public function votes() {
        global $db;
        return $db->query('SELECT * FROM votes WHERE poll_id = ' . $this->id)->rowCount();
    }

    public static function categories() {
        global $db;
        return $db->query('SELECT DISTINCT category FROM polls')->fetchAll(\PDO::FETCH_COLUMN);
    }
}