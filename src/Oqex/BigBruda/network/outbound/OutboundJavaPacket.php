<?php

namespace Oqex\BigBruda\network\outbound;

use ErrorException;
use Oqex\BigBruda\network\JavaPacket;

abstract class OutboundJavaPacket extends JavaPacket {

    // Play, Client
    const SPAWN_ENTITY = 0x00;
    const SPAWN_EXPERIENCE_ORB = 0x01;
    const SPAWN_LIVING = 0x02;
    const SPAWN_PAINTING = 0x03;
    const SPAWN_PLAYER = 0x04;
    const SCULK_VIBRATION_SIGNAL = 0x05;
    const ENTITY_ANIMATE = 0x06;
    const STATISTICS = 0x07;
    const ACKNOWLEDGE_PLAYER_DIGGING = 0x08;
    const BLOCK_BREAK_ANIMATION = 0x09;
    const BLOCK_ENTITY_DATA = 0x0A;
    const BLOCK_ACTION = 0x0B;
    const BLOCK_CHANGE = 0x0C;
    const BOSS_BAR = 0x0D;
    const SERVER_DIFFICULTY = 0x0E;
    const CHAT_MESSAGE = 0x0F;
    const CLEAR_TITLES = 0x10;
    const TAB_COMPLETE = 0x11;
    const DECLARE_COMMANDS = 0x12;
    const CLOSE_WINDOW = 0x13;
    const WINDOW_ITEMS = 0x14;
    const WINDOW_PROPERTY = 0x15;
    const SET_SLOT = 0x16;
    const SET_COOLDOWN = 0x17;
    const PLUGIN_MESSAGE = 0x18;
    const NAMED_SOUND_EFFECT = 0x19;
    const DISCONNECT = 0x1A;
    const ENTITY_STATUS = 0x1B;
    const EXPLOSION = 0x1C;
    const UNLOAD_CHUNK = 0x1D;
    const CHANGE_GAME_STATE = 0x1E;
    const OPEN_HORSE_WINDOW = 0x1F;
    const INITIALIZE_WORLD_BORDER = 0x20;
    const KEEP_ALIVE = 0x21;
    const CHUNK_DATA = 0x22;
    const EFFECT = 0x23;
    const PARTICLE = 0x24;
    const UPDATE_LIGHT = 0x25;
    const JOIN_GAME = 0x26;
    const MAP_DATA = 0x27;
    const TRADE_LIST = 0x28;
    const ENTITY_POSITION = 0x29;
    const ENTITY_POSITION_ROTATION = 0x2A;
    const ENTITY_ROTATION = 0x2B;
    const VEHICLE_MOVE = 0x2C;
    const OPEN_BOOK = 0x2D;
    const OPEN_WINDOW = 0x2E;
    const OPEN_SIGN_EDITOR = 0x2F;
    const PING = 0x30;
    const CRAFT_RECIPE_RESPONSE = 0x31;
    const PLAYER_ABILITIES = 0x32;
    const END_COMBAT_EVENT =  0x33;
    const ENTER_COMBAT_EVENT = 0x34;
    const DEATH_COMBAT_EVENT = 0x35;
    const PLAYER_INFO = 0x36;
    const FACE_PLAYER = 0x37;
    const PLAYER_POSITION_LOOK = 0x38;
    const UNLOCK_RECIPES = 0x39;
    const DESTROY_ENTITIES = 0x3A;
    const REMOVE_ENTITY_EFFECT = 0x3B;
    const RESOURCE_PACK_SEND = 0x3C;
    const RESPAWN = 0x3D;
    const ENTITY_HEAD_LOOK = 0x3E;
    const MULTI_BLOCK_CHANGE = 0x3F;
    const SELECT_ADVANCEMENT_TAB = 0x40;
    const ACTION_BAR = 0x41;
    const WORLD_BORDER_CENTER = 0x42;
    const WORLD_BORDER_LERP_SIZE = 0x43;
    const WORLD_BORDER_SIZE = 0x44;
    const WORLD_BORDER_WARNING_DELAY = 0x45;
    const WORLD_BORDER_WARNING_REACH = 0x46;
    const CAMERA = 0x47;
    const HELD_ITEM_CHANGE = 0x48;
    const UPDATE_VIEW_POSITION = 0x49;
    const UPDATE_VIEW_DISTANCE = 0x4A;
    const SPAWN_POSITION = 0x4B;
    const DISPLAY_SCOREBOARD = 0x4C;
    const ENTITY_METADATA = 0x4D;
    const ATTACH_ENTITY = 0x4E;
    const ENTITY_VELOCITY = 0x4F;
    const ENTITY_EQUIPMENT = 0x50;
    const SET_EXPERIENCE = 0x51;
    const UPDATE_HEALTH = 0x52;
    const SCOREBOARD_OBJECTIVE = 0x53;
    const SET_PASSENGERS = 0x54;
    const TEAMS = 0x55;
    const UPDATE_SCORE = 0x56;
    const UPDATE_SIMULATION_DISTANCE = 0x57;
    const SET_TITLE_SUB_TITLE = 0x58;
    const TIME_UPDATE = 0x59;
    const SET_TITLE_TEXT = 0x5A;
    const SET_TITLE_TINES = 0x5B;
    const ENTITY_SOUND_EFFECT = 0x5C;
    const SOUND_EFFECT = 0x5D;
    const STOP_SOUND = 0x5E;
    const PLAYER_LIST_HEADER_FOOTER = 0x5F;
    const NBT_QUERY_RESPONSE = 0x60;
    const COLLECT_ITEM = 0x61;
    const ENTITY_TELEPORT = 0x62;
    const ADVANCEMENTS = 0x63;
    const ENTITY_PROPERTIES = 0x64;
    const ENTITY_EFFECT = 0x65;
    const DECLARE_RECIPES = 0x66;
    const TAGS = 0x67;

    /*** @throws ErrorException */
    protected final function decode(): void
    {
        throw new ErrorException(get_class($this) . ' should not use decode()!');
    }
}