<?php

namespace Oqex\BigBruda\network\inbound;


class LoginStart extends InboundJavaPacket {
    public string $name;

    public function pid(): int
    {
        return self::LOGIN_START;
    }

    protected function decode(): void
    {

        $this->name = $this->getString();
    }
}