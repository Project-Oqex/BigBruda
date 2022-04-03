<?php

namespace Oqex\BigBruda\network\outbound;

use pocketmine\network\mcpe\protocol\AddActorPacket;

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

    public static function toJava(AddActorPacket $packet, int $xpValue): self
    {
        $pk = new self();

        $pk->entityID = $packet->actorRuntimeId;
        $pk->x = $packet->position->x;
        $pk->y = $packet->position->y;
        $pk->z = $packet->position->z;
        $pk->count = $xpValue; // TODO: This should work?

        return $pk;
    }
}