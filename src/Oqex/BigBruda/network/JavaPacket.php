<?php

namespace Oqex\BigBruda\network;

use pocketmine\item\Item;
use pocketmine\item\VanillaItems;
use pocketmine\network\mcpe\protocol\types\inventory\ItemStackWrapper;
use pocketmine\utils\Binary;
use stdClass;

abstract class JavaPacket extends stdClass
{
    protected string $buffer;
    protected int $offset = 0;

    protected function get($len): string
    {
        if ($len < 0) {
            $this->offset = strlen($this->buffer) - 1;
            return '';
        } else if ($len === true) return substr($this->buffer, $this->offset);

        $buffer = '';
        for (; $len > 0; --$len, ++$this->offset) $buffer .= @$this->buffer[$this->offset];
        return $buffer;
    }

    protected function getLong(): int
    {
        return Binary::readLong($this->get(8));
    }

    protected function getInt(): int
    {
        return Binary::readInt($this->get(4));
    }

    protected function getPosition(int &$x = null, int &$y = null, int &$z = null): void
    {
        $long = $this->getLong();
        $x = $long >> 38;
        $y = ($long >> 26) & 0xFFF;
        $z = $long << 38 >> 38;
    }

    // TODO: Slots

    protected function getFloat(): float
    {
        return Binary::readFloat($this->get(4));
    }

    protected function getDouble(): float
    {
        return Binary::readDouble($this->get(8));
    }

    protected function getShort(): int
    {
        return Binary::readShort($this->get(2));
    }

    protected function getSignedShort(): int
    {
        return Binary::readSignedShort($this->get(2));
    }

    protected function getTriad(): int
    {
        return Binary::readTriad($this->get(3));
    }

    protected function getLTriad(): int
    {
        return Binary::readTriad(strrev($this->get(3)));
    }

    protected function getBool(): bool
    {
        return $this->get(1) !== "\x00";
    }

    protected function getByte(): int
    {
        return ord($this->buffer[$this->offset++]);
    }

    protected function getSignedByte(): int
    {
        return ord($this->buffer[$this->offset++]) << 56 >> 56;
    }

    protected function getAngle(): float
    {
        return $this->getByte() * 360 / 256;
    }

    protected function getString(): string
    {
        return $this->get($this->getVarInt());
    }

    protected function getVarInt(): int
    {
        return Binary::readVarInt($this->buffer, $this->offset);
    }

    protected function feof(): bool
    {
        return !isset($this->buffer[$this->offset]);
    }

    protected function put(string $str): void
    {
        $this->buffer .= $str;
    }

    protected function putLong(int $v): void
    {
        $this->buffer .= Binary::writeLong($v);
    }

    protected function putInt(int $v): void
    {
        $this->buffer .= Binary::writeInt($v);
    }

    protected function putPosition(int $x, int $y, int $z): void
    {
        $long = (($x & 0x3FFFFFF) << 38) | (($y & 0xFFF) << 26) | ($z & 0x3FFFFFF);
        $this->putLong($long);
    }

    protected function putFloat(float $v): void
    {
        $this->buffer .= Binary::writeFloat($v);
    }

    protected function putDouble(float $v): void
    {
        $this->buffer .= Binary::writeDouble($v);
    }

    protected function putShort(int $v): void
    {
        $this->buffer .= Binary::writeShort($v);
    }

    protected function putTriad(int $v): void
    {
        $this->buffer .= Binary::writeTriad($v);
    }

    protected function putLTriad(int $v): void
    {
        $this->buffer .= strrev(Binary::writeTriad($v));
    }

    protected function putBool(bool $v): void
    {
        $this->buffer .= ($v ? "\x01" : "\x00");
    }

    protected function putByte(int $v): void
    {
        $this->buffer .= chr($v);
    }

    /**
     * @param float $v any number is valid, including negative numbers and numbers greater than 360
     */
    protected function putAngle(float $v): void
    {
        $this->putByte((int)round($v * 256 / 360));
    }

    protected function putString(string $v): void
    {
        $this->putVarInt(strlen($v));
        $this->put($v);
    }

    protected function putVarInt(int $v): void
    {
        $this->buffer .= Binary::writeVarInt($v);
    }

    public abstract function pid(): int;

    protected abstract function encode(): void;

    protected abstract function decode(): void;

    public function write(): string
    {
        $this->buffer = "";
        $this->offset = 0;
        $this->encode();
        return Binary::writeVarInt($this->pid()) . $this->buffer;
    }

    public function read(string $buffer, int $offset = 0): void
    {
        $this->buffer = $buffer;
        $this->offset = $offset;
        $this->decode();
    }
}