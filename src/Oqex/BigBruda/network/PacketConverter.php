<?php

namespace Oqex\BigBruda\network;

use Oqex\BigBruda\network\outbound\PlayerPositionAndLook;
use Oqex\BigBruda\network\outbound\SpawnEntity;
use Oqex\BigBruda\network\outbound\SpawnExperienceOrb;
use Oqex\BigBruda\network\outbound\SpawnLiving;
use Oqex\BigBruda\network\utils\EntityTypeMap;
use Oqex\BigBruda\network\utils\JavaUUID;
use pocketmine\entity\object\ExperienceOrb;
use pocketmine\network\mcpe\protocol\AddActorPacket;
use pocketmine\network\mcpe\protocol\Packet;
use pocketmine\network\mcpe\protocol\PlayStatusPacket;
use pocketmine\network\mcpe\protocol\ProtocolInfo;
use pocketmine\network\mcpe\protocol\types\entity\EntityIds;
use pocketmine\player\Player;
use Ramsey\Uuid\Uuid;

class PacketConverter
{
    private static array $bedrockToJava;
    private static array $javaToBedrock;

    public static function init(): void
    {
        self::$bedrockToJava[ProtocolInfo::PLAY_STATUS_PACKET] = function (PlayStatusPacket $packet, ?Player $player): ?JavaPacket
        {
            if ($packet->status === PlayStatusPacket::PLAYER_SPAWN) {
                $pk = new PlayerPositionAndLook();

                if ($player === null) return null;

                $pos = $player->getLocation();
                $pk->x = $pos->getX();
                $pk->y = $pos->getY();
                $pk->z = $pos->getZ();
                $pk->yaw = $pos->getYaw();
                $pk->pitch = $pos->getPitch();
                // TODO: Flags, TeleportID, Dismount Vehicle ?

                return $pk;
            } return null;
        };

        self::$bedrockToJava[ProtocolInfo::ADD_ACTOR_PACKET] = function (AddActorPacket $packet, ?Player $player): null|JavaPacket|array
        {
            switch ($packet->type) {
                case EntityIds::XP_ORB:
                    if ($player === null) return null;
                    $entity = $player->getWorld()->getEntity($packet->actorRuntimeId);
                    if (!$entity instanceof ExperienceOrb) return null;

                    return SpawnExperienceOrb::toJava($packet, $entity->getXpValue());
            }

            $packets = [];
            if (EntityTypeMap::isObject($packet->type)) {
                $type = EntityTypeMap::getJavaTypeID($packet->type, true);
                if ($type === null) return null;

                $packets[] = SpawnEntity::toJava($packet, $type);
            }

            if (EntityTypeMap::isLiving($packet->type))  {
                $type = EntityTypeMap::getJavaTypeID($packet->type);
                if ($type === null) return null;

                $packets[] = SpawnLiving::toJava($packet, $type);
            }

            // TODO EntityMetadataPacket ?
            // TODO: EntityTeleportPacket
            // TODO: EntityList

            return $packets;
        };


    }

    public static function toJava(Packet $bedrockPacket, ?Player $player): ?JavaPacket
    {
        $func = self::$bedrockToJava[$bedrockPacket->pid()] ?? null;

        if ($func !== null) return $func($bedrockPacket, $player);
        return null;
    }

    public static function toBedrock(JavaPacket $javaPacket): ?Packet
    {
        $func = self::$javaToBedrock[$javaPacket->pid()] ?? null;

        if ($func !== null) return $func($javaPacket);
        return null;
    }
}
