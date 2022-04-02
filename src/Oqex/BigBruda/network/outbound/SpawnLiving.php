<?php

namespace Oqex\BigBruda\network\outbound;

class SpawnLiving extends OutboundJavaPacket {
    public int $entityID;
    public string $entityUUID;
    public int $type;
    public float $x;
    public float $y;
    public float $z;
    public float $pitch;
    public float $yaw;
    public float $headYaw;
    public bool $sendVelocity = false;
    public float $velocityX;
    public float $velocityY;
    public float $velocityZ;

    public function pid() : int{
        return self::SPAWN_LIVING;
    }

    protected function encode() : void{
        $this->putVarInt($this->entityID);
        $this->put($this->entityUUID);
        $this->putVarInt($this->type);
        $this->putDouble($this->x);
        $this->putDouble($this->y);
        $this->putDouble($this->z);
        $this->putAngle($this->yaw);
        $this->putAngle($this->pitch);
        $this->putAngle($this->headYaw);
        if($this->sendVelocity){
            $this->putShort((int) round($this->velocityX * 8000));
            $this->putShort((int) round($this->velocityY * 8000));
            $this->putShort((int) round($this->velocityZ * 8000));
        }
    }
}