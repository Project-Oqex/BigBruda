<?php

namespace Oqex\BigBruda\network\outbound;

class PlayerPositionAndLook extends OutboundJavaPacket {
    public float $x;
    public float $y;
    public float $z;
    public float $yaw;
    public float $pitch;
    public int $flags = 0;
    public int $teleportId = 0;
    public bool $dismountVehicle = false;

    public function pid(): int
    {
        return self::PLAYER_POSITION_LOOK;
    }

    protected function encode(): void
    {
        $this->putDouble($this->x);
        $this->putDouble($this->y);
        $this->putDouble($this->z);
        $this->putFloat($this->yaw);
        $this->putFloat($this->pitch);
        $this->putByte($this->flags);
        $this->putVarInt($this->teleportId);
        $this->putBool($this->dismountVehicle);
    }
}