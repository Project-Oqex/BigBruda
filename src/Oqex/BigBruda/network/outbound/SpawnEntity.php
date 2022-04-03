<?php

namespace Oqex\BigBruda\network\outbound;


use Oqex\BigBruda\network\utils\EntityTypeMap;
use Oqex\BigBruda\network\utils\JavaUUID;
use pocketmine\network\mcpe\protocol\AddActorPacket;

/**
 * Class SpawnEntityPacket
 * @package Oqex\BigBruda\network\outbound
 *
 * Play, Client: Sent by the server when a vehicle or other non-living entity is created.
 */
class SpawnEntity extends OutboundJavaPacket {
    public int $entityID;
    public string $objectUUID;
    public int $type;
    public float $x;
    public float $y;
    public float $z;
    public float $pitch;
    public float $yaw;
    public int $data = 0;
    public bool $sendVelocity = false;
    public float $velocityX;
    public float $velocityY;
    public float $velocityZ;

    public function pid() : int{
        return self::SPAWN_ENTITY;
    }

    protected function encode() : void{
        $this->putVarInt($this->entityID);
        $this->put($this->objectUUID);
        $this->putVarInt($this->type);
        $this->putDouble($this->x);
        $this->putDouble($this->y);
        $this->putDouble($this->z);
        $this->putAngle($this->pitch);
        $this->putAngle($this->yaw);
        $this->putInt($this->data);
        if($this->sendVelocity){
            $this->putShort((int) round($this->velocityX * 8000));
            $this->putShort((int) round($this->velocityY * 8000));
            $this->putShort((int) round($this->velocityZ * 8000));
        }
    }

    public static function toJava(AddActorPacket $packet, int $type): self
    {
        $pk = new SpawnEntity();
        $pk->entityID = $packet->actorRuntimeId;
        $pk->type = $type;
        $pk->objectUUID = JavaUUID::fromRandom()->toBinary();
        $pk->x = $packet->position->x;
        $pk->y = $packet->position->y;
        $pk->z = $packet->position->z;
        $pk->yaw = $packet->yaw;
        $pk->pitch = $packet->pitch;
        $pk->data = EntityTypeMap::getData($packet, $packet->type);
        if ($pk->data > 0) {
            $pk->sendVelocity = true;
            $pk->velocityX = 0;
            $pk->velocityY = 0;
            $pk->velocityZ = 0;
        }

        return $pk;
    }
}