<?php

namespace APP\Model;

class persona {
    private string $persona_nick;
    private string $persona_class;
    private int $ap;
    private int $ad;
    private int $rl;
    private int $def;
    private int $hp;
    private string $user;

    public function __construct(
        string $persona_nick,
        string $persona_class,
        int $ap,
        int $ad,
        int $rl,
        int $def,
        string $user,
        int $hp = 100,
    ) {
        $this->persona_nick = $persona_nick;
        $this->persona_class = $persona_class;
        $this->ap = $ap;
        $this->ad = $ad;
        $this->rl = $rl;
        $this->def = $def;
        $this->hp = $hp;
        $this->user = $user;
    }

    public function __get($name){return $this->$name;}
}