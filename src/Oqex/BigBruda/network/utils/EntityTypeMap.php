<?php

namespace Oqex\BigBruda\network\utils;

use pocketmine\network\mcpe\protocol\AddActorPacket;
use pocketmine\network\mcpe\protocol\types\entity\EntityIds;

class EntityTypeMap
{
    const LIVING_MAP = [
        EntityIds::ARMOR_STAND => 1,
        // TODO: Axolotl,
        EntityIds::BAT => 4,
        EntityIds::BEE => 5,
        EntityIds::BLAZE => 6,
        EntityIds::CAT => 8,
        EntityIds::CAVE_SPIDER => 9,
        EntityIds::CHICKEN => 10,
        EntityIds::COD => 11,
        EntityIds::COW => 12,
        EntityIds::CREEPER => 13,
        EntityIds::DOLPHIN => 14,
        EntityIds::DONKEY => 15,
        EntityIds::DROWNED => 17,
        EntityIds::ELDER_GUARDIAN => 18,
        EntityIds::ENDER_DRAGON => 20,
        EntityIds::ENDERMAN => 21,
        EntityIds::ENDERMITE => 22,
        EntityIds::EVOCATION_ILLAGER => 23,
        EntityIds::FOX => 29,
        EntityIds::GHAST => 30,
        // TODO: Giant ?
        // TODO: Glow Squid?
        // TODO: Goat?,
        EntityIds::GUARDIAN => 35,
        EntityIds::HOGLIN => 36,
        EntityIds::HORSE => 37,
        EntityIds::HUSK => 38,
        // TODO: Illusioner,
        EntityIds::IRON_GOLEM => 40,
        EntityIds::LLAMA => 46,
        EntityIds::MAGMA_CUBE => 48,
        EntityIds::MULE => 57,
        EntityIds::MOOSHROOM => 58,
        EntityIds::OCELOT => 59,
        EntityIds::PANDA => 61,
        EntityIds::PARROT => 62,
        EntityIds::PHANTOM => 63,
        EntityIds::PIG => 64,
        EntityIds::PIGLIN => 65,
        // TODO: Piglin Brute
        EntityIds::PILLAGER => 67,
        EntityIds::POLAR_BEAR => 68,
        EntityIds::PUFFERFISH => 70,
        EntityIds::RABBIT => 71,
        EntityIds::RAVAGER => 72,
        EntityIds::SALMON => 73,
        EntityIds::SHEEP => 74,
        EntityIds::SHULKER => 75,
        EntityIds::SILVERFISH => 77,
        EntityIds::SKELETON => 78,
        EntityIds::SKELETON_HORSE => 79,
        EntityIds::SLIME => 80,
        EntityIds::SNOW_GOLEM => 82,
        EntityIds::SPIDER => 85,
        EntityIds::SQUID => 86,
        EntityIds::STRAY => 87,
        EntityIds::STRIDER => 88,
        // TODO: Trader Llama
        EntityIds::TROPICALFISH => 95,
        EntityIds::TURTLE => 96,
        EntityIds::VEX => 97,
        EntityIds::VILLAGER => 98,
        EntityIds::VINDICATOR => 99,
        EntityIds::WANDERING_TRADER => 100,
        EntityIds::WITCH => 101,
        EntityIds::WITHER => 102,
        EntityIds::WITHER_SKELETON => 103,
        EntityIds::WOLF => 105,
        EntityIds::ZOGLIN => 106,
        EntityIds::ZOMBIE => 107,
        EntityIds::ZOMBIE_HORSE => 108,
        EntityIds::ZOMBIE_VILLAGER => 109,
        EntityIds::ZOMBIE_PIGMAN => 110,
    ];

    const OBJECT_MAP = [
        EntityIds::AREA_EFFECT_CLOUD => 0,
        EntityIds::ARROW => 2,
        EntityIds::BOAT => 7,
        EntityIds::DRAGON_FIREBALL => 16,
        EntityIds::ENDER_CRYSTAL => 19,
        EntityIds::EVOCATION_FANG => 24,
        EntityIds::XP_ORB => 25,
        EntityIds::EYE_OF_ENDER_SIGNAL => 26,
        EntityIds::FALLING_BLOCK => 27,
        // TODO: Glow Item Frame?
        EntityIds::ITEM => 41,
        // TODO: Item Fram?
        EntityIds::FIREBALL => 43,
        EntityIds::LEASH_KNOT => 44,
        EntityIds::LIGHTNING_BOLT => 45,
        EntityIds::LLAMA_SPIT => 47,
        // TODO: Marker?
        EntityIds::MINECART => 50,
        EntityIds::CHEST_MINECART => 51,
        EntityIds::COMMAND_BLOCK_MINECART => 52,
        // TODO: Furnace Minecart?
        EntityIds::HOPPER_MINECART => 54,
        // TODO: Spawner Minecart?
        EntityIds::TNT_MINECART => 56,
        EntityIds::PAINTING => 60,
        EntityIds::TNT => 69,
        EntityIds::SHULKER_BULLET => 76,
        EntityIds::SMALL_FIREBALL => 81,
        EntityIds::SNOWBALL => 83,
        // TODO: Spectral Arrow
        EntityIds::EGG => 89,
        EntityIds::ENDER_PEARL => 90,
        EntityIds::XP_BOTTLE => 91,
        EntityIds::SPLASH_POTION => 92,
        EntityIds::THROWN_TRIDENT => 93,
        EntityIds::WITHER_SKULL => 104,
        EntityIds::PLAYER => 111,
        EntityIds::FISHING_HOOK => 112
    ];

    public static function isLiving(string $type): bool
    {
        $existing = self::LIVING_MAP[$type] ?? null;
        if ($existing === null) return false;
        return true;
    }

    public static function isObject(string $type): bool
    {
        $existing = self::OBJECT_MAP[$type] ?? null;
        if ($existing === null) return false;
        return true;
    }

    public static function getJavaTypeID(string $type, bool $object = false): ?int
    {
        if (!$object) $data = self::LIVING_MAP[$type] ?? null;
        else $data = self::OBJECT_MAP[$type] ?? null;

        if ($data === null) return null;

        if (is_array($data)) return $data[0];
        return $data;
    }

    public static function getJavaTypeName(string $type): ?string
    {
        $data = self::LIVING_MAP[$type] ?? null;
        if ($data === null) return null;

        return $data[1];
    }

    public static function getData(AddActorPacket $packet, string $type): int
    {
        switch ($type) {
            case EntityIds::FALLING_BLOCK:
                $block = $packet->metadata[2][1];
                $blockId = $block & 0xff;
                $blockDamage = $block >> 8;

                IdMap::convertBlockData(true, $blockId, $blockDamage);
                return $blockId | ($blockDamage << 12);
        }
        return 0;
    }

}