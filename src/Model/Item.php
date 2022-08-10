<?php

namespace APP\Model;

class Item {
    private int $item_code;
    private string $item_name;
    private int $ap;
    private int $ad;
    private int $rl;
    private int $def;
    private int $cost;

    public function __construct(
        string $item_name,
        int $ap,
        int $ad,
        int $rl,
        int $def,
        int $item_code = 0,
    ) {
        $this->item_code = $item_code;
        $this->item_name = $item_name;
        $this->item_ap = $ap;
        $this->item_ad = $ad;
        $this->item_rl = $rl;
        $this->item_def = $def;

        // preço do item
        self::precoitem(
            ap: $ap,
            ad: $ad,
            rl: $rl,
            def: $def
        );
    }

    private function precoitem(int $ap, int $ad, int $rl, int $def): void
    {
        $this->cost = $ad + $ap*($rl+1) + 3*$def;
    }
}