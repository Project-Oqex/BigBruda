<?php

namespace Oqex\BigBruda\network\inbound;

use ErrorException;
use Oqex\BigBruda\network\JavaPacket;

abstract class InboundJavaPacket extends JavaPacket
{
    //Play
    const TELEPORT_CONFIRM_PACKET = 0x00;
    const TAB_COMPLETE_PACKET = 0x01;
    const CHAT_PACKET = 0x02;
    const CLIENT_STATUS_PACKET = 0x03;
    const CLIENT_SETTINGS_PACKET = 0x04;
    const CONFIRM_TRANSACTION_PACKET = 0x05;
    const ENCHANT_ITEM_PACKET = 0x06;
    const CLICK_WINDOW_PACKET = 0x07;
    const CLOSE_WINDOW_PACKET = 0x08;
    const PLUGIN_MESSAGE_PACKET = 0x09;
    const USE_ENTITY_PACKET = 0x0a;
    const KEEP_ALIVE_PACKET = 0x0b;
    const PLAYER_PACKET = 0x0c;
    const PLAYER_POSITION_PACKET = 0x0d;
    const PLAYER_POSITION_AND_LOOK_PACKET = 0x0e;
    const PLAYER_LOOK_PACKET = 0x0f;
    //TODO VEHICLE_MOVE_PACKET = 0x10;
    //TODO STEER_BOAT_PACKET = 0x11;
    const CRAFT_RECIPE_REQUEST_PACKET = 0x12;
    const PLAYER_ABILITIES_PACKET = 0x13;
    const PLAYER_DIGGING_PACKET = 0x14;
    const ENTITY_ACTION_PACKET = 0x15;
    //TODO STEER_VEHICLE_PACKET = 0x16;
    const CRAFTING_BOOK_DATA_PACKET = 0x17;
    //TODO RESOURCE_PACK_STATUS_PACKET = 0x18;
    const ADVANCEMENT_TAB_PACKET = 0x19;
    const HELD_ITEM_CHANGE_PACKET = 0x1a;
    const CREATIVE_INVENTORY_ACTION_PACKET = 0x1b;
    const UPDATE_SIGN_PACKET = 0x1c;
    const ANIMATE_PACKET = 0x1d;
    //TODO SPECTATE_PACKET = 0x1e;
    const PLAYER_BLOCK_PLACEMENT_PACKET = 0x1f;
    const USE_ITEM_PACKET = 0x20;

    //Status

    //Login
    const LOGIN_START= 0x00;
    const ENCRYPTION_RESPONSE_PACKET = 0x01;

    /*** @throws ErrorException */
    protected final function encode() : void{
        throw new ErrorException(get_class($this) . ' should not use encode(), Inbound!');
    }
}