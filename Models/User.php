<?php

namespace Models;

require 'connection.php';

class User
{
    public $id;
    public $name;
    public $email;
    public $password;
    public $is_admin;
    public $time_created;
    public $time_updated;

    public static function All() {
        global $db;
        return $db->query('SELECT * FROM users WHERE is_admin IS NULL')->fetchAll(\PDO::FETCH_CLASS, self::class);
    }

    public function create() {
        global $db;
        $query = $db->prepare('INSERT INTO users (name, email, password) VALUES (:name, :email, :password)');
        $query->execute([
            'name' => $this->name,
            'email' => $this->email,
            'password' => password_hash($this->password, PASSWORD_DEFAULT),
        ]);
        return $query->rowCount() == 1;
    }

    public function update() {
        global $db;
        $query = $db->prepare('UPDATE users SET name = :name, email = :email, password = :password WHERE id = :id');
        $query->execute([
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
            'password' => password_hash($this->password, PASSWORD_DEFAULT),
        ]);
        return $query->rowCount() == 1;
    }

    public function refresh() {
        global $db;
        $query = $db->prepare('SELECT * FROM users WHERE id = :id');
        $query->execute([
            'id' => $this->id,
        ]);
        $user = $query->fetchObject(self::class);
        $this->name = $user->name;
        $this->email = $user->email;
        $this->password = $user->password;
        $this->is_admin = $user->is_admin;
        $this->time_created = $user->time_created;
        $this->time_updated = $user->time_updated;
    }

    public function delete() {
        global $db;
        $query = $db->prepare('DELETE FROM users WHERE id = :id');
        $query->execute([
            'id' => $this->id,
        ]);
        return $query->rowCount() == 1;
    }

    public static function find($id) {
        global $db;
        return $db->query('SELECT * FROM users WHERE id = ' . $id)->fetchObject(self::class);
    }

    public static function findByEmail($email)
    {
        global $db;
        return $db->query('SELECT * FROM users WHERE email LIKE "' . trim($email) . '"')->fetchObject(self::class);
    }

    public function polls() {
        global $db;
        return $db->query('SELECT * FROM polls WHERE user_id = ' . $this->id)->fetchAll(\PDO::FETCH_CLASS, Poll::class);
    }

    public function votedPolls() {
        global $db;
        return $db->query('SELECT * FROM polls WHERE id IN (SELECT poll_id FROM votes WHERE user_id = ' . $this->id . ')')->fetchAll(\PDO::FETCH_CLASS, Poll::class);
    }

    public static function emailExists($email) {
        global $db;
        return $db->query('SELECT * FROM users WHERE email LIKE "' . $email . '"')->rowCount() == 1;
    }

    public static function login($email, $password) {
        global $db;
        $query = $db->prepare('SELECT * FROM users WHERE email = :email AND password = :password');
        $query->execute([
            'email' => $email,
            'password' => hash('sha256', $password),
        ]);
        return $query->rowCount() == 1 ? $query->fetchObject(self::class) : false;
    }

    public function isAdmin() {
        return $this->is_admin == 1;
    }

    public function getVote($poll_id) {
        global $db;
        return $db->query('SELECT * FROM options WHERE id IN (SELECT option_id FROM votes WHERE user_id = ' . $this->id . ' AND poll_id = ' . $poll_id . ')')->fetchObject(Option::class);
    }

    public function voted($poll_id) {
        global $db;
        return $db->query('SELECT * FROM votes WHERE user_id = ' . $this->id . ' AND poll_id = ' . $poll_id)->rowCount() == 1;
    }

    public function vote($poll_id, $option_id) {
        global $db;
        $query = $db->prepare('INSERT INTO votes (user_id, poll_id, option_id) VALUES (:user_id, :poll_id, :option_id)');
        $query->execute([
            'user_id' => $this->id,
            'poll_id' => $poll_id,
            'option_id' => $option_id,
        ]);
        return $query->rowCount() == 1;
    }
}