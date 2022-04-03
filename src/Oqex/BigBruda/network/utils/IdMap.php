<?php

namespace Oqex\BigBruda\network\utils;

use pocketmine\block\BlockLegacyIds;

class IdMap
{
    const ID_LIST = [
        //************** ITEMS ***********//
        [[325,   8], [326,   0]], //Water bucket,
        [[325,  10], [327,   0]], //Lava bucket
        [[325,   1], [335,   0]], //Milk bucket
        [[450,   0], [449,   0]], //Totem of Undying
        [[444,   0], [443,   0]], //Elytra
        [[443,   0], [422,   0]], //Minecart with Command Block
        [[333,   1], [444,   0]], //Spruce Boat
        [[333,   2], [445,   0]], //Birch Boat
        [[333,   3], [446,   0]], //Jungle Boat
        [[333,   4], [447,   0]], //Acacia Boat
        [[333,   5], [448,   0]], //Dark Oak Boat
        [[445,   5], [448,   0]], //Dark Oak Boat
        [[445,   0], [450,   0]], //Shulker Shell
        [[125,  -1], [158,  -1]], //Dropper
        [[410,  -1], [154,  -1]], //Hopper
        [[425,  -1], [416,  -1]], //Armor Stand
        [[446,  -1], [425,  -1]], //Banner
        [[466,   0], [322,   1]], //Enchanted golden apple
        //************ Discs ***********//
        //NOTE: it's the real value, no joke
        [[500,   0], [2256,  0]],
        [[501,   0], [2257,  0]],
        [[502,   0], [2258,  0]],
        [[503,   0], [2258,  0]],
        [[504,   0], [2260,  0]],
        [[505,   0], [2261,  0]],
        [[506,   0], [2262,  0]],
        [[507,   0], [2263,  0]],
        [[508,   0], [2264,  0]],
        [[509,   0], [2265,  0]],
        [[510,   0], [2266,  0]],
        [[511,   0], [2267,  0]],
        //******** Tipped Arrows *******//
        /*
        [[262,  -1], [440,  -1]], //TODO
        */
        //*******************************//
        [[458,   0], [435,   0]], //Beetroot Seeds
        [[459,   0], [436,   0]], //Beetroot Soup
        [[460,   0], [349,   1]], //Raw Salmon
        [[461,   0], [349,   2]], //Clown fish
        [[462,   0], [350,   3]], //Puffer fish
        [[463,   0], [350,   1]], //Cooked Salmon
        [[466,   0], [422,   1]], //Enchanted Golden Apple
        //********************************//


        //************ BLOCKS *************//
        [[243,   0], [  3,   2]], //Podzol
        [[198,  -1], [208,  -1]], //Grass Path
        [[247,  -1], [ 49,   0]], //Nether Reactor core is now a obsidian
        [[157,  -1], [125,  -1]], //Double slab
        [[158,  -1], [126,  -1]], //Stairs
        //******** End Rod ********//
        [[208,   0], [198,   0]],
        [[208,   1], [198,   1]],
        [[208,   2], [198,   3]],
        [[208,   3], [198,   2]],
        [[208,   4], [198,   4]],
        [[208,   5], [198,   5]],
        //*************************//
        [[241,  -1], [ 95,  -1]], //Stained Glass
        [[182,   1], [205,   0]], //Purpur Slab
        [[181,   1], [204,   0]], //Double Purpur Slab
        [[ 95,   0], [166,   0]], //Extended Piston is now a barrier
        [[ 43,   6], [ 43,   7]], //Double Quartz Slab
        [[ 43,   7], [ 43,   6]], //Double Nether Brick Slab
        [[ 44,   6], [ 44,   7]], //Quartz Slab
        [[ 44,   7], [ 44,   6]], //Nether Brick Slab
        [[ 44,  14], [ 44,  15]], //Upper Quartz Slab
        [[ 44,  15], [ 44,  14]], //Upper Nether Brick Slab
        [[155,  -1], [155,   0]], //Quartz Block | TODO: convert meta
        [[168,   1], [168,   2]], //Dark Prismarine
        [[168,   2], [168,   1]], //Prismarine Bricks
        [[201,   1], [201,   0]], //Unused Purpur Block
        [[201,   2], [202,   0]], //Pillar Purpur Block
        [[ 85,   1], [188,   0]], //Spruce Fence
        [[ 85,   2], [189,   0]], //Birch Fence
        [[ 85,   3], [190,   0]], //Jungle Fence
        [[ 85,   4], [192,   0]], //Acacia Fence
        [[ 85,   5], [191,   0]], //Dark Oak Fence
        [[240,   0], [199,   0]], //Chorus Plant
        [[199,  -1], [ 68,  -1]], //Item Frame is temporary a standing sign | #blamemojang
        [[252,  -1], [255,  -1]], //Structures Block
        [[236,  -1], [251,  -1]], //Concretes
        [[237,  -1], [252,  -1]], //Concretes Powder
        //******** Glazed Terracotta ********//
        [[220,   0], [235,   0]],
        [[221,   0], [236,   0]],
        [[222,   0], [237,   0]],
        [[223,   0], [238,   0]],
        [[224,   0], [239,   0]],
        [[225,   0], [240,   0]],
        [[226,   0], [241,   0]],
        [[227,   0], [242,   0]],
        [[228,   0], [243,   0]],
        [[229,   0], [244,   0]],
        [[219,   0], [245,   0]],
        [[231,   0], [246,   0]],
        [[232,   0], [247,   0]],
        [[233,   0], [248,   0]],
        [[234,   0], [249,   0]],
        [[235,   0], [250,   0]],
        //*************************//
        [[251,  -1], [218,  -1]], //Observer
        //******** Shulker Box ********//
        //dude mojang, whyy
        [[205,  -1], [229,  -1]], //Undyed
        [[218,   0], [219,   0]],
        [[218,   1], [220,   0]],
        [[218,   2], [221,   0]],
        [[218,   3], [222,   0]],
        [[218,   4], [223,   0]],
        [[218,   5], [224,   0]],
        [[218,   6], [225,   0]],
        [[218,   7], [226,   0]],
        [[218,   8], [227,   0]],
        [[218,   9], [228,   0]],
        [[218,  10], [229,   0]],
        [[218,  11], [230,   0]],
        [[218,  12], [231,   0]],
        [[218,  13], [232,   0]],
        [[218,  14], [233,   0]],
        [[218,  15], [234,   0]],
        //*************************//
        [[188,  -1], [210,  -1]], //Repeating Command Block
        [[189,  -1], [211,  -1]], //Chain Command Block
        [[244,  -1], [207,  -1]], //Beetroot Block
        [[207,  -1], [212,  -1]], //Frosted Ice
        [[  4,  -1], [  4,  -1]], //For Stonecutter
        [[245,  -1], [  4,  -1]] //Stonecutter - To avoid problems, it's now a stone block
        //******************************//
        /*
        [[  P  E  ], [  P  C  ]],
        */
    ];

    private static array $idListIndex = [];

    public function init(): void
    {
        foreach(self::ID_LIST as $entry){
            //append index (PE => PC)
            if(isset(self::$idListIndex[0][$entry[0][0]])){
                self::$idListIndex[0][$entry[0][0]][] = $entry;
            }else{
                self::$idListIndex[0][$entry[0][0]] = [$entry];
            }

            //append index (PC => PE)
            if(isset(self::$idListIndex[1][$entry[1][0]])){
                self::$idListIndex[1][$entry[1][0]][] = $entry;
            }else{
                self::$idListIndex[1][$entry[1][0]] = [$entry];
            }
        }
    }

    public static function convertBlockData(bool $isComputer, int &$blockId, int &$blockData) : void{
        switch($blockId){
            case BlockLegacyIds::WOODEN_TRAPDOOR:
            case BlockLegacyIds::IRON_TRAPDOOR:
                self::convertTrapdoor($blockData);
                break;
            case BlockLegacyIds::STONE_BUTTON:
            case BlockLegacyIds::WOODEN_BUTTON:
                self::convertButton($blockData);
                break;
            default:
                if($isComputer){
                    $src = 0; $dst = 1;
                }else{
                    $src = 1; $dst = 0;
                }

                foreach(self::$idListIndex[$src][$blockId] ?? [] as $convertBlockData){
                    if($convertBlockData[$src][1] === -1){
                        $blockId = $convertBlockData[$dst][0];
                        if($convertBlockData[$dst][1] !== -1){
                            $blockData = $convertBlockData[$dst][1];
                        }
                        break;
                    }elseif($convertBlockData[$src][1] === $blockData){
                        $blockId = $convertBlockData[$dst][0];
                        $blockData = $convertBlockData[$dst][1];
                        break;
                    }
                }
                break;
        }
    }

    private static function convertTrapdoor(int &$blockData) : void{
        //swap bits
        $blockData ^= (($blockData & 0x04) << 1);
        $blockData ^= (($blockData & 0x08) >> 1);
        $blockData ^= (($blockData & 0x04) << 1);

        //swap directions
        $directions = [
            0 => 3,
            1 => 2,
            2 => 1,
            3 => 0
        ];

        $blockData = (($blockData >> 2) << 2) | $directions[$blockData & 0x03];
    }

    /**
     * Blame Mojang!! :-@
     * Why Mojang change the directions??
     *
     * @param int &$blockData
     *
     * #blamemojang
     */
    private static function convertButton(int &$blockData) : void{
        $directions = [
            0 => 0, // Button on block bottom facing down
            1 => 5, // Button on block top facing up
            2 => 4, // Button on block side facing north
            3 => 3, // Button on block side facing south
            4 => 2, // Button on block side facing west
            5 => 1, // Button on block side facing east
        ];

        $blockData = ($blockData & 0x08) | $directions[$blockData & 0x07];
    }
}
