<?php

namespace Models;
class Option
{
    public $id;
    public $option_text;
    public $poll_id;

    public function votes() {
        global $db;
        return $db->query('SELECT * FROM votes WHERE option_id = ' . $this->id)->rowCount();
    }

    public function poll() {
        global $db;
        return $db->query('SELECT * FROM polls WHERE id = ' . $this->poll_id)->fetchObject(Poll::class);
    }
}