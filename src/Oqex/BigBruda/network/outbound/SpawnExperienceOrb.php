<?php

namespace Oqex\BigBruda\network\outbound;

/**
 * Class SpawnExperienceOrb
 * @package Oqex\BigBruda\network\outbound
 *
 * Play, Client: Spawns one or more experience orbs.
 */
class SpawnExperienceOrb extends OutboundJavaPacket {
    public int $entityID;
    public float $x;
    public float $y;
    public float $z;
    public int $count;

    public function pid() : int{
        return self::SPAWN_EXPERIENCE_ORB;
    }

    protected function encode() : void{
        $this->putVarInt($this->eid);
        $this->putDouble($this->x);
        $this->putDouble($this->y);
        $this->putDouble($this->z);
        $this->putShort($this->count);
    }
}